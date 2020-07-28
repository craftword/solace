<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffdoumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffdocuments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name');
            $table->string('Url');   
            $table->integer('staffId');
            $table->timestamps();


            $table->foreign('staffId')
              ->references('staffId')->on('humanresources')
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
        Schema::dropIfExists('staffdocuments');
    }
}
