<?php
if(isset($_POST["nombre"])){

	$datos = array(
	'nombre' => $_POST['nombre'],
	'direccion' => $_POST['direccion'],
	'telefono' => $_POST['telefono'],
	'correo' => $_POST['correo'],
	//'pagado'=>$_POST['pagado'],
	'logo' => $_FILES['logo']['name'],
	'imgcorp' => $_FILES['imgcorp']['name'],
	'color'=>$_POST['color']
	);

	//print_r($datos);
	$respuesta = ModeloConsulta::mdlIngresarCentro($datos);

	//print_r($respuesta);
	if($respuesta == "ok"){
	?>
	<div class="content-wrapper">
		<div class="content-header align-content-center ">
			<div class="p-6 alert alert-primary text-center align-content-center" role="alert" >
				<strong>Centro Registrado!</strong> Los datos fueron guardados
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
 //****************************************************PLANTELES**************************************************
if(isset($_POST["nombrePlantel"])){
	
	$datosPlan = array(
	'cveCen'=>$_POST['cveCen'],
	'nombre' => $_POST['nombrePlantel'],
	'tipo' => $_POST['tipo'],
	'telefonoPlan' => $_POST['telefonoPlan'],
	'correoPlan' => $_POST['correoPlan'],
	'envio'=>$_POST['envio'],
	'cp'=>$_POST['cp'],
	'mun'=>$_POST['mun'],
	'colonia'=>$_POST['colonia']
	);

	//print_r($datosPlan);
	
	$respuesta = ModeloConsulta::mdlIngresarPlantel($datosPlan);

	//print_r($respuesta);

	if($respuesta == "ok"){
	?>
	<div class="content-wrapper">
		<div class="content-header align-content-center ">
			<div class="p-6 alert alert-primary text-center align-content-center" role="alert" >
				<strong>Plantel Registrado!</strong> Los datos fueron guardados
			</div>
			<div class="align-content-center">
			<input type="button" onclick="history.back()" name="Regresar" value="Regresar" class="btn btn-info mx-3">
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
			<input type="button" onclick="history.back()" name="Regresar" value="Regresar" class="btn btn-info mx-3">
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

	print_r($datos);
	/*
	$respuesta = ModeloConsulta::mdlInsertarOferta($datos);

	//print_r($respuesta);
	if($respuesta == "ok"){
	?>
	<div class="content-wrapper">
		<div class="content-header align-content-center ">
			<div class="p-6 alert alert-primary text-center align-content-center" role="alert" >
				<strong>Usuario Registrado!</strong> Los datos fueron guardados
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
	}	*/	
}
 ?>

