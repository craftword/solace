<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDbpToIntraoperativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('intraoperatives', function (Blueprint $table) {
            //
             $table->renameColumn('BloodPressure','SBP');
             $table->integer('DBP');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('intraoperatives', function (Blueprint $table) {
            //
        });
    }
}
