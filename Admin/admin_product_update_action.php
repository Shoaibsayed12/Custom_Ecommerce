<?php
include "db.php";
if (isset($_POST['submit'])) {
    $p_id = $_POST['id'];
    $P_image = $_FILES['P_image']['name'];
    $oldfile = $_POST['oldfile'];
    $P_name = $_POST['P_name'];
    $P_price = $_POST['P_price'];
    $quantity = $_POST['quantity'];
    $category = $_POST['category'];
    $status = $_POST['status'];
    $featured = $_POST['featured'];
    echo "<br>".$P_name;
    
    



    if ($P_image != ''){
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["P_image"]["name"]);
        $uploadOK = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // if (file_exists($target_file)){
        //         echo "<br>file exist";
        //         $uploadOK = 0;
        // }
        if($uploadOK == 1){
                if(move_uploaded_file($_FILES["P_image"]["tmp_name"], $target_file)){
                        echo "the file" . htmlspecialchars(basename($_FILES["P_image"]["name"])) . "uploaded";
                        move_uploaded_file($_FILES['P_image']['tmp_name'],$target_file);

                    $edit = mysqli_query($connect,"UPDATE tbl_product SET name='$P_name', image='$P_image',price='$P_price', quantity='$quantity',category_name='$category',status='$status',featured_product='$featured'  WHERE id='$p_id'");
                    mysqli_query($connect,$edit); 
                    header("location:admin_show_product.php");
                }
                else{
                    
                    echo "sorry error while uploading";
                }
                
            }
            
        }
        
        else{
            
            $edit = mysqli_query($connect,"UPDATE tbl_product SET name='$P_name', image='$oldfile',price='$P_price', quantity='$quantity',category_name='$category',status='$status',featured_product='$featured'  WHERE id='$p_id'");
            // print_r('$edit');
    mysqli_query($connect,$edit); 
    header("location:admin_show_product.php"); // redirects to all records page
}



}


?>