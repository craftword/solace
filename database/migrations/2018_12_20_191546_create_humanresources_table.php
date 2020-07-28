<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHumanresourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('humanresources', function (Blueprint $table) {
             //
             $table->increments('id');
             $table->string('TITLE')->nullable();
             $table->string('SURNAME')->nullable();
             $table->string('FIRSTNAME')->nullable();
             $table->string('OTHERNAME')->nullable();
             $table->string('SEX')->nullable();
             $table->date('DATEOFBIRTH')->nullable();
             $table->string('MARITALSTATUS')->nullable();
             $table->string('PERMANENTHOMEADDRESS')->nullable();
             $table->string('PRESENTRESIDENTIALADDRESS')->nullable();
             $table->string('JOBDESCRIPTION')->nullable();
             $table->string('EMAIL')->nullable();
             $table->string('PHONENUMMBERS')->nullable();
             $table->string('STATEOFORIGIN')->nullable();
             $table->string('POSITIONINTHEORGANISATION')->nullable();
             $table->string('QUALIFICATIONS')->nullable();
             $table->date('DATEOFEMPLOYMENT')->nullable();
             $table->string('NAMEOFNEXTOFKIN')->nullable();
             $table->string('ADDRESSOFNEXTOFKIN')->nullable();
             $table->string('SIGNATURE')->nullable();
             $table->string('PHOTOGRAPH')->nullable();
             $table->string('DATEOFPROMOTIONS')->nullable();
             $table->string('DATEOFINTERVIEW')->nullable();
             $table->string('INTERVIEWCONDUCTEDBY')->nullable();
             $table->string('ORIENTATIONPERIOD')->nullable();
             $table->string('ORIENTATIONCONDUCTEDBY')->nullable();
             $table->integer('STARTINGSALARY')->nullable();
             $table->integer('SALARYINCREASE')->nullable();
             $table->date('DATEOFSALARYINCREASE')->nullable();
             $table->integer('SALARYDEDUCTION')->nullable();
             $table->integer('SALARYADVANCE')->nullable();
             $table->integer('TAX')->nullable();
             $table->string('EMPLOYMENTSTATUS')->nullable();
             $table->string('WORKHOUR')->nullable();
             $table->string('Thumbprint')->nullable();
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
       Schema::dropIfExists('humanresources');
    }
}
