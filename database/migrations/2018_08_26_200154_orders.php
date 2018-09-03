<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->enum('bedrooms', ['1', '2', '3', '4']);
            $table->enum('bathrooms', ['1', '1.5', '2', '2.5', '3']);
            $table->integer('zip');
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('streetAddress')->nullable();
            $table->integer('apt')->nullable();
            $table->string('city')->nullable();
            $table->integer('homeSquare')->nullable();
            $table->string('mobPhon' , 20)->nullable();
            $table->string('frequency')->nullable();
            $table->string('date')->nullable();
            $table->string('advertis')->nullable();
            $table->string('pet')->nullable();
            $table->string('adult')->nullable();
            $table->string('children')->nullable();
            $table->string('dirty')->nullable();
            $table->string('chek')->nullable(); // professional cleaning
            $table->tinyInteger('steel')->nullable();
            $table->tinyInteger('stove')->nullable();
            $table->tinyInteger('door')->nullable();
            $table->tinyInteger('mildew')->nullable();
            $table->string('attention', 900)->nullable();
            $table->string('more', 900)->nullable();





            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *user_id~
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
