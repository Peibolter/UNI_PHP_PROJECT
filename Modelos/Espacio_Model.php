<?php 

class Espacio{
	
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
		function altaEspacio($nombre,$descripcion)
		{	
			$mysqli=$this->conexionBD();
			$query="INSERT INTO espacio(NOMBRE, DESCRIPCION) VALUES ('".$nombre."','".$descripcion."')";
			$mysqli->query($query) or die("Error en la BD");
			$mysqli->close();
		}

		function listarEspacios()
		{
			$toret=array();
			$mysqli=$this->conexionBD();
			$sql="SELECT * FROM espacio";
			if(!$result=$mysqli->query($sql)){
				return "Error en la BD";
			}else{
				while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
					array_push($toret, $row['NOMBRE']);
					array_push($toret, $row['DESCRIPCION']);
				}			
			}
			$mysqli->close();
			return $toret;
		}

		//comprueba que existe el espacio
		function comprobarexiste($name)
		{
			$mysqli=$this->conexionBD();
			$query="SELECT * FROM espacio where `NOMBRE` ='$name'";
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
		function bajaEspacio($name)
			{
				$mysqli=$this->conexionBD();
				$query="DELETE FROM espacio WHERE NOMBRE='$name'";
				$mysqli->query($query) or die("Error");
				$mysqli->close();
					
			}

		//funcion que modifica el grupo
		function modificarEspacio($nombre,$descripcion,$nombreA)
		{
			$mysqli=$this->conexionBD();
			$query="UPDATE espacio SET NOMBRE='$nombre', DESCRIPCION='$descripcion' WHERE NOMBRE='$nombreA'";
			$mysqli->query($query) or die("Error en la BD");
			$mysqli->close();
		}

		function consultarEspacio($espacio)
		{
			$toret=array();
			$mysqli=$this->conexionBD();
			$sql="SELECT * FROM espacio WHERE NOMBRE='".$espacio."' LIMIT 1";
			if(!$result=$mysqli->query($sql)){
				return "Error en la BD";
			}else{
				while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
					array_push($toret, $row['NOMBRE']);
					array_push($toret, $row['DESCRIPCION']);
				}			
			}
			$mysqli->close();
			return $toret;
		}

		function buscarEspacio($espacio)
		{
			$toret=array();
			$mysqli=$this->conexionBD();
			$sql="SELECT * FROM espacio WHERE NOMBRE LIKE '%".$espacio."%'";
			if(!$result=$mysqli->query($sql)){
				return "Error en la BD";
			}else{
				while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
					array_push($toret, $row['NOMBRE']);
					array_push($toret, $row['DESCRIPCION']);
				}			
			}
			$mysqli->close();
			return $toret;
		}
}

?>