<!DOCTYPE html>
<html lang="en">
<?php include "db.php" ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | General Form Elements</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <?php include 'navbar.php'; ?>
        <!-- /.navbar -->



        <?php
    include 'sidebar.php';

    ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Add Product</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Product</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">






                            </div>
                            <!-- /.card -->
                            <!-- Horizontal Form -->

                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Add new Product</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form class="form-horizontal" id="myform" method="post"
                                    action="product_upload_action.php" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="image" class="col-sm-2 col-form-label">Add image</label>
                                            <div class="col-sm-10">
                                                <input type="file" name="P_image" class="form-control" id="file">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-2 col-form-label">Product Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="P_name" class="form-control" id="file">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-2 col-form-label">Price</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="P_price" class="form-control" id="file">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-2 col-form-label">Quantity</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="quantity" class="form-control" id="file">
                                            </div>
                                        </div>




                                        <div class="form-group row">
                                            <label for="name" class="col-sm-2 col-form-label">Category</label>
                                            <div class="col-sm-10">
                                                <select name="category" class="form-control select2" style="width: 100%;">
                                                    <?php
                                                        $sql=mysqli_query($connect, "SELECT * FROM category");

                                                        if(mysqli_num_rows($sql)>0){
                                                        while($data = mysqli_fetch_array($sql)){
                                                    ?>

                                                    <option value="<?php echo $data['name']; ?>">
                                                        <?php echo $data['name']; ?></option>

                                                    <?php
                                                        }
                                                        }


                                                    ?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-2 col-form-label">Status</label>
                                            <select name="status" class="form-control select2" style="width: 100%;">
                                                <option value="0">0</option>
                                                <option value="1">1</option>

                                            </select>
                                        </div>
                                         <div class="form-group row">
                                            <label for="name" class="col-sm-2 col-form-label">Featured-Product</label>
                                            <div class="col-sm-10">
                                                <select name="featured" class="form-control select2"
                                                    style="width: 100%;">

                                                    <option select="selected">--select--</option>
                                                    <option value="yes">yes</option>
                                                    <option value="no">no</option>
                                                </select>
                                            </div>
                                        </div>






                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <div class="form-check">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <input type="submit" value="category" id="submit" name='create'
                                            class="btn btn-info" />


                                    </div>
                                    <!-- /.card-footer -->
                                    <div id="res" class="res"></div>


                                </form>
                            </div>
                            <!-- /.card -->

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>

</html>