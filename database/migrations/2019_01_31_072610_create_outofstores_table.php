<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutofstoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outofstores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('department');
            $table->integer('quantity');
            $table->integer('pharmId');
            $table->timestamps();

             $table->foreign('pharmId')
              ->references('pharmId')->on('pharmacies')
              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outofstores');
    }
}
