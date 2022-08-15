<?php
session_start();
unset($_SESSION['email']);
unset($_SESSION['id']);
unset($_SESSION['name']);
$connection=mysqli_connect('localhost','root','','sweet home');
$sql = "delete from cart";
$result = $connection->query($sql);
header('location:http://localhost/cse 3100 final/home.php');
?>