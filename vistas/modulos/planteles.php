<?php  
if (isset($_GET["ruta"])) {

$ruta = explode("/",$_GET["ruta"]);
if(isset($ruta[1])){
$cveCentro = $ruta[1];
}
}

$nomPlan=ControladorConsultas::ctrNomCentro($cveCentro);
$planteles=ControladorConsultas::ctrPlanteles($cveCentro);


foreach ($nomPlan as $key => $mostrar) {
   $cen=$mostrar['Nombre_Ctro_Educativo'];
   $cve=$mostrar['cve_Ctro_Educativo'];
   $pagado=$mostrar['CentroPagado'];
   }

?>
<div class="content-wrapper">
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
             <h1 class="m-0 text-dark text-center">Planteles de <?php echo $cen ?>   <input type="button" onclick="history.back()" name="Regresar" value="Regresar" class="btn btn-info mx-3">  </h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="p-3  col-sm-12 "><!-- Sección buscar -->
      <form method="post"  action="<?php echo $url."buscar"?>">
        <div class="form-group row ">
          <input type="text" class="border-0 col-1 text-light bg-transparent" id="cve" name="cve" readonly="" value="<?php echo $cve ?> " >
          <label class=" col-form-label">Buscar</label>
          <div>
            <input type="text" class="form-control" id="buscarPlantel" name="buscarPlantel" placeholder="Nombre del plantel">
          </div>
          <div>
            
            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
          </div>
        </div>
      </form>
    </div><!-- Fin sección buscar -->
    <div class="px-3  col-sm-12"><!--Div insertar-->
      <div class="form-group row">
        <input type="text" class="border-0 col-1 text-light bg-transparent" id="cve" name="cve" readonly="" value="x" >
        <label class="col-form-label">Agregar plantel  </label>
        <div>
          <button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#insertarPlantel"><i class=" fas fa-plus-square"></i></button>
        </div>
      </div>
    </div><!--Fin div insertar-->
 <div class="card px-5">
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Plantel</th>
                      <th class="text-center">Estatus</th>
                      <th class="text-center">Modificar</th>
                      <th class="text-center">Eliminar</th>
                      
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                      
                      
                      foreach ($planteles as $key => $mostrar) {
                      $id_Plantel=$mostrar['cve_Plantel'];
                      $plan=$mostrar['Nombre_Plantel'];
                      $status=$mostrar['Status'];

                      if ($status==1) {
                        
                      ?>
                    <tr>
                      <td><?php echo $plan ?></td>
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
                      <td class="text-center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modificarPlantel"><a class="text-light" href="<?php echo $url."modificarPlan/".$id_Plantel?>"><i class="fas fa-pen"></i></a></button></td>
                      <td class="text-center"><button type="button" class="btn badge-danger"><a class="text-light" href="<?php echo $url."eliminarPlan/".$id_Plantel?>"><i class="far fa-trash-alt"></i></a></button></td>

                   <?php 

                      }
                    }
  
                    ?>

                     <!-- Modal Para Insertar -->
            <div class="modal" id="insertarPlantel" tabindex="-1" role="dialog" aria-labelledby="insertarPlantelLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="insertarPlatelLabel">Insertar Plantel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                  </div>
                    <div class="modal-body">
                      <form method="post"  action="<?php echo $url."registro"?>" enctype="multipart/form-data">
                        <div class="form-inline">
                          <label for="formGroupExampleInput">Centro Educativo <?php echo $cen ?> </label>
                          <input type="text" class="border-0 col-1 text-light bg-transparent" id="cveCen" name="cveCen" readonly="" value="<?php echo $cveCentro ?> " >
                        </div>
                        <div class="form-group">
                          <label for="formGroupExampleInput">Nombre del Plantel</label>
                          <input required="" type="text" class="form-control" id="nombrePlantel" name="nombrePlantel"placeholder="Nombre del Plantel">
                        </div>
                        <div class="form-group">
                          <label for="formGroupExampleInput2">Tipo: </label><br>
                          <input type="radio" id="tipo" name="tipo" value="Virtual"><label for="formGroupExampleInput2"> Virtual</label><br>
                          <input type="radio" id="tipo" name="tipo" value="Campus"><label for="formGroupExampleInput2"> Campus</label><br>
                        </div>
                        <div class="form-group">
                          <label for="formGroupExampleInput2">Teléfono</label>
                          <input required="" type="text" class="form-control" id="telefonoPlan" name="telefonoPlan"  placeholder="55-0000-0000">
                        </div>
                        <div class="form-group">
                          <label for="formGroupExampleInput2">Email</label>
                          <input required="" type="email" class="form-control" id="correoPlan" name="correoPlan" placeholder="Email">
                        </div>
                        <?php 
                          if ($pagado==1) {
                         ?>
                        <div class="form-group">
                          <label for="formGroupExampleInput2">Envio de Lead</label><br>
                          <input type="radio" id="envio" name="envio" value=1><label for="formGroupExampleInput2">Correo eletrónico</label><br>
                          <input type="radio" id="envio" name="envio" value=3><label for="formGroupExampleInput2"> CRM</label><br>
                        </div>
                        <?php } ?>
                        <div class="form-group">
                          <label for="formGroupExampleInput2">Datos de dirección</label>
                        </div>
                        <div class="form-group">
                          <label for="formGroupExampleInput2">CP</label>
                          <input type="text" class="form-control-file" id="cp" name="cp" placeholder="Código Postal">
                        </div>
                        <div class="form-group">
                          <label for="formGroupExampleInput2">Municipio</label>
                          <input type="text" class="form-control-file" id="mun" name="mun" value="" placeholder="Municipio">
                        </div>
                        <div class="form-group">
                          <label for="formGroupExampleInput2">Colonia</label>
                          <input type="text" class="form-control-file" id="colonia" name="colonia" value="" placeholder="Colonia">
                        </div>
                        <input class=" btn btn-primary" type="submit" value="Guardar" >
                      </form>
                    </div>
                  </div>
              </div>
            </div><!--Fin Modal Insertar-->
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

  </div>