<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expenditure extends Model
{
    //
    protected $guarded = ['id'];

    public function payment()
    {
        return $this->hasMany('App\Payment');
    }
    
}
