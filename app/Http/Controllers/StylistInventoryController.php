<?php

namespace App\Http\Controllers;
use App\Models\Inventory;
use App\Models\Alert;
use Illuminate\Http\Request;


class StylistInventoryController extends Controller
{
    public function showinventory()
    {
        // Fetch stylist inventory data from the database
        $inventory = Inventory::all();
        
        // Check for low stock items
        foreach ($inventory as $item) {
            if ($item->quantity <= 2) {
                session()->flash('low_stock_alert', 'Warning: ' . $item->product_name . ' is running low on stock (Quantity: ' . $item->quantity . ')');
            }
        }
        
        return view('stylist.inventory.index', compact('inventory'));
    }

    public function decreaseInventory(Request $request, $id)
    {
        try {
            $inventory = Inventory::findOrFail($id);
            
            $request->validate([
                'quantity' => 'required|numeric|min:1|max:' . $inventory->quantity
            ]);

            $inventory->quantity -= $request->quantity;
            $inventory->save();

            // Check if quantity is now <= 2 after decreasing
            if ($inventory->quantity <= 2) {
                Alert::create([
                    'message' => 'Warning: ' . $inventory->product_name . ' is running low on stock (Quantity: ' . $inventory->quantity . ')',
                    'type' => 'warning'
                ]);
            }

            return redirect()->back()->with('success', 'Inventory updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update inventory');
        }
    }
}

class AlertController extends Controller
{
    public function markAsRead($id)
    {
        try {
            $alert = Alert::findOrFail($id);
            $alert->is_read = true;
            $alert->save();
            
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false], 500);
        }
    }
}