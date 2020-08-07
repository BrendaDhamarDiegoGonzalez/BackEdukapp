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
        <div class="p-3  col-sm-12 "><!-- Sección buscar oferta-->
        <form method="post"  action="<?php echo $url."buscar"?>"><!--Comienza formulario de buscar-->
        <div class="form-group row ">
          <label class=" col-form-label">Filtro</label>
          <div>
            <input type="text" class="form-control" id="buscarOferta" name="buscarOferta" placeholder="Nombre centro educativo">
          </div>
          <div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
          </div>
        </div>
        </form><!--Termina formulario de buscar-->
        </div><!-- Fin sección buscar oferta-->
        <div class="px-3  col-sm-12"><!--Div insertar-->
        <div class="form-group row">
          <label class="col-form-label">Agregar Oferta  </label>
          <div>
            <button type="button" class="btn btn-primary mx-2"><a class="text-light" href="<?php echo $url."insertarOferta"?>"><i class=" fas fa-plus-square"></i></a></button>
          </div>
        </div>
        </div><!--Fin div insertar-->
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
                $id_Ofer=$mostrar['cve_OfertaEdu'];
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
                  <td class="text-center"><button type="button" class="btn btn-primary"><a class="text-light" href="<?php echo $url."modificarOferta/".$id_Ofer?>"><i class="fas fa-pen"></i></a></button></td>
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