<?php

namespace App\Http\Controllers\Admin;

use App\Labtest;
use App\Activity;
use App\Biodata;
use App\Hmo;
<<<<<<< HEAD
use App\Clinichistory;
use App\Addpatienthmo;
use App\Hmotarifflab;
use App\Fileupload;
use Illuminate\Support\Facades\DB;
=======
use App\Addpatienthmo;
use App\Hmotarifflab;
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class LaboratoryController extends Controller
{
    /**
     * Display a listing of Drugs.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('manage_lab')) {
            return abort(401);
        }

        $Labs = Labtest::all();

        return view('admin.laboratories.index', compact('Labs'));
    }

     public function show(Request $request)
    {
        if($request->regType  == 'HMO') {
            $hmoname = Addpatienthmo::where('biodata_id', '=', $request->id)->first();
            $hmo = Hmo::where('Name', '=', $hmoname->Hmo)->first();
            $Labs = Hmotarifflab::where('hmo_id', '=', $hmo->id)->get();
        } 
        else 
        {
            $Labs = Labtest::all();
        
        }
        return response()->json($Labs);
    }

    /**
     * Show the form for creating new Drug.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('manage_lab')) {
            return abort(401);
        }        

        return view('admin.laboratories.create');
    }

    /**
     * Store a newly created Drug in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('manage_lab')) {
            return abort(401);
        }
        $pharmacy = Labtest::create($request->all());
        $message = "Created new Labtest (" .$request->LabTestName. ")";
        self::addActivity($message);
        
        return redirect()->route('admin.laboratories.index');
    }


    /**
     * Show the form for editing Drug.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('manage_lab')) {
            return abort(401);
        }
        
        $Labs = Labtest::findOrFail($id);
         
        return view('admin.laboratories.edit', compact('Labs'));
    }

    

    /**
     * Update Test in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (! Gate::allows('manage_lab')) {
            return abort(401);
        }
        $Labs = Labtest::findOrFail($id);
        $Labs->update($request->all());
        
        $message = "Edited " .$request->LabTestName;
            self::addActivity($message);

        return redirect()->route('admin.laboratories.index');
    }

    /**
     * Remove Test from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (! Gate::allows('manage_lab')) {
            return abort(401);
        }
        $Labs = Labtest::findOrFail($id);
        $message = "Deleted " .$request->LabTestName;
            self::addActivity($message);

        $Labs->delete();

        return redirect()->route('admin.laboratories.index');
    }

    /**
     * Delete all selected Pharmacy at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('manage_lab')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Labtest::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

<<<<<<< HEAD

    public function getFileUpload(Request $request)
        
    {
        
        /*$labfiles = Fileupload::all();
        $names = Biodata::with('clinichistory')->get();
        */

        $labfiles = DB::table('biodatas')
            ->join('clinichistories', 'biodatas.id', '=', 'clinichistories.biodata_id')
            ->join('fileuploads', 'clinichistories.id', '=', 'fileuploads.clinicHistory_id')
            ->select('biodatas.Surname', 'biodatas.Firstname','fileuploads.*')
            ->get();

        return view('admin.laboratories.document', compact('labfiles'));
    }

=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
     public function addActivity($message) 
   {
        $activity = new Activity;
        $activity->username = Auth::user()->firstname .' ' .Auth::user()->lastname;
        $activity->action = $message;
        $activity->save();
   }

}










