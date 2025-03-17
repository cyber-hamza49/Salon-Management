<?php

namespace App\Http\Controllers;
use App\Models\Stylist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StylistProfileController extends Controller
{
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
    
        return view('admin.show-stylists', compact('stylists'));
    }
    
    public function create()
    {
        return view('admin.add-stylist');
    }

    public function store(Request $request)
    {

        $request->validate([
            'stylist_name'            => 'required|string|min:3|max:12',
            'stylist_description'     => 'required|string|min:6|max:255',
            'stylist_commission_rate' => 'required|numeric|min:0',
            'stylist_image'           => 'required|image|mimes:jpeg,png,jpg|max:2048',
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
    
        return redirect('/Showstylists')->with('success', 'Stylist added successfully!');
    }
    

    public function edit($id)
{
    $stylist = Stylist::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
    return view('admin.edit-stylist', compact('stylist'));
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
    
        return redirect('/Showstylists')->with('success', 'Stylist updated successfully!');
    }
    
    

    public function destroy($id)
    {
        $stylist = Stylist::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $stylist->delete();
    
        return redirect('/Showstylists')->with('success', 'Stylist deleted successfully!');
    }

    public function toggleStatus($id)
    {
        $stylist = Stylist::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $stylist->status = !$stylist->status;
        $stylist->save();
    
        return redirect()->back()->with('success', 'Stylist status updated successfully!');
    }
    
    
}
