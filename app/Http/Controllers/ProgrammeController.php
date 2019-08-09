<?php

namespace App\Http\Controllers;

use App\Programme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProgrammeController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $programmes = Programme::all();
        return view('programmeindex', compact('programmes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $courses = \App\Course::all();
        $campus = \App\Campus::all();
        $faculty = \App\Faculty::all();
        return view('progcreate')->with('courses', $courses)->with('campus', $campus)->with('faculty', $faculty);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $programme = new Programme();
        $programme->progId = $request->session()->get('progId');
        $programme->progName = $request->session()->get('progName');
        $programme->progDesc = $request->session()->get('progDesc');
        $programme->profession = $request->session()->get('profession');
        $programme->facilitiesFee = $request->session()->get('facilitiesFee');
        $programme->progLevel = $request->session()->get('progLevel');
        $programme->facultyid = $request->session()->get('faculty');
        $programme->durationStudy = $request->session()->get('duration');
        $courses = \App\Course::find($request->session()->get('courselist'));
        $programme->courses()->attach($courses);
        $campus = \App\Campus::find($request->session()->get('camplist'));
        $programme->campuses()->attach($campus);
        
        $total = 0;
        $selectedCourses = $request->session()->get('courselist');
        
        $programme->save();

        $mer = new \App\MER();
        $mer->merId = $request->get('merId');
        $mer->progId = $request->session()->get('progId');
        $mer->save();

        if ($programme->progLevel == "Diploma") {
            foreach ($request->get('spm') as $spmsubjectname) {
                $spm = new \App\spmMER();
                $spm->spmSubjectName = $spmsubjectname;
                $spm->merId = $request->get('merId');
                $spm->save();
            }

            foreach ($request->get('olevel') as $olevelsubjectname) {
                $olevel = new \App\olevelMER();
                $olevel->olevelSubjectName = $olevelsubjectname;
                $olevel->merId = $request->get('merId');
                $olevel->save();
            }
        } else {
            $cgpa = new \App\cgpaMER();
            $cgpa->cgpa = $request->get('cgpaRequired');
            $cgpa->merId = $request->get('merId');
            $cgpa->save();

            foreach ($request->get('stpm') as $stpmsubjectname) {
                $stpm = new \App\stpmMER();
                $stpm->stpmSubjectName = $stpmsubjectname;
                $stpm->merId = $request->get('merId');
                $stpm->save();
            }
        }

        return redirect('programmes')->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request) {
        $request->session()->put('progId', $request->input('progId'));
        $request->session()->put('progName', $request->input('progName'));
        $request->session()->put('progDesc', $request->input('progDesc'));
        $request->session()->put('profession', $request->input('profession'));
        $request->session()->put('facilitiesFee', $request->input('facilitiesFee'));
        $request->session()->put('progLevel', $request->input('progLevel'));
        $request->session()->put('faculty', $request->input('faculty'));
        $request->session()->put('duration', $request->input('duration'));
        $request->session()->put('camplist', $request->input('camplist'));
        return view('progstruccreate')->with('progId', $request->session()->get('progId'))->with('progName', $request->session()->get('progName'))
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
    public function edit($progId) {
        $programme = Programme::find($progId);
        $campus = \App\Campus::all();
        $faculty = \App\Faculty::all();
        return view('editprogramme', compact('programme', 'progId'))->with('campus', $campus)->with('faculty', $faculty);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $progId) {
        $validator = Validator::make($request->all(), [
                    'progId' => 'required',
                    'progName' => 'required',
                    'progDesc' => 'required',
                    'profession' => 'required',
                    'facilitiesFee' => 'required',
                    'duration' => 'required',
                    'camplist' => 'required',
        ]);

        if ($validator->fails()) {
            $response = array('response' => $validator->messages(), 'success' => false);
            return $response;
        } else {
            $programme = Programme::find($progId);
            $programme->progId = $request->get('progId');
            $programme->progName = $request->get('progName');
            $programme->progDesc = $request->get('progDesc');
            $programme->profession = $request->get('profession');
            $programme->facilitiesFee = $request->get('facilitiesFee');
            $programme->progLevel = $request->get('progLevel');
            $programme->facultyid = $request->get('faculty');
            $programme->durationStudy = $request->get('duration');
            $programme->save();

            $campus = \App\Campus::find($request->get('camplist'));
            $programme->campuses()->attach($campus);
            return redirect('programmes');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function destroy($progId) {
        $programme = Programme::find($progId);
        $programme->delete();
        return redirect('programmes')->with('success', 'Information has been deleted');
    }

    public function listProgramme() {
        $programme = Programme::all();
        return view('listprogramme', compact('programme'));
    }
    public function listprogdetail(){
        $programme = Programme::find(Input::get('programmeid'));
        return view('listprogdetails',compact('programme'));
        
    }
    
    public function createXML(Request $request) {
        $rootNode = new \SimpleXMLElement("<?xml version='1.0' encoding='UTF-8' standalone='yes'?><programmes></programmes>");

        $programmes = Programme::all();
        foreach ($programmes as $programme) {
            $itemNode = $rootNode->addChild('programme');
            $itemNode->addChild('progId', $programme->progId);
            $itemNode->addChild('progName', $programme->progName);
            $itemNode->addChild('progDesc', $programme->progDesc);
            $itemNode->addChild('profession', $programme->profession);
            $itemNode->addChild('facilitiesFee', $programme->facilitiesFee);
            $itemNode->addChild('progLevel', $programme->progLevel);
            $itemNode->addChild('duration', $programme->durationStudy);
        }
        
        return response($rootNode->asXML())
        ->withHeaders([
            'Content-Type' => 'text/xml'
        ]);

    }
}
