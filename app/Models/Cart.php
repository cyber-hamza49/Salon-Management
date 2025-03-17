<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
    
class Cart extends Model
{
    protected $table = 'carts'; // Cart table name

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id'); // Belongs to Product model
    }
}

