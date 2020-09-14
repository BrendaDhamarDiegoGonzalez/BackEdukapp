<?php
if (isset($_GET["ruta"])) {
$ruta = explode("/",$_GET["ruta"]);
if(isset($ruta[1])){
$id_curso = $ruta[1];
}
}
$mod=ModeloConsulta::mdlInfoCurso($id_curso);
foreach ($mod as $key => $mostrar) {
$id=$mostrar['id_curso'];
$nombreCurso=$mostrar['nombre_curso'];
}
$alumnos=ControladorConsultas::ctrAlumnosxCurso($id_curso);
foreach ($alumnos as $key => $mostrar) {
$id_alumno=$mostrar['id_alumno'];
$matricula=$mostrar['matricula'];
$nomAlumno=$mostrar['nombre_alumno'];
$apellidos=$mostrar['apellidos'];
$curp=$mostrar['curp'];
$status=$mostrar['status'];
}
?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark text-center">Alumnos del curso <?php echo $nombreCurso ?><input type="button" onclick="history.back()" name="Regresar" value="Regresar" class="btn btn-info mx-3">  </h1>
          </div><!-- /.col -->
          </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <div class="p-3  col-sm-12 "><!-- Sección buscar -->
        <form method="post"  action="<?php echo $url."buscar"?>">
          <div class="form-group row ">
            <input type="text" class="border-0 col-1 text-light bg-transparent invisible d-none" id="id" name="id" readonly="" value="<?php echo $id ?> " >
            <label class=" col-form-label">Buscar</label>
            <div>
              <input type="text" class="form-control" id="buscarAlumno" name="buscarAlumno" placeholder="Nombre del alumno">
            </div>
            <div>
              
              <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
            </div>
          </div>
        </form>
        </div><!-- Fin sección buscar -->
        <!--Div insertar
        <div class="px-3  col-sm-12">
          <div class="form-group row">
            <input type="text" class="border-0 col-1 text-light bg-transparent" id="cve" name="cve" readonly="" value="x" >
            <label class="col-form-label">Agregar Alumno</label>
            <div>
              <button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#insertarAlumno"><i class=" fas fa-plus-square"></i></button>
            </div>
          </div>
        </div><--Fin div insertar-->
        <div class="card px-5">
          <!-- /.card-header -->
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table m-0">
                <thead>
                  <tr>
                    <th>Nombre(s) </th>
                    <th>Apellidos</th>
                    <th class="text-center">Matrícula</th>
                    <th class="text-center">CURP</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Modificar</th>
                    <th class="text-center">Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($alumnos as $key => $mostrar) {
                  $nombre=$mostrar['nombre_alumno'];
                  $apellidos=$mostrar['apellidos'];
                  $matri=$mostrar['matricula'];
                  $curp=$mostrar['curp'];
                  $status=$mostrar['status'];
                  $id_alum=$mostrar['id_alumno'];
                  
                  ?>
                  <script type="text/javascript">
                  function alerta()
                  {
                  var mensaje;
                  var opcion = confirm("¿Modificar Status?");
                  if (opcion == true) {
                  window.location.href="<?php echo $url."eliminarAlumno/".$id_alum?>"
                  } else {
                  mensaje = "Ok";
                  }
                  document.getElementById("ejemplo").innerHTML = mensaje;
                  }
                  </script>
                  <tr>
                    <td><?php echo $nombre ?></td>
                    <td><?php echo $apellidos ?></td>
                    <td><?php echo $matri?></td>
                    <td><?php echo $curp?></td>
                    <?php
                    if ($status==1) {
                    ?>
                    <td class="text-center">
                      <button onclick="alerta();" type="button" class="btn btn-success">
                      <i class="fas fa-toggle-on"></i>
                      </button>
                    </td>
                    <?php
                    }else {
                    ?>
                    <td class="text-center">
                      <button onclick="alerta();" type="button" class="btn btn-warning">
                      <i class="fas fa-toggle-off"></i>
                      </button>
                    </td>
                    <?php
                    }
                    ?>
                    <td class="text-center"><button type="button" class="btn btn-primary"><a class="text-light" href="<?php echo $url."modificarAlumno/".$id_alum?>"><i class="fas fa-pen"></i></a></button></td>
                    <td class="text-center"><button type="button" class="btn badge-danger"><a class="text-light" href="<?php echo $url."eliminarAlumno/".$id_alum?>"><i class="far fa-trash-alt"></i></a></button></td>
                  </tr>
                  <?php
                  }
                  
                  ?>
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
      <!-- Modal Para Insertar -->
      <div class="modal" id="insertarAlumno" tabindex="-1" role="dialog" aria-labelledby="insertarAlumnoLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="insertarAlumnoLabel">Insertar Alumno</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="post"  action="<?php echo $url."registro"?>" enctype="multipart/form-data">
                <div class="form-inline">
                  <label for="formGroupExampleInput">Curso <?php echo $nombreCurso ?> </label>
                  <input type="text" class="invisible d-none" id="cveCurso" name="cveCurso"  value="<?php echo $id ?> " >
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput">Nombre(s) del Alumno</label>
                  <input required="" type="text" class="form-control" id="nombreAlumno" name="nombreAlumno"placeholder="Nombre del Alumno">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput">Apellidos</label>
                  <input required="" type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput">Matricula</label>
                  <input required="" type="number" class="form-control" id="matricula" name="matricula" placeholder="Matrícula">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">CURP</label>
                  <input required="" type="text" class="form-control" id="curp" name="curp"  placeholder="DEFD960812000">
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
                <input class=" btn btn-primary" type="submit" value="Guardar" >
              </form>
            </div>
          </div>
        </div>
        </div><!--Fin Modal Insertar-->