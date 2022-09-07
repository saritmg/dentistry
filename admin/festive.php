<?php
	include '../includes/dbconnect.php';


	if(isset($_POST['submit'])){
		{
		$errors = array(); // Initialize an error array.
		// Check for a first name:
		if (empty($_POST['festName'])) {
		$errors[] = 'You forgot to enter festName.';
		} else {
		$festName = mysqli_real_escape_string($mysqli, trim($_POST['festName']));
		}
		
		if (empty($errors)) { // If it runs
		// Register the user in the database...
		// Make the query:

		$query="INSERT INTO `festive_offer`(`festName`) VALUES ('$festName')";
	   $result=mysqli_query($mysqli,$query);

	    if($result==1){
	    	 echo"<script>alert('Festive offer successfully Added');</script>";      
            // header('Location:view_dentist.php');
		}
			// echo "<script>alert('Error while inserting');</script>";

	}
	mysqli_close($mysqli); 
}
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Festive Form</title>
	<link rel="stylesheet" type="text/css" href="css/adminlogin.css">
</head>
<body>
	<h2 class="title">Insert Dentist Information</h2>

	<button onclick="goBack()" style="background-color:#87BC78; ">Go Back</button>

<form method="post" class="form">

<p><label class="label" for="festName">festName:</label> 
<input  type="text" name="festName" size="30" maxlength="30" 
value=""></p>

<p><input id="submit" type="submit" name="submit" value="Submit"></p>
</form>

</body>
</html>


<script>
function goBack() {
    window.history.back();
}
</script>