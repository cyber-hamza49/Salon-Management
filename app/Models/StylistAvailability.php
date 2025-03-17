<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StylistAvailability extends Model
{
    use HasFactory;

    protected $fillable = [
        'stylist_id',
        'start_date',
        'end_date',
        'start_time',
        'end_time'
    ];


    protected $dates = [
        'start_date',
        'end_date',
        'created_at',
        'updated_at'
    ];

    public function stylist()
    {
        return $this->belongsTo(Stylist::class);
    }
}