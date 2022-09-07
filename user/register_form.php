<?php
	// echo "success";
	include '../includes/dbconnect.php';

		$name=$_POST['name'];
	 	$phone=$_POST['phone'];
	 	$age=$_POST['age'];
	 	$address=$_POST['address'];
	 	$email=$_POST['email'];
	 	$password=$_POST['password'];

	 	$query=mysqli_query($mysqli, "SELECT id from register where email='$email'");
		$num=mysqli_num_rows($query);

		 if(!$name & !$phone & !$age & !$address & !$email & !$password){
		 	 echo"All fields required";
		 }else
		 		if(!$name){
		 			echo "Please enter name";
		 		}
		 	else
		 		if(!$phone){
		 			echo "Please enter Phone Number";
		 		}
		 	else
		 		if(!$age){
		 			echo "Please enter Age";
		 		}
		 	else
		 		if(!$address){
		 			echo "Please enter Address";
		 		}
		    else{
			 	if(!$email){
			 		echo "Enter email";
			 	}
			 	else
			 		if($num==1){
			 			echo "Email is already taken";
			 		}
		 	else
			 		if(!$password){
			 			echo"Enter password";
			 		}else{
 			// echo"success";
 			// $encrypted= sha1(md5($pass));
 			mysqli_query($mysqli, "INSERT INTO `register`(`name`, `phone`, `age`, `address`, `email`, `password`) VALUES ('$name','$phone','$age','$address','$email','$password')");
 			$id=mysqli_insert_id($mysqli);

 			echo"Thanks for registering $name, your id is: $id.";
 			header('location:userlogin.php');
 		}
 }

?>