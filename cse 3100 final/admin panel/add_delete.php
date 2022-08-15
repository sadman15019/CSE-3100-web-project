<?php
include 'database_connection.php';
session_start();
if (isset($_SESSION['id'])) {
  if (isset($_POST['add_product']) && isset($_FILES['product_image'])) {
    $product_category = $_POST['category'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
    $product_image_folder = 'uploaded_image/' . $product_image;
    $img_size = $_FILES['product_image']['size'];
    $error = $_FILES['product_image']['error'];
    if (empty($product_price) || empty($product_name) || empty($product_image)) {
      echo 'please fill out all the fields';
    } else if (strcmp($product_category, "Default") == 0) {
      echo 'please select a category';
    } else {
      if ($product_category == "Masterbed") {
        $id = 0;
        $sql = "SELECT id from masterbed_product";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $id = $row["id"];
          }
        }
        $id = $id + 1;
        $insert = "insert into masterbed_product(id,name,price,image,category) values ($id,'$product_name',$product_price,'$product_image','masterbed_product')";
        $upload = mysqli_query($connection, $insert);
      } else if ($product_category == "Drawing") {
        $id = 100;
        $sql = "SELECT id from drawing_product";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $id = $row["id"];
          }
        }
        $id = $id + 1;
        $insert = "insert into drawing_product(id,name,price,image,category) values ($id,'$product_name',$product_price,'$product_image','drawing_product')";
        $upload = mysqli_query($connection, $insert);
      } else if ($product_category == "Dining") {
        $id = 200;
        $sql = "SELECT id from dining_product";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $id = $row["id"];
          }
        }
        $id = $id + 1;
        $insert = "insert into dining_product(id,name,price,image,category) values ($id,'$product_name',$product_price,'$product_image','dining_product')";
        $upload = mysqli_query($connection, $insert);
      } else if ($product_category == "Kitchen") {
        $id = 300;
        $sql = "SELECT id from kitchen_product";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $id = $row["id"];
          }
        }
        $id = $id + 1;
        $insert = "insert into kitchen_product(id,name,price,image,category) values ($id,'$product_name',$product_price,'$product_image','kitchen_product')";
        $upload = mysqli_query($connection, $insert);
      }
    }
  }
  if (isset($_GET['deletebed'])) {
    $id = $_GET['deletebed'];
    mysqli_query($connection, "DELETE FROM masterbed_product WHERE id = $id");
    header('location:add_delete.php');
  }
  if (isset($_GET['deletedining'])) {
    $id = $_GET['deletedining'];
    mysqli_query($connection, "DELETE FROM dining_product WHERE id = $id");
    header('location:add_delete.php');
  }
  if (isset($_GET['deletedrawing'])) {
    $id = $_GET['deletedrawing'];
    mysqli_query($connection, "DELETE FROM drawing_product WHERE id = $id");
    header('location:add_delete.php');
  }
  if (isset($_GET['deletebed'])) {
    $id = $_GET['deletekitchen'];
    mysqli_query($connection, "DELETE FROM kitchen_product WHERE id = $id");
    header('location:add_delete.php');
  }
}
else
{
  header('location:login/adminlogin.php');
}
?>





<!DOCTYPE html>

<head>
  <link rel="stylesheet" href="css/adminpanel.css">
  <script type="text/javascript" src="js/adminpanel.js"></script>
    <script>
      if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
      }
  </script>
</head>

<body>
  <h6 style="font-size: xx-large; text-align:center; padding-top:0px;">Admin Panel</h6>
  <a style="margin-left:1400px;color:black;font-size:20px;" href="adminlogout.php">Logout</a>
  <p style="font-size: xx-large; text-align:center; padding-top:50px;">Add Product</p>
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

  <div id="delhead">
    <p style="font-size: xx-large; text-align:center;">Delete/Update Product</p>
  </div>


  <section id="MasterBed_product">
    <div id="delhead">
      <h6 style="font-size: xx-large; text-align:center; color:red;"><u>MasterBed</u></h6>
    </div>
    <div id="masterbedcontainer" class="container2">
      <?php while ($row = mysqli_fetch_assoc($select1)) { ?>
        <div class="product">
          <img src="uploaded_image/<?php echo $row['image']; ?>" height="100" alt="abc">
          <div class="description">
          <h6 style="font-size: 17.5px;font-family:Poppins', sans-serif;"><?php echo $row['name']; ?></h6>
          <h4 style="font-size: 17.5px;font-family:Poppins', sans-serif;"><?php echo "$" . $row['price']; ?></h4>
            <a style="margin-top:0px;  display: block;width: 320px;cursor: pointer;border-radius: .5rem;font-size: 30px;background: var(--green);background-color: rgb(57, 48, 46);color:var(--white);text-align: center;text-decoration: none;height: 35px;	background: transparent;border: 1px solid black;border-radius: 2px;	color: black;font-family: 'Exo', sans-serif;font-size: 16px;font-weight: 400;	padding: 8px;" href="add_delete.php?deletebed=<?php echo $row['id']; ?>" class="btn"> delete </a>  
            <?php $a1 = "masterbed_product"; ?>
            <br>
            <a style="margin-top:0px;  display: block;width: 320px;cursor: pointer;border-radius: .5rem;font-size: 30px;background: var(--green);background-color: rgb(57, 48, 46);color:var(--white);text-align: center;text-decoration: none;height: 35px;	background: transparent;border: 1px solid black;border-radius: 2px;	color: black;font-family: 'Exo', sans-serif;font-size: 16px;font-weight: 400;	padding: 8px;" href="update.php?edit=<?php echo $row['id']; ?> & edit2=<?php echo $a1; ?>" class="btn"> edit </a>
          </div>
        </div>
      <?php } ?>
    </div>
  </section>


  <section id="MasterBed_product">
    <div id="delhead">
      <h6 style="font-size: xx-large; text-align:center; color:red;"><u>Drawing Room</u></h6>
    </div>

    <div id="masterbedcontainer" class="container2">
      <?php while ($row = mysqli_fetch_assoc($select2)) { ?>
        <div class="product">
          <img src="uploaded_image/<?php echo $row['image']; ?>" height="100" alt="abc">
          <div class="description">
          <h6 style="font-size: 17.5px;font-family:Poppins', sans-serif;"><?php echo  $row['name']; ?></h6>
          <h4 style="font-size: 17.5px;font-family:Poppins', sans-serif;"><?php echo "$" . $row['price']; ?></h4>
            <a style="margin-top:0px;  display: block;width: 320px;cursor: pointer;border-radius: .5rem;font-size: 30px;background: var(--green);background-color: rgb(57, 48, 46);color:var(--white);text-align: center;text-decoration: none;height: 35px;	background: transparent;border: 1px solid black;border-radius: 2px;	color: black;font-family: 'Exo', sans-serif;font-size: 16px;font-weight: 400;	padding: 8px;" href="add_delete.php?deletedrawing=<?php echo $row['id']; ?>" class="btn"> delete </a>
            <?php $a1 = "drawing_product"; ?>
            <br>
            <a style="margin-top:0px;  display: block;width: 320px;cursor: pointer;border-radius: .5rem;font-size: 30px;background: var(--green);background-color: rgb(57, 48, 46);color:var(--white);text-align: center;text-decoration: none;height: 35px;	background: transparent;border: 1px solid black;border-radius: 2px;	color: black;font-family: 'Exo', sans-serif;font-size: 16px;font-weight: 400;	padding: 8px;" href="update.php?edit=<?php echo $row['id']; ?> & edit2=<?php echo $a1; ?>" class="btn"> edit </a>
          </div>
        </div>
      <?php } ?>
    </div>
  </section>


  <section id="MasterBed_product">
    <div id="delhead">
      <h6 style="font-size: xx-large; text-align:center; color:red;"><u>Dining Room</u></h6>
    </div>
    <div id="masterbedcontainer" class="container2">
      <?php while ($row = mysqli_fetch_assoc($select3)) { ?>
        <div class="product">
          <img src="uploaded_image/<?php echo $row['image']; ?>" height="100" alt="abc">
          <div class="description">
          <h6 style="font-size: 17.5px;font-family:Poppins', sans-serif;"><?php echo  $row['name']; ?></h6>
          <h4 style="font-size: 17.5px;font-family:Poppins', sans-serif;"><?php echo "$" . $row['price']; ?></h4>
            <a style="margin-top:0px;  display: block;width: 320px;cursor: pointer;border-radius: .5rem;font-size: 30px;background: var(--green);background-color: rgb(57, 48, 46);color:var(--white);text-align: center;text-decoration: none;height: 35px;	background: transparent;border: 1px solid black;border-radius: 2px;	color: black;font-family: 'Exo', sans-serif;font-size: 16px;font-weight: 400;	padding: 8px;" href="add_delete.php?deletedining=<?php echo $row['id']; ?>" class="btn"> delete </a>
            <?php $a1 = "dining_product"; ?>
            <br>
            <a style="margin-top:0px;  display: block;width: 320px;cursor: pointer;border-radius: .5rem;font-size: 30px;background: var(--green);background-color: rgb(57, 48, 46);color:var(--white);text-align: center;text-decoration: none;height: 35px;	background: transparent;border: 1px solid black;border-radius: 2px;	color: black;font-family: 'Exo', sans-serif;font-size: 16px;font-weight: 400;	padding: 8px;" href="update.php?edit=<?php echo $row['id']; ?> & edit2=<?php echo $a1; ?>" class="btn"> edit </a>
          </div>
        </div>
      <?php } ?>
    </div>
  </section>

  <section id="MasterBed_product">
    <div id="delhead">
      <h6 style="font-size: xx-large; text-align:center; color:red;"><u>Kitchen</u></h6>
    </div>
    <div id="masterbedcontainer" class="container2">
      <?php while ($row = mysqli_fetch_assoc($select4)) { ?>
        <div class="product">
          <img src="uploaded_image/<?php echo $row['image']; ?>" height="100" alt="abc">
          <div class="description">
          <h6 style="font-size: 17.5px;font-family:Poppins', sans-serif;"><?php echo  $row['name']; ?></h6>
          <h4 style="font-size: 17.5px;font-family:Poppins', sans-serif;"><?php echo "$" . $row['price']; ?></h4>
            <a style="margin-top:0px;  display: block;width: 320px;cursor: pointer;border-radius: .5rem;font-size: 30px;background: var(--green);background-color: rgb(57, 48, 46);color:var(--white);text-align: center;text-decoration: none;height: 35px;	background: transparent;border: 1px solid black;border-radius: 2px;	color: black;font-family: 'Exo', sans-serif;font-size: 16px;font-weight: 400;	padding: 8px;" href="add_delete.php?deletekitchen=<?php echo $row['id']; ?>" class="btn"> delete </a>
            <?php $a1 = "kitchen_product"; ?>
            <br>
            <a style="margin-top:0px;  display: block;width: 320px;cursor: pointer;border-radius: .5rem;font-size: 30px;background: var(--green);background-color: rgb(57, 48, 46);color:var(--white);text-align: center;text-decoration: none;height: 35px;	background: transparent;border: 1px solid black;border-radius: 2px;	color: black;font-family: 'Exo', sans-serif;font-size: 16px;font-weight: 400;	padding: 8px;" href="update.php?edit=<?php echo $row['id']; ?> & edit2=<?php echo $a1; ?>" class="btn"> edit </a>
          </div>
        </div>
      <?php } ?>
    </div>
  </section>
</body>

</html>