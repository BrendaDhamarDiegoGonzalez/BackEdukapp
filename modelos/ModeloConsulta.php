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

		$stmt = Conexion::conectar()->prepare("SELECT PL.cve_Plantel,PL.Nombre_Plantel, PL.`Status`, CE.Nombre_Ctro_Educativo FROM plantel PL INNER JOIN ctro_educativo CE ON PL.cve_Ctro_Educativo = CE.cve_Ctro_Educativo
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
	//Para formulario modificar Centros
	static public function mdlMostrarCentrosForm($cveCentro){

		$consulta = Conexion::conectar()->prepare("SELECT * FROM ctro_educativo WHERE cve_Ctro_Educativo = :id");
		$consulta -> bindParam(":id", $cveCentro, PDO::PARAM_INT);
		$consulta -> execute();


		return $consulta -> fetchAll();

	}
	//Para formulario modificar Planteles
	static public function mdlMostrarPlantelForm($cvePlantel){

		$consulta = Conexion::conectar()->prepare("SELECT * FROM plantel WHERE cve_Plantel = :id");
		$consulta -> bindParam(":id", $cvePlantel, PDO::PARAM_INT);
		$consulta -> execute();


		return $consulta -> fetchAll();

	}
	//Para formulario modificar usuario
	static public function mdlMostrarUsuarioForm($cveUsuario){

		$consulta = Conexion::conectar()->prepare("SELECT * FROM usuario WHERE cve_Usuario = :id");
		$consulta -> bindParam(":id", $cveUsuario, PDO::PARAM_INT);
		$consulta -> execute();


		return $consulta -> fetchAll();

	}

	//********************************************************//
	//							CRUD PARA CENTROS			  //
	//********************************************************//
	//Ingresar
	static public function mdlIngresarCentro($datos){

		$stmt = Conexion::conectar()->prepare("CALL sp_centro_registrar(:Nombre,:Direccion,:Telefono,:Correo,:Logo,:Color,:Imgcorp,'','','','')");

		$stmt->bindParam(":Nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":Direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":Telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":Correo", $datos["correo"], PDO::PARAM_STR);
		$stmt->bindParam(":Logo", $datos["logo"], PDO::PARAM_STR);
		$stmt->bindParam(":Imgcorp", $datos["imgcorp"], PDO::PARAM_STR);
		$stmt->bindParam(":Color", $datos["color"], PDO::PARAM_STR);
		

		if($stmt->execute()){

			return "ok";

		}else{

			print_r(Conexion::conectar()->errorInfo());
		
		}

		//$stmt->close();
		$stmt = null;

	}
	//Eliminar
	static public function mdlEliminarCentro($cveCentro){

		$stmt = Conexion::conectar()->prepare("DELETE FROM ctro_educativo WHERE cve_Ctro_Educativo = :id");

		$stmt -> bindParam(":id", $cveCentro, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	//Actualizar vista de centro
	static public function mdlActualizarVista($cveCentro){

					$stmt = Conexion::conectar()->prepare("UPDATE ctro_educativo SET STATUS = 0 WHERE cve_Ctro_Educativo = :id");
					$stmt -> bindParam(":id", $cveCentro, PDO::PARAM_INT);

					if($stmt -> execute()){

						return "ok";

					}else{

							print_r(Conexion::conectar()->errorInfo());

					}

					$stmt-> close();

					$stmt = null;


	}

	//Editar centro
		static public function mdlEditarCentro($datos){

		$stmt = Conexion::conectar()->prepare("UPDATE ctro_educativo SET Nombre_Ctro_Educativo = :Nombre, Direccion = :Direccion, Telefono_Ctro_Educativo = :Telefono, CorreoE_Ctro_Educativo = :Correo, ImgLogoHome = :Logo, ImgCorporativa = :Imgcorp, CentroPagado=:Pagado, Color_Corporativo=:Color, FechaActualizacion= NOW() WHERE cve_Ctro_Educativo = :id");

		
		$stmt->bindParam(":Nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":Direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":Telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":Correo", $datos["correo"], PDO::PARAM_STR);
		$stmt->bindParam(":Pagado", $datos["pagado"], PDO::PARAM_STR);
		$stmt->bindParam(":Logo", $datos["logo"], PDO::PARAM_STR);
		$stmt->bindParam(":Imgcorp", $datos["imgcorp"], PDO::PARAM_STR);
		$stmt->bindParam(":Color", $datos["color"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos['id'], PDO::PARAM_INT);


		if($stmt->execute()){

			return "ok";

		}else{

			//return "error";
			print_r(Conexion::conectar()->errorInfo());
		
		}

		//$stmt->close();
		$stmt = null;

	}
	//Buscar centro
	static public function mdlBuscarCentro($nombre){

		$consulta = Conexion::conectar()->prepare("SELECT * FROM ctro_educativo WHERE Nombre_Ctro_educativo= :Nombre");
		$consulta->bindParam(":Nombre", $nombre, PDO::PARAM_STR);
		$consulta -> execute();


		return $consulta -> fetchAll();

	}
	//*******************************************************************************************************************//
	//********************************************************//
	//							CRUD PARA PLANTELES			  //
	//********************************************************//
	static public function mdlBuscarPlantel($nombre,$cve){

		$consulta = Conexion::conectar()->prepare("SELECT * FROM plantel WHERE Nombre_Plantel= :Nombre AND cve_Ctro_Educativo= :Cve");
		$consulta->bindParam(":Nombre", $nombre, PDO::PARAM_STR);
		$consulta->bindParam(":Cve", $cve, PDO::PARAM_INT);
		$consulta -> execute();


		return $consulta -> fetchAll();

	}
	//Ingresar Plantel
	static public function mdlIngresarPlantel($datosPlan){
		
	
		$stmt = Conexion::conectar()->prepare("CALL sp_pl_insertar (:CveCen,:NombrePlan,:Tipo,:TelefonoPlan,:CorreoPlan,:Colonia,:Cp,'','','')");

		$stmt->bindParam(":CveCen", $datosPlan["cveCen"], PDO::PARAM_INT);
		$stmt->bindParam(":NombrePlan", $datosPlan["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":Tipo", $datosPlan["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":TelefonoPlan", $datosPlan["telefonoPlan"], PDO::PARAM_STR);
		$stmt->bindParam(":CorreoPlan", $datosPlan["correoPlan"], PDO::PARAM_STR);
		$stmt->bindParam(":Colonia", $datosPlan["colonia"], PDO::PARAM_STR);
		$stmt->bindParam(":Cp", $datosPlan["cp"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
			//return $datosPLan['cveCen'];

		}else{

			print_r(Conexion::conectar()->errorInfo());
		
		}

		//$stmt->close();
		$stmt = null;

	}
	//Modificar 
	static public function mdlEditarPlantel($datosPlan){
		$consulta= Conexion::conectar()->prepare("UPDATE plantel SET Nombre_Plantel = :NombrePlan, Tipo_Plantel = :Tipo, Telefono = :TelefonoPlan, CorreoE_Plantel = :CorreoPlan, tipo_envio=:Envio, CP_plantel = :Cp, Colonia_plantel = :Colonia, FechaActualizacion= NOW() WHERE cve_Plantel = :Id_p");

		$consulta->bindParam(":Id_p",$datosPlan['id_p'], PDO::PARAM_INT);
		$consulta->bindParam(":NombrePlan",$datosPlan['nombre'],PDO::PARAM_STR);
		$consulta->bindParam(":Tipo", $datosPlan["tipo"], PDO::PARAM_STR);
		$consulta->bindParam(":TelefonoPlan", $datosPlan["telefonoPlan"], PDO::PARAM_STR);
		$consulta->bindParam(":CorreoPlan", $datosPlan["correoPlan"], PDO::PARAM_STR);
		$consulta->bindParam(":Envio", $datosPlan["envio"], PDO::PARAM_INT);
		$consulta->bindParam(":Cp", $datosPlan["cp"], PDO::PARAM_STR);
		$consulta->bindParam(":Colonia", $datosPlan["colonia"], PDO::PARAM_STR);

		if($consulta->execute()){

			return "ok";

		}else{

			//return "error";
			print_r(Conexion::conectar()->errorInfo());
		
		}

		//$consulta->close();
		$consulta = null;
	}
	//Eliminar 
	static public function mdlEliminarPlantel($cvePlantel){
		$stmt = Conexion::conectar()->prepare("UPDATE plantel SET STATUS = 0 WHERE cve_Plantel = :id");
		$stmt -> bindParam(":id", $cvePlantel, PDO::PARAM_INT);
		if($stmt -> execute()){
		return "ok";
		}else{
		print_r(Conexion::conectar()->errorInfo());
		}
		$stmt-> close();
		$stmt = null;


	}
	//*******************************************************************************************************************//
	//********************************************************//
	//							CRUD PARA USUARIOS			  //
	//********************************************************//
	//Buscar Usuario 
	static public function mdlBuscarUsuario($nombre){

		$consulta = Conexion::conectar()->prepare("SELECT * FROM usuario WHERE Nombre_Usuario= :Nombre");
		$consulta->bindParam(":Nombre", $nombre, PDO::PARAM_STR);
		$consulta -> execute();


		return $consulta -> fetchAll();

	}
	//Insertar
	static public function mdlIngresarUsuario($datos){

		$stmt = Conexion::conectar()->prepare("CALL sp_usuario_insert (:Perfil,:NombreUsu,:APaterno,:AMaterno,:Nick,MD5(:Contra),:CorreoUsu,'')");

		$stmt->bindParam(":Perfil", $datos["perfil"], PDO::PARAM_INT);
		$stmt->bindParam(":NombreUsu", $datos["nombreUsu"], PDO::PARAM_STR);
		$stmt->bindParam(":APaterno", $datos["aPaterno"], PDO::PARAM_STR);
		$stmt->bindParam(":AMaterno", $datos["aMaterno"], PDO::PARAM_STR);
		$stmt->bindParam(":Nick", $datos["nick"], PDO::PARAM_STR);
		$stmt->bindParam(":Contra", $datos["contra"], PDO::PARAM_STR);
		$stmt->bindParam(":CorreoUsu", $datos["correoUsu"], PDO::PARAM_STR);
		

		if($stmt->execute()){

			return "ok";

		}else{

			print_r(Conexion::conectar()->errorInfo());
		
		}

		//$stmt->close();
		$stmt = null;

	}
	//Editar usuario
		static public function mdlEditarUsuario($datosus){

		$stmt = Conexion::conectar()->prepare("UPDATE usuario SET Nombre_Usuario =:NombreUsu , Apaterno_Usuario = :APaterno, Amaterno_Usuario = :AMaterno, Nick_Usuario = :Nick, Contrasena_Usuario =MD5(:Contra), Email = :CorreoUsu, cve_Perfil=:Perfil, FechaActualizacion= NOW() WHERE cve_Usuario = :id");

		
		$stmt->bindParam(":Perfil", $datosus["perfil"], PDO::PARAM_INT);
		$stmt->bindParam(":NombreUsu", $datosus["nombreUsu"], PDO::PARAM_STR);
		$stmt->bindParam(":APaterno", $datosus["aPaterno"], PDO::PARAM_STR);
		$stmt->bindParam(":AMaterno", $datosus["aMaterno"], PDO::PARAM_STR);
		$stmt->bindParam(":Nick", $datosus["nick"], PDO::PARAM_STR);
		$stmt->bindParam(":Contra", $datosus["contra"], PDO::PARAM_STR);
		$stmt->bindParam(":CorreoUsu", $datosus["correoUsu"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosus["idUsuario"], PDO::PARAM_INT);



		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
			print_r(Conexion::conectar()->errorInfo());
		
		}

		//$stmt->close();
		$stmt = null;

	}
}