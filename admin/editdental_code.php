<!doctype html>
<html lang=en>
<head>
<title>Edit a record</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="css/adminlogin.css">

</head>

<body>
<div id="container">

	
<div id="content"><!--Start of the edit page content-->
<h2></h2>

<h2 class="title">Edit Dentist Code</h2>

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
        if (empty($_POST['codes'])) {
		$errors[] = 'You forgot to enter your code';
		} else {
		$codes = mysqli_real_escape_string($mysqli, trim($_POST['codes']));
		}

		// Look for the descriptions
		if (empty($_POST['unit_cost'])) {
		$errors[] = 'You forgot to enter cost.';
		} else {
		$unit_cost = mysqli_real_escape_string($mysqli, trim($_POST['unit_cost']));
		}

			// Check for sex
		if (empty($_POST['description'])) {
		$errors[] = 'You forgot to enter description.';
		} else {
		$description= mysqli_real_escape_string($mysqli, trim($_POST['description']));
		}

		if (empty($errors)) 
		{ // If everything is OK, make the update query 
		// Check that the email is not already in the users table
		$query = "UPDATE dental_codes SET codes='$codes', unit_cost='$unit_cost' , description='$description' WHERE code_id=$id LIMIT 1";
		$result = mysqli_query($mysqli,$query);
		if (mysqli_affected_rows($mysqli) == 1) { // If it ran OK
		// Echo a message if the edit was satisfactory
		echo '<h3>The user has been succesfully edited.</h3>';
		echo "<html><script> document.location.href='viewdental_code.php';</script></html>";
		// header('location:viewdental_code.php');
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


$query = "SELECT code_id,codes,unit_cost,description FROM dental_codes WHERE code_id=$id";
$result = mysqli_query($mysqli,$query);
if (mysqli_num_rows($result) == 1) 
{   // Valid user ID, display the form.
	// Get the user's information
	$row = mysqli_fetch_array ($result, MYSQLI_NUM);
	// Create the form
	echo '<form action="" method="post">
	<p><label class="label" for="codes">Code:</label>
	<input class="fl-left" id="codes" type="text" name="codes" size="30" maxlength="30" 
	value="' . $row[1] . '"></p>
	
	<p><label class="label" for="unit_cost">Unit Cost:</label>
	<input class="fl-left" type="text" name="unit_cost" size="30" maxlength="50" 
	value="' . $row[2] . '"></p>
	<p><label class="label" for="description">Description:</label>
	<input class="fl-left" type="text" name="description" size="30" maxlength="50" 
	value="' . $row[3] . '"></p>

	<p><input id="submit" type="submit" name="submit" value="Edit"></p>
	<input type="hidden" name="id" value="' . $id . '" /> 
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