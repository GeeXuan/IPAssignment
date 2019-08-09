<?xml version="1.0" encoding="UTF-8"?>

<!--
    Document   : facultyxslt.xsl
    Created on : August 10, 2019, 1:30 AM
    Author     : Saw
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
                <title>Taruc Faculty</title>
            </head>
            <body>
                <h1>Taruc Faculty</h1>
                <hr/>
                <table border="1">
                    <tr>
                        <th>Faculty's Name</th>
                        <th>Faculty's About Us</th>
                        <th>Faculty's Abbreviation</th>
                        <th>Faculty's Cost per Credit Hour</th>
                    </tr>
                    <xsl:for-each select="xml/Faculty">
                        <xsl:sort select="name" order="ascending"/>
                        <tr>
                            <td>
                                <xsl:value-of select="name"/>
                            </td>
                            <td>
                                <xsl:value-of select="aboutUs"/>
                            </td>
                            <td>
                                <xsl:value-of select="abbreviation"/>
                            </td>
                            <td>
                                <xsl:value-of select="costPerCreditHour"/>
                            </td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
