<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Edukapp</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<?php
include "barra.php";
?>
 <div class="content-wrapper">
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Planteles</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

 <div class="card">
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Centro</th>
                      <th>Dirección</th>
                      <th>Modificar</th>
                      <th>Eliminar</th>
                      
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>Ecatepec</td>
                      <td>San Cristobal</td>
                      <td><span class="badge badge-info"><i class="fas fa-pen"></i></span></td>
                      <td><span class="badge badge-danger"><i class="far fa-trash-alt"></i></span></td>
                    </tr>
                   <tr>
                      <td>Tecámac</td>
                      <td>Tecámac centro</td>
                      <td><span class="badge badge-info"><i class="fas fa-pen"></i></span></td>
                      <td><span class="badge badge-danger"><i class="far fa-trash-alt"></i></span></td>
                    </tr>
                    <tr>
                      <td>Coacalco</td>
                      <td>****</td>
                      <td><span class="badge badge-info"><i class="fas fa-pen"></i></span></td>
                      <td><span class="badge badge-danger"><i class="far fa-trash-alt"></i></span></td>
                    </tr>
                    <tr>
                      <td>Nezahualcóyotl</td>
                      <td>***</td>
                      <td><span class="badge badge-info"><i class="fas fa-pen"></i></span></td>
                      <td><span class="badge badge-danger"><i class="far fa-trash-alt"></i></span></td>
                    </tr>
                   
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>

  </div>
<?php
include "pie.php";
?>
</body>
</html>
 