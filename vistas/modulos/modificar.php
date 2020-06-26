<?php 
if (isset($_GET["ruta"])) {

$ruta = explode("/",$_GET["ruta"]);
if(isset($ruta[1])){
$cveCentro = $ruta[1];
}
}
$mod=ModeloConsulta::mdlMostrarCentrosForm($cveCentro);

foreach ($mod as $key => $mostrar) {
			$id=$mostrar['cve_Ctro_Educativo'];
            $nombre=$mostrar['Nombre_Ctro_Educativo'];
            $dire=$mostrar['Direccion'];
            $tel=$mostrar['Telefono_Ctro_Educativo'];
            $correo=$mostrar['CorreoE_Ctro_Educativo'];
            $pagado=$mostrar['CentroPagado'];
            $color=$mostrar['Color_Corporativo'];
            $logo=$mostrar['ImgLogoHome'];
            $imgcorp=$mostrar['ImgCorporativa'];
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
							<label for="formGroupExampleInput">Nombre del Centro</label>
							<input required="" type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre ?>" placeholder="Nombre del Centro">
						</div>
						<div class="form-group">
							<label for="formGroupExampleInput2">Dirección</label>
							<input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $dire ?>" placeholder="Dirección">
						</div>
						<div class="form-group">
							<label for="formGroupExampleInput2">Teléfono</label>
							<input required="" type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $tel ?>" placeholder="55-0000-0000">
						</div>
						<div class="form-group">
							<label for="formGroupExampleInput2">Email</label>
							<input required="" type="email" class="form-control" id="correo" name="correo" value="<?php echo $correo ?>" placeholder="Email">
						</div>
						<?php
							if ($pagado==1) {
							
						?>
						<div class="form-group">
							<label for="formGroupExampleInput2">Centro Pagado</label><br>
							<input type="radio" id="pagado" name="pagado" value=1 checked=""><label for="formGroupExampleInput2"> Si</label><br>
							<input type="radio" id="pagado" name="pagado" value=0><label for="formGroupExampleInput2"> No</label><br>
						</div>
						<?php
							}else{
						?>
						<div class="form-group">
							<label for="formGroupExampleInput2">Centro Pagado</label><br>
							<input type="radio" id="pagado" name="pagado" value=1 ><label for="formGroupExampleInput2"> Si</label><br>
							<input type="radio" id="pagado" name="pagado" value=0 checked=""><label for="formGroupExampleInput2"> No</label><br>
						</div>
						<?php
							}
						?>
						<div class="form-group">
							<label for="formGroupExampleInput2">Imagen del logo</label>
							<input type="file" class="form-control-file" id="logo" name="logo" value="<?php echo $logo ?>">
						</div>
						<div class="form-group">
							<label for="formGroupExampleInput2">Imagen corporativa</label>
							<input type="file" class="form-control-file" id="imgcorp" name="imgcorp" value="<?php echo $imgcorp ?>">
						</div>
						<div class="form-group">
							<label for="formGroupExampleInput2">Color Corporativo</label>
							<input type="color" id="color" name="color" value="<?php echo $color ?>">
						</div>
						<input class=" btn btn-primary" type="submit" value="Guardar" >
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
