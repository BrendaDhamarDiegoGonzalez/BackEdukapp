<?php  
if (isset($_GET["ruta"])) {

$ruta = explode("/",$_GET["ruta"]);
if(isset($ruta[1])){
$cvePlantel=$ruta[1];
}
}
		

$centros=ModeloConsulta::mdlMostrarPlantelForm($cvePlantel);
        foreach ($centros as $key => $mostrar) {
        $status=$mostrar['Status'];
        $id_centro=$mostrar['cve_Ctro_Educativo'];
  }

if ($status==1) {
$elmPlan=ModeloConsulta::mdlEliminarPlantel($cvePlantel);
}else{
	$elmPlan=ModeloConsulta::mdlEliminarPlantel2($cvePlantel);
}

if($elmPlan == "ok"){
	?>
	<div class="content-wrapper">
		<div class="content-header align-content-center ">
			<div class="p-6 alert alert-primary text-center align-content-center" role="alert" >
				<strong>!Plantel Modificado!</strong> 
			</div>
			<div class="align-content-center">
			<button type="button" class="btn btn-primary btn-lg"><a class="text-light" href="<?php echo $url."planteles/".$id_centro?>">Aceptar</a></button>
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
			<button type="button" class="btn btn-primary btn-lg"><a class="text-light" href="<?php echo $url."planteles/".$id_centro?>" >Aceptar</a></button>
			</div>
		</div>
	</div>
	<?php 
	}		
 ?>