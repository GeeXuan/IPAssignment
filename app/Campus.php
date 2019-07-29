<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\LoanInformation;
use App\Programme;

class Campus extends Model
{
    public function loan_information(){
        return $this->belongsToMany(LoanInformation::class);
    }

    public function programmes(){
        return $this->belongsToMany(Programme::class);
    }
}
