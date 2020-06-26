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

<div class="p-3  col-sm-12 "><!-- Sección buscar centro-->
<form method="post"  action="<?php echo $url."buscar"?>">
  <div class="form-group row ">
    <label class=" col-form-label">Buscar</label>
    <div>
      <input type="text" class="form-control" id="buscarUsuario" name="buscarUsuario" placeholder="Nombre del Usuario">
    </div>
    <div>
      <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
    </div>
  </div>
</form>
</div><!-- Fin sección buscar centro-->
<div class="px-3  col-sm-12"><!--Div insertar-->
<div class="form-group row">
  <label class="col-form-label">Agregar Usuario  </label>
  <div>
    <button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#insertarUsuario"><i class=" fas fa-plus-square"></i></button>
  </div>
</div>
</div><!--Fin div insertar-->

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
            $id_usuario=$mostrar['cve_Usuario'];
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
              <td class="text-center"><button type="button" class="btn btn-primary"><a href="<?php echo $url."modificarUsuario/".$id_usuario?>"> <i class="fas fa-pen text-light"></i></a></button></td>
            </tr>
            <?php 

             }
                      
             ?>   
             <!-- Modal -->
            <div class="modal" id="insertarUsuario" tabindex="-1" role="dialog" aria-labelledby="insertarUsuarioLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="insertarUsuarioLabel">Insertar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="post"  action="<?php echo $url."registro"?>">
                      <div class="form-group">
                        <label for="formGroupExampleInput">Nombre(s)</label>
                        <input type="text" class="form-control" id="nombreUsu" name="nombreUsu" placeholder="Nombre(s)">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput">Apellido Paterno</label>
                        <input type="text" class="form-control" id="aPaterno" name="aPaterno" placeholder="Apellido Paterno">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput">Apellido Materno</label>
                        <input type="text" class="form-control" id="aMaterno" name="aMaterno" placeholder="Apellido Materno">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">NickName</label>
                        <input type="text" class="form-control" id="nick" name="nick" placeholder="NickName">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Contraseña</label>
                        <input type="password" class="form-control" id="contra" name="contra" placeholder="Contraseña">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Email</label>
                        <input type="email" class="form-control" id="correoUsu" name="correoUsu" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Perfil</label><br>
                        <input type="radio" id="perfil" name="perfil" value=1><label for="formGroupExampleInput2"> Admon</label><br>
                        <input type="radio" id="perfil" name="perfil" value=2><label for="formGroupExampleInput2"> Asesor</label><br>
                        <input type="radio" id="perfil" name="perfil" value=3><label for="formGroupExampleInput2"> Temporal</label><br>
                        <input type="radio" id="perfil" name="perfil" value=4><label for="formGroupExampleInput2"> Editor</label><br>
                      </div>
                      <input class=" btn btn-primary" type="submit"  value="Guardar" >
                    </form>
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