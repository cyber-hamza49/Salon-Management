<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Service;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class AnalyticsController extends Controller
{
    public function analytics()
    {
        // 1. Total appointments count
        $totalAppointments = Appointment::count();
        
        // 2. Pending appointments (status=1 but appointment_status=0)
        $pendingAppointments = Appointment::where('status', 1)
            ->where('appointment_status', 0)
            ->count();
        
        // 3. Total earnings from paid appointments
        $totalEarnings = DB::table('appointments')
            ->join('services', 'appointments.service_id', '=', 'services.id')
            ->where('appointments.payment_status', 'paid')
            ->sum('services.price');
        
        // Get all appointments for display
        $appointments = Appointment::all();
        
        return view('admin_template.dashboard', [
            'totalAppointments' => $totalAppointments,
            'pendingAppointments' => $pendingAppointments,
            'totalEarnings' => $totalEarnings,
            'appointments' => $appointments,
            'services' => Service::all(),
            'inventory' => Inventory::all()
        ]);
    }
}