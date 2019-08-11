<?php
//Saw Gee Xuan
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
        $loanInformations = LoanInformation::all();
        return view('loanindex', compact('loanInformations'));
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
        if ($request->has('submit')) {
            $request->validate([
                'name' => 'required|max:255',
                'description' => 'required',
                'campuseslist' => 'required',
            ]);
            $loan = new LoanInformation();
            $loan->name = $request->get("name");
            $loan->description = $request->get("description");
            $campuses = \App\Campus::find($request->get('campuseslist'));
            if ($loan->save()) {
                $loan->campuses()->attach($campuses);
            }
            return redirect('loan')->with('success', 'Information has been added');
        } else {
            return redirect('loan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LoanInformation  $loanInformation
     * @return \Illuminate\Http\Response
     */
    public function show(LoanInformation $loan) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LoanInformation  $loanInformation
     * @return \Illuminate\Http\Response
     */
    public function edit(LoanInformation $loan) {
        $campus = $loan->campuses()->get();
        $campusesid = array();
        $campuses = \App\Campus::all();
        foreach ($campus as $c) {
            array_push($campusesid, $c->id);
        }
        return view('loanedit', compact('loan'))->with('campusesid', $campusesid)->with('campuses', $campuses);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LoanInformation  $loanInformation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LoanInformation $loan) {
        if ($request->has('update')) {
            $request->validate([
                'name' => 'required|max:255',
                'description' => 'required',
                'campuseslist' => 'required',
            ]);
            $loan->name = $request->get("name");
            $loan->description = $request->get("description");
            $campuses = \App\Campus::find($request->get('campuseslist'));
            if ($loan->save()) {
                $loan->campuses()->sync($campuses);
            }
            return redirect('loan')->with('success', 'Information has been updated');
        } else {
            return redirect('loan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LoanInformation  $loanInformation
     * @return \Illuminate\Http\Response
     */
    public function destroy(LoanInformation $loan) {
        $loan->delete();
        return redirect('loan')->with('success', 'Information has been deleted');
    }

}
