<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:dt="urn:schemas-microsoft-com:datatypes">
<xsl:template match="menu">
<div style="position: absolute;">
  <div onselectstart="return false" ondragstart="return false">
  <xsl:attribute name="STYLE">
 	filter: progid:DXImageTransform.Microsoft.Shadow(color=#DDDDDD,direction=135,strength=3); 
    position: absolute;
    background-color: #FFFFFF;
    border: solid #888888 1px;
    padding: 1px;
  </xsl:attribute>
  <table border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>
        <table border="0" cellspacing="0" cellpadding="0">
          <xsl:apply-templates select="entity"/>
        </table>
      </td>
    </tr>
  </table>
  </div>
  <xsl:apply-templates select="entity/contents"/>
</div>
</xsl:template>


<xsl:template match="entity">
<TR height="24px">
<xsl:attribute name="selected">false</xsl:attribute>
<xsl:attribute name="background">#FFFFFF</xsl:attribute>
<xsl:attribute name="light">#EEEEEE</xsl:attribute>
<xsl:attribute name="titlebar">#EEEEEE</xsl:attribute>
<xsl:attribute name="image">images/<xsl:value-of select="image"/></xsl:attribute>
<xsl:attribute name="imageOpen">images/<xsl:value-of select="imageOpen"/></xsl:attribute>
<xsl:attribute name="id"><xsl:value-of select="id"/></xsl:attribute>
<xsl:attribute name="ONCLICK">clean();<xsl:value-of select="onClick"/></xsl:attribute>
<xsl:attribute name="ONMOUSEOVER">
  contextHighlightRow(this);
  <xsl:if test="contents/node()[count(child::*)>0]">
    loadContextMenuSub(this)
  </xsl:if>
</xsl:attribute>
<xsl:attribute name="ONMOUSEOUT">contextHighlightRow(this)</xsl:attribute>
  <TD VALIGN="MIDDLE" ALIGN="CENTER" NOWRAP="true">
  <xsl:attribute name="ONCLICK"><xsl:value-of select="@onmousedown"/></xsl:attribute>
  <IMG BORDER="0">
    <xsl:attribute name="SRC"><xsl:value-of select="image"/></xsl:attribute>
  </IMG></TD>
  <TD NOWRAP="true">
  <xsl:attribute name="ONCLICK"><xsl:value-of select="@onmousedown"/></xsl:attribute>
  <xsl:attribute name="STYLE">
    padding-top: 2px;
    padding-bottom:2px;
    padding-left: 6px;
    padding-right: 8px;
    cursor: default;
    min-width: 90px;
    background-color: #FFFFFF;
  </xsl:attribute>
  <xsl:value-of select="description"/></TD>
  <TD VALIGN="middle" ALIGN="right" STYLE="padding-right: 6px;" NOWRAP="true">
  <xsl:attribute name="ONCLICK"><xsl:value-of select="@onmousedown"/></xsl:attribute>
  <xsl:attribute name="STYLE">
    padding-right: 5px;
  </xsl:attribute>
  <IMG BORDER="0" WIDTH="4">
  <xsl:attribute name="SRC">
    <xsl:choose>
      <xsl:when test="contents/node()[count(child::*)>0]">
        images/opensub.gif
      </xsl:when>
      <xsl:otherwise>
        images/spacer.gif
      </xsl:otherwise>
    </xsl:choose>
  </xsl:attribute>
  </IMG></TD>
</TR>
</xsl:template>

<xsl:template match="contents">
  <xsl:if test="count(child::*)>0">
  <div onselectstart="return false" ondragstart="return false">
  <xsl:attribute name="STYLE">
    position: absolute;
    background-color: #FFFFFF;
    border: solid #888888 1px;
    display: none;
    padding: 1px;
 	filter: progid:DXImageTransform.Microsoft.Shadow(color=#DDDDDD,direction=135,strength=3); 
  </xsl:attribute>
  <xsl:attribute name="ID"><xsl:value-of select="../id"/>Sub</xsl:attribute>
  <table border="0" cellspacing="0" cellpadding="1">
    <tr>
      <td>
        <table border="0" cellspacing="0" cellpadding="0">
          <xsl:apply-templates select="entity"/>
        </table>
      </td>
    </tr>
  </table>
  </div>
  <xsl:apply-templates select="entity/contents"/>
  </xsl:if>
</xsl:template>

</xsl:stylesheet>