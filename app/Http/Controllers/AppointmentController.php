<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Stylist;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    // Show all appointments for the logged-in stylist

    public function appointments()
    {
        $appointments = Appointment::with(['user', 'service'])->get(); // Corrected query
        return view('admin.appointments', compact('appointments'));
    }
    
    public function showappointments()
{
    $user = Auth::user();
    $stylist = Stylist::where('user_id', $user->id)->first();
    
    if ($stylist) {
        $appointments = Appointment::where('stylist_id', $stylist->id)
            ->with(['user', 'service'])
            ->get();
        
        return view('stylist.show_appointments', compact('appointments'));
    }

    return redirect()->back()->with('error', 'Unauthorized access');
}

    // Show the edit form for a specific appointment
    public function edit($id)
    {
        $appointment = Appointment::with(['user', 'service'])->findOrFail($id); // Fetch appointment details
        return view('admin.edit_appointments', compact('appointment')); // Send appointment data to the view
    }

    // Update the specific appointment in the database
    public function update(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);

        // Update editable fields
        $appointment->date = $request->Date;
        $appointment->time = $request->Time;
        $appointment->Status = $request->Status;

        $appointment->save(); // Save changes to the database

        return redirect('/appointments')->with('success', 'Appointment updated successfully!');
    }
    
    // Delete an appointment
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect('/appointments')->with('success', 'Appointment deleted successfully!');
    }

    // Toggle the status of an appointment
    public function toggleStatus($id)
    {
        $appointment = Appointment::findOrFail($id);
    
        // Toggle `status` or `appointment_status` based on request
        if (request()->has('toggle_appointment_status')) {
            $appointment->appointment_status = !$appointment->appointment_status;
        } else {
            $appointment->status = !$appointment->status;
        }
    
        $appointment->save();
    
        return redirect()->back()->with('success', 'Appointment status updated successfully!');
    }

    // For Completed Appointments
    public function completedappointments()
    {
        $appointments = Appointment::where('appointment_status', 1)
                                    ->with(['user', 'service'])
                                    ->get();
    
        return view('admin.completed_appointments', compact('appointments'));
    }
    public function stylistCommission()
{
    $stylists = Stylist::with(['appointments' => function ($query) {
        $query->where('appointment_status', 1)
              ->where('status', 1)
              ->where('payment_status', 'paid')
              ->with(['user', 'service']);
    }])->get();

    return view('admin.stylist_commission', compact('stylists'));
}

public function myCommission()
{
    // Get the logged-in stylist's user ID
    $userId = Auth::id();
    
    // Find the stylist record for the logged-in user
    $stylist = Stylist::where('user_id', $userId)
        ->with(['appointments' => function ($query) {
            $query->where([
                'appointment_status' => 1,
                'status' => 1,
                'payment_status' => 'paid'
            ])
            ->with(['service']); // Include service details for price calculation
        }])
        ->first();

    if ($stylist) {
        // Calculate commission details
        $appointments = $stylist->appointments;
        $totalServicePrice = $appointments->sum(function($appointment) {
            return $appointment->service->Price ?? 0;
        });
        $totalCommission = ($totalServicePrice * $stylist->commission_rate) / 100;
        
        // Get appointment details for the detailed view
        $appointmentDetails = $appointments->map(function($appointment) use ($stylist) {
            return [
                'date' => $appointment->date,
                'time' => $appointment->time,
                'service_name' => $appointment->service->Name ?? 'N/A',
                'service_price' => $appointment->service->Price ?? 0,
                'commission_amount' => ($appointment->service->Price * $stylist->commission_rate) / 100
            ];
        });
    }

    return view('stylist.stylist_commission', compact('stylist', 'totalServicePrice', 'totalCommission', 'appointmentDetails'));
}
}

