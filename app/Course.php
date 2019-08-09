<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $primaryKey = 'courseId';
    public $incrementing = false;
    
    public function programmes() {
        return $this->belongsToMany(Programme::class, 'progstruc', 'courseId', 'progId');
    }
}
