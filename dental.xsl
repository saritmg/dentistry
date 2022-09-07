<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet  version="1.0"
  xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

  <xsl:template match="/">

  <body>
    <table border="1">
        <tr>
          <th>Code ID</th>
          <th>Codes</th>
          <th>Unit Cost</th>
          <th> Description</th>
        </tr>

         <xsl:for-each select="dental/dent_code">
         <tr>
           <td><xsl:value-of select="code_id"/></td>
           <td><xsl:value-of select="codes"/></td>
           <td><xsl:value-of select="unit_cost"/></td>
           <td><xsl:value-of select="description"/></td>
         </tr>
         </xsl:for-each>
    </table>
</body>
</xsl:template>
</xsl:stylesheet>