<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark text-center">Ofertas en Revisión</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <div class="card px-5"><!-- /.card-header -->
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table m-0">
          <thead>
            <tr>
              <th>Centro </th>
              <th>Oferta</th>
              <th class="text-center">Nivel</th>
              <th class="text-center">Modalidad</th>
              <th class="text-center">Modificar</th>      
            </tr>
          </thead>
          <tbody>
          <?php

          $revision=ControladorConsultas::ctrOrevision();

          foreach ($revision as $key => $mostrar) {
          $centro=$mostrar['Nombre_Ctro_Educativo'];
          $oferta=$mostrar['Nombre'];
          $nivel=$mostrar['NombreNivel'];
          $modalidad=$mostrar['Modalidad'];

          ?>
            <tr>
              <td><?php echo $centro ?></td>
              <td><?php echo $oferta ?></td>
              <td class="text-center"><?php echo $nivel ?></td>
              <td class="text-center"><?php echo $modalidad ?></td>
              <td class="text-center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modificarOferta"><i class="fas fa-pen"></button></td>
            </tr>
            <?php
              }
            ?>   
            <!-- Modal -->
              <div class="modal" id="modificarOferta" tabindex="-1" role="dialog" aria-labelledby="modificarOfertaLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modificarOfertaLabel">Modificar Oferta</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form>
                        <div class="form-group">
                          <label for="formGroupExampleInput">Oferta</label>
                          <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Oferta">
                        </div>
                        <div class="form-group">
                          <label for="formGroupExampleInput2">Nivel</label>
                          <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Nivel">
                        </div>
                        <div class="form-group">
                          <label for="formGroupExampleInput2">Modalidad</label>
                          <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Modalidad">
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      <button type="button" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                  </div>
                </div>
              </div><!--Fin Modal -->     
          </tbody>
        </table>
      </div><!-- /.table-responsive -->
    </div>
  </div>

</div>