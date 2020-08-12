
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
      <img src="<?php echo $url ?>vistas/modulos/logo.png" alt="Logo Edukapp" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><h4>Edukapp</h4></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo $url ?>vistas/modulos/foto.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><h4>Dhamar</h4></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-school"></i>
              <p>
                Centros Educativos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $url."centros"?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Centros Educativos</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Gestión de usuarios
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $url."usuarios" ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Panel de usuarios</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Gestión de ofertas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $url."revision" ?>"  class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>En revisión</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $url."aprobadas" ?>"  class="nav-link">
                  <i class="fas fa-check-circle nav-icon"></i>
                  <p>Aprobadas</p>
                </a>
              </li>
              <li class="nav-item">
                <a   class="nav-link"  data-toggle="modal" data-target="#mostrarmodal">
                  <i class="fas fa-plus-circle nav-icon"></i>
                  <p> Agregar Oferta</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-archive"></i>
              <p>
                Reportes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $url."reporte" ?>"  class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reportes Diarios</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $url."mensual" ?>"  class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reportes Mensuales</p>
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


<div class="modal" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5>Selecciona un Centro Educativo</h5>
      </div>
      <div class="modal-body">
        <form id="contat-form" class="contact" method="post" action="<?php echo $url."insertarOferta" ?>">
          <div class="form-group">
            <?php $centros = ModeloConsulta::mdlMostrarCentrosActivos(); ?>
            <select name="centro" id="centro" class="form-control">
              <?php
              if (count($centros) > 0)
              {
              foreach ($centros as $key => $value) {
              $idCen = $value["cve_Ctro_Educativo"];
              $nomCen = $value["Nombre_Ctro_Educativo"];
              ?>
              <option value="<?php echo $idCen; ?>"><?php echo $nomCen; ?></option>
              <?php
              }
              }
              ?>
            </select>
          </div>
          <br>
          <div class="text-center">
            <input class=" btn btn-primary" type="submit"  value="Siguiente" id="btn-enviar" >
          </div>
        </form>
      </div>
    </div>
  </div>
</div>