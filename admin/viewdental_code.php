<!doctype html>
<html lang=en>
<head>
<title>View dental codes</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="css/view_dentist.css">
<link href='https://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
</head>

<body>
	<!-- <img src="download.png" width="40" height="40" class="logo">
		<p class="logotext">Dental Clinic</p> -->
<div id="container">

<div id="content"><!-- Start of the content of the table of users page. -->
<h2 class="title">View &nbsp Dental &nbsp Codes</h2>
<button onclick="goBack()" style="background-color:#87BC78; ">Go Back</button>


<?php
// This script retrieves all the records from the users table.
require('../includes/dbconnect.php'); // Connect to the database.
// Make the query: 

$sql = "SELECT codes AS code, 
unit_cost AS cost,description AS descriptions, code_id As id FROM dental_codes 
";

$result = mysqli_query ($mysqli, $sql); // Run the query.

if ($result) { // If it ran OK, display the records

					// Table header. 
				echo '<table class="table">
				<tr class="heading"><td class="col head"><b>Codes</b></td><td class="col head"><b>Unit Cost</b></td><td class=" col head"><b>Descriptions</b></td><td class="col head"><b>Edit</b></td>
                <td class="last"><b>Delete</b></td>
				
				</tr>';
				// Fetch and print all the records: 
				while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				echo '<tr class="heading2"><td class="col">' . $row['code'] . '</td>
				<td class="col">' . $row['cost'] .'</td>
				<td class="col">'.  $row['descriptions'] . '</td>
				<td class="col"><a href="editdental_code.php?id=' . $row['id'] . '">Edit</a></td>
                <td class="last1"><a href="deletedental_code.php?id=' . $row['id'] . '">Delete</a></td></tr>'; }
				echo '</table>'; // Close the table so that it is ready for displaying.
				mysqli_free_result ($result); // Free up the resources.
			   } 

else { // If it did not run OK.
		// Error message:
		echo '<p class="error">The current users could not be retrieved. We apologize 
		for any inconvenience.</p>';
		// Debug message:
		echo '<p>' . mysqli_error($mysqli) . '<br><br>Query: ' . $sql . '</p>';
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
