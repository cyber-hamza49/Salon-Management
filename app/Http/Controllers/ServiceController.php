<?php

namespace App\Http\Controllers;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.add-service');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name'          => ['required', 'string', 'max:255'],
        //     'description'   => ['required', 'string', 'max:1000'],
        //     'price'         => ['required', 'numeric', 'min:0'],
        //     'service_image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        // ]);
        

        // Handle image upload
        $imageName = time() . '.' . $request->service_image->extension();
        $request->service_image->move(public_path('user_images'), $imageName);

        // Create a new service and save to database
        $service = new Service();
        $service->Name = $request->service_name;
        $service->Description = $request->service_description;
        $service->Price = $request->service_price;
        $service->Image = $imageName;
        $service->Status = 1; // Default status as active
        $service->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Service added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $search = $request->search;
        $services = service::query();
    
        if ($search != '') {
            $services->where('Name', 'LIKE', '%' . $search . '%')
                ->orWhere('Description', 'LIKE', '%' . $search . '%')
                ->orWhere('Price', 'LIKE', '%' . $search . '%');  // Added missing semicolon
            $services = $services->get();
        } else {
            $services = service::all();
        }
    
        return view('admin.show_services', compact('services'));
    }
    
    public function showpro(Request $request)
    {
        $search = $request->search;
        $services = service::query();
    
        if ($search != '') {
            $services->where('Name', 'LIKE', '%' . $search . '%')
                ->orWhere('Description', 'LIKE', '%' . $search . '%')
                ->orWhere('Price', 'LIKE', '%' . $search . '%');  // Added missing semicolon
            $services = $services->get();
        } else {
            $services = service::all();
        }
    
        return view('admin.show', compact('services'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service = service::findOrFail($id); // Fetch service by ID
        return view('admin.edit', compact('service')); // Send service data to view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $service = service::findOrFail($id); // Fetch service by ID

        // Update fields
        $service->Name = $request->Name;
        $service->Description = $request->Description;
        $service->Price = $request->Price;

        // Handle image upload
        if ($request->hasFile('Image')) {
            $imageName = time() . '.' . $request->Image->extension();
            $request->Image->move(public_path('user_images'), $imageName);
            $service->Image = $imageName;
        }

        $service->save(); // Save changes to the database

        return redirect('/Show-services')->with('success', 'service updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $service = service::findOrFail($id);
        $service->delete();

        return redirect('/Show-services')->with('success', 'service deleted successfully!');
    }

    public function toggleStatus($id)
{
    $service = Service::findOrFail($id);
    $service->Status = !$service->Status;
    $service->save();

    return redirect()->back()->with('success', 'Service status updated successfully!');
}

}


