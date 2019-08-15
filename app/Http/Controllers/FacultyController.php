<?php
//Saw Gee Xuan
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
    }

    public function previewXML() {
        $data = Faculty::all();
        $xml = new \DOMDocument("1.0", "ISO-8859-1");
        $root = $xml->createElement('Faculties');
        $root = $xml->appendChild($root);
        foreach ($data as $row) {
            $node = $xml->createElement('Faculty');

            $name = $xml->createElement('name');
            $name->nodeValue = $row->name;
            $node->appendChild($name);

            $aboutUs = $xml->createElement('aboutUs');
            $aboutUs->nodeValue = $row->aboutUs;
            $node->appendChild($aboutUs);

            $abbreviation = $xml->createElement('abbreviation');
            $abbreviation->nodeValue = $row->abbreviation;
            $node->appendChild($abbreviation);

            if ($row->whystudyhere != null && $row->whystudyhere . equalTo("")) {
                $whystudyhere = $xml->createElement('whystudyhere');
                $whystudyhere->nodeValue = $row->whystudyhere;
                $node->appendChild($whystudyhere);
            }

            $costPerCreditHour = $xml->createElement('costPerCreditHour');
            $costPerCreditHour->nodeValue = $row->costPerCreditHour;
            $node->appendChild($costPerCreditHour);

            if ($row->partner()->get() != null) {
                foreach ($row->partner()->get() as $p) {
                    $partner = $xml->createElement('partner');
                    $type = $xml->createElement('type');
                    $type->nodeValue = $p->type;
                    $partner->appendChild($type);

                    $name = $xml->createElement('name');
                    $name->nodeValue = $p->name;
                    $partner->appendChild($name);

                    $description = $xml->createElement('description');
                    $description->nodeValue = $p->description;
                    $partner->appendChild($description);

                    $node->appendChild($partner);
                }
            }
            if ($row->accreditation()->get() != null) {
                foreach ($row->accreditation()->get() as $a) {
                    $accreditation = $xml->createElement('accreditation');

                    $name = $xml->createElement('name');
                    $name->nodeValue = $a->name;
                    $accreditation->appendChild($name);

                    $description = $xml->createElement('description');
                    $description->nodeValue = $a->description;
                    $accreditation->appendChild($description);

                    $node->appendChild($accreditation);
                }
            }
            $root->appendChild($node);
        }
        return response($xml->saveXML())->withHeaders(['Content-Type' => 'application/xml']);
    }

    public function previewXSLT() {
        $data = Faculty::all();
        $xml = new \DOMDocument("1.0", "ISO-8859-1");
        $xslt = $xml->createProcessingInstruction('xml-stylesheet', 'type="text/xsl" href="/xml/facultyxslt.xsl"');
        $xml->appendChild($xslt);
        $root = $xml->createElement('Faculties');
        $root = $xml->appendChild($root);
        foreach ($data as $row) {
            $node = $xml->createElement('Faculty');

            $name = $xml->createElement('name');
            $name->nodeValue = $row->name;
            $node->appendChild($name);

            $aboutUs = $xml->createElement('aboutUs');
            $aboutUs->nodeValue = $row->aboutUs;
            $node->appendChild($aboutUs);

            $abbreviation = $xml->createElement('abbreviation');
            $abbreviation->nodeValue = $row->abbreviation;
            $node->appendChild($abbreviation);

            if ($row->whystudyhere != null && $row->whystudyhere . equalTo("")) {
                $whystudyhere = $xml->createElement('whystudyhere');
                $whystudyhere->nodeValue = $row->whystudyhere;
                $node->appendChild($whystudyhere);
            }

            $costPerCreditHour = $xml->createElement('costPerCreditHour');
            $costPerCreditHour->nodeValue = $row->costPerCreditHour;
            $node->appendChild($costPerCreditHour);

            if ($row->partner()->get() != null) {
                foreach ($row->partner()->get() as $p) {
                    $partner = $xml->createElement('partner');
                    $type = $xml->createElement('type');
                    $type->nodeValue = $p->type;
                    $partner->appendChild($type);

                    $name = $xml->createElement('name');
                    $name->nodeValue = $p->name;
                    $partner->appendChild($name);

                    $description = $xml->createElement('description');
                    $description->nodeValue = $p->description;
                    $partner->appendChild($description);

                    $node->appendChild($partner);
                }
            }
            if ($row->accreditation()->get() != null) {
                foreach ($row->accreditation()->get() as $a) {
                    $accreditation = $xml->createElement('accreditation');

                    $name = $xml->createElement('name');
                    $name->nodeValue = $a->name;
                    $accreditation->appendChild($name);

                    $description = $xml->createElement('description');
                    $description->nodeValue = $a->description;
                    $accreditation->appendChild($description);

                    $node->appendChild($accreditation);
                }
            }
            $root->appendChild($node);
        }
        return response($xml->saveXML())->withHeaders(['Content-Type' => 'application/xml']);
    }

}
