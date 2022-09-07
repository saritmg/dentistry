<?php 
//eg
//http://zilmat.com/int/support/development/webapp/webservices/REST/pox/tours.php?packageid=4

//get data
require_once('includes/dbconnect.php'); 

//build query
$query= 
  "SELECT
  offerId, 
  offers.festId, 
  festTitle, 
  name, description, discount
  FROM offers JOIN festive_offer ON offers.festId = festive_offer.festiveId";

if (isset($_GET['festId']))
  $festId = $_GET['festId'];
else if (isset($_POST['festId']))
  $festId = $_POST['festId'];

if (isset($festId))
  $query .= " WHERE offers.festId = " . $festId;

$query .= " ORDER BY name";

//execute query
$result = mysqli_query( $mysqli,$query);
// build root XML element
$offers = new SimpleXMLElement("<offers></offers>");

if( $result ){
// loop data and build data structure
while($row = mysqli_fetch_array($result)) {   
  $offerId = $row['offerId'];
  $festId = $row['festId'];
  $name = htmlentities($row['name'],ENT_QUOTES, 'UTF-8');
  $description = htmlentities($row['description'],ENT_QUOTES, 'UTF-8');
  $discount = $row['discount'];
  
  $offer = $offers->addChild('offer');
  $offer->addChild('offerId', $offerId);
  $offer->addChild('festId', $festId);
  $offer->addChild('name', $name);
  $offer->addChild('description', $description);
  $offer->addChild('discount', $discount);
}
  // mysqli_free_result($result); 
}
// mysqli_free_result($result); 

//format for pretty printing
$dom = new DOMDocument('1.0', 'UTF-8');
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;
$dom->loadXML($offers->asXML());
 
//Send to browser
header('Content-type: text/xml');
echo $dom->saveXML();
?>