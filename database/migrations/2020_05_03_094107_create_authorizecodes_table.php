<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorizecodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authorizecodes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('AuthCode');
            $table->string('AuthDuration');
            $table->string('AuthorizerName');
            $table->text('Report');
            $table->string('StaffName');
            $table->integer('biodata_id');
            $table->integer('clinicHistory_id');
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
        Schema::dropIfExists('authorizecodes');
    }
}
