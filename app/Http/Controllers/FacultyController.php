<?php

namespace App\Http\Controllers;

use App\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $faculties = Faculty::all();
        return view('facultyindex', compact('faculties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('facultycreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $faculty = new Faculty();
        $faculty->name = $request->get('name');
        $faculty->abbreviation = $request->get('abbreviation');
        $faculty->aboutUs = $request->get('aboutUs');
        $faculty->costPerCreditHour = $request->get('costPerCreditHour');
        $faculty->save();
        return view('facultyaddWhyStudyHere')->with('faculty', $faculty);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function show(Faculty $faculty) {
//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function edit(Faculty $faculty) {
        return view('facultyedit', compact('faculty'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faculty $faculty) {
//
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faculty $faculty) {
        $faculty->delete();
        return redirect('faculty')->with('success', 'Information has been  deleted');
    }

    public function addWhyStudyHere(Request $request, Faculty $faculty) {
        $faculty->whystudyhere = $request->get('whystudyhere');
        $faculty->save();
        $request->session()->put('faculty', $faculty);
        return redirect()->route('partner.create');
    }

}
