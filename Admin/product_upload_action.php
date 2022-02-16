
<?php

session_start();
include 'db.php';  

$P_name = $_POST['P_name'];
$P_price = $_POST['P_price'];
$quantity = $_POST['quantity'];
$category = $_POST['category'];
$status = $_POST['status'];
$feature = $_POST['featured'];
$P_image=$_FILES['P_image']['name'];

$target_dir = "images/";
// $target_file = $target_dir . basename($_FILES["P_image"]["name"]);
// move_uploaded_file($_FILES["P_image"]["tmp_name"], $target_file);

$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["P_image"]["name"]);
$extension = end($temp);
if ((($_FILES["P_image"]["type"] == "image/gif")
    || ($_FILES["P_image"]["type"] == "image/jpeg")
    || ($_FILES["P_image"]["type"] == "image/jpg")
    || ($_FILES["P_image"]["type"] == "image/pjpeg")
    || ($_FILES["P_image"]["type"] == "image/x-png")
    || ($_FILES["P_image"]["type"] == "image/png"))
    && ($_FILES["P_image"]["size"] < 20000000000000000000000)
    && in_array($extension, $allowedExts))
{
  if ($_FILES["P_image"]["error"] > 0)
  {
    echo "Return Code: " . $_FILES["P_image"]["error"] . "<br>";
}
else
{
    echo "Upload: " . $_FILES["P_image"]["name"] . "<br>";
    echo "Type: " . $_FILES["P_image"]["type"] . "<br>";
    echo "Size: " . ($_FILES["P_image"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["P_image"]["tmp_name"] . "<br>";

    if (file_exists("images/" . $_FILES["P_image"]["name"]))
    {
      echo $_FILES["P_image"]["name"] . " already exists. ";
  }
  else
  {
      move_uploaded_file($_FILES["P_image"]["tmp_name"],
          "images/" . $_FILES["P_image"]["name"]);
      echo "Stored in: " . "images/" . $_FILES["P_image"]["name"]."<br>";
  }
}
}

if($P_name ==''||$P_image == '' || $P_price=='' || $quantity=='' ||$category=='' || $status==''){
    echo "Please fill all the value in all field";
}
elseif($P_name != ''&&$P_image != '' &&$quantity!='' &&$category!='' &&$status!=''){
    $sql = "INSERT INTO tbl_product (name,image,price,quantity,category_name,status,featured_product) 
    VALUES ('$P_name','$P_image','$P_price','$quantity','$category','$status','$feature')";
    mysqli_query($connect, $sql);
    echo "<script>alert('Record added');
    window.location.href = 'admin_show_product.php';</script>";
}

?>


