<?php 
  $hoy = date("Y-m-d"); 

  $mostrar = ModeloConsulta::mdlReporteAspirantesHoy($hoy);
$aspihoy= count($mostrar);
  $cenhoy= ControladorConsultas::ctrCenhoy($hoy);


 ?>
<div class="content-wrapper">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <i class="far fa-chart-bar text-center"></i>
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

              <div class="p-3  col-sm-12"><!-- Sección generar reporte-->

              <form method="post"  action="<?php echo $url."generar"?>">
                <div class="form-group row ">
                  <div>
                    <button type="submit" class="btn btn-primary">Generar Reporte</button>
                  </div>
                </div>
              </form>

              </div><!-- Fin sección generar reporte-->

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