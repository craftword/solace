<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExaminationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examinations', function (Blueprint $table) {
            $table->increments('id');
            $table->text('GeneralPhysical')->nullable();
            $table->text('Cardiovascular')->nullable();
            $table->text('Neurologic')->nullable();
            $table->text('Musculoskeletal')->nullable();
            $table->text('Respiratory')->nullable();
            $table->text('Abdomial')->nullable();
            $table->text('MentalState')->nullable();
            $table->text('ENT')->nullable();
            $table->text('Eye')->nullable();
            $table->text('Dental')->nullable();
            $table->text('Chest')->nullable();
            $table->text('Neck')->nullable();
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
        Schema::dropIfExists('examinations');
    }
}
