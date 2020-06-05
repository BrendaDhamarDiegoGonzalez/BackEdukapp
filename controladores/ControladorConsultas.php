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
}