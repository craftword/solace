<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Biodata;
use App\Clinichistory;
use App\Billing;
use App\Pharmacy;
use App\Activity;
use Carbon\Carbon;
<<<<<<< HEAD
use App\Labourprescription;
use App\Surgeryprescription;
use App\Familycard;
use App\Familyaccount;
use App\Familymember;
use App\Outstanding;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Collection;
=======
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BillingController extends Controller
{

	 public function index()
    {
        if (! Gate::allows('manage_billings')) {
            return abort(401);
<<<<<<< HEAD
        } 

    
        $patients = Biodata::with('lastestBill')
        ->where('Status', '=', 'checked')
        ->get();
    
      return view('admin.billings.index', compact('patients'));

     }
=======
        }

        $patients = Biodata::where('Status', '=', 'checked')->get();

        return view('admin.billings.index', compact('patients'));
    }
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35

    public function edit($id)
    {
        if (! Gate::allows('manage_billings')) {
            return abort(401);
        }
        $history =  Clinichistory::where('biodata_id', $id)->latest()->first();
        $biodata = Biodata::find($id);
<<<<<<< HEAD
        
        $procedures = Clinichistory::find($history->id)->procedural;
        $drugs = Clinichistory::find($history->id)->prescription;
        $labs = Clinichistory::find($history->id)->laboratory;              
        
        $billing = Billing::where('biodata_id', $id)->latest()->first();
        
        if($billing == null) {
            $billing = ['ProcedureCost'=> 0,'DrugCost'=> 0,'LabCost'=> 0,'OverallCost'=> 0,'Bill'=>0,'Payment'=>0,'Balance'=>0,'Discount'=>0,'Refund'=>0,'Miscellaneous'=>0,'Deposit'=>0 ];
        }else {
            $billing = $billing;
        }

              
        if($biodata->RegistrationType == 'FAMILY') {
            $member = Familymember::where('pId', $id)->get();
            //echo $member[0];
            $account = Familyaccount::where('famId', $member[0]->famId)->latest()->first();
            
            if(count($account) > 0) {
               $familyDeposit = $account->amount;                
            }else {
                $familyDeposit = 0;
            }                         
            
       }
       else {
           $familyDeposit = $billing['Deposit'];
       } 
          
        //echo $billing['ProcedureCost'];
        return view('admin.billings.edit', compact('history','procedures', 'drugs', 'labs', 'billing','familyDeposit')); 
    
    }


=======
        $procedures = Clinichistory::find($history->id)->procedural;
        $drugs = Clinichistory::find($history->id)->prescription;
        $labs = Clinichistory::find($history->id)->laboratory;
        $totalProcedureCost = self::addProcedure($procedures);
        $totalLabCost = self::addLabCost($labs);
        $billing = Billing::where('biodata_id', $id)->pluck('Balance')->last();

        if($billing == null) {
            $billing = 0;
        }else {
            $billing = $billing;
        }
        return view('admin.billings.edit', compact('history','procedures', 'drugs', 'labs', 'totalProcedureCost', 'totalLabCost', 'billing'));
    }

>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
    /**
     * Show a single Drug.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('manage_billings')) {
            return abort(401);
        }
        
        $bills = Billing::where('biodata_id', $id)->get();

        return view('admin.billings.view', compact('bills'));
    }

    public function view($id)
    {
        if (! Gate::allows('manage_billings')) {
            return abort(401);
        }
         
        $procedures = Clinichistory::find($id)->procedural;
        $drugs = Clinichistory::find($id)->prescription;
        $labs = Clinichistory::find($id)->laboratory;
        $bill = Billing::where('clinicHistory_id', $id)->get()->first();

        return view('admin.billings.bills', compact('bill', 'procedures', 'drugs', 'labs'));
    }

<<<<<<< HEAD
   
  
    public function getOutstandingBalance()
=======
    //get all bills in a month
    public function getCurrentbillMonth()
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
    {
        if (! Gate::allows('manage_billings')) {
            return abort(401);
        }
            
<<<<<<< HEAD
       $outstandings = DB::table('biodatas')
                    ->join('billings', 'biodatas.id', '=', 'billings.biodata_id')
                    ->select('biodatas.Surname', 'biodatas.Firstname', 'billings.id','billings.Bill', 'billings.Payment','billings.Balance', 'billings.clinicHistory_id', 'billings.created_at')
                    ->where('billings.Balance', '>', 0)
                    ->get();
            

        return view('admin.billings.outstand', compact('outstandings'));
    }

public function makeOutstandingPayment(Request $request)
=======
           $months = DB::table('biodatas')
            ->join('billings', function ($join) {
                $join->on('biodatas.id', '=', 'billings.biodata_id')
                     ->where('billings.created_at', '>=', Carbon::now()->startOfMonth());
            })
            ->get();
           

        return view('admin.billings.month', compact('months'));
    }

     public function getLastbillMonth()
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
    {
        if (! Gate::allows('manage_billings')) {
            return abort(401);
        }
            
<<<<<<< HEAD
        $bill = Billing::find($request->id);
        $totalBill = $bill->Bill;
        $payment = $bill->Payment + $request->pay;
        $balance = $totalBill - $payment;
        $now = Carbon::now();
        Billing::where('id', $request->id)
                  ->update(['Payment'=> $payment, 'balance' => $balance, 'updated_at'=>$now]);
            

        return response()->json(array('msg' => 'Balance Updated'));
    }

// Family deposit account
    public function getFamily()
    {
        if (! Gate::allows('manage_billings')) {
            return abort(401);
        }
            
        $families = Familycard::all();
            

        return view('admin.billings.family', compact('families'));
    }
public function createFamilyDeposit(Request $request)
    {
        if (! Gate::allows('manage_billings')) {
            return abort(401);
        }
        $familyaccount = Familyaccount::where('famId', $request->id)->latest()->first(); 

        if(count($familyaccount) > 0) {
            $amount = $familyaccount->amount + $request->pay;
        } else {
            $amount = $request->pay;
        } 
        
        $fam = new Familyaccount;
        $fam->famId = $request->id;
        $fam->amount = $amount; 
        $fam->activity = "Make a Deposit of ". $amount;
        $fam->save();
       
       return response()->json(array('msg' => 'Money Deposited'));
        
    }

  public function getFamilyAccountDeposits(Request $request)
    {
        if (! Gate::allows('manage_billings')) {
            return abort(401);
        }
          
         $familyaccount = Familyaccount::where('famId', $request->id)->latest()->first(); 
         return response()->json(array('msg' => $familyaccount->amount));

       // return view('admin.expenditure.familydeposit', compact('deposits'));
    }



=======
             $months = DB::table('biodatas')
            ->join('billings', function ($join) {
                $join->on('biodatas.id', '=', 'billings.biodata_id')
                     ->where('billings.created_at', '<', Carbon::now()->startOfMonth());
            })
            ->get();

            

        return view('admin.billings.month', compact('months'));
    }

>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
    /**
     * Billings in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('manage_billings')) {
            return abort(401);
        }
<<<<<<< HEAD

       
        if($request->clinicHistory_id == 0) {

            $billings = Billing::create($request->all());
            return redirect()->route('admin.patients.index');
        } 
        else {
            $history = Billing::where('clinicHistory_id', '=', $request->clinicHistory_id)->first();
            
            if (count($history) > 0)  {
                    $bill = Billing::findOrFail($history->id);
                    $bill->update($request->all());
                }
                
            else {
                    $billings = Billing::create($request->all());
                    
                }
            

                $message = "Created new Billing for patients";
                self::addActivity($message); 

            
            return redirect()->route('admin.billings.index'); 
            }

        
    }

   
=======
        $history = Billing::where('clinicHistory_id', '=', $request->clinicHistory_id)->first();
       
       if (count($history) > 0)  {
            $bill = Billing::findOrFail($history->id);
            $bill->update($request->all());
        }
        
        else {
            $billings = Billing::create($request->all());
        }

       

        $message = "Created new Billing for patients";
        self::addActivity($message); 
        

        return redirect()->route('admin.billings.index');
    }

    public function addProcedure ($procedure) {
    	$total = 0;
        if($procedure == null) {
            $total = $total;
        } else {
            foreach ($procedure as $key) {
                $total = $total + $key['Cost'];
            }
        }
    	return $total;
    }
    public function addLabCost($labs) {
    	$total = 0;
        if($labs == null) {
            $total = $total;
        } else {
        	foreach ($labs as $key) {
        		$total = $total + $key['LabCost'];
        	}
        }
    	return $total;
    }
    public function getDrugCost($drugs) {
    	$total = 0;
        if($drugs == null) {
            $total = $total;
        } else {
            foreach ($drugs as $key) {
                $total = $total + $key['LabCost'];
            }
        }
    	return $total;
    }
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35

     public function addActivity($message) 
   {
        $activity = new Activity;
        $activity->username = Auth::user()->firstname .' ' .Auth::user()->lastname;
        $activity->action = $message;
        $activity->save();
   }

}