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
            $table->bigInteger('customer_id') -> unsigned();
            $table->dateTime('date');
            $table->decimal('price', 8,2);
            $table->string('status') -> nullable();
            $table->string('registerby') -> nullable();
            $table->string('route') -> nullable();
            $table->timestamps();
            $table->foreign('customer_id') -> references('id') -> on('customers');
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
