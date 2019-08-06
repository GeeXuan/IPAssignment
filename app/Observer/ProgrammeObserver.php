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
}