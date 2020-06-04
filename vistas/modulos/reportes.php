<?php 
  $hoy = date("Y-m-d"); 

  $aspihoy= ControladorConsultas::ctrAspihoy($hoy);
  $cenhoy= ControladorConsultas::ctrCenhoy($hoy);

  foreach ($aspihoy as $key => $value) {

  $aspihoy=$value;
  }

  foreach ($cenhoy as $key => $value) {

  $cenhoy=$value;
  }

 ?>
<div class="content-wrapper">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <i class="far fa-chart-bar"></i>
            Reporte Diario
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-6 col-md-3 text-center">
              <input type="text" class="knob" value="<?php echo $aspihoy; ?>" data-skin="tron" data-thickness="0.2" data-width="90"
                           data-height="90" data-fgColor="#3c8dbc" data-readonly="true">
              <div class="knob-label">Aspirantes registrados hoy</div>
            </div>
            <!-- ./col -->
             <div class="col-6 col-md-3 text-center">
              <input type="text" class="knob" value="<?php echo $cenhoy; ?>" data-skin="tron" data-thickness="0.2" data-width="120"
                           data-height="120" data-fgColor="#f56954">

              <div class="knob-label">Centros educativos registrados hoy</div>
             </div>
            <!-- ./col -->
          </div><!-- /.row -->
        </div><!-- /.card-body -->
      </div><!-- /.card -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</div>