<?php 
if (isset($_GET["ruta"])) {
$ruta = explode("/",$_GET["ruta"]);
if(isset($ruta[1])){
$id_alumno=$ruta[1];
}
}
$alumno=ModeloConsulta:: mdlInfoAlumno($id_alumno);
foreach ($alumno as $key => $mostrar) {
$status=$mostrar['status'];
$id_curso=$mostrar['id_curso'];
}
if ($status==1) {
	$elm=ModeloConsulta::mdlDesactivarAlumno($id_alumno);
}else{
	$elm=ModeloConsulta::mdlActivarAlumno($id_alumno);
}
if($elm == "ok"){
?>
<script type="text/javascript">
    var mensaje;
    var opcion = confirm("Modificación exitosa");
    if (opcion == true) {
      window.location.href="<?php echo $url."alumnosxcurso/".$id_curso?>"
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
	