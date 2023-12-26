<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->constrained(); // Clave foránea que referencia al carrito al que pertenece este elemento
            $table->foreignId('product_id')->constrained(); // Clave foránea que referencia al producto relacionado con este elemento
            $table->integer('quantity'); // Cantidad de productos en este elemento del carrito
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
