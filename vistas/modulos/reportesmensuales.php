<?php
$mes = date("m");
$anio=date("Y");
$mostrar = ModeloConsulta::mdlReporteAspirantesMes($mes,$anio);
$aspimes= count($mostrar);
?>
<div class="content-wrapper">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
          <i class="far fa-chart-bar text-center"></i>
          Reporte Mensual
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-6 col-md-6 text-center shadow">
              <input type="text" class="knob" value="<?php echo $aspimes; ?>" data-skin="tron" data-thickness="0.2" data-width="90"
              data-height="90" data-fgColor="#3c8dbc" data-readonly="true">
              <div class="knob-label align-items-end">Aspirantes registrados en el mes
                <a href="<?php echo $url."generarMes" ?>" class="nav-link">
                  <i class="far fa-file-excel fa-2x"></i>
                  <p>Generar Reporte</p>
                </a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-6 col-md-6 text-center shadow">
              <div class="knob-label align-items-end mb-5">Aspirantes registrados en el mes, por centro educativo
              </div>
              <?php
              $centros=ControladorConsultas::ctrCentros();
              ?>
              <form method="post" action="<?php echo $url."generarMes"?>" >
                <div class="row">
                  <div class="col">
                    <select name="centroE" id="centroE" class="form-control">
                      <?php   
                      if (count($centros) > 0)
                      {
                      foreach ($centros as $key => $value) {
                      $idCentroE = $value["cve_Ctro_Educativo"];
                      $nomCentro = $value["Nombre_Ctro_Educativo"];?>
                      <option value="<?php echo $idCentroE; ?>"><?php echo $nomCentro; ?></option>
                      <?php
                      }
                      }
                      ?>
                    </select>
                  </div>
                  <input type="submit">
                </div>
              </form>
            </div>
            <!-- ./col -->
            </div><!-- /.row -->
            </div><!-- /.card-body -->
            </div><!-- /.card -->
            </div><!-- /.col -->
            </div><!-- /.row -->
          </div>