<?php

    include 'includes/dbconnect.php';
    include 'header1.php';
?>

<!doctype html>
<html lang=en>
<head>
<title>View dental codes</title>
<meta charset=utf-8>
    <link rel="stylesheet" type="text/css" href="css/app.css">
<link rel="stylesheet" type="text/css" href="adminregview.css">

<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
</head>

<body>
    <!-- page-header-start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="page-section">
                        <h1 class="page-title ">View Appointment</h1>
                        <p>Etiarem ipsum dolor sit ce eu lacus impsus erat vitae.</p>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page-header-close -->
    <!-- treatment start -->
    <div class="space-medium">
        <div class="container">
        
             <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="section-title"><!-- section title start-->
                  <h1>Appointment Details</h1>
                  
                        <?php

                        // Make the query: 

                        $query = "SELECT app_id,dental_code,dentist_id,app_date,app_time,status FROM appointment";

                        $result = mysqli_query ($mysqli, $query); // Run the query.

                        if ($result) { // If it ran OK, display the records

                                            echo '<table class="table">
                                                <tr class="heading">
                                                <td class="col head"><b>Dental Codes</b>
                                                </td><td class="col head"><b>Dentist</b></td>
                                                <td class="col head"><b>Registration Date</b></td>
                                                <td class="col head"><b>Time</b></td>
                                                <td class="last"><b>Status</b></td></tr>';
                                                // Fetch and print all the records: 
                                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                                echo '<tr class="heading2">
                                                <td class="col">' . $row['dental_code'] . '</td>
                                                <td class="col">'.  $row['dentist_id'] . '</td>
                                                <td class="col">'.  $row['app_date'] . '</td>
                                                <td class="col">'.  $row['app_time'] . '</td>
                                                <td class="col">'.  $row['status'] . '</td>
                                                </tr>'; }
                                                echo '</table>'; // Close the table so that it is ready for displaying.
                                                mysqli_free_result ($result); // Free up the resources.
                                               } 
                        else { // If it did not run OK.
                                // Error message:
                                echo '<p class="error">The current users could not be retrieved. We apologize 
                                for any inconvenience.</p>';
                                // Debug message:
                                echo '<p>' . mysqli_error($mysqli) . '<br><br>Query: ' . $query . '</p>';
                             } // End of if ($result)

                        mysqli_close($mysqli); // Close the database connection.
                        ?>

                        <br><br>
                         <h3>To view the encoded json file using the PHP script,appoint_encode.php<br><br>
                                    Click the button displayed below.</h3>
                            <div class="sub">
                                <a href="appoint_encode.php"><input id="btn" type="button" name="button" value="Click Me !"></a>
                            </div>
                 
                </div><!-- /.section title start-->
              </div>
            </div>
        </div>
    </div>

   
</body>
</html>


<?php
    include 'footer.php';
?>
