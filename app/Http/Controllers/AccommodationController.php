<?php

namespace App\Http\Controllers;

use App\Accommodation;
use App\Campus;
use Illuminate\Http\Request;

class AccommodationController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $accommodations = \App\Accommodation::all();
        return view('accommodationindex')->with("accommodations", $accommodations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $campuses = \App\Campus::all();
        return view('accommodationcreate')->with("campuses", $campuses);
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
                'address' => 'required',
                'roomType' => 'required',
            ]);
            $accommodation = new Accommodation();
            $accommodation->name = $request->get('name');
            $accommodation->description = $request->get('description');
            $accommodation->address = $request->get('address');
            $accommodation->roomType = $request->get('roomType');
            if (request()->has('utilities')) {
                $utilities = implode("/", $request->get('utilities'));
                $accommodation->utilities = $utilities;
            } else {
                $accommodation->utilities = null;
            }
            $accommodation->campusid = $request->get('campus');
            $accommodation->save();
            return redirect('accommodation')->with('success', 'Information has been added');
        } else {
            return redirect('accommodation');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Accommodation  $accommodation
     * @return \Illuminate\Http\Response
     */
    public function show(Accommodation $accommodation) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Accommodation  $accommodation
     * @return \Illuminate\Http\Response
     */
    public function edit(Accommodation $accommodation) {
        $utilities = explode("/", $accommodation->utilities);
        $campus = Campus::find($accommodation->campusId);
        return view('accommodationedit', compact('accommodation'))->with("utilities", $utilities)->with("campus", $campus);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Accommodation  $accommodation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Accommodation $accommodation) {
        if ($request->has('update')) {
            $request->validate([
                'name' => 'required|max:255',
                'description' => 'required',
                'address' => 'required',
                'roomType' => 'required',
            ]);
            $accommodation->name = $request->get('name');
            $accommodation->description = $request->get('description');
            $accommodation->address = $request->get('address');
            $accommodation->roomType = $request->get('roomType');
            if (request()->has('utilities')) {
                $utilities = implode("/", $request->get('utilities'));
                $accommodation->utilities = $utilities;
            } else {
                $accommodation->utilities = null;
            }
            $accommodation->campusid = $request->get('campusid');
            $accommodation->save();
            return redirect('accommodation')->with('success', 'Information has been updated');
        } else {
            return redirect('accommodation');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Accommodation  $accommodation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accommodation $accommodation) {
        $accommodation->delete();
        return redirect('accommodation')->with('success', 'Information has been deleted');
    }

}
