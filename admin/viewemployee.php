<!doctype html>
<html lang=en>
<head>
<title>View Employee Details</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="css/view_dentist.css">
<link href='https://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
</head>

<body>
	<!-- <img src="download.png" width="40" height="40" class="logo">
		<p class="logotext">Dental Clinic</p> -->
<div id="container">

<div id="content"><!-- Start of the content of the table of users page. -->
<h2 class="title">View &nbsp Employee &nbsp Details</h2>
<button onclick="goBack()" style="background-color:#87BC78; ">Go Back</button>


<?php
// This script retrieves all the records from the users table.
require('../includes/dbconnect.php'); // Connect to the database.
// Make the query: 

$query = "SELECT name AS name, 
address AS address,gender AS gender,designation as designation,age as age,id As id FROM employee 
";

$result = mysqli_query ($mysqli, $query); // Run the query.

if ($result) { // If it ran OK, display the records

					// Table header. 
				echo '<table class="table">
				<tr class="heading"><td class="col head"><b>Name</b></td><td class="col head"><b>Address</b></td><td class=" col head"><b>Gender</b></td><td class=" col head"><b>Designation</b></td><td class=" col head"><b>Age</b></td>
				
				</tr>';
				// Fetch and print all the records: 
				while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				echo '<tr class="heading2"><td class="col">' . $row['name'] . '</td>
				<td class="col">' . $row['address'] .'</td>
				<td class="col">'.  $row['gender'] . '</td>
				<td class="col">'.  $row['designation'] . '</td>
				<td class="col">'.  $row['age'] . '</td>
				</tr>'; }
				echo '</table>'; // Close the table so that it is ready for displaying.
				mysqli_free_result ($result); // Free up the resources.
			   } 

else { // If it did not run OK.
		// Error message:
		echo '<p class="error">The current users could not be retrieved. We apologize 
		for any inconvenience.</p>';
		// Debug message:
		echo '<p>' . mysqli_error($mysqli) . '<br><br>Query: ' . $query . '</p>';
     } // End of if ($result)

mysqli_close($mysqli); // Close the database connection.
?>

</div><!-- End of the user’s table page content -->

</div>
</body>
</html>


<script>
function goBack() {
    window.history.back();
}
</script>
