<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}

// <?php

// namespace App\Http\Controllers;
// use App\Models\Service;
// use App\Models\Stylist;
// use Illuminate\Http\Request;

// class StylistController extends Controller
// {
//     public function index(){

//         return view('stylist.dashboard');
//     }

//     public function show_services()
//     {
//         $services = Service::all();
//         return view('stylist.show_services', compact('services'));
//     }

//     public function show(Request $request)
//     {
//         $search = $request->input('search');
//         $stylists = Stylist::query();

//         if ($search) {
//             $stylists->where('name', 'LIKE', '%' . $search . '%')
//                      ->orWhere('description', 'LIKE', '%' . $search . '%');
//         }
   
//         $stylists = $stylists->get();
//         return view('stylist.show-stylists', compact('stylists'));
//     }

//     public function create()
//     {
//         return view('stylist.add-stylist');
//     }

//     public function store(Request $request)
// {
//     $stylist = new Stylist();
//     $stylist->name = $request->stylist_name;
//     $stylist->description = $request->stylist_description;
//     $stylist->commission_rate = $request->stylist_commission_rate;

//     // Handle image upload
//     if ($request->hasFile('stylist_image')) {
//         $imageName = time() . '.' . $request->stylist_image->extension();
//         $request->stylist_image->move(public_path('uploads'), $imageName);
//         $stylist->image = $imageName;
//     }

//     $stylist->status = 1; // Default active status
//     $stylist->save();

//     return redirect('/Show-stylists')->with('success', 'Stylist added successfully!');
// }


//     public function edit($id)
//     {
//         $stylist = Stylist::findOrFail($id);
//         return view('stylist.edit-stylist', compact('stylist'));
//     }

//     public function update(Request $request, $id)
//     {
//         $stylist = Stylist::findOrFail($id);
//         $stylist->name = $request->stylist_name;
//         $stylist->description = $request->stylist_description;
//         $stylist->commission_rate = $request->stylist_commission_rate;
    
//         // Handle image upload
//         if ($request->hasFile('stylist_image')) {
//             $imageName = time() . '.' . $request->stylist_image->extension();
//             $request->stylist_image->move(public_path('uploads'), $imageName);
//             $stylist->image = $imageName;
//         }
    
//         $stylist->save();
    
//         return redirect('/Show-stylists')->with('success', 'Stylist updated successfully!');
//     }
    

//     public function destroy($id)
//     {
//         $stylist = Stylist::findOrFail($id);
//         $stylist->delete();

//         return redirect('/Show-stylists')->with('success', 'Stylist deleted successfully!');
//     }

//     public function toggleStatus($id)
//     {
//         $stylist = Stylist::findOrFail($id);
//         $stylist->status = !$stylist->status; // Toggle the status
//         $stylist->save();

//         return redirect()->back()->with('success', 'Status updated successfully!');
//     }    
    
// }
