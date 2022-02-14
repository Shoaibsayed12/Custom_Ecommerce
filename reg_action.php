<?php 


include ('db.php');
$name=$_POST['name'];
$password=$_POST['password'];
$c=md5($password);

      

if($name == '' || $password== '' ){

        echo "<script>alert('entervalue');</script>";
        
        }
        else{
             
$sql = "INSERT INTO users(username, password) VALUES ('$name', '$c')";
mysqli_query($connect,$sql);
echo "registered successfully";
header("location:login.php");
                }
                      


?>