<?php
session_start();
$connection = mysqli_connect('localhost', 'root', '', 'sweet home');
$a = "";
$b = "";
$c = "";
if (isset($_POST['login'])) {
    $id = $_POST['id'];
    $password = $_POST['password'];
    if (empty($id)) {
        $a = "id is required";
    }



    if (empty($password)) {
        $c = "password is required";
    }

    if ($a == "" && $c == "") {
        $sql = "SELECT * from admin";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($id == $row['id'] && $password == $row['password']) {
                    setcookie('id', $email, time() + 60 * 60 * 7, "/");
                    setcookie('password', $password, time() + 60 * 60 * 7, "/");
                    session_start();
                    $_SESSION['id'] = $id;
                    header('location:http://localhost/cse 3100 final/admin panel/add_delete.php');
                }
            }
            $b = "invalid email or password";
        }
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

    <head>
        <link rel="stylesheet" href="login.css">
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
            <input type="text" placeholder="Admin id" id="id" name="id"><br>
            <input type="password" placeholder="password" id="password" name="password"><br>
            <div style="color:red; font-size:large;"><?php
                                                        echo $b;
                                                        ?></div>
            <input type="submit" value="login" name="login">
            <br>
            <br>
        </div>
    </form>
</body>

</html>