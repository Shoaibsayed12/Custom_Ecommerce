<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Shopping cart</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<style>
.image{
  height: 50px;
}
</style>
<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">

    <!-- /.navbar -->
    <?php include 'navbar.php'; ?>

    <!-- /.sidebar -->
    <?php include 'sidebar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Shopping cart</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">categories-view</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">categories</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body p-0">
            <table class="table table-striped projects">
              <thead>
                <tr>

                  <th style="width: 20%">
                    Category Name
                  </th>
                  <th style="width: 30%">
                    image
                  </th>
                  <th style="width: 20%">
                  </th>
                </tr>
              </thead>

              <?php
              include "db.php";
              $query = "SELECT * FROM category ORDER BY id ASC";
              $result = mysqli_query($connect, $query);
              if(mysqli_num_rows($result) > 0)
              {
                while($row = mysqli_fetch_array($result))
                {
                  ?>
                  <tbody>
                    <tr>

                      <td>
                        <a>
                          <h2 class="text-info"><?php echo $row["name"]; ?></h2>
                        </a>
                        <br/>

                      </td>
                      <td>
                        <ul class="list-inline">
                          <li class="list-inline-item">
                            <img class ="image" src="images/<?php echo $row["image"]; ?>" />
                          </li>

                        </ul>
                      </td>
                      
                      
                      <td class="project-actions text-right">

                        <a class="btn btn-info btn-sm" href="edit_category.php?id=<?php echo $row['id']; ?>">
                          <i class="fas fa-pencil-alt">
                          </i>
                          Edit
                        </a>
                        <a class="btn btn-danger btn-sm" onclick='myFunction_delete(<?php echo $row['id']; ?>)' >
                          <i class="fas fa-trash">
                          </i>
                          Delete
                        </a>


                      </td>
                    </tr>

                  </tbody>
                  <?php
                }
              }
              ?>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0-rc
      </div>
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
<script type="text/javascript">
function myFunction_delete(gid) {
  if (confirm("Do you want to delete!") == true) {
    window.location.href = "delete_category.php?id="+gid+""
  }


}

</script>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
<script>
