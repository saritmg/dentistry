<?php
    //  session_start();
    // if(isset($_SESSION['id']) && $_SESSION['id'] == 1) {
    //     //session is set
    //     header('Location:admin/admindash.php');
    // } else if(!isset($_SESSION['id']) || (isset($_SESION['id']) && $_SESSION['id'] == 0)){
    //     //session is not set
    //     header('Location:user/userlogin.php');
    // }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="keywords" content="">
    <title>Dentistry a Dental Clinic Responsive Website Template </title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Style CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <!-- FontAwesome CSS -->
    <link href="css/owl.carousel.min.css" rel="stylesheet">
    <link href="css/owl.theme.default.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/fontello.css">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    
    <div class="header-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-2 col-sm-12 col-xs-12">
                    <a href="dashboard.php"><img src="images/logo.png" alt=""></a>
                </div>
                <div class="col-lg-9 col-md-10 col-sm-12 col-xs-12">
                    <div class="navigation">
                        <div id="navigation">
                            <ul>
                                <li class="active"><a href="dashboard.php" title="Home">Home</a></li>
                                <li><a href="about.php" title="About us">About us</a> </li>
                                 <li><a href="register_ajax.php" title="users">Registered Users</a>
                                </li>
                               <li class="has-sub"><a href="#" title="Features ">Dentist</a>
                                    <ul>
                                        <li><a href="dentist_list.php" title="dentist">Dentist List</a></li>
                                         <li><a href="display_angular_js.php" title="dentist">Search Dentist</a></li>
                                        
                                        <li><a href="dentist_codes.php" title="404-error">Dentist Codes </a> </li>
                                       
                                    </ul>
                                </li>
                                <li class="has-sub"><a href="#" title="Features ">Appointents</a>
                                    <ul>
                                        
                                        <li><a href="make_appointment.php" title="404-error">Make Appointment </a> </li>
                                       
                                        <li><a href="view_appointment.php" title="Testimonials">View Appointment</a></li>
                                        <li><a href="employee_json.php" title="users">Employee Details</a>
                                    </ul>
                                </li>
                                <li><a href="contact_us.php" title="Contact Us">Contact Us</a>
                                </li>
                                <li><a href="index.php" title="Contact Us">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header-section close -->