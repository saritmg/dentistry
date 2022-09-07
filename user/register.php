
<!DOCTYPE html>
<html>
<head>
	<title>Register Form</title>
	<link rel="stylesheet" href="css/style.css">
	 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"> </script>
	 	<script src="js/register.js"></script>
</head>
<body>
	<div style="width: 200px; margin: auto;"></div>
	<h2 class="title">Registration Form</h2>
	<p>
		<div id="register_output"></div>
	</p>
	<form method="post" action="register_form.php">
		<p><label class="floatLabel" for="name">Name: </label>
		<input id="name" type="text" name="name" value=""></p>

		<p><label class="floatLabel" for="phone">Phone:</label>
		<input id="phone" type="text" name="phone" value=""></p>

		<p><label class="floatLabel"  for="age">Age: </label>
		<input id="age" type="text" name="age" value=""></p>
		
		<p><label class="floatLabel" for="address">Address: </label>
		<input id="address" type="text" name="address" type="address" value=""></p>

		<p><label class="floatLabel"  for="Email">Email Address: </label>
		<input id="email" type="text" name="email" type="email" value=""></p>

		<p><label class="floatLabel" for="password">Password: </label>
		<input id="password" type="password" name="password" type="password" value=""></p>

		<input type="submit" name="register" id="register" value="Register">

		<br><br>
		<h1>
			Click Here to Login: 
				<a href="userlogin.php">Login Here</a>
		</h1>
	</form>

</body>
</html>

 <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

    <script  src="js/index.js"></script>