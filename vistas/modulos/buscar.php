<?php
if(isset($_POST["buscar"])){
$nombre=$_POST['buscar'];
$respuesta =ControladorConsultas::ctrBuscarCurso($nombre);
?>
<div class="content-wrapper">
  <div class="content-header align-content-center ">
    <div class="col-12"><!-- Titulo -->
    <h1 class="m-0 text-dark text-center">Cursos Educativos Encontrados</h1>
    </div><!-- Fin titulo -->
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
          <th class="text-center">Ver más</th>
        </tr>
      </thead>
      <tbody>
        <?php
        
        foreach ($respuesta as $key => $mostrar) {
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
          <td class="text-center"><button type="button" class="btn btn-primary"><a class="text-light" href="<?php echo $url."modificar/".$id_curso?>"> <i class="fas fa-pen text-light"></i></a></button></td>
          <td class="text-center"><button type="button" name="eliminar"class="btn badge-danger"><a class="text-light" href="<?php echo $url."eliminar/".$id_curso?>"><i class="far fa-trash-alt"></i></a></button></td>
          <td class="text-center"><button type="button" class="btn badge-warning" ><a href="<?php echo $url."planteles/".$id_curso?>"><i class="far fa-eye"></i></a></button></td>
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
<?php
//****************************************************ALUMNOS*****************************************************************+
}
if(isset($_POST["buscarAlumno"])){
$nombre=$_POST['buscarAlumno'];
$id=$_POST['id'];
$alumnos=ModeloConsulta::mdlBuscarAlumno($nombre,$id);
?>
<div class="content-wrapper">
  <div class="content-header align-content-center ">
    <div class="col-12"><!-- Titulo -->
    <h1 class="m-0 text-dark text-center">Alumnos encontrados</h1>
    </div><!-- Fin titulo -->
  </div>
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
    </div>
  </div>
</div>
<?php
//****************************************************ALUMNOS2*****************************************************************+
}
if(isset($_POST["buscarAlumno2"])){
$nombre=$_POST['buscarAlumno2'];
$alumnos=ModeloConsulta::mdlBuscarAlumno2($nombre);
?>
<div class="content-wrapper">
  <div class="content-header align-content-center ">
    <div class="col-12"><!-- Titulo -->
    <h1 class="m-0 text-dark text-center">Alumnos encontrados</h1>
    </div><!-- Fin titulo -->
  </div>
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
    </div>
  </div>
</div>
<?php
}//Fin Buscar Plantel
//*****************************************************************USUARIOS************************************************
if(isset($_POST["buscarUsuario"])){
$nombre=$_POST['buscarUsuario'];
$usuarios=ModeloConsulta::mdlBuscarUsuario($nombre);
?>
<div class="content-wrapper">
  <div class="content-header align-content-center ">
    <div class="col-12"><!-- Titulo -->
    <h1 class="m-0 text-dark text-center">Usuarios Encontrados</h1>
    </div><!-- Fin titulo -->
  </div>
  <div class="card px-5">
    <!-- /.card-header -->
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
              <td class="text-center"><span class="badge badge-success"><i class="fas fa-toggle-on"></i></span></td>
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
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php
}
//*****************************************************************Ofertas************************************************
if(isset($_POST["buscarOferta"])){
$nombre=$_POST['buscarOferta'];
$ofertas=ModeloConsulta::mdlBuscarOferta($nombre);
?>
<div class="content-wrapper">
  <div class="content-header align-content-center ">
    <div class="col-12"><!-- Titulo -->
    <h1 class="m-0 text-dark text-center">Ofertas Encontradas</h1>
    </div><!-- Fin titulo -->
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
          foreach ($ofertas as $key => $mostrar) {
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
<?php
}//*********************************************Ofertas Aprobadas************************************************
if(isset($_POST["buscarOfeAp"])){
$nombre=$_POST['buscarOfeAp'];
$ofertas=ModeloConsulta::mdlBuscarOfertaAprobada($nombre);
?>
<div class="content-wrapper">
  <div class="content-header align-content-center ">
    <div class="col-12"><!-- Titulo -->
    <h1 class="m-0 text-dark text-center">Ofertas Encontradas</h1>
    </div><!-- Fin titulo -->
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
          foreach ($ofertas as $key => $mostrar) {
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
<?php
}
?>
?>