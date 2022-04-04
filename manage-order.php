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
          <h1> Manage Order </h1>
          <br /> <br /> <br />

          <?php 
            if(isset($_SESSION['update']))
            {
              echo $_SESSION['update'];
              unset($_SESSION['update']);
            }
          ?>
          <table class="tbl-full">
            <tr>
              <th>S.N.</th>
              <th>Helps</th>
              <th>Price</th>
              <th>Qty.</th>
              <th>Total</th>
              <th>Order Date</th>
              <th>Status</th>
              <th>Customer Name</th>
              <th>Contact</th>
              <th>Email</th>
              <th>Address</th>
              <th>Actions</th>
            </tr>

            <?php 
                $sql = "SELECT * FROM table_order";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                $sn =1;

                if($count>0)
                {
                  while($row=mysqli_fetch_assoc($res))
                  {
                    $id = $row['id'];
                    $helps = $row['helps'];
                    $price = $row['price'];
                    $qty = $row['qty'];
                    $total = $row['total'];
                    $order_date = $row['order_date'];
                    $status = $row['status'];
                    $cus_name = $row['cus_name'];
                    $cus_contact = $row['cus_contact'];
                    $cus_email = $row['cus_email'];
                    $cus_address = $row['cus_address'];
                    ?>

                    <tr>
              <td><?php echo $sn++; ?> </td>
              <td><?php echo $helps; ?></td>
              <td><?php echo $price; ?></td>
              <td><?php echo $qty; ?></td>
              <td><?php echo $total; ?></td>
              <td><?php echo $order_date; ?></td>


              <td>
                <?php
                if($status=="ordered")
                {
                  echo "<label>$status</label>";
                }
                else if($status=="on delivery")
                {
                  echo "<label style='color: orange;'>$status</label>";
                }
                else if($status=="delivered")
                {
                  echo "<label style='color: green;'>$status</label>";
                }
                else if($status=="cancelled")
                {
                  echo "<label style='color: red;'>$status</label>";
                }

                ?>
              </td>


              <td><?php echo $cus_name; ?></td>
              <td><?php echo $cus_contact;?></td>
              <td><?php echo $cus_email; ?></td>
              <td><?php echo $cus_address; ?></td>
               <td>
              <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>" class="btn-secondary"> Update order </a>
              </td>
            </tr>
                    <?php

                  }
                }
                else
                {
                  echo "<tr><td colspan='12' class='error'>Booking is not available</td> </tr>";
                }
            ?>
            
            
          </table>
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
