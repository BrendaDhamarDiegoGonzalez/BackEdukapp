<?php
if (isset($_GET["ruta"])) {
$ruta = explode("/",$_GET["ruta"]);
if(isset($ruta[1])){
$id_curso=$ruta[1];
}
}
$curso=ModeloConsulta::mdlInfoCurso($id_curso);
foreach ($curso as $key => $mostrar) {
$status=$mostrar['status'];
}
if ($status==1) {
	$elm=ModeloConsulta::mdlDesactivarCurso($id_curso);
}else{
	$elm=ModeloConsulta::mdlActivarCurso($id_curso);
}
if($elm == "ok"){
?>
<script type="text/javascript">
    var mensaje;
    var opcion = confirm("Curso Eliminado");
    if (opcion == true) {
      window.location.href="<?php echo $url."cursos"?>" 
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
	