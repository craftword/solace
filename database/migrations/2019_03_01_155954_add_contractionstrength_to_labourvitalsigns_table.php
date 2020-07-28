<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContractionstrengthToLabourvitalsignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('labourvitalsigns', function (Blueprint $table) {
            //
            $table->integer('Contractionstrength');
            $table->renameColumn('BP','SBP');
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
        Schema::table('labourvitalsigns', function (Blueprint $table) {
            //
        });
    }
}
