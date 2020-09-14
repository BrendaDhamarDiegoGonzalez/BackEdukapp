<?php
if(isset($_POST["nombreCurso"])){

	$datosCurso = array(
	'nombre' => $_POST['nombreCurso'],
	'horas' => $_POST['horas'],
	'status' => $_POST['status']
	);

	//print_r($datos);
	
	$respuesta = ModeloConsulta::mdlRegistrarCurso($datosCurso);

	//print_r($respuesta);
	if($respuesta == "ok"){
	?>
	<div class="content-wrapper">
		<div class="content-header align-content-center ">
			<div class="p-6 alert alert-primary text-center align-content-center" role="alert" >
				<strong>Centro Registrado!</strong> Los datos fueron guardados
			</div>
			<div class="align-content-center">
			<button type="button" class="btn btn-primary btn-lg"><a class="text-light" href="<?php echo $url."cursos"?>" >Aceptar</a></button>
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
 //****************************************************ALUMNOS**************************************************
if(isset($_POST["nombreAlumno"])){
	
	$datosAlumno = array(
	'nombre' => $_POST['nombreAlumno'],
	'ape' => $_POST['apellidos'],
	'matri' => $_POST['matricula'],
	'curp' => $_POST['curp'],
	'status'=>$_POST['status']
	);

	//print_r($datosPlan);
	
	$respuesta = ModeloConsulta::mdlIngresarAlumno($datosAlumno);

	//print_r($respuesta);

	if($respuesta == "ok"){
	?>
	<div class="content-wrapper">
		<div class="content-header align-content-center ">
			<div class="p-6 alert alert-primary text-center align-content-center" role="alert" >
				<strong>Alumno Registrado!</strong> Los datos fueron guardados
			</div>
			<div class="align-content-center">
			<button type="button" class="btn btn-primary btn-lg"><a class="text-light" href="<?php echo $url."alumnos"?>" >Aceptar</a></button>
			</div>
		</div>
	</div>


	<?php
	} else{
	?>
	<div class="content-wrapper">
		<div class="content-header align-content-center ">
			<div class="alert alert-danger" role="alert">
				<strong>Oh no!</strong> Algo salió mal
			</div>
			<div class="align-content-center">
			<button type="button" class="btn btn-primary btn-lg"><a class="text-light" href="<?php echo $url."alumnos"?>" >Aceptar</a></button>
			</div>
		</div>
	</div>
	<?php 
	}	
}
//********************************************USUARIOS*****************************************************************
if(isset($_POST["nombreUsu"])){

	$datos = array(
	'perfil' => $_POST['perfil'],
	'nombreUsu' => $_POST['nombreUsu'],
	'aPaterno' => $_POST['aPaterno'],
	'aMaterno' => $_POST['aMaterno'],
	'nick' => $_POST['nick'],
	'contra'=>$_POST['contra'],
	'correoUsu'=>$_POST['correoUsu']
	);

	//print_r($datos);
	$respuesta = ModeloConsulta::mdlIngresarUsuario($datos);

	//print_r($respuesta);
	if($respuesta == "ok"){
	?>
	<div class="content-wrapper">
		<div class="content-header align-content-center ">
			<div class="p-6 alert alert-primary text-center align-content-center" role="alert" >
				<strong>Usuario Registrado!</strong> Los datos fueron guardados
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
//********************************************OFERTAS*****************************************************************
if(isset($_POST["nombreOfe"])){

	$datos = array(
	'nombre' => $_POST['nombreOfe'],
	'costo' => $_POST['costo'],
	'dura' => $_POST['dura'],
	'desc' => $_POST['desc'],
	'nivel' => $_POST['nivel'],
	'ofertaHtml'=>$_POST['ofertaHtml'],
	'costoPeri'=>$_POST['costoPeri'],
	'cate'=>$_POST['cate'],
	'nomPdf'=>$_FILES['nomPdf']['name'],
	'moda'=>$_POST['moda'],
	'promo'=>$_POST['promo']
	);

	//print_r("*********************************************".$datos);	
	
	$respuesta = ModeloConsulta::mdlInsertarOferta($datos);
	$obtenerId=ModeloConsulta::mdlObtenerIdOferta();
	$cveOferta=$obtenerId[0];
	//$cve_plantel=$_POST['plantel'];
	//$respuesta = ModeloConsulta::mdlIngresarPlantelOferta($cveOferta,$cve_plantel);
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


	//print_r($respuesta);
	
	if($respuesta == "ok"){
	?>
	<div class="content-wrapper">
		<div class="content-header align-content-center ">
			<div class="p-6 alert alert-primary text-center align-content-center" role="alert" >
				<strong>Oferta Registrada!</strong> Los datos fueron guardados
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
				<strong>Oh no!</strong> Algo salió mal
			</div>
			<div class="align-content-center">
			<button type="button" class="btn btn-primary btn-lg"><a class="text-light" href="<?php echo $url."revision"?>" >Aceptar</a></button>
			</div>
		</div>
	</div>
	<?php 
	}
}
 ?>

