<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaboratoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laboratories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('LabTestName')->nullable();
            $table->string('Result')->nullable();
            $table->string('Reference')->nullable();
            $table->float('LabCost')->nullable();
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
        Schema::dropIfExists('laboratories');
    }
}
