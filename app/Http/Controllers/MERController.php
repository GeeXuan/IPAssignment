<?php

namespace App\Http\Controllers;

use App\MER;
use App\Programme;
use Illuminate\Http\Request;

class MERController extends Controller
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
        

        return redirect('m_e_r_s')->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MER  $mER
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $request->session()->put('progId', $request->session()->get('progId'));
        $request->session()->put('progLevel', $request->session()->get('progLevel'));
        $request->session()->put('courselist', $request->input('courselist'));
        
        $courses = \App\Course::all();
        return view('mercreate')->with('courses', $courses)->with('progId', $request->session()->get('progId'))->with('courses', $courses)->with('progLevel', $request->session()->get('progLevel'))->with('courselist', $request->session()->get('courselist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MER  $mER
     * @return \Illuminate\Http\Response
     */
    public function edit(MER $mER)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MER  $mER
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MER $mER)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MER  $mER
     * @return \Illuminate\Http\Response
     */
    public function destroy(MER $mER)
    {
        //
    }
}
