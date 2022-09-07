<?php

    include'header1.php';
        include 'includes/dbconnect.php';


$sql = "SELECT clinic_name AS cname, location AS location,opening_hour AS openhr,closing_hour AS closehr,no_of_rooms AS rooms,clinic_id  FROM clinic";

$result = mysqli_query ($mysqli, $sql); // Run the query.

?>
    <!-- page-header-start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="page-section">
                        <h1 class="page-title ">About Us</h1>
                        <p>Learn more about us.</p>
                        <a href="make_appointment.php" class="btn btn-primary">make an appointment</a>
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
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <img src="./images/about.jpg" alt="" class="img-responsive">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="about-section">
                            <h1>Welcome to Dentistry Clinic</h1>
                            <p>Since 1990 we have provided patients with the best dental care treatments &amp; our team of highly skilled dentist specialists &amp; also equipped to provide a complete range of treatments.</p>
                            <div class="about-list">
                                <ul class=" angle angle-right mb30">
                                    <li>Highly skilled and experienced doctors</li>
                                    <li>Provide 100% Complete protection for Patient</li>
                                    <li>We believe in further development and new innovations</li>
                                </ul>
                                  </div>

                                        <p>If you click on the "Hide" button, Bullet points will disappear.</p>

                                        <button id="hide">Hide</button>
                                        <button id="show">Show</button>
                        </div>
                    </div>
                </div>


                 <div class="space-medium">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="mb30"><img src="./images/root-canal.jpg" alt="" class="img-responsive"></div>

                    <div class="widget-cta">
                        <div class="widget-cta-icon ">
                            <i class="icon-007-appointment"> </i> </div>
                        <div class="widget-cta-block">
                            <h2 class="text-white mb30">Clinic Sechdule</h2>
                 <?php
                        if ($result) { // If it ran OK, display the records

                    // Table header. 
                echo '<table class="table">
                <tr class="heading"><td class="col head"><b>Clinic Name</b></td><td class="col head"><b>Location</b></td><td class="col head"><b>Opening Hours</b></td><td class="col head"><b>Closing Hours</b></td>
                <td class="col head"><b>Total Rooms</b></td></tr>';
                // Fetch and print all the records: 
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo '<tr class="heading2"><td class="col">' . $row['cname'] . '</td><td class="col">'.  $row['location'] . '</td>
                <td class="col">'.  $row['openhr'] . '</td><td class="col">'.  $row['closehr'] . '</td>
                <td class="col">'.  $row['rooms'] . '</td>
                </tr>'; }
                echo '</table>'; // Close the table so that it is ready for displaying.
                mysqli_free_result ($result); // Free up the resources.
               } 

else { // If it did not run OK.
        // Error message:
        echo '<p class="error">The current users could not be retrieved. We apologize 
        for any inconvenience.</p>';
        // Debug message:
        echo '<p>' . mysqli_error($mysqli) . '<br><br>Query: ' . $sql . '</p>';
     } // End of if ($result)

mysqli_close($mysqli); // Close the database connection.

                    ?>
    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
         
        </div>
    </div>
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
        $(document).ready(function(){
            $("#hide").click(function(){
                $(".about-list").hide();
            });
            $("#show").click(function(){
                $(".about-list").show();
            });
        });
        </script>

</body>

</html>

<?php
    include 'footer.php';
?>
