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

    <?php 
        if(isset($_GET['help_id']))
        {
            $help_id = $_GET['help_id'];

            $sql = "SELECT * FROM table_menu WHERE id=$help_id";

            $res = mysqli_query($conn, $sql);

            $count= mysqli_num_rows($res);

            if($count==1)
            {
                $row = mysqli_fetch_assoc($res);
                $title = $row['title'];
                $price = $row['price'];
                $image_name = $row['image_name'];
            }
            else
            {
                header('location:'.SITEURL);
            }
        }
        else
        {
            header('location:'.SITEURL);
        }
    ?>

    <!-- help sEARCH Section Starts Here -->
    <section class="help-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your Booking.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Help</legend>

                    <div class="help-menu-img">
                        <?php 
                        if($image_name=="")
                        {
                            echo "<div class='error'>Image not available</div>";
                        }
                        else
                        {
                            ?>
                            <img src="<?php echo SITEURL; ?>images/menu/<?php echo $image_name; ?>" alt="Electricity problems" class="img-responsive img-curve">
                            <?php
                        }
                        
                        ?>
                        
                    </div>
    
                    <div class="help-menu-desc">
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="helps" value="<?php echo $title; ?>">
                        <p class="help-price">$<?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery help Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="Sanjida" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="018xxxxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="sanjida15916@gmail.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="Farmgate,Dhaka" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

            <?php
            
            if(isset($_POST['submit']))
            {
                //get the details from form
                $helps = $_POST['helps'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];
                $total= $price * $qty;
                $order_date = date("Y-m-d h:i:sa");
                $status = "Ordered";
                $cus_name = $_POST['full-name'];
                $cus_contact = $_POST['contact'];
                $cus_email = $_POST['email'];
                $cus_address = $_POST['address'];


                $sql2 = "INSERT INTO table_order SET
                helps = '$helps',
                price = $price,
                qty = $qty,
                total = $total,
                order_date = '$order_date',
                status = '$status',
                cus_name = '$cus_name',
                cus_contact = '$cus_contact',
                cus_email = '$cus_email',
                cus_address = '$cus_address'

                ";

                $res2 = mysqli_query($conn, $sql2);

                if($res2==true)
                {
                    $_SESSION['order'] = "<div class='success text-center'>Booked Successfully</div>";
                    header('location:'.SITEURL);
                }
                else
                {
                    $_SESSION['order'] = "<div class='error text-center'>Failed to book </div>";
                    header('location:'.SITEURL);
                }
            }
            ?>

        </div>
    </section>
    <!-- help sEARCH Section Ends Here -->

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