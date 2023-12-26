<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'category_id'];

    //Relación muchos a uno con la categoría del producto.
    
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
}
