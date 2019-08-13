<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Faculty extends Model {

    public function partner() {
        return $this->hasMany('App\Partner', 'facultyid');
    }

    public function accreditation() {
        return $this->hasMany('App\Accreditation', 'facultyid');
    }

}
