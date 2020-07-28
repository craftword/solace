<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Biodata;
use App\Vitalsign;
use App\Clinichistory;
use App\Report;
use App\Procedure;
use App\Procedural;
use App\Examination;
use App\Prescription;
use App\Laboratory;
use App\Labtest;
use App\Pharmacy;
use App\Activity;
use App\Nurseactivity;
use App\Management;
use App\Drugchart;
use App\Diagnosis;
<<<<<<< HEAD
use App\Fileupload;
use App\Admission;
use App\Billing;
use App\Operative;
use App\Postdelivery;
use App\Inputoutput;
use App\User;
use App\Despence;
use App\Allergy;
use Spatie\Permission\Models\Role;
use App\Notifications\AllNotification;

use Illuminate\Support\Facades\Notification;
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ClinichistoryController extends Controller
{
    
    //
     /**
     * Display a listing of Patients.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewHistories($id)
    {
        if (!Gate::allows('manage_history')) {
            return abort(401);
        }
            $histories = Biodata::find($id)->clinichistory->sortByDesc('created_at');

            return view('admin.clinics.index', compact('histories'));
    }


     
  public function updateStatus(Request $request)
    {
        if (!Gate::allows('manage_patients')) {
            return abort(401);
        }

        $id = $request->idTask; 
        $check = $request->checkboxStatus; 
<<<<<<< HEAD
        $reg = $request->reg; 
        $message = " is waiting";
                
        if ( $request->checkboxStatus == "checked") {
                Clinichistory::create(['HistoryPC'=> $request->reg,'biodata_id' => $request->idTask]); 

                self::update($id,$check); 
               self::Notification($message, $id, 3);      
=======


        if ( $request->checkboxStatus == "checked") {
                Clinichistory::create(['biodata_id' => $request->idTask]); 

                self::update($id,$check);       
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
        
             return response()->json(array('msg' => 'Patient has been sign In'));

          }
          else {

<<<<<<< HEAD
                self::update($id,$check);              
=======
                self::update($id,$check);  
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
             return response()->json(array('msg' => 'Patient has been sign Out'));
          }
        
    }

    public function update($id, $check)
        {

             Biodata::where('id', $id)
                  ->update(['Status' => $check]);
        }

/////////// Nurse function ///////////////////////////////////////////////////
     public function viewPatientsForNurse(Request $request, $id)
    {
        if (!Gate::allows('nurse_patients')) {
            return abort(401);
        }
            $history =  Clinichistory::find($id);
            $biodata = Biodata::find($history->biodata_id);
            $vitalsigns = Clinichistory::find($id)->vitalsign;
            $reports = Clinichistory::find($id)->report->sortByDesc('created_at');
            $procedures = Clinichistory::find($id)->procedural;
<<<<<<< HEAD
            $inputoutputs = Clinichistory::find($id)->inputoutput;
            $prescriptions = Prescription::where('clinicHistory_id', $id)
             ->where('section', '=', 0)
             ->get();
            $manages = Clinichistory::find($id)->management;
            $drugcharts = Drugchart::where('clinicHistory_id', '=', $id)
            ->where('section', '=', 0)
            ->get();
           // $drugchartdose = Prescription::where('clinicHistory_id', '=', $id)->pluck('DrugName', 'DrugName');
            $diagnoses = Clinichistory::find($id)->diagnosis;
            $admin = Clinichistory::find($id)->admission;
            $billing = Billing::where('clinicHistory_id', '=', $id)->get(); 
            $allergies = Allergy::where('biodata_id', '=', $biodata->id)->get(); 
            $chartsigns = json_encode($vitalsigns);  
            //$drugchartday = Drugchart::where('clinicHistory_id', '=', $id)->pluck('day')->last();
             //print_r($allergies);
            return view('admin.clinics.nurses', compact('biodata', 'vitalsigns', 'history', 'reports', 'procedures', 'prescriptions', 'manages', 'drugcharts', 'diagnoses', 'admin', 'billing', 'inputoutputs', 'chartsigns', 'allergies'));
=======
            $prescriptions = Clinichistory::find($id)->prescription;
            $manages = Clinichistory::find($id)->management;
            $drugcharts = Drugchart::where('clinicHistory_id', '=', $id)->get();
            $drugchartdose = Prescription::where('clinicHistory_id', '=', $id)->pluck('DrugName', 'DrugName');
            $diagnoses = Clinichistory::find($id)->diagnosis;

            //$drugchartday = Drugchart::where('clinicHistory_id', '=', $id)->pluck('day')->last();

            return view('admin.clinics.nurses', compact('biodata', 'vitalsigns', 'history', 'reports', 'procedures', 'prescriptions', 'manages', 'drugcharts', 'drugchartdose', 'diagnoses'));
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
    }

     public function storeVitalSign(Request $request)
    {
        if (!Gate::allows('nurse_patients')) {
            return abort(401);
        }
        $vital = Vitalsign::create($request->all());
<<<<<<< HEAD
        // Notification to the Doctor
        $id = $request->clinicHistory_id;
        $msg = " is waiting";
       self::Notification($msg, $id, 2);      
        // Activity
=======
               
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
        $message = "Create new vital sign for the Patient";
        self::addActivity($message); 
        
        return back()
            ->with('success','Vitalsign records was successfully .');
           
    }

     public function storeReport(Request $request)
    {
        if (!Gate::allows('nurse_patients')) {
            return abort(401);
        }
        $report = Report::create($request->all());
        
        $message = "Create new Report for the Patient";
        self::addActivity($message); 
        return back()
            ->with('success',' Report was successfully inserted .');
           
    }

     public function createDrugChart(Request $request)
    {
        if (!Gate::allows('nurse_patients')) {
            return abort(401);
        }

         $Drugchart = new Drugchart;
         $Drugchart->dose =  $request->input('dose');
         $Drugchart->clinicHistory_id =  $request->input('id');
<<<<<<< HEAD
         $Drugchart->section = $request->input('section');
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
         $Drugchart->day = Drugchart::where(['clinicHistory_id' => $request->input('id'), 'Dose' =>  $request->input('dose')])->pluck('day')->last() + 1;
         $Drugchart->save();
        
        
        $message = "Create Drug Chart";
        self::addNurseActivity($message);         
        
<<<<<<< HEAD
        $msg = ['msg'=>'success'];
=======
        $msg = ['msg'=>'sucess'];
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
        return response()->json($msg);  
    }
     public function updateDrugChart(Request $request)
    {
        if (!Gate::allows('nurse_patients')) {
            return abort(401);
        }
       
        $id = $request->id; 
        $column = $request->column; 
<<<<<<< HEAD
        $value = $request->value;        
=======
        $value = $request->value;
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
        $dose =  Drugchart::find($id);
        Drugchart::where('id', $id)->update(array( $column  => $value));

        $message = "Administered  " . $dose->Dose;
        self::addNurseActivity($message); 
        
       return response()->json(array('msg' => 'Updated!!!'));
           
    }
<<<<<<< HEAD

    //Drug Despence
    public function addDrugToDispensed(Request $request)
    {
             
        $id = $request->patient_id; 
        $drugName = $request->drugName; 
         
        $history =  Clinichistory::find($id);
        $biodata = Biodata::find($history->biodata_id);
        $patientName = $biodata->Surname. "-".$biodata->Firstname;
        $staffName = Auth::user()->firstname .' ' .Auth::user()->lastname;

        $despence = new Despence;
        $despence->DrugName = $drugName;
        $despence->PatientName = $patientName;
        $despence->Quantity = $request->qty;
        $despence->StaffName = $staffName;
        $despence->save();

        $message = $drugName. " dispensed to ". $patientName;
        self::addNurseActivity($message); 
        
       return response()->json(array('msg' => 'Created!!!'));
           
    }
   
    public function updateDiscontinue(Request $request)
    {

        Prescription::where('id', $request->id)
              ->update(['Status' => "Inactive"]);
         return response()->json(array('msg' => 'updated!!!'));
    }

=======
   
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35

    ////////////////////// summary ///////////////////////////////////////////////
     public function viewSummary($id)
    {
        if (!Gate::allows('view_summary')) {
            return abort(401);
        }
            $biodata = Biodata::find($id);
            
<<<<<<< HEAD
            $histories =  Clinichistory::where('biodata_id', $id)->get();
             $nav = "no";
             return view('admin.clinics.summary', compact('biodata', 'histories', 'nav'));
            
    }

    public function checkPastHistories(Request $request)
    {
            $biodata = Biodata::where('Surname',$request->Surname)
            ->where('Firstname',$request->Firstname)->get();
            if(count($biodata) == 0) {
                return back()
                    ->with('failure','No record of such person on the database.');
            } else {
                 $biodata = $biodata[0];
                 $histories =  Clinichistory::where('biodata_id',$biodata->id)->get();
                 $nav = "yes";
                return view('admin.clinics.summary', compact('biodata', 'histories', 'nav'));
            }
            
          
          
    }

     public function viewPastHistory(Request $request)
    {
         $id = $request->id;             
         $histories =  Clinichistory::find($id);  
         $management = Clinichistory::find($id)->management;
         $diagnosis = Clinichistory::find($id)->diagnosis;
         $procedures = Clinichistory::find($id)->procedural; 
         $examination = Clinichistory::find($id)->examination;
         $prescriptions = Clinichistory::find($id)->prescription;
         $laboratories = Clinichistory::find($id)->laboratory;
         $postdeliveries = Postdelivery::where('clinicHistory_id', $id)->get();
         $operatives = Operative::where('clinicHistory_id', $id)->get();
         
                    
         return response()->json([$histories, $examination, $management, $diagnosis, $procedures,  $prescriptions,  $laboratories, $postdeliveries, $operatives]);       
=======
            $history =  Clinichistory::where('biodata_id', $id)->latest()->first();
            if ($history) {
                    $vitalsigns = Clinichistory::find($history->id)->vitalsign;
                    $reports = Clinichistory::find($history->id)->report->sortByDesc('created_at');
                    $procedures = Clinichistory::find($history->id)->procedural; 
                    $examination = Clinichistory::find($history->id)->examination;
                    $prescriptions = Clinichistory::find($history->id)->prescription;
                    $laboratories = Clinichistory::find($history->id)->laboratory;
                    
                return view('admin.clinics.summary', compact('biodata', 'vitalsigns', 'history', 'report', 'procedures', 'examination', 'prescriptions', 'laboratories', 'bday'));
            }else {
                return back()
                    ->with('unsuccessfully',' No history found yet, please');
            }
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
    }

    ////////////////////////  Doctors function ////////////////////////////////////////////////////
     public function viewPatientsForDoctors($id)
    {
        if (!Gate::allows('doctor_patients')) {
            return abort(401);
        }
            $history =  Clinichistory::find($id);
            $biodata = Biodata::find($history->biodata_id);
            $vitalsigns = Clinichistory::find($id)->vitalsign;
            $reports = Clinichistory::find($id)->report->sortByDesc('created_at');
            $procedures = Clinichistory::find($id)->procedural; 
<<<<<<< HEAD
            $examination = Clinichistory::find($id)->examination;            
            $prescriptions = Prescription::where('clinicHistory_id', $id)
            ->where('section', '=', 0)
            ->get();       
            $laboratories = Clinichistory::find($id)->laboratory;
            $manages = Clinichistory::find($id)->management;
            $diagnoses = Clinichistory::find($id)->diagnosis;
            $labfiles = Clinichistory::find($id)->fileupload;
            $admin = Clinichistory::find($id)->admission; 
            $billing = Billing::where('biodata_id', '=', $history->biodata_id)->latest()->first();
            $chartsigns = json_encode($vitalsigns); 
            $allergies = Allergy::where('biodata_id', '=', $biodata->id)->get();
            // print_r($allergies);
            //echo $id;          
           return view('admin.clinics.doctors', compact('biodata', 'vitalsigns', 'history', 'reports', 'procedures', 'examination', 'prescriptions', 'laboratories', 'labs', 'pros', 'manages', 'diagnoses', 'labfiles', 'admin', 'billing', 'chartsigns', 'allergies'));
=======
            $examination = Clinichistory::find($id)->examination;
            $prescriptions = Clinichistory::find($id)->prescription;       
            $laboratories = Clinichistory::find($id)->laboratory;
            $manages = Clinichistory::find($id)->management;
            $diagnoses = Clinichistory::find($id)->diagnosis;
            return view('admin.clinics.doctors', compact('biodata', 'vitalsigns', 'history', 'reports', 'procedures', 'examination', 'prescriptions', 'laboratories', 'labs', 'pros', 'manages', 'diagnoses'));
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
    }

     public function updateHistory(Request $request, $id)
    {
        if (!Gate::allows('doctor_patients')) {
            return abort(401);
        }
            $clinic = Clinichistory::findOrFail($id);
            $clinic->update($request->all());         
        
        $message = "Doctor updated  clinical history for Patient";
        self::addActivity($message); 

        return back()
            ->with('success',' Clinic history was successfully inserted .');  
    }

    public function storeProcedure(Request $request)
    {
        if (!Gate::allows('doctor_patients')) {
            return abort(401);
        }
         
        $rows = $request->input('rows');
<<<<<<< HEAD
        if($rows == null | $rows == 'undefined') {
            return back()
            ->with('success','Please add a procedure.'); 
        }
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
             foreach ($rows as $row)
            {
                $procedure[] = [
                    'clinicHistory_id' => $request->input('clinicHistory_id'),
                    'Name' => $row['Name'],
                    'Cost' => $row['Cost'],
<<<<<<< HEAD
                     
                ];
            }
            Procedural::insert($procedure);
        
        // Notification to the Doctor
        $id = $request->input('clinicHistory_id');
        $msg = " awaiting procedure";
       self::Notification($msg, $id, 3);

       // Activity
=======
                ];
            }
            Procedural::insert($procedure);
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
        $message = "Create new Procedure for Patient";
        self::addActivity($message); 

        return back()
            ->with('success','Procedure records was successfully .');
           
    }

    public function storeExamination(Request $request)
    {
        if (!Gate::allows('doctor_patients')) {
            return abort(401);
        }

        $examination = Examination::create($request->all());
        
         $message = "Create new Examination for Patient";
            self::addActivity($message); 

        return back()
            ->with('success','Examination records was successfully .');
           
    }

     public function storePrescription(Request $request)
    {
        if (!Gate::allows('doctor_patients')) {
            return abort(401);
        }

        $prescription = Prescription::create($request->all());

<<<<<<< HEAD
        // fire PostPublished event after post is successfully added to database
         //event(new PrescriptionPublished($prescription));
        // Notification to the Doctor
        $id = $request->clinicHistory_id;
        $msg = " prescription ready";
       self::Notification($msg, $id, 3);

        $message = "Create new Prescription for Patient";
           self::addActivity($message); 
=======
        $message = "Create new Prescription for Patient";
            self::addActivity($message); 
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
        
        return back()
            ->with('success','Prescription records was successfully .');
           
    }
<<<<<<< HEAD

     public function destroyPrescription(Request $request, $id)
    {
        if (! Gate::allows('doctor_patients')) {
            return abort(401);
        }
        $prescription = Prescription::findOrFail($id);
        $message = "Deleted " .$prescription->DrugName;
            self::addActivity($message);

        $prescription->delete();

       return back()
            ->with('success','Prescription record was successfully deleted.');
    }
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
     public function storeManagement(Request $request)
    {
        if (!Gate::allows('doctor_patients')) {
            return abort(401);
        }

        //$management = Management::create($request->all());

        $manage = new Management;
        $manage->Management = $request->Management;
        $manage->clinicHistory_id = $request->clinicHistory_id;
        $manage->save();

        $message = "Create new Management for Patient";
            self::addActivity($message); 
        
        return back()
            ->with('success','Management records was successfully.');
           
    }

////////////////////////// Pharmacy ///////////////////////////////////////////
     public function viewPatientsForPharmacy($id)
    {
        if (!Gate::allows('manage_waiting_patient')) {
            return abort(401);
        }
            $history =  Clinichistory::find($id);
            $biodata = Biodata::find($history->biodata_id);            
            $prescriptions = Clinichistory::find($id)->prescription;
<<<<<<< HEAD
            $allergies = Allergy::where('biodata_id', '=', $biodata->id)->get();
            return view('admin.clinics.pharmacy', compact('biodata', 'prescriptions', 'allergies'));
=======
            return view('admin.clinics.pharmacy', compact('biodata', 'prescriptions'));
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
    }


////////////////////// Laboratory ///////////////////////////////////////
     public function viewPatientsForLaboratory($id)
    {
        if (!Gate::allows('manage_waiting_patient')) {
            return abort(401);
        }
            $history =  Clinichistory::find($id);
            $biodata = Biodata::find($history->biodata_id);
            $laboratories = Clinichistory::find($id)->laboratory;
            
            return view('admin.clinics.lab', compact('biodata', 'laboratories', 'history'));
    }

     public function storeLab(Request $request)
    {
        if (!Gate::allows('manage_waiting_patient')) {
            return abort(401);
        }
            $rows = $request->input('rows');
             foreach ($rows as $row)
            {
                $labTest[] = [
                    'clinicHistory_id' => $request->input('clinicHistory_id'),
                    'LabTestName' => $row['LabTestName'],
                    'Result' => $row['Result'],
                    'Reference' => $row['Reference'],
                    'LabCost' => $row['LabCost'],
                ];
            }
<<<<<<< HEAD

            laboratory::insert($labTest);
            // Notification
             $id = $request->input('clinicHistory_id');
             $msg = "  for Lab Test";
             self::Notification($msg, $id, 5);
           //Activiity
            $message = "Submit new laboratory for Patient";
=======
             laboratory::insert($labTest);
                $message = "Submit new laboratory for Patient";
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
            self::addActivity($message); 

         return back()
            ->with('success','Laboratory records was successfully .');
    }
<<<<<<< HEAD
     public function UpdateLab(Request $request, $id)
=======
     public function UpdateLab(Request $request)
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
    {
        if (!Gate::allows('manage_waiting_patient')) {
            return abort(401);
        }
          foreach ($request->id as $i) {
            $lab = laboratory::where('id', $i)->first();
            $lab->Result = $request->result[$i];
            $lab->save();
            
        }
<<<<<<< HEAD
        
         // Notification to the Doctor
        //$id = $request->input('clinicHistory_id');
        $msg = "  Lab result";
       self::Notification($msg, $id, 2);       
=======
                
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
         $message = "Update laboratory for Patient";
            self::addActivity($message); 
            
         return back()
            ->with('success','Laboratory records was updated .');
        
    }
//////////////////// Diagnosis /////////////////////////////////////////////
     public function storeDiagnosis(Request $request)
    {
        if (!Gate::allows('doctor_patients')) {
            return abort(401);
        }

        
        $diagnosis = new Diagnosis;
        $diagnosis->Diagnosis = $request->Diagnosis;
        $diagnosis->clinicHistory_id = $request->clinicHistory_id;
        $diagnosis->save();

        $message = "Create new Diagnosis for Patient";
            self::addActivity($message); 
        
        return back()
            ->with('success','Diagnosis records was successfully.');
           
    }

<<<<<<< HEAD
//////////////////// Allergy /////////////////////////////////////////////
public function storeAllergy(Request $request)
{
    if (!Gate::allows('doctor_patients')) {
        return abort(401);
    }

    
    $allergy = new Allergy;
    $allergy->Name = $request->Name;
    $allergy->Staffname = Auth::user()->firstname .' ' .Auth::user()->lastname;
    $allergy->biodata_id = $request->biodata_id;
    $allergy->save();

    $message = "Create new Allergy for Patient";
        self::addActivity($message); 
    
    return back()
        ->with('success','Allergy records was successfully.');
       
}

////////////// Upload Lab Files //////////////////////////////////////
public function fileUpload(Request $request)

{

    $this->validate($request, [

        'image' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',

    ]);


    $image = $request->file('image');

    $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

    $destinationPath = public_path('lab_images');

    $image->move($destinationPath, $input['imagename']);

    $url = 'lab_images/'. $input['imagename'];
    
    $fileupload = new Fileupload;
    $fileupload->Name = $request->Name;
    $fileupload->Url = $url;
    $fileupload->clinicHistory_id = $request->clinicHistory_id;
    $fileupload->biodata_id = 0;
    $fileupload->save();
    
    return back()->with('success','File Upload successful');

}

///////////////////Admission ///////////////////////////////
public function storeAdmission(Request $request)

{
    $admin = new Admission;
    $admin->status = $request->status;
    $admin->clinicHistory_id = $request->id;
    $admin->save();
    return response()->json(array('msg' => 'Patient On Admission!!!'));
}


///////////////////Store Input and Output ///////////////////////
 public function storeInputOutput(Request $request)
    {
        if (!Gate::allows('nurse_patients')) {
            return abort(401);
        }
        $vital = Inputoutput::create($request->all());
               
        $message = "Create new inputoutput for the Patient";
        self::addActivity($message); 
        
        return back()
            ->with('success','InputOutput records was successfully .');
           
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

    public function addNurseActivity($message) 
   {
        $activity = new Nurseactivity;
        $activity->username = Auth::user()->firstname .' ' .Auth::user()->lastname;
        $activity->action = $message;
        $activity->save();
   }
<<<<<<< HEAD
  public function Notification($message, $id, $roleId)
   {
        // Notification 
        $history =  Clinichistory::find($id);
        $bios = Biodata::find($history->biodata_id);
        $patient = $bios->Surname. " ". $bios->Firstname;

        $users = Role::find($roleId)->users;
        $messages = $patient . $message;       
        
        Notification::send($users, new AllNotification($roleId, $messages));   
   }

=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35

}
