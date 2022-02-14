<?php session_start();


if(!isset($_SESSION["login"]))

  header("location:login.php");
?>
<h1>This is your cart</h1>
<?php 
include "db.php";
$user_id = $_SESSION['user_id']; 

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
<td><a href="delete_cart.php?id=<?php echo $row['product_id']; ?>" onclick='return checkdelete()' >Delete</a></td>

<?php 
	}
}

$count = mysqli_query($connect, "SELECT * FROM tbl_product INNER JOIN cart_item ON tbl_product.id = cart_item.product_id WHERE usr_id = '$user_id'");
$total = 0;
while($row = mysqli_fetch_assoc($count)) {
	$total = $total + ($row["quantity"] * $row["price"]);
}
echo "<br>";
echo "<br>";



?>
<h4>Total:<?php echo $total ?></h4>
<form action="order.php" method="POST">
<input type="hidden" name="amount" value="<?php echo $total; ?>">
<!-- <input type="hidden" name="currency" value="INR"> -->
<input type="submit" name="buynow" style="margin-top:5px;" class="btn" value="Proceed to Checkout">
</form>
<?php
}else{
   echo "enter something in cart";
}
?>