<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerformancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Job Knowledge');
            $table->string('Competency');
            $table->string('Quality of Work');
            $table->string('Quantity of Work');
            $table->string('Organisation');
            $table->string('Initiative');
            $table->string('Dedication');
            $table->string('Problem Solving');
            $table->string('Creativity');
            $table->string('Teamwork');
            $table->string('Interpersonal Skills');
            $table->string('Oral Communication');
            $table->string('Verbal Communication');
            $table->string('Emotional Intelligence');
            $table->string('Overall Rating');
            $table->mediumText('Recommendation');
            $table->mediumText('Action Plan');
            $table->string('Appraiser Name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('performances');
    }
}
