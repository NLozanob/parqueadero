<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
   
    public function up(): void {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id')->unsigned();
            $table->dateTime('date');
            $table->decimal('value', 8, 2);
            $table->string('status')->nullable();
            $table->bigInteger('registered_by')->unsigned()->nullable();
            $table->string('route')->nullable();
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('registered_by')->references('id')->on('users');
        });
    }
    

    public function down(): void{
        Schema::dropIfExists('orders');
    }
};