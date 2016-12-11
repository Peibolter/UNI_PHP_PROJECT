<?php 

class ReservasDeActividad{
	
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
		function altaReservaActividad($actividad, $usuario)
		{	
			$mysqli=$this->conexionBD();
			$query="UPDATE actividad SET USUARIO = USUARIO+1 WHERE NOMBRE='$actividad'";
			$mysqli->query($query) or die("Error en la BD");
			$mysqli->close();
		}

		function bajaReservaActividad($actividad)
		{
			$mysqli=$this->conexionBD();
			$query="UPDATE actividad SET USUARIO = USUARIO-1 WHERE NOMBRE='$actividad'";
			$mysqli->query($query) or die("Error en la BD");
			$mysqli->close();
		}

		function consultaReservaActividad($actividad)
		{
					
			$mysqli=$this->conexionBD();
			echo "El numero de espacios libres es: "
			$query="SELECT ESPACIO-USUARIO AS EspaciosLibres from actividad WHERE NOMBRE='$actividad'";
			$mysqli->query($query) or die("Error en la BD");
			$mysqli->close();
			return $query;
		}
		
		function comprobarEspacioLibre($actividad)
	{
		$mysqli=$this->conexionBD();
		$query="SELECT * FROM actividad WHERE ESPACIO>USUARIO";
		$resultado=$mysqli->query($query);
		if(mysqli_num_rows($resultado)){

		return true;
		}else{
			return false;
		}
	}

}

?>