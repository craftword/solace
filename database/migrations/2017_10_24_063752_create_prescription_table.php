<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrescriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('DrugRoute');
            $table->string('DrugName');
            $table->integer('DrugDose');
            $table->string('DrugDoseUnit');
            $table->integer('DrugFrequency');
            $table->string('DrugFrequencyUnit');
            $table->integer('DrugDuration');
            $table->string('DrugDurationUnit');
            $table->float('Cost');
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
        Schema::dropIfExists('prescriptions');
    }
}
