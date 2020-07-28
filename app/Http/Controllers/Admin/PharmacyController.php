<?php

namespace App\Http\Controllers\Admin;

use App\Pharmacy;
use App\Activity;
use App\Hmo;
use App\Addpatienthmo;
use App\Hmotariffdrug;
<<<<<<< HEAD
use Carbon\Carbon;
use App\Despence;
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class PharmacyController extends Controller
{
    /**
     * Display a listing of Drugs.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('manage_pharmacy')) {
            return abort(401);
        }

        $drugs = Pharmacy::all();

        return view('admin.pharmacy.index', compact('drugs'));
    }

    /**
     * Show the form for creating new Drug.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('manage_pharmacy')) {
            return abort(401);
        }        

        return view('admin.pharmacy.create');
    }

    /**
     * Store a newly created Drug in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('manage_pharmacy')) {
            return abort(401);
        }
        $pharmacy = Pharmacy::create($request->all());
        $message = "Created new Drug (" .$request->BrandName. ")";
        self::addActivity($message);
        
        return redirect()->route('admin.pharmacy.index');
    }


    /**
     * Show the form for editing Drug.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('manage_pharmacy')) {
            return abort(401);
        }
        
        $drugs = Pharmacy::findOrFail($id);
         
        return view('admin.pharmacy.edit', compact('drugs'));
    }

    /**
     * Show a single Drug.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('manage_pharmacy')) {
            return abort(401);
        }
        
        $drugs = Pharmacy::findOrFail($id);

        return view('admin.pharmacy.view', compact('drugs'));
    }

    /**
     * Update Drug in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (! Gate::allows('manage_pharmacy')) {
            return abort(401);
        }
        $pharmacy = Pharmacy::findOrFail($id);
        $pharmacy->update($request->all());
        
        $message = "Edited " .$request->BrandName;
            self::addActivity($message);

        return redirect()->route('admin.pharmacy.index');
    }

    /**
     * Remove Drug from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (! Gate::allows('manage_pharmacy')) {
            return abort(401);
        }
        $pharmacy = Pharmacy::findOrFail($id);
        $message = "Deleted " .$request->BrandName;
            self::addActivity($message);

        $pharmacy->delete();

        return redirect()->route('admin.pharmacy.index');
    }

    /**
     * Delete all selected Pharmacy at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('manage_pharmacy ')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Pharmacy::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

     public function getDrugs(Request $request)
    {    
<<<<<<< HEAD
         
          $data = [];
         if($request->has('q')){
            $search = $request->q;
                if($request->regType  == 'HMO') {
                    $hmoname = Addpatienthmo::where('biodata_id', '=', $request->id)->first();
                    $hmo = Hmo::where('Name', '=', $hmoname->Hmo)->first();
                    $data = Hmotariffdrug::select("id","DrugName", "UnitCost")->where('hmo_id', '=', $hmo->id)
                    ->where('DrugName','LIKE', $search."%") 
                    ->get();
                    
                  // $data  = $hmo;
                } 
                else

                {
                    $data = Pharmacy::select("id","DrugName", "UnitCost")->where('DrugName','LIKE', $search."%")->get();
                }
               
            
       
           
        }

        return response()->json($data);
    }

    public function expireDrugs(Request $request){
         $current = Carbon::now()->toDateString();
         $drugs = Pharmacy::where('ExpiryDate', '<', $current)->get();
         return view('admin.pharmacy.expire', compact('drugs'));
=======
        
        if($request->regType  == 'HMO') {
            $hmoname = Addpatienthmo::where('biodata_id', '=', $request->id)->first();
            $hmo = Hmo::where('Name', '=', $hmoname->Hmo)->first();
            $tariff = Hmotariffdrug::where('hmo_id', '=', $hmo->id)->get();

        } 
        else 
        {
            $tariff = Pharmacy::all();
        }
       

        return response()->json($tariff);
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
    }

     public function addActivity($message) 
   {
        $activity = new Activity;
        $activity->username = Auth::user()->firstname .' ' .Auth::user()->lastname;
        $activity->action = $message;
        $activity->save();
   }

<<<<<<< HEAD
   // All Drug Dispensed
   public function allDispenseDrug()
   {
       if (! Gate::allows('manage_pharmacy')) {
           return abort(401);
       }

       $drugs = Despence::all();

       return view('admin.pharmacy.dispense', compact('drugs'));
   }

=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
}
