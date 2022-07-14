<?php
include 'database_connection.php';
if(isset($_POST['add_product']) && isset($_FILES['product_image'])){
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
  $id=0;
  $sql = "SELECT id from masterbed_product";
  $result = $connection->query($sql);
  
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $id=$row["id"];
    }
  }
    $id=$id+1;
 $insert="insert into masterbed_product(id,name,price,image) values ($id,'$product_name','$product_price','$product_image')";
 $upload=mysqli_query($connection,$insert);
}
else if($product_category=="Drawing"){
    $id=0;
    $sql = "SELECT id from drawing_product";
    $result = $connection->query($sql);
    
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $id=$row["id"];
      }
    }
      $id=$id+1;
   $insert="insert into drawing_product(id,name,price,image) values ($id,'$product_name','$product_price','$product_image')";
   $upload=mysqli_query($connection,$insert);
  }
  else if($product_category=="Dining"){
    $id=0;
    $sql = "SELECT id from dining_product";
    $result = $connection->query($sql);
    
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $id=$row["id"];
      }
    }
      $id=$id+1;
   $insert="insert into dining_product(id,name,price,image) values ($id,'$product_name','$product_price','$product_image')";
   $upload=mysqli_query($connection,$insert);
  }
  else if($product_category=="Kitchen"){
    $id=0;
    $sql = "SELECT id from kitchen_product";
    $result = $connection->query($sql);
    
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $id=$row["id"];
      }
    }
      $id=$id+1;
   $insert="insert into kitchen_product(id,name,price,image) values ($id,'$product_name','$product_price','$product_image')";
   $upload=mysqli_query($connection,$insert);
  }
}
}
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($connection, "DELETE FROM masterbed_product WHERE id = $id");
    header('location:abc.php');
 }
?>





<!DOCTYPE html>

<head>
  <link rel="stylesheet" href="css/adminpanel.css">
  <script type="text/javascript" src="js/adminpanel.js">
  <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );}
</script>
</head>

<body>
<h6 style="font-size: xx-large; text-align:center; padding-top:50px;">Add Product</h6>
<br>
  <div class="container1">
    <div class="admin-product-form-container">
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">

        <div id="dropdown1">
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
        <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="addform" required>
        <input type="text" placeholder="enter product name" name="product_name" class="addform" required>
        <input type="text" placeholder="enter product price" name="product_price" class="addform" required>
        <input type="submit" class="btn" name="add_product" value="add_product">
      </form>
    </div>
  </div>
  <?php
  $select1 = mysqli_query($connection, "SELECT * FROM masterbed_product");
  $select2 = mysqli_query($connection, "SELECT * FROM drawing_product");
  $select3 = mysqli_query($connection, "SELECT * FROM dining_product");
  $select4 = mysqli_query($connection, "SELECT * FROM kitchen_product");
  ?>
  
  <div id="delhead"><h6 style="font-size: xx-large; text-align:center;">Delete/Update Product</h6></div>


  <section id="MasterBed_product">
  <div id="delhead"><h6 style="font-size: xx-large; text-align:center; color:red;"><u>MasterBed</u></h6></div>
    <div id="masterbedcontainer" class="container2">
      <?php while($row = mysqli_fetch_assoc($select1)){ ?>
      <div class="product">
        <img src="uploaded_image/<?php echo $row['image']; ?>" height="100" alt="abc">
        <div class="description">
          <h6><?php echo $row['name']; ?></h6>
          <h4><?php echo $row['price']; ?></h4>
          <a href="abc.php?delete=<?php echo $row['id']; ?>" class="btn"> delete </a>
          <a href="abcd.php?edit=<?php echo $row['id']; ?>" class="btn"> edit </a>
        </div>
      </div>
      <?php } ?>
    </div>
  </section>

  
  <section id="MasterBed_product">
  <div id="delhead"><h6 style="font-size: xx-large; text-align:center; color:red;"><u>Drawing Room</u></h6></div>
  
    <div id="masterbedcontainer" class="container2">
      <?php while($row = mysqli_fetch_assoc($select2)){ ?>
      <div class="product">
        <img src="uploaded_image/<?php echo $row['image']; ?>" height="100" alt="abc">
        <div class="description">
          <h6><?php echo $row['name']; ?></h6>
          <h4><?php echo $row['price']; ?></h4>
          <a href="add.php?delete=<?php echo $row['id']; ?>" class="btn"> delete </a>
          <a href="abcd.php?edit=<?php echo $row['id']; ?>" class="btn"> edit </a>
        </div>
      </div>
      <?php } ?>
    </div>
  </section>


  <section id="MasterBed_product">
  <div id="delhead"><h6 style="font-size: xx-large; text-align:center; color:red;"><u>Dining Room</u></h6></div>
    <div id="masterbedcontainer" class="container2">
      <?php while($row = mysqli_fetch_assoc($select3)){ ?>
      <div class="product">
        <img src="uploaded_image/<?php echo $row['image']; ?>" height="100" alt="abc">
        <div class="description">
          <h6><?php echo $row['name']; ?></h6>
          <h4><?php echo $row['price']; ?></h4>
          <a href="abc.php?delete=<?php echo $row['id']; ?>" class="btn"> delete </a>
          <a href="abcd.php?edit=<?php echo $row['id']; ?>" class="btn"> edit </a>
        </div>
      </div>
      <?php } ?>
    </div>
  </section>

  <section id="MasterBed_product">
  <div id="delhead"><h6 style="font-size: xx-large; text-align:center; color:red;"><u>Kitchen</u></h6></div>
    <div id="masterbedcontainer" class="container2">
      <?php while($row = mysqli_fetch_assoc($select4)){ ?>
      <div class="product">
        <img src="uploaded_image/<?php echo $row['image']; ?>" height="100" alt="abc">
        <div class="description">
          <h6><?php echo $row['name']; ?></h6>
          <h4><?php echo $row['price']; ?></h4>
          <a href="abc.php?delete=<?php echo $row['id']; ?>" class="btn"> delete </a>
          <a href="abcd.php?edit=<?php echo $row['id']; ?>" class="btn"> edit </a>
        </div>
      </div>
      <?php } ?>
    </div>
  </section>
</body>

</html>