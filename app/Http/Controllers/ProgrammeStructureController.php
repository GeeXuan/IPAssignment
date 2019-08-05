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
