<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePregnancyHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pregnancyHistories', function (Blueprint $table) {
            $table->increments('id');
            $table->text('GynaecologicalHistory')->nullable();
            $table->string('LMP')->nullable();
            $table->integer('MensesDuration')->nullable();
            $table->integer('MensesFrequency')->nullable();
            $table->integer('Gravidity')->nullable();
            $table->integer('Parity')->nullable();
            $table->integer('ChildrenAlive')->nullable();
            $table->text('PastPregnancyHistory')->nullable();
            $table->text('DeliveryHistory')->nullable();
            $table->text('SystemReview')->nullable();
            $table->integer('BirthWeight')->nullable();
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
        Schema::dropIfExists('pregnancyHistories');
    }
}
