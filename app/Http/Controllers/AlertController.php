<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use Illuminate\Http\Request;

class AlertController extends Controller
{
    /**
     * Get all unread alerts
     */
    public function getAlerts()
    {
        $alerts = Alert::where('is_read', false)
                      ->orderBy('created_at', 'desc')
                      ->get();
        
        return response()->json($alerts);
    }

    public function toggleRead($id)
    {
        $alert = Alert::findOrFail($id);
        $alert->is_read = !$alert->is_read;
        $alert->save();
    
        return redirect()->back()->with('success', 'Alert status updated successfully!');
    }
    
    
    

    /**
     * Create a new alert
     */
    public function store(Request $request)
    {
        $alert = Alert::create([
            'message' => $request->message,
            'type' => $request->type ?? 'warning',
            'is_read' => false
        ]);

        return response()->json([
            'success' => true,
            'alert' => $alert
        ]);
    }

    

}