<?php 
session_start();
include "db.php";

$user_id = $_SESSION['user_id']; 
$user_name = $_POST['user_name']; 
$address = $_POST['address']; 
$contact = $_POST['contact']; 

$quantity = $_POST['quantity'];
$amount=$_POST['amount'];

// $sql1 = "INSERT INTO user_details(,user_id) VALUES (,'$user_id')";

// mysqli_query($connect,$sql1);

$sql = " INSERT INTO order_details (total_price, usr_id, status, user_name,contact,address)VALUES($amount, $user_id, 'pending','$user_name','$contact','$address')";
mysqli_query($connect,$sql);
$order_detail_id =  mysqli_insert_id($connect);

        $pid = "SELECT * FROM tbl_product INNER JOIN cart_item ON tbl_product.id = cart_item.product_id  ";
        $result = mysqli_query($connect, $pid);
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_array($result))
            {
                 $data = $row["product_id"]; 
                $sql2 = "INSERT INTO `order_items`(`usr_id`, `product_id`, `quantity`, `order_detail_id`) VALUES ('$user_id','$data','$quantity', '$order_detail_id')";
                // echo $sql2;
                mysqli_query($connect,$sql2);
            }
        }


        $_SESSION['order_detail_id'] = $order_detail_id;


echo "<script>alert('product added to cart');
window.location.href = 'pay.php';
</script>";
//  header("location:pay.php");
 $_SESSION["amount"]=$amount;