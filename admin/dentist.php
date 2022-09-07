<?php
	include '../includes/dbconnect.php';


	if(isset($_POST['submit'])){
		{
		$errors = array(); // Initialize an error array.
		// Check for a first name:
		if (empty($_POST['name'])) {
		$errors[] = 'You forgot to enter your name.';
		} else {
		$name = mysqli_real_escape_string($mysqli, trim($_POST['name']));
		}

		

		// Check for age
		if (empty($_POST['age'])) {
		$errors[] = 'You forgot to enter your age.';
		} else {
		$age = mysqli_real_escape_string($mysqli, trim($_POST['age']));
		}

		// Check for sex
		if (empty($_POST['gender'])) {
		$errors[] = 'You forgot to enter your gender.';
		} else {
		$gender= mysqli_real_escape_string($mysqli, trim($_POST['gender']));
		}

		// Check for an address
		if (empty($_POST['address'])) {
		$errors[] = 'You forgot to enter your address.';
		} else {
		$address = mysqli_real_escape_string($mysqli, trim($_POST['address']));
		}


		// Check for phone no.
		if (empty($_POST['phone'])) {
		$errors[] = 'You forgot to enter your phone no.';
		} else {
		$phone = mysqli_real_escape_string($mysqli, trim($_POST['phone']));
		}

		

		// Check for an email address
		if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter your email address.';
		} else {
		$email= mysqli_real_escape_string($mysqli, trim($_POST['email']));
		}



		// Check for dentist type
		if (empty($_POST['dtype'])) {
		$errors[] = 'You forgot to select your dentist type';
		} else {
		$dtype= mysqli_real_escape_string($mysqli, trim($_POST['dtype']));
		}


		

		
		if (empty($errors)) { // If it runs
		// Register the user in the database...
		// Make the query:

		$query="INSERT INTO `dentist`(`id`, `name`, `gender`, `age`, `phone`, `address`, `email`, `dtype`) VALUES ('','$name','$gender',
									'$age','$phone','$address','$email','$dtype')";
	   $result=mysqli_query($mysqli,$query);

	    if($result==1){
	    	 echo"<script>alert('Dentist successfully Added');</script>"; 
	    	 echo "<html><script> document.location.href='view_dentist.php';</script></html>";     
            // header('Location:view_dentist.php');s
		}
			echo "<script>alert('Error while inserting');</script>";

	}
	mysqli_close($mysqli); 
}
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Dentist Form</title>
	<link rel="stylesheet" type="text/css" href="css/adminlogin.css">
</head>
<body>
	<h2 class="title">Insert Dentist Information</h2>

	<button onclick="goBack()" style="background-color:#87BC78; ">Go Back</button>

<form action="dentist.php" method="post" class="form">

<p><label class="label" for="name">Name:</label> 
<input  type="text" name="name" size="30" maxlength="30" 
value=""></p>

<p><label class="label" for="gender">Gender:</label>
<input  type="text" name="gender" size="30" maxlength="60" 
value="" </p>

<p><label class="label" for="age">Age:</label>
<input  type="number" name="age" size="30" maxlength="60" 
value="" > </p>

<p><label class="label" for="phone">Phone No:</label>
<input  type="tel" pattern="[789][0-9]{9}" name="phone" size="30" maxlength="60" 
value="" > </p>

<p><label class="label" for="address">Address:</label>
<input  type="text" name="address" size="30" maxlength="60" 
value="" > </p>

<p><label class="label" for="email">Email:</label>
<input id="email" type="text" name="email" size="30" maxlength="60" 
value="" > </p>


<p><label class="label" for="dtype">Dentist Type:</label><select name="dtype" value="">
	<option>--- Select one ---</option>
  <option>Permanent</option>
  <option>Trainee</option>
  <option>Visiting</option>
  
</select></p>

<p><input id="submit" type="submit" name="submit" value="Register"></p>
</form>

</body>
</html>


<script>
function goBack() {
    window.history.back();
}
</script>