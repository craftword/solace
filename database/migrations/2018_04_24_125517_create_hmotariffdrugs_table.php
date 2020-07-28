<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHmotariffdrugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hmotariffdrugs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('DrugName');
            $table->string('DrugType');
            $table->float('UnitCost');
            $table->integer('hmo_id');
            $table->timestamps();

             $table->foreign('hmo_id')
              ->references('hmo_id')->on('hmos')
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
        Schema::dropIfExists('hmotariffdrugs');
    }
}
