<?xml version="1.0" encoding="UTF-8"?>

<!--
    Document   : program.xsl
    Created on : August 11, 2019, 5:30 AM
    Author     : hong1
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
                <title>program.xsl</title>
            </head>
            <body style="background-color:#e0dfdc">
                <h1 style="text-align:center">Programme</h1>
                <table class="table">
                    <thead class="black white-text">
                        <tr bgcolor="#84918a">

                            <th>Programme ID</th>
                            <th>Programme Name</th>
                            <th>Programme Description</th>
                            <th>Profession</th>
                            <th>Duration of Study</th>
                            <th>Programme Level</th>
                            <th>Facilities Fee</th>
                            <th>Faculty ID</th>
                        </tr>
                    </thead>
                    <xsl:for-each select="progs/prog">
                        <tr>
                            <td>
                                <xsl:value-of select="progId"/>
                            </td>
                            <td>
                                <xsl:value-of select="progName"/>
                            </td>
                            <td>
                                <xsl:value-of select="progDesc"/>
                            </td>
                            <td>
                                <xsl:value-of select="profession"/>
                            </td>
                            <td>
                                <xsl:value-of select="duration"/>
                            </td>
                            <td>
                                <xsl:value-of select="progLevel"/>
                            </td>
                            <td>
                                <xsl:value-of select="facilitiesFee"/>
                            </td>
                            
                            <td>
                                <xsl:value-of select="faculty"/></td>                            
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
