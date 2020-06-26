<div class="content-wrapper">

  <div class="content-header align-content-center ">
    <div class="col-12"><!-- Titulo -->
      <h1 class="m-0 text-dark text-center">Centros Educativos</h1>
    </div><!-- Fin titulo -->
    <div class="p-3  col-sm-12 "><!-- Sección buscar centro-->
      <form method="post"  action="<?php echo $url."buscar"?>">
        <div class="form-group row ">
          <label class=" col-form-label">Buscar</label>
          <div>
            <input type="text" class="form-control" id="buscar" name="buscar" placeholder="Nombre del centro educativo">
          </div>
          <div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
          </div>
        </div>
      </form>
    </div><!-- Fin sección buscar centro-->
    <div class="px-3  col-sm-12"><!--Div insertar-->
      <div class="form-group row">
        <label class="col-form-label">Agregar centro educativo  </label>
        <div>
          <button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#insertarCentro"><i class=" fas fa-plus-square"></i></button>
        </div>
      </div>
    </div><!--Fin div insertar-->
  </div>
  <div class="card px-5"><!-- TABLE: Centros -->
    <div class="card-body p-0"><!-- /.card-header -->
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

            if ($status==1) {
            
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
              <td class="text-center"><button type="button" class="btn btn-primary"><a href="<?php echo $url."modificar/".$id_centro?>"> <i class="fas fa-pen text-light"></i></a></button></td>

              <td class="text-center"><button type="button" name="eliminar"class="btn badge-danger"><a class="text-light" href="<?php echo $url."eliminar/".$id_centro?>"><i class="far fa-trash-alt"></i></a></button></td>

              <td class="text-center"><button type="button" class="btn badge-warning" ><a class="text-light" href="<?php echo $url."planteles/".$id_centro?>"><i class="far fa-eye"></i></a></button></td>
            </tr>

            <?php
            }
          }

            ?>
            

            <!-- Modal Para Insertar Centro-->
            <div class="modal" id="insertarCentro" tabindex="-1" role="dialog" aria-labelledby="insertarCentroLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="insertarCentroLabel">Insertar Centro Educativo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                  </div>
                    <div class="modal-body">
                      <form method="post"  action="<?php echo $url."registro"?>" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="formGroupExampleInput">Nombre del Centro</label>
                          <input required="" type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del Centro">
                        </div>
                        <div class="form-group">
                          <label for="formGroupExampleInput2">Dirección</label>
                          <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección">
                        </div>
                        <div class="form-group">
                          <label for="formGroupExampleInput2">Teléfono</label>
                          <input required="" type="text" class="form-control" id="telefono" name="telefono" placeholder="55-0000-0000">
                        </div>
                        <div class="form-group">
                          <label for="formGroupExampleInput2">Email</label>
                          <input required="" type="email" class="form-control" id="correo" name="correo" placeholder="Email">
                        </div>
                        <!--
                        <div class="form-group">
                          <label for="formGroupExampleInput2">Centro Pagado</label><br>
                          <input type="radio" id="pagado" name="pagado" value=1><label for="formGroupExampleInput2"> Si</label><br>
                          <input type="radio" id="pagado" name="pagado" value=0><label for="formGroupExampleInput2"> No</label><br>
                        </div>
                      -->
                        <div class="form-group">
                          <label for="formGroupExampleInput2">Imagen del logo</label>
                          <input type="file" class="form-control-file" id="logo" name="logo">
                        </div>
                        <div class="form-group">
                          <label for="formGroupExampleInput2">Imagen corporativa</label>
                          <input type="file" class="form-control-file" id="imgcorp" name="imgcorp">
                        </div>
                        <div class="form-group">
                          <label for="formGroupExampleInput2">Color Corporativo</label>
                          <input type="color" id="color" name="color" value="#D9754A">
                        </div>
                        <input class=" btn btn-primary" type="submit"  value="Guardar" >
                      </form>
                    </div>
                  </div>
              </div>
            </div><!--Fin Modal Isertar Centro-->
          </tbody>
        </table>
      </div><!-- /.table-responsive -->
    </div>
  </div><!-- /.card -->
</div>