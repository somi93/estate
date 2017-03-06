<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estate' ,function (Blueprint $table){
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->integer('street_id')->unsigned();
            $table->foreign('street_id')->references('id')->on('street');
            $table->integer('price');
            $table->integer('area');
            $table->smallInteger('elevator');
            $table->smallInteger('internet');
            $table->smallInteger('intercom');
            $table->smallInteger('cameras');
            $table->smallInteger('climate');
            $table->smallInteger('fridge');
            $table->smallInteger('tv');
            $table->smallInteger('garage');
            $table->smallInteger('parking');
            $table->smallInteger('central_heating');
            $table->smallInteger('ta');
            $table->smallInteger('etag_heating');
            $table->smallInteger('floor_heating');
            $table->smallInteger('current_heating');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estate');
    }
}
