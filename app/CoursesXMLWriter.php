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
 * @author Michelle
 */
class CoursesXMLWriter implements WriterInterface {

    public function write($data) {
        $xml = new \DOMDocument("1.0", "ISO-8859-1");
        $xslt = $xml->createProcessingInstruction('xml-stylesheet', 'type="text/xsl" href="coursesxslt.xsl"');
        $xml->appendChild($xslt);
        $root = $xml->createElement('Courses');
        $root = $xml->appendChild($root);
        foreach ($data as $row) {
            $node = $xml->createElement('Course');

            $courseCode = $xml->createElement('courseCode');
            $courseCode->nodeValue = $row->courseCode;
            $node->appendChild($courseCode);

            $courseTitle = $xml->createElement('courseTitle');
            $courseTitle->nodeValue = $row->courseTitle;
            $node->appendChild($courseTitle);

            $creditHours = $xml->createElement('creditHours');
            $creditHours->nodeValue = $row->creditHours;
            $node->appendChild($creditHours);
            
            $category = $xml->createElement('category');
            $category->nodeValue = $row->category;
            $node->appendChild($category);

            $root->appendChild($node);
        }

        $xml->save('../public/xml/courses.xml');
    }

}
