<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiodataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodatas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Surname');
            $table->string('Firstname');
            $table->string('Middlename');
            $table->date('Birthdate');
            $table->string('Sex');
            $table->string('Address');
            $table->string('PhoneNumber');
            $table->string('Email');
            $table->string('Religion');
            $table->string('Occupation');
            $table->string('StateOfOrigin');
            $table->string('Nationality');
            $table->string('RegistrationType');
            $table->string('NextOfKin');
            $table->string('NextOfKinAddress');
            $table->string('NextOfKinPhone');
            $table->string('Status');
            $table->string('Photograph')->nullable();
            $table->string('Signature')->nullable();
            $table->string('ThumbPrint')->nullable();
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
        Schema::dropIfExists('biodatas');
    }
}
