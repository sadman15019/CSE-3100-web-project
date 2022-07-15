<?php
$connection = mysqli_connect('localhost', 'root', '', 'sweet home');
$a = "";
$b = "";
$c = "";
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  if (empty($email)) {
    $a = "email is required";
  }



  if (empty($password)) {
    $c = "password is required";
  }

  if ($a == "" && $c == "") {
    $sql = "SELECT * from user";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        if ($email == $row['email'] && $password == $row['password']) {
          setcookie('email', $email, time()+60*60*7, "/");
          setcookie('password', $password, time()+60*60*7, "/");
          session_start();
          $_SESSION['email'] = $email;
          header('location:http://localhost/cse 3100 final/home.php');
        }
      }
      $b="invalid email or password";
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
      <input type="text" placeholder="email" id="email" name="email"><br>
      <input type="password" placeholder="password" id="password" name="password"><br>
      <div style="color:red; font-size:large;"><?php
                                                echo $b;
                                                ?></div>
      <input type="submit" value="login" name="login">
      <br>
      <br>
      <pre style="font-size:20px;">Don't have accout?<a href="http://localhost/cse 3100 final/login/signup.php">Create accout</a></pre>
    </div>
  </form>
  <?php
  if(isset($_COOKIE['email']) && isset($_COOKIE['password']))
  {
    $email=$_COOKIE['email'];
    $password=$_COOKIE['password'];

    echo "<script>
      document.getElementById('email').value='$email';
      document.getElementById('password').value='$password';
      </script>";
  }?>
</body>

</html>