<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'type', 'street_address', 'city', 'country'];

    // Relación muchos a uno con el usuario dueño de la dirección.
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
    // Relación uno a muchos con órdenes asociadas a esta dirección.
    public function orders()
    {
        return $this->hasMany(OrderAddress::class);
    }
}
