<?php
if (isset($_GET["ruta"])) {
$ruta = explode("/",$_GET["ruta"]);
if(isset($ruta[1])){
$cveUsuario = $ruta[1];
}
}
$mod=ModeloConsulta::mdlMostrarUsuarioForm($cveUsuario);
foreach ($mod as $key => $mostrar) {


	$nombreus=$mostrar['Nombre_Usuario'];
	$apat=$mostrar['Apaterno_Usuario'];
	$amat=$mostrar['Amaterno_Usuario'];
	$nick=$mostrar['Nick_Usuario'];
	$perfil=$mostrar['cve_Perfil'];
	$status=$mostrar['Status'];
	$correous=$mostrar['Email'];
}
?>
<div class="content-wrapper">
	<div class="content-header align-content-center ">
		<div class="col-12 py-3"><!-- Titulo -->
		<h1 class="m-0 text-dark text-center">Modificación de  <?php echo $nombreus;  ?></h1>
		</div><!-- Fin titulo -->
		<div class="card px-5">
			<div class="card-body p-0">
				<div class="">
					<form method="post"  action="<?php echo $url."modificar2/".$cveUsuario?>" class="px-5 py-3">
						<div class="form-group">
							<label for="formGroupExampleInput">Nombre(s)</label>
							<input type="text" class="form-control" id="nombreUsu" name="nombreUsu" placeholder="Nombre(s)" value="<?php echo $nombreus ?>">
						</div>
						<div class="form-group">
							<label for="formGroupExampleInput">Apellido Paterno</label>
							<input type="text" class="form-control" id="aPaterno" name="aPaterno" placeholder="Apellido Paterno" value="<?php echo $apat ?>">
						</div>
						<div class="form-group">
							<label for="formGroupExampleInput">Apellido Materno</label>
							<input type="text" class="form-control" id="aMaterno" name="aMaterno" placeholder="Apellido Materno" value="<?php echo $amat ?>">
						</div>
						<div class="form-group">
							<label for="formGroupExampleInput2">NickName</label>
							<input type="text" class="form-control" id="nick" name="nick" placeholder="NickName" value="<?php echo $nick ?>">
						</div>
						<div class="form-group">
							<label for="formGroupExampleInput2">Contraseña</label>
							<input type="password" class="form-control" id="contra" name="contra" placeholder="Contraseña">
						</div>
						<div class="form-group">
							<label for="formGroupExampleInput2">Email</label>
							<input type="email" class="form-control" id="correoUsu" name="correoUsu" placeholder="Email" value="<?php echo $correous ?>">
						</div>
						<div class="form-group">
							<label for="formGroupExampleInput2">Perfil</label><br>
							<?php if ($perfil=="") {
							 ?>
							<input type="radio" id="perfil" name="perfil" value=1><label for="formGroupExampleInput2"> Admon</label><br>
							<input type="radio" id="perfil" name="perfil" value=2><label for="formGroupExampleInput2"> Asesor</label><br>
							<input type="radio" id="perfil" name="perfil" value=3><label for="formGroupExampleInput2"> Temporal</label><br>
							<input type="radio" id="perfil" name="perfil" value=4><label for="formGroupExampleInput2"> Editor</label><br>
							<?php } ?>
							<?php if ($perfil==1) {
							 ?>
							<input checked="" type="radio" id="perfil" name="perfil" value=1><label for="formGroupExampleInput2"> Admon</label><br>
							<input type="radio" id="perfil" name="perfil" value=2><label for="formGroupExampleInput2"> Asesor</label><br>
							<input type="radio" id="perfil" name="perfil" value=3><label for="formGroupExampleInput2"> Temporal</label><br>
							<input type="radio" id="perfil" name="perfil" value=4><label for="formGroupExampleInput2"> Editor</label><br>
							<?php } ?>
							<?php if ($perfil==2) {
							 ?>
							<input type="radio" id="perfil" name="perfil" value=1><label for="formGroupExampleInput2"> Admon</label><br>
							<input checked="" type="radio" id="perfil" name="perfil" value=2><label for="formGroupExampleInput2"> Asesor</label><br>
							<input type="radio" id="perfil" name="perfil" value=3><label for="formGroupExampleInput2"> Temporal</label><br>
							<input type="radio" id="perfil" name="perfil" value=4><label for="formGroupExampleInput2"> Editor</label><br>
							<?php } ?>
							<?php if ($perfil==3) {
							 ?>
							<input type="radio" id="perfil" name="perfil" value=1><label for="formGroupExampleInput2"> Admon</label><br>
							<input type="radio" id="perfil" name="perfil" value=2><label for="formGroupExampleInput2"> Asesor</label><br>
							<input checked="" type="radio" id="perfil" name="perfil" value=3><label for="formGroupExampleInput2"> Temporal</label><br>
							<input type="radio" id="perfil" name="perfil" value=4><label for="formGroupExampleInput2"> Editor</label><br>
							<?php } ?>
							<?php if ($perfil==4) {
							 ?>
							<input type="radio" id="perfil" name="perfil" value=1><label for="formGroupExampleInput2"> Admon</label><br>
							<input type="radio" id="perfil" name="perfil" value=2><label for="formGroupExampleInput2"> Asesor</label><br>
							<input type="radio" id="perfil" name="perfil" value=3><label for="formGroupExampleInput2"> Temporal</label><br>
							<input checked="" type="radio" id="perfil" name="perfil" value=4><label for="formGroupExampleInput2"> Editor</label><br>
							<?php } ?>
						</div>
						<input class=" btn btn-primary" type="submit"  value="Guardar" >
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


              