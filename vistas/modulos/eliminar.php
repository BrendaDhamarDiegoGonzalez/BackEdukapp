<?php  
if (isset($_GET["ruta"])) {

$ruta = explode("/",$_GET["ruta"]);
if(isset($ruta[1])){
$cveCentro = $ruta[1];
}
}

$centros=ModeloConsulta::mdlMostrarCentrosForm($cveCentro);
        foreach ($centros as $key => $mostrar) {
        $status=$mostrar['Status'];
  }

if ($status==1) {
	//$elm=ModeloConsulta::mdlEliminarCentro($cveCentro);
$elm=ModeloConsulta::mdlActualizarVista($cveCentro);
}else{
	$elm=ModeloConsulta::mdlActualizarVista2($cveCentro);
}

if($elm == "ok"){
	?>
	<div class="content-wrapper">
		<div class="content-header align-content-center ">
			<div class="p-6 alert alert-primary text-center align-content-center" role="alert" >
				<strong>El centro fue modificado</strong> 
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
 ?>
