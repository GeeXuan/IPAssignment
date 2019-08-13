<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Adapter;

interface Icampus{
    public function addCamp($request) ;
    public function updateCamp($request, $id);
    public function deleteCamp($id);
}