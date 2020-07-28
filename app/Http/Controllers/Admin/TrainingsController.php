<?php

namespace App\Http\Controllers\Admin;

use App\Talent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TrainingsController extends Controller
{
    public function index()
    {
        $development = Talent::all();
        return view('admin.development.index');
    }

    public function store(Request $request)
    {
        $development = new talent; 
        $development->Surname = $request->Surname;
        $development->FirstName = $request->FirstName;
        $development->NeedAssessment = $request->NeedAssessment;
        $development->LearningObjectives = $request->LearningObjectives;
        $development->TrainingMode = $request->TrainingMode;
        $development->TrainingDuration = $request->TrainingDuration;
        $development->TrainingTimeline = $request->TrainingTimeline;
        $development->Budget = $request->Budget;
        $development->Evaluation = $request->Evaluation;
        $development->evaluation_done_by = $request->evaluation_done_by;
        
        
        $development->save();
        
        return back()
        ->with('success','Training Record saved successfully');
    } 
}
