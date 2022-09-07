<!doctype html>
<html lang=en>
<head>
<title>Dental Codes</title>
<link rel="stylesheet" type="text/css" href="css/adminlogin.css">
<link href='https://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
</head>
<body>



<?php
// This script performs an INSERT query that adds a record to the users table.
if(isset($_POST['submit'])) { 

 $codes = trim($_POST['codes']);


 $unit_cost = trim($_POST['unit_cost']);


 $description = trim($_POST['description']);

 require ('../includes/dbconnect.php'); // Connect to the database. 

 // Make the query 
 
 $sql = "INSERT INTO dental_codes(code_id,codes,unit_cost, description) VALUES ('','$codes','$unit_cost','$description')"; 

 $result = mysqli_query($mysqli, $sql); // Run the query. 

 if ($result) { // If it ran OK.
 	echo"Dental code successfully added"; 
 	echo "<html><script> document.location.href='viewdental_code.php';</script></html>";

 exit(); 
//End of SUCCESSFUL SECTION
 }

 else {                             // If the form handler or database table contained errors 
                                   // Display any error message
	 echo '<h2 class="error">System Error</h2>
	 <p class="error">You could not be registered due to a system error. We apologize for any 
	 inconvenience.</p>';

      } // End of if clause ($result)

mysqli_close($mysqli); // Close the database connection.

exit();
 

} // End of the main Submit conditional.
?>


	<h2 class="title">Insert Dentist Information</h2>

	<button onclick="goBack()" style="background-color:#87BC78; ">Go Back</button>
<!--display the form on the screen-->
<form method="post" class="form">

<p><label class="label" for="codes">Code</label>
<input  type="text" name="codes" size="30" maxlength="30" 
value=""></p>

<p><label class="label" for="unit_cost">Unit Cost</label>
<input  type="text" name="unit_cost" size="30" maxlength="40" 
value=""></p>

<p><label class="label" for="description">Description</label>
<input  type="text" name="description" size="30" maxlength="60" 
value="" > </p>



<p><input id="submit" type="submit" name="submit" value="Add"></p>
</form><!-- End of the page content. -->
</p>




</body>
</html>

<script>
function goBack() {
    window.history.back();
}
</script>