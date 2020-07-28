<?php

namespace App\Http\Controllers\Admin;

use App\Performance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PerformancesController extends Controller
{
    //
    public function index()
    {
        $performance = Performance::all();

        return view('admin.performance.index', compact('performance'));
    }

    public function show()
    {
        $appraises = Performance::all();
        
        return view('admin.performance.appraisal', compact('appraises'));
        
    }

    public function store(Request $request)
    {
        
        $performances = new Performance; 
        $performances->Appraisee = $request->Appraisee;
        $performances->Competency = $request->Competency;
        $performances->QualityOfWork = $request->QualityOfWork;
        $performances->QuantityOfWork = $request->QuantityOfWork;
        $performances->Organisation = $request->Organisation;
        $performances->Initiative = $request->Initiative;
        $performances->Dedication = $request->Dedication;
        $performances->ProblemSolving = $request->ProblemSolving;
        $performances->Creativity = $request->Creativity;
        $performances->Teamwork = $request->Teamwork;
        $performances->InterpersonalSkills = $request->InterpersonalSkills;
        $performances->OralCommunication = $request->OralCommunication;
        $performances->VerbalCommunication = $request->VerbalCommunication;
        $performances->EmotionalIntelligence = $request->EmotionalIntelligence;
        $performances->OverallRating = $request->OverallRating;
        $performances->Recommendation = $request->Recommendation;
        $performances->ActionPlan = $request->ActionPlan;
        $performances->AppraiserName = $request->Appraisername;

        $performances->save();

        return back()
        ->with('success','Performance Record saved successfully');
    }

    public function edit($id)
    {
      //
    }

    public function update(Request $request, $id)
    {
       //
        return redirect()->route('admin.performance.index');

    }
  
    
}
