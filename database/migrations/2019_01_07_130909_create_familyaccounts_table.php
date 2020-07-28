<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamilyaccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('familyaccounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('famId'); // family Id
            $table->string('activity');
            $table->float('amount');
            $table->timestamps();

            $table->foreign('famId')
              ->references('famId')->on('familycards')
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
        Schema::dropIfExists('familyaccounts');
    }
}
