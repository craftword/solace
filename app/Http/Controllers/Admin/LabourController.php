<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Labourvitalsign;
use App\Labour;
use App\Labourdoctorreview;
<<<<<<< HEAD
use App\Prescription;
use App\Postdelivery;
use App\Biodata;
use App\Clinichistory;
use App\Drugchart;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
=======
use App\Postdelivery;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35

class LabourController extends Controller
{
    //
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
        $labours = Labour::where('clinicHistory_id', $id)->get();
        $signs = Labourvitalsign::where('clinicHistory_id', $id)->get();
        $reviews = Labourdoctorreview::where('clinicHistory_id', $id)->get();
        $postdeliveries = Postdelivery::where('clinicHistory_id', $id)->get();
<<<<<<< HEAD
        $prescriptions = Prescription::where('clinicHistory_id', $id)
        ->where('section', '=', 3)
        ->get();
        

        return view('admin.labour.index', compact('id', 'labours', 'signs', 'reviews', 'postdeliveries', 'prescriptions', 'biodata'));
=======
        

        return view('admin.labour.index', compact('id', 'labours', 'signs', 'reviews', 'postdeliveries'));
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
    }

     public function nursepage($id)
    {
        if (! Gate::allows('nurse_patients')) {
            return abort(401);
        }
        
        $labours = Labour::where('clinicHistory_id', $id)->get();
        $signs = Labourvitalsign::where('clinicHistory_id', $id)->get();
        $reviews = Labourdoctorreview::where('clinicHistory_id', $id)->get();
        $postdeliveries = Postdelivery::where('clinicHistory_id', $id)->get();
<<<<<<< HEAD
        $prescriptions = Prescription::where('clinicHistory_id', $id)
        ->where('section', '=', 3)
        ->get();
        $drugcharts = Drugchart::where('clinicHistory_id', '=', $id)
            ->where('section', '=', 3)
            ->get();
        
        

        return view('admin.labour.nurse', compact('id', 'labours', 'signs', 'reviews', 'postdeliveries','prescriptions', 'drugcharts'));
=======
        

        return view('admin.labour.nurse', compact('id', 'labours', 'signs', 'reviews', 'postdeliveries'));
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
    }

    public function storeLabour(Request $request)
    {
        if (!Gate::allows('doctor_patients')) {
            return abort(401);
        }

         $labour = Labour::create($request->all());  
       
        
        return back()
            ->with('success','Labour were added successfully.');
           
    }
    public function storeSigns(Request $request)
    {
        if (!Gate::allows('nurse_patients')) {
            return abort(401);
        }

         $sign = Labourvitalsign::create($request->all());  
       
        
        return back()
            ->with('success','Vital Signs were added successfully.');
           
    }
    public function storeReviews(Request $request)
    {
        if (!Gate::allows('doctor_patients')) {
            return abort(401);
        }

         $reviews = Labourdoctorreview::create($request->all());  
       
        
        return back()
            ->with('success',' Doctor Review was added successfully.');
           
    }
<<<<<<< HEAD
     public function storePrescription(Request $request)
    {
        if (!Gate::allows('doctor_patients')) {
            return abort(401);
        }

         $reviews = Labourprescription::create($request->all());  
       
        
        return back()
            ->with('success',' Prescription was added successfully.');
           
    }
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
     public function storePostDelivery(Request $request)
    {
        if (!Gate::allows('nurse_patients')) {
            return abort(401);
        }

         $reviews = Postdelivery::create($request->all());  
       
        
        return back()
            ->with('success','Post Delivery was added successfully.');
           
    }
<<<<<<< HEAD

    public function getBirthRecords()
    {
        if (!Gate::allows('nurse_patients')) {
            return abort(401);
        }

         $births =  DB::table('biodatas')
                    ->join('clinichistories', 'biodatas.id', '=', 'clinichistories.biodata_id')
                    ->join('postdeliveries', 'clinichistories.id', '=', 'postdeliveries.clinicHistory_id')   
                    ->select('biodatas.Surname', 'biodatas.Firstname','postdeliveries.*')
                    ->get();
        
       return view('admin.labour.birth', compact('births'));
           
    }
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
}
