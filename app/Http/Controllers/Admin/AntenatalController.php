<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Antenatal;
use App\Antenatalvisit;
use App\Biodata;
use App\Clinichistory;
<<<<<<< HEAD
use App\Prescription;
use App\Drugchart;
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AntenatalController extends Controller
{
    //
    public function index($id)
    {
        if (! Gate::allows('doctor_patients')) {
            return abort(401);
        }

        $history =  Clinichistory::find($id);
        $biodata = Biodata::find($history->biodata_id);
        $antenatals = Antenatal::where('clinicHistory_id', $id)->get();
        $antenatalvisits = Antenatalvisit::where('clinicHistory_id', $id)->get();
<<<<<<< HEAD
        $antenatalupdate = Antenatalvisit::where('clinicHistory_id', $id)->latest()->first();
        $prescriptions = Prescription::where('clinicHistory_id', $id)
        ->where('section', '=', 2)
        ->get();
         if ($antenatalupdate == null) {
            return back()
            ->with('success', 'No record yet');
        }else 
        {
            $antenatalatest = $antenatalupdate; 
        }

        return view('admin.antenatal.index', compact('id', 'biodata', 'antenatals', 'antenatalvisits', 'antenatalatest', 'prescriptions'));
=======
        

        return view('admin.antenatal.index', compact('id', 'biodata', 'antenatals', 'antenatalvisits'));
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
    }
     public function nursepage($id)
    {
        if (! Gate::allows('nurse_patients')) {
            return abort(401);
        }

        $history =  Clinichistory::find($id);
        $biodata = Biodata::find($history->biodata_id);
        $antenatals = Antenatal::where('clinicHistory_id', $id)->get();
        $antenatalvisits = Antenatalvisit::where('clinicHistory_id', $id)->get();
<<<<<<< HEAD
        $prescriptions = Prescription::where('clinicHistory_id', $id)
        ->where('section', '=', 2)
        ->get();
        $drugcharts = Drugchart::where('clinicHistory_id', '=', $id)
            ->where('section', '=', 2)
            ->get();
        
        

        return view('admin.antenatal.nurse', compact('id', 'biodata', 'antenatals', 'antenatalvisits', 'prescriptions', 'drugcharts'));
=======
        

        return view('admin.antenatal.nurse', compact('id', 'biodata', 'antenatals', 'antenatalvisits'));
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
    }
     public function storeAntenatal(Request $request)
    {
        if (!Gate::allows('doctor_patients')) {
            return abort(401);
        }

         $antenatal = Antenatal::create($request->all());  
       
        
        return back()
            ->with('success','Antenatal records was added successfully.');
           
    }
     public function storeAntenatalVisits(Request $request)
    {
<<<<<<< HEAD
        if (!Gate::allows('nurse_patients')) {
=======
        if (!Gate::allows('doctor_patients')) {
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
            return abort(401);
        }

         $antenatal = Antenatalvisit::create($request->all());  
       
        
        return back()
            ->with('success','Antenatal Visits records was added successfully.');
           
    }

<<<<<<< HEAD
     public function updateAntenatalVisits(Request $request, $id)
    {
        if (!Gate::allows('doctor_patients')) {
            return abort(401);
        }

        $antenatal = Antenatalvisit::findOrFail($id);          
        $antenatal->update($request->all()); 
       
        
        return back()
            ->with('success','Antenatal Visits records was updated successfully.');
           
    }

=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
}
