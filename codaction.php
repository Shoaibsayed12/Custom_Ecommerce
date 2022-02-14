<?php 
session_start();
include "db.php";
$order_id = $_SESSION['order_detail_id'];
   
$qry = mysqli_query($connect,"SELECT * from order_details WHERE id  ='$order_id'");

$data = mysqli_fetch_array($qry); 


  $edit = mysqli_query($connect,"UPDATE order_details SET  payment_method='cod' WHERE id  ='$order_id'");
  header("location:thankyou.php");
