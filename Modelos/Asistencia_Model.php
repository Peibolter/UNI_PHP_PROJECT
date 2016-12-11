<?php

	//Modelo asistencia
	class Asistencia{
				
		//funcion para conectar a la base de datos
		function conexionBD(){
			$mysqli=mysqli_connect("127.0.0.1","root","iu","iu2");
			if(!$mysqli){
				echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
				echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
				echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
				exit;
			}
			
			return $mysqli;
		}
		
		//Devuelve el id y nombre para aquellos usuarios que sean monitores.
		function consultaMonitores(){
			
			$mysqli = $this->conexionBD();
			$sql = "SELECT id, nombre FROM usuario where grupo_nombre_grupo = 'monitores' ";
	
			$resultado = $mysqli -> query($sql);
		
			if($resultado -> num_rows == 0){
				echo 'Se ha producido un error en la consulta';
				return false;
			}
			
			if($resultado){
				$resultado2 = array();
				while($obj = $resultado -> fetch_object()){
					$id = $obj -> id;
					$nom = $obj -> nombre;
					$aux = array ( 'id' => $id, 'nombre' => $nom);
					array_push($resultado2, $aux); 
				}
				return $resultado2;
			}	
		}
		
		//Para el id de un alumno devuelve el nombre y los apellidos.
		function consultaNombreAlumno($alumnoid)
		{
			$mysqli = $this ->conexionBD();
			//Consulta del nombre del alumno
			$sql = "SELECT nombre, apellidos FROM alumno where id = '$alumnoid' ";
			$resultado3 = $mysqli -> query($sql);
			
			if($resultado3 -> num_rows == 0){
				return false;
			}else{
				while($obj = $resultado3 -> fetch_object()){
					$nombreAlumno = $obj -> nombre . " " . $obj -> apellidos;
				}
				return $nombreAlumno;
			}
		}
		
		//Consulta los alumnos que tiene asignado un monitor en la tabla inscripcion
		function consultaAlumnos($idMonitor){
			
			$mysqli = $this->conexionBD();
			$sql = "SELECT id, alumno, actividad, usuario FROM inscripcion where usuario = '$idMonitor' ORDER BY actividad";
	
			$resultado = $mysqli -> query($sql);
		
			if($resultado -> num_rows == 0){
				return false;
			}
			
			if($resultado){
				$resultado2 = array();
				while($obj = $resultado -> fetch_object()){
					
					$inscripcionid = $obj -> id;
					$alumnoid = $obj -> alumno;
					$monitor = $obj -> usuario;
					$actividad = $obj -> actividad;
					
					$nombreAlumno = $this->consultaNombreAlumno($alumnoid);
					
					
					$aux = array ('id_inscripcion' => $inscripcionid, 'id_alumno' => $alumnoid, 'id_monitor' => $monitor,'nombre_alumno' => $nombreAlumno, 'actividad' => $actividad);
					array_push($resultado2, $aux); 
				}
				return $resultado2;
			}	
		}
		
		//Devuelve los datos de inscripcion
		function consultaInscripcion ($idInscripcion){
			
			$mysqli = $this->conexionBD();
			$sql = "SELECT usuario, alumno, actividad FROM inscripcion where id = '$idInscripcion' ORDER BY actividad";
	
			$resultado = $mysqli -> query($sql);
		
			if($resultado -> num_rows == 0){
				return false;
			}
			
			if($resultado){
				$resultado2 = array();
				while($obj = $resultado -> fetch_object()){
					
					$resultado2['id_alumno'] = $obj -> alumno;
					$resultado2['id_monitor'] = $obj -> usuario;
					$resultado2['actividad'] = $obj -> actividad;
				}
				return $resultado2;
			}		
		}
		
		//funcion que inserta en la base de datos el alumno con sus atributos (OK)
		function altaAsistencia($monitorID,$alumnoID,$actividad,$fecha,$asiste)
		{	
				$mysqli=$this->conexionBD();
				$query="INSERT INTO `asistencia`(`USUARIO`, `ALUMNO`, `ACTIVIDAD`, `FECHA`, `ASISTE`) VALUES ('$monitorID', '$alumnoID','$actividad','$fecha', '$asiste')";
				$mysqli->query($query);
				$mysqli->close();
		}
		
		//Funcion a la que se le pasa el id de una asistencia y devuelve si asiste(1) o no(0)
		function consultaChecked ($asistenciaID){
			$mysqli=$this->conexionBD();
			$sql = "SELECT asiste from asistencia where id = '$asistenciaID' ";
			$resultado = $mysqli->query($query);
			
			if($resultado -> num_rows == 0){
				//Se produce algún error.
				return false;
			}else{		
				while($obj = $resultado -> fetch_object()){
					return $obj -> asiste;
				}
			}
		}
		
		//Para el idMonitor y una fecha devuelve un conjunto de atributos de asistencia
		function consultaAsistencia($fecha, $monitorID)
		{
			$mysqli=$this->conexionBD();
			$sql = "SELECT id, usuario, alumno, actividad, fecha, asiste from asistencia where usuario = '$monitorID' and fecha = '$fecha' ORDER BY actividad";
			$resultado = $mysqli->query($sql);
			
			$resultado2 = array();
			if($resultado -> num_rows == 0){
				//No se devuelve nada.
				return false;
			}else{
				while($obj = $resultado -> fetch_object()){
					$id_inscripcion = $obj -> id;
					$id_alumno = $obj -> alumno;
					$actividad = $obj -> actividad;
					$asiste = $obj -> asiste;
					$id_asistencia = $obj -> id;
					$nombre_monitor = $this->consultarMonitor($monitorID);
					$nombreAlumno = $this->consultaNombreAlumno($id_alumno);
					
					$aux = array('nombre_monitor' => $nombre_monitor, 'id_inscripcion' => $id_inscripcion, 'id_alumno' => $id_alumno, 'actividad' => $actividad, 'nombre_alumno' => $nombreAlumno, 'fecha' => $fecha, 'id_monitor' => $monitorID, 'asiste' => $asiste, 'id_asistencia' => $id_asistencia);
					array_push($resultado2, $aux);
				}
				
				return $resultado2;
			}
		}
		
		function modificarAsistencia($idAsistencia, $asistencia){
			$mysqli=$this->conexionBD();
			$query="UPDATE `asistencia` SET `asiste`='$asistencia' WHERE id='$idAsistencia'";
			$mysqli->query($query);
			$mysqli->close();
		}		
		
		function consultarAsistencias(){
			$mysqli=$this->conexionBD();
			$query="SELECT DISTINCT usuario, fecha from asistencia ORDER BY fecha";
			$resultado = $mysqli->query($query);
			
			$resultado2 = array();
			if($resultado -> num_rows == 0){
				//Se produce algún error.
				return false;
			}else{
				while($obj = $resultado -> fetch_object()){
					$id_monitor = $obj -> usuario;
					$fecha = $obj -> fecha;
					//$id_asistencia = $obj -> id;
					
					$nombre_monitor = $this->consultarMonitor($id_monitor);
					$aux = array('id_monitor' => $id_monitor, 'fecha' => $fecha, 'nombre_monitor' => $nombre_monitor);
					array_push($resultado2, $aux);
				}
				return $resultado2;
			}
		}
		
		function consultarMonitor($idMonitor){
			$mysqli=$this->conexionBD();
			$query="SELECT  nombre, apellidos from usuario where id ='$idMonitor' ";
			$resultado = $mysqli->query($query);
			
			if($resultado -> num_rows == 0){
				return false;
			}else{
				while($obj = $resultado -> fetch_object()){
					$nombre = $obj -> nombre . " " . $obj -> apellidos;
					return $nombre;
				}
			}
		}
		
		//Devuelve el monitor y fecha de una asistencia
		function buscarAsistencia($fecha){
			$mysqli=$this->conexionBD();
			$query="SELECT  DISTINCT usuario, fecha from asistencia where fecha ='$fecha'";
			$resultado = $mysqli->query($query);
			
			$resultado2 = array();
			if($resultado -> num_rows == 0){
				//Se produce algún error.
				return false;				
			}else{
				
				while($obj = $resultado -> fetch_object()){
					$id_monitor = $obj -> usuario;
					$fecha = $obj -> fecha;					
					$nombre_monitor = $this->consultarMonitor($id_monitor);
					$aux = array('id_monitor' => $id_monitor, 'fecha' => $fecha, 'nombre_monitor' => $nombre_monitor);
					array_push($resultado2, $aux);
				}
				return $resultado2;
			}
		}
		
		function obtenerMonitorFechaAsistencia($id){
			$mysqli=$this->conexionBD();
			$query="SELECT usuario, fecha from asistencia where id ='$id'";
			$resultado = $mysqli->query($query);
			
			if($resultado -> num_rows == 0){
				//Se produce algún error.
				return false;
			}else{				
				while($obj = $resultado -> fetch_object()){
					$id_monitor = $obj -> usuario;
					$fecha = $obj -> fecha;
					
					$resultado2 = array('id_monitor' => $id_monitor, 'fecha' => $fecha);
					return $resultado2;
				}
			}
		}
		
		function deleteAsistencia($idMonitor, $fecha){
			
			$mysqli=$this->conexionBD();
			$query="DELETE FROM `asistencia` WHERE usuario='$idMonitor' AND fecha='$fecha'";
			$mysqli->query($query);
			$mysqli->close();
		}
		
		function consultaIDAsistencia($id_monitor, $id_alumno, $fecha){
			$mysqli=$this->conexionBD();
			$query="SELECT id from asistencia where usuario ='$id_monitor' AND alumno = '$id_alumno' AND fecha= '$fecha' ";
			$resultado = $mysqli->query($query);
			
			if($resultado -> num_rows == 0){
				//Se produce algún error.
				return false;
				
			}else{
				while($obj = $resultado -> fetch_object()){
					$id = $obj -> id;
					
					return $id;
				}
			}
		}
	}
?>