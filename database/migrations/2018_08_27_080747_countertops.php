<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Countertops extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
         Schema::create('countertops', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->string('concrete')->nullable();
            $table->string('quartz')->nullable();
            $table->string('formica')->nullable();
            $table->string('granite')->nullable();
            $table->string('marble')->nullable();
            $table->string('tile')->nullable();
            $table->string('paper_Stone')->nullable();
            $table->string('butcher_Block')->nullable();
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
        Schema::dropIfExists('countertops');
    }
}