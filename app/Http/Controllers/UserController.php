<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Service;
use App\Models\Stylist;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Mail\BookingConfirmation;
use Illuminate\Support\Facades\Mail;
use App\Models\StylistAvailability;

class UserController extends Controller
{
    // Dashboard & Basic Pages
    public function index()
    {
        $services = Service::all();
        $stylists = Stylist::all();
        return view('user.home', compact('services', 'stylists'));
    }

    public function contact()
    {
        return view('user.contact');
    }

    public function barbers()
    {
        $barbers = Stylist::where('status', '1')->get();
        return view('user.barbers', compact('barbers'));
    }

    // Appointment Management
    public function userappointments()
    {
        $appointments = Appointment::where('user_id', Auth::id())
            ->where('appointment_status', '!=', 1)
            ->with(['stylist', 'service'])
            ->get();

        $completed_appointments = Appointment::where('user_id', Auth::id())
            ->where('appointment_status', 1)
            ->with(['stylist', 'service'])
            ->get();

        return view('user.appointments', compact('appointments', 'completed_appointments'));
    }

    public function edit_appoint($id)
    {
        $appointment = Appointment::with(['user', 'service'])->findOrFail($id);
        return view('user.edit_appointments', compact('appointment'));
    }

    public function update_appoint(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->date = $request->Date;
        $appointment->time = $request->Time;
        $appointment->save();

        return redirect('/user-appointments')->with('success', 'Appointment updated successfully!');
    }

    public function delete_appoint($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect('/user-appointments')->with('success', 'Appointment deleted successfully!');
    }

    public function checkout()
    {
        $appointments = Appointment::with(['user', 'service'])
            ->where('appointment_status', '0')
            ->Where('status', '1')
            ->where('payment_status', 'pending')
            ->get();
        
        return view('user.checkout', compact('appointments'));
    }

    // Booking System
    public function showBookingForm()
    {
        $services = Service::all();
        $stylists = Stylist::all();
        return view('bookings.create', compact('services', 'stylists'));
    }

    public function getAvailability(Request $request)
    {
        $stylist_id = $request->stylist_id;
        $availabilities = StylistAvailability::where('stylist_id', $stylist_id)
            ->where('end_date', '>=', now()->format('Y-m-d'))
            ->get();
        
        return response()->json($availabilities);
    }

    public function bookings(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'stylist_id' => 'required|exists:stylists,id',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i',
        ]);

        $isAvailable = StylistAvailability::where('stylist_id', $request->stylist_id)
            ->where('start_date', '<=', $request->date)
            ->where('end_date', '>=', $request->date)
            ->where('start_time', '<=', $request->time)
            ->where('end_time', '>=', $request->time)
            ->exists();

        if (!$isAvailable) {
            return redirect()->back()->with('msg', 'Selected time slot is not available.');
        }

        $user = Auth::user();
        
        $booking = new Appointment();
        $booking->user_id = $user->id;
        $booking->service_id = $request->service_id;
        $booking->stylist_id = $request->stylist_id;
        $booking->date = $request->date;
        $booking->time = $request->time;
        $booking->save();

        Mail::to($user->email)->send(new BookingConfirmation($booking));

        return redirect()->back()->with('msg', 'Your booking has been placed successfully. Check your email for confirmation.');
    }

    // User Management
    public function allUsers(Request $request)
    {
        $query = User::query();
    
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%");
        }
    
        $allusers = $query->get();
        return view('admin.users.users', compact('allusers'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'roles' => 'required|string',
        ]);
    
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'roles' => $request->roles,
        ]);
    
        return redirect('/all-users');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'roles' => 'required|in:1,2,3,4',
        ]);

        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'roles' => $validatedData['roles'],
        ]);

        return redirect('/all-users');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/all-users')->with('success', 'User deleted successfully!');
    }

    // Role-based User Lists
    public function clients()
    {
        $clients = User::where('roles', '4')->get();
        return view('admin.users.clients', compact('clients'));
    }

    public function stylists()
    {
        $stylists = User::where('roles', '3')->get();
        return view('admin.users.stylists', compact('stylists'));
    }

    public function recipients()
    {
        $recipients = User::where('roles', '2')->get();
        return view('admin.users.recipients', compact('recipients'));
    }

    public function admins()
    {
        $admins = User::where('roles', '1')->get();
        return view('admin.users.admins', compact('admins'));
    }
}