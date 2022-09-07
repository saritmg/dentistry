<?php
    include 'header1.php';
    include 'includes/dbconnect.php';

    ?>


<!DOCTYPE html>
<html>
<head>
    <title>Dentist List</title>
    <link rel="stylesheet" type="text/css" href="css/app.css">
</head>
<body>
    <!-- page-header-start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="page-section">
                        <h1 class="page-title ">Dental Codes</h1>
                        <p>We offer various types of services.</p>
                        <!-- <a href="appointment.php" class="btn btn-primary">make an appointment</a> -->
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
                <div class="col-lg-11 col-md-4 col-sm-4 col-xs-12">
                    <div class="service-block">
                        <div class="service-icon">
                            <h2>Dental Services We Offer !</h2>
                            <i class="icon-003-tooth-13"></i> </div>
                        <div class="">
                            <?php

                                $sql="SELECT code_id,codes,unit_cost,description FROM dental_codes";
                                $result=mysqli_query($mysqli,$sql);

                                if ($result) { // If it ran OK, display the records

                                          // Table header. 
                                        echo '<table class="table">
                                        <tr class="heading"><td class="col head"><b>Codes</b></td><td class="col head"><b>Unit Cost</b></td><td class=" col head"><b>Descriptions</b></td>
                                        
                                        </tr>';
                                        // Fetch and print all the records: 
                                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                        echo '<tr class="heading2"><td class="col">' . $row['codes'] . '</td>
                                        <td class="col">' . $row['unit_cost'] .'</td>
                                        <td class="col">'.  $row['description'] . '</td>
                                        </tr>'; }
                                        echo '</table>'; // Close the table so that it is ready for displaying.
                                        mysqli_free_result ($result); // Free up the resources.
                                       } 

                        else { // If it did not run OK.
                                // Error message:
                                echo '<p class="error">The current users could not be retrieved. We apologize 
                                for any inconvenience.</p>';
                                // Debug message:
                                echo '<p>' . mysqli_error($mysqli) . '<br><br>Query: ' . $sql . '</p>';
                             } // End of if ($result)

                        mysqli_close($mysqli); // Close the database connection.
?>
    <br>
                     <h3>To view the xml document dynamically generated from a database using the PHP script,dental_xml.php<br><br>
                                    Click the button displayed below.</h3>
                            <div class="sub">
                                <a href="dental.xml"><input id="btn" type="button" name="button" value="Click Me !"></a>
                            </div>

                  <h3>To view the transformed xml document to xsl, Click Below &nbsp:</h3>
                            <div class="sub">
                                <a href="dental.xsl"><input id="btn" type="button" name="button" value="Click Here !"></a>
                            </div>

                        </div>
                    </div>
                </div>
               </div>
           </div>
       </div>
   </body>

    
  
</body>

</html>

<?php
    include 'footer.php';
?>
