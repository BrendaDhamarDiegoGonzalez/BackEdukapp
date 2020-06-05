<div class="content-wrapper">
  
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark text-center">Panel de usuarios</h1>
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
              <th>Nombre</th>
              <th>Nick_usuario</th>
              <th class="text-center">Perfil</th>
              <th class="text-center">Status</th> 
              <th class="text-center">Modificar</th>     
            </tr>
          </thead>
          <tbody>
            <?php

            $usuarios=ControladorConsultas::ctrUsuarios();

            foreach ($usuarios as $key => $mostrar) {
            $nombreus=$mostrar['Nombre_Usuario'];
            $nick=$mostrar['Nick_Usuario'];
            $perfil=$mostrar['cve_Perfil'];
            $status=$mostrar['Status'];

            switch ($perfil) {
              case 1:
                $tipo='Admon';
                break;
              case 2:
                $tipo='Asesor';
                break;
              case 3:
                $tipo='Temporal';
                break;
              case 4:
                $tipo='Editor';
                break;
              
              default:
                $tipo='Indefinido';
                break;
            }
                        
            ?>
            <tr>
              <td><?php echo $nombreus ?></td>
              <td><?php echo $nick ?></td>
              <td class="text-center"><?php echo $tipo ?></td>
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
              <td class="text-center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modificarUsuario"><i class="fas fa-pen"></button></td>
            </tr>
            <?php 

             }
                      
             ?>   
             <!-- Modal -->
            <div class="modal" id="modificarUsuario" tabindex="-1" role="dialog" aria-labelledby="modificarUsuarioLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modificarUsuarioLabel">Modificar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form>
                      <div class="form-group">
                        <label for="formGroupExampleInput">Nombre(s)</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nombre(s)">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput">Apellido Paterno</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Apellido Paterno">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput">Apellido Materno</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Apellido Materno">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">NickName</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="NickName">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Contraseña</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Contraseña">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Email</label>
                        <input type="email" class="form-control" id="formGroupExampleInput2" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Perfil</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Perfil">
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
    </div><!-- /.card-body -->
  </div>

</div>