<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
include_once 'IFaculty.php';

class Faculty extends Model implements IFaculty {

    public $name, $aboutUs, $abbreviation, $costPerCreditHour;

    public function getContent() {
        
    }
    
    public function save(array $options = array()) {
        $this->__set("name", $this->name);
        $this->__set("aboutUs", $this->aboutUs);
        $this->__set("abbreviation", $this->abbreviation);
        $this->__set("costPerCreditHour", $this->costPerCreditHour);
        parent::save($options);
    }
}
