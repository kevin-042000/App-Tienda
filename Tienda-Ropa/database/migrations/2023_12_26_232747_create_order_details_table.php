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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
             $table->foreignId('order_id')->constrained(); // Clave foránea que referencia al pedido al que pertenece este detalle
             $table->foreignId('product_id')->constrained(); // Clave foránea que referencia al producto relacionado con este detalle
             $table->integer('quantity');  // Cantidad de productos en este detalle
             $table->decimal('price', 8, 2); // Precio unitario en el momento del pedido
 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
