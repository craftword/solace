<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Biodata;
use App\Clinichistory;
use App\Diagnosis;
use App\Procedural;
use App\Laboratory;
use App\Admission;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StatController extends Controller
{
    //
    public function getStat(Request $request)
    {
        $result = [];
         if($request->Name == "All") {
             $stats = Diagnosis::WhereBetween("created_at", [$request->Startdate, $request->Enddate])
            ->get();
         }
         else {
            $stats = Diagnosis::where("Diagnosis", "like", "%".$request->Name."%")
            ->WhereBetween("created_at", [$request->Startdate, $request->Enddate])
            ->get();
         }
        for ($i=0; $i < count($stats); $i++) {
           // $result[$i] = $stats[$i]->clinicHistory_id;
            $history =  Clinichistory::find($stats[$i]->clinicHistory_id);
            $biodata = Biodata::find($history->biodata_id);
            $bday = $biodata->Birthdate;
            $sex = $biodata->Sex;
            $age =self::checkAge($bday); 
          
           switch ([$request->Age, $request->Gender]) {
               // All Group
                case ['All', 'Male']:
                    if($sex == 'Male') {
                        $result[$i] = $biodata;
                    }                    
                break;                
                case ['All', 'Female']:
                    if($sex == 'Female') {
                        $result[$i] = $biodata;
                    }                    
                break;

               // All Group and Gender
                case ['All', 'All']:
                    $result[$i] = $biodata;
                break;
                // Particular Group and All Gender
                case ['Neonate', 'All'];
                    if($age <= 28) {    // less and equal 28 days
                        $result[$i] =  $biodata;
                   }
                break;
                case ['Infant', 'All'];
                    if($age > 28 && $age < 731) { // less than One year (731days)
                        $result[$i] =  $biodata;
                   }
                break;
                case ['Preschool', 'All'];
                    if($age > 730 && $age < 1825) { // greater than One year less than five years
                        $result[$i] =  $biodata;
                   }
                break;
                case ['Middle children', 'All'];
                    if($age > 1825 && $age < 4380) { // greater than five years less than Twelve years
                        $result[$i] =  $biodata;
                   }
                break;
                case ['Adult', 'All'];
                    if($age > 4380) { // greater than Twelve years
                        $result[$i] =  $biodata;
                   }
                break;
                // Particular Group and All Male
                case ['Neonate', 'Male'];
                    if($age <= 28 && $sex == 'Male') {    // less and equal 28 days
                        $result[$i] =  $biodata;
                   }
                break;
                case ['Infant', 'Male'];
                    if($age > 28 && $age < 731 && $sex == 'Male') { // less than One year (731days)
                        $result[$i] =  $biodata;
                   }
                break;
                case ['Preschool', 'Male'];
                    if($age > 730 && $age < 1825 && $sex == 'Male') { // greater than One year less than five years
                        $result[$i] =  $biodata;
                   }
                break;
                case ['Middle children', 'Male'];
                    if($age > 1825 && $age < 4380 && $sex == 'Male') { // greater than five years less than Twelve years
                        $result[$i] =  $biodata;
                   }
                break;
                case ['Adult', 'Male'];
                    if($age > 4380 && $sex == 'Male') { // greater than Twelve years
                        $result[$i] =  $biodata;
                   }
                break;
                // Particular Group and All Female
                case ['Neonate', 'Female'];
                    if($age <= 28 && $sex == 'Female') {    // less and equal 28 days
                        $result[$i] =  $biodata;
                   }
                break;
                case ['Infant', 'Female'];
                    if($age > 28 && $age < 731 && $sex == 'Female') { // less than One year (731days)
                        $result[$i] =  $biodata;
                   }
                break;
                case ['Preschool', 'Female'];
                    if($age > 730 && $age < 1825 && $sex == 'Female') { // greater than One year less than five years
                        $result[$i] =  $biodata;
                   }
                break;
                case ['Middle children', 'Female'];
                    if($age > 1825 && $age < 4380 && $sex == 'Female') { // greater than five years less than Twelve years
                        $result[$i] =  $biodata;
                   }
                break;
                case ['Adult', 'Female'];
                    if($age > 4380 && $sex == 'Female') { // greater than Twelve years
                        $result[$i] =  $biodata;
                   }
                break;
                
            }
           
                    
        }

         return response()->json($result);

    }
    

     public function checkAge($age)
    {
        $current = Carbon::now();
        $date = Carbon::parse($age)->diffInDays();
        
        return $date;
      
    } 

     public function getStatProcedure(Request $request)
    {
        if($request->Name == "All") {
             $stats = Procedural::WhereBetween("created_at", [$request->Startdate, $request->Enddate])
            ->get();
        } 
        else 
        {
             $stats = Procedural::where("Name", "like", "%".$request->Name."%")
            ->WhereBetween("created_at", [$request->Startdate, $request->Enddate])
            ->get();
        }
       
         for ($i=0; $i < count($stats); $i++) {
            $history =  Clinichistory::find($stats[$i]->clinicHistory_id);
            $biodata = Biodata::find($history->biodata_id);
            $result[$i] =  array('Name'=>$biodata->Surname.' '.$biodata->Firstname, 'Age'=>$biodata->Birthdate, 'ProcedureName'=>$stats[$i]->Name, 'Date'=>date($stats[$i]->created_at));
            
         }
        return $result;
    }
     public function getStatLab(Request $request)
    {
        if($request->Name == "All") {
             $stats = Laboratory::WhereBetween("created_at", [$request->Startdate, $request->Enddate])
            ->get();
        }
        else {
            $stats = Laboratory::where("LabTestName", "like", "%".$request->Name."%")
            ->WhereBetween("created_at", [$request->Startdate, $request->Enddate])
            ->get();
        }
        
         for ($i=0; $i < count($stats); $i++) {
            $history =  Clinichistory::find($stats[$i]->clinicHistory_id);
            $biodata = Biodata::find($history->biodata_id);
             $result[$i] =  array('Name'=>$biodata->Surname.' '.$biodata->Firstname, 'Age'=>$biodata->Birthdate, 'Labtest'=>$stats[$i]->LabTestName , 'Date'=>date($stats[$i]->created_at));
            
         }
        return $result;
    }
     public function getAllPatients(Request $request)
    {
        
        
        $stats = DB::table('clinichistories')
        ->select('clinichistories.*','diagnoses.*')
        ->join('diagnoses', 'clinichistories.id', '=', 'diagnoses.clinicHistory_id')
        ->whereBetween('clinichistories.created_at', [$request->Startdate, $request->Enddate])
        ->get();

         for ($i=0; $i < count($stats); $i++) {
           
            $biodata = Biodata::find($stats[$i]->biodata_id);
            // $diag = Diagnosis::where("clinicHistory_id", $stats[$i]->id)->get();
            
            $result[$i] =  array('Name'=>$biodata->Surname.' '.$biodata->Firstname, 'Age'=>$biodata->Birthdate, 'Diagnosis'=>$stats[$i]->Diagnosis, 'Date'=>date($stats[$i]->created_at));
        
            
         }
        return $result;
       
    }

    
     public function getAllPatientsOnAdmission(Request $request)
    {
        
        $stats = Admission::select("admissions.*")->WhereBetween("created_at", [$request->Startdate, $request->Enddate])
        ->get();
         for ($i=0; $i < count($stats); $i++) {
            $history =  Clinichistory::find($stats[$i]->clinicHistory_id);
            $biodata = Biodata::find($history->biodata_id);
             $result[$i] =  array('Name'=>$biodata->Surname.' '.$biodata->Firstname, 'Age'=>$biodata->Birthdate, 'Date'=>date($stats[$i]->created_at));
        
            
         }
        return $result;
    }
}
