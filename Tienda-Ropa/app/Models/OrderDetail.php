<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'product_id', 'quantity', 'price'];

    // Relación muchos a uno con el pedido al que pertenece este detalle.
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Relación muchos a uno con el producto relacionado con este detalle.
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
