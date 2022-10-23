<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('homesliders', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('slider');
            $table->string('image');
            $table->string('link');
            $table->enum('status',[1,0],)->default(1);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('homesliders');
    }
};
