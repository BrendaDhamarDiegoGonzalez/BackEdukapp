<?php 
if (isset($_GET["ruta"])) {

$ruta = explode("/",$_GET["ruta"]);
if(isset($ruta[1])){
$cvePlantel = $ruta[1];
}
}
$mod=ModeloConsulta::mdlMostrarPlantelForm($cvePlantel);

foreach ($mod as $key => $mostrar) {
			$id=$mostrar['cve_Plantel'];
            $nombre=$mostrar['Nombre_Plantel'];
            $tipo=$mostrar['Tipo_Plantel'];
            $tel=$mostrar['Telefono'];
            $correo=$mostrar['CorreoE_Plantel'];
            $envio=$mostrar['tipo_envio'];
            $cp=$mostrar['CP_plantel'];
            $colonia=$mostrar['Colonia_plantel'];
            $cveCentro=$mostrar['cve_Ctro_Educativo'];
            //$municipio=$mostrar[''];
            //$estado=$mostrar[''];
}
$concen=ModeloConsulta::mdlMostrarCentrosForm($cveCentro);
foreach ($concen as $key => $value) {
	$pagado=$value['CentroPagado'];
}
 ?>
<div class="content-wrapper">
	<div class="content-header align-content-center ">
		<div class="col-12 py-3"><!-- Titulo -->
		<h1 class="m-0 text-dark text-center">Modificación de  <?php echo $nombre;  ?></h1>
		</div><!-- Fin titulo -->
		<div class="card px-5">
			<div class="card-body p-0">
				<div class="">
					<form method="post"  action="<?php echo $url."modificar2/".$id?>" enctype="multipart/form-data" class="px-5 py-3">
						<div class="form-group">
							<label for="formGroupExampleInput">Nombre del Plantel</label>
							<input required="" type="text" class="form-control" id="nombrePlan" name="nombrePlan" value="<?php echo $nombre ?>" placeholder="Nombre del Plantel">
						</div>
						<div class="form-group">
							<label for="formGroupExampleInput2">Tipo: </label><br>
							<?php 
								if ($tipo=="Virtual") {
							 ?>
                          <input type="radio" id="tipo" name="tipo" value="Virtual" checked=""><label for="formGroupExampleInput2"> Virtual</label><br>
                          <input type="radio" id="tipo" name="tipo" value="Campus"><label for="formGroupExampleInput2"> Campus</label><br>
                          <?php 
                          	}else{
                           ?>
                           <input type="radio" id="tipo" name="tipo" value="Virtual"><label for="formGroupExampleInput2"> Virtual</label><br>
                          <input type="radio" id="tipo" name="tipo" value="Campus" checked=""><label for="formGroupExampleInput2"> Campus</label><br>
                          <?php 
                      		}
                           ?>
						</div>
						<div class="form-group">
							<label for="formGroupExampleInput2">Teléfono</label>
							<input required="" type="text" class="form-control" id="telefonoPlan" name="telefonoPlan" value="<?php echo $tel ?>" placeholder="55-0000-0000">
						</div>
						<div class="form-group">
							<label for="formGroupExampleInput2">Email</label>
							<input required="" type="email" class="form-control" id="correoPlan" name="correoPlan" value="<?php echo $correo ?>" placeholder="Email">
						</div>
						<?php 
                          if ($pagado==1) {
                         ?>
						<div class="form-group">
							<label for="formGroupExampleInput2">Envio de Lead</label><br>
							<?php if ($envio==1) {
							  ?>
							<input type="radio" id="envio" name="envio" value=1 checked=""><label for="formGroupExampleInput2">Correo eletrónico</label><br>
                          	<input type="radio" id="envio" name="envio" value=3><label for="formGroupExampleInput2"> CRM</label><br>
                          	<?php }else if($envio==3){  ?>
                          	<input type="radio" id="envio" name="envio" value=1 ><label for="formGroupExampleInput2">Correo eletrónico</label><br>
                          	<input type="radio" id="envio" name="envio" value=3 checked=""><label for="formGroupExampleInput2"> CRM</label><br>
                          	<?php }else if($envio==null){ ?>
                          	<input type="radio" id="envio" name="envio" value=1 ><label for="formGroupExampleInput2">Correo eletrónico</label><br>
                          	<input type="radio" id="envio" name="envio" value=3 ><label for="formGroupExampleInput2"> CRM</label><br>
                          	<?php } ?>
						</div>
						<?php } ?>
						<div class="form-group">
							<label for="formGroupExampleInput2">Datos de dirección</label>
						</div>
						<div class="form-group">
							<label for="formGroupExampleInput2">CP</label>
							<input type="text" class="form-control-file" id="cp" name="cp" value="<?php echo $cp ?>">
						</div>
						<!--
						<div class="form-group">
							<label for="formGroupExampleInput2">Municipio</label>
							<input type="text" class="form-control-file" id="mun" name="mun" value="" placeholder="Municipio">
						</div>
						-->
						<div class="form-group">
							<label for="formGroupExampleInput2">Colonia</label>
							<input type="text" class="form-control-file" id="colonia" name="colonia" value="<?php echo $colonia ?>" >
						</div>
						<input class=" btn btn-primary" type="submit" value="Guardar" >
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
