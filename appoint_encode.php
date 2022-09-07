<?php
    include 'includes/dbconnect.php';

    $query = "SELECT app_id,dental_code,dentist_id,app_date,app_time,status FROM appointment"; //replace with your table name 
    
    $result = mysqli_query($mysqli,$query);
                                 
    $json_array = array();
    
    while($row=mysqli_fetch_row($result)){
            // array_push($result,$row);
            $json_array['Appointment_Info'][]=$row;
            header('Content-type: application/json');
     }
             echo json_encode($json_array);

?>
