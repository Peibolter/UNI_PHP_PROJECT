<?php 

class Eventos{

	
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
		
		//funcion que inserta el grupo 
		function altaEventos($nombre,$usuario,$espacio)
		{	
			
			$mysqli=$this->conexionBD();
			$query="INSERT INTO `evento`(`NOMBRE`, `USUARIO`,`ESPACIO`) VALUES ('$nombre','$usuario','$espacio')";
			$mysqli->query($query);
			$mysqli->close();
				
		}
		
		
		//comprueba que existe el grupo
		function comprobarexiste($nombre)
		{
			$mysqli=$this->conexionBD();
			$query="SELECT * FROM evento where `NOMBRE` ='$nombre'";
			$resultado=$mysqli->query($query);
			if(mysqli_num_rows($resultado)){
				$mysqli->close();
				return TRUE;
			}else{
				
				$mysqli->close();
				return FALSE;
			}
		}
		
		//funcion que eliminar un grupo
		function bajaEventos($name)
			{	
				
				$mysqli=$this->conexionBD();
				$query="DELETE FROM `evento` WHERE `NOMBRE`='$name'";
				$mysqli->query($query);
				$mysqli->close();
					
			}
			
		//funcion que crea un array del grupo especificado
		function crearArrayEventos($name){
			
			$file = fopen("../Archivos/ArrayEventos.php", "w");
		fwrite($file,"<?php class consult { function array_consultar(){". PHP_EOL);
				 	fwrite($file,"\$form=array(" . PHP_EOL);
		$mysqli=$this->conexionBD();
		$resultado=$mysqli->query("SELECT * FROM evento where `NOMBRE` ='$name'");
		if(mysqli_num_rows($resultado)){
		while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				$nombre=$fila['NOMBRE'];
				$usuario=$fila['USUARIO'];
				$espacio=$fila['ESPACIO'];
				 fwrite($file,"array(\"nombre\"=>'$nombre',\"usuario\"=>'$usuario',\"espacio\"=>'$espacio')," . PHP_EOL);
			 }
		}
				 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();

		}
		
		//funcion que modifica el grupo
		function modificarEventos($name,$usuario,$espacio)
		{

			$mysqli=$this->conexionBD();
			$query="UPDATE `evento` SET `USUARIO`='$usuario', `ESPACIO`='$espacio' where `NOMBRE`='$name'";
			$mysqli->query($query);
			$mysqli->close();
		}
		
		//funcion que crea un array con todos los grupos
		function consultarEventos()
		{
				 $file = fopen("../Archivos/ArrayConsultarEventos.php", "w");
				 fwrite($file,"<?php class consult23 { function array_consultar(){". PHP_EOL);
				 fwrite($file,"\$form=array(" . PHP_EOL);
			
			$mysqli=$this->conexionBD();
			$query="SELECT * FROM evento ";
			$resultado=$mysqli->query($query);
			if(mysqli_num_rows($resultado)){
				while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				$nombre=$fila['NOMBRE'];
				$usuario=$fila['USUARIO'];
				$espacio=$fila['ESPACIO'];
				fwrite($file,"array(\"nombre\"=>'$nombre',\"usuario\"=>'$usuario',\"espacio\"=>'$espacio')," . PHP_EOL);
			}
			}
			 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();
		}
			
		
		function buscarEventos($nombre)
		{
			 $file = fopen("../Archivos/ArrayBuscarEventos.php", "w");
				 fwrite($file,"<?php class buscar { function array_consultar(){". PHP_EOL);
				 fwrite($file,"\$form=array(" . PHP_EOL);
				 
				 $mysqli=$this->conexionBD();
			$query="SELECT * FROM evento where `NOMBRE` like '%%$nombre%%'";
			$resultado=$mysqli->query($query);
		if(mysqli_num_rows($resultado)){
				while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				$nombre=$fila['NOMBRE'];
				$usuario=$fila['USUARIO'];
				$espacio=$fila['ESPACIO'];
				fwrite($file,"array(\"nombre\"=>'$nombre',\"usuario\"=>'$usuario',\"espacio\"=>'$espacio')," . PHP_EOL);
			}
			}
			 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();
		}
}

?>
			
			
			
			
			
			
			
			
			
			
			
			