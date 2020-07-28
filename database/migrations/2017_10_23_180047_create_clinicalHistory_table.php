<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicalHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinicHistories', function (Blueprint $table) {
            $table->increments('id');
            $table->text('PresentingComplaint')->nullable();
            $table->text('HistoryPC')->nullable();
            $table->text('FamilyHistory')->nullable();
            $table->text('SocialHistory')->nullable();
            $table->text('PastMedicalHistory')->nullable();
            $table->text('PastSurgicalHistory')->nullable();
            $table->text('DrugHistory')->nullable();
            $table->text('AllergyHistory')->nullable();
            $table->string('user_name')->nullable();
            $table->integer('biodata_id');
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
        Schema::dropIfExists('clinicHistories');
    }
}
