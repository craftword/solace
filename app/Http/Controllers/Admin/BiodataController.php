<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Biodata;
use App\Hmo;
use App\Hmoplan;
use App\Addpatienthmo;
use App\Activity;
<<<<<<< HEAD
use App\Humanresource;
use App\Familycard;
use App\Familymember;
use App\Fileupload;
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class BiodataController extends Controller
{
    /**
     * Display a listing of Patients.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('manage_patients')) {
            return abort(401);
        }

        $patients = Biodata::all();

        return view('admin.patients.index', compact('patients'));
    }

    /**
     * Show the form for creating new Patients.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        if (! Gate::allows('manage_patients')) {
            return abort(401);
        }        

        return view('admin.patients.create');
    }

<<<<<<< HEAD
    public function show($id)

    {
        if (! Gate::allows('manage_patients')) {
            return abort(401);
        }        

            $patients = Biodata::findOrFail($id);

        return view('admin.patients.show', compact('patients'));
    }


=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
    /**
     * Store a newly created  Patient Biodata in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('manage_patients')) {
            return abort(401);
        }

        $patient = new Biodata;
        $patient->Surname = $request->Surname;
        $patient->Firstname = $request->Firstname;
        $patient->Middlename = $request->Middlename;
        $patient->PhoneNumber = $request->PhoneNumber;
        $patient->Email = $request->Email;
        $patient->Sex = $request->Sex;
        $patient->Address = $request->Address;
        $patient->StateOfOrigin = $request->StateOfOrigin;
        $patient->Nationality = $request->Nationality;
        $patient->Religion = $request->Religion;
        $patient->Occupation = $request->Occupation;
        $patient->Birthdate = $request->Birthdate;
        $patient->RegistrationType = $request->RegistrationType;
        $patient->NextOfKin = $request->NextOfKin;
        $patient->NextOfKinPhone = $request->NextOfKinPhone;
        $patient->NextOfKinAddress = $request->NextOfKinAddress;
        $patient->Status = 'unchecked';
        
        $patient->save();
        
       
        $message = "Created new patient's account for " .$request->Surname." ".$request->Firstname;
        self::addActivity($message); 

        return redirect()->route('admin.patients.index');
    }


    /**
     * Show the form for editing patient.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('manage_patients')) {
            return abort(401);
        }

        $patient = Biodata::findOrFail($id);
<<<<<<< HEAD
        $families =  Familycard::all()->pluck('familyname', 'id'); 
        $member =  Familymember::where('pId', $id)->get();        

        return view('admin.patients.edit', compact('patient', 'families', 'member'));
=======

        

        return view('admin.patients.edit', compact('patient'));
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
    }

    /**
     * Update patient in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (! Gate::allows('manage_patients')) {
            return abort(401);
        }
        $user = Biodata::findOrFail($id);
        $user->update($request->all());
        
        
        $message = "Edited patient's account for " .$request->Surname." ".$request->Firstname;
        self::addActivity($message); 

<<<<<<< HEAD
       // return redirect()->route('admin.patients.edit');
       return back();
=======
        return redirect()->route('admin.patients.index');
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
    }

    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('manage_patients')) {
            return abort(401);
        }


        $user = Biodata::findOrFail($id);
        
        $message = "Deleted patient's account for " .$user->Surname." ".$user->Firstname;
        self::addActivity($message); 


        $user->delete();

        return redirect()->route('admin.patients.index');
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('manage_patients')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Biodata::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

    /**
     * selected all waiting Patients at once.
     *
     * @param Request $request
     */

    public function allWaitingPatients()
    {
        if (! Gate::allows('manage_waiting_patient')) {
            return abort(401);
        }

        $patients = Biodata::where('Status', '=', 'checked')->get();

        return view('admin.patients.wait', compact('patients'));
    }
    public function addhmo($id)
    {
<<<<<<< HEAD
        if (! Gate::allows('manage_hmo')) {
=======
        if (! Gate::allows('manage_waiting_patient')) {
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
            return abort(401);
        }
           $hmonames = Hmo::all()->pluck('Name', 'id');
           $patient =  Biodata::findOrFail($id);
           $hmomember = Biodata::find($id)->hmomember;          
        return view('admin.patients.addhmo', compact('patient', 'hmonames', 'hmomember'));
    }
<<<<<<< HEAD


    public function storepatienthmo(Request $request)
    {
        if (! Gate::allows('manage_hmo')) {
=======
    public function storepatienthmo(Request $request)
    {
        if (! Gate::allows('manage_waiting_patient')) {
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
            return abort(401);
        }
          $hmonames = Hmo::find($request->Hmo);
          $hmo = new Addpatienthmo;
          $hmo->Hmo =  $hmonames->Name;
          $hmo->Plan = $request->Plan;
          $hmo->biodata_id = $request->biodata_id;
          $hmo->save();
       
        return back();
        
    }
<<<<<<< HEAD
     public function updatehmo(Request $request, $id)
    {
        if (! Gate::allows('manage_hmo')) {
            return abort(401);
        }
           $user = Addpatienthmo::findOrFail($id);
           $user->update($request->all());
       
        return back();
        
    }

     public function getPic(Request $request, $id)
    {
        $patient =  Biodata::findOrFail($id);
        if ($patient->Photograph == null)  {
            $url = "default.jpg";
        }
        else {
            $url = $patient->Photograph;
        }
        return back();
        
    }

    public function storePic(Request $request)
    {
        $this->validate($request, [

        'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',

        ]);
    
        $image = $request->file('image');

        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('images');

        $image->move($destinationPath, $input['imagename']);  

        $url = 'images/'. $input['imagename'];
        if($request->id) {
             Humanresource::where('id', $request->id)
                  ->update(['PHOTOGRAPH' => $url]);
        }else {
             Biodata::where('id', $request->biodata_id)
                  ->update(['Photograph' => $url]);
        }

       
        
        return back()->with('success', 'Image Upload successful');
       
        
    }
// for outside patient 
     public function addOutsidePatientHistory($id)
    {
        if (! Gate::allows('manage_patients')) {
            return abort(401);
        }
           $patient =  Biodata::findOrFail($id);
                    
        return view('admin.patients.outside', compact('patient'));
    }

// family cards 
public function getFamilies(Request $request)
    {
        if (! Gate::allows('manage_patients')) {
            return abort(401);
        }
           $families =  Familycard::all();
                    
        return view('admin.patients.family', compact('families'));
    }

 public function addFamilyCards(Request $request)
    {
        if (! Gate::allows('manage_patients')) {
            return abort(401);
        }
          $card = Familycard::create($request->all());
                    
       return back()
            ->with('success','Family Card created .');
    }

    public function addMembers(Request $request)
    {
        if (! Gate::allows('manage_patients')) {
            return abort(401);
        }
         
         $card = Familymember::create($request->all());
                    
       return back()
            ->with('success','Family Member added.');
       
    }
    public function unregisteredPatients($id)
    {
        if (! Gate::allows('manage_patients')) {
            return abort(401);
        }
        $labfiles = Fileupload::where('biodata_id', $id)->get();
        $biodata_id = $id;
                    
        return view('admin.patients.unregistered', compact('labfiles', 'biodata_id'));
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
    $fileupload->clinicHistory_id = 0;
    $fileupload->biodata_id = $request->biodata_id;
    $fileupload->save();
    
    return back()->with('success','File Upload successful');

}
// activities
=======

>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
    public function addActivity($message) 
   {
        $activity = new Activity;
        $activity->username = Auth::user()->firstname .' ' .Auth::user()->lastname;
        $activity->action = $message;
        $activity->save();
   }
    
}
