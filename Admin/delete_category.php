<?php

include "db.php";

$id = $_GET['id']; 

$del = mysqli_query($connect,"delete from category where id = '$id'"); 

if($del)
{
  
    header("location:category_curd.php");
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>