<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Expenditure;
use App\Payment;
use App\Billing;
use App\Payroll;
use App\Reconcillation;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ExpenditureController extends Controller
{
    //
    public function index()
    {
        if (! Gate::allows('manage_expenditure')) {
            return abort(401);
        }

        $expenditures = Expenditure::all();

        return view('admin.expenditure.index', compact('expenditures'));
    }

    public function create()
    {
        if (! Gate::allows('manage_expenditure')) {
            return abort(401);
        }        

        return view('admin.expenditure.create');
    }

    public function store(Request $request)
    {
        if (! Gate::allows('manage_expenditure')) {
            return abort(401);
        }     
        $pharmacy = Expenditure::create($request->all());
       
        
        return redirect()->route('admin.expenditure.index');
    }
    public function show($id)
    {
        if (! Gate::allows('manage_expenditure')) {
            return abort(401);
        }   
        
        $expenditure = Expenditure::findOrFail($id);
        $payments = Expenditure::find($id)->payment;

        return view('admin.expenditure.view', compact('expenditure','payments'));
    }

     public function edit($id)
    {
        if (! Gate::allows('manage_expenditure')) {
            return abort(401);
        }
        
        $expenditures = Expenditure::findOrFail($id);
         
        return view('admin.expenditure.edit', compact('expenditures'));
    }

    public function update(Request $request, $id)
    {
        if (! Gate::allows('manage_expenditure')) {
            return abort(401);
        }
        $expenditure = Expenditure::findOrFail($id);
        $expenditure->update($request->all());       
       

        return redirect()->route('admin.expenditure.index');
    }

    
    public function destroy(Request $request, $id)
    {
        if (! Gate::allows('manage_expenditure')) {
            return abort(401);
        }
        $expenditure = Expenditure::findOrFail($id);
        $expenditure->payment()->delete();
        $expenditure->delete();

        return redirect()->route('admin.expenditure.index');
    }

    // Payment 
    public function storePayment(Request $request)
    {
        if (! Gate::allows('manage_expenditure')) {
            return abort(401);
        } 
        $expenditure = Expenditure::findOrFail($request->expenditure_id);
        $totalCost = $expenditure->Totalcost;
        $payment = Payment::where('expenditure_id', $request->expenditure_id)->latest()->first(); 

        if(count($payment) > 0) {
            $balance = $payment->Balance - $request->AmountPaid;
        } else {
            $balance = $expenditure->Totalcost - $request->AmountPaid;
        }

        $pay = new Payment;
        $pay->ModeOfPayment = $request->ModeOfPayment;
        $pay->AmountPaid = $request->AmountPaid;
        $pay->Balance = $balance;
        $pay->expenditure_id = $request->expenditure_id;
        $pay->save();

       return back()
            ->with('success','Payment records was successfully .');
    
    }
     public function destroyPayment(Request $request, $id)
    {
        if (! Gate::allows('manage_expenditure')) {
            return abort(401);
        }
        $payment = Payment::findOrFail($id);
        $payment->delete();

         return back()
            ->with('success','Payment records was deleted successfully .');
    }

    //get all expenditure in a month
    public function getAllExpenditureInMonth(Request $request)
    {
        if (! Gate::allows('manage_accounts')) {
            return abort(401);
        }
            
           $months = DB::table('expenditures')
            ->select('expenditures.*','payments.*')
            ->join('payments', 'expenditures.id', '=', 'payments.expenditure_id')
            ->whereBetween('payments.created_at', [$request->Startdate, $request->Enddate])
            ->get();
           
        
        //dd($months);
       return view('admin.expenditure.month', compact('months'));
    }

    //  INCOME SECTION
    // get all incomes 
     
    public function getAllIncomes()
    {
        if (! Gate::allows('manage_accounts')) {
            return abort(401);
        }
            
         $incomes = DB::table('biodatas')
                    ->join('billings', 'biodatas.id', '=', 'billings.biodata_id')
                    ->select('biodatas.Surname', 'biodatas.Firstname', 'billings.*')
                    ->get();
           

        return view('admin.expenditure.income', compact('incomes'));
    }
    //get all expenditure in a month
    public function getAllIncomeInMonth(Request $request)
    {
        if (! Gate::allows('manage_accounts')) {
            return abort(401);
        }
        
           $incomes = DB::table('biodatas')
            ->join('billings', 'biodatas.id', '=', 'billings.biodata_id')
            ->select('biodatas.Surname', 'biodatas.Firstname', 'biodatas.RegistrationType', 'billings.*')
            ->whereBetween('billings.updated_at', [$request->Startdate, $request->Enddate])
            ->get();
           
        //dd($incomes);
        return view('admin.expenditure.incomepermonth', compact('incomes'));
    }

    // Account Payable
   public function getAccountPayable()
    {
        if (! Gate::allows('manage_accounts')) {
            return abort(401);
        }
           $pays = DB::table('expenditures')
            ->select('expenditures.*','payments.*')
            ->join('payments', 'expenditures.id', '=', 'payments.expenditure_id')
            ->orderBy('payments.expenditure_id')
            ->orderBy('payments.id')
            ->get();            
        //$expends = Expenditure::all();

        $payments = [];
        foreach($pays as $key=>$pay) { 
            if($key != 0) {
                if($pay->expenditure_id === $pays[$key - 1]->expenditure_id) {
                    unset($pays[$key - 1]);
                }
            }         
            
              
        }           

        foreach ($pays as $key=>$value) {
             if($value->Balance == 0) {
                unset($pays[$key]);
                                
             }
                     
        }
            
       //print_r($pays);  
      return view('admin.expenditure.accountpayable', compact('pays'));
    }
 // Account Receivable
  public function getAccountReceiveable()
    {
        if (! Gate::allows('manage_accounts')) {
            return abort(401);
        }         
            

            $receives = DB::table('biodatas')
            ->join('billings', 'biodatas.id', '=', 'billings.biodata_id')
            ->select('biodatas.Surname', 'biodatas.Firstname','biodatas.RegistrationType','billings.id','billings.Balance', 'billings.created_at')
            ->where('billings.Balance', '>', 0)
            ->get();
        
        return view('admin.expenditure.accountrecieveable', compact('receives'));
    }

     public function getHmoAccountReceiveable()
    {
        if (! Gate::allows('manage_accounts')) {
            return abort(401);
        }
            
         $hmos = DB::table('biodatas')
            ->join('billings', 'biodatas.id', '=', 'billings.biodata_id')
            ->join('addpatienthmos', 'biodatas.id', '=', 'addpatienthmos.biodata_id')
            ->select('biodatas.Surname', 'biodatas.Firstname', 'addpatienthmos.Hmo','billings.id','billings.Bill', 'billings.created_at')
            ->where('billings.Balance', '>', 0)
            ->get();
        
        return view('admin.expenditure.hmoaccountreceiveable', compact('hmos'));
    }
     public function getFamilyAccountDeposits()
    {
        if (! Gate::allows('manage_accounts')) {
            return abort(401);
        }
            
        $deposits = DB::table('familycards')
                    ->join('familyaccounts', 'familycards.id', '=', 'familyaccounts.famId')
                    ->select('familycards.familyname', 'familycards.familytype', 'familyaccounts.*')
                    ->get();
        
        return view('admin.expenditure.familydeposit', compact('deposits'));
    }

    public function getMonthlyPayroll()
    {
        if (! Gate::allows('manage_expenditure')) {
            return abort(401);
        }

        $payrolls =  DB::table('humanresources')
        ->select('humanresources.SURNAME', 'humanresources.FIRSTNAME', 'humanresources.BANKNAME', 'humanresources.ACCOUNTNAME','humanresources.ACCOUNTNUMBER', 'payrolls.*')
        ->join('payrolls', 'humanresources.id', '=', 'payrolls.staffId')
        ->get();

        return view('admin.expenditure.payrolls', compact('payrolls'));
    }

    // Reconcillation 
    public function getReconcillation()
    {
        if (! Gate::allows('manage_accounts')) {
            return abort(401);
        }
            
        $recons = Reconcillation::all();
        
        return view('admin.expenditure.reconcillation', compact('recons'));
    }

    public function storeReconcillation(Request $request)
    {
        if (! Gate::allows('manage_accounts')) {
            return abort(401);       }
            
        
        
        $recons = Reconcillation::create($request->all());      
        
        return back()
        ->with('success', 'records was successfully .');
    }

    public function updateReconcillation(Request $request)
    {
        if (! Gate::allows('manage_accounts')) {
            return abort(401);       }
            
        
            Reconcillation::where('id', $request->id)
            ->update(['PaymentStatus' => "Successful"]);

        return response()->json(array('msg' => 'Updated!!'));
  
        
    }

    // Cash book 
    public function getCashBook()
    {
        if (! Gate::allows('manage_expenditure')) {
            return abort(401);
        }
         
        //one day (today)
        $date = Carbon::today();

        $cashbooks = DB::table('biodatas')
        ->join('billings', 'biodatas.id', '=', 'billings.biodata_id')
        ->select('biodatas.Surname', 'biodatas.Firstname', 'billings.id','billings.Payment', 'billings.AmountReceived', 'billings.created_at')
        ->whereDate('billings.created_at',  $date)
        ->get();
       //dd($cashbooks);
       return view('admin.expenditure.cash', compact('cashbooks'));
    }

    public function updateCashBook(Request $request)
    {
        if (! Gate::allows('manage_expenditure')) {
            return abort(401);
        }

        Billing::where('id', $request->id)
                  ->update(['AmountReceived' => $request->quantity]);

        return response()->json(array('msg' => 'Updated!!'));
        
       
    }
    public function getCashBookLog()
    {
        if (! Gate::allows('manage_accounts')) {
            return abort(401);
        }
         
       

        $cashbooks = DB::table('biodatas')
        ->join('billings', 'biodatas.id', '=', 'billings.biodata_id')
        ->select('biodatas.Surname', 'biodatas.Firstname', 'billings.id','billings.Payment', 'billings.AmountReceived', 'billings.created_at')
        ->where('billings.AmountReceived', ">" ,0)
        ->get();
       //dd($cashbooks   
       return view('admin.expenditure.cashlog', compact('cashbooks'));
    }

}
