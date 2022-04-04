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
    <title>Mechanic Helper</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/logo1.png" alt="MH logo" class="img-responsive">
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

    <!-- help sEARCH Section Starts Here -->
    <section class="help-search text-center">
        <div class="container">
            
            <h2>Helps for You </h2>

        </div>
    </section>
    <!-- help sEARCH Section Ends Here -->

<!-- Help menu section start-->
<section class="help-menu">
  <div class="container">
    <h2 class="text-center"> Available helps for you </h2>

    <?php

    $sql2 = "SELECT * FROM table_menu";

    $res2 = mysqli_query($conn, $sql2);

    $count2 = mysqli_num_rows($res2);

    if($count2>0)
    {
      while($row=mysqli_fetch_assoc($res2))
      {
        $id = $row['id'];
        $title = $row['title'];
        $price = $row['price'];
        $description = $row['description'];
        $image_name = $row['image_name'];
        ?>

       <div class="help-menu-box">
      <div class="help-menu-img"> 

      <?php

          if($image_name=="")
          {
            echo "<div class='error'>Image not added </div>";
          }
          else
          {
          ?>
            <img src="<?php echo SITEURL; ?>images/menu/<?php echo $image_name; ?>" alt="Electricity problems" class="img-responsive img-curve">
          <?php
          }
         
      ?>
      
      </div>
        <div class="help-menu-des"> 
            <h4> <?php echo $title; ?></h4>
            <p class="help-price"> $<?php echo $price; ?> </p>
              <p class="help-detail"><?php echo $description; ?></p><br>
           <a href="<?php echo SITEURL; ?>Bookings.php?help_id=<?php echo $id; ?>" class="btn btn-primary"> Book Now </a>
        </div>
    
     </div>


        <?php
      }
    }
    else
    {
      echo "<div class='error'>Help not available  </div>";
    }

    ?>
     

     

     <div class="clearfix"> </div>
  </div>
</section>
<!-- Help menu section ended -->

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