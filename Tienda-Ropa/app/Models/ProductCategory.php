<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'order'];

    // Relación uno a muchos con productos.
     
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
