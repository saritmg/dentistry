<!doctype html>
<html lang=en>
<head>
<title>View Clinic Info</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="css/view_dentist.css">
<link href='https://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
</head>

<body>
<div id="container">

<div id="content"><!-- Start of the content of the table of users page. -->
<h2 class="title">Clinic Information</h2>

<button onclick="goBack()" style="background-color:#87BC78; ">Go Back</button>
<?php
// This script retrieves all the records from the users table.
require('../includes/dbconnect.php'); // Connect to the database.
// Make the query: 

$sql = "SELECT clinic_name AS cname, location AS location,opening_hour AS openhr,closing_hour AS closehr,no_of_rooms AS rooms,clinic_id  FROM clinic";

$result = @mysqli_query ($mysqli, $sql); // Run the query.

if ($result) { // If it ran OK, display the records

					// Table header. 
				echo '<table class="table">
				<tr class="heading"><td class="col head"><b>Clinic Name</b></td><td class="col head"><b>Location</b></td><td class="col head"><b>Opening Hours</b></td><td class="col head"><b>Closing Hours</b></td>
				<td class="col head"><b>Total Rooms</b></td><td class="last"><b>Edit</b></td></tr>';
				// Fetch and print all the records: 
				while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				echo '<tr class="heading2"><td class="col">' . $row['cname'] . '</td><td class="col">'.  $row['location'] . '</td>
				<td class="col">'.  $row['openhr'] . '</td><td class="col">'.  $row['closehr'] . '</td>
				<td class="col">'.  $row['rooms'] . '</td>
				<td class="last1"><a href="edit_clinic.php?id=' . $row['clinic_id'] . '">Edit</a></td>
                </tr>'; }
				echo '</table>'; // Close the table so that it is ready for displaying.
				mysqli_free_result ($result); // Free up the resources.
			   } 

else { // If it did not run OK.
		// Error message:
		echo '<p class="error">The current users could not be retrieved. We apologize 
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
