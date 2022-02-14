<?php

include ('db.php'); // Using database connection file here

$id = $_GET['id']; // get id through query string

$del = mysqli_query($connect,"delete from tbl_product where id = '$id'"); // delete query

if($del)
{
    
    header("location:admin_show_product.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>