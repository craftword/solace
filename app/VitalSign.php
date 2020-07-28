<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vitalsign extends Model
{
    //
    protected $guarded = ['id'];

    // DEFINE RELATIONSHIPS --------------------------------------------------
    public function clinichistory() {
        return $this->belongsTo('App\Clinichistory');
    }
}
