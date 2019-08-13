<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanInformation extends Model {

    public function campuses() {
        return $this->belongsToMany(Campus::class, 'loancampus', 'loanId', 'campusId');
    }

}
