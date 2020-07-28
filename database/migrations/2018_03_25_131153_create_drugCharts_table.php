<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrugChartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drugCharts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Dose')->nullable();
            $table->string('Zero')->default('no');
            $table->string('One')->default('no');
            $table->string('Two')->default('no');
            $table->string('Three')->default('no');
            $table->string('Four')->default('no');
            $table->string('Five')->default('no');
            $table->string('Six')->default('no');
            $table->string('Seven')->default('no');
            $table->string('Eigth')->default('no');
            $table->string('Nine')->default('no');
            $table->string('Ten')->default('no');
            $table->string('Eleven')->default('no');
            $table->string('Twelve')->default('no');
            $table->string('Thirdteen')->default('no');
            $table->string('Fourteen')->default('no');
            $table->string('Fifteen')->default('no');
            $table->string('Sixteen')->default('no');
            $table->string('Seventeen')->default('no');
            $table->string('Eighteen')->default('no');
            $table->string('Nineteen')->default('no');
            $table->string('Twenty')->default('no');
            $table->string('TwentyOne')->default('no');
            $table->string('TwentyTwo')->default('no');
            $table->string('TwentyThree')->default('no');
            $table->string('TwentyFour')->default('no');
            $table->integer('day');
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
        Schema::dropIfExists('drugCharts');
    }
}
