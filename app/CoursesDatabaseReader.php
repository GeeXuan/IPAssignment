<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

/**
 * Description of DatabaseReader
 *
 * @author Michelle
 */
class CoursesDatabaseReader implements ReaderInterface {

    public function read(){
        $result = Course::all();
        \Debugbar::info($result);
        return $result;
    }

}
