<?php

namespace App\Http\Controllers;

use App\LoanInformation;
use Illuminate\Http\Request;

class LoanInformationController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $loans = LoanInformation::all();
        return view('loanindex', compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $campuses = \App\Campus::all();
        return view('loaninfocreate')->with("campuses", $campuses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $loan = new LoanInformation();
        $loan->name = $request->get("name");
        $loan->description = $request->get("description");
        $campuses = \App\Campus::find($request->get('campuseslist'));
        if ($loan->save()) {
            $loan->campuses()->attach($campuses);
        }

        return redirect('loan')->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LoanInformation  $loanInformation
     * @return \Illuminate\Http\Response
     */
    public function show(LoanInformation $loanInformation) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LoanInformation  $loanInformation
     * @return \Illuminate\Http\Response
     */
    public function edit(LoanInformation $loanInformation) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LoanInformation  $loanInformation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LoanInformation $loanInformation) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LoanInformation  $loanInformation
     * @return \Illuminate\Http\Response
     */
    public function destroy(LoanInformation $loanInformation) {
        $loanInformation->delete();
        return redirect('loan')->with('success', 'Information has been  deleted');
    }

}
