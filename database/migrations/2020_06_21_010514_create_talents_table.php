<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTalentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('talents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Surname');
            $table->string('FirstName');
            $table->string('OtherName');
            $table->string('PositionRequested');
            $table->string('Appearance');
            $table->string('Communication');
            $table->string('WorkExperience');
            $table->string('SkillsAndKnowledge');
            $table->string('Attitude');
            $table->string('Education');
            $table->string('Teachability');
            $table->string('Initiative');
            $table->string('TeamSpirit');
            $table->mediumText('StrengthAndWeakness');
            $table->mediumText('CareerGoal');
            $table->mediumText('NeedAssessment');
            $table->mediumText('LearningObjectives');
            $table->mediumText('TrainingMode');
            $table->string('TrainingDuration');
            $table->mediumText('TrainingTimeline');
            $table->string('Budget');
            $table->mediumText('Evaluation');
            $table->string('StartingPosition');
            $table->string('CurrentPosition');
            $table->string('DateOfPromotion');
            $table->mediumText('interview_done_by');
            $table->mediumText('evaluation_done_by');
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
        Schema::dropIfExists('talents');
    }
}
