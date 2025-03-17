<?php

namespace App\Http\Controllers;

require_once public_path('dompdf/autoload.inc.php');

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Stripe\Stripe;
use Stripe\Charge;

class StripePaymentController extends Controller
{
    const PKR_TO_USD_RATE = 0.0036;
    
    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    }

    public function stripe()
    {
        $appointments = Appointment::where('user_id', Auth::id())
            ->where('status', 1)
            ->where('payment_status', 'pending')
            ->with(['service', 'stylist'])
            ->get();
            
        // if ($appointments->isEmpty()) {
        //     return redirect('stripe')->with('error', 'All your booked appointments have already been paid.');
        // }
        
        $totalPKR = $appointments->sum('service.Price');
        $totalUSD = round($totalPKR * self::PKR_TO_USD_RATE, 2);
        
        return view('stripe', [
            'totalPKR' => $totalPKR,
            'totalUSD' => $totalUSD,
            'appointments' => $appointments
        ]);
    }

    private function generateInvoice($appointments, $charge, $totalPKR, $totalUSD)
    {
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);
        
        $data = [
            'invoice_no' => 'INV-' . time(),
            'date' => date('Y-m-d'),
            'user' => Auth::user(),
            'appointments' => $appointments,
            'charge' => $charge,
            'totalPKR' => $totalPKR,
            'totalUSD' => $totalUSD,
            'transaction_id' => $charge->id
        ];

        $html = View::make('pdf.invoice', $data)->render();
        
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        
        return $dompdf->output();
    }

    public function stripePost(Request $request)
    {
        try {
            $appointments = Appointment::where('user_id', Auth::id())
                ->where('status', 1)
                ->where('payment_status', 'pending')
                ->with(['service', 'stylist'])
                ->get();
                
            // if ($appointments->isEmpty()) {
            //     return redirect('stripe')->with('error', 'No approved appointments found.');
            // }
            
            $totalPKR = $appointments->sum('service.Price');
            $totalUSD = round($totalPKR * self::PKR_TO_USD_RATE, 2);
            $amountInCents = round($totalUSD * 100);
    
            $charge = Charge::create([
                'amount' => $amountInCents,
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'Payment for appointments #' . $appointments->pluck('id')->implode(', '),
            ]);
    
            foreach($appointments as $appointment) {
                $appointment->update([
                    'payment_status' => 'paid',
                    'transaction_id' => $charge->id
                ]);
            }
    
             // Update session flash message first
             session()->flash('chk', 'Payment successful! Amount: $' . $totalUSD);
             
            $pdfContent = $this->generateInvoice($appointments, $charge, $totalPKR, $totalUSD);
            
            $fileName = 'invoice-' . time() . '.pdf';
    
            // Then return PDF response
            return response($pdfContent)
                ->header('Content-Type', 'application/pdf')
                ->header('Content-Disposition', 'attachment; filename="' . $fileName . '"');
    
        } catch (\Exception $e) {
            \Log::error('Payment Error:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return back()->with('chkf', 'Payment failed: ' . $e->getMessage());
            // return redirect('/appointments')->with('success', 'Appointment updated successfully!');

        }
    }
}