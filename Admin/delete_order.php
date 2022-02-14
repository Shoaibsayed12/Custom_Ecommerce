<?php

include "db.php";

$id = $_GET['id']; 

$del = mysqli_query($connect,"delete from order_details where id = '$id'"); 

if($del)
{
  
    header("location:order_detail.php");
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>