<?php

namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\Stylist;
use App\Models\Appointment;
use App\Models\StylistAvailability;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StylistController extends Controller
{
    public function index(){

        return view('stylist.dashboard');
    }

    public function show_services()
    {
        $services = Service::Where('Status', '1')->get();
        return view('stylist.show_services', compact('services'));
    }

    public function show(Request $request)
    {
        $search = $request->input('search');
        $userId = Auth::id(); // Logged-in user ID
        $stylists = Stylist::where('user_id', $userId);
    
        if ($search) {
            $stylists->where(function($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%')
                      ->orWhere('description', 'LIKE', '%' . $search . '%');
            });
        }
    
        $stylists = $stylists->get();
        return view('stylist.show-stylists', compact('stylists'));
    }
    
    public function create()
    {
        return view('stylist.add-stylist');
    }

    public function store(Request $request)
    {
        $request->validate([
            'stylist_name' => 'required',
            'stylist_description' => 'required',
            'stylist_commission_rate' => 'required|numeric',
            'stylist_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $stylist = new Stylist();
        $stylist->name = $request->stylist_name;
        $stylist->description = $request->stylist_description;
        $stylist->commission_rate = $request->stylist_commission_rate;
        $stylist->user_id = Auth::id(); // Associate logged-in user
    
        // Handle image upload
        if ($request->hasFile('stylist_image')) {
            $imageName = time() . '.' . $request->stylist_image->extension();
            $request->stylist_image->move(public_path('uploads'), $imageName);
            $stylist->image = $imageName;
        }
    
        $stylist->status = 1; // Default active status
        $stylist->save();
    
        return redirect('/Show-stylists')->with('success', 'Stylist added successfully!');
    }
    

    public function edit($id)
    {
        $stylist = Stylist::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('stylist.edit-stylist', compact('stylist'));
    }
    

    public function update(Request $request, $id)
    {
        $stylist = Stylist::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
    
        $stylist->name = $request->stylist_name;
        $stylist->description = $request->stylist_description;
        $stylist->commission_rate = $request->stylist_commission_rate;
    
        // Handle image upload
        if ($request->hasFile('stylist_image')) {
            $imageName = time() . '.' . $request->stylist_image->extension();
            $request->stylist_image->move(public_path('uploads'), $imageName);
            $stylist->image = $imageName;
        }
    
        $stylist->save();
    
        return redirect('/Show-stylists')->with('success', 'Stylist updated successfully!');
    }
    
    

    public function destroy($id)
    {
        $stylist = Stylist::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $stylist->delete();
    
        return redirect('/Show-stylists')->with('success', 'Stylist deleted successfully!');
    }

    public function toggleStatus($id)
{
    $stylist = Stylist::where('id', $id)->firstOrFail();
    $stylist->status = !$stylist->status;
    $stylist->save();

    return redirect()->back()->with('success', 'Stylist status updated successfully!');
}


    public function showAvailabilityForm()
{
    $stylist = Stylist::where('user_id', Auth::id())->first();
    if (!$stylist) {
        return redirect()->back()->with('error', 'Stylist not found');
    }
    return view('stylist.add-availability', compact('stylist'));
}

public function storeAvailability(Request $request)
{
    $request->validate([
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'start_time' => 'required',
        'end_time' => 'required|after:start_time',
    ]);

    $stylist = Stylist::where('user_id', Auth::id())->first();
    if (!$stylist) {
        return redirect()->back()->with('error', 'Stylist not found');
    }

    StylistAvailability::create([
        'stylist_id' => $stylist->id,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'start_time' => $request->start_time,
        'end_time' => $request->end_time,
    ]);

    return redirect()->back()->with('success', 'Availability added successfully');
}

public function showAvailabilities()
{
    $stylist = Stylist::where('user_id', Auth::id())->first();
    if (!$stylist) {
        return redirect()->back()->with('error', 'Stylist not found');
    }

    $availabilities = StylistAvailability::where('stylist_id', $stylist->id)->get();
    return view('stylist.show-availabilities', compact('availabilities'));
}
public function deleteAvailability($id)
{
    $stylist = Stylist::where('user_id', Auth::id())->first();
    if (!$stylist) {
        return redirect()->back()->with('error', 'Stylist not found');
    }

    $availability = StylistAvailability::where('id', $id)
        ->where('stylist_id', $stylist->id)
        ->first();

    if (!$availability) {
        return redirect()->back()->with('error', 'Availability not found');
    }

    $availability->delete();
    return redirect()->back()->with('success', 'Availability deleted successfully');
}

public function show_availabilities()
{
    $availabilities = StylistAvailability::with('stylist')
        ->orderBy('start_date')
        ->orderBy('start_time')
        ->paginate(10);
        
    return view('recipient.availabilities', compact('availabilities'));
}
    
}
