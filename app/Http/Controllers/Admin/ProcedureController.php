<?php

namespace App\Http\Controllers\Admin;

use App\Procedure;
use App\Activity;
use App\Hmo;
use App\Addpatienthmo;
use App\Hmotariffprocedure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ProcedureController extends Controller
{
    /**
     * Display a listing of Drugs.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        if (! Gate::allows('manage_procedure')) {
=======
        if (! Gate::allows('users_manage')) {
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
            return abort(401);
        }

        $procedures = Procedure::all();

        return view('admin.procedure.index', compact('procedures'));
    }

     public function show(Request $request)
    {     
<<<<<<< HEAD
         $data = [];
         if($request->has('q')){
            $search = $request->q;
                if($request->regType  == 'HMO') {
                    $hmoname = Addpatienthmo::where('biodata_id', '=', $request->id)->first();
                    $hmo = Hmo::where('Name', '=', $hmoname->Hmo)->first();
                    $data = Hmotariffprocedure::select("id","Name", "Cost")->where('hmo_id', '=', $hmo->id)
                    ->where('Name','LIKE', $search."%") 
                    ->get();

                } 
                else

                {
                    $data = Procedure::select("id","Name", "Cost")->where('Name','LIKE', $search."%")->get();
                }

         }
        
             

        return response()->json($data);
=======
        if($request->regType  == 'HMO') {
            $hmoname = Addpatienthmo::where('biodata_id', '=', $request->id)->first();
            $hmo = Hmo::where('Name', '=', $hmoname->Hmo)->first();
            $pros = Hmotariffprocedure::where('hmo_id', '=', $hmo->id)->get();
        } 
        else 
        {
            $pros = Procedure::all();
        }
       

        return response()->json($pros);
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
    }


    /**
     * Show the form for creating new Drug.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
<<<<<<< HEAD
        if (! Gate::allows('manage_procedure')) {
=======
        if (! Gate::allows('users_manage')) {
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
            return abort(401);
        }        

        return view('admin.procedure.create');
    }

    /**
     * Store a newly created Drug in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
<<<<<<< HEAD
        if (! Gate::allows('manage_procedure')) {
=======
        if (! Gate::allows('users_manage')) {
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
            return abort(401);
        }
        $procedure = Procedure::create($request->all());
        $message = "Created new Procedure (" .$request->Name. ")";
        self::addActivity($message);
        
        return redirect()->route('admin.procedure.index');
    }


    /**
     * Show the form for editing Drug.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
<<<<<<< HEAD
        if (! Gate::allows('manage_procedure')) {
=======
        if (! Gate::allows('users_manage')) {
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
            return abort(401);
        }
        
        $procedures = Procedure::findOrFail($id);
         
        return view('admin.procedure.edit', compact('procedures'));
    }

   

    /**
     * Update Procedure in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
<<<<<<< HEAD
        if (! Gate::allows('manage_procedure')) {
=======
        if (! Gate::allows('users_manage')) {
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
            return abort(401);
        }
        $procedure = Procedure::findOrFail($id);
        $procedure->update($request->all());
        
        $message = "Edited " .$request->Name;
            self::addActivity($message);

        return redirect()->route('admin.procedure.index');
    }

    /**
     * Remove Procedure from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
<<<<<<< HEAD
        if (! Gate::allows('manage_procedure')) {
=======
        if (! Gate::allows('users_manage')) {
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
            return abort(401);
        }
        $procedure = Procedure::findOrFail($id);
        $message = "Deleted " .$request->Name;
            self::addActivity($message);

        $procedure->delete();

        return redirect()->route('admin.procedure.index');
    }

    /**
     * Delete all selected Procedure at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
<<<<<<< HEAD
        if (! Gate::allows('manage_procedure')) {
=======
        if (! Gate::allows('users_manage')) {
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Procedure::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

     public function addActivity($message) 
   {
        $activity = new Activity;
        $activity->username = Auth::user()->firstname .' ' .Auth::user()->lastname;
        $activity->action = $message;
        $activity->save();
   }

}
