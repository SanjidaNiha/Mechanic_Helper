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
<!-- main content starts here -->
<div class="main-content">
    <div class="wrapper">
    <h1> Add Category</h1>
    <br> <br>
    <?php
    if(isset($_SESSION['add']))
    {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }
    if(isset($_SESSION['upload']))
    {
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
    }
     ?>
<br><br>
    <!-- add category form starts here -->
    <form action="" method="POST" enctype="multipart/form-data">
        <table class="tbl-30">
        <tr>
            <td>
                Title:
            </td>
            <td>
                <input type="text" name="title" placeholder="Category title">
            </td>
        </tr>
        <tr>
            <td>
                Select Image:
            </td>
            <td>
                <input type="file" name="image">
            </td>
        </tr>
        <tr>
            <td>
               Featured:
            </td>
            <td>
                <input type="radio" name="featured" value="yes">Yes
                <input type="radio" name="featured" value="No">No
            </td>
        </tr>
        <tr>
            <td>
               Active:
            </td>
            <td>
                <input type="radio" name="active" value="yes">Yes
                <input type="radio" name="active" value="No">No
            </td>
        </tr>
        <tr>
            <td colspan="2">
            <input type="submit" name="submit" value="Add category" class="btn-secondary">
            </td>
        </tr>
        </table>
    </form>
     <!-- add category form ends here -->
     <?php
        //check the submit button is clicked or not
        if(isset($_POST['submit']))
        {
            //echo "clicked";
            //1.get the value from category form 
            $title =$_POST['title'];
            //radio input is selected or not 
            if(isset($_POST['featured']))
            {
                $featured= $_POST['featured'];
            }
            //set the default value 
            else{
                $featured= "No";
            }
            //radio input is selected or not 
            if(isset($_POST['active']))
            {
                $active= $_POST['active'];
            }
            //set the default value 
            else{
                $active= "No";
            }
            //check if image is selected or not and set the value
            //print_r($_FILES['image']);
            //die(); //break the code here

            if(isset($_FILES['image']['name'])){
                //upload the image
                //we need source path and destination path 
                $image_name =$_FILES['image']['name'];
                
                $source_path =$_FILES['image']['tmp_name'];
                $destination_path="../images/category/".$image_name;

                //finally upload the iamge 
                $upload= move_uploaded_file($source_path, $destination_path);

                //check if image is uploaded
                //if not uploaded then redirecting with error message 
                if($upload==false){
                    $_SESSION['upload'] ="<div class='error'> Failed to upload </div>";   
                //redirect to add category
                header('location:'.SITEURL.'admin/add-category.php');
                //stop the process
                die();
                 }
            }
            else{
             //don't uplaod the image and set the image_value as blank
                $image_name="";
            }
            //2.create sql to insert category into database
            $sql="INSERT INTO table_category SET
            title='$title',
            image_name= '$image_name',
            featured='$featured',
            active='$active'
            ";
            //3.execute the sql query and save in database
            $res= mysqli_query($conn, $sql);
            //4.check if the query executed or not and data added or not 
            if($res==true){
                //query added and category added 
                $_SESSION['add']="<div class='success'> Category added successfully </div>";
                //redirect to manage category page 
                header('location:'.SITEURL.'admin/manage-category.php');

            }
            else{
                //failed to add query
                $_SESSION['add']="<div class='error'> Category not added </div>";
                //redirect to manage category page 
                header('location:'.SITEURL.'admin/add-category.php');

            }
        }
      ?>
    </div>
</div>
<!-- main content ends here -->

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