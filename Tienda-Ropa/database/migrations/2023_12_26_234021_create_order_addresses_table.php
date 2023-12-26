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
        Schema::create('order_addresses', function (Blueprint $table) {
            $table->id();
             $table->foreignId('order_id')->constrained();   // Clave foránea que referencia al pedido al que pertenece esta dirección
             $table->foreignId('address_id')->constrained();  // Clave foránea que referencia a la dirección asociada
             $table->string('type');           // Tipo de dirección (envío o facturación)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_addresses');
    }
};
