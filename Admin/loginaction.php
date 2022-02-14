<?php
session_start();
include "db.php";

if(isset($_POST['sub']))
{

$b = "shoaib";
$c = "12345678";





$sql = "SELECT * FROM admin_user WHERE username = '$b' and password = '$c' ";
$result = mysqli_query($connect, $sql);
$rowcount= mysqli_num_rows($result);
$row = mysqli_fetch_array($result);
// print_r($row);
// $admin_id = $row['id'];




if($rowcount > 0)
{
	$_SESSION["login"]="1";
	// $_SESSION['user_id'] = $user_id;
    unset($_SESSION["login_error"]);
    header("location:index.php");
   
}
else	
{	
	$_SESSION["login_error"] = "Please check login";
 	header("location:login.php");
	
}

}






?>