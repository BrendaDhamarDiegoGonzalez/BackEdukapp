<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark text-center">Centros Educativos</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  
  <!-- TABLE: Centros -->
            <div class="card px-5">
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th class="text-center">Centro</th>
                      <th class="text-center">Status</th>
                      <th class="text-center">Modificar</th>
                      <th class="text-center">Eliminar</th>
                      <th class="text-center">Ver más</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php

                        $centros=ControladorConsultas::ctrCentros();

                        foreach ($centros as $key => $mostrar) {
                          $nombre=$mostrar['Nombre_Ctro_Educativo'];
                          $status=$mostrar['Status'];
                          $id_centro=$mostrar['cve_Ctro_Educativo'];

                          
                        
                      ?>
                    <tr>
                      <td><?php echo $nombre ?></td>
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
                      <td class="text-center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modificarCentro"><i class="fas fa-pen"></button></td>

                      <td class="text-center"><button type="button" class="btn badge-danger"><i class="far fa-trash-alt"></i></span></td>
                      <td class="text-center"><button type="button" class="btn badge-warning" ><a href="<?php echo $url."planteles/".$id_centro?>"><i class="far fa-eye"></i></a></span></td>
                    </tr>
                    <?php 
                      }
                    ?>
                      <!-- Modal -->
                      <div class="modal" id="modificarCentro" tabindex="-1" role="dialog" aria-labelledby="modificarCentroLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="modificarCentroLabel">Modificar Centro Educativo</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form>
                                <div class="form-group">
                                  <label for="formGroupExampleInput">Nombre del Centro</label>
                                  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nombre del Centro">
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
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>

 