<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];

    // Relación uno a uno con el usuario dueño del carrito.
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación uno a muchos con elementos del carrito.  
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}
