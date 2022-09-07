<?php
session_start();

?>
<!doctype html>
<html lang=en>
<head>
<title>Delete a record</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="css/delete.css">

</head>
<body>
<div id="container">

<div id="content"><!--Start of content for delete page-->
<h2 class="title">Delete Dentist Information</h2>

<button onclick="goBack()" style="background-color:#87BC78; ">Go Back</button>

<?php
	require ('../includes/dbconnect.php');

?>

<?php
// Check for a valid user ID, through GET or POST
if ((isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { //Details from view_users.php
$id = $_GET['id'];
} elseif ((isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // Form submission #1
$id = $_POST['id'];
} else { // If no valid ID, stop the script
echo '<p class="error">This page has been accessed in error.</p>';

exit();
}

// Has the form been submitted? #2
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
if ($_POST['sure'] == 'Yes') { // Delete the record
// Make the query
		$query = "DELETE FROM dentist WHERE id=$id LIMIT 1";
		$result = mysqli_query($mysqli ,$query);
				if (mysqli_affected_rows($mysqli ) == 1) { // If there was no problem
				// Display a message
						echo '<h3 >The record has been deleted.</h3>';
						echo "<html><script> document.location.href='view_dentist.php';</script></html>";
				} else { // If the query failed to run
						echo '<p class="error">The record could not be deleted.<br>Probably 
						because it does not exist or due to a system error.</p>'; // Display error message
				// echo '<p>' . mysqli_error($mysqli ) . '<br />Query: ' . $query . '</p>';
				// Debugging message
				}
				} else { // Confirmation that the record was not deleted
					echo '<h3>The user has NOT been deleted.</h3>';
				}
				} else { // Display the form
				// Retrieve the member's data #3
					$query = "SELECT name FROM dentist WHERE id=$id";
					$result =mysqli_query ($mysqli ,$query);
					if (mysqli_num_rows($result) == 1) { // Valid user ID, show the form
					// Get the member's data
					  $row = mysqli_fetch_array ($result, MYSQLI_NUM);
					// Display the name of the member being deleted
					  echo "<h2 class='del'>Are you sure you want to permanently delete $row[0]?</h2>";
					// Display the delete page
					  echo '<form action="" method="post"> 
					    <input id="submit-yes" type="submit" name="sure" value="Yes">
					    <input id="submit-no" type="submit" name="sure" value="No">
					    <input type="hidden" name="id" value="' . $id . '">
					      </form>';
					} else { // Not a valid member’s ID
					echo '<p class="error">This page has been accessed in error.</p>';
					echo '<p>&nbsp;</p>';
}
} // End of the main conditional section
mysqli_close($mysqli );

?>
</div>
</div>
</body>
</html>

<script>
function goBack() {
    window.history.back();
}
</script>
