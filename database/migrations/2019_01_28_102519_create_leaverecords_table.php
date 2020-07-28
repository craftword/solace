<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaverecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaverecords', function (Blueprint $table) {
            $table->increments('id');
            $table->date('startDate');
            $table->date('expectedReturnDate');
            $table->date('actualReturnDate');
            $table->string('leaveDetails');
            $table->string('reason');
            $table->string('paidLeave');
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
        Schema::dropIfExists('leaverecords');
    }
}
