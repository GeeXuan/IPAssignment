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
        if ($request->has('next')) {
            $request->validate([
                'name' => 'required|max:255',
                'abbreviation' => 'required',
                'aboutUs' => 'required',
                'costPerCreditHour' => 'required|numeric',
            ]);
            $faculty = new Faculty();
            $faculty->name = $request->get('name');
            $faculty->abbreviation = $request->get('abbreviation');
            $faculty->aboutUs = $request->get('aboutUs');
            $faculty->costPerCreditHour = $request->get('costPerCreditHour');
            if ($request->has('whystudyhere')) {
                $faculty->whystudyhere = $request->get('whystudyhere');
            }
            $faculty->save();
            $request->session()->put('faculty', $faculty);
            return redirect()->action(
                            'PartnerController@create', ['faculty' => $faculty]
            );
        } else {
            return redirect('faculties');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function show(Faculty $faculty) {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function edit(Faculty $faculty) {
        \Debugbar::info($faculty);
        return view('facultyedit', ["faculty" => $faculty]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faculty $faculty) {
        $request->validate([
            'name' => 'required|max:255',
            'abbreviation' => 'required',
            'aboutUs' => 'required',
            'costPerCreditHour' => 'required|numeric',
        ]);
        $faculty->name = $request->get('name');
        $faculty->abbreviation = $request->get('abbreviation');
        $faculty->aboutUs = $request->get('aboutUs');
        $faculty->costPerCreditHour = $request->get('costPerCreditHour');
        if ($request->has('whystudyhere')) {
            $faculty->whystudyhere = $request->get('whystudyhere');
        }
        $faculty->save();
        $request->session()->put('faculty', $faculty);
        return redirect('faculties')->with('success', 'Information has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faculty $faculty) {
        $faculty->delete();
        return redirect('faculties')->with('success', 'Information has been deleted');
    }

    public function generateXML() {
        $reader = new \App\FacultyDatabaseReader();
        \Debugbar::info($reader);
        $writer = new \App\FacultyXMLWriter();
        \Debugbar::info($writer);
        $writer->write($reader->read());
        $file = public_path() . "\\xml\\faculty.xml";

        $headers = array(
            'Content-Type: application/xsl',
        );
        return \Response::download($file, 'faculty.xml', $headers);
//        $file = \File::get("C:/xampp/htdocs/IPAssignment/xml/faculty.xml");
//        $response = \Response::make($file, 200);
//        $response->header('Content-Type', 'application/xsl');
//        return $response;
//        $proc = new \XSLTProcessor();
//        $proc->importStylesheet(\DOMDocument::load("C:\xampp\htdocs\IPAssignment\xml\\facultyxslt.xsl")); //load XSL script
//        return $proc->transformToXML(\DOMDocument::load("C:\xampp\htdocs\IPAssignment\xml\\faculty.xml")); //load XML file and echo
//        return view('faculties')->with('success', 'Generated');
    }

}
