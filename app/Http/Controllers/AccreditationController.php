<?php
//Saw Gee Xuan
namespace App\Http\Controllers;

use App\Accreditation;
use App\Faculty;
use Illuminate\Http\Request;

class AccreditationController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Faculty $faculty) {
        return view('facultyaddAccreditation')->with('faculty', $faculty);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        if (request()->has("add")) {
            $request->validate([
                'name' => 'required|max:255',
                'description' => 'required',
            ]);
            $accreditation = new Accreditation();
            $accreditation->name = $request->get("name");
            $accreditation->description = $request->get("description");
            $faculty = $request->session()->get('faculty');
            $faculty->accreditation()->save($accreditation);
            $accreditations = $faculty->accreditation()->get();
            return view('facultyaddAccreditation', compact('faculty'))->with('accreditations', $accreditations);
        } else if (request()->has("delete")) {
            $faculty = $request->session()->get('faculty');
            $accreditation = Accreditation::find(request()->get("delete"));
            $accreditation->delete();
            $accreditations = $faculty->accreditation()->get();
            return view('facultyaddAccreditation', compact('faculty'))->with('accreditations', $accreditations);
        } else if (request()->has("done")) {
            $faculty = $request->session()->get('faculty');
            return redirect()->action('FacultyController@index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Accreditation  $accreditation
     * @return \Illuminate\Http\Response
     */
    public function show(Accreditation $accreditation) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Accreditation  $accreditation
     * @return \Illuminate\Http\Response
     */
    public function edit(Accreditation $accreditation) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Accreditation  $accreditation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Accreditation $accreditation) {
        if (request()->has("add")) {
            $request->validate([
                'name' => 'required|max:255',
                'description' => 'required',
            ]);
            $accreditation = new Accreditation();
            $accreditation->name = $request->get("name");
            $accreditation->description = $request->get("description");
            $faculty = $request->session()->get('faculty');
            $faculty->accreditation()->save($accreditation);
            $accreditations = $faculty->accreditation()->get();
            return view('facultyeditAccreditation', compact('faculty'))->with('accreditations', $accreditations);
        } else if (request()->has("delete")) {
            $faculty = $request->session()->get('faculty');
            $accreditation = Accreditation::find(request()->get("delete"));
            $accreditation->delete();
            $accreditations = $faculty->accreditation()->get();
            return view('facultyeditAccreditation', compact('faculty'))->with('accreditations', $accreditations);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Accreditation  $accreditation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accreditation $accreditation) {
        //
    }

    public function editAccreditation(Faculty $faculty) {
        $accreditations = $faculty->accreditation;
        return view('facultyeditAccreditation')->with('faculty', $faculty)->with('accreditations', $accreditations);
    }

}
