<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Antenatal extends Model
{
    //
    protected $guarded = ['id'];

     public function getEddAttribute () 

    {
        
        $lmp =   $this->attributes['LMP'];
        $year = date('Y', strtotime($lmp));
        $mth = date('m', strtotime($lmp));
        $dd = date('d', strtotime($lmp));

        $days = $dd + 7;
        $months = $mth + 9;

        if ($days > 30 ) {
            $expected_days = $days - 30;
        }
        else {
            $expected_days = $days;
        }

        if ($months > 12 ) {
            $expected_months = $months - 12;
            $expected_year = $year + 1;
        }
        else {
           $expected_months = $months;
            $expected_year = $year;
        }
        
        return $expected_months. '/'.$expected_days. '/' . $expected_year;
        //return $months;
    }

    public function getEgaAttribute () 

    {
        $current = Carbon::now();
        $month =   $this->attributes['LMP'];

<<<<<<< HEAD
        $diff = abs(strtotime($current) - strtotime($month));
=======
        $diff = abs(strtotime($month) - strtotime($current));
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
        $weeks = $diff / 604800 % 52;
         $expected_weeks = 0;
        for($i=1; $i <= $weeks; $i++) {
            switch ($i) {
                case 12:
                    $expected_weeks = $weeks + 1;
                    break;
                case 24:
<<<<<<< HEAD
                    $expected_weeks = $weeks + 1;
=======
                    $expected_weeks = $weeks + 2;
                    break;
                case 36:
                    $expected_weeks = $weeks + 3;
                    break;
                 case 40:
                    $expected_weeks = $weeks + 3;
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                    break;
                default:
                    $expected_weeks = $weeks;
            }

        }
        return $expected_weeks;
        
    }
}
