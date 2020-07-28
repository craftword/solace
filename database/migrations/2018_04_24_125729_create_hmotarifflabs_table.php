<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHmotarifflabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hmotarifflabs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('LabTestName')->nullable();
            $table->string('Reference')->nullable();
            $table->float('LabCost')->nullable();
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
        Schema::dropIfExists('hmotarifflabs');
    }
}
