<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePharmaciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('register_number');
            $table->string('name');
            $table->text('address');
            $table->string('city');
            $table->string('location');
            $table->boolean('availability');
            $table->integer('minimum_qty'); 
            $table->time('opening_time');
            $table->time('closing_time');
            $table->boolean('status');
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
        Schema::drop('pharmacies');
    }
}
