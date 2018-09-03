<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Extras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('extras', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->string('inside_fridge')->nullable();
            $table->string('inside_oven')->nullable();
            $table->string('garage_swept')->nullable();
            $table->string('inside_cabinets')->nullable();
            $table->string('laundry_wash_s_dry')->nullable();
            $table->string('bed_sheet_change')->nullable();
            $table->string('blinds_cleaning')->nullable();
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
        Schema::dropIfExists('extras');
    }
}