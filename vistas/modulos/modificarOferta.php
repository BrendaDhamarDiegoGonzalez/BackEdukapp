<?php
if (isset($_GET["ruta"])) {
$ruta = explode("/",$_GET["ruta"]);
if(isset($ruta[1])){
$cveOferta = $ruta[1];
}
}
$mod=ModeloConsulta::mdlMostrarOfertaForm($cveOferta);
foreach ($mod as $key => $mostrar) {
$centro=$mostrar['Nombre_Ctro_Educativo'];
$oferta=$mostrar['Nombre'];
$costo=$mostrar['Costo'];
$dura=$mostrar['Duracion'];
$desc=$mostrar['Descripcion'];
$nivel=$mostrar['NombreNivel'];
$moda=$mostrar['Modalidad'];
$status=$mostrar['Status'];
}
?>
<div class="content-wrapper">
	<div class="content-header align-content-center ">
		<div class="col-12 py-3"><!-- Titulo -->
		<h1 class="m-0 text-dark text-center">Modificación de  <?php echo $oferta;  ?></h1>
		</div><!-- Fin titulo -->
		<div class="card px-5">
			<div class="card-body p-0">
				<div class="">
					<form method="post"  action="<?php echo $url."modificar2/".$cveOferta?>" class="px-5 py-3">
						<div class="form-group">
							<label for="formGroupExampleInput">Nombre del Centro Educativo</label>
							<input type="text" readonly class="form-control" id="nombreCentro" name="nombreCentro" value="<?php echo $centro ?>">
						</div>
						<div class="form-group">
							<label for="formGroupExampleInput2">Oferta</label><br>
							<input required="" type="text" class="form-control" id="oferta" name="oferta" value="<?php echo $oferta ?>" placeholder="Oferta">
						</div>
						<div class="form-group">
							<label for="formGroupExampleInput2">Costo</label>
							<input required="" type="text" class="form-control" id="costo" name="costo" value="<?php echo $costo ?>" placeholder="Costo">
						</div>
						<div class="form-group">
							<label for="formGroupExampleInput2">Duración</label>
							<input required="" type="text" class="form-control" id="duracion" name="duracion" value="<?php echo $dura ?>" placeholder="Duracion">
						</div>
						<div class="form-group">
							<label for="formGroupExampleInput2">Descripción</label><br>
							<textarea class="form-control text-justify" id="desc" name="desc">
							<?php echo $desc ?>
							</textarea>
						</div>
						<div class="form-group">
							<label for="formGroupExampleInput2">Nivel</label>
							<select class="custom-select" id="nivel" name="nivel" >
								<option selected="">Seleccione una opción</option>
								<option value="1">Licenciaturas</option>
								<option value="2">Maestrías</option>
								<option value="3">Posgrados</option>
								<option value="4">Diplomados</option>
								<option value="5">Cursos</option>
								<option value="6">Carreras Técnicas</option>
								<option value="7">Programas en línea</option>
								<option value="8">Preparatoria</option>
							</select>
						</div>
						<div class="form-group">
							<label for="formGroupExampleInput2">Modalidad</label>
							<select class="custom-select" id="mod" name="mod" >
								<option selected="">Seleccione una opción</option>
								<option value="1">En línea y presencial</option>
								<option value="2">En línea</option>
								<option value="3">Presencial</option>
								<option value="4">Semipresencial</option>
							</select>
						</div>
						<?php
							if ($status!=1) {
						?>
						<div class="form-group">
							<input class="form-check-input" type="radio" name="status" id="status" value="1" required="">
							<label for="formGroupExampleInput2">Aprobar Oferta</label>
						</div>
						<?php }else{ ?>
						<div class="form-group">
							<input class="form-check-input" type="radio" name="status" id="status" value="0" required="">
							<label for="formGroupExampleInput2">Deshabilitar Oferta</label>
						</div>
						<?php }  ?>
						<div class="form-group">
							<label for="formGroupExampleInput2">Planteles</label>
							<div class="form-check">
								<?php $planteles = ModeloConsulta::mdlPlantelesOferta($cveOferta); ?>
								<?php
								if (count($planteles) > 0)
								{
								foreach ($planteles as $key => $value) {
								$idplan = $value["cve_Plantel"];
								$nomplan = $value["Nombre_Plantel"];?>
								<input class="form-check-input position-static" value="<?php echo $idplan; ?>" type="checkbox"><?php echo $nomplan; ?></input><br>
								<?php
								}
								}
								?>
							</div>
							<div class="form-group">
								<label for="formGroupExampleInput2">Escoge los opcionales que se mostraran en la oferta educativa, para solicitar información:</label>
								<br>
								
									<input name="chekSexo" type="checkbox" id="chekSexo" value="1">
									Sexo : M / F
								
								<br>
								
									<input name="chekPrograma" type="checkbox" id="chekPrograma" value="2">
									¿Cuándo deseas iniciar el programa? De inmediato / Dentro de 1 a 3 meses / En 3 meses o despúes.
								
								<br>
								
									<input name="chekEdad" type="checkbox" id="chekEdad" value="3">
									Edad
								
								<br>
								
									<input name="chekFecha" type="checkbox" id="chekFecha" value="4">
									Fecha de nacimiento
								
								<br>
								
									<input name="chekNivel" type="checkbox" id="chekNivel" value="5">
									Nivel máximo de estudios: Certificado de preparatoria / Título de Licenciatura / Título de Maestría / Otro
								
								<br>
								
									<input name="chekSegmentacion" type="checkbox" id="chekSegmentacion" value="6">
									Segmentación por municipios
								
								<br>
								
									<input name="chekCP" type="checkbox" id="chekCP" value="7">
									Código Postal
								
								<br>
								
									<input name="chekLic" type="checkbox" id="chekLic" value="8">
									Licenciado: SI / NO
								
								<br>
								
									<input name="chekNuevo" type="checkbox" id="chekNuevo" value="9">
									¿Nuevo ingreso o revalidación? : Nuevo Ingreso / Revalidación
								
								<br>
								
									<input name="chekHorario" type="checkbox" id="chekHorario" value="10">
									Horario para contactar
								
								<br>
								
									<input name="chekForma" type="checkbox" id="chekForma" value="11">
									Forma de contacto
								
								<br>
								<input class=" btn btn-primary mt-3" type="submit" value="Guardar" >
								<input type="button" onclick="history.back()" name="Regresar" value="Regresar" class="btn btn-info mx-3 mt-3">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>