<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programme extends Model {

    protected $primaryKey = 'progId';
    public $incrementing = false;
    
    public function courses() {
        return $this->belongsToMany(Course::class, 'prog_struc', 'courseId', 'progId');
    }

    public function campuses() {
        return $this->belongsToMany(Campus::class, 'progcampus', 'progId', 'campusId');
    }

}
