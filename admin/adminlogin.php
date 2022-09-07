<?php


	include '../includes/dbconnect.php';

	if(isset($_POST['admin_login'])){
		$username=$_POST['username'];
		$password=$_POST['password'];

		$query="SELECT * FROM admin where (username='$username' and password='$password')";


		$result=mysqli_query($mysqli,$query);

		if(mysqli_num_rows($result) == 1){
			 echo"<script>alert('Login successful');</script>"; 
			 echo "<html><script> document.location.href='admindash.php';</script></html>";     
		}
			echo "<script>alert('Invalid User Name Or Password');</script>";
			echo "<html><script> document.location.href='adminlogin.php';</script></html>"; 

	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="css/adminlogin.css">
</head>
<h2 class="title">Admin Login</h2> 
<span class="su">Please Login to continue:</span></p>
<body>
	<form method="post" class="form">
		<p><label class="label" for="username">Username:</label>
		<input type="username" name="username" placeholder="Please enter username"></p>

		<p><label class="label" for="password">Password</label>
		<input type="password" name="password" placeholder="Please enter password"></p>

		<p><input id="submit" type="submit" name="admin_login" value="Login"></p>
	</form>

</body>
</html>