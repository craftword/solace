<?php

namespace App\Http\Controllers\Admin;
use App\Humanresource;
use App\Payroll;
use App\Leaverecord;
use App\Pensionrecord;
use App\Terminationrecord;
use App\Staffdocument;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HumanresourceController extends Controller
{
    //
    /**
     * Display a listing of staff.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('manage_hr')) {
            return abort(401);
        }

        $hrs = Humanresource::all();

        return view('admin.hrs.index', compact('hrs'));
    }

    /**
     * Show the form for creating new staff.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('manage_hr')) {
            return abort(401);
        }        

        return view('admin.hrs.create');
    }

    /**
     * Store a newly created Staff in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('manage_hr')) {
            return abort(401);
        }
        $hrs = Humanresource::create($request->all());
      
        
       return back()
            ->with('success','Staff records was successfully.');
    }


    /**
     * Show the form for editing staff.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('manage_hr')) {
            return abort(401);
        }
        
        $hrs =  Humanresource::findOrFail($id);
         
        return view('admin.hrs.edit', compact('hrs'));
    }

    /**
     * Show a single staff.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('manage_hr')) {
            return abort(401);
        }
        
        $hrs =  Humanresource::findOrFail($id);
        $files = Staffdocument::where('staffId', $id)->get();

        return view('admin.hrs.view', compact('hrs', 'files'));
    }

    /**
     * Update Staff in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (! Gate::allows('manage_hr')) {
            return abort(401);
        }
        $hrs = Humanresource::findOrFail($id);
        $hrs->update($request->all());
        
      
        return back()
            ->with('success','Staff records was successfully updated.');
    }

    /**
     * Remove Staff from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (! Gate::allows('manage_hr')) {
            return abort(401);
        }
        $hrs =  Humanresource::findOrFail($id);
       

        $hrs->delete();

       return back()
            ->with('success','Staff records was successfully deleted.');
    }

    /**
     * Delete all selected staff at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('manage_hr')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries =  Humanresource::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
    public function getPayrolls(Request $request)
    {
        if (! Gate::allows('manage_hr')) {
            return abort(401);
        }
         $hrs = Humanresource::where('EMPLOYMENTSTATUS', '=', 'ACTIVE')->get();
          Payroll::truncate();
         foreach($hrs as $hr) {
            
            $PresentSalary = $hr->STARTINGSALARY + $hr->SALARYINCREASE;
            if($hr->SALARYADVANCEDURATION == 0) {
                $Advance = $hr->SALARYADVANCE;
            } else {
                $Advance = $hr->SALARYADVANCE / $hr->SALARYADVANCEDURATION;
            }
            
            $deduction = $hr->SALARYDEDUCTION;
            $PayableSalary = $PresentSalary - ($Advance + $deduction + $hr->TAX);
            $payroll = new Payroll;
            $payroll->PresentSalary = $PresentSalary;
            $payroll->PayableSalary = $PayableSalary;
            $payroll->Advance = $Advance;
            $payroll->Deduction = $deduction;
            $payroll->Tax = $hr->TAX;
            $payroll->TaxId = $hr->TAXID;
            $payroll->StaffId = $hr->id;
            $payroll->save();
            
         }

        $pays = DB::table('humanresources')
            ->select('humanresources.SURNAME', 'humanresources.FIRSTNAME', 'humanresources.BANKNAME', 'humanresources.ACCOUNTNAME','humanresources.ACCOUNTNUMBER', 'payrolls.*')
            ->join('payrolls', 'humanresources.id', '=', 'payrolls.staffId')
            ->get();
         return view('admin.hrs.payroll', compact('pays'));
         
         //echo Carbon::now()->toDateTimeString();
         
    }
        
    // THIS SECTION IS FOR LEAVE MANAGEMENT 
     public function getAllLeavesRecords()
    {
        if (! Gate::allows('manage_hr')) {
            return abort(401);
        }
       $leaves =  DB::table('humanresources')
            ->select('humanresources.SURNAME', 'humanresources.FIRSTNAME', 'leaverecords.*')
            ->join('leaverecords', 'humanresources.id', '=', 'leaverecords.staffId')
            ->get();;

      return view('admin.hrs.leavelogs', compact('leaves')); 
    }

    public function getAllTerminatedRecords()
    {
        if (! Gate::allows('manage_hr')) {
            return abort(401);
        }
       $terminates =  DB::table('humanresources')
            ->select('humanresources.SURNAME', 'humanresources.FIRSTNAME', 'terminationrecords.*')
            ->join('terminationrecords', 'humanresources.id', '=', 'terminationrecords.staffId')
            ->get();;

      return view('admin.hrs.terminatelogs', compact('terminates')); 
    }

    public function getAllPensionRecords()
    {
        if (! Gate::allows('manage_hr')) {
            return abort(401);
        }
       $pensions =  DB::table('humanresources')
            ->select('humanresources.SURNAME', 'humanresources.FIRSTNAME', 'pensionrecords.*')
            ->join('pensionrecords', 'humanresources.id', '=', 'pensionrecords.staffId')
            ->get();;

      return view('admin.hrs.pensionlogs', compact('pensions')); 
    }

    // Create leave, pension and termination

    public function createLeave(Request $request)
    {
        if (! Gate::allows('manage_hr')) {
            return abort(401);
        }
        $hrs = Leaverecord::create($request->all());
      
        
       return back()
            ->with('success','Leave records was added successfully.');
    }

    public function updateLeave(Request $request)
    {
        
        $leave = Leaverecord::where('id', $request->id)->update(array( 'actualReturnDate'  => $request->changeDate));
       
        return response()->json(array('msg' => 'Updated!!!'));
        
    }

    public function createPension(Request $request)
    {
        if (! Gate::allows('manage_hr')) {
            return abort(401);
        }
        $hrs = Pensionrecord::create($request->all());
      
        
       return back()
            ->with('success','Pension records was successfully.');
    }

    public function createTerminate(Request $request)
    {
        if (! Gate::allows('manage_hr')) {
            return abort(401);
        }
        $hrs = Terminationrecord::create($request->all());
      
        
       return back()
            ->with('success','Leave records was successfully.');
    }



////////////// Upload Lab Files //////////////////////////////////////
public function staffDocuments(Request $request)

{

    $this->validate($request, [

        'image' => 'required|mimes:pdf|max:2048',

    ]);


    $image = $request->file('image');

    $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

    $destinationPath = public_path('staff_documents');

    $image->move($destinationPath, $input['imagename']);

    $url = 'staff_documents/'. $input['imagename'];
   
    $fileupload = new Staffdocument;
    $fileupload->Name = $request->Name;
    $fileupload->Url = $url;
    $fileupload->staffId = $request->staffId;
    $fileupload->save();
    
    return back()->with('success','File Upload successful');

  }

}
