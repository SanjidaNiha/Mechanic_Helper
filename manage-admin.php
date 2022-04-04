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
          <h1> Manage Admin </h1>
          <br>
          <?php
            if(isset($_SESSION['add']))
            {
              echo $_SESSION['add'];
              unset($_SESSION['add']); //removing session message
            }
           ?>
           <br>
          <!--button for add admin -->
          <a href="add-admin.php" class="btn-primary btn-primary:hover"> Add Admin </a>
          <br />
          <br />
          <table class="tbl-full">
            <tr>
              <th>S.N.</th>
              <th>Full Name</th>
              <th>Username</th>
              <th>Actions</th>
            </tr>
            <?php 
            //query to get all admin
              $sql = "SELECT * FROM table_admin";
            //excute the query
            $res = mysqli_query($conn,$sql);
            //check query is excute
            if($res==TRUE)
            {
              //count rows 
              $count = mysqli_num_rows($res);
              $sn=1; //create a variable
              //check num of rows 
              if($count>0){
                //have data in database
                while($rows=mysqli_fetch_assoc($res))
                {
                  $id=$rows['id'];
                  $full_name=$rows['full_name'];
                  $username=$rows['username'];
                  ?>
                  <tr>
              <td><?php echo $sn++ ?> </td>
              <td><?php echo $full_name; ?> </td>
              <td><?php echo $username ?></td>
              <td>
              <a href="#" class="btn-secondary"> Update Admin </a>
              <a href="#" class="btn-danger">Delete Admin </a>
              </td>
            </tr>
                  
                  <?php
                  
                }
              }
              else
              {
                //don't have data in database
              }
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
