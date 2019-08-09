<?php

namespace App\Http\Controllers;

use App\Partner;
use App\Faculty;
use Illuminate\Http\Request;

class PartnerController extends Controller {

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
        return view('facultyaddPartners')->with('faculty', $faculty);
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
                'type' => 'required',
            ]);
            $partner = new Partner();
            $partner->name = $request->get("name");
            $partner->type = $request->get("type");
            $partner->description = $request->get("description");
            $faculty = $request->session()->get('faculty');
            $faculty->partner()->save($partner);
            $partners = Partner::all()->where('facultyid', $faculty->id);
            return view('facultyaddPartners', compact('faculty'))->with('partners', $partners);
        } else if (request()->has("delete")) {
            $faculty = $request->session()->get('faculty');
            $partner = Partner::find(request()->get("delete"));
            $partner->delete();
            $partners = Partner::all()->where('facultyid', $faculty->id);
            return view('facultyaddPartners', compact('faculty'))->with('partners', $partners);
        } else if (request()->has("next")) {
            $faculty = $request->session()->get('faculty');
            return redirect()->action(
                            'AccreditationController@create', ['faculty' => $faculty]
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner) {
        //
    }

}
