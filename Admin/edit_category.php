
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | General Form Elements</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include 'navbar.php';
  

include "db.php"; 

$id = $_GET['id'];

$qry = mysqli_query($connect,"select * from category where id ='$id'"); 

$data = mysqli_fetch_array($qry); 

if(isset($_POST['update'])) 
{
    $name = $_POST['name'];

    $oldfile = $_POST['oldfile'];
    $img=$_FILES['file']['name'];  
    


        if ($img != ''){
                $target_dir = "images/";
                $target_file = $target_dir . basename($_FILES["file"]["name"]);
                $uploadOK = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                // if (file_exists($target_file)){
                //         echo "<br>file exist";
                //         $uploadOK = 0;
                // }
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

                            $edit = mysqli_query($connect,"update category set name='$name', image='$img' where id='$id'");
                               mysqli_query($connect,$edit); 
                               header("location:category_curd.php");
                        }
                        else{
                            
                                echo "sorry error while uploading";
                        }

                }

        }

        else{
    
            $edit = mysqli_query($connect,"update category set name='$name', image='$oldfile' where id='$id'");
            mysqli_query($connect,$edit); 
            header("location:category_curd.php");
        }


        
}


include 'sidebar.php'; 

  ?>
 
  <!-- /.navbar -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">category</li>
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
                <h3 class="card-title">Update category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->


              <form method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="image" class="col-sm-2 col-form-label">Add image</label>
                    <div class="col-sm-10">
                      <input type="file" name="file" class="form-control" id="file" >
                      <input type="hidden" name="oldfile" value="<?php echo $data['image'] ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Category Name</label>
                    <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" value="<?php echo $data['name'] ?>" >

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
                  <input type="submit" value="Update" id="submit" name='update' class="btn btn-info" />
                 
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















