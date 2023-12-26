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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nombre del producto
            $table->text('description'); // Descripción detallada del producto
            $table->decimal('price', 8, 2); // Precio del producto con 8 dígitos, 2 decimales
            $table->foreignId('category_id')->constrained('product_categories');  // Clave foránea que referencia a la categoría del producto
  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
