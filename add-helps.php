<?php 

?>
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
    <h1>Add Helps</h1>
    <br> <br>
    <?php 
    if(isset($_SESSION['upload']))
    {
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
    }
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <table class="tbl-30">
        <tr>
            <td>
                Title:

            </td>
            <td>
                <input type="text" name="title" placeholder="Title of the help">
            </td>
        </tr>
        <tr>
            <td>
               Description:
            </td>
            <td>
                <textarea name="description" cols="30" rows="5" placeholder="Description of Help."></textarea>
            </td>
        </tr>
        <tr>
            <td>Price:</td>
            <td>
                <input type="number" name="price">
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
            <td>Category:</td>
            <td>
                <select name="category">
            <?php 
            //create php code to display categories 
            //1.all active categories from database
                $sql = "SELECT * FROM table_category WHERE active='yes'";

                //excuting query
                $res = mysqli_query($conn, $sql);

                //count rows to check whether we have categories 
                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    //we have categories
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //get the details of categories
                        $id = $row['id'];
                        $title = $row['title'];
                        ?>

                         <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

                        <?php
                    }
                }
                else
                {
                    //we dont have categories
                    ?>
                    <option value="0">No Categories Found</option>
                    <?php
                }



            //2.Display on dropdown 
            ?>

               
                </select>
            </td>
        </tr>
        <tr>
            <td>Featured</td>
            <td>
                <input type="radio" name="featured" value="yes"> Yes
                <input type="radio" name="featured" value="No"> No
            </td>
        </tr>
        <tr>
            <td>Active</td>
            <td>
                <input type="radio" name="Active" value="yes"> Yes
                <input type="radio" name="Active" value="No"> No
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="submit" value="Add Help" class="btn-secondary">
            </td>
        </tr>
        </table>
    </form>
    <?php 
    //check if submit button is clicked or not 
    if(isset($_POST['submit']))
    {
        //add the help
        //echo "clicked";
        //1.get the data from form
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category = $_POST['category'];

        //check radio button is clicked or not 
        if(isset($_POST['featured']))
        {
            $featured = $_POST['featured'];
        }
        else 
        {
            $featured ="No"; //setting default value 
        }
        if(isset($_POST['active']))
        {
            $active = $_POST['active'];
        }
        else 
        {
            $active ="No"; //setting default value 
        }
        
        //2.upload the image if selected
        //check if the select image is clicked or not 
        if(isset($_FILES['image']['name']))
        {
            //get the details of image 
            $image_name = $_FILES['image']['name'];

            //check if the image is selected and upload if selected 
            if($image_name!="")
            {
                //image is selected
                //1.rename image 
                //get the extention 
                $ext = end(explode(',', $image_name));

                //create a new image name 
                $image_name = "Help-name-".rand(0000,9999).".".$ext;

                //2.upload the image 
                //get the source path and destination path
                $src=$_FILES['image']['tmp_name'];

                $dst = "../images/menu/".$image_name;

                //upload
                $upload = move_uploaded_file($src, $dst);

                //check uploaded or not 
                if($upload==false)
                {
                    //failed to uplaod image
                    $_SESSION['upload'] = "<div class='error'>Failed to upload</div>";
                    header('location:'.SITEURL.'admin/add-helps.php');

                    die();
                }
            }
        }
        else 
        {
            $image_name = ""; //setting default button is blank 
        }


        //3.insert into database
        //create sql query
        $sql2 = "INSERT INTO table_menu SET
        title = '$title',
        description = '$description',
        price = $price,
        image_name = '$image_name',
        category_id = $category,
        featured = '$featured',
        active = '$active'
        ";
    //execute the query
    $res2 = mysqli_query($conn, $sql2);

    //check inserted or not 
    if($res2 == true)
    {
        //data inserted
        $_SESSON['add'] = "<div class='success'>HElp added </div>";
        header('location:'.SITEURL.'admin/manage-help.php');
    }
    else
    {
        //failed to insert
        $_SESSON['add'] = "<div class='error'>HElp not added </div>";
        header('location:'.SITEURL.'admin/manage-help.php');
    }
    
        //4.redirect with message 


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