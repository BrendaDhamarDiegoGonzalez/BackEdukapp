<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo $url.""?>" class="brand-link">
      <img src="<?php echo $url ?>vistas/img/ico.jpg"  class="brand-image img-circle elevation-3"
      style="opacity: .8">
      <span class="brand-text font-weight-light"><h4>Emprove</h4></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Dhamar
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $url."centros"?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cerrar Sesión</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-school"></i>
              <p>
                Cursos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $url."cursos"?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ver Cursos</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a class="nav-link"  data-toggle="modal" data-target="#insertarCurso">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registrar Curso</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Alumnos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $url."alumnos" ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ver Alumnos</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a class="nav-link"  data-toggle="modal" data-target="#insertarAlumno">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registrar Alumnos</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
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