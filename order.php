<?php session_start();


if(!isset($_SESSION["login"]))

  header("location:login.php");
?>
<h1>Order Details</h1>
<?php 
include "db.php";
$user_id = $_SESSION['user_id']; 
?>
<h3>Billing Address</h3>
<form action="orderaction.php" method="post">
    Name: <input type="text" name="user_name" id=""><br><br>
    Mobile no: <input type="number" name="contact" id=""><br><br>

    Address: <textarea rows="4" cols="50" name="address"></textarea>

    <?php

    $verify_user="SELECT * FROM cart_item WHERE usr_id =  '$user_id'";
                      $verify_result=mysqli_query($connect,$verify_user);
                    
                      if (mysqli_num_rows($verify_result)>0) {

                          $query = "SELECT * FROM tbl_product INNER JOIN cart_item ON tbl_product.id = cart_item.product_id WHERE cart_item.usr_id =  '$user_id' ";
                          $result = mysqli_query($connect, $query);
                              if(mysqli_num_rows($result) > 0)
                              {
                              while($row = mysqli_fetch_array($result))
                              {?>




    <h4><?php echo $row['name']; ?></h4>
    <h4><?php echo $row['price']; ?></h4>
    <h4><?php echo $row['quantity']; ?></h4>

    <?php 
    }
}

$count = mysqli_query($connect, "SELECT * FROM tbl_product INNER JOIN cart_item ON tbl_product.id = cart_item.product_id WHERE  usr_id='$user_id'  ");
$total = 0;
while($row = mysqli_fetch_assoc($count)) {
    $total = $total + ($row["quantity"] * $row["price"]);
}
echo "<br>";
echo "<br>";



?>
    <h4>Total:<?php echo $total ?></h4>
    <?php
$query1 = "SELECT * FROM cart_item WHERE cart_item.usr_id =  '$user_id' ";
                       $result1 = mysqli_query($connect, $query1);
                       while($row1 = mysqli_fetch_array($result1)){
                        
                       
                       ?>
    <!-- <form action="orderaction.php" method="POST"> -->
    <input type="hidden" name="amount" value="<?php echo $total; ?>">

    <input type="hidden" name="product_id" value="<?php echo $row1['product_id']; ?>">

    <input type="hidden" name="quantity" value="<?php echo $row1['quantity']; ?>">
    <?php
                       }
                       ?>
    <input type="submit" name="buynow" style="margin-top:5px;" class="btn" value="buynow">
</form>
<!-- </form> -->
<?php
}
?>