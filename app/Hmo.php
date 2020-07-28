<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hmo extends Model
{
    //
    protected $guarded = ['id'];

     public function plan()
    {
        return $this->hasMany('App\Hmoplan');
    }
     public function drug()
    {
        return $this->hasMany('App\Hmotariffdrug');
    }
     public function lab()
    {
        return $this->hasMany('App\Hmotarifflab');
    }
     public function procedure()
    {
        return $this->hasMany('App\Hmotariffprocedure');
    }
}
