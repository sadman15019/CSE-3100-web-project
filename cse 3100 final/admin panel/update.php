<?php
include 'database_connection.php';
$id = $_GET['edit'];
if(isset($_POST['update_product']) && isset($_FILES['product_image'])){
$product_category=$_POST['category'];
$product_name=$_POST['product_name'];
$t1=$_POST['product_price'];
$t2="$";
$product_price=$t2.$t1;
$product_image=$_FILES['product_image']['name'];
$product_image_tmp_name=$_FILES['product_image']['tmp_name'];
$product_image_folder='uploaded_image/'.$product_image;
$img_size=$_FILES['product_image']['size'];
$error=$_FILES['product_image']['error'];
if(empty($product_price) || empty($product_name) || empty($product_image))
{
  echo 'please fill out all the fields';
}
else if(strcmp($product_category,"Default")==0)
{
    echo 'please select a category';
}
else
{
    if($product_category=="Masterbed"){
 $insert="UPDATE masterbed_product SET name='$product_name', price='$product_price', image='$product_image'  WHERE id = '$id'";
 $upload=mysqli_query($connection,$insert);
 header('location:abc.php');
}
else if($product_category=="Drawing"){
    $insert="UPDATE drawing_product SET name='$product_name', price='$product_price', image='$product_image'  WHERE id = '$id'";
    $upload=mysqli_query($connection,$insert);
    header('location:abc.php');
  }
  else if($product_category=="Dining"){
    $insert="UPDATE dining_product SET name='$product_name', price='$product_price', image='$product_image'  WHERE id = '$id'";
    $upload=mysqli_query($connection,$insert);
    header('location:abc.php');
  }
  else if($product_category=="Kitchen"){
    $insert="UPDATE kitchen_product SET name='$product_name', price='$product_price', image='$product_image'  WHERE id = '$id'";
 $upload=mysqli_query($connection,$insert);
 header('location:abc.php');
  }
}
}?>



<!DOCTYPE html>

<head>
  <link rel="stylesheet" href="css/adminpanel.css">
  <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</head>

<body>
<h6 style="font-size: xx-large; text-align:center; padding-top:50px;">Edit Product Info</h6>
<br>
  <div class="container1">
    <div class="admin-product-form-container">
    <?php
      
      $select = mysqli_query($connection, "SELECT * FROM masterbed_product WHERE id = '$id'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
   
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">

        <div class="dropdown">
          <label for="category-name" id="label">Choose a category:</label>
          <select name="category" id="category">
            <option value="Default">Default</option>
            <option value="Masterbed">Masterbed</option>
            <option value="Drawing">Drawing</option>
            <option value="Dining">Dining</option>
            <option value="Kitchen">Kitchen</option>
          </select>
        </div>
        <br>
        <input type="file" placeholder="<?php echo $row['image']; ?>"  accept="image/png, image/jpeg, image/jpg" name="product_image" class="addform" required>
        <input type="text" placeholder="<?php echo $row['name']; ?>"  name="product_name" class="addform" required>
        <input type="text" placeholder="<?php echo $row['price']; ?>"  name="product_price" class="addform" required>
        <input type="submit" class="btn" name="update_product" value="update_product">
      </form>
      
   <?php }; ?>
    </div>
  </div>

</html>