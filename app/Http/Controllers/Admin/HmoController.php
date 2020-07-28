<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Hmo;
<<<<<<< HEAD
use App\Biodata;
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
use App\Hmoplan;
use App\Hmotariffdrug;
use App\Hmotarifflab;
use App\Hmotariffprocedure;
<<<<<<< HEAD
use App\Authorizecode;
use App\Clinichistory;
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use DB;
use Importer;

class HmoController extends Controller
{
    //
    public function index()
    {
        if (! Gate::allows('manage_hmo')) {
            return abort(401);
        }
        
        $hmos = Hmo::all();
        $hmoName = Hmo::all()->pluck('Name', 'id');
        return view('admin.hmos.index', compact('hmos', 'hmoName'));
    }
    public function create()
    {
        if (! Gate::allows('manage_hmo')) {
            return abort(401);
        }        

        return view('admin.hmos.create');
    }
     public function store(Request $request)
    {
        if (! Gate::allows('manage_hmo')) {
            return abort(401);
        }
        $hmo = Hmo::create($request->all());
        
        
        return redirect()->route('admin.hmos.index');
    }
     public function edit($id)
    {
        if (! Gate::allows('manage_hmo')) {
            return abort(401);
        }
        
        $hmos = Hmo::findOrFail($id);
         
        return view('admin.hmos.edit', compact('hmos'));
    }

    public function update(Request $request, $id)
    {
        if (! Gate::allows('manage_hmo')) {
            return abort(401);
        }
        $Labs = Hmo::findOrFail($id);
        $Labs->update($request->all());
        
        

        return redirect()->route('admin.hmos.index');
    }
    public function destroy(Request $request, $id)
    {
        if (! Gate::allows('manage_hmo')) {
            return abort(401);
        }
        $hmos = Hmo::findOrFail($id);       

        $hmos->delete();

        return redirect()->route('admin.hmos.index');
    }
    public function importfileDrug(Request $request)
    {
        if (! Gate::allows('manage_hmo')) {
            return abort(401);
        }
       
        $file = $request->thefile;
        $excel = Importer::make('Excel');
        $path = "C:/wamp/www/solace/public/file/". $file;
        $excel->load($path);
        $collection = $excel->getCollection();
        foreach ($collection as $item) {
              
              $insert[] = ['DrugName' => $item[0],'DrugType' => $item[1], 'UnitCost' => $item[2], 'hmo_id' => $request->hmoName];
        }
        if(!empty($insert)){
					DB::table('hmotariffdrugs')->insert($insert);
					//dd('Insert Record successfully.');
		}     
      
            return back();
        
        
    }

     public function importfileProcedure(Request $request)
    {
        if (! Gate::allows('manage_hmo')) {
            return abort(401);
        }
       
        $file = $request->thefile;
        $excel = Importer::make('Excel');
        $path = "C:/wamp/www/solace/public/file/". $file;
        $excel->load($path);
        $collection = $excel->getCollection();
        foreach ($collection as $item) {
              
<<<<<<< HEAD
              $insert[] = ['Name' => $item[0],'Cost' => $item[1], 'hmo_id' => $request->hmoName];
=======
              $insert[] = ['ProcedureName' => $item[0],'ProcedurePrice' => $item[1], 'hmo_id' => $request->hmoName];
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
        }
        if(!empty($insert)){
					DB::table('hmotariffprocedures')->insert($insert);
					//dd('Insert Record successfully.');
		}     
      
        return back();
        
    }
     public function importfileLab(Request $request)
    {
        if (! Gate::allows('manage_hmo')) {
            return abort(401);
        }
       
        $file = $request->thefile;
        $excel = Importer::make('Excel');
        $path = "C:/wamp/www/solace/public/file/". $file;
        $excel->load($path);
        $collection = $excel->getCollection();
        foreach ($collection as $item) {
              
<<<<<<< HEAD
              $insert[] = ['LabTestName' => $item[0], 'Reference' => $item[1], 'LabCost' => $item[2],'hmo_id' => $request->hmoName];
        }
        if(!empty($insert)){
					DB::table('hmotarifflabs')->insert($insert);
//dd('Insert Record successfully.');
=======
              $insert[] = ['LabName' => $item[0],'LabCost' => $item[1],'hmo_id' => $request->hmoName];
        }
        if(!empty($insert)){
					DB::table('hmotarifflabs')->insert($insert);
					dd('Insert Record successfully.');
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
		}     
      
        return back();
        
    }

     public function addPlan(Request $request)
    {
        if (! Gate::allows('manage_hmo')) {
            return abort(401);
        }
         $rows = $request->input('rows');
             foreach ($rows as $row)
            {
                $plan[] = [
                    'hmo_id' => $request->input('hmoName'),
                    'Plan' => $row,
                 ];
            }
            Hmoplan::insert($plan);
        
        
        return back();
    }
     public function getPlan(Request $request)
    {
        if (! Gate::allows('manage_hmo')) {
            return abort(401);
        }
        $id = $request->id;
        $plan = Hmo::find($id)->plan;
        
        
        return response()->json($plan);
    }

<<<<<<< HEAD
    public function getAuthCode()
    {
        if (! Gate::allows('manage_hmo')) {
            return abort(401);
        }

        $patients = Biodata::with('lastestBill')
        ->where('Status', '=', 'checked')
        ->get();
        return view('admin.hmos.authcode', compact('patients'));       
        
        
    }

    public function saveAuthCode(Request $request)
    {
        if (! Gate::allows('manage_hmo')) {
            return abort(401);
        }

        Clinichistory::where('id', $request->clinicHistory_id)
              ->update(['AuthCode' => $request->AuthCode]);
       
        $auth = new Authorizecode;
        $auth->AuthCode = $request->AuthCode;
        $auth->AuthDuration = $request->AuthDuration;
        $auth->AuthorizerName = $request->AuthorizerName;
        $auth->Report = $request->Report;
        $auth->StaffName = Auth::user()->firstname .' ' .Auth::user()->lastname;
        $auth->biodata_id = $request->biodata_id;
        $auth->clinicHistory_id = $request->clinicHistory_id;        
        
        $auth->save();      
        
        return back();
        
    }

    public function getlogAuthCode()
    {
        if (! Gate::allows('manage_hmo')) {
            return abort(401);
        }

        $authcodes =  DB::table('biodatas')
        ->join('authorizecodes', 'biodatas.id', '=', 'authorizecodes.biodata_id')
        ->select('biodatas.Surname', 'biodatas.Firstname', 'authorizecodes.*')        
        ->get();

        //dd($authcodes);
        return view('admin.hmos.logauthcode', compact('authcodes'));       
        
    }  

=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
}
