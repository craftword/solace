<?php

namespace App;
<<<<<<< HEAD
use Carbon\Carbon;
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35

use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    //
    protected $guarded = ['id'];
<<<<<<< HEAD

     public function getExpireAttribute() 
    {
        $current = Carbon::now();
        $month =   $this->attributes['ExpiryDate'];

        if($month > $current) {
             $months = 1;
        }else {
            $months = 0;
        }

        
        return $months;
        
    }

=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
}
