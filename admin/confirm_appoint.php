<?php
	include '../includes/dbconnect.php';
?>

<!doctype html>
<html lang=en>
<head>
<title>Confirm Appointment</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="css/confirmapp.css">
<link href='https://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
</head>

<body>
<div id="container">

<div id="content"><!-- Start of the content of the table of users page. -->
<h2 class="title">Confirm Appointment</h2>

<button onclick="goBack()" style="background-color:#87BC78; ">Go Back</button>


<?php
// This script retrieves all the records from the users table.

// Make the query: 

$query = "SELECT *  FROM appointment";

$result = mysqli_query ($mysqli, $query); // Run the query.

if ($result) { // If it ran OK, display the records

					// Table header. 
				echo '<table class="table">
				<tr class="heading">
				<td class="col head"><b>Dental Codes</b>
				</td><td class="col head"><b>Dentist Id</b></td>
				<td class="col head"><b>Registration Date</b></td>
				<td class="col head"><b>Time</b></td>
				<td class="last"><b>Status</b></td></tr>';
				// Fetch and print all the records: 
				while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				echo '<tr class="heading2">
				<td class="col">' . $row['dental_code'] . '</td>
				<td class="col">'.  $row['dentist_id'] . '</td>
				<td class="col">'.  $row['app_date'] . '</td>
				<td class="col">'.  $row['app_time'] . '</td>
				
				
				<td class="last1"><a class="und" href="edit_status.php?id=' . $row['app_id'] . '">Edit Status</a></td>
                </tr>'; }
				echo '</table>'; // Close the table so that it is ready for displaying.
				mysqli_free_result ($result); // Free up the resources.
			   } 

else { // If it did not run OK.
		// Error message:
		echo '<p class="error">The current users could not be retrieved. We apologize 
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