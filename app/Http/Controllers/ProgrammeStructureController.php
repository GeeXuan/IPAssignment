<?php

namespace App\Http\Controllers;

use App\ProgrammeStructure;
use App\Programme;
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
        $programmes = Programme::all();
        return view('programmeindex', compact('programmes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = \App\Course::all();
        $campus = \App\Campus::all();
        $faculty = \App\Faculty::all();
        return view('programmes')->with('courses', $courses)->with('campus', $campus)->with('faculty', $faculty);
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
        $programme->progId = $request->session()->get('progId');
        $programme->progName = $request->session()->get('progName');
        $programme->progDesc = $request->session()->get('progDesc');
        $programme->profession = $request->session()->get('profession');
        $programme->facilitiesFee = $request->session()->get('facilitiesFee');
        $programme->progLevel = $request->session()->get('progLevel');
        $programme->facultyid = $request->session()->get('faculty');
        $programme->durationStudy = $request->session()->get('duration');
        $courses = \App\Course::find($request->get('courselist'));
        $programme->courses()->attach($courses);
        $campus = \App\Campus::find($request->input('camplist'));
        $programme->campuses()->attach($campus);
        $programme->save();

        return redirect('programmes')->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $request->session()->put('progId', $request->input('progId'));
        $request->session()->put('progName', $request->input('progName'));
        $request->session()->put('progDesc', $request->input('progDesc'));
        $request->session()->put('profession', $request->input('profession'));
        $request->session()->put('facilitiesFee', $request->input('facilitiesFee'));
        $request->session()->put('progLevel', $request->input('progLevel'));
        $request->session()->put('faculty', $request->input('faculty'));
        $request->session()->put('duration', $request->input('duration'));
        $request->session()->put('camplist', $request->input('camplist'));
        
        $courses = \App\Course::all();
        return view('progstruccreate')->with('courses', $courses)->with('progId', $request->session()->get('progId'))->with('progName', $request->session()->get('progName'))
                ->with('progDesc', $request->session()->get('progDesc'))->with('profession', $request->session()->get('profession'))->with('facilitiesFee', $request->session()->get('facilitiesFee'))
                ->with('progLevel', $request->session()->get('progLevel'))->with('faculty', $request->session()->get('faculty'))->with('duration', $request->session()->get('duration'))
                ->with('camplist', $request->session()->get('camplist'));
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
