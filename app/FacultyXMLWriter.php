<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

/**
 * Description of XMLWriter
 *
 * @author Saw
 */
class FacultyXMLWriter implements WriterInterface {

    public function write($data) {
        $xml = new \DOMDocument("1.0", "ISO-8859-1");
        $xslt = $xml->createProcessingInstruction('xml-stylesheet', 'type="text/xsl" href="facultyxslt.xsl"');
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

        $xml->save('../public/xml/faculty.xml');
    }

}
