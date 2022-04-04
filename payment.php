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
<html lang ="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content = "width-device-width, initial-scale=1.0">
<title> Mechanic Helper </title>

<!--Link our css file -->
<link rel="stylesheet" href="css/style.css">

</head>
<body>
<!-- Navbar section start-->
<section class="navbar">
  <div class="container">
    <div class="logo">
      <img src="images/logo1.png" alt="MH logo" class="img-responsive">
    </div>
    <div class="menu text-right">
     <ul>
      <li> <a href="<?php echo SITEURL; ?>"> Home </a></li>
      <li> <a href="<?php echo SITEURL; ?>help_search.php"> Helps </a></li>
      <li> <a href="<?php echo SITEURL; ?>worker.php"> Worker n Buyer </a></li>
      <li> <a href="Payment-System"> Payment System </a></li>
     </ul>
    </div>
 <div class="clearfix"> </div>
  </div>
</section>
<!-- Navbar section ended -->

<section class="Category">
  <div class="container">
    <h2 class="text-center"> PAY your bills Safely through  </h2>
    <a href="#">
     <div class="box-3 float-container">
       
          <img src="images/bkash.jpg" alt="payment" class="img-responsive img-curve">
          
     
     
     <a href="#" class="btn btn-primary"> Pay Here </a>
     </div>
      </a>
      <a href="#">
     <div class="box-3 float-container">
       
          <img src="images/rocket.jpg" alt="payment" class="img-responsive img-curve">
          
     
          <a href="#" class="btn btn-primary"> Pay Here </a>
     </div>
      </a>
      <a href="#">
     <div class="box-3 float-container">
       
          <img src="images/paypal.png" alt="payment" class="img-responsive img-curve">
          
     
          <a href="#" class="btn btn-primary"> Pay Here </a>
     </div>
      </a>
    <div class="clearfix"> </div>
  </div>
</section>
<!-- Category section ended -->


<!-- social section start-->
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
<!-- social section ended -->

<!-- footer section start-->
<section class="footer">
  <div class="container text-center">
    <p> All rights reserved. Designed by <a href="<?php echo SITEURL; ?>designers.php">Sanjida Shahrin Niha </a> & <a href="<?php echo SITEURL; ?>designers.php"> Tanjila Akhtar Jubayeda </a></p>
  </div>
</section>
<!-- footer section ended -->








</body>
</html>