<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Floorings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
         Schema::create('floorings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->string('hardwood')->nullable();
            $table->string('cork')->nullable();
            $table->string('vinyl')->nullable();
            $table->string('concrete')->nullable();
            $table->string('carpet')->nullable();
            $table->string('natural_stone')->nullable();
            $table->string('tile')->nullable();
            $table->string('laminate')->nullable();


            $table->timestamp('created_at')->nullable();
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('floorings');
    }
}
