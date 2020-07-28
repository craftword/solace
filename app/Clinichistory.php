<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinichistory extends Model
{
    //
     protected $guarded = ['id'];

    public function biodata()
    {
        return $this->belongsTo('App\Biodata');
    }
<<<<<<< HEAD
    public function billing()
    {
        return $this->belongsTo('App\Billing');
    }

=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35

     public function vitalsign()
    {
        return $this->hasMany('App\VitalSign');
    }
    public function report()
    {
        return $this->hasMany('App\Report');
    }
     public function procedural()
    {
        return $this->hasMany('App\Procedural');
    }
    public function examination()
    {
        return $this->hasOne('App\Examination');
    }
    public function prescription()
    {
        return $this->hasMany('App\Prescription');
    }

    public function laboratory()
    {
        return $this->hasMany('App\Laboratory');
    }
    public function management()
    {
        return $this->hasMany('App\Management');
    }
    public function drugchart()
    {
        return $this->hasMany('App\Drugchart');
    }
    public function diagnosis()
    {
        return $this->hasMany('App\Diagnosis');
    }
<<<<<<< HEAD

     public function fileupload()
    {
        return $this->hasMany('App\Fileupload');
    }
     public function admission()
    {
        return $this->hasOne('App\Admission');
    }
     public function inputoutput()
    {
        return $this->hasMany('App\Inputoutput');
    }
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
}
