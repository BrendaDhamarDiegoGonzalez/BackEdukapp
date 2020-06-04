<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Ofertas Aprobadas</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <div class="card"><!-- /.card-header -->
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table m-0">
          <thead>
            <tr>
              <th>Centro </th>
              <th>Oferta</th>
              <th>Nivel</th>
              <th>Modalidad</th>
              <th>Modificar</th>      
            </tr>
          </thead>
          <tbody>
             <?php

          $aprobadas=ControladorConsultas::ctrOaprobadas();

          foreach ($aprobadas as $key => $mostrar) {
          $centro=$mostrar['cve_OfertaEdu'];
          $oferta=$mostrar['Nombre'];
          $nivel=$mostrar['cve_Nivel'];
          $modalidad=$mostrar['Cve_Modalidad'];

          ?>
            <tr>
              <td><?php echo $centro ?></td>
              <td><?php echo $oferta ?></td>
              <td><?php echo $nivel ?></td>
              <td><?php echo $modalidad ?></td>
              <td><span class="badge badge-info"><i class="fas fa-pen"></i></span></td>
            </tr>
            <?php
              }
            ?>   
          </tbody>
        </table>
      </div><!-- /.table-responsive -->
    </div>
  </div>
</div>