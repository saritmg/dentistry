<?php 
//eg http://zilmat.com/int/support/development/webapp/webservices/REST/json/tours.php?packageid=3
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
$result = mysqli_query($mysqli, $query );

$arRows = array();
if( $result ){
// success! check results
while( $row = mysqli_fetch_assoc( $result ) ){
array_push($arRows, $query);
}
    header('Content-type: application/json');
echo json_encode($arRows);
}



?>