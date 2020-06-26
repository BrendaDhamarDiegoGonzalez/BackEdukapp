<?php  
if (isset($_GET["ruta"])) {

$ruta = explode("/",$_GET["ruta"]);
if(isset($ruta[1])){
$cvePlantel=$ruta[1];
}
}
		
 
$elmPlan=ModeloConsulta::mdlEliminarPlantel($cvePlantel);

if($elmPlan == "ok"){
	?>
	<div class="content-wrapper">
		<div class="content-header align-content-center ">
			<div class="p-6 alert alert-primary text-center align-content-center" role="alert" >
				<strong>Plantel Eliminado!</strong> Los datos fueron eliminados
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