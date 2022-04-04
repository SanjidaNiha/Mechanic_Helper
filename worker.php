<?php
    //start the session
    session_start();
    //create constants forstoring non repeating values
    define('SITEURL','http://localhost/MH-website/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD','');
    define('DB_NAME', 'mh-web');

//execute query and save data in database
       $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_connect_error()); //database connection
        $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_connect_error()); //selecting database
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Mechanic Helper </title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/logo1.png" alt="MH Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>">Home</a>
                    </li>
                    <li> <a href="<?php echo SITEURL; ?>help_search.php"> Helps </a></li>
                    <li>
                        <a href="<?php echo SITEURL; ?>worker.php">Worker n Buyer</a>
                    </li>
                    <li>
                    <a href="<?php echo SITEURL; ?>payment.php">Payment System</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->

   <!--worker n buyer section starts here-->

  <section class="help-search">
        <div class="container">
            
            <h2 class="text-center">Worker</h2>

      <div class="float-container box-3"> 
      <img src="images/worker.png" alt="worker" class="img-responsive img-curve">
      </div>
<div class="help-menu-des"> 
  <h4> Active and Responsive workers </h4>
  
  <p class="text-white"> We provide you by the best workers in town. 
If you face any problem by any workers you can directly contact us. 
We have all the information aboout workers. </p><br>
  <a href="#" class="btn btn-primary"> Thanks for being here </a>
</div>
    <div class="clearfix"> </div>
     
            <h2 class="text-center">Buyer</h2>

      <div class="float-container box-3"> 
      <img src="images/buyer.png" alt="buyer" class="img-responsive img-curve">
      </div>
<div class="help-menu-des"> 
  <h4> Satisfied Buyers</h4>
  
  <p class="text-white"> Our buyers are mostly satisfied with our work. 
If you face any kind of trouble as a buyer,
 you can simply contact with us through social links and we will surely take an action. </p><br>
  <a href="#" class="btn btn-primary"> Thanks for being here </a>
</div>
    <div class="clearfix"> </div>
     </div>
</section>

 <!--worker n buyer section ends here-->


 <!-- social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluency/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluency/50/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/color/48/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->

    <!-- footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved. Designed By <a href="<?php echo SITEURL; ?>designers.php">Sanjida Shahrin Niha </a> & <a href="<?php echo SITEURL; ?>designers.php"> Tanjila Akhtar Jubayeda </a></p>
        </div>
    </section>
    <!-- footer Section Ends Here -->
</body>
</html>