<?php

namespace App\Observer;

use App\Programme;

class ProgrammeObserver {

    public function creating(Programme $programme) {
        $tax = .20;
        $programme->facilitiesFee += $programme->facilitiesFee * $tax;
        $courses = $programme->courses()->get();
        $total = 0;
        foreach ($courses as $course) {
            $total += $course->creditHours;
        }
        $programme->totalCreditHours = $total;
    }
}  