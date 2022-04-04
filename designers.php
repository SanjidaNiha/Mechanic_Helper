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
                        <a href="home.php">Home</a>
                    </li>
                    <li> <a href="<?php echo SITEURL; ?>help_search.php"> Helps </a></li>
                    <li>
                        <a href="worker.php">Worker n Buyer</a>
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

 <!--intro section starts here-->

  <section class="help-search">
        <div class="container">
            
            <h2 class="text-center">About Us</h2>

      <div class="float-container img-us"> 
      <img src="images/niha.jpg" alt="Sanjida Shahrin Niha" class="img-responsive img-curve">
      </div>
<div class="help-menu-des"> 
  <h3> Sanjida Shahrin Niha</h3>
  <h4> Web Developer </h4>
  
  <p class="text-white"> Currently a student in <a href="https://www.easternuni.edu.bd/">Eastern University</a>  </p><br>
 
</div>
    <div class="clearfix"> </div>
     
       

      <div class="float-container img-us"> 
      <img src="images/jubu.jpg" alt="Tanjila Aktar Jubaeda" class="img-responsive img-curve">
      </div>
<div class="help-menu-des"> 
   <h3> Tanjila Aktar Jubaeda</h3>
   <h4> Web Developer </h4>
  
  <p class="text-white"> Currently a student in <a href="https://www.easternuni.edu.bd/">Eastern University</a>  </p><br>
 
</div>
    <div class="clearfix"> </div>
        
     </div>
</section>

 <!--intro section ends here-->


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
            <p>All rights reserved. Designed By <a href="designers.php">Sanjida Shahrin Niha </a> & <a href="designers.php"> Tanjila Akhtar Jubayeda </a></p>
        </div>
    </section>
    <!-- footer Section Ends Here -->
</body>
</html>