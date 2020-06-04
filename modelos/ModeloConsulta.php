<?php
require_once "conexion.php"; 

class ModeloConsulta{

	static public function mdlConsultaBD(){

		$stmt = Conexion::conectar()->prepare("SELECT COUNT(*) from aspirante");
		$stmt -> execute();

		return $stmt -> fetch();

	}
	static public function mdlConsultaCentros(){

		$stmt2 = Conexion::conectar()->prepare("SELECT COUNT(*) from ctro_educativo");
		$stmt2 -> execute();

		return $stmt2 -> fetch();

	}
	static public function mdlConsultaOfertas(){

		$stmt = Conexion::conectar()->prepare("SELECT COUNT(*) FROM oferta_edu WHERE STATUS='0'");
		$stmt -> execute();

		return $stmt -> fetch();

	}
	//Aspirantes hoy
	static public function mdlAspihoy($hoy){

		$stmt = Conexion::conectar()->prepare("SELECT COUNT(*) FROM aspirante WHERE FechaAlta>='$hoy'");
		$stmt -> execute();
		
		return $stmt -> fetch();

	}

	//Para tabla Centros
	static public function mdlMostrarCentros(){

		$consulta = Conexion::conectar()->prepare("SELECT * FROM ctro_educativo");
		$consulta -> execute();


		return $consulta -> fetchAll();

	}
	//Para tabla Usuarios
	static public function mdlMostrarUsuarios(){

		$consulta = Conexion::conectar()->prepare("SELECT * FROM usuario");
		$consulta -> execute();


		return $consulta -> fetchAll();

	}
	//Para tabla Ofertas en revision
	static public function mdlMostrarOrevision(){

		$consulta = Conexion::conectar()->prepare("SELECT * FROM oferta_edu WHERE STATUS='0'");
		$consulta -> execute();


		return $consulta -> fetchAll();

	}
	//Para tabla Ofertas aprobadas
	static public function mdlMostrarOaprobadas(){

		$consulta = Conexion::conectar()->prepare("SELECT * FROM oferta_edu WHERE STATUS='1'");
		$consulta -> execute();


		return $consulta -> fetchAll();

	}
	//Para tabla Ofertas rechazadas
	static public function mdlMostrarOrechazadas(){

		$consulta = Conexion::conectar()->prepare("SELECT * FROM oferta_edu WHERE STATUS='4'");
		$consulta -> execute();


		return $consulta -> fetchAll();

	}

	//Centros educativos hoy
	static public function mdlCenhoy($hoy){

		$stmt = Conexion::conectar()->prepare("SELECT COUNT(*) FROM ctro_educativo WHERE Fecha_Registro>='$hoy'");
		$stmt -> execute();
		
		return $stmt -> fetch();

	}

}