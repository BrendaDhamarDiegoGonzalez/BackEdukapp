<?php
/*
if (isset($_GET["ruta"])) {

$ruta = explode("/",$_GET["ruta"]);
if(isset($ruta[1])){
$cveCentro = $ruta[1];
}
}
*/
if(isset($_POST["nombre"])){

	$logo = $_FILES['logo']['name'];
	$imgcorp = $_FILES['imgcorp']['name'];
	$nombre=$_POST['nombre'];
	$direccion=$_POST['direccion'];
	$telefono=$_POST['telefono'];
	$correo=$_POST['correo'];
	$pagado=$_POST['pagado'];
	$color=$_POST['color'];
	$id = $_POST['id_c'];


	$datos = array(
	'nombre' => $_POST['nombre'],
	'direccion' => $_POST['direccion'],
	'telefono' => $_POST['telefono'],
	'correo' => $_POST['correo'],
	'pagado'=>$_POST['pagado'],
	'logo' => $_FILES['logo']['name'],
	'imgcorp' => $_FILES['imgcorp']['name'],
	'color'=>$_POST['color'],
	'id'=>$_POST['id_c']
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
 ?>



