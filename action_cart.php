<?php 
session_start();
include "db.php";

$user_id = $_SESSION['user_id']; 
$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];



 $sql = " INSERT INTO cart_item (product_id, quantity, usr_id)VALUES($product_id, $quantity, $user_id)";
 mysqli_query($connect,$sql);

 echo "<script>alert('product added to cart');</script>";
 header("location:index.php");

?>