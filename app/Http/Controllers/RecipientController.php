<?php

namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\Appointment;
use App\Models\Stylist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RecipientController extends Controller
{
    public function show_services()
    {
        $services = Service::Where('Status', '1')->get();
        return view('recipient.show_services', compact('services'));
    }

    public function appointments()
    {
        $appointments = Appointment::with(['user', 'service'])->get(); // Corrected query
        return view('recipient.appointments', compact('appointments'));
    }
    
    // Show the edit form for a specific appointment
    public function edit($id)
    {
        $appointment = Appointment::with(['user', 'service'])->findOrFail($id); // Fetch appointment details
        return view('recipient.edit_appointments', compact('appointment')); // Send appointment data to the view
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

        return redirect('/appointmentsr')->with('success', 'Appointment updated successfully!');
    }
    
    // Delete an appointment
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect('/appointmentsr')->with('success', 'Appointment deleted successfully!');
    }

    // For Completed Appointments
    public function completedappointments()
    {
        $appointments = Appointment::where('appointment_status', 1)
                                    ->with(['user', 'service'])
                                    ->get();
    
        return view('recipient.completed_appointments', compact('appointments'));
    }

    public function show(Request $request)
    {
        $search = $request->input('search');
        $stylists = Stylist::all(); // Filter by user
    
        if ($search) {
            $stylists->where(function($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%')
                      ->orWhere('description', 'LIKE', '%' . $search . '%');
            });
        }
    
        return view('recipient.show-stylists', compact('stylists'));
    }

    public function stylistCommission()
    {
        $stylists = Stylist::with(['appointments' => function ($query) {
            $query->where('appointment_status', 1)
                  ->where('status', 1)
                  ->where('payment_status', 'paid')
                  ->with(['user', 'service']);
        }])->get();
    
        return view('recipient.stylist_commission', compact('stylists'));
    }

}
