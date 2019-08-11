<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Adapter;

use App\Campus;

class campusAdapter implements App\Adapter\Icampus {

    private $campus;

    function __construct($campus) {
        $this->campus = $campus;
    }

    public function addCamp($request) {
        $campus = new Campus();
        $campus->id = $request->get('id');
        $campus->name = $request->get('name');
        $campus->abbreviation = $request->get('abbreviation');
        $campus->address = $request->get('address');
        $campus->phone = $request->get('phone');
        $campus->created_at = $request->get('created_at');
        $campus->updated_at = $request->get('updated_at');
        $campus->save();
    }

    public function deleteCamp($id) {
        $campus = Campus::find($id);
        $campus->delete();
    }

    public function updateCamp($request, $id) {
        $campus = Campus::find($id);
        $campus->id = $request->get('id');
        $campus->name = $request->get('name');
        $campus->abbreviation = $request->get('abbreviation');
        $campus->address = $request->get('address');
        $campus->phone = $request->get('phone');
        $campus->created_at = $request->get('created_at');
        $campus->updated_at = $request->get('updated_at');
        $campus->save();
    }

}
