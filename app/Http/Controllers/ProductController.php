<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming data
        $request->validate([
            'product_name' => 'required|max:255',
            'product_description' => 'required',
            'product_quantity' => 'required|integer|min:1',
            'product_price' => 'required|numeric|min:1',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5024',
        ]);

        // Handle image upload
        $imageName = time() . '.' . $request->product_image->extension();
        $request->product_image->move(public_path('user_images'), $imageName);

        // Create a new product and save to database
        $Product = new Product();
        $Product->Name = $request->product_name;
        $Product->Description = $request->product_description;
        $Product->Quantity = $request->product_quantity;
        $Product->Price = $request->product_price;
        $Product->Image = $imageName;
        $Product->Status = 1; // Default status as active
        $Product->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Product added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $search = $request->search;
        $products = Product::query();

        if ($search != '') {
            $products->where('Name', 'LIKE', '%' . $search . '%')
                ->orWhere('Description', 'LIKE', '%' . $search . '%')
                ->orWhere('Price', 'LIKE', '%' . $search . '%')
                ->orWhere('Quantity', 'LIKE', '%' . $search . '%');
            $products = $products->get();
        } else {
            $products = Product::all();
        }

        return view('admin.show', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id); // Fetch product by ID
        return view('admin.edit', compact('product')); // Send product data to view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id); // Fetch product by ID

        // Validate the inputs
        $request->validate([
            'Name' => 'required|string|max:255',
            'Description' => 'required|string',
            'Price' => 'required|numeric',
            'Quantity' => 'required|numeric',
            'Image' => 'nullable|image|mimes:jpeg,png,jpg|max:5024',
        ]);

        // Update fields
        $product->Name = $request->Name;
        $product->Description = $request->Description;
        $product->Price = $request->Price;
        $product->Quantity = $request->Quantity;

        // Handle image upload
        if ($request->hasFile('Image')) {
            $imageName = time() . '.' . $request->Image->extension();
            $request->Image->move(public_path('user_images'), $imageName);
            $product->Image = $imageName;
        }

        $product->save(); // Save changes to the database

        return redirect('/Show-Products')->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/Show-Products')->with('success', 'Product deleted successfully!');
    }

    public function toggleStatus($id)
    {
        $product = Product::findOrFail($id);
        $product->Status = !$product->Status; // Toggle the status
        $product->save();

        return redirect()->back()->with('success', 'Product status updated successfully!');
    }

    public function showpro(Request $request)
    {
        $search = $request->search;
        $products = Product::query();

        if ($search != '') {
            $products->where('Name', 'LIKE', '%' . $search . '%')
                ->orWhere('Description', 'LIKE', '%' . $search . '%')
                ->orWhere('Price', 'LIKE', '%' . $search . '%')
                ->orWhere('Quantity', 'LIKE', '%' . $search . '%');
            $products = $products->get();
        } else {
            $products = Product::all();
        }

        return view('admin.show', compact('products'));
    }

    
}
