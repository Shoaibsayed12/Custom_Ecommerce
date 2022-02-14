<?php 
session_start();


if(!isset($_SESSION["login"]))

  header("location:login.php");

include "db.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Shoaib Cart</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<header>
			<nav>
			<?php if(isset($_SESSION['login'])){ ?>
				<h1><a href="logout.php">logout</a></h1>
    	<?php }else{ ?>
			<h1><a href="login.php">login</a></h1>
    <?php } ?>
				<h1>Shoaib Cart</h1>
				<h1><a href="cart.php">cart</a></h1>
				
			</nav>
		</header>
		
		
		<div class="container">
		
			<h3>Shopping Page</h3>
			<?php
				$query = "SELECT * FROM tbl_product ORDER BY id ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
			<div class="products">
				<form method="POST" action="action_cart.php">
					<div class="box">
						<img src="Admin/images/<?php echo $row["image"]; ?>" style="height:100px;width:100px;" /><br />

						<h4 class="text-info"><?php echo $row["name"]; ?></h4>

						<h4 class="text-danger">₹ <?php echo $row["price"]; ?></h4>

						<input type="text" name="quantity" value="1" class="form-control" />

						<input type="hidden" name="product_id" value="<?php echo $row["id"]; ?>" />
						<input type="hidden" name="user_id" value="<?php echo $row["id"]; ?>" />

						<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn" value="Add to Cart">

						

					</div>
				</form>
			</div>
			<?php
					}
				}
			?>
			
		</div>
	</div>
	</body>
</html>

