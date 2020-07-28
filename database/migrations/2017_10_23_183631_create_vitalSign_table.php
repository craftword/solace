<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVitalSignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vitalSigns', function (Blueprint $table) {
            $table->increments('id');
            $table->string('BloodPressure')->nullable();
            $table->string('Temperature')->nullable();
            $table->string('RespiratoryRate')->nullable();
            $table->string('PulseRate')->nullable();
            $table->string('HeartRate')->nullable();
            $table->string('Weight')->nullable();
            $table->string('Length')->nullable();
            $table->string('MUAC')->nullable();
            $table->string('HeadCircumference')->nullable();
            $table->string('AdbominalGirth')->nullable();
            $table->string('OxygenSaturation')->nullable();
            $table->string('CO2')->nullable();
            $table->string('BloodPH')->nullable();
            $table->string('FastingBloodSugar')->nullable();
            $table->string('RandomBloodSugar')->nullable();
            $table->string('FetalHeartRate')->nullable();
            $table->string('ContractionFrequency')->nullable();
            $table->string('ContractionStrength')->nullable();
            $table->string('InputVolumn')->nullable();
            $table->string('OuputVolumn')->nullable();
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
        Schema::dropIfExists('vitalSigns');
    }
}
