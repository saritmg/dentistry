<?php
// Including database connections
require_once 'includes/dbconnect.php';
// mysqli query to fetch all data from database
$outupt=array();
$query = "SELECT * from dentist ORDER BY id ASC";
$result = mysqli_query($mysqli, $query);
// $arr = array();
if(mysqli_num_rows($result)>0) {
while($row = mysqli_fetch_array($result)) {
$outupt[] = $row;
}
// Return json array containing data from the databasecon
// echo $json_info = json_encode($arr);
echo json_encode($outupt);
}
?>
