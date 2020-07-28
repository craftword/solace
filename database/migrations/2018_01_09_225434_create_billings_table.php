<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billings', function (Blueprint $table) {
            $table->increments('id');
            $table->float('ProcedureCost')->nullable();
            $table->float('DrugCost')->nullable();
            $table->float('LabCost')->nullable();
            $table->float('OverallCost')->nullable();
            $table->float('Discount')->nullable();
            $table->float('Bill')->nullable();
            $table->float('Payment')->nullable();
            $table->float('Balance')->nullable();
            $table->integer('biodata_id');
            $table->integer('clinicHistory_id');
            $table->timestamps();

            $table->foreign('biodata_id')
              ->references('biodata_id')->on('biodatas')
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
        Schema::dropIfExists('billings');
<<<<<<< HEAD
        
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
    }
}
