<?php

namespace App\Http\Controllers;

use Response;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('courseindex', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('coursecreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'courseId' => 'required',
            'courseCode' => 'required',
            'courseTitle' => 'required',
            'creditHours' => 'required',
            'category' => 'required'
        ]);
        
        if ($validator->fails()) {
            $response = array('response' => $validator->messages(), 'success' => false);
            return $response;
        } else {
            $course = new Course();
            $course->courseId = $request->get('courseId');
            $course->courseCode = $request->get('courseCode');
            $course->courseTitle = $request->get('courseTitle');
            $course->creditHours = $request->get('creditHours');
            $course->category = $request->get('category');
            $course->save();
            return redirect('courses')->with('success', 'Information has been added');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($courseId)
    {
        $course = Course::find($courseId);
        return view('editcourse', compact('course', 'courseId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $courseId)
    {
        $validator = Validator::make($request->all(), [
            'courseId' => 'required',
            'courseCode' => 'required',
            'courseTitle' => 'required',
            'creditHours' => 'required',
            'category' => 'required'
        ]);
        
        if ($validator->fails()) {
            $response = array('response' => $validator->messages(), 'success' => false);
            return $response;
        } else {
            $course = Course::find($courseId);
            $course->courseId = $request->get('courseId');
            $course->courseCode = $request->get('courseCode');
            $course->courseTitle = $request->get('courseTitle');
            $course->creditHours = $request->get('creditHours');
            $course->category = $request->get('category');
            $course->save();
            return redirect('courses');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($courseId)
    {
        $course = Course::find($courseId);
        $course->delete();
        return redirect('courses')->with('success', 'Information has been deleted');
    }
    
    public function createXML(Request $request) {
        $rootNode = new \SimpleXMLElement("<?xml version='1.0' encoding='UTF-8' standalone='yes'?><courses></courses>");

        $courses = Course::all();
        foreach ($courses as $course) {
            $itemNode = $rootNode->addChild('course');
            $itemNode->addChild('courseCode', $course->courseCode);
            $itemNode->addChild('courseTitle', $course->courseTitle);
            $itemNode->addChild('creditHours', $course->creditHours);
            $itemNode->addChild('category', $course->category);
        }
        
        return response($rootNode->asXML())
        ->withHeaders([
            'Content-Type' => 'text/xml'
        ]);
    }
    
    public function createXSLT(Request $request) {
        $rootNode = new \SimpleXMLElement("<?xml version='1.0' encoding='UTF-8' standalone='yes'?><courses></courses>");

        $courses = Course::all();
        foreach ($courses as $course) {
            $itemNode = $rootNode->addChild('course');
            $itemNode->addChild('courseCode', $course->courseCode);
            $itemNode->addChild('courseTitle', $course->courseTitle);
            $itemNode->addChild('creditHours', $course->creditHours);
            $itemNode->addChild('category', $course->category);
        }
        
        return response($rootNode->asXML())
        ->withHeaders([
            'Content-Type' => 'text/xml'
        ]);
    }
}
