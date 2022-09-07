<!doctype html>
<html lang=en>
<head>
<title>Clinic Form Page</title>
<meta charset=utf-8><!--important prerequisite for escaping problem characters-->
<link rel="stylesheet" type="text/css" href="css/adminlogin.css">
</head>
<body>
<div id="container">

<div id="content"><!-- Registration handler content starts here -->

<?php
// The link to the database is moved to the top of the PHP code.
require ('../includes/dbconnect.php'); // Connect to the db.
// This query INSERTs a record in the users table.
// Has the form been submitted?

if(isset($_POST['submit'])) 
{
		$errors = array(); // Initialize an error array.
		// Check for a first name:
		if (empty($_POST['clinic_name'])) {
		$errors[] = 'You forgot to enter the clinic name.';
		} else {
		$clinic_name = mysqli_real_escape_string($mysqli, trim($_POST['clinic_name']));
		}

		

		// Check for age
		if (empty($_POST['location'])) {
		$errors[] = 'You forgot to enter the location.';
		} else {
		$location = mysqli_real_escape_string($mysqli, trim($_POST['location']));
		}

		// Check for sex
		if (empty($_POST['opening_hour'])) {
		$errors[] = 'You forgot to enter the opening hours';
		} else {
		$opening_hour= mysqli_real_escape_string($mysqli, trim($_POST['opening_hour']));
		}

		// Check for an address
		if (empty($_POST['closing_hour'])) {
		$errors[] = 'You forgot to enter the closing hours.';
		} else {
		$closing_hour = mysqli_real_escape_string($mysqli, trim($_POST['closing_hour']));
		}


		// Check for phone no.
		if (empty($_POST['no_of_rooms'])) {
		$errors[] = 'You forgot to enter total no. of rooms';
		} else {
		$no_of_rooms = mysqli_real_escape_string($mysqli, trim($_POST['no_of_rooms']));
		}

		
		if (empty($errors)) { // If it runs
		// Register the user in the database...
		// Make the query:
		$sql = "INSERT INTO clinic (clinic_name,location,opening_hour,closing_hour,no_of_rooms)
		VALUES ('$clinic_name','$location','$opening_hour','$closing_hour','$no_of_rooms')";
		$result = mysqli_query ($mysqli, $sql); // Run the query.
		if ($result) { // If it runs
		echo "<html><script> document.location.href='view_clinic.php';</script></html>";
		exit();
		} else { // If it did not run
		// Message:
		echo '<h2 class="error">System Error</h2>
		<p class="error">You could not be registered due to a system error. We apologize 
		for any inconvenience.</p>';
		// Debugging message:
		echo '<p>' . mysqli_error($mysqli) . '<br><br>Query: ' . $sql . '</p>';
		} // End of if ($result)
		mysqli_close($mysqli); // Close the database connection.
		// Include the footer and quit the script:
		
		exit();
		} else { // Report the errors.
			echo '<h2 class="error">Error!</h2>
		<p class="error">The following error(s) occurred:<br>';
		foreach ($errors as $msg) { // Extract the errors from the array and echo them
		echo " - $msg<br>\n";
		}
		echo '</p><h3 class="error">Please try again.</h3><p><br></p>';
		}// End of if (empty($errors))
} // End of the main Submit conditional.
?>

<h2 class="title">Insert Clinic Information</h2>

<form action="" method="post" class="form">

<p><label class="label" for="clinic_name">Clinic Name:</label> 
<input  type="text" name="clinic_name" size="30" maxlength="30" 
value=""></p>

<p><label class="label" for="location">Location:</label>
<input  type="text" name="location" size="30" maxlength="60" 
value="" > </p>

<p><label class="label" for="opening_hour">Opening Hours:</label>
<input  type="text" name="opening_hour" size="30" maxlength="60" 
value="" > </p>

<p><label class="label" for="closing_hour">Closing Hours:</label>
<input  type="text" name="closing_hour" size="30" maxlength="60" 
value="" > </p>

<p><label class="label" for="no_of_rooms">No. Of Rooms:</label>
<input id="email" type="number" name="no_of_rooms" size="30" maxlength="60" 
value="" > </p>

<p><input id="submit" type="submit" name="submit" value="Submit"></p>
</form>

</p>
</div>
</div>
</body>
</html>