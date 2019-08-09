<?php

namespace App\Observer;
 
use App\Programme;
 
class ProgrammeObserver
{
    public function creating(Programme $programme)
    {
        $tax = .20;
        $programme->facilitiesFee += $programme->facilitiesFee * $tax;

    }
    
    public function created(Programme $programme) {
        $courses = $programme->courses()->get();
        $total = 0;
        foreach ($courses as $course) {
//            $total =+ $course->creditHours;
            $total =+ 1;
        }
        $programme->totalCreditHours = $total;
        $programme->save();
    }
}