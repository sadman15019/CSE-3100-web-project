<?php
$connection=mysqli_connect('localhost','root','','sweet home');
if(isset($_POST['login'])){
$email=$_POST['email'];
$password=$_POST['password'];
$a="";
$b="";
$c="";
if(empty($email)){
        $a="email is required";
}



if(empty($password)){
        $c="password is required";
    }

    if($a=="" && $c==""){
    $sql = "SELECT * from user";
    $result = $connection->query($sql);
    
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        if($email==$row['email'] && $password==$row['password'])
        {
          setcookie('email',$email,time()+60*60*7,"/");
          session_start();
          $_SESSION['email']=$email;
          header('location:http://localhost/cse 3100 final/home.php');
          $b==1;
        }
      }
      if($b==1)
      {
        $b="invalid email or password";
      }
    }
}
}
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="login.css">
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
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
				<input type="text" placeholder="email" name="email"><br>
				<input type="password" placeholder="password" name="password"><br>
        <div style="color:red; font-size:large;"><?php{
                    echo $b;
                }?></div>
				<input type="submit" value="login" name="login">
                <br>
                <br>
                <pre style="font-size:20px;">Don't have accout?<a href="http://localhost/cse 3100 final/login/signup.php">Create accout</a></pre>
		</div>
        </form>
</body>
</html>