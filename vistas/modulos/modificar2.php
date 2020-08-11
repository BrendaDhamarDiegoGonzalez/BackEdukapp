<?php
if (isset($_GET["ruta"])) {
$ruta = explode("/",$_GET["ruta"]);
if(isset($ruta[1])){
	$cveCentro = $ruta[1];
	$cvePlan=$ruta[1];
	$cveUsuario=$ruta[1];
	$cveOferta=$ruta[1];
}
}
if(isset($_POST["nombre"])){
	$datos = array(
	'nombre' => $_POST['nombre'],
	'direccion' => $_POST['direccion'],
	'telefono' => $_POST['telefono'],
	'correo' => $_POST['correo'],
	'pagado'=>$_POST['pagado'],
	'logo' => $_FILES['logo']['name'],
	'imgcorp' => $_FILES['imgcorp']['name'],
	'color'=>$_POST['color'],
	'id'=>$cveCentro
	);
	//print_r($datos);
	//print_r($id);
	$respuesta = ModeloConsulta::mdlEditarCentro($datos);
if($respuesta == "ok"){
?>
<div class="content-wrapper">
	<div class="content-header align-content-center ">
		<div class="p-6 alert alert-primary text-center align-content-center" role="alert" >
			<strong>Centro Modificado!</strong> Los datos fueron modificados
		</div>
		<div class="align-content-center">
			<button type="button" class="btn btn-primary btn-lg"><a class="text-light" href="<?php echo $url."centros"?>" >Aceptar</a></button>
		</div>
	</div>
</div>
<?php
}else{
?>
<div class="content-wrapper">
	<div class="content-header align-content-center ">
		<div class="alert alert-danger" role="alert">
			<strong>Oh no!</strong> Algo salió mal
		</div>
		<div class="align-content-center">
			<button type="button" class="btn btn-primary btn-lg"><a class="text-light" href="<?php echo $url."centros"?>" >Aceptar</a></button>
		</div>
	</div>
</div>
<?php
		}
}
//**************************************************PLANTELES*******************************************************************
if(isset($_POST["nombrePlan"])){

$datosPlan = array(
'id_p'=>$cvePlan,
'nombre' => $_POST['nombrePlan'],
'tipo' => $_POST['tipo'],
'telefonoPlan' => $_POST['telefonoPlan'],
'correoPlan' => $_POST['correoPlan'],
'envio'=>$_POST['envio'],
'cp'=>$_POST['cp'],
//'mun'=>$_POST['mun'],
'colonia'=>$_POST['colonia']
);
//print_r($datosPlan);
//print_r($id);

$respuesta = ModeloConsulta::mdlEditarPlantel($datosPlan);
if($respuesta == "ok"){
?>
<div class="content-wrapper">
	<div class="content-header align-content-center ">
		<div class="p-6 alert alert-primary text-center align-content-center" role="alert" >
			<strong>Plantel Modificado!</strong> Los datos fueron modificados
		</div>
		<div class="align-content-center">
			<button type="button" class="btn btn-primary btn-lg"><a class="text-light" href="<?php echo $url."centros"?>" >Aceptar</a></button>
		</div>
	</div>
</div>
<?php
}else{
?>
<div class="content-wrapper">
	<div class="content-header align-content-center ">
		<div class="alert alert-danger" role="alert">
			<strong>Oh no!</strong> Algo salió mal
		</div>
		<div class="align-content-center">
			<button type="button" class="btn btn-primary btn-lg"><a class="text-light" href="<?php echo $url."centros"?>" >Aceptar</a></button>
		</div>
	</div>
</div>
<?php
		}
}
//**********************************************************USUARIOS********************************************************
if(isset($_POST["nombreUsu"])){
$datosus = array(
'perfil' => $_POST['perfil'],
'nombreUsu' => $_POST['nombreUsu'],
'aPaterno' => $_POST['aPaterno'],
'aMaterno' => $_POST['aMaterno'],
'nick' => $_POST['nick'],
'contra'=>$_POST['contra'],
'correoUsu'=>$_POST['correoUsu'],
'idUsuario'=>$cveUsuario
);
//print_r($datosus);

$respuesta = ModeloConsulta::mdlEditarUsuario($datosus);
if($respuesta == "ok"){
?>
<div class="content-wrapper">
	<div class="content-header align-content-center ">
		<div class="p-6 alert alert-primary text-center align-content-center" role="alert" >
			<strong>Usuario Modificado!</strong> Los datos fueron modificados
		</div>
		<div class="align-content-center">
			<button type="button" class="btn btn-primary btn-lg"><a class="text-light" href="<?php echo $url."usuarios"?>" >Aceptar</a></button>
		</div>
	</div>
</div>
<?php
}else{
?>
<div class="content-wrapper">
	<div class="content-header align-content-center ">
		<div class="alert alert-danger" role="alert">
			<strong>Oh no!</strong> Algo salió mal
		</div>
		<div class="align-content-center">
			<button type="button" class="btn btn-primary btn-lg"><a class="text-light" href="<?php echo $url."usuarios"?>" >Aceptar</a></button>
		</div>
	</div>
</div>
<?php
	}
}
//***********************************************************OFERTAS**********************************************

if(isset($_POST["oferta"])){
$datosof = array(
'oferta'=>$_POST['oferta'],
'costo'=>$_POST['costo'],
'duracion'=>$_POST['duracion'],
'desc'=>$_POST['desc'],
'nivel'=>$_POST['nivel'],
'mod'=>$_POST['mod'],
'subcate' => $_POST['subcate'],
'oferHtml'=>$_POST['ofertaHtml'],
//'cate' => $_POST['cate'],
//'planteles' =>$_POST['planteles'], 
//'plantelesElim' =>$_POST['plantelesElim'],
//'opcionales' =>$_POST['opcionales'] ,
'idOferta'=>$cveOferta
);

if(isset($_POST["statusOferta"])){
	if ($_POST["statusOferta"]==1) {
		//print_r("******************************".$_POST["statusOferta"]."Entra a aprobar");
		$aprobar=ModeloConsulta::mdlAprobarOferta($cveOferta);
	}else if($_POST["statusOferta"]==0){
		//print_r("***************************".$_POST["statusOferta"]."Entra a deshabilitar");
		$aprobar=ModeloConsulta::mdlDeshabilitarOferta($cveOferta);
	}
}

if(isset($_POST["plantelesElim"])){
$planOfertas=ModeloConsulta::mdlPlantelesOferta2($cveOferta);
if (count($planOfertas) > 0){
	for($i=0;$i<count($planOfertas);$i++){
	if (isset($_POST["plantelesElim"][$i]) ){
	$cve_plantelElim=$_POST["plantelesElim"][$i];
if ($cve_plantelElim>0) {
	//print_r($cve_plantelElim."Planteles eliminados");
	$eliminar=ModeloConsulta::mdlEliminarPlantelOferta($cveOferta,$cve_plantelElim);
}}}}
}

if(isset($_POST["planteles"])){
$cveCentro=$_POST['cveCentro'];
$planteles = ModeloConsulta::mdlPlanteles($cveCentro);


if (count($planteles) > 0){
for($i=0;$i<count($planteles);$i++){
	if (isset($_POST["planteles"][$i]) ){
	$cve_plantel=$_POST["planteles"][$i];
if ($cve_plantel>0) {
	$insertar= ModeloConsulta::mdlIngresarPlantelOferta($cveOferta,$cve_plantel);
	//print_r($cve_plantel."Planteles a ingresar");
	
}}}}
}

if(isset($_POST["opcionales"])){
	$cveCentro=$_POST['cveCentro'];
$planteles = ModeloConsulta::mdlPlanteles($cveCentro);
$opciones = ModeloConsulta::mdlMostrarOpcionales();

foreach ($planteles as $key => $value) {
	$cve_plantel = $value["cve_Plantel"];
if (count($opciones) > 0){
for($i=0;$i<count($opciones);$i++){
	if (isset($_POST["opcionales"][$i]) ){
	$opcion=$_POST["opcionales"][$i];
if ($opcion>0) {
	$insertarOp= ModeloConsulta::mdlIngresarOpcionales($cveOferta,$cve_plantel,$opcion);
	//print_r($opcion." Opcionales".$cve_plantel." Plantel".$cveOferta." Oferta");
}}}}
}}
//print_r($datosof);
	
$respuesta = ModeloConsulta::mdlEditarOferta($datosof);
if($respuesta == "ok"){
?>
<div class="content-wrapper">
	<div class="content-header align-content-center ">
		<div class="p-6 alert alert-primary text-center align-content-center" role="alert" >
			<strong>Oferta Modificada!</strong> Los datos fueron modificados
		</div>
		<div class="align-content-center">
			<button type="button" class="btn btn-primary btn-lg"><a class="text-light" href="<?php echo $url."revision"?>" >Aceptar</a></button>
		</div>
	</div>
</div>
<?php
}else{
?>
<div class="content-wrapper">
	<div class="content-header align-content-center ">
		<div class="alert alert-danger" role="alert">
			<strong>Algo salió mal  </strong> Rellene todos los campos del formulario
		</div>
		<div class="align-content-center">
			<input type="button" onclick="history.back()" name="Regresar" value="Regresar" class="btn btn-info mx-3">
		</div>
	</div>
</div>
<?php
}
}