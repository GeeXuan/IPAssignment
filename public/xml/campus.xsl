<?xml version="1.0" encoding="UTF-8"?>

<!--
    Document   : campus.xsl
    Created on : August 11, 2019, 10:11 PM
    Author     : hong1
    Description:
        Purpose of transformation follows.
-->

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>

    <xsl:template match="/">
        <html>
            <head>
                <title>Campus</title>
            </head>
            <body>
                <h1>Campus</h1>
                <hr/>
                <table border="1">
                    <tr>
                        <th>name</th>
                        <th>id</th>
                        <th>name</th>
                        <th>abbreviation</th>
                        <th>address</th>
                        <th>phone</th>
                        <th>create_at</th>
                        <th>updated_at</th>                        
                    </tr>
                    <xsl:for-each select="campus/Campus">
                        <xsl:sort select="name" order="ascending"/>
                        <tr>
                            <td>
                                <xsl:value-of select="name"/>
                            </td>
                            <td>
                                <xsl:value-of select="id"/>
                            </td>
                            <td>
                                <xsl:value-of select="name"/>
                            </td>
                            <td>
                                <xsl:value-of select="abbreviation"/>
                            </td>
                            <td>
                                <xsl:value-of select="address"/>
                            </td>
                            <td>
                                <xsl:value-of select="phone"/>
                            </td>
                            <td>
                                <xsl:value-of select="create_at"/>
                            </td>
                            <td>
                                <xsl:value-of select="updated_at"/>
                            </td>                            
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>








