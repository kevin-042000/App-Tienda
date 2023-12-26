<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'address_id', 'type'];

    // Relación muchos a uno con la orden asociada a esta dirección. 
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Relación muchos a uno con la dirección asociada a esta relación.
    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
