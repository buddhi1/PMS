<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePharmacyStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create pharmacy_stores table
        Schema::create('pharmacy_stores', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pha_id');
            $table->unsignedInteger('med_id');
            $table->integer('qty');
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
        //
        Schema::drop('pharmacy_stores');
    }
}
