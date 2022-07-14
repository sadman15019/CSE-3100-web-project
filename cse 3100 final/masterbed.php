<?php
session_start();
$connection=mysqli_connect('localhost','root','','sweet home');
if(isset($_GET['addtocart'])){
    if(isset($_SESSION['email'])){
    $id = $_GET['addtocart'];
    $select1 = mysqli_query($connection, "SELECT * FROM masterbed_product where id=$id");
    while ($row = mysqli_fetch_assoc($select1)) {
        $id=$row['id'];
        $name=$row['name'];
        $price=$row['price'];
        $image=$row['image'];
        $insert="insert into cart(id,name,price,image) values ($id,'$name','$price','$image')";
        $upload=mysqli_query($connection,$insert);
    }
    header('location:cart/cart.php');}
    else
    {
        header('location:masterbed.php');
    }
 }
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/webproject.css">
</head>

<body>
    <script src="js/webproject.js"></script>
    <div class="header">
        <div class="top">
            <br>
            <p>Spring Savings
                : 30% off sitewide and free shipping on orders over $100.
                *Terms</p>
        </div>
        <div class="navbar">
            <div class="menus">
                <ul class="A">
                    <div id="Master_Bed" class="Master_Bed">
                        <li class="list"><a href="#" class="menu1">Master Bed</a></li>
                        <div id="Master_bedpop" class="Master_bedpop">
                            <section id="MasterBed_product1">
                                <div id="masterbedcontainer1" class="container1">
                                    <?php
                                    $select1 = mysqli_query($connection, "SELECT * FROM masterbed_product");
                                    $cnt = 0;
                                    while ($cnt < 3 && $row = mysqli_fetch_assoc($select1)) {
                                        $cnt = $cnt + 1; ?>
                                        <div class="product1">
                                            <img src="images/<?php echo $row['image']; ?>" height="100" alt="abc">
                                            <div class="description1">
                                                <h6><?php echo $row['name']; ?></h6>
                                                <h4><?php echo $row['price']; ?></h4>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </section>
                            <div style="background-color: rgb(207, 179, 232);display: inline-block;width:97%;height: 110px;padding-left:850px ;padding-top: 70px;" class="popfooter">see more</div>
                        </div>
                    </div>
                    <div id="Dining" class="Dining">
                        <li class=" list"><a href="#" class="menu2">Dining</a></li>
                        <div id="Diningpop" class="Diningpop">
                        </div>
                    </div>
                    <div id="Drawing" class="Drawing">
                        <li class=" list"><a href="#" class="menu3">Drawing</a></li>
                        <div id="Drawingpop" class="Drawingpop">
                        </div>
                    </div>
                    <div id="Kitchen" class="Kitchen">
                        <li class=" list"><a href="#" class="menu4">Kitchen</a></li>
                        <div id="Kitchenpop" class="Kitchenpop">
                        </div>
                    </div>
                </ul>
            </div>
            <div class="companyname">
                <ul class="B">
                    <div class="Sweet_home">
                        <li class="para1">Sweet Home</li>
                    </div>
                </ul>
            </div>
            <div class="logsignup">
                <ul class="C">
                    <div class="Login">
                        <li class="list"><a href="http://localhost/cse 3100 final/login/login.php" class="Login">Login</a></li>
                    </div>
                    <div class="Signup">
                        <li class="list"><a href="signup.html" class="Signup">Signup</a></li>
                    </div>
                </ul>
            </div>
        </div>
    </div>
    <div style="margin-left:55px" ; class="frontpage">
        <img class="img1" src="images/masterbed.jpg" width="1400" height="400">
    </div>
    <div class="frontpage">
        <section id="MasterBed_product">
        <div style="font-size: 40px;color:blue; margin-top:50px; display:relative;">MasterBed Products</div>
            <div id="sortbutton"><button type="submit" id="sort" onclick="sortitem('MasterBed_product')">sort by price</button></div>
            <input type="text" id="myInput" onkeyup="myFunction('MasterBed_product')" placeholder="Search for items.." title="Type in a name">
            <div id="masterbedcontainer" class="container">
                <?php
                $select1 = mysqli_query($connection, "SELECT * FROM masterbed_product");
                while ($row = mysqli_fetch_assoc($select1)) { ?>
                    <div class="product">
                        <img src="images/<?php echo $row['image']; ?>" alt="abc">
                        <div class="description">
                            <h6><?php echo $row['name']; ?></h6>
                            <h4><?php echo $row['price']; ?></h4>
                            <a href="masterbed.php?addtocart=<?php echo $row['id']; ?>" class="btn">add to cart</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>
    </div>
    <br>