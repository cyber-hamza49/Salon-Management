<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\ContactMail;
use App\Exports\StylistCommissionExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ];

        Mail::to('hamzaka549@gmail.com')->send(new ContactMail($details));

        return back()->with('success', 'Thank you for contacting us. We will get back to you soon!');
    }

    public function exportStylistCommission()
{
    return Excel::download(new StylistCommissionExport, 'stylist_commission_report.xlsx');
}
}