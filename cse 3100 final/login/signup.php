<?php
$connection = mysqli_connect('localhost', 'root', '', 'sweet home');
if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $number = preg_match('@[0-9]@', $password);
    $letter = preg_match('@[a-z]@', $password);
    $a = "";
    $b = "";
    $c = "";
    if (empty($email)) {
        $a = "email is required";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $a = "invalid email format";
    } else {
        $sql = "SELECT email from user";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $eemail = $row["email"];
                if ($eemail == $email) {
                    $a = "email is already in use";
                }
            }
        }
    }


    if (empty($name)) {
        $b = "username is required";
    }


    if (empty($password)) {
        $c = "password is required";
    }

    if (empty($number)) {
        $c = "mobile number is required";
    }

    if (empty($address)) {
        $d = "address is required";
    }
    if (strlen($password) < 8 || !$number || !$letter) {
        $e = "Password must be at least 8 characters in length and must contain at least one number and one letter";
    }

    if ($a == "" && $b == "" && $c == "" && $d==" " && $e==" " ) {
        $id = 0;
        $sql = "SELECT id from user";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row["id"];
            }
        }
        $id = $id + 1;
        $insert = "insert into user(id,name,email,password,address,phone_number) values ($id,'$name','$email','$password','$address','$number')";
        $upload = mysqli_query($connection, $insert);
    }
}
?>

<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="login.css">
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</head>

<body>

    <div class="body"></div>
    <div class="grad"></div>
    <div class="header">
        <div>Sweet<span>Home</span></div>
    </div>
    <br>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="abc" class="loginform">
        <div class="login">
            <input type="text" placeholder="email" name="email"><br>
            <div style="color:red; font-size:large;"><?php if (isset($a)) {
                                                            echo $a;
                                                        } ?></div>
            <input style="margin-top: 10px;" type="text" placeholder="name" name="name"><br>
            <div style="color:red; font-size:large;"><?php if (isset($b)) {
                                                            echo $b;
                                                        } ?></div>
            <input type="password" placeholder="password" name="password"><br>
            <div style="color:red; font-size:large;"><?php if (isset($c)) {
                                                            echo $c;
                                                        } ?></div>
            <input type="text" placeholder="phone number" name="number"><br>
            <div style="color:red; font-size:large;"><?php if (isset($d)) {
                                                            echo $d;
                                                        } ?></div>   
            
            <input type="text" placeholder="address" name="address"><br>
            <div style="color:red; font-size:large;"><?php if (isset($e)) {
                                                            echo $e;
                                                        } ?></div> 
            <input style="	width: 260px;height: 35px;background: #fff;border: 1px solid #fff;cursor: pointer;border-radius: 2px;color: #a18d6c;font-family: 'Exo', sans-serif;font-size: 16px;font-weight: 400;padding: 6px;margin-top: 10px;" type="submit" value="signup" name="signup">
        </div>
    </form>
</body>