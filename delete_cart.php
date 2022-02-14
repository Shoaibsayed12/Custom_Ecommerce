<?php

include ('db.php'); // Using database connection file here

$id = $_GET['id']; // get id through query string

$del = mysqli_query($connect,"delete from cart_item where product_id = '$id'"); // delete query

if($del)
{
    
    header("location:cart.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>