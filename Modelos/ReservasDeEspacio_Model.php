<?php 

class ReservasDeEspacio{
	
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
		//funcion que inserta la reserva de espacio 
		function altaReservaEspacio($actividad, $espacio)
		{	
			$mysqli=$this->conexionBD();
			$query="UPDATE actividad SET ESPACIO = $espacio WHERE NOMBRE='$actividad'";
			$mysqli->query($query) or die("Error en la BD");
			$mysqli->close();
		}

		//funcion que da de baja una reserva de espacio
		function bajaReservaEspacio($actividad, $espacio)
		{	
			$mysqli=$this->conexionBD();
			$query="UPDATE actividad SET ESPACIO=''  WHERE NOMBRE='$actividad' AND ESPACIO='$espacio'";
			$mysqli->query($query) or die("Error en la BD");
			$mysqli->close();
		}
		
		function consultaReservaEspacio($actividad, $espacio)
		{	
			$mysqli=$this->conexionBD();
			$query="SELECT e.ID, e.NOMBRE, e.DESCRIPCION, a.FECHA_INICIO, a.FECHA_FIN from espacio e,actividad a WHERE e.NOMBRE=a.ESPACIO";
			$mysqli->query($query) or die("Error en la BD");
			$mysqli->close();
			return query;
		}
		
}

?>