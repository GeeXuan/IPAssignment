<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programme extends Model {

    public function courses() {
        return $this->belongsToMany(Course::class, 'progstruc', 'courseId', 'progId');
    }

    public function campuses() {
        return $this->belongsToMany(Campus::class, 'progcampus', 'progId', 'campusId');
    }

}
