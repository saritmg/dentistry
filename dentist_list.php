<?php
    include 'header1.php';
    include 'includes/dbconnect.php';

    ?>


<!DOCTYPE html>
<html>
<head>
    <title>Dentist List</title>
</head>
<body>
    <!-- page-header-start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="page-section">
                        <h1 class="page-title ">Dentist Information</h1>
                        <p>Our dentist are expert in their work.</p>
                        <a href="appointment.php" class="btn btn-primary">make an appointment</a>
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
                            <i class="icon-003-tooth-13"></i> </div>
                        <div class="">
                            <?php

        $sql="SELECT name AS name, age AS age,email as email,dtype as dtype FROM dentist";
        $result=mysqli_query($mysqli,$sql);

        if ($result) { // If it ran OK, display the records

                    // Table header. 
                echo '<table class="table">
                <tr class="heading"><td class="col head"><b>Dentist Name</b></td><td class="col head"><b>Age</b><td class="col head"><b>Email</b></td><td class=" last"><b>Dentist Type</b></td>
                
                </tr>';
                // Fetch and print all the records: 
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo '<tr class="heading2"><td class="col">' . $row['name'] . '</td>
                <td class="col">' . $row['age'] .'</td>
                <td class="col">' . $row['email'] .'</td>
                <td class="col">'.  $row['dtype'] . '</td>
                </tr>'; }
                echo '</table>'; // Close the table so that it is ready for displaying.
                mysqli_free_result ($result); // Free up the resources.
               } 

                else { // If it did not run OK.
                        // Error message:
                        echo '<p class="error">The current users could not be retrieved. We apologize 
                        for any inconvenience.</p>';
                        // Debug message:
                        echo '<p>' . mysqli_error($mysqli) . '<br><br>Query: ' . $q . '</p>';
                     } // End of if ($result)

                mysqli_close($mysqli); // Close the database connection.
                ?>

                        </div>
                    </div>
                </div>
               </div>
           </div>
       </div>

</body>

</html>

<?php
    include 'footer.php';
?>
