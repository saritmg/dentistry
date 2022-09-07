<!doctype html>
<html lang=en>
<head>
<title>Register page</title>
	<link rel="stylesheet" type="text/css" href="css/adminlogin.css">
<meta charset=utf-8><!--important prerequisite for escaping problem characters-->
<link rel="stylesheet" type="text/css" href="dentist.css">
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
		if (empty($_POST['name'])) {
		$errors[] = 'You forgot to enter your name.';
		} else {
		$name = mysqli_real_escape_string($mysqli, trim($_POST['name']));
		}

				// Check for an address
		if (empty($_POST['address'])) {
		$errors[] = 'You forgot to enter your address.';
		} else {
		$address = mysqli_real_escape_string($mysqli, trim($_POST['address']));
		}

		// Check for gender
		if (empty($_POST['gender'])) {
		$errors[] = 'You forgot to enter your sex.';
		} else {
		$gender= mysqli_real_escape_string($mysqli, trim($_POST['gender']));
		}



		// Check for phone no.
		if (empty($_POST['designation'])) {
		$errors[] = 'You forgot to enter your designation';
		} else {
		$designation = mysqli_real_escape_string($mysqli, trim($_POST['designation']));
		}

		// Check for age
		if (empty($_POST['age'])) {
		$errors[] = 'You forgot to enter your age.';
		} else {
		$age = mysqli_real_escape_string($mysqli, trim($_POST['age']));
		}
		
		if (empty($errors)) { // If it runs
		// Register the user in the database...
		// Make the query:
		$query = "INSERT INTO employee (id, name, address, gender, designation, age)
		VALUES (' ', '$name', '$address', '$gender', '$designation', '$age')";
		$result = mysqli_query ($mysqli, $query); // Run the query.
		if ($result) { // If it runs
			echo "<html><script> document.location.href='viewemployee.php';</script></html>";
	
		exit();
		} else { // If it did not run
		// Message:
		echo '<h2 class="error">System Error</h2>
		<p class="error">You could not be registered due to a system error.</p>';
		// Debugging message:
		echo '<p>' . mysqli_error($mysqli) . '<br><br>Query: ' . $query . '</p>';
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

<h2 class="title">Insert Employee Information</h2>


	<button onclick="goBack()" style="background-color:#87BC78; ">Go Back</button>

<form method="post" class="form">

<p><label class="label" for="name">Name:</label> 
<input  type="text" name="name" size="30" maxlength="30" 
value=""></p>

<p><label class="label" for="address">Address:</label>
<input  type="text" name="address" size="30" maxlength="60" 
value="" > </p>

<p><label class="label" for="gender">Gender:</label>
<input  type="text" name="gender" size="30" maxlength="60" 
value="" </p>


<p><label class="label" for="designation">Designation:</label>
<input id="designation" type="text" name="designation" size="30" maxlength="60" 
value="" > </p>

<p><label class="label" for="age">Age:</label>
<input  type="number" name="age" size="30" maxlength="60" 
value="" > </p>
<!-- 
<p><label class="label" for="phone">Phone No:</label>
<input  type="tel" pattern="[789][0-9]{9}" name="phone" size="30" maxlength="60" 
value="" > </p> -->





<p><input id="submit" type="submit" name="submit" value="Register"></p>
</form>

</p>
</div>
</div>
</body>
</html>



<script>
function goBack() {
    window.history.back();
}
</script>