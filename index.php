<?php
  session_start();
  define('SITEURL','http://localhost/MH-website/');
  define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD','');
    define('DB_NAME', 'mh-web');

//execute query and save data in database
$conn = mysqli_connect('localhost','root','') or die(mysqli_connect_error());
$db_select = mysqli_select_db($conn,'mh-web') or die(mysqli_connect_error());
?>
<html>
    <head> 
        <title> Mechanic helper -website </title>
        <link rel="stylesheet" href="../css/admin.css">
   </head>
<body>
<!-- nav section starts -->
    <div class="nav text-center">
     <div class="wrapper">
         <ul>
             <li><a href="index.php">Home</a></li>
             <li><a href="manage-admin.php">Admin</a></li>
             <li><a href="manage-category.php">Category</a></li>
             <li><a href="manage-help.php">Helps</a></li>
             <li><a href="manage-order.php">Order</a></li>
        </ul>
     </div>
    </div>
<!-- nav section ends -->

<!-- main content section starts -->
      <div class="main-content">
      <div class="wrapper">
          <h1> DASHBOARD </h1>
          <div class="col-4 text-center">
              <h1> 5 </h1>
              <br />
              Categories
          </div>
          <div class="col-4 text-center">
              <h1> 5 </h1>
              <br />
              Categories
          </div>
          <div class="col-4 text-center">
              <h1> 5 </h1>
              <br />
              Categories
          </div>
          <div class="col-4 text-center">
              <h1> 5 </h1>
              <br />
              Categories
          </div>
          <div class="clearfix"> </div>
     </div>
      </div>
<!-- main content section ends -->
<!-- footer section starts -->
<div class="footer">
      <div class="wrapper">
      <p class="text-center"> All rights reserved. Developed by 
          <a href="#">Sanjida Shahrin Niha </a>
       & <a href="#"> Tanjila Akhtar Jubayeda </a>

     </div>
      </div>
<!-- footer section ends -->
</body> 
</html>
