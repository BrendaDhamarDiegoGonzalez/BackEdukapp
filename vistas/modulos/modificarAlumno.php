<?php
if (isset($_GET["ruta"])) {
$ruta = explode("/",$_GET["ruta"]);
if(isset($ruta[1])){
$idAlumno = $ruta[1];
}
}
$mod=ModeloConsulta::mdlInfoAlumno($idAlumno);
foreach ($mod as $key => $mostrar) {
	$nombre=$mostrar['nombre_alumno'];
	$apellidos=$mostrar['apellidos'];
	$matri=$mostrar['matricula'];
	$curp=$mostrar['curp'];
	$status=$mostrar['status'];
	$id_alum=$mostrar['id_alumno'];
	$id_curso=$mostrar['id_curso'];
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
					<form method="post"  action="<?php echo $url."modificar2/".$idAlumno?>" enctype="multipart/form-data" class="px-5 py-3">
						<div class="form-group">
							<label for="formGroupExampleInput">Nombre del Alumno</label>
							<input required="" type="text" class="form-control" id="nombreAlumno" name="nombreAlumno" value="<?php echo $nombre ?>" placeholder="Nombre del Alumno">
						</div>
						<div class="form-group">
							<label for="formGroupExampleInput">Apellidos</label>
							<input required="" type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $apellidos ?>" placeholder="Apellidos">
						</div>
						<div class="form-group">
							<label for="formGroupExampleInput">Matricula</label>
							<input required="" type="number" class="form-control" id="matricula" name="matricula" value="<?php echo $matri ?>"  placeholder="Matrícula">
						</div>
						<div class="form-group">
							<label for="formGroupExampleInput2">CURP</label>
							<input required="" type="text" class="form-control" id="curp" name="curp" value="<?php echo $curp ?>" placeholder="DEFD960812000">
						</div>
						<?php
							if ($status==1) {
							
						?>
						<div class="form-group">
							<label for="formGroupExampleInput2">Status</label><br>
							<input type="radio" id="status" name="status" value=1 checked=""><label for="formGroupExampleInput2">Activo</label><br>
							<input type="radio" id="status" name="status" value=0><label for="formGroupExampleInput2"> Inactivo</label><br>
						</div>
						<?php
							}else{
						?>
						<div class="form-group">
							<label for="formGroupExampleInput2">Status</label><br>
							<input type="radio" id="status" name="status" value=1 ><label for="formGroupExampleInput2">Activo</label><br>
							<input type="radio" id="status" name="status" value=0 checked=""><label for="formGroupExampleInput2">Inactivo</label><br>
						</div>
						<?php
							}
						?>
						<input class=" btn btn-primary" type="submit" value="Guardar" >
					</form>
				</div>
			</div>
		</div>
	</div>
</div>