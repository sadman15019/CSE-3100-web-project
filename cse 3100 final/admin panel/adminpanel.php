<?php
include 'database_connection.php';
if(isset($_POST['add_product']) && isset($_FILES['product_image'])){
$product_name=$_POST['product_name'];
$product_price=$_POST['product_price'];
$product_image=$_FILES['product_image']['name'];
$product_image_tmp_name=$_FILES['product_image']['tmp_name'];
$product_img_folder='uploaded_img/'.$product_image;
$img_size=$_FILES['product_image']['size'];
$error=$_FILES['product_image']['error'];

if(empty($product_price) || empty($product_name) || empty($product_image))
{
  echo 'please fill out all the fields';
}
else
{
  $id=0;
  $sql = "SELECT id from masterbed_product";
  $result = $connection->query($sql);
  
  if ($result->num_rows > 0) {
    echo "asd";
    while($row = $result->fetch_assoc()) {
      $id=$row["id"];
    }
  }
    $id=$id+1;
 $insert="insert into masterbed_product(id,name,price,image) values ($id,'$product_name','$product_price','$product_image')";
 $upload=mysqli_query($connection,$insert);
}
}
?>

