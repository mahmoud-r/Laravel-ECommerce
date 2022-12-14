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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name','500');
            $table->longText('description')->nullable();
            $table->text('short_description')->nullable();
            $table->integer('quantity');
            $table->decimal('price','8','2');
            $table->decimal('old_price','8','2')->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('featured')->default(0);
            $table->boolean('best_seller')->default(0);
            $table->foreignId('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreignId('Categorie_id')->references('id')->on('Categories')->onDelete('cascade');
            $table->foreignId('sub_Categorie_id')->references('id')->on('sub__categories')->onDelete('cascade');

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
        Schema::dropIfExists('prodacts');
    }
};
