<?php
require_once "conexion.php";
class ModeloConsulta{
	//***************************Información para tablero *******************************//
	static public function mdlCursos(){
		$consulta = Conexion::conectar()->prepare("SELECT * FROM curso where status=1");
		$consulta -> execute();
		return $consulta -> fetchAll();
	}
	static public function mdlAlumnos(){
		$consulta = Conexion::conectar()->prepare("SELECT * FROM alumno");
		$consulta -> execute();
		return $consulta -> fetchAll();
	}
	//*****************************CURSOS****************************************
	//Buscar curso
	static public function mdlBuscarCurso($nombre){
		$nombre = '%'.$nombre.'%';
		$consulta = Conexion::conectar()->prepare("SELECT * FROM curso WHERE nombre_curso LIKE :Nombre");
		$consulta->bindParam(":Nombre", $nombre, PDO::PARAM_STR);
		$consulta -> execute();
		return $consulta -> fetchAll();
	}
	//Registrar curso
	static public function mdlRegistrarCurso($datosCurso){
		$stmt = Conexion::conectar()->prepare("CALL sp_curso_inserta (:Nombre,:Horas,:Status)");
		$stmt->bindParam(":Status", $datosCurso["status"], PDO::PARAM_INT);
		$stmt->bindParam(":Nombre", $datosCurso["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":Horas", $datosCurso["horas"], PDO::PARAM_STR);
		if($stmt->execute()){
			return "ok";
		}else{
			print_r(Conexion::conectar()->errorInfo());
		
		}
		//$stmt->close();
		$stmt = null;
	}
	//Para tabla modificar
	static public function mdlInfoCurso($id_curso){
		$consulta = Conexion::conectar()->prepare("SELECT * FROM curso WHERE id_curso = :id");
		$consulta -> bindParam(":id", $id_curso, PDO::PARAM_INT);
		$consulta -> execute();
		return $consulta -> fetchAll();
	}
	//Modificar curso
		static public function mdlEditarCurso($datosCurso){
		$stmt = Conexion::conectar()->prepare("UPDATE curso SET nombre_curso = :Nombre, horas = :Horas, status = :Status WHERE id_curso = :id");
		
		$stmt->bindParam(":Nombre", $datosCurso["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":Horas", $datosCurso["horas"], PDO::PARAM_STR);
		$stmt->bindParam(":Status", $datosCurso["status"], PDO::PARAM_INT);
		$stmt->bindParam(":id", $datosCurso['id'], PDO::PARAM_INT);
		if($stmt->execute()){
			return "ok";
		}else{
			//return "error";
			print_r(Conexion::conectar()->errorInfo());
		
		}
		//$stmt->close();
		$stmt = null;
	}
	//Actualizar status de curso desactivar
	static public function mdlDesactivarCurso($id_curso){
					$stmt = Conexion::conectar()->prepare("UPDATE curso SET STATUS = 0 WHERE id_curso = :id");
					$stmt -> bindParam(":id", $id_curso, PDO::PARAM_INT);
					if($stmt -> execute()){
						return "ok";
					}else{
							print_r(Conexion::conectar()->errorInfo());
					}
					$stmt-> close();
					$stmt = null;
	}
	//Actualizar status de curso activar
	static public function mdlActivarCurso($id_curso){
					$stmt = Conexion::conectar()->prepare("UPDATE curso SET STATUS = 1 WHERE id_curso = :id");
					$stmt -> bindParam(":id", $id_curso, PDO::PARAM_INT);
					if($stmt -> execute()){
						return "ok";
					}else{
							print_r(Conexion::conectar()->errorInfo());
					}
					$stmt-> close();
					$stmt = null;
	}
	//**************************** ALUMNOS ***********************************//
static public function mdlAlumnosxCurso($id_curso){
		$consulta = Conexion::conectar()->prepare("SELECT * FROM alumno AL INNER JOIN certificado CE ON AL.id_alumno=CE.id_alumno WHERE id_curso=:id");
		$consulta -> bindParam(":id", $id_curso, PDO::PARAM_INT);
		$consulta -> execute();
		return $consulta -> fetchAll();
	}
	//Buscar alumno
	static public function mdlBuscarAlumno($nombre,$id){
		$nombre = '%'.$nombre.'%';
		$consulta = Conexion::conectar()->prepare("SELECT * FROM alumno  AL INNER JOIN certificado CE ON AL.id_alumno=CE.id_alumno WHERE nombre_alumno LIKE :Nombre AND id_curso=:Id");
		$consulta->bindParam(":Nombre", $nombre, PDO::PARAM_STR);
		$consulta->bindParam(":Id", $id, PDO::PARAM_INT);
		$consulta -> execute();
		return $consulta -> fetchAll();
	}
	//Buscar alumno2
	static public function mdlBuscarAlumno2($nombre){
		$nombre = '%'.$nombre.'%';
		$consulta = Conexion::conectar()->prepare("SELECT * FROM alumno  AL INNER JOIN certificado CE ON AL.id_alumno=CE.id_alumno WHERE nombre_alumno LIKE :Nombre");
		$consulta->bindParam(":Nombre", $nombre, PDO::PARAM_STR);
		$consulta -> execute();
		return $consulta -> fetchAll();
	}
	//Registrar Alumno
	static public function mdlIngresarAlumno($datosAlumno){
		$stmt = Conexion::conectar()->prepare("CALL sp_alumno_inserta (:Matr,:Nom,:Apell,:Curp,:Status)");
		$stmt->bindParam(":Nom", $datosAlumno["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":Apell", $datosAlumno["ape"], PDO::PARAM_STR);
		$stmt->bindParam(":Matr", $datosAlumno["matri"], PDO::PARAM_STR);
		$stmt->bindParam(":Curp", $datosAlumno["curp"], PDO::PARAM_STR);
		$stmt->bindParam(":Status", $datosAlumno['status'], PDO::PARAM_INT);
		if($stmt->execute()){
			return "ok";
		}else{
			print_r(Conexion::conectar()->errorInfo());
		
		}
		//$stmt->close();
		$stmt = null;
	}
	//Para tabla modificar
	static public function mdlInfoAlumno($cveAlumno){
		$consulta = Conexion::conectar()->prepare("SELECT * FROM alumno AL INNER JOIN certificado CE ON AL.id_alumno=CE.id_alumno WHERE AL.id_alumno= :id");
		$consulta -> bindParam(":id", $cveAlumno, PDO::PARAM_INT);
		$consulta -> execute();
		return $consulta -> fetchAll();
	}
	//Actualizar status de curso desactivar
	static public function mdlDesactivarAlumno($id_alumno){
					$stmt = Conexion::conectar()->prepare("UPDATE alumno SET STATUS = 0 WHERE id_alumno = :id");
					$stmt -> bindParam(":id", $id_alumno, PDO::PARAM_INT);
					if($stmt -> execute()){
						return "ok";
					}else{
							print_r(Conexion::conectar()->errorInfo());
					}
					$stmt-> close();
					$stmt = null;
	}
	//Actualizar status de curso activar
	static public function mdlActivarAlumno($id_alumno){
					$stmt = Conexion::conectar()->prepare("UPDATE alumno SET STATUS = 1 WHERE id_alumno= :id");
					$stmt -> bindParam(":id", $id_alumno, PDO::PARAM_INT);
					if($stmt -> execute()){
						return "ok";
					}else{
							print_r(Conexion::conectar()->errorInfo());
					}
					$stmt-> close();
					$stmt = null;
	}
	//Modificar Alumno
		static public function mdlEditarAlumno($datosAlumno){
		$stmt = Conexion::conectar()->prepare("UPDATE alumno SET nombre_alumno = :Nombre, apellidos = :Ape,matricula=:Matr,curp=:Curp, status = :Status WHERE id_alumno = :id");
		
		$stmt->bindParam(":Nombre", $datosAlumno["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":Ape", $datosAlumno["apellidos"], PDO::PARAM_STR);
		$stmt->bindParam(":Matr", $datosAlumno["matricula"], PDO::PARAM_STR);
		$stmt->bindParam(":Curp", $datosAlumno["curp"], PDO::PARAM_STR);
		$stmt->bindParam(":Status", $datosAlumno['status'], PDO::PARAM_INT);
		$stmt->bindParam(":id", $datosAlumno['id_a'], PDO::PARAM_INT);

		if($stmt->execute()){
			return "ok";
		}else{
			//return "error";
			print_r(Conexion::conectar()->errorInfo());
		
		}
		//$stmt->close();
		$stmt = null;
	}
	//*************************************************************************************
	static public function mdlConsultaBD(){
		$stmt = Conexion::conectar()->prepare("SELECT COUNT(*) from aspirante");
		$stmt -> execute();
		return $stmt -> fetch();
	}
	//***************************CENTROS***************************************//
	static public function mdlConsultaCentros(){
		$stmt2 = Conexion::conectar()->prepare("SELECT COUNT(*) from ctro_educativo");
		$stmt2 -> execute();
		return $stmt2 -> fetch();
	}
	//Para tabla Centros
	static public function mdlMostrarCentros(){
		$consulta = Conexion::conectar()->prepare("SELECT * FROM ctro_educativo");
		$consulta -> execute();
		return $consulta -> fetchAll();
	}
	//Para mostrar centros activos
	static public function mdlMostrarCentrosActivos(){
		$consulta = Conexion::conectar()->prepare("SELECT * FROM ctro_educativo WHERE STATUS=1");
		$consulta -> execute();
		return $consulta -> fetchAll();
	}
	//Centros educativos hoy
	static public function mdlCenhoy($hoy){
		$stmt = Conexion::conectar()->prepare("SELECT COUNT(*) FROM ctro_educativo WHERE Fecha_Registro>='$hoy'");
		$stmt -> execute();
		
		return $stmt -> fetch();
	}
	//Para formulario modificar Centros/ Mostrar datos de un centro
	
//*************************************************OFERTAS************************************************************//
	static public function mdlConsultaOfertas(){
		$stmt = Conexion::conectar()->prepare("SELECT COUNT(*) FROM oferta_edu WHERE STATUS='0'");
		$stmt -> execute();
		return $stmt -> fetch();
	}
	//Para insertar planteles-oferta
	static public function mdlIngresarPlantelOferta($cveOferta,$cve_plantel){
		$consulta = Conexion::conectar()->prepare("INSERT INTO oferta_plantel( cve_OfertaEdu ,cve_Plantel) SELECT $cveOferta,$cve_plantel FROM dual WHERE NOT EXISTS (SELECT cve_OfertaEdu ,cve_Plantel FROM oferta_plantel WHERE cve_OfertaEdu = $cveOferta AND cve_Plantel=$cve_plantel ) LIMIT 1");
		if($consulta->execute()){
			return "ok";
		}else{
			print_r(Conexion::conectar()->errorInfo());
		
		}
		$consulta = null;
	}
	//Para insertar opcionales
	static public function mdlIngresarOpcionales($cveOferta,$cve_plantel,$opcion){
		$consulta = Conexion::conectar()->prepare("INSERT INTO opcionales_oferta__plantel( cve_Plantel,cve_OfertaEdu,cve_Opcional) SELECT $cve_plantel,$cveOferta,$opcion FROM dual WHERE NOT EXISTS (SELECT cve_Plantel,cve_OfertaEdu,cve_Opcional FROM opcionales_oferta__plantel WHERE cve_Plantel=$cve_plantel  AND cve_OfertaEdu = $cveOferta  AND cve_Opcional=$opcion) LIMIT 1");
		if($consulta->execute()){
			return "ok";
		}else{
			print_r(Conexion::conectar()->errorInfo());
			print_r("Hubo Problemas jsjsjs");
		
		}
		$consulta = null;
	}
	//Para Eliminar planteles-oferta
	static public function mdlEliminarPlantelOferta($cveOferta,$cve_plantelElim){
		$consulta = Conexion::conectar()->prepare("DELETE FROM oferta_plantel WHERE cve_OfertaEdu=$cveOferta AND cve_Plantel=$cve_plantelElim ");
		if($consulta->execute()){
			return "ok";
		}else{
			print_r(Conexion::conectar()->errorInfo());
		
		}
		$consulta = null;
	}
	//Para mostrar modalidades
	static public function mdlMostrarModalidades(){
		$consulta = Conexion::conectar()->prepare("SELECT Cve_Modalidad, Modalidad FROM catmodalidad");
		$consulta -> execute();
		return $consulta -> fetchAll();
	}
	//Para mostrar niveles
	static public function mdlMostrarNiveles(){
		$consulta = Conexion::conectar()->prepare("SELECT cve_Nivel,NombreNivel FROM nivel");
		$consulta -> execute();
		return $consulta -> fetchAll();
	}
	//Para mostrar categorias
	static public function mdlMostrarCategorias(){
		$consulta = Conexion::conectar()->prepare("SELECT id_categoria, descripcion_cat FROM categorias");
		$consulta -> execute();
		return $consulta -> fetchAll();
	}
	//Para mostrar opcionales
	static public function mdlMostrarOpcionales(){
		$consulta = Conexion::conectar()->prepare("SELECT * FROM opcional");
		$consulta -> execute();
		return $consulta -> fetchAll();
	}
		//Para tabla Ofertas en revision
	static public function mdlMostrarOrevision(){
		$consulta = Conexion::conectar()->prepare("SELECT DISTINCT Nombre_Ctro_Educativo, Nombre,NombreNivel,Modalidad, oferta_edu.cve_OfertaEdu
			FROM ctro_educativo
			INNER JOIN plantel ON ctro_educativo.cve_Ctro_Educativo = plantel.cve_Ctro_Educativo
			INNER JOIN oferta_plantel ON plantel.cve_Plantel = oferta_plantel.cve_Plantel
			INNER JOIN oferta_edu ON oferta_plantel.cve_OfertaEdu = oferta_edu.cve_OfertaEdu
			INNER JOIN nivel ON oferta_edu.cve_Nivel = nivel.cve_Nivel
			INNER JOIN catmodalidad ON oferta_edu.Cve_Modalidad = catmodalidad.Cve_Modalidad
			WHERE oferta_edu.Status ='0' ORDER BY oferta_edu.cve_OfertaEdu");
		$consulta -> execute();
		return $consulta -> fetchAll();
	}
	//Para mostrar Planteles
	static public function mdlPlantelesActivos($cveCentro){
		$stmt = Conexion::conectar()->prepare("SELECT *FROM plantel WHERE cve_Ctro_Educativo=$cveCentro AND STATUS=1");
		$stmt -> execute();
		
		return $stmt -> fetchAll();
	}
	//Para tabla Ofertas aprobadas
	static public function mdlMostrarOaprobadas(){
		$consulta = Conexion::conectar()->prepare("SELECT DISTINCT Nombre_Ctro_Educativo, Nombre,NombreNivel,Modalidad, oferta_edu.cve_OfertaEdu
			FROM ctro_educativo
			INNER JOIN plantel ON ctro_educativo.cve_Ctro_Educativo = plantel.cve_Ctro_Educativo
			INNER JOIN oferta_plantel ON plantel.cve_Plantel = oferta_plantel.cve_Plantel
			INNER JOIN oferta_edu ON oferta_plantel.cve_OfertaEdu = oferta_edu.cve_OfertaEdu
			INNER JOIN nivel ON oferta_edu.cve_Nivel = nivel.cve_Nivel
			INNER JOIN catmodalidad ON oferta_edu.Cve_Modalidad = catmodalidad.Cve_Modalidad
			WHERE oferta_edu.Status ='1' ORDER BY oferta_edu.cve_OfertaEdu");
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
	//Aprobar Oferta
	static public function mdlAprobarOferta($cveOferta){
					$stmt = Conexion::conectar()->prepare("UPDATE oferta_edu SET Status=1 WHERE  cve_OfertaEdu=:id");
					$stmt -> bindParam(":id", $cveOferta, PDO::PARAM_INT);
					if($stmt -> execute()){
						return "ok";
					}else{
							print_r(Conexion::conectar()->errorInfo());
					}
					$stmt-> close();
					$stmt = null;
	}
	//Deshabilitar Oferta
	static public function mdlDeshabilitarOferta($cveOferta){
					$stmt = Conexion::conectar()->prepare("UPDATE oferta_edu SET Status=0 WHERE  cve_OfertaEdu=:id");
					$stmt -> bindParam(":id", $cveOferta, PDO::PARAM_INT);
					if($stmt -> execute()){
						return "ok";
					}else{
							print_r(Conexion::conectar()->errorInfo());
					}
					$stmt-> close();
					$stmt = null;
	}
	//*************************************************PLANTELES************************************************************//
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
	//Actualizar vista de centro / Para desactivar elcentro
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
	//Actualizar vista de centro / Para activar el centro
	static public function mdlActualizarVista2($cveCentro){
					$stmt = Conexion::conectar()->prepare("UPDATE ctro_educativo SET STATUS = 1 WHERE cve_Ctro_Educativo = :id");
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
	
	//*******************************************************************************************************************//
	//********************************************************//
																					//							CRUD PARA PLANTELES			  //
	//********************************************************//
	
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
	static public function mdlEliminarPlantel2($cvePlantel){
		$stmt = Conexion::conectar()->prepare("UPDATE plantel SET STATUS = 1 WHERE cve_Plantel = :id");
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
		$nombre = '%'.$nombre.'%';
		$consulta = Conexion::conectar()->prepare("SELECT * FROM usuario WHERE Nombre_Usuario LIKE :Nombre");
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
	//*****************************OFERTAS************************************
	//Para formulario modificar oferta
	static public function mdlMostrarOfertaForm($cveOferta){
		$consulta = Conexion::conectar()->prepare("SELECT ctro_educativo.cve_Ctro_Educativo,Nombre_Ctro_Educativo, Nombre,oferta_edu.Costo, oferta_edu.Duracion, oferta_edu.Descripcion, oferta_edu.Status,oferta_edu.OfertaHtml,cve_Nivel,Cve_Modalidad,categorias.id_categoria, descripcion_cat,subcategoria.id_subcategoria
			FROM ctro_educativo
			INNER JOIN plantel ON ctro_educativo.cve_Ctro_Educativo = plantel.cve_Ctro_Educativo
			INNER JOIN oferta_plantel ON plantel.cve_Plantel = oferta_plantel.cve_Plantel
			INNER JOIN oferta_edu ON oferta_plantel.cve_OfertaEdu = oferta_edu.cve_OfertaEdu
			INNER JOIN subcategoria ON oferta_edu.id_subcategoria=subcategoria.id_subcategoria
			INNER JOIN categorias ON subcategoria.id_categoria=categorias.id_categoria
			WHERE oferta_edu.cve_OfertaEdu=:id");
		$consulta -> bindParam(":id", $cveOferta, PDO::PARAM_INT);
		$consulta -> execute();
		return $consulta -> fetchAll();
	}
	static public function mdlEditarOferta($datosof){
		$stmt = Conexion::conectar()->prepare("UPDATE oferta_edu SET Nombre=:Oferta, Costo=:Costo, Duracion=:Durac, Descripcion=:Descr, cve_Nivel=:Nivel, Cve_Modalidad=:Mod,id_subcategoria=:Subcat,OfertaHtml=:OferHtml, FechaActualizacion= NOW() WHERE cve_OfertaEdu = :Id");
		
		//$stmt->bindParam(":NomCen", $datosof["nombreCentro"], PDO::PARAM_STR);
		$stmt->bindParam(":Oferta", $datosof["oferta"], PDO::PARAM_STR);
		$stmt->bindParam(":Costo", $datosof["costo"], PDO::PARAM_STR);
		$stmt->bindParam(":Durac", $datosof["duracion"], PDO::PARAM_STR);
		$stmt->bindParam(":Descr", $datosof["desc"], PDO::PARAM_STR);
		$stmt->bindParam(":Nivel", $datosof["nivel"], PDO::PARAM_INT);
		$stmt->bindParam(":OferHtml", $datosof["oferHtml"], PDO::PARAM_STR);
		$stmt->bindParam(":Mod", $datosof["mod"], PDO::PARAM_INT);
		$stmt->bindParam(":Subcat", $datosof["subcate"], PDO::PARAM_INT);
		$stmt->bindParam(":Id", $datosof["idOferta"], PDO::PARAM_INT);
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
			print_r(Conexion::conectar()->errorInfo());
		
		}
		//$stmt->close();
		$stmt = null;
	}
	//Buscar oferta
	static public function mdlBuscarOferta($nombre){
		$nombre = '%'.$nombre.'%';
		$consulta = Conexion::conectar()->prepare("SELECT Nombre_Ctro_Educativo, Nombre,NombreNivel,Modalidad, oferta_edu.cve_OfertaEdu
			FROM ctro_educativo
			INNER JOIN plantel ON ctro_educativo.cve_Ctro_Educativo = plantel.cve_Ctro_Educativo
			INNER JOIN oferta_plantel ON plantel.cve_Plantel = oferta_plantel.cve_Plantel
			INNER JOIN oferta_edu ON oferta_plantel.cve_OfertaEdu = oferta_edu.cve_OfertaEdu
			INNER JOIN nivel ON oferta_edu.cve_Nivel = nivel.cve_Nivel
			INNER JOIN catmodalidad ON oferta_edu.Cve_Modalidad = catmodalidad.Cve_Modalidad
			WHERE Nombre_Ctro_educativo LIKE :Nombre AND oferta_edu.Status ='0'");
		$consulta->bindParam(":Nombre", $nombre, PDO::PARAM_STR);
		$consulta -> execute();
		return $consulta -> fetchAll();
	}
	//Buscar oferta Aprobada
	static public function mdlBuscarOfertaAprobada($nombre){
		$nombre = '%'.$nombre.'%';
		$consulta = Conexion::conectar()->prepare("SELECT Nombre_Ctro_Educativo, Nombre,NombreNivel,Modalidad, oferta_edu.cve_OfertaEdu
			FROM ctro_educativo
			INNER JOIN plantel ON ctro_educativo.cve_Ctro_Educativo = plantel.cve_Ctro_Educativo
			INNER JOIN oferta_plantel ON plantel.cve_Plantel = oferta_plantel.cve_Plantel
			INNER JOIN oferta_edu ON oferta_plantel.cve_OfertaEdu = oferta_edu.cve_OfertaEdu
			INNER JOIN nivel ON oferta_edu.cve_Nivel = nivel.cve_Nivel
			INNER JOIN catmodalidad ON oferta_edu.Cve_Modalidad = catmodalidad.Cve_Modalidad
			WHERE Nombre_Ctro_educativo LIKE :Nombre AND oferta_edu.Status ='1'");
		$consulta->bindParam(":Nombre", $nombre, PDO::PARAM_STR);
		$consulta -> execute();
		return $consulta -> fetchAll();
	}
	//Subcategoria de oferta
	static public function mdlMostrarSubcategorias(){
		$consulta=Conexion::conectar()->prepare("SELECT * FROM subcategoria");
		$consulta -> execute();
		return $consulta -> fetchAll();
	}
	//Planteles de oferta
	static public function mdlPlantelesOferta($cveOferta){
		$consulta=Conexion::conectar()->prepare("SELECT plantel.cve_Plantel,Nombre_Plantel FROM plantel INNER JOIN oferta_plantel ON plantel.cve_Plantel = oferta_plantel.cve_Plantel WHERE oferta_plantel.cve_OfertaEdu=$cveOferta AND plantel.Status=1");
		$consulta -> execute();
		return $consulta -> fetchAll();
}
	//Insertar oferta
	static public function mdlInsertarOferta($datos){
		$stmt = Conexion::conectar()->prepare("CALL sp_oferta_edu_inserta (:Nombre,:Costo,:Dura,:Desc,:Nivel,:OfertaHtml,:CostoPeri,:Cate,:NomPdf,'',:Moda,:Promo)");
		$stmt->bindParam(":Nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":Costo", $datos["costo"], PDO::PARAM_STR);
		$stmt->bindParam(":Dura", $datos["dura"], PDO::PARAM_STR);
		$stmt->bindParam(":Desc", $datos["desc"], PDO::PARAM_STR);
		$stmt->bindParam(":Nivel", $datos["nivel"], PDO::PARAM_INT);
		$stmt->bindParam(":OfertaHtml", $datos["ofertaHtml"], PDO::PARAM_STR);
		$stmt->bindParam(":CostoPeri", $datos["costoPeri"], PDO::PARAM_STR);
		$stmt->bindParam(":Cate", $datos["cate"], PDO::PARAM_INT);
		$stmt->bindParam(":NomPdf", $datos["nomPdf"], PDO::PARAM_STR);
		$stmt->bindParam(":Moda", $datos["moda"], PDO::PARAM_INT);
		$stmt->bindParam(":Promo", $datos["promo"], PDO::PARAM_STR);
		
		if($stmt->execute()){
			return "ok";
		}else{
			print_r(Conexion::conectar()->errorInfo());
		
		}
		//$stmt->close();
		$stmt = null;
	}
	//Para mostrar Planteles de Oferta
	static public function mdlPlantelesOferta2($cveOferta){
		$consulta = Conexion::conectar()->prepare("SELECT DISTINCT * FROM oferta_plantel WHERE cve_OfertaEdu=$cveOferta");
		$consulta -> execute();
		return $consulta -> fetchAll();
	}
	//Para mostrar Opcionales de Oferta
	static public function mdlOpcionalesOferta($cveOferta){
		$consulta = Conexion::conectar()->prepare("SELECT DISTINCT cve_Opcional FROM opcionales_oferta__plantel WHERE cve_OfertaEdu=$cveOferta");
		$consulta -> execute();
		return $consulta -> fetchAll();
	}
	//Obtener el ultimo id de ofertas
	static public function mdlObtenerIdOferta(){
		$stmt2 = Conexion::conectar()->prepare("SELECT cve_OfertaEdu FROM oferta_edu ORDER BY cve_OfertaEdu  DESC LIMIT 1");
		$stmt2 -> execute();
		return $stmt2 -> fetch();
	}
	//Para mostrar Planteles
	static public function mdlMostrarPlantelesOferta(){
		$consulta = Conexion::conectar()->prepare("SELECT cve_Plantel, Nombre_Plantel,Tipo_Plantel FROM plantel");
		$consulta -> execute();
		return $consulta -> fetchAll();
	}
	//*****************************************************************
																									//								REPORTES
	//*****************************************************************
	static public function mdlReporteAspirantesHoy($hoy){
		$consulta = Conexion::conectar()->prepare("SELECT Nombre_Aspirante, Apaterno_Aspirante,Amaterno_Estudiante, Celular_Aspirante, Telefono_Aspirante, CorreoE_Aspirante,Estado,Horario_Contactar,Forma_Contacto,OE.Nombre,CE.Nombre_Ctro_Educativo,aspirante.FechaAlta
		FROM aspirante
		inner join oferta_edu OE on aspirante.cve_OfertaEdu=OE.cve_OfertaEdu
		inner join oferta_plantel  on OE.cve_OfertaEdu=oferta_plantel.cve_OfertaEdu
		inner join plantel P ON oferta_plantel.cve_Plantel=P.cve_Plantel
		inner join ctro_Educativo CE on P.cve_Ctro_Educativo=CE.cve_Ctro_Educativo
		WHERE CAST(aspirante.FechaAlta AS DATE) = '$hoy'
		ORDER BY aspirante.FechaAlta ASC");
		//$consulta->bindParam(":Hoy", $hoy, PDO::PARAM_STR);
		$consulta -> execute();
		return $consulta -> fetchAll();
	}
	//Aspirantes por centro educativo
	static public function mdlReporteAspirantesPorCentro($cveCentro,$hoy){
		
		$consulta = Conexion::conectar()->prepare("SELECT Nombre_Aspirante, Apaterno_Aspirante,Amaterno_Estudiante, Celular_Aspirante, Telefono_Aspirante, CorreoE_Aspirante,Estado,Horario_Contactar,Forma_Contacto,OE.Nombre,CE.Nombre_Ctro_Educativo,aspirante.FechaAlta
		FROM aspirante
		inner join oferta_edu OE on aspirante.cve_OfertaEdu=OE.cve_OfertaEdu
		inner join oferta_plantel  on OE.cve_OfertaEdu=oferta_plantel.cve_OfertaEdu
		inner join plantel P ON oferta_plantel.cve_Plantel=P.cve_Plantel
		inner join ctro_Educativo CE on P.cve_Ctro_Educativo=CE.cve_Ctro_Educativo
		WHERE CAST(aspirante.FechaAlta AS DATE) = :Hoy AND CE.cve_Ctro_Educativo= :cve
		ORDER BY aspirante.FechaAlta ASC");
		$consulta->bindParam(":Hoy", $hoy, PDO::PARAM_STR);
		$consulta->bindParam(":cve", $cveCentro, PDO::PARAM_INT);
		$consulta -> execute();
		return $consulta -> fetchAll();
	}
	//Aspirantes por mes
	static public function mdlReporteAspirantesMes($mes,$anio){
		$consulta = Conexion::conectar()->prepare("SELECT Nombre_Aspirante, Apaterno_Aspirante,Amaterno_Estudiante, Celular_Aspirante, Telefono_Aspirante, CorreoE_Aspirante,Estado,Horario_Contactar,Forma_Contacto,OE.Nombre,CE.Nombre_Ctro_Educativo,aspirante.FechaAlta
		FROM aspirante
		inner join oferta_edu OE on aspirante.cve_OfertaEdu=OE.cve_OfertaEdu
		inner join oferta_plantel  on OE.cve_OfertaEdu=oferta_plantel.cve_OfertaEdu
		inner join plantel P ON oferta_plantel.cve_Plantel=P.cve_Plantel
		inner join ctro_Educativo CE on P.cve_Ctro_Educativo=CE.cve_Ctro_Educativo
WHERE YEAR(aspirante .FechaAlta) = :Anio
AND MONTH( aspirante .FechaAlta ) = :Mes
ORDER BY aspirante.FechaAlta ASC");
		$consulta->bindParam(":Anio", $anio, PDO::PARAM_STR);
		$consulta->bindParam(":Mes", $mes, PDO::PARAM_STR);
		$consulta -> execute();
		return $consulta -> fetchAll();
	}
	//Aspirantes por mes por centro
	static public function mdlReporteAspirantesMesPorCentro($datos){
		$consulta = Conexion::conectar()->prepare("SELECT Nombre_Aspirante, Apaterno_Aspirante,Amaterno_Estudiante, Celular_Aspirante, Telefono_Aspirante, CorreoE_Aspirante,Estado,Horario_Contactar,Forma_Contacto,OE.Nombre,CE.Nombre_Ctro_Educativo,aspirante.FechaAlta
		FROM aspirante
		inner join oferta_edu OE on aspirante.cve_OfertaEdu=OE.cve_OfertaEdu
		inner join oferta_plantel  on OE.cve_OfertaEdu=oferta_plantel.cve_OfertaEdu
		inner join plantel P ON oferta_plantel.cve_Plantel=P.cve_Plantel
		inner join ctro_Educativo CE on P.cve_Ctro_Educativo=CE.cve_Ctro_Educativo
WHERE YEAR(aspirante .FechaAlta) = :Anio
AND MONTH( aspirante .FechaAlta ) = :Mes
AND CE.cve_Ctro_Educativo = :Cve
ORDER BY aspirante.FechaAlta ASC");
		$consulta->bindParam(":Anio", $datos['anio'], PDO::PARAM_STR);
		$consulta->bindParam(":Mes", $datos['mes'], PDO::PARAM_STR);
		$consulta->bindParam(":Cve", $datos['cve'], PDO::PARAM_INT);
		$consulta -> execute();
		return $consulta -> fetchAll();
	}
}