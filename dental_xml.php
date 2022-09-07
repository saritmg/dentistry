                        
<?php 
// header ("Content-Type:text/xml");//Tell browser to expect xml
		include ("includes/dbconnect.php");

		$query = "SELECT code_id,codes,unit_cost,description FROM dental_codes"; 
		$result = mysqli_query($mysqli, $query) or die ("Error in query: $query. ".mysqli_error()); 

		//Top of xml file
		$_xml = '<?xml version="1.0"?>'; 
		$xsl='<?xsl:stylesheet type="text/xsl"  version="1.0" href="dental.xsl">';
		$_xml .="<dental>"; 
		while($row = mysqli_fetch_array($result)) { 
		$_xml .="<dent_code>"; 
		$_xml .="<code_id>".$row['code_id']."</code_id>"; 
		$_xml .="<codes>".$row['codes']."</codes>"; 
		$_xml .="<unit_cost>".$row['unit_cost']."</unit_cost>"; 
		$_xml .="<description>".$row['description']."</description>"; 
		$_xml .="</dent_code>"; 
		} 
		$_xml .="</dental>"; 
		//Parse and create an xml object using the string
		$xmlobj=new SimpleXMLElement($_xml);
		//And output
		// print $xmlobj->asXML();
		//or we could write to a file
		$xmlobj->asXML('dental.xml');
?>
