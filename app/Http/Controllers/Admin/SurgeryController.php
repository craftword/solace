<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Operative;
use App\Intraoperative;
use App\Postoperative;
use App\Postoperativeorder;
use App\Preoperative;
use App\Clinichistory;
<<<<<<< HEAD
use App\Biodata;
use App\Prescription;
use App\Drugchart;
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SurgeryController extends Controller
{
    //

    /**
     * Display Surgery Page.
     *
     * @return \Illuminate\Http\Responseec
     */
    public function index($id)
    {
        if (! Gate::allows('doctor_patients')) {
            return abort(401);
        }
<<<<<<< HEAD
        $history =  Clinichistory::find($id);
        $biodata = Biodata::find($history->biodata_id);
=======

>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
        $postoperatives = Postoperative::where('clinicHistory_id', $id)->get();
        $operatives = Operative::where('clinicHistory_id', $id)->get();
        $intraoperatives = Intraoperative::where('clinicHistory_id', $id)->get();
        $postoperativeorders = Postoperativeorder::where('clinicHistory_id', $id)->get();
        $preoperatives = Preoperative::where('clinicHistory_id', $id)->get();
<<<<<<< HEAD
        $prescriptions = Prescription::where('clinicHistory_id', $id)
        ->where('section', '=', 1)
        ->get();
        $chartintraoperatives = json_encode($intraoperatives); 
        return view('admin.surgeries.index', compact('postoperatives', 'operatives', 'intraoperatives', 'postoperativeorders', 'preoperatives', 'id', 'biodata', 'prescriptions','chartintraoperatives'));
=======

        return view('admin.surgeries.index', compact('postoperatives', 'operatives', 'intraoperatives', 'postoperativeorders', 'preoperatives', 'id'));
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
    }
     public function nursepage($id)
    {
        if (! Gate::allows('nurse_patients')) {
            return abort(401);
        }

        $postoperatives = Postoperative::where('clinicHistory_id', $id)->get();
        $operatives = Operative::where('clinicHistory_id', $id)->get();
        $intraoperatives = Intraoperative::where('clinicHistory_id', $id)->get();
        $postoperativeorders = Postoperativeorder::where('clinicHistory_id', $id)->get();
        $preoperatives = Preoperative::where('clinicHistory_id', $id)->get();
<<<<<<< HEAD
        $prescriptions = Prescription::where('clinicHistory_id', $id)
        ->where('section', '=', 1)
        ->get();

        $drugcharts = Drugchart::where('clinicHistory_id', '=', $id)
            ->where('section', '=', 1)
            ->get();
        
         $chartintraoperatives = json_encode($intraoperatives);     
        return view('admin.surgeries.nurse', compact('postoperatives', 'operatives', 'intraoperatives', 'postoperativeorders', 'preoperatives', 'id', 'drugcharts', 'prescriptions', 'chartintraoperatives'));
=======

        return view('admin.surgeries.nurse', compact('postoperatives', 'operatives', 'intraoperatives', 'postoperativeorders', 'preoperatives', 'id'));
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
    }

    public function storePreOperative(Request $request)
    {
        if (!Gate::allows('doctor_patients')) {
            return abort(401);
        }

        $Preoperative = Preoperative::create($request->all());  
       
        
        return back()
            ->with('success','Pre Operative review records was added successfully.');
           
    }

     public function storeIntraOperative(Request $request)
    {
        if (!Gate::allows('doctor_patients')) {
            return abort(401);
        }

        $Preoperative = Intraoperative::create($request->all());  
       
        
        return back()
            ->with('success','Intra Operative chart records was added successfully.');
           
    }

     public function storeOperative(Request $request)
    {
        if (!Gate::allows('doctor_patients')) {
            return abort(401);
        }

        $Operative = Operative::create($request->all());  
       
        
        return back()
            ->with('success','Intra Operative chart records was added successfully.');
           
    }
    public function storePostOperative(Request $request)
    {
        if (!Gate::allows('doctor_patients')) {
            return abort(401);
        }

        $Operative = Postoperative::create($request->all());  
       
        
        return back()
            ->with('success','Post Operative review records was added successfully.');
           
    }
    public function storePostOperativeOrder(Request $request)
    {
        if (!Gate::allows('doctor_patients')) {
            return abort(401);
        }

        $Operative = Postoperativeorder::create($request->all());  
       
        
        return back()
            ->with('success','Post Operative Order records was added successfully.');
           
    }
<<<<<<< HEAD
    public function storePrescription(Request $request)
    {
        if (!Gate::allows('doctor_patients')) {
            return abort(401);
        }

         $reviews = Surgeryprescription::create($request->all());  
       
        
        return back()
            ->with('success',' Prescription was added successfully.');
           
    }
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35

}
