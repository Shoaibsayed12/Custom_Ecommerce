<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Shoppage</title>
</head>

<body>
   <?php include "header.php"; ?>


    <main>


        <div class="container-main">
            <div class="head-p">
                <span class="head-p1">All Products</span>
            </div>
            <div class="products">

            <?php
            include "db.php";
				$query = "SELECT * FROM tbl_product ORDER BY id ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>


                <div class="full-card">
                    <div class="card" style="width: 21rem;">
                        <img src="Admin/images/<?php echo $row["image"]; ?>" class="card-img-top" alt="...">
                    </div>
                    <a href="#" class="p-title"><?php echo $row["name"]; ?></a>
                    <div class="p-price">₹<?php echo $row["price"]; ?></div>
                </div>


                <?php
					}
				}
			?>

            </div>


        </div>

    </main>


    <?php include "footer.php"; ?>


</body>

</html>