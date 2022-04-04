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
          <h1> Manage Category </h1>
          <br />
          <br />
          <?php
    if(isset($_SESSION['add']))
    {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }
     ?>
     <br> <br>
          <!--button for add admin -->
          <a href="<?php echo SITEURL?>admin/add-category.php" class="btn-primary btn-primary:hover"> Add Category </a>
          <br />
          <br />
          <table class="tbl-full">
            <tr>
              <th>S.N.</th>
              <th>Title</th>
              <th>Image</th>
              <th>Featured</th>
              <th>Active</th>
              <th>Actions</th>
            </tr>
            <?php 
            //query to get all category from database
            $sql= "SELECT * FROM table_category";
            //execute query
            $res= mysqli_query($conn, $sql);
            //count the rows
            $count = mysqli_num_rows($res);

            //create serial number variable and assign it
            $sn=1;
            //check if we have data in database
            if($count>0)
            {
              //have data in database
              //get data and display
              while($row=mysqli_fetch_assoc($res)){
                $id= $row['id'];
                $title= $row['title'];
                $image_name= $row['image_name'];
                $featured= $row['featured'];
                $active= $row['active'];
                ?>

              <tr>
              <td><?php echo $sn++ ?> </td>
              <td><?php echo $title ?></td>
              <td>
                <?php 
                  if($image_name!="")
                  {
                    ?>
                    <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width="100px">
                    <?php
                  }
                  else{
                    echo "<div class='error'> Image not added </div>";
                  }
                ?>
              </td>

              <td><?php echo $featured ?></td>
              <td><?php echo $active ?></td>
              <td>
              <a href="#" class="btn-secondary"> Update Category </a>
              <a href="#" class="btn-danger">Delete Category </a>
              </td>

            </tr>
                <?php 

              }
            }
            else {
              //don't have data
              ?>
              <tr>
                <td colspan="6">
                  <div class="error"> No Category added </div>
                </td>
              </tr>
              <?php 

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
