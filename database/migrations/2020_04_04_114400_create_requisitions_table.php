<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequisitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisitions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ItemName');
            $table->integer('QuantityNeeded');
            $table->text('Purposes');
            $table->string('Department');
            $table->string('StaffName');            
            $table->string('Status')->default('Active');
            $table->string('Approved')->default('Disapproved');
            $table->integer('QuantityApproved');
            $table->text('ReasonForDisapproval');
            $table->string('AprovalGivenBy');
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
        Schema::dropIfExists('requisitions');
    }
}
