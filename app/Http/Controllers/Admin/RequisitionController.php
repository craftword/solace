<?php

namespace App\Http\Controllers\Admin;

use App\Requisition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RequisitionController extends Controller
{
    //
    public function index()
    {
        
        $requisitions = Requisition::all();

        return view('admin.requisition.index', compact('requisitions'));
    }

    public function show($id)
    {
        $reqs = Requisition::findOrFail($id);

        return view('admin.requisition.view', compact('reqs'));
    }

   

    public function store(Request $request)
    {
        
        $requisitions = new Requisition; 
        $requisitions->ItemName = $request->ItemName;
        $requisitions->QuantityNeeded  = $request->QuantityNeeded;
        $requisitions->Purposes  = $request->Purposes;
        $requisitions->Department  = $request->Department;
        $requisitions->StaffName  =  Auth::user()->firstname .' ' .Auth::user()->lastname;

        $requisitions->save();

        return back()
        ->with('success','Requisition sent successfully');
    }

    public function edit($id)
    {
        if (! Gate::allows('manage_requisition')) {
            return abort(401);
        }
        $reqs = Requisition::findOrFail($id);
        // dd($reqs);
       return view('admin.requisition.edit', compact('reqs'));
    }

    public function update(Request $request, $id)
    {
        if (! Gate::allows('manage_requisition')) {
            return abort(401);
        }
        $reqs = Requisition::findOrFail($id);
        $reqs->update($request->all());     
        

        return redirect()->route('admin.requisition.index');

    }

    public function updateQuantity(Request $request)
    {
        if (! Gate::allows('manage_requisition')) {
            return abort(401);
        }
                  
         Requisition::where('id', $request->id)
                  ->update(['QuantityApproved' => $request->quantity]);             
         
        return response()->json("Successfully");
    }


    public function updateApproval(Request $request)
    {
        if (! Gate::allows('manage_requisition')) {
            return abort(401);
        }
                  
         Requisition::where('id', $request->reqId)
                  ->update([
                      'QuantityApproved' => $request->QuantityNeeded,
                      'Approved' => $request->Approved,
                      'Status' => "Inactive",
                      'ReasonForDisapproval' => $request->ReasonForDisapproval,
                      'AprovalGivenBy' => Auth::user()->firstname .' ' .Auth::user()->lastname,

            ]);             
         
            return back()
            ->with('success','Requisition updated successfully');
    }



    public function logApproval()
    {
        if (! Gate::allows('manage_requisition')) {
            return abort(401);
        }
                  
        $requisitions = Requisition::where('Status', 'Inactive')->get();

        return view('admin.requisition.log', compact('requisitions'));          
         
          
    }


    public function destroy(Request $request, $id)
    {
        if (! Gate::allows('manage_requisition')) {
            return abort(401);
        }
        $req = Requisition::findOrFail($id);       

        $req->delete();

        return redirect()->route('admin.requisition.index');
    }


    
}
