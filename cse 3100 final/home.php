<?php
$connection=mysqli_connect('localhost','root','','sweet home');
?>


<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/webproject.css">
</head>

<body>
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
                        <li class="list"><a href="masterbed.php" class="menu1">Master Bed</a></li>
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
                                            <div class="description">
                                                <h6><?php echo $row['name']; ?></h6>
                                                <h4><?php echo $row['price']; ?></h4>
                                            </div>
                                        </div>
                                    <?php } ?>

                                </div>
                            </section>
                            <div style="background-color: rgb(207, 179, 232);display: inline-block;width:97%;height: 110px;padding-left:850px ;padding-top: 70px;" 
                            class="popfooter">see more</div>
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
                    <div id="Sweet_home">
                        <div style="font-size:xx-large;">Sweet Home</div>
                    </div>
                </ul>
            </div>
            <div class="logsignup">
                <ul class="C">
                    <div class="Login">
                        <li class="list"><a href="http://localhost/cse 3100 final/login/login.php" class="Login">Login</a></li>
                    </div>
                    <div class="Signup">
                        <li class="list"><a href="http://localhost/cse 3100 final/login/signup.php" class="Signup">Signup</a></li>
                    </div>
                </ul>
            </div>
        </div>
    </div>
    <div class="frontpage">
        <img class="img1" src="images/background.jpg" width="1900" height="700">
    </div>
    <br>
    <section id="featured_product">
        <h2 style="font-size: 50px;">Top Featured Products</h2>
        <br>
        <p>All new winter collections</p>
        <div class="container">
            <div class="product">
                <img src="pillow.jpg" alt="" height="" width="">
                <div class="description">
                    <h6>Sateen Pillow Case</h6>
                    <h4>$80</h4>
                </div>
            </div>
            <div class="product">
                <img src="pillow.jpg" alt="" height="" width="">
                <div class="description">
                    <h6>Sateen Pillow Case</h6>
                    <h4>$80</h4>
                </div>
            </div>
            <div class="product">
                <img src="pillow.jpg" alt="" height="" width="">
                <div class="description">
                    <h6>Sateen Pillow Case</h6>
                    <h4>$80</h4>
                </div>
            </div>
            <div class="product">
                <img src="pillow.jpg" alt="" height="" width="">
                <div class="description">
                    <h6>Sateen Pillow Case</h6>
                    <h4>$80</h4>
                </div>
            </div>
            <div class="product">
                <img src="pillow.jpg" alt="" height="" width="">
                <div class="description">
                    <h6>Sateen Pillow Case</h6>
                    <h4>$80</h4>
                </div>
            </div>
            <div class="product">
                <img src="pillow.jpg" alt="" height="" width="">
                <div class="description">
                    <h6>Sateen Pillow Case</h6>
                    <h4>$80</h4>
                </div>
            </div>
            <div class="product">
                <img src="pillow.jpg" alt="" height="" width="">
                <div class="description">
                    <h6>Sateen Pillow Case</h6>
                    <h4>$80</h4>
                </div>
            </div>
            <div class="product">
                <img src="pillow.jpg" alt="" height="" width="">
                <div class="description">
                    <h6>Sateen Pillow Case</h6>
                    <h4>$80</h4>
                </div>
            </div>
        </div>
    </section>

</body>

</html>