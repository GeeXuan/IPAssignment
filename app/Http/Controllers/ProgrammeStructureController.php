<?php

namespace App\Http\Controllers;

use App\ProgrammeStructure;
use Illuminate\Http\Request;

class ProgrammeStructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course = \App\Course::all();
        return view('progstruccreate')->with('course', $course);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function edit($progId)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $progId)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function destroy($progId)
    {

    }
}
