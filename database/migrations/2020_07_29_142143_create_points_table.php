<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('points', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('club_id')->unsigned();
            $table->integer('played');
            $table->integer('won');
            $table->integer('drawn');
            $table->integer('lost');
            $table->integer('gf');
            $table->integer('ga');
            $table->integer('gd');
            $table->integer('points');
            $table->integer('position');
            $table->integer('week');
            $table->integer('season');
            $table->timestamps();


        });
        Schema::table('points', function ($table) {
            $table->foreign('club_id')->references('id')->on('clubs');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('puans');
    }
}
