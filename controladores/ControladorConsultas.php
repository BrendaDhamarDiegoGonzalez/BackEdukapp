<?php


class ControladorConsultas{
	
	static public function ctrConsultaBD(){

		$respuesta = ModeloConsulta::mdlConsultaBD();

		return $respuesta;

	}
	static public function ctrConsultaCentros(){

		$consulta = ModeloConsulta::mdlConsultaCentros();

		return $consulta;

	}
	static public function ctrConsultaOfertas(){

		$consulta = ModeloConsulta::mdlConsultaOfertas();

		return $consulta;

	}
	//Para aspirantes de hoy
	static public function ctrAspihoy($hoy){

		$respuesta = ModeloConsulta::mdlAspihoy($hoy);

		return $respuesta;

	}

	//Para llenar tabla centros educativos
	static public function ctrCentros(){

		$respuesta = ModeloConsulta::mdlMostrarCentros();
		 
		return $respuesta;

	}
	//Para llenar tabla planteles
	static public function ctrPlanteles($cveCentro){

		$respuesta = ModeloConsulta::mdlPlanteles($cveCentro);
		 
		return $respuesta;

	}
	//Para llenar tabla usuarios
	static public function ctrUsuarios(){

		$respuesta = ModeloConsulta::mdlMostrarUsuarios();
		 
		return $respuesta;

	}
	//Para llenar tabla Ofertas en revisión
	static public function ctrOrevision(){

		$respuesta = ModeloConsulta::mdlMostrarOrevision();
		 
		return $respuesta;

	}
	//Para llenar tabla Ofertas aprobadas
	static public function ctrOaprobadas(){

		$respuesta = ModeloConsulta::mdlMostrarOaprobadas();
		 
		return $respuesta;

	}
	//Para llenar tabla Ofertas rechazadas
	static public function ctrOrechazadas(){

		$respuesta = ModeloConsulta::mdlMostrarOrechazadas();
		 
		return $respuesta;

	}
	//Para centros educativos de hoy
	static public function ctrCenhoy($hoy){

		$respuesta = ModeloConsulta::mdlCenhoy($hoy);

		return $respuesta;

	}
	//********************************************************//
	//							CRUD 						//
	//********************************************************//
	
	static public function ctrInsertarCentro(){

		if(isset($_POST["nombre"])){
		$nombre=$_POST['nombre'];
		$direccion=$_POST['direccion'];
		$telefono=$_POST['telefono'];
		$correo=$_POST['correo'];
		$pagado=$_POST['pagado'];
		$logo=$_POST['logo'];
		$imgcorp=$_POST['imgcorp'];
		$color=$_POST['color'];

		$datos = array(
		'nombre' => $_POST['nombre'],
		'direccion' => $_POST['direccion'],
		'telefono' => $_POST['telefono'],
		'correo' => $_POST['correo'],
		'pagado'=>$_POST['pagado'],
		'logo'=>$_POST['logo'],
		'imgcorp'=>$_POST['imgcorp'],
		'color'=>$_POST['color']
		);
		//print_r($datos);
		//echo $pagado;
		$respuesta = ModeloConsulta::mdlIngresarCentro($datos);
		/*
		print_r($respuesta);
		if($respuesta == "ok"){
		echo "Si se mando";
		}else{
		echo "no se mando";
		}
		*/
		}
	}
}