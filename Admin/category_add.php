<?php 
session_start();


if(!isset($_SESSION["login"]))

  header("location:login.php");

include "db.php";
?>
<?php 
include "db.php";
        $img=$_FILES['file']['name'];
       
        $name=$_POST['name'];
     


 if(isset($_POST['create'])){
         if ($name != ''){
                 $target_dir = "images/";
                 $target_file = $target_dir . basename($_FILES["file"]["name"]);
                 $uploadOK = 1;
                 $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                //  if (file_exists($target_file)){
                //          echo "<br>file exist";
                //          $uploadOK = 0;
                //  }
                 if($_FILES["file"]["size"] > 500000){
                         echo"<br> file is too large";
                         $uploadOK = 0;
                 }
                 elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"){
                         echo " invalid ectension";
                         $uploadOK = 0;
                 }
                 elseif ($uploadOK == 0){
                         echo "file not uploded";
                 }
                 if($uploadOK == 1){
                         if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)){
                                 echo "the file" . htmlspecialchars(basename($_FILES["file"]["name"])) . "uploaded";
                                 move_uploaded_file($_FILES['file']['tmp_name'],$target_file);

                                $sql = "INSERT INTO category (name, image) VALUES ('$name', '$img')";
                                mysqli_query($connect,$sql); 
                         }
                         else{
                                 echo "sorry error while uploading";
                         }

                 }

         }

}
header("location:category_curd.php");
    
        
        ?>
