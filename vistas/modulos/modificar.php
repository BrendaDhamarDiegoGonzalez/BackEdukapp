<?php 
if (isset($_GET["ruta"])) {

$ruta = explode("/",$_GET["ruta"]);
if(isset($ruta[1])){
$id_curso = $ruta[1];
}
}
$mod=ModeloConsulta::mdlInfoCurso($id_curso);

foreach ($mod as $key => $mostrar) {
			$id=$mostrar['id_curso'];
            $nombre=$mostrar['nombre_curso'];
            $horas=$mostrar['horas'];
            $status=$mostrar['status'];
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
							<label for="formGroupExampleInput">Nombre del Curso</label>
							<input required="" type="text" class="form-control" id="nombreCurso" name="nombreCurso" value="<?php echo $nombre ?>" placeholder="Nombre del Curso">
						</div>
						<div class="form-group">
							<label for="formGroupExampleInput2">Horas</label>
							<input type="text" class="form-control" id="horas" name="horas" value="<?php echo $horas ?>" placeholder="Horas">
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
							<label for="formGroupExampleInput2">Centro Pagado</label><br>
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
