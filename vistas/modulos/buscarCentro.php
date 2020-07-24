<?php 
if(isset($_POST["buscar"])){

  $nombre=$_POST['buscar'];

  $respuesta = ModeloConsulta::mdlBuscarCentro($nombre);


 ?>

<div class="content-wrapper">
  <div class="content-header align-content-center ">
    <div class="col-12"><!-- Titulo -->
    <h1 class="m-0 text-dark text-center">Centros Educativos Encontrados</h1>
    </div><!-- Fin titulo -->
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
        
        foreach ($respuesta as $key => $mostrar) {
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
          <td class="text-center"><button type="button" class="btn btn-primary"><a class="text-light" href="<?php echo $url."modificar/".$id_centro?>"> <i class="fas fa-pen text-light"></i></a></button></td>
          <td class="text-center"><button type="button" name="eliminar"class="btn badge-danger"><a class="text-light" href="<?php echo $url."eliminar/".$id_centro?>"><i class="far fa-trash-alt"></i></a></button></td>
          <td class="text-center"><button type="button" class="btn badge-warning" ><a href="<?php echo $url."planteles/".$id_centro?>"><i class="far fa-eye"></i></a></button></td>
        </tr>
        <?php
        }
        }
        ?>
      </tbody>
    </table>
    </div><!-- /.table-responsive -->
  </div>
  </div><!-- /.card -->
</div>

<?php 
//****************************************************PLANTELES*****************************************************************+
}
if(isset($_POST["buscarPlantel"])){

  $nombre=$_POST['buscarPlantel'];
  $cve=$_POST['cve'];

  $planteles=ModeloConsulta::mdlBuscarPlantel($nombre,$cve);
 ?>
<div class="content-wrapper">
  <div class="content-header align-content-center ">
    <div class="col-12"><!-- Titulo -->
    <h1 class="m-0 text-dark text-center">Planteles Encontrados</h1>
    </div><!-- Fin titulo -->
  </div>
  <div class="card px-5">
    <!-- /.card-header -->
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table m-0">
          <thead>
            <tr>
              <th>Planteles</th>
              <th class="text-center">Estatus</th>
              <th class="text-center">Modificar</th>
              <th class="text-center">Eliminar</th>
              
            </tr>
          </thead>
          <tbody>
            <?php
            
            
            foreach ($planteles as $key => $mostrar) {
            $plan=$mostrar['Nombre_Plantel'];
            $status=$mostrar['Status'];
            $id_Plantel=$mostrar['cve_Plantel'];
            
            ?>
            <tr>
              <td><?php echo $plan ?></td>

              <?php
              if ($status==1) {
              ?>

              <td class="text-center"><button disabled="" class="badge badge-success"><i class="fas fa-toggle-on"></i></button></td>

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
              <td class="text-center"><button type="button" class="btn btn-primary"><a class="text-light" href="<?php echo $url."modificarPlan/".$id_Plantel?>"><i class="fas fa-pen"></i></a></button></td>
              <td class="text-center"><button type="button" class="btn badge-danger"><a class="text-light" href="<?php echo $url."eliminarPlan/".$id_Plantel?>"><i class="far fa-trash-alt"></i></a></button></td>
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
