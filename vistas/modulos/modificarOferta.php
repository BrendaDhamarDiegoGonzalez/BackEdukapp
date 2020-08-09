<?php
if (isset($_GET["ruta"])) {
$ruta = explode("/",$_GET["ruta"]);
if(isset($ruta[1])){
$cveOferta = $ruta[1];
}
}
$mod=ModeloConsulta::mdlMostrarOfertaForm($cveOferta);
foreach ($mod as $key => $mostrar) {
$cveCentro=$mostrar['cve_Ctro_Educativo'];
$centro=$mostrar['Nombre_Ctro_Educativo'];
$oferta=$mostrar['Nombre'];
$costo=$mostrar['Costo'];
$dura=$mostrar['Duracion'];
$desc=$mostrar['Descripcion'];
$nivel=$mostrar['cve_Nivel'];
$moda=$mostrar['Cve_Modalidad'];
$status=$mostrar['Status'];
$subcategoria=$mostrar['id_subcategoria'];
$categoria=$mostrar['descripcion_cat'];
}
$planOfertas=ModeloConsulta::mdlPlantelesOferta2($cveOferta);
$opcOfertas=ModeloConsulta::mdlOpcionalesOferta($cveOferta);
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
							<p><?php echo $centro ?></p>
							
						</div>
						<div class="form-group">
							<label for="formGroupExampleInput2">Oferta</label><br>
							<input required="" type="text" class="form-control" id="oferta" name="oferta" value="<?php echo $oferta ?>" placeholder="Oferta">
						</div>
						<div class="form-group">
							<label for="formGroupExampleInput2">Costo</label>
							<input required="" type="text" class="d-inline mx-4" id="costo" name="costo" value="<?php echo $costo ?>" placeholder="Costo">
							<label for="formGroupExampleInput2">Duración</label>
							<input required="" type="text" class="d-inline" id="duracion" name="duracion" value="<?php echo $dura ?>" placeholder="Duracion">
						</div>
						
						<div class="form-group">
							<label for="formGroupExampleInput2">Descripción</label><br>
							<textarea class="form-control text-justify" id="desc" name="desc">
							<?php echo $desc ?>
							</textarea>
						</div>
						<div class="form-group">
							<label for="formGroupExampleInput2">Nivel </label>
							<?php $niveles = ModeloConsulta::mdlMostrarNiveles(); ?>
							<select class="custom-select" id="nivel" name="nivel"  >
								<?php
								if (count($niveles) > 0)
								{
								foreach ($niveles as $key => $value) {
								$idniv = $value["cve_Nivel"];
								$nomniv = $value["NombreNivel"];?>
								<option value="<?php echo $idniv; ?>"
									<?php if ($nivel==$idniv) {
										echo "selected";
									} ?>
								><?php echo $nomniv; ?></option>
								<?php
								}
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="formGroupExampleInput2">Modalidad</label>
							<?php $modalidades = ModeloConsulta::mdlMostrarModalidades(); ?>
							<select class="custom-select" id="mod" name="mod" >
								<?php
								if (count($modalidades) > 0)
								{
								foreach ($modalidades as $key => $value) {
								$idmod = $value["Cve_Modalidad"];
								$nomod = $value["Modalidad"];?>
								<option value="<?php echo $idmod; ?>"
									<?php if ($moda==$idmod) {
										echo "selected";
									} ?>
								><?php echo $nomod; ?></option>
								<?php
								}
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="formGroupExampleInput2">Categoria</label>
							<p><?php echo $categoria; ?></p>
						</div>
						<!--
						<div class="form-group">
										<label for="formGroupExampleInput2">Categoria</label>
							<?php $cat = ModeloConsulta::mdlMostrarCategorias(); ?>
							<select name="cate" id="cate" class="form-control">
								<?php
								if (count($cat) > 0)
								{
								foreach ($cat as $key => $value) {
								$idcat = $value["id_categoria"];
								$nomCat = $value["descripcion_cat"];?>
								<option value="<?php echo $idcat; ?>"
									<?php if ($categoria==$idcat) {
										echo "selected";
									} ?>
								><?php echo $nomCat; ?></option>
								<?php
								}
								}
								?>
							</select>
						</div>
						-->
						<div class="form-group">
							<label for="formGroupExampleInput2">Subcategoria</label>
							<?php $subcat = ModeloConsulta::mdlMostrarSubcategorias(); ?>
							<select name="subcate" id="subcate" class="form-control">
								<?php
								if (count($subcat) > 0)
								{
								foreach ($subcat as $key => $value) {
								$idsubcat = $value["id_subcategoria"];
								$nomSubCat = $value["descripcion_subcat"];?>
								<option value="<?php echo $idsubcat; ?>"
									<?php if ($subcategoria==$idsubcat) {
										echo "selected";
									} ?>
								><?php echo $nomSubCat; ?></option>
								<?php
								}
								}
								?>
							</select>
						</div>
						
						<?php
							if ($status!=1) {
						?>
						<div class="form-group">
							<input class="form-check-input" type="radio" name="status" id="status" value="1" >
							<label for="formGroupExampleInput2">Aprobar Oferta</label>
						</div>
						<?php }else{ ?>
						<div class="form-group">
							<input class="form-check-input" type="radio" name="status" id="status" value="0" >
							<label for="formGroupExampleInput2">Deshabilitar Oferta</label>
						</div>
						<?php }  ?>
						<!--Planteles-->
						<div class="invisible off"><input type="cveCentro" name="cveCentro" value="<?php echo $cveCentro; ?>"></div>
						<div class="form-group">
							<label for="formGroupExampleInput2">Planteles</label>
							<div class="form-check">
								<?php $planteles = ModeloConsulta::mdlPlanteles($cveCentro);
								if (count($planteles) > 0)
								{
								foreach ($planteles as $key => $value) {
								$idplan = $value["cve_Plantel"];
								$nomplan = $value["Nombre_Plantel"];
								?>
								<input name="planteles[]" class="form-check-input position-static" value="<?php echo $idplan; ?>" type="checkbox"
								<?php
								foreach ($planOfertas as $key => $value) {
								$idPlantel=$value['cve_Plantel'];
								if ($idplan==$idPlantel) {echo "checked";}} ?>><?php echo $nomplan;?></input><br>
								<?php } } ?>
							</div>
						</div>
						<!--Opcionales-->
						<div class="form-group">
							<label for="formGroupExampleInput2">Escoge los opcionales que se mostraran en la oferta educativa, para solicitar información:</label>
							<div class="form-check">
								<?php $opciones = ModeloConsulta::mdlMostrarOpcionales(); ?>
								<?php
								if (count($opciones) > 0)
								{
								foreach ($opciones as $key => $value) {
								$idop = $value["cve_opcional"];
								$nomop = $value["descripcion"];?>
								<input name="opcionales[]" class="form-check-input position-static" value="<?php echo $idop; ?>" type="checkbox"
								<?php
								foreach ($opcOfertas as $key => $value) {
								$cv_Opc=$value['cve_Opcional'];
								if ($idop==$cv_Opc) {echo "checked";} } ?>><?php echo $nomop; ?></input><br>
								<?php
								}
								}
								?>
							</div>
						</div>
						<input class=" btn btn-primary" type="submit" value="Guardar" >
					</form>
				</div>
			</div>
		</div>
	</div>
</div>