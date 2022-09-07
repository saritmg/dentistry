<?php
	include '../includes/dbconnect.php';

?>

<!doctype html>
<html lang=en>
<head>
<title>Change The Status</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="css/adminlogin.css">
<link href='https://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

</head>

<body>
<div id="container">

<h2 class="title">Edit Appointment Status</h2>

	<button onclick="goBack()" style="background-color:#87BC78; ">Go Back</button>

	
<div id="content"><!--Start of the edit page content-->
<h2></h2>

<?php
		// After clicking the Edit link in the found_record.php page, the editing interface appears
		// The code looks for a valid user ID, either through GET or POST #1
		if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { // From view_users.php
		$id = $_GET['id'];
		} 
		elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // Form submission
		$id = $_POST['id'];
		} 
		else { // If no valid ID, stop the script
		echo '<p class="error">This page has been accessed in error</p>';
		exit();
		}


// Has the form been submitted?
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
		$errors = array();


		// Look for the dental codes
        if (empty($_POST['status'])) {
		$errors[] = 'You forgot to enter status';
		} else {
		$status = mysqli_real_escape_string($mysqli, trim($_POST['status']));
		}





		if (empty($errors)) 
		{ // If everything is OK, make the update query 
		// Check that the email is not already in the users table
		$query = "UPDATE appointment SET status='$status' WHERE app_id=$id LIMIT 1";
		$result = mysqli_query ($mysqli, $query);
		if (mysqli_affected_rows($mysqli) == 1) { // If it ran OK
		// Echo a message if the edit was satisfactory
		echo '<h3>The status has been updated.</h3>';
		echo "<html><script> document.location.href='confirm_appoint.php';</script></html>";
		
		} else { // Echo a message if the query failed
		echo '<p class="error">The user could not be edited due to a system error.'; // Error message.
		echo '<p>' . mysqli_error($mysqli) . '<br />Query: ' . $query . '</p>'; // Debugging message.
		} // End of if ($result)
		mysqli_close($mysqli); // Close the database connection.
		// Include the footer and quit the script:
		
		exit();
		} else   { // Display the errors.
		echo '<p class="error">The following error(s) occurred:<br />';
        
		foreach ($errors as $msg) { // Extract the errors from the array and echo them
		echo " - $msg<br>\n";
	    }
		echo '</p><p>Please try again.</p>';
		} // End of if (empty($errors))section
}        // End of the conditionals
         // Select the record 


$query = "SELECT app_date,status FROM appointment WHERE app_id=$id";
$result = mysqli_query ($mysqli, $query);
if (mysqli_num_rows($result) == 1) 
{   // Valid user ID, display the form.
	// Get the user's information
	$row = mysqli_fetch_array ($result, MYSQLI_NUM);
    // Display the name of the member being deleted
    echo "<h3>Are you sure you want to update the status of registraion date $row[0]?</h3>";


	// Create the form
	echo '<form method="post">
	<p><label class="label" for="status">Status:</label>
	<select name="status" id="name"  >

        <option>Confirmed</option>
        <option>Pending</option>
        <option>Cancelled</option>
    </select></p>   
	
	

	<p><input id="submit" type="submit" name="submit" value="Enter"></p>
	<br><input type="hidden" name="id" value="' . $id . '" /> 
	</form>';
} 
else { // The record could not be validated
	  echo '<p class="error">This page has been accessed in error</p>';
	 }
mysqli_close($mysqli);

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