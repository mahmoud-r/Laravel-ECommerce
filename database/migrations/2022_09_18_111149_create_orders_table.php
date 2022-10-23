<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('addresses_id')->references('id')->on('addresses');
            $table->string('order_number')->unique();
            $table->string('shipping_method');
            $table->string('payment_method');
            $table->foreignId('status_id')->references('id')->on('status')->onDelete('cascade');
            $table->decimal('subtotal','8','2');
            $table->decimal('total','8','2');
            $table->decimal('tax','8','2');
            $table->decimal('shipping','8','2');
            $table->date('date');
            $table->string('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
