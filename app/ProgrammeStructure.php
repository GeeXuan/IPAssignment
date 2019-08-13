<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgrammeStructure extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = false;
    
    public function courses() {
        return $this->belongsToMany(Course::class, 'progstruc', 'progId', 'courseId');
    }

    public function campuses() {
        return $this->belongsToMany(Campus::class, 'progcampus', 'progId', 'campusId');
    }
}
