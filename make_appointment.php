<?php

    include 'includes/dbconnect.php';
    include 'header1.php';

  if(isset($_POST['submit'])){

             $codes = trim($_POST['codes']);
             $dent_info = trim($_POST['dent_info']);
             $dates = trim($_POST['dates']);
             $time = trim($_POST['time']);

            $query = "INSERT INTO appointment (app_id,dental_code,dentist_id,app_date,app_time,status)
            VALUES ('', '$codes','$dent_info','$dates','$time','Not Confirmed')";
            $result = mysqli_query ($mysqli, $query); // Run the query.
            // var_dump($result);
            // die();

                  if($result) 
                  { // If it runs
                  header("location:view_appointment.php");
                  exit();
                  } 
                  else 
                  { // If it did not run
                  // Message:
                  echo '<h2>System Error</h2>
                  <p class="error">You could not be registered due to a system error. We apologize 
                  for any inconvenience.</p>';
                  // Debugging message:
                  echo '<p>' . mysqli_error($mysqli) . '<br><br>Query: ' . $query . '</p>';
                  } // End of if ($result)

            mysqli_close($mysqli); // Close the database connection.
            // Include the footer and quit the script:
            
            exit();
            } 
// End of the main Submit conditional.
?>
<!DOCTYPE html>
<html>
<head>
    <title>Make Appointment</title>
    <link rel="stylesheet" type="text/css" href="css/app.css">
</head>
<body>
     <!-- page-header-start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="page-section">
                        <h1 class="page-title ">Appointment Form</h1>
                        <p>Fill Up this form to make an appointment.</p>
                        <!-- <a href="#" class="btn btn-primary">make an appointment</a> -->
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
                  <h2>Appointment Form Fill Up</h2>
                    <form method="post" class="form">
                          <?php
                        
                          $query = "SELECT concat(codes,'-',description) AS codes FROM dental_codes";
                          $result = mysqli_query($mysqli,$query);
                          ?>

                          <label for="codes">Dental Codes:&nbsp&nbsp<select name="codes" value="<?php if (isset($_POST['codes'])) echo $_POST['codes']; ?>" >
                           <option>-- Select one --</option>
                          <?php
                          if ($result) {
                         while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                          ?>
                          <option> <?php echo $row['codes'];?> </option>
                          <?php
                          }
                        }
                          ?>
                          </select></label><br><br>


                          
                          <?php
                        
                          $query = "SELECT concat(id,'-',name) AS dent_info FROM dentist";
                          $result = mysqli_query($mysqli,$query);
                          ?>

                          <label for="dent">Select Dentist:&nbsp&nbsp<select name="dent_info" value="<?php if (isset($_POST['dent_info'])) echo $_POST['dent_info']; ?>" >
                           <option>-- Select one --</option>
                          <?php
                         while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                          ?>
                          <option> <?php echo $row['dent_info'];?> </option>
                           
                          <?php
                          }
                          ?>
                          </select></label><br><br>




                          <?php
                          $query = "SELECT app_date AS dates FROM appointment_date";
                          $result = mysqli_query($mysqli,$query);
                          ?>

                          <label for="dates">Select Dates:&nbsp&nbsp<select name="dates" value="<?php if (isset($_POST['dates'])) echo $_POST['dates']; ?>" >
                           <option>-- Select one --</option>
                          <?php
                          while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                          ?>
                          <option> <?php echo $row['dates'];?> </option>
                           
                          <?php
                          }
                          ?>
                          </select></label><br><br>

                          <label>Time:&nbsp&nbsp</label> <select name="time" id="hall" value="<?php if (isset($_POST['time'])) echo $_POST['time']; ?>" >
                            <option>-- Select --</option>
                            <option>9 AM</option>
                            <option>10 AM</option>
                            <option>11 AM</option>
                            <option>12 PM</option>
                            <option>1 PM</option>
                            <option>2 PM</option>
                            <option>3 PM</option>
                            <option>4 PM</option>
                            <option>5 PM</option>
                            <option>6 PM</option>
                            <option>7 PM</option>  <!-- time for 24 houre -->
                          </select>
                          <br>
                          <br>
                          
                          <input id="submit" type="submit" name="submit" value="Fix Appointment">

                    </form>
                 
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


   