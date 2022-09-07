<!doctype html>
<html lang=en>
<head>
<title>Edit Clinic Info</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="css/adminlogin.css">

</head>

<body>
<div id="container">

	
<div id="content"><!--Start of the edit page content-->
<h2 class="title">Edit Clinic Information</h2>

<button onclick="goBack()" style="background-color:#87BC78; ">Go Back</button>

<?php

	   require ('../includes/dbconnect.php');
		// After clicking the Edit link in the found_record.php page, the editing interface appears
		// The code looks for a valid user ID, either through GET or POST #1
		if ((isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { // From view_users.php
		$id = $_GET['id'];
		} 
		elseif ((isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // Form submission
		$id = $_POST['id'];
		} 
		else { // If no valid ID, stop the script
		echo '<p class="error">This page has been accessed in error</p>';
		exit();
		}



// Has the form been submitted?
if(isset($_POST['submit'])) 
{
		$errors = array();


		// Look for the dental codes
        if (empty($_POST['clinic_name'])) {
		$errors[] = 'You forgot to enter clinic name';
		} else {
		$clinic_name = mysqli_real_escape_string($mysqli, trim($_POST['clinic_name']));
		}


		// Look for the descriptions
		if (empty($_POST['location'])) {
		$errors[] = 'You forgot to enter the location.';
		} else {
		$location = mysqli_real_escape_string($mysqli, trim($_POST['location']));
		}


		// Look for the descriptions
		if (empty($_POST['opening_hour'])) {
		$errors[] = 'You forgot to enter the opening hours.';
		} else {
		$opening_hour = mysqli_real_escape_string($mysqli, trim($_POST['opening_hour']));
		}


       // Look for the descriptions
		if (empty($_POST['closing_hour'])) {
		$errors[] = 'You forgot to enter the closing hours.';
		} else {
		$closing_hour = mysqli_real_escape_string($mysqli, trim($_POST['closing_hour']));
		}


        // Look for the descriptions
		if (empty($_POST['no_of_rooms'])) {
		$errors[] = 'You forgot to enter the total no. of rooms.';
		} else {
		$no_of_rooms = mysqli_real_escape_string($mysqli, trim($_POST['no_of_rooms']));
		}


		if (empty($errors)) 
		{ // If everything is OK, make the update query 
		// Check that the email is not already in the users table
		$query = "UPDATE clinic SET clinic_name='$clinic_name', location='$location',opening_hour='$opening_hour',closing_hour='$closing_hour',no_of_rooms='$no_of_rooms' WHERE clinic_id=$id LIMIT 1";
		$result = mysqli_query ($mysqli, $query);

		if (mysqli_affected_rows($mysqli) == 1) { // If it ran OK
			// Echo a message if the edit was satisfactory
			echo '<h3>The user has been edited.</h3>';
			echo "<html><script> document.location.href='view_clinic.php';</script></html>";
			// header('location:view_clinic.php');
		} else { // Echo a message if the query failed
			echo '<p class="error">The user could not be edited due to a system error. 
			We apologize for any inconvenience.</p>'; // Error message.
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


$query = "SELECT clinic_id,clinic_name,location,opening_hour,closing_hour,no_of_rooms FROM clinic WHERE clinic_id=$id";
$result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));

if(mysqli_num_rows($result) == 1) 
{   // Valid user ID, display the form.
	// Get the user's information
	$row = mysqli_fetch_array ($result, MYSQLI_NUM);
	// Create the form
	echo '<form action="" method="post">
	<p><label class="label" for="clinic_name">Clinic Name:</label>
	<input class="fl-left" id="clinic_name" type="text" name="clinic_name" size="30" maxlength="30" 
	value="' . $row[1] . '"></p>
	
	<p><label class="label" for="location">Location:</label>
	<input class="fl-left" type="text" name="location" size="30" maxlength="50" 
	value="' . $row[2] . '"></p>
	<p><label class="label" for="opening_hour">Opening Hours:</label>
	<input class="fl-left" type="text" name="opening_hour" size="30" maxlength="50" 
	value="' . $row[3] . '"></p>
	<p><label class="label" for="closing_hour">Closing Hours:</label>
	<input class="fl-left" type="text" name="closing_hour" size="30" maxlength="50" 
	value="' . $row[4] . '"></p>
	<p><label class="label" for="no_of_rooms">Total Rooms:</label>
	<input class="fl-left" type="text" name="no_of_rooms" size="30" maxlength="50" 
	value="' . $row[5] . '"></p>
	

	<p><input id="submit" type="submit" name="submit" value="Edit"></p>
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
