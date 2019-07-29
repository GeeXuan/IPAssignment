<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programme extends Model {

    public function courses() {
        return $this->belongsToMany(Course::class);
    }

    public function campuses() {
        return $this->belongsToMany(Campus::class);
    }

}
