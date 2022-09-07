<?php
	session_start();
	require_once "GoogleAPI/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("734714670497-vl2jo5oag9pthob4v3gd7ff11066cjtp.apps.googleusercontent.com");
	$gClient->setClientSecret("3WN4nyZYLV5AQ7sFmTRHzKbR");
	$gClient->setApplicationName("CPI Login Tutorial");
	$gClient->setRedirectUri("http://localhost//dentists/user/g-callback.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
?>
