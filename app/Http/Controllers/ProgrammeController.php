<?php

namespace App\Http\Controllers;

use App\Programme;
use Illuminate\Http\Request;

class ProgrammeController extends Controller
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
        $campus = \App\Campus::all();
        $levelOfStudy = \App\LevelOfStudy::all();
        $faculty = \App\Faculty::all();
        return view('progcreate')->with('campus', $campus)->with('levelOfStudy', $levelOfStudy)->with('faculty', $faculty);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $programme = new Programme();
        $programme->progId = $request->get('progId');
        $programme->progName = $request->get('progName');
        $programme->progDesc = $request->get('progDesc');
        $programme->profession = $request->get('profession');
        $programme->facilitiesFee = $request->get('facilitiesFee');
        $programme->progLevel = $request->get('progLevel');
        $programme->facultyid = $request->get('faculty');
        $programme->durationStudy = $request->get('duration');
        $programme->levelofstudyid = $request->get('levelOfStudy');
        $programme->save();
        
        $campus = \App\Campus::find($request->get('camplist'));
        $programme->campuses()->attach($campus);
        return redirect('programmes')->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function show(Programme $programme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function edit(Programme $programme)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Programme $programme)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Programme $programme)
    {
        //
    }
}
