<?php
    
    include 'header1.php';
    include 'includes/dbconnect.php';

    if(isset($_POST['submit'])){
                {
        $errors = array(); // Initialize an error array.
        // Check for a first name:
        if (empty($_POST['name'])) {
        $errors[] = 'You forgot to enter your name.';
        } else {
        $name = mysqli_real_escape_string($mysqli, trim($_POST['name']));
        }

        

        // Check for email
        if (empty($_POST['email'])) {
        $errors[] = 'You forgot to enter your email.';
        } else {
        $email = mysqli_real_escape_string($mysqli, trim($_POST['email']));
        }

        // Check for subject
        if (empty($_POST['subject'])) {
        $errors[] = 'You forgot to enter subject.';
        } else {
        $subject= mysqli_real_escape_string($mysqli, trim($_POST['subject']));
        }

        // Check for an message
        if (empty($_POST['message'])) {
        $errors[] = 'You forgot to enter message.';
        } else {
        $message = mysqli_real_escape_string($mysqli, trim($_POST['message']));
        }

        if (empty($errors)) { // If it runs
        // Register the user in the database...
        // Make the query:

        $query="INSERT INTO `contact`(`name`, `email`, `subject`, `message`) VALUES ('$name','$email',
                                    '$subject','$message')";
       $result=mysqli_query($mysqli,$query);

        if($result==1){
             echo"<script>alert('Thankyou for contacting us !);</script>";      
           echo "<html><script> document.location.href='contact_us.php';</script></html>";
        }
            echo "<script>alert('Error while sending message');</script>";

    }
    mysqli_close($mysqli); 
    }
}

?>
    <!-- page-header-start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="page-section">
                        <h1 class="page-title ">Contact Us</h1>
                       
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
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <h1>Contact Info</h1>
                    <p>Drop us a line and we’ll get back to you as soon as. We are available 24/7 via fax or email.</p>
                    <div class="contact-info">
                        <h2>Clinic Address</h2>
                        <ul>
                            <li> <i class="fa fa-map-marker"></i>34 Zackwon 15th St, NY 10011</li>
                            <li><i class="fa fa-phone"></i>(000)-123-4567</li>
                            <li><i class="fa fa-envelope-open"></i>info@dentalcare.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="mb30">
                        <h1>Get In Touch</h1>
                        <p>Submit your contact details and we’ll be in touch shortly. </p>
                        <div class="row">
                             <form method="post">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label sr-only " for="name"></label>
                                        <input id="name" name="name" type="text" placeholder="Name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label sr-only " for="email"></label>
                                        <input id="email" name="email" type="text" placeholder="Email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label sr-only " for="subject"></label>
                                        <input id="subject" type="text" name="subject" placeholder="Subject" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label sr-only" for="textarea"></label>
                                        <!-- <input type="textarea" name="message" rows="6"> -->
                                        <textarea class="form-control" id="textarea" name="message" rows="6" placeholder="Messages"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <input id="submit" type="submit" name="submit" value="Contact Us">
                                </div>
                                     </div>
                                    </div>
                    </form>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="mb30">Our Location</h1>
                    <div id="contact-map">
                       <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyAQ3I2sOewM5Je8b7lQ-DfHgoURQ3oCAcg'></script><div style='overflow:hidden;height:457px;width:1144px;'><div id='gmap_canvas' style='height:457px;width:1144px;'></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div> <a href='http://maps-website.com/'>google widgets</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=b243be4184b29e259fb897ccd451cbcc07f5fc07'></script><script type='text/javascript'>function init_map(){var myOptions = {zoom:12,center:new google.maps.LatLng(27.7172453,85.3239605),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(27.7172453,85.3239605)});infowindow = new google.maps.InfoWindow({content:'<strong>Tokha</strong><br>Sherpa Block<br>44608 Kathmandu<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
       </div>
                </div>
            </div>
        </div>
    </div>
    <!-- treatment close -->

</body>
</html>


<?php
    include 'footer.php';
?>
