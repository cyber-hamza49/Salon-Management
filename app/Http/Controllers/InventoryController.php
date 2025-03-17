<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;

class InventoryController extends Controller
{
    public function index()
    {
        $inventory = Inventory::all();
        return view('admin.inventory.index', compact('inventory'));
    }

    public function create()
    {
        return view('admin.inventory.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name'    => ['required', 'string', 'max:255'],
            'quantity'        => ['required', 'integer', 'min:1'],
            'unit'           => ['required', 'string', 'max:50'],
            'threshold_level' => ['nullable', 'integer', 'min:0'], 
            'supplier_name'   => ['nullable', 'string', 'max:255'],
        ]);
        

        Inventory::create($request->all());

        return redirect()->back()->with('success', 'Product added successfully!');
    }

    public function edit($id)
    {
        $inventory = Inventory::findOrFail($id);
        return view('admin.inventory.edit', compact('inventory'));
    }

    public function update(Request $request, $id)
    {
        $inventory = Inventory::findOrFail($id);

        $request->validate([
            'product_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'unit' => 'required|string',
            'threshold_level' => 'nullable|integer|min:0',
            'supplier_name' => 'nullable|string',
        ]);

        $inventory->update($request->all());

        return redirect()->route('inventory.index')->with('success', 'Product updated successfully!');
    }

    public function destroy($id)
    {
        Inventory::findOrFail($id)->delete();
        return redirect()->route('inventory.index')->with('success', 'Product deleted successfully!');
    }
}
