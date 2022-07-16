<?php
session_start();
$connection = mysqli_connect('localhost', 'root', '', 'sweet home');
if(isset($_GET['delete'])){
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
                $cnt=0;
                $total=0;
                $select1 = mysqli_query($connection, "SELECT * FROM cart");
                while ($row = mysqli_fetch_assoc($select1)) { $cnt=$cnt+1; $total=$total+$row['price'];?>

                    <div class="product">

                        <img src="cse 3100 final/images/<?php echo $row['image']; ?>">
                        <div class="product-info">

                            <h3 class="product-name"><?php echo $row['name']; ?></h3>

                            <h4 class="product-price"><?php echo "$".$row['price']; ?></h4>

                        <?php /*   <p class="product-quantity"><?php echo $row['quantity']; ?></p>*/?>

                            <a class="product-remove">


                                <a href="cart.php?delete=<?php echo $row['id']; ?>" class="btn"> delete </a>

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

                <span><?php echo $cnt?></span>

            </p>


            <a href="#">Proceed to Checkout</a>

        </div>

    </div>

    </div>



</body>


</html>