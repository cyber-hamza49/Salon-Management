<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{    
    protected $fillable = [
        'user_id', 'stylist_id', 'service_id', 'date', 'time', 'status', 'payment_status', 'transaction_id'
    ];
    
    
    protected $table = 'appointments';

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function service()
    {
        return $this->belongsTo(Service::class,'service_id');
    }
    public function stylist()
    {
        return $this->belongsTo(Stylist::class,'stylist_id');
    }
   
}
