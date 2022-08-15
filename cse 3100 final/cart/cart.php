<?php
session_start();
$connection = mysqli_connect('localhost', 'root', '', 'sweet home');
if (isset($_GET['checkout'])) {
    $cnt1 = $cnt2 = $cnt3 = $cnt4 = 0;
    $select1 = mysqli_query($connection, "SELECT * FROM cart");
    while ($row = mysqli_fetch_assoc($select1)) {
        $i1=$row['id'];
        $p=$row['price'];
        $i2=$_SESSION['id'];
        $insert = "insert into usershopping(user_id,product_id,price) values ($i2,$i1,$p)";
        $upload = mysqli_query($connection, $insert);
        if ($row['category'] == "masterbed_product") {
            $cnt1++;
        } else if ($row['category'] == "dining_product") {
            $cnt2++;
        } else  if ($row['category'] == "drawing_product") {
            $cnt3++;
        } else {
            $cnt4++;
        }
    }

    $arr = array($cnt1, $cnt2, $cnt3, $cnt4);
    rsort($arr);
    if ($arr[0] == $cnt1) {
        $category = "masterbed_product";
        if (isset($_COOKIE['category'])) {
            setcookie('category', '', time() - 10);
        }
        echo "a";
        setcookie('category', $category, time() + 60 * 60 * 7, "/");
    } else if ($arr[0] == $cnt2) {
        $category = "dining_product";
        if (isset($_COOKIE['category'])) {
            setcookie('category', '', time() - 10);
        }
        echo "b";
        setcookie('category', $category, time() + 60 * 60 * 7, "/");
    } else if ($arr[0] == $cnt3) {
        $category = "drawing_product";
        if (isset($_COOKIE['category'])) {
            setcookie('category', '', time() - 10);
        }
        echo "c";
        setcookie('category', $category, time() + 60 * 60 * 7, "/");
    } else {
        $category = "kitchen_product";
        if (isset($_COOKIE['category'])) {
            setcookie('category', '', time() - 10);
        }
        echo "d";
        setcookie('category', $category, time() + 60 * 60 * 7, "/");
    }
    $sql = "delete from cart";
    $result = $connection->query($sql);
    header('location:checkout.php');
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($connection, "DELETE FROM cart WHERE id = $id");
    header('location:cart.php');
}
?>

<!DOCTYPE html>

<html>

<head>

    <title>Shopping Cart</title>

    <link rel="stylesheet" type="text/css" href="cart.css">

    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>



    <div class="container">

        <h1>Shopping Cart</h1>

        <div class="cart">

            <div class="products">
                <?php
                $cnt = 0;
                $total = 0;
                $select1 = mysqli_query($connection, "SELECT * FROM cart");
                while ($row = mysqli_fetch_assoc($select1)) {
                    $cnt = $cnt + $row['quantity'];
                    $total = $total + ($row['price'] * $row['quantity']); ?>

                    <div class="product">

                        <img src="images/<?php echo $row['image']; ?>">
                        <div class="product-info">

                            <h3 class="product-name"><?php echo $row['name']; ?></h3>

                            <h4 class="product-price"><?php echo "$" . $row['price']; ?></h4>

                            <h4 class="product-price">quantity : <?php echo $row['quantity']; ?></h4>

                            <?php /*   <p class="product-quantity"><?php echo $row['quantity']; ?></p>*/ ?>

                            <a class="product-remove">


                                <a style=" height: 40px;
                                text-decoration:none;
  font-family: 'Nunito', sans-serif;
  width:200px;
  font-size: 14px;
  text-transform: uppercase;
  letter-spacing: 1.3px;
  font-weight: 700;
  color: white;
  background: #231828;
background: linear-gradient(90deg, #231828 0%,  #231828 100%);
  border: none;
  border-radius: 5px;
 /* box-shadow: 12px 12px 24px #231828;*/
  transition: all 0.3s ease-in-out 0s;
  cursor: pointer;
  outline: none;
  position: relative;
  padding: 10px;
  margin-top: 35px;
  margin-left: 400px;" href="cart.php?delete=<?php echo $row['id']; ?>" class="btn"> delete </a>

                            </a>
                        </div>
                    </div>
                <?php } ?>

            </div>

        </div>

        <div class="cart-total">

            <p>

                <span>Total Price</span>

                <span><?php echo $total; ?></span>

            </p>

            <p>

                <span>Number of Items</span>

                <span><?php echo $cnt ?></span>

            </p>


            <a href="cart.php?checkout=1">Proceed to Checkout</a>

        </div>

    </div>

    </div>



</body>


</html>