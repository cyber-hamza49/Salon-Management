<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\Model;

class Stylist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'commission_rate',
        'image',
        'status',
        'user_id'
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
