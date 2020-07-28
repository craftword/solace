<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Biodata extends Model
{
    //
    protected $guarded = ['id'];

    public function clinichistory()
    {
        return $this->hasMany('App\Clinichistory');
    }
     public function billing()
    {
        return $this->hasMany('App\Billing');
    }

    /**
    * Accessor for Age
    */
    public function getAgeAttribute () 
    {
    	return Carbon::parse($this->attributes['Birthdate'])->age;
    }
  
    public function getMonthAttribute () 

    {
        $current = Carbon::now();
        $month =   $this->attributes['Birthdate'];

        $diff = abs(strtotime($month) - strtotime($current));
        $years   = floor($diff / (365*60*60*24)); 
        $months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        return $months;
        
    }

     public function hmomember()
    {
        return $this->hasOne('App\Addpatienthmo');
    }
  

}
