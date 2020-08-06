<?php
$totalaspirantes = ControladorConsultas::ctrConsultaBD();
$totalCentros=ControladorConsultas::ctrConsultaCentros();
$ofertasRev=ControladorConsultas::ctrConsultaOfertas();
foreach ($totalaspirantes as $key => $value) {
  $ta=$value;
}

foreach ($totalCentros as $key => $value) {
  $tc=$value;
}

foreach ($ofertasRev as $key => $value) {
  $ofr=$value;
}

 $hoy = date("Y-m-d"); 

  $mostrar = ModeloConsulta::mdlReporteAspirantesHoy($hoy);
$aspihoy= count($mostrar);
  $cenhoy= ControladorConsultas::ctrCenhoy($hoy);
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
              <p>Total de aspirantes</p>
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
              <p>Total de centros educativos</p>
            </div>
            <div class="icon">
              <i class="ion ion-university"></i>
            </div>
          </div>
        </div><!-- ./col -->

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?php echo $ofr; ?></h3>
              <p>Ofertas en revisión</p>
            </div>
            <div class="icon">
              <i class="ion ion-document-text"></i>
            </div>
          </div>
        </div><!-- ./col -->

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-secondary ">
            <div class="inner">
              <h3><?php echo $aspihoy; ?></h3>
              <p>Aspirantes registrados hoy</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-stalker"></i>
            </div>
          </div>
        </div><!-- ./col -->

      </div>
    </div>
  </section>
</div>