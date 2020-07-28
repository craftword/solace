<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTerminationrecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terminationrecords', function (Blueprint $table) {
            $table->increments('id');
            $table->date('lastDayAtWork');
            $table->date('lastDayOnBenefit');
            $table->date('releaseDate');
            $table->string('terminationType');
            $table->string('terminationReason');
            $table->string('severancePaid');
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
        Schema::dropIfExists('terminationrecords');
    }
}
