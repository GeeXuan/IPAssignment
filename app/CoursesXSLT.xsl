<?xml version="1.0" encoding="UTF-8"?>

<!--
    Document   : CoursesXSLT.xsl
    Created on : August 10, 2019, 4:53 AM
    Author     : Michelle Ooi
    Description:
        Purpose of transformation follows.
-->

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>

    <!-- TODO customize transformation rules 
         syntax recommendation http://www.w3.org/TR/xslt 
    -->
    <xsl:template match="/">
        <html>
            <head>
                <title>CoursesXSLT.xsl</title>
            </head>
            <body style="font-family:Arial;font-size:12pt;background-color:#EEEEEE">
                <xsl:for-each select="Courses/Course">
                    <div style="background-color:teal;color:white;padding:4px">
                        <span style="font-weight:bold">
                            <xsl:value-of select="courseCode"/> - </span>
                        <xsl:value-of select="courseTitle"/>
                    </div>
                    <div style="margin-left:20px;margin-bottom:1em;font-size:10pt">
                        <p>
                            <xsl:value-of select="category"/>
                            <span style="font-style:italic"> (<xsl:value-of select="creditHours"/> credit hours)</span>
                        </p>
                    </div>
                </xsl:for-each>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
