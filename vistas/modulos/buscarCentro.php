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
          <td class="text-center"><button type="button" class="btn btn-primary"><a href="<?php echo $url."modificar/".$id_centro?>"> <i class="fas fa-pen text-light"></i></a></button></td>
          <td class="text-center"><button type="button" name="eliminar"class="btn badge-danger"><a href="<?php echo $url."eliminar/".$id_centro?>"><i class="far fa-trash-alt"></i></a></button></td>
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
}
 ?>