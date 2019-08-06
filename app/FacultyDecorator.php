<?php

namespace App;

require_once 'IFaculty';

abstract class FacultyDecorator implements App\IFaculty {

    protected $faculty;

    function __construct($faculty) {
        $this->faculty = $faculty;
    }

}
