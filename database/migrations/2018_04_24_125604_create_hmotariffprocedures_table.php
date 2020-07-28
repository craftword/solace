<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHmotariffproceduresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hmotariffprocedures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name')->nullable();
            $table->float('Cost')->nullable();
            $table->integer('hmo_id');
            $table->timestamps();

             $table->foreign('hmo_id')
              ->references('hmo_id')->on('hmos')
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
        Schema::dropIfExists('hmotariffprocedures');
    }
}
