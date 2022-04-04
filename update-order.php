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


<div class="main-content">
    <div class="wrapper">
        <h1> Update Order </h1>
        <br> <br>
        <?php 
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];

                $sql = "SELECT * FROM table_order WHERE id=$id";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    $row = mysqli_fetch_assoc($res);

                    $helps= $row['helps'];
                    $price= $row['price'];
                    $qty= $row['qty'];
                    $status= $row['status'];
                    $cus_name= $row['cus_name'];
                    $cus_contact= $row['cus_contact'];
                    $cus_email= $row['cus_email'];
                    $cus_address= $row['cus_address'];
                }
                else
                {
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
            }
            else
            {
                header('location:'.SITEURL.'admin/manage-order.php');
            }
        ?>
        <form action="" method="POST">
        <table class="tbl-30">

        <tr>
            <td>Help Title</td>
            <td><b><?php echo $helps; ?></b></td>
        </tr>
        <tr>
            <td>Price</td>
            <td><b> $<?php echo $price; ?></b></td>
        </tr>
        <tr>
            <td>Qty</td>
            <td><input type="number" name="qty" value="<?php echo $qty; ?>">
        </td>
        </tr>
        <tr>
            <td>Status</td>
            <td>
                <select name="status">
                    <option <?php if($status=="ordered"){echo "selected";} ?> value="ordered">Booked</option>
                    <option <?php if($status=="on delivery"){echo "selected";} ?> value="on delivery">On delivery</option>
                    <option <?php if($status=="delivered"){echo "selected";} ?> value="delivered">Delivered</option>
                    <option <?php if($status=="cancelled"){echo "selected";} ?> value="cancelled">Cancelled</option>

                </select>
            </td>
        </tr>
        <tr>
            <td>
                Customer Name:
            </td>
            <td>
                <input type="text" name="cus_name" value="<?php echo $cus_name; ?>">
            </td>
        </tr>
        <tr>
            <td>
                Customer Contact:
            </td>
            <td>
                <input type="text" name="cus_contact" value="<?php echo $cus_contact; ?>">
            </td>
        </tr>
        <tr>
            <td>
                Customer Email:
            </td>
            <td>
                <input type="text" name="cus_email" value="<?php echo $cus_email; ?>">
            </td>
        </tr>
        <tr>
            <td>
                Customer Address:
            </td>
            <td>
                <textarea name="cus_address" cols="30" rows="5"><?php echo $cus_address; ?></textarea>
            </td>
        </tr>
        
        <tr>
        <td colspan="2">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="price" value="<?php echo $price; ?>">

            <input type="submit" name="submit" value="Update order" class="btn-secondary">
        </td>
        </tr>
        </table>

        </form>

        <?php
        if(isset($_POST['submit']))
        {
            //echo "Clicked";
            $id = $_POST['id'];
            $price = $_POST['price'];
            $qty = $_POST['qty'];

            $total = $price * $qty;

            $status = $_POST['status'];

            $cus_name = $_POST['cus_name'];
            $cus_contact = $_POST['cus_contact'];
            $cus_email = $_POST['cus_email'];
            $cus_address = $_POST['cus_address'];

            $sql2 = "UPDATE table_order SET 
            qty = $qty,
            total = $total,
            status = '$status',
            cus_name = '$cus_name',
            cus_contact = '$cus_contact',
            cus_email = '$cus_email',
            cus_address = '$cus_address'
            WHERE id=$id
            ";

            $res2 = mysqli_query($conn, $sql2);

            if($res2==true)
            {
                $_SESSION['update'] = "<div class='success'>Order Updated successfully </div>";
                header('location:'.SITEURL.'admin/manage-order.php');
            }
            else
            {
                $_SESSION['update'] = "<div class='error'>Order not updated</div>";
                header('location:'.SITEURL.'admin/manage-order.php');
            }

        }
        ?>
    </div>
</div> 
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