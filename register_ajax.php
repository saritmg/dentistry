<?php
    include'header1.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" type="text/css" href="css/register.css">
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="user/js/reg_ajax.js"></script>


</head>

<body>

    <!-- page-header-start -->

    <!-- page-header-start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="page-section">
                        <h1 class="page-title ">User Details</h1>
                        <p>JQuery/ AJAX.</p>
                        <!-- <a href="appointment.php" class="btn btn-primary">make an appointment</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- page-header-close -->
    <!-- typography-start -->
    <div class="space-medium">
        <div class="container">
            <div class="row">
                <h2 class="title">Data retrieved from DB Using JQuery and Ajax</h2>
                        <table>
                        <!-- <tr>
                        <td>User ID:</td>
                        <td><input type="text"  "id" id="reg_no" /><td>
                        </tr> -->
                        <tr id = "butrow">
                        <td></td>
                        <td><p><button id="submit">Display Table</button></p></td>
                        </tr>
                        </table>
                        <div id="msg"></div>
            </div>
            <hr>
        </div>
    </div>
            
</body>

</html>

<?php
    include 'footer.php';
?>
