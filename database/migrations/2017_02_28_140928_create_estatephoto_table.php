<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstatephotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estate_photo' ,function (Blueprint $table){
            $table->increments('id');
            $table->string('photo');
            $table->integer('estate_id')->unsigned();
            $table->foreign('estate_id')->references('id')->on('estate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estate_photo');
    }
}
