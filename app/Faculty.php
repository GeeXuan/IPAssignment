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

    public function highlight() {
        return $this->hasMany('App\Highlight', 'facultyid');
    }

    public function testimonial() {
        return $this->hasMany('App\Testimonial', 'facultyid');
    }

}
