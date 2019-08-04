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
        $campus = \App\Campus::all();
        $faculty = \App\Faculty::all();
        return view('progcreate')->with('campus', $campus)->with('faculty', $faculty);

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
        return view('progstruccreate')->with('progId', $request->session()->get('progId'))->with('progName', $request->session()->get('progName'))
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
        $programme = Programme::find($progId);
        $campus = \App\Campus::all();
        $faculty = \App\Faculty::all();
        return view('editprogramme', compact('programme', 'progId'))->with('campus', $campus)->with('faculty', $faculty);
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
        $programme = Programme::find($progId);
        $programme->progId = $request->get('progId');
        $programme->progName = $request->get('progName');
        $programme->progDesc = $request->get('progDesc');
        $programme->profession = $request->get('profession');
        $programme->facilitiesFee = $request->get('facilitiesFee');
        $programme->progLevel = $request->get('progLevel');
        $programme->facultyid = $request->get('faculty');
        $programme->durationStudy = $request->get('duration');
        $programme->save();
        
        $campus = \App\Campus::find($request->get('camplist'));
        $programme->campuses()->attach($campus);
        return redirect('programmes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function destroy($progId)
    {
        $programme = Programme::find($progId);
        $programme->delete();
        return redirect('programmes')->with('success', 'Information has been deleted');
    }
}
