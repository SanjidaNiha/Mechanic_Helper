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
<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br> <br>
        <?php 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full name</td>
                    <td><input type="text" name="full_name" placeholder="Enter your name"></td>
                </tr>
                <tr>
                    <td>User name</td>
                    <td><input type="text" name="username" placeholder="Your username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" placeholder="Enter password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
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
<?php
   
    //process the value from form and save it to database
    //check whether the submit button is clicked or not 
    if (empty($_POST['name']))
    {
        $errors['name'] ='Name Required';
    }
    if(isset($_POST['submit']))
    {
        //button clicked
        //1.get the data from form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //password encryption with md5
        //2.SQl Query to save the data
        $sql = "INSERT INTO table_admin SET
            full_name='$full_name',
            username='$username',
            password='$password'
        ";
       
        //3.executing query and saving data in database
       $res = mysqli_query($conn,$sql) or die(mysqli_connect_error());
       //4.check wheather the data inserted or not and dispaly message
       if($res==true)
       {
           //create session variable to display message 
           $_SESSION['add'] ="Admin added successfully";
           //Redirect page
           header("location:".'http://localhost/MH-website/'.'admin/manage-admin.php');
       }
       else{
            //create session variable to display message 
            $_SESSION['add'] ="Failed to add Admin";
            //Redirect page
            header("location:".'http://localhost/MH-website/'.'admin/add-admin.php');
       }
    }
   
?>