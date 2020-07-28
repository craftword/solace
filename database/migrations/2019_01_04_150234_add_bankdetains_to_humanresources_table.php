<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBankdetainsToHumanresourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('humanresources', function (Blueprint $table) {
            //
            $table->integer('SALARYADVANCEDURATION')->default(1);
            $table->string('BANKNAME');
            $table->string('ACCOUNTNAME');
            $table->integer('ACCOUNTNUMBER');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('humanresources', function (Blueprint $table) {
            //
            $table->dropColumn('SALARYADVANCEDURATION');
            $table->dropColumn('BANKNAME');
            $table->dropColumn('ACCOUNTNAME');
            $table->dropColumn('ACCOUNTNUMBER');
        });
    }
}
