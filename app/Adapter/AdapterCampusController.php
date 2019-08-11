<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campus;
use App\Adapter\campusAdapter;


class AccomodationController extends Controller{
  public function index()
    {
        $campus = Campus::all();
        return view('show', compact('campus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createAccomodation');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $adAccomodation = new AccomodationAdapter(new Accomodation());
        $adAccomodation->addAccomodation($request);
        $adAccomodation->writeIntoXML();
        return redirect('accomodations')->with('success', 'Accomodation has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $accomodation = Accomodation::find($id);
        return view('editAccomodation', compact('accomodation', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $upAccomodation = new AccomodationAdapter(new Accomodation());
        $upAccomodation->updateAccomodation($request, $id);
        $upAccomodation->writeIntoXML();
        return redirect('accomodations')->with('success', 'Accomodation has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deAccomodation = new AccomodationAdapter(new Accomodation());
        $deAccomodation->deleteAccomodation($id);
        $deAccomodation->writeIntoXML();
        return redirect('accomodations')->with('success', 'Accomodation has been deleted');
    }