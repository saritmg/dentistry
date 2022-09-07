<?php

	include '../includes/dbconnect.php';
?>

<!doctype html>
<html lang=en>
<head>
<title>View dental codes</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="css/appoint.css">
<link rel="stylesheet" type="text/css" href="adminregview.css">
<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
</head>

<body>
<div id="container">

<div id="content"><!-- Start of the content of the table of users page. -->
<h2 class="title">Appointment Dates Information</h2>
<button onclick="goBack()" style="background-color:#87BC78; ">Go Back</button>

<?php

// Make the query: 

$query = "SELECT id,app_date  FROM appointment_date";

$result = mysqli_query ($mysqli, $query); // Run the query.

if ($result) { // If it ran OK, display the records

					// Table header. 
				echo '<table class="table">
				<tr class="heading"><td class="col head"><b>Appointment Dates</b></td><td><b class="col head">Edit</b></td>
                <td class="last"><b>Delete</b></td></tr>';
				// Fetch and print all the records: 
				while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				echo '<tr class="heading2"><td class="col">' . $row['app_date'] . '</td>
				
				<td class="col"><a class="und" href="editapp_date.php?id=' . $row['id'] . '">Edit</a></td>
                <td class="last1"><a class="und" href="deleteapp_date.php?id=' . $row['id'] . '">Delete</a></td></tr>'; }
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