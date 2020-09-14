<?php
if (isset($_GET["ruta"])) {
$ruta = explode("/",$_GET["ruta"]);
if(isset($ruta[1])){
	$id_curso = $ruta[1];
	$idAlumno=$ruta[1];
	$cveUsuario=$ruta[1];
	$cveOferta=$ruta[1];
}
}
if(isset($_POST["nombreCurso"])){
	$datosCurso = array(
	'nombre' => $_POST['nombreCurso'],
	'horas' => $_POST['horas'],
	'status' => $_POST['status'],
	'id'=>$id_curso
	);
	$respuesta = ModeloConsulta::mdlEditarCurso($datosCurso);
if($respuesta == "ok"){
?>
<script type="text/javascript">
    var mensaje;
    var opcion = confirm("Datos Modificados");
    if (opcion == true) {
      window.location.href="<?php echo $url."modificar/".$id_curso?>" 
  } else {
      mensaje = "Ok";
  }
  document.getElementById("ejemplo").innerHTML = mensaje;
</script>
<?php
}else{
?>
<div class="content-wrapper">
	<div class="content-header align-content-center ">
		<div class="alert alert-danger" role="alert">
			<strong>Oh no!</strong> Algo salió mal
		</div>
		<div class="align-content-center">
			<button type="button" class="btn btn-primary btn-lg"><a class="text-light" href="<?php echo $url."cursos"?>" >Aceptar</a></button>
		</div>
	</div>
</div>
<?php
		}
}
//**************************************************ALUMNOS*******************************************************************
if(isset($_POST["nombreAlumno"])){

$datosAlumno = array(
'id_a'=>$idAlumno,
'nombre' => $_POST['nombreAlumno'],
'apellidos' => $_POST['apellidos'],
'matricula' => $_POST['matricula'],
'curp' => $_POST['curp'],
'status'=>$_POST['status']
);

$respuesta = ModeloConsulta::mdlEditarAlumno($datosAlumno);
if($respuesta == "ok"){
?>
<script type="text/javascript">
    var mensaje;
    var opcion = confirm("Datos Modificados");
    if (opcion == true) {
      window.location.href="<?php echo $url."modificarAlumno/".$idAlumno?>" 
  } else {
      mensaje = "Ok";
  }
  document.getElementById("ejemplo").innerHTML = mensaje;
</script>
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
<script type="text/javascript">
    var mensaje;
    var opcion = confirm("Datos Modificados");
    if (opcion == true) {
      window.location.href="<?php echo $url."modificarUsuario/".$cveUsuario?>" 
  } else {
      mensaje = "Ok";
  }
  document.getElementById("ejemplo").innerHTML = mensaje;
</script>
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
$planteles = ModeloConsulta::mdlPlantelesActivos($cveCentro);


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
$planteles = ModeloConsulta::mdlPlantelesActivos($cveCentro);
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
<script type="text/javascript">
    var mensaje;
    var opcion = confirm("Datos Modificados");
    if (opcion == true) {
      window.location.href="<?php echo $url."modificarOferta/".$cveOferta?>" 
  } else {
      mensaje = "Ok";
  }
  document.getElementById("ejemplo").innerHTML = mensaje;
</script>
<?php
}else{
?>
<script type="text/javascript">
    var mensaje;
    var opcion = confirm("Ocurrió un error");
    if (opcion == true) {
      window.location.href=history.back(); 
  } else {
      mensaje = "Ok";
  }
  document.getElementById("ejemplo").innerHTML = mensaje;
</script>
<?php
}
}

