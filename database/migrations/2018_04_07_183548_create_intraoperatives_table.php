<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntraoperativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intraoperatives', function (Blueprint $table) {
            $table->increments('id');
            $table->string('BloodPressure');
            $table->string('RespiratoryRate');
            $table->string('HeartRate');
            $table->string('CO2');
            $table->string('O2');
            $table->string('BloodPH');
            $table->integer('clinicHistory_id');
            $table->timestamps();

             $table->foreign('clinicHistory_id')
              ->references('clinicHistory_id')->on('clinicHistories')
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
        Schema::dropIfExists('intraoperatives');
    }
}
