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
          <h1> Manage Helps  </h1>
          <br />
          <!--button for add admin -->
          <a href="<?php echo SITEURL; ?>admin/add-helps.php" class="btn-primary btn-primary:hover"> Add helps </a>
          <br />
          <br />
          <br />
          <?php 
            if(isset($_SESSION['add']))
            {
              echo $_SESSION['add'];
              unset($_SESSION['add']);
            }

          ?>


          <table class="tbl-full">
            <tr>
              <th>S.N.</th>
              <th>Title</th>
              <th>Price</th>
              <th>Image</th>
              <th>Featured
              <th>Active</th>
              <th>Actions</th>
              </th>
            </tr>
            <?php
            //create sql query to get all the helps
            $sql = "SELECT * FROM table_menu";
            
            //execute the query
            $res = mysqli_query($conn, $sql);

            //count rows to calculate 
            $count = mysqli_num_rows($res);

            //create serial number
            $sn=1;

            if($count>0)
            {
              //we have menu 
              //get the foods from databse and display
              while($row=mysqli_fetch_assoc($res))
              {
                //get the value
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $image_name = $row['image_name'];
                $featured = $row['featured'];
                $active = $row['active'];
                ?>
                <tr>
              <td><?php echo $sn++; ?></td>
              <td><?php echo $title; ?></td>
              <td><?php echo $price; ?></td>
              <td>
                <?php 
                //check have image or not 
                if($image_name=="")
                {
                  echo "<div class='error'> Image not added </div>";
                }
                else
                {
                  ?>
                  <img src="<?php echo SITEURL; ?>images/menu/<?php echo $image_name; ?>" width="100px">
                  <?php
                }
                ?>
              </td>
              <td><?php echo $featured; ?></td>
              <td><?php echo $active; ?></td>
              <td>
              <a href="#" class="btn-secondary"> Update help</a>
              <a href="#" class="btn-danger">Delete help </a>
              </td>
            </tr>
          

                <?php

              }

            }
            else
            {
              //dont have menu
              echo "<tr><td colspan='7' class='error'> Food not added</td> </tr>";
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
