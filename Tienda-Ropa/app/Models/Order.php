<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'status'];

    
    // Relación uno a muchos con detalles de pedidos.
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    //Relación muchos a uno con el usuario que realizó el pedido. 
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
