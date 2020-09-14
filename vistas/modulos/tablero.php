<?php
$totalCursos = ControladorConsultas::ctrCursos();
$totalAlumnos=ControladorConsultas::ctrAlumnos();
$tc=count($totalCursos);
$ta=count($totalAlumnos);
?>
<div class="content-wrapper">  <!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Bienvenido </h1>
        </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <section class="content"><!--Sección para la tabla-->
      <div class="container-fluid"><!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php echo $ta; ?></h3>
              <p>Total de alumnnos</p>
            </div>
            <div class="icon">
              <i class="ion ion-person "></i>
            </div>
          </div>
          </div><!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $tc; ?></h3>
                <p>Total de cursos</p>
              </div>
              <div class="icon">
                <i class="ion ion-university"></i>
              </div>
            </div>
            </div><!-- ./col -->
          </div>
        </div>
      </section>
    </div>