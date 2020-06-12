<?php  
if (isset($_GET["ruta"])) {

$ruta = explode("/",$_GET["ruta"]);
if(isset($ruta[1])){
$cveCentro = $ruta[1];
}
}

$planteles=ControladorConsultas::ctrPlanteles($cveCentro);

foreach ($planteles as $key => $mostrar) {
   $cen=$mostrar['Nombre_Ctro_Educativo'];
   }

?>
<div class="content-wrapper">
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
             <h1 class="m-0 text-dark text-center">Planteles de <?php echo $cen ?>  </h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

 <div class="card px-5">
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Plantel</th>
                      <th class="text-center">Estatus</th>
                      <th class="text-center">Modificar</th>
                      <th class="text-center">Eliminar</th>
                      
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                      
                      
                      foreach ($planteles as $key => $mostrar) {
                      $plan=$mostrar['Nombre_Plantel'];
                      $status=$mostrar['Status'];
                      
                      ?>
                    <tr>
                      <td><?php echo $plan ?></td>
                      <?php 
                        if ($status==1) {  
                       ?>
                      <td class="text-center"><span class="badge badge-success"><i class="fas fa-toggle-on"></span></i></td>
                      <?php 
                        }elseif ($status==0) {   
                       ?>
                       <td class="text-center"><i class="fas fa-toggle-off"></i></td>
                       <?php 
                          }elseif ($status==4) {
                        ?>
                        <td class="text-center"><i class="fas fa-adjust"></i></td>
                       <?php 
                          }
                        ?>
                      <td class="text-center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modificarPlantel"><i class="fas fa-pen"></button></td>
                      <td class="text-center"><button type="button" class="btn badge-danger"><i class="far fa-trash-alt"></i></span></td>

                   <?php 

                      }
  
                    ?>

                    <div class="modal" id="modificarPlantel" tabindex="-1" role="dialog" aria-labelledby="modificarPlantelLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="modificarPlantelLabel">Modificar Plantel</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form>
                                <div class="form-group">
                                  <label for="formGroupExampleInput">Nombre Plantel</label>
                                  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nombre del Plantel">
                                </div>
                                <div class="form-group">
                                  <label for="formGroupExampleInput2">Dirección</label>
                                  <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Dirección">
                                </div>
                                <div class="form-group">
                                  <label for="formGroupExampleInput2">Teléfono</label>
                                  <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="55-0000-0000">
                                </div>
                                <div class="form-group">
                                  <label for="formGroupExampleInput2">Email</label>
                                  <input type="email" class="form-control" id="formGroupExampleInput2" placeholder="Email">
                                </div>
                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                              <button type="button" class="btn btn-primary">Guardar Cambios</button>
                            </div>
                          </div>
                        </div>
                      </div><!--Fin Modal-->
                    </tbody>
                  </table>
                </div>
                <!--  /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>

  </div>