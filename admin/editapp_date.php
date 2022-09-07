<!doctype html>
<html lang=en>
<head>
<title>Edit appointment date</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="css/appoint.css">
<link href='https://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>

<body>
<div id="container">

	
<div id="content"><!--Start of the edit page content-->

<h2 class="title">Edit Appointment Date</h2>


<button onclick="goBack()" style="background-color:#87BC78; ">Go Back</button>


<?php

	include '../includes/dbconnect.php';
?>

<?php
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

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
		$errors = array();


		// Look for the dental codes
        if (empty($_POST['app_date'])) {
		$errors[] = 'You forgot to enter the date';
		} else {
		$app_date = mysqli_real_escape_string($mysqli, trim($_POST['app_date']));
		}

		if (empty($errors)) 
		{ // If everything is OK, make the update query 
		// Check that the email is not already in the users table
		$query = "UPDATE appointment_date SET app_date='$app_date' WHERE id=$id LIMIT 1";
		$result = mysqli_query ($mysqli, $query);
		if (mysqli_affected_rows($mysqli) == 1) { // If it ran OK
		// Echo a message if the edit was satisfactory
		echo '<h3>The appointment date has been edited.</h3>';
		echo "<html><script> document.location.href='view_appointment.php';</script></html>";
		
		} else { // Echo a message if the query failed
		echo '<p class="error">Date could not be edited. </p>'; // Error message.
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


$query = "SELECT id,app_date FROM appointment_date WHERE id=$id";
$result = mysqli_query ($mysqli, $query);
if (mysqli_num_rows($result) == 1) 
{   // Valid user ID, display the form.
	// Get the user's information
	$row = mysqli_fetch_array ($result, MYSQLI_NUM);
	// Create the form
	echo '<form method="post">
	<p><label class="label" for="app_date">Enter New Appointment Date:</label>
	<input class="fl-left" type="text" id="datepicker" type="text" name="app_date" size="30" maxlength="30" 
	value="' . $row[1] . '"></p>
	

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



  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>