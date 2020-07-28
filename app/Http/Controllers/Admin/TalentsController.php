<?php

namespace App\Http\Controllers\Admin;

use App\Talent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class TalentsController extends Controller
{
    public function index()
    {
        $trainings = Talent::all();
        return view('admin.talent.index', compact('trainings', 'entryInterview'));
    }


    public function show()
    {
        $manplanning = Talent::all();
        
        return view('admin.talent.planning', compact('manplanning'));
        
    }
    

    public function store(Request $request)
    {
        $talent = Talent::all();

        $trainings = new talent; 
        $trainings->Surname = $request->Surname;
        $trainings->FirstName = $request->FirstName;
        $trainings->OtherName = $request->OtherName;
        $trainings->PositionRequested = $request->PositionRequested;
        $trainings->Appearance = $request->Appearance;
        $trainings->Communication = $request->Communication;
        $trainings->WorkExperience = $request->WorkExperience;
        $trainings->SkillsAndKnowledge = $request->SkillsAndKnowledge;
        $trainings->Attitude = $request->Attitude;
        $trainings->Education = $request->Education;
        $trainings->Teachability = $request->Teachability;
        $trainings->Initiative = $request->Initiative;
        $trainings->TeamSpirit = $request->TeamSpirit;
        $trainings->StrengthAndWeakness = $request->StrengthAndWeakness;
        $trainings->CareerGoal = $request->CareerGoal;
        $trainings->SalaryExpectation = $request->SalaryExpectation;
        $trainings->interview_done_by	 = $request->interview_done_by;

        $trainings->save();

        return back()
        ->with('success','Talent Record saved successfully');
        }

}