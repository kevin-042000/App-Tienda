<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = ['cart_id', 'product_id', 'quantity'];

    // Relación muchos a uno con el carrito al que pertenece este elemento.
     
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    // Relación muchos a uno con el producto relacionado con este elemento del carrito.
     
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
