<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReconcillationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reconcillations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name');
            $table->double('Amount');
            $table->string('ReferenceNumber');
            $table->string('PaymentType');
            $table->string('PaymentStatus');
            $table->string('RegistrationType');
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
        Schema::dropIfExists('reconcillations');
    }
}
