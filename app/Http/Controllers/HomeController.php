<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Stylist;
use App\Models\Service;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user(); // Get the authenticated user
        $check_role = $user->roles; // Access the roles property

        $services = Service::Where('Status', '1')->get();
        $stylists = Stylist::Where('status', '1')->get();
    
        if ($check_role == 1) {
            // Admin gets all users
            return view('admin_template.profile');
        } elseif ($check_role == 2) {
            return view('recipient.profile');
        } elseif ($check_role == 3) {
            return view('stylist.profile');
        } else {
            return view('user.home', compact('services', 'stylists'));
        }


    } 
       
}
