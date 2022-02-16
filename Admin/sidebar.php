<?php 
session_start();


if(!isset($_SESSION["login"]))

  // header("location:login.php");

include "db.php";
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Ecommerce</span>
  </a>
  
  <!-- Sidebar -->

  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Shoaib Ashiq</a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        


        <?php 




        if(isset($_SESSION["login"])){  ?>
          <a href="logout.php" class="nav-link"><p>Logout</p></a>

          
          <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
            <!-- <li class="nav-item menu-open"> -->
              <a href="index.php" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>

              <!-- parent data table -->
              <!-- <li class="nav-item"> -->

                <a href="category_curd.php" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Category
                    <!-- <i class="fas fa-angle-left right"></i> -->
                  </p>
                </a>




                
                <!-- category-->
                <ul>
                  <a href="category.php" class="nav-link">

                    <p>Add category
                      <!-- <i class="fas fa-angle-left right"></i> -->
                    </p>
                  </a>
                </ul>
                <!--      order details -->
                <a href="order_detail.php" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Order details
                    <!-- <i class="fas fa-angle-left right"></i> -->
                  </p>
                </a>


                <a href="admin_show_product.php" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Product
                    <!-- <i class="fas fa-angle-left right"></i> -->
                  </p>
                </a>
                <!-- category-->
                <ul>
                  <a href="admin_product_upload.php" class="nav-link">

                    <p>Add product
                      <!-- <i class="fas fa-angle-left right"></i> -->
                    </p>
                  </a>
                </ul>




              </ul>

              <!-- /.sidebar-menu -->
            </div>
          </aside>
        <?php }else  
        { 
          $_SESSION["login_error"] = "Please check login";
          header("location:login.php");

          
        } ?>
        