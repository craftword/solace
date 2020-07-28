<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddpatienthmosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addpatienthmos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Hmo');
            $table->string('Plan');
             $table->integer('biodata_id');
            $table->timestamps();

             $table->foreign('biodata_id')
              ->references('biodata_id')->on('biodata')
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
        Schema::dropIfExists('addpatienthmos');
    }
}
