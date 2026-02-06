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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            // Tracking: Indexado para búsquedas rápidas
            $table->string('tracking_code', 20)->unique();

            // Relaciones
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            // Estado ACTUAL (para no tener que buscar el último historial siempre)
            $table->foreignId('order_status_id')->constrained('order_statuses');

            // Datos del Cliente
            $table->string('customer_name');
            $table->string('customer_email')->nullable();
            $table->string('customer_phone');
            $table->string('customer_address');

            // Datos del Envío
            $table->string('destination');
            $table->text('observation')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
