<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Notification;
use App\Activity;
use App\Biodata;
<<<<<<< HEAD
use App\Billing;
use App\User;
use App\Nurseactivity;
use App\Expenditure;
use App\Payment;
use App\Hmo;
use App\Pharmacy;
use App\Druglog;
use App\Requisition;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
=======
use App\Nurseactivity;
use Illuminate\Support\Facades\Auth;
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35

class HomeController extends Controller 
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
<<<<<<< HEAD
        $user = User::find(Auth::user()->id);       
          
        $now = Carbon::now()->month;
=======
        $notifications = Notification::where('receiveId', '=', Auth::user()->id)->orderBy('id', 'DESC')->paginate(10);
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
        $activities = Activity::orderBy('id', 'DESC')->paginate(10);
        $nurseactivities = Nurseactivity::orderBy('id', 'DESC')->paginate(10);
        $countAllPatients = Biodata::all()->count();
        $countPatientsWait = Biodata::where('Status', '=', 'checked')->count();
<<<<<<< HEAD
        $countAllHmos = Hmo::all()->count();
        $countPharmacy = Pharmacy::all()->count();
        $countAllDruglog = Druglog::all()->count();
        $countRequisitions = Requisition::all()->count();
        $countExpiredDrugs = Pharmacy::where('ExpiryDate');
         /*$billings = DB::table('biodatas')
            ->Join('billings', function ($join) {
                $join->on('biodatas.id', '=', 'billings.biodata_id');
                     //->where('billings.Balance','>', 0);
                     
            })
            ->whereRaw('billings.Balance','>', 0)
            ->orderBy('billings.id', 'desc')
            ->first();
            //->paginate(10);
        //$billing = Billing::where('Balance','!=', 0)->get();
        */
        $totalexpenditures = self::getTotalExpenses($now);
        $totalincomes = self::getTotalIncomes($now);
        $yearlyincomes = self::getIncomesInLast12Months();
        $totalreceiveable = self::getTotalReceiveable($now);
        $totalhmoreceiveable = self::getTotalHMOReceiveable($now);
        $yearlyexpenses = self::getExpenditureInLast12Months();
        $totalpayable = self::getTotalPayable($now);
        $yearlypatients = self::getNumberOfPatientsInLast12Months();
        $currentEmployees = self::getTotalNumberOfCurrentEmployees();
        $attrition = self::getTotalNumberOfAttrition();
        $newHire = self::getTotalNumberOfNewHire();
        $birthdays = self::getBirthdays($now);
        $hmoEnrollees = self::getTotalNumberOfHmoEnrollees();
        $hmoCounts = self::getTotalNumberOfHmos();
        $drugsCounts = self::getTotalNumberOfDrugs();
        $drugLog = self::getTotalNumberOfDrugLog($now);
        $requisitions = self::getTotalNumberOfRequisition($now);
        $expiry = self::getTotalExpiredDrugs($now);
      //dd($yearlyexpenses);
       return view('home', compact('user', 'activities', 'countAllPatients', 'countPatientsWait', 'nurseactivities', 'totalexpenditures', 'totalincomes', 'yearlyincomes', 'totalreceiveable', 'totalhmoreceiveable', 'totalpayable', 'yearlyexpenses', 'yearlypatients', 'currentEmployees', 'attrition', 'newHire', 'birthdays', 'hmoEnrollees','countAllHmos', 'hmoCounts', 'drugsCounts', 'drugLog', 'requisitions', 'expiry'));
}

    public function checkBalanceStatus (Request $request) {
         $billings = DB::table('biodatas')
                    ->join('billings', 'biodatas.id', '=', 'billings.biodata_id')
                    ->select('billings.Balance')
                    ->where('biodatas.Firstname', $request->Firstname)
                    ->where('biodatas.Surname', $request->Surname)
                    ->orderBy('billings.created_at', 'desc')
                    ->limit(1)
                    ->get();
           
        return $billings;
          

    }
    public function getTotalExpenses($now) {
        $expenses = DB::table('expenditures')
                ->whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', '=', $now)
                ->get();
        $total = 0;
        foreach($expenses as $expense) {
            $total = $total + $expense->Totalcost;
        }
        return $total;

    }

    public function getTotalIncomes($now) {        
        $payments = DB::table('billings')
                ->whereYear('updated_at', Carbon::now()->year)
                ->whereMonth('updated_at', '=', $now)
                ->get();
        $total = 0;
        
        foreach($payments as $payment) {
          if($payment->Payment == 0) {
                $total = $total + $payment->Deposit; 
           } else {
                $total = $total + $payment->Payment;
           }
            
        }
        return $total;

    }
    public function getTotalPatients($now) {        
        $registerpatients = DB::table('clinichistories')
                ->whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', '=', $now)
                ->get();
        $unregisterpatients = DB::table('biodatas')
                ->where('RegistrationType', 'UNREGISTER PATIENT')
                ->whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', '=', $now)
                ->get();
        $total = 0;
        
        foreach($registerpatients as $registerpatient) {
            $total = $total + 1;
        }
        foreach($unregisterpatients as $unregisterpatient) {
            $total = $total + 1;
        }
        return $total;

    }
     // Human resources
     public function getTotalNumberOfCurrentEmployees() {        
        $staffs = DB::table('humanresources')
                ->where('EMPLOYMENTSTATUS', '=', "ACTIVE")
                ->get();
        $total = 0;
        
        foreach($staffs as $staff) {
            $total = $total + 1;
        }
        return $total;

    }

   
    public function getTotalNumberOfAttrition() {        
        $staffs = DB::table('humanresources')
                ->where('EMPLOYMENTSTATUS', '=', "RESIGNED")
                ->get();
        $total = 0;
        
        foreach($staffs as $staff) {
            $total = $total + 1;
        }
        return $total;

    }

     public function getTotalNumberOfNewHire() {        
        $staffs = DB::table('humanresources')
                ->where('ORIENTATIONPERIOD', '!=', "xx")
                ->get();
        $total = 0;
        
        foreach($staffs as $staff) {
            $total = $total + 1;
        }
        return $total;

    }

     public function getBirthdays($now) {        
        $staffs = DB::table('humanresources')
                ->where('EMPLOYMENTSTATUS', '=', "ACTIVE")
                ->whereMonth('DATEOFBIRTH', '=', $now)
                ->get();
        return $staffs;

    }


// Account 
     public function getTotalPayable() {        
       $pays = DB::table('expenditures')
            ->select('expenditures.*','payments.*')
            ->join('payments', 'expenditures.id', '=', 'payments.expenditure_id')
            ->orderBy('payments.expenditure_id')
            ->orderBy('payments.id')
            ->get();
        $total = 0;
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

        foreach($pays as $pay) {
            $total = $total + $pay->Balance;
        }
        return $total;

    }

    public function getTotalReceiveable() {        
        $payments = DB::table('biodatas')
                ->join('billings', 'biodatas.id', '=', 'billings.biodata_id')
                ->select('biodatas.Surname', 'biodatas.Firstname','biodatas.RegistrationType','billings.id','billings.Balance', 'billings.created_at')
                ->where('billings.Balance', '>', 0)
                ->where('biodatas.RegistrationType', '!=', "HMO")
                ->get();
        $total = 0;
        foreach($payments as $payment) {
            $total = $total + $payment->Balance;
        }
        return $total;

    }

     public function getTotalHMOReceiveable() {        
        $payments = DB::table('biodatas')
                ->join('billings', 'biodatas.id', '=', 'billings.biodata_id')
                ->select('biodatas.Surname', 'biodatas.Firstname','biodatas.RegistrationType','billings.id','billings.Balance', 'billings.created_at')
                ->where('billings.Balance', '>', 0)
                ->where('biodatas.RegistrationType', '=', "HMO")
                ->get();
        $total = 0;
        foreach($payments as $payment) {
            $total = $total + $payment->Balance;
        }
        return $total;

    }

     public function getIncomesInLast12Months() {
        $IncomePerMonth = [];
        
        for($i=1; $i<=12; $i++){
             $now = date('m',strtotime('-'.$i.' month'));
             $month = date("F", mktime(null, null, null, $now));
             $year = date("Y", mktime(null, null, null, $now));
             $IncomePerMonth[] = ['month'=>$month, 'value'=>self::getTotalIncomes($now)];
        }
       return self::sortArray($IncomePerMonth);
      //return  $IncomePerMonth;
    }
    public function getExpenditureInLast12Months() {
        $IncomePerMonth = [];
        
        for($i=1; $i<=12; $i++){
             $now = date('m',strtotime('-'.$i.' month'));
             $month = date("F", mktime(null, null, null, $now));
             $IncomePerMonth[] = ['month'=>$month, 'value'=>self::getTotalExpenses($now)];
        }
       return self::sortArray($IncomePerMonth);
    }

    public function getNumberOfPatientsInLast12Months() {
        $IncomePerMonth = [];
        
        for($i=1; $i<=12; $i++){
             $now = date('m',strtotime('-'.$i.' month'));
             $month = date("F", mktime(null, null, null, $now));
             $IncomePerMonth[] = ['month'=>$month, 'value'=>self::getTotalPatients($now)];
        }
       return self::sortArray($IncomePerMonth);
    }
    // HMO Enrollees
    public function getTotalNumberOfHmoEnrollees() {        
        $enrollees = DB::table('biodatas')
                ->where('RegistrationType', '=', "HMO")
                ->get();
        $total = 0;
        
        foreach($enrollees as $enrollees) {
            $total = $total + 1;
        }
        return $total;

    }
    //HMO Headcount
    public function getTotalNumberOfHmos() {        
        $hmonumbers = DB::table('hmos')
                ->get();
        $total = 0;
        
        foreach($hmonumbers as $hmonumbers) {
            $total = $total + 1;
        }
        return $total;

    }
    //Pharmacy Count
    public function getTotalNumberOfDrugs() {        
        $drugs = DB::table('pharmacies')
                ->get();
        $total = 0;
        
        foreach($drugs as $drugs) {
            $total = $total + 1;
        }
        return $total;

    }
    //Total of monthly drug log
    public function getTotalNumberOfDrugLog($now) {
        $log = DB::table('druglogs')
                ->whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', '=', $now)
                ->get();
        $total = 0;
        foreach($log as $log) {
            $total = $total + 1;
        }
        return $total;

    }

    //Total of monthly requisitions
    public function getTotalNumberOfRequisition($now) {
        $requisition = DB::table('requisitions')
                ->whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', '=', $now)
                ->get();
        $total = 0;
        foreach($requisition as $requisition) {
            $total = $total + 1;
        }
        return $total;

    }

    // Total Of Expired drugs
    public function getTotalExpiredDrugs($now)  {        
        $exdrug = DB::table('pharmacies')
                ->whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', '=', $now)
                ->get();
                $total = 0;
                foreach($exdrug as $exdrug) {
                    $total = $total + 1;
                }
                return $total;        
    }

    private function sortArray($array) {
        $item = array_pop($array);
        array_unshift($array, $item);
        $sortedArray = array_reverse($array);
        return $sortedArray;
    }    

=======
        return view('home', compact('notifications', 'activities', 'countAllPatients', 'countPatientsWait', 'nurseactivities'));
    }
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
}
