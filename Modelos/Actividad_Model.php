<?php 

class Actividad{
	
	private $name;

	function creador($name){

		$this->$name=$name;
	}
		//funcion que se conecta a la base de datos
		function conexionBD()
		{
				$mysqli=mysqli_connect("127.0.0.1","root","iu","iu2");
				if(!$mysqli)
				{
					echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    				echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
    				echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    				exit;
				}
				
			return $mysqli;
		}
		//funcion que inserta el espacio 
		function altaActividad($nombre,$categoria,$espacio,$usuario,$descripcion,$fechainicio,$fechafin,$horainicio,$horafin,$precio,$alumnosMax,$dias)
		{	
			$mysqli=$this->conexionBD();
			$query="INSERT INTO actividad(NOMBRE,CATEGORIA,ESPACIO,USUARIO,DESCRIPCION,FECHA_INICIO,FECHA_FIN,HORA_INICIO,HORA_FIN,PRECIO,ALUMNOSMAX,DIAS) VALUES ('".$nombre."','".$categoria."','".$espacio."','".$usuario."','".$descripcion."','".$fechainicio."','".$fechafin."','".$horainicio."','".$horafin."','".$precio."','".$alumnosMax."','".$dias."')";
			$mysqli->query($query) or die("Error en la BD");
			$mysqli->close();
		}

		function listarActividades()
		{
			$toret=array();
			$mysqli=$this->conexionBD();
			$sql="SELECT NOMBRE,CATEGORIA,DESCRIPCION,PRECIO FROM actividad";
			if(!$result=$mysqli->query($sql)){
				return "Error en la BD";
			}else{
				while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
					array_push($toret, $row['NOMBRE']);
					array_push($toret, $row['DESCRIPCION']);
					array_push($toret, $row['CATEGORIA']);
					array_push($toret, $row['PRECIO']);
				}			
			}
			$mysqli->close();
			return $toret;
		}

		function selectEspacios()
		{
			$toret=array();
			$mysqli=$this->conexionBD();
			$sql="SELECT ID,NOMBRE FROM espacio";
			if(!$result=$mysqli->query($sql)){
				return "Error en la BD";
			}else{
				while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
					array_push($toret, $row['ID']);
					array_push($toret, $row['NOMBRE']);
				}			
			}
			$mysqli->close();
			return $toret;
		}

		function selectUsuarios()
		{
			$toret=array();
			$mysqli=$this->conexionBD();
			$sql="SELECT ID,USUARIO FROM usuario";
			if(!$result=$mysqli->query($sql)){
				return "Error en la BD";
			}else{
				while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
					array_push($toret, $row['ID']);
					array_push($toret, $row['USUARIO']);
				}			
			}
			$mysqli->close();
			return $toret;
		}

		function selectCategorias()
		{
			$toret=array();
			$mysqli=$this->conexionBD();
			$sql="SELECT NOMBRE FROM categoria_actividad";
			if(!$result=$mysqli->query($sql)){
				return "Error en la BD";
			}else{
				while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
					array_push($toret, $row['NOMBRE']);
				}			
			}
			$mysqli->close();
			return $toret;
		}

		//comprueba que existe el espacio
		function comprobarexiste($name)
		{
			$mysqli=$this->conexionBD();
			$query="SELECT * FROM actividad where `NOMBRE` ='$name'";
			$resultado=$mysqli->query($query);
			if(mysqli_num_rows($resultado)){
				$mysqli->close();
				return TRUE;
			}else{
				$mysqli->close();
				return FALSE;
			}
		}

		//funcion que eliminar un espacio
		function bajaActividad($name)
			{
				$mysqli=$this->conexionBD();
				$query="DELETE FROM actividad WHERE NOMBRE='$name'";
				$mysqli->query($query) or die("Error");
				$mysqli->close();
					
			}

		//funcion que modifica el grupo
		function modificarActividad($nombre,$categoria,$espacio,$usuario,$descripcion,$fechainicio,$fechafin,$horainicio,$horafin,$precio,$alumnosMax,$dias,$nombreA)
		{
			$mysqli=$this->conexionBD();
			$query="UPDATE actividad SET NOMBRE='$nombre',CATEGORIA='$categoria',ESPACIO='$espacio',USUARIO='$usuario', DESCRIPCION='$descripcion',FECHA_INICIO='$fechainicio',FECHA_FIN='$fechafin',HORA_INICIO='$horainicio',HORA_FIN='$horafin',PRECIO='$precio',ALUMNOSMAX='$alumnosMax',DIAS='$dias' WHERE NOMBRE='$nombreA'";
			$mysqli->query($query) or die("Error en la BD");
			$mysqli->close();
		}

		function consultarActividad($actividad)
		{
			$toret=array();
			$mysqli=$this->conexionBD();
			$sql="SELECT A.NOMBRE,A.CATEGORIA,E.NOMBRE AS ESPACIO,U.NOMBRE AS USUARIO,A.DESCRIPCION,A.FECHA_INICIO,A.FECHA_FIN,A.HORA_INICIO,A.HORA_FIN,A.PRECIO,A.ALUMNOSMAX,A.DIAS FROM actividad A,usuario U, espacio E WHERE A.NOMBRE='".$actividad."' AND A.ESPACIO=E.ID AND A.USUARIO=U.ID LIMIT 1";
			if(!$result=$mysqli->query($sql)){
				return "Error en la BD";
			}else{
				while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
					array_push($toret, $row['NOMBRE']);
					array_push($toret, $row['CATEGORIA']);
					array_push($toret, $row['ESPACIO']);
					array_push($toret, $row['USUARIO']);
					array_push($toret, $row['DESCRIPCION']);
					array_push($toret, $row['FECHA_INICIO']);
					array_push($toret, $row['FECHA_FIN']);
					array_push($toret, $row['HORA_INICIO']);
					array_push($toret, $row['HORA_FIN']);
					array_push($toret, $row['PRECIO']);
					array_push($toret, $row['ALUMNOSMAX']);
					array_push($toret, $row['DIAS']);

				}			
			}
			$mysqli->close();
			return $toret;
		}

		function buscarActividad($actividad)
		{
			$toret=array();
			$mysqli=$this->conexionBD();
			$sql="SELECT * FROM actividad WHERE NOMBRE LIKE '%".$actividad."%' OR USUARIO LIKE '%".$actividad."%' OR ESPACIO LIKE '%".$actividad."%' OR CATEGORIA LIKE '%".$actividad."%'";
			if(!$result=$mysqli->query($sql)){
				return "Error en la BD";
			}else{
				while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
					array_push($toret, $row['NOMBRE']);
					array_push($toret, $row['DESCRIPCION']);
					array_push($toret, $row['CATEGORIA']);
					array_push($toret, $row['PRECIO']);
				}			
			}
			$mysqli->close();
			return $toret;
		}
}

?>