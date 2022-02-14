<?php
session_start();
include "db.php";

if(isset($_POST['sub']))
{

$b = $_POST['name'];
$c = $_POST['password'];
$c=md5($c);




$sql = "SELECT * FROM users WHERE username = '$b' and password = '$c' ";
$result = mysqli_query($connect, $sql);
$rowcount= mysqli_num_rows($result);
$row = mysqli_fetch_array($result);
print_r($row);
$user_id = $row['id'];




if($rowcount > 0)
{
	$_SESSION["login"]="1";
	$_SESSION['user_id'] = $user_id;
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