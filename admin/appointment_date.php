<?php
	include '../includes/dbconnect.php';

	if(isset($_POST['submit'])){
		 $app_date = trim($_POST['app_date']);

		 $query="INSERT INTO appointment_date(id,app_date) VALUES('','$app_date')";
		 $result=mysqli_query($mysqli,$query);
		 if($result){
		 	echo "<html><script> document.location.href='view_appointment.php';</script></html>";
		 	exit();
		 }else{

				 echo '<h2 class="error">System Error</h2>
				 <p class="error">Error while inserting date.</p>';

			      } // End of if clause ($result)

			mysqli_close($mysqli); // Close the database connection.

			exit();
 }
	

?>

<!DOCTYPE html>
<html>
<head>
	<title>Appointment Date</title>
	<link rel="stylesheet" type="text/css" href="css/appoint.css">
	<link href='https://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<h2 class="title">Insert Appointment Dates</h2>

	<button onclick="goBack()" style="background-color:#87BC78; ">Go Back</button>
</head>
<body>
	<!--display the form on the screen-->
<form method="post" class="form">


</head>
<body>
 <p><label class="label" for="app_date">Date</label>
 <input type="text" id="datepicker" name="app_date" size="30" maxlength="30" 
value=""><br>
<span class="se">Format:08/01/2018</span></p>


<p><input id="submit" type="submit" name="submit" value="Enter"></p>
</form><!-- End of the page content. -->

</body>
</html>

  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>