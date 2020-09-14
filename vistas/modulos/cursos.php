<div class="content-wrapper">
  <div class="content-header align-content-center ">
    <div class="col-12"><!-- Titulo -->
    <h1 class="m-0 text-dark text-center">Cursos</h1>
    </div><!-- Fin titulo -->
    <div class="p-3  col-sm-12 "><!-- Sección buscar centro-->
    <form method="post"  action="<?php echo $url."buscar"?>"><!--Comienza formulario de buscar-->
    <div class="form-group row ">
      <label class=" col-form-label">Buscar</label>
      <div>
        <input type="text" class="form-control" id="buscar" name="buscar" placeholder="Nombre del curso">
      </div>
      <div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
      </div>
    </div>
    </form><!--Termina formulario de buscar-->
    </div><!-- Fin sección buscar centro-->
    <div class="px-3  col-sm-12"><!--Div insertar-->
    <div class="form-group row">
      <label class="col-form-label">Agregar curso</label>
      <div>
        <button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#insertarCurso"><i class=" fas fa-plus-square"></i></button>
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
          <th class="text-center">Curso</th>
          <th class="text-center">Status</th>
          <th class="text-center">Modificar</th>
          <th class="text-center">Eliminar</th>
          <th class="text-center">Ver Alumnos</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $centros=ControladorConsultas::ctrCursos();
        foreach ($centros as $key => $mostrar) {
        $nombre=$mostrar['nombre_curso'];
        $status=$mostrar['status'];
        $id_curso=$mostrar['id_curso']; 
        ?>
        <tr>
          <td><?php echo $nombre ?></td>
          <?php
          if ($status==1) {
          ?>
          
          <td class="text-center">
            <span class="badge badge-success"><i class="fas fa-toggle-on"></i></span>
          </td>
          <?php
          }else {
          ?>
          <td class="text-center">
            <span class="badge badge-warning"><i class="fas fa-toggle-off"></i></span>
          </td>
          <?php
          }
          ?>
          
          <td class="text-center"><button type="button" class="btn btn-primary"><a href="<?php echo $url."modificar/".$id_curso?>"> <i class="fas fa-pen text-light"></i></a></button></td>
          <td class="text-center"><button type="button" name="eliminar"class="btn badge-danger"><a class="text-light" href="<?php echo $url."eliminar/".$id_curso?>"><i class="far fa-trash-alt"></i></a></button></td>
          <td class="text-center"><button type="button" class="btn badge-warning" ><a class="text-light" href="<?php echo $url."alumnosxcurso/".$id_curso?>"><i class="far fa-eye"></i></a></button></td>
        </tr>
        <?php
        
        }
        ?>
        
        
      </tbody>
    </table>
    </div><!-- /.table-responsive -->
  </div>
  </div><!-- /.card -->
</div>
<!-- Modal Para Insertar Curso-->
<div class="modal" id="insertarCurso" tabindex="-1" role="dialog" aria-labelledby="insertarCursoLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="insertarCursoLabel">Insertar Curso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post"  action="<?php echo $url."registro"?>">
          <div class="form-group">
            <label for="formGroupExampleInput">Nombre</label>
            <input type="text" class="form-control" id="nombreCurso" name="nombreCurso" placeholder="Nombre del curso">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput">Horas</label>
            <input type="text" class="form-control" id="horas" name="horas" placeholder="Horas">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput">Status</label>
          <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-secondary active">
              <input type="radio" name="status" id="status1" value="1" autocomplete="off"> Activo
            </label>
            <label class="btn btn-secondary">
              <input type="radio" name="status" id="status2" value="0" autocomplete="off"> Inactivo
            </label>
          </div>
          </div>
          <input class=" btn btn-primary" type="submit"  value="Guardar" >
        </form>
      </div>
    </div>
  </div>
  </div><!--Fin Modal Isertar Curso-->