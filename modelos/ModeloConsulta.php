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

	//Para tabla Planteles
	static public function mdlPlanteles($cveCentro){

		$stmt = Conexion::conectar()->prepare("SELECT PL.Nombre_Plantel, PL.`Status`, CE.Nombre_Ctro_Educativo FROM plantel PL INNER JOIN ctro_educativo CE ON PL.cve_Ctro_Educativo = CE.cve_Ctro_Educativo
			WHERE PL.cve_Ctro_Educativo=$cveCentro");
		$stmt -> execute();
		
		return $stmt -> fetchAll();

	}
	//Para tabla Usuarios
	static public function mdlMostrarUsuarios(){

		$consulta = Conexion::conectar()->prepare("SELECT * FROM usuario");
		$consulta -> execute();


		return $consulta -> fetchAll();

	}
	//Para tabla Ofertas en revision
	static public function mdlMostrarOrevision(){

		$consulta = Conexion::conectar()->prepare("SELECT Nombre_Ctro_Educativo, Nombre,NombreNivel,Modalidad
			FROM ctro_educativo
			INNER JOIN plantel ON ctro_educativo.cve_Ctro_Educativo = plantel.cve_Ctro_Educativo
			INNER JOIN oferta_plantel ON plantel.cve_Plantel = oferta_plantel.cve_Plantel
			INNER JOIN oferta_edu ON oferta_plantel.cve_OfertaEdu = oferta_edu.cve_OfertaEdu
			INNER JOIN nivel ON oferta_edu.cve_Nivel = nivel.cve_Nivel
			INNER JOIN catmodalidad ON oferta_edu.Cve_Modalidad = catmodalidad.Cve_Modalidad
			WHERE oferta_edu.Status ='0'");

		$consulta -> execute();


		return $consulta -> fetchAll();

	}
	//Para tabla Ofertas aprobadas
	static public function mdlMostrarOaprobadas(){

		$consulta = Conexion::conectar()->prepare("SELECT Nombre_Ctro_Educativo, Nombre,NombreNivel,Modalidad
			FROM ctro_educativo
			INNER JOIN plantel ON ctro_educativo.cve_Ctro_Educativo = plantel.cve_Ctro_Educativo
			INNER JOIN oferta_plantel ON plantel.cve_Plantel = oferta_plantel.cve_Plantel
			INNER JOIN oferta_edu ON oferta_plantel.cve_OfertaEdu = oferta_edu.cve_OfertaEdu
			INNER JOIN nivel ON oferta_edu.cve_Nivel = nivel.cve_Nivel
			INNER JOIN catmodalidad ON oferta_edu.Cve_Modalidad = catmodalidad.Cve_Modalidad
			WHERE oferta_edu.Status ='1'");
		$consulta -> execute();


		return $consulta -> fetchAll();

	}
	//Para tabla Ofertas rechazadas
	static public function mdlMostrarOrechazadas(){

		$consulta = Conexion::conectar()->prepare("SELECT Nombre_Ctro_Educativo, Nombre,NombreNivel,Modalidad
			FROM ctro_educativo
			INNER JOIN plantel ON ctro_educativo.cve_Ctro_Educativo = plantel.cve_Ctro_Educativo
			INNER JOIN oferta_plantel ON plantel.cve_Plantel = oferta_plantel.cve_Plantel
			INNER JOIN oferta_edu ON oferta_plantel.cve_OfertaEdu = oferta_edu.cve_OfertaEdu
			INNER JOIN nivel ON oferta_edu.cve_Nivel = nivel.cve_Nivel
			INNER JOIN catmodalidad ON oferta_edu.Cve_Modalidad = catmodalidad.Cve_Modalidad
			WHERE oferta_edu.Status ='2'");
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