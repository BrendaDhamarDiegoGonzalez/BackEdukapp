<?php
if(isset($_POST["nombre"])){
/*
	 echo $logo = $_FILES['logo']['name'];
	//Si el archivo contiene algo y es diferente de vacio
	if (isset($logo) && $logo != "") {
		//Obtenemos algunos datos necesarios sobre el archivo
		$tipo = $_FILES['logo']['type'];
		$tamano = $_FILES['logo']['size'];
		$temp = $_FILES['logo']['tmp_name'];
		//Se intenta subir al servidor
		if (move_uploaded_file($temp, 'vistas/logos/'.$logo)) {
			//Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
			chmod('vistas/logos/'.$logo, 0777);
			//Mostramos el mensaje de que se ha subido con éxito
			echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
			//Mostramos la imagen subida
			echo '<p><img src="vistas/logos/'.$logo.'"></p>';
			
			}
			else {
			//Si no se ha podido subir la imagen, mostramos un mensaje de error
			echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
		}
	}
	*/

	$logo = $_FILES['logo']['name'];
	$imgcorp = $_FILES['imgcorp']['name'];
	$nombre=$_POST['nombre'];
	$direccion=$_POST['direccion'];
	$telefono=$_POST['telefono'];
	$correo=$_POST['correo'];
	$pagado=$_POST['pagado'];
	$color=$_POST['color'];


	$datos = array(
	'nombre' => $_POST['nombre'],
	'direccion' => $_POST['direccion'],
	'telefono' => $_POST['telefono'],
	'correo' => $_POST['correo'],
	'pagado'=>$_POST['pagado'],
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
 ?>



