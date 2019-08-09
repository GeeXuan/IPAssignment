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
 * @author Saw
 */
class FacultyDatabaseReader implements ReaderInterface {

    public function read(){
        $result = Faculty::all();
        \Debugbar::info($result);
        return $result;
    }

}
