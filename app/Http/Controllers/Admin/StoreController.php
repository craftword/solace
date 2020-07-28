<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Store;
use App\Druglog;
use App\Pharmacy;
use App\Outofstore;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    //
     public function index()
    {
        if (!Gate::allows('manage_store')) {
            return abort(401);
        }
            $stores = DB::table('pharmacies')
            ->select('pharmacies.DrugName','pharmacies.BrandName','pharmacies.DrugType','pharmacies.ExpiryDate', 'pharmacies.minStock', 'stores.id','stores.quantity', 'stores.updated_at')
            ->join('stores', 'pharmacies.id', '=', 'stores.pharmId')
            ->get();
            
            return view('admin.store.index', compact('stores'));
    }

     public function store(Request $request)
    {
        if (! Gate::allows('manage_store')) {
            return abort(401);
        }
          $store = new Store;
          $store->quantity = 0;
          $store->pharmId = $request->pharmId; 
          $store->save();        

        return redirect()->route('admin.store.index');
    }
     public function updateStore(Request $request)
    {
        if (! Gate::allows('manage_store')) {
            return abort(401);
        }
         $store = Store::find($request->id); 
         $pharm = Pharmacy::where('id', $store->pharmId)->get();
         $message = $request->quantity ." ". $pharm[0]->DrugType . " of " . $pharm[0]->DrugName ." ". $request->type;         
         Store::where('id', $request->id)
                  ->update(['quantity' => $request->updatedQty]);
                
         self::addDrugLog($message); 
        return response()->json($message);
    }
     public function showOutOfStock()
    {
        if (! Gate::allows('manage_store')) {
            return abort(401);
        }
      $stores = DB::table('pharmacies')
            ->select('pharmacies.DrugName','pharmacies.BrandName','pharmacies.DrugType','pharmacies.ExpiryDate', 'pharmacies.minStock', 'stores.id','stores.quantity', 'stores.updated_at')
            ->join('stores', 'pharmacies.id', '=', 'stores.pharmId')
            ->get();

        return view('admin.store.view', compact('stores'));
    }
    public function showDrugLog()
    {
        if (! Gate::allows('manage_store')) {
            return abort(401);
        }
        $druglogs = Druglog::all();

        return view('admin.store.logs', compact('druglogs'));
    }


     public function addDrugLog($message) 
   {
        $druglog = new Druglog;
        $druglog->staffname = Auth::user()->firstname .' ' .Auth::user()->lastname;
        $druglog->activity = $message;
        $druglog->save();
   }
   
    public function showInventoryMovement()
    {
        if (! Gate::allows('manage_inventory')) {
            return abort(401);
        }
        $role = self::checkRole(Auth::user()->roles[0]->name);
        if(Auth::user()->roles[0]->name == "Pharmacy") {
            $outstores =DB::table('pharmacies')
            ->select('pharmacies.DrugName','pharmacies.BrandName','outofstores.*')
            ->join('outofstores', 'pharmacies.id', '=', 'outofstores.pharmId')
            ->get();

        } else {
           $outstores =DB::table('pharmacies')
            ->select('pharmacies.DrugName','pharmacies.BrandName','outofstores.*')
            ->join('outofstores', 'pharmacies.id', '=', 'outofstores.pharmId')
            ->where('department', $role)
            ->get();
        }
       

        return view('admin.store.movement', compact('outstores'));
    }

     public function storeInventoryMovement(Request $request)
    {
        if (! Gate::allows('manage_inventory')) {
            return abort(401);
        }
          $store = new Outofstore;
          $store->quantity = 0;
          $store->department = $request->department;
          $store->pharmId = $request->pharmId; 
          $store->save();        

        return back();
    }

     public function updateInventoryMovement(Request $request)
    {
        if (! Gate::allows('manage_inventory')) {
            return abort(401);
        }
         $store = Outofstore::find($request->id); 
        // $pharm = Pharmacy::where('id', $store->pharmId)->get();
         $message = $request->quantity ." is". $request->type;         
         Outofstore::where('id', $request->id)
                  ->update(['quantity' => $request->updatedQty]);
                
         
        return response()->json($message);
    }
    public function checkRole($role) {
        if($role == "Lab Tech") {
            return "Laboratory";
        }
        elseif($role == "Accident & Emergency") {
            return "A/E";
        }
        elseif($role == "labour") {
            return "Labour";
        }
        elseif($role == "theatre") {
            return "Theatre";
        }
        elseif($role == "laundry") {
            return "Laundry";
        }
        
    }

}
