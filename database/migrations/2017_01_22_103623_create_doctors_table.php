<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create doctors table

        Schema::create('doctors', function(Blueprint $table){
            $table->increment('id');
            $table->integer('user_id');     //foreign key of the related user account
            $table->string('name');
            $table->string('reg_no');
            $table->string('address');
            $table->string('city');
            $table->string('location');
            $table->timestamps();
        })
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //drop doctors table

        Schema::create('doctors');
    }
}
