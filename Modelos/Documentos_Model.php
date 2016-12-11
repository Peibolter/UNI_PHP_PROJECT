<?php 

class Documentos{

	
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
		function altaDocumentos($nombre,$documento)
		{	
			
			$mysqli=$this->conexionBD();
			$query="INSERT INTO `documentos`(`NOMBRE`, `DOCUMENTO`) VALUES ('$nombre','$documento')";
			$mysqli->query($query);
			$mysqli->close();
				
		}
		
		
		
		//funcion que eliminar un grupo
		function bajaDocumentos($name)
			{	
				
				$mysqli=$this->conexionBD();
				$query="DELETE FROM `documentos` WHERE `NOMBRE`='$name'";
				$mysqli->query($query);
				$mysqli->close();
					
			}
			
		//funcion que crea un array del grupo especificado
		function crearArrayDocumentos($name){
			
			$file = fopen("../Archivos/ArrayDocumentos.php", "w");
		fwrite($file,"<?php class consult { function array_consultar(){". PHP_EOL);
				 	fwrite($file,"\$form=array(" . PHP_EOL);
		$mysqli=$this->conexionBD();
		$resultado=$mysqli->query("SELECT * FROM documento where `NOMBRE` ='$name'");
		if(mysqli_num_rows($resultado)){
		while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				$nombre=$fila['NOMBRE'];
				$documento=$fila['DOCUMENTO'];
				 fwrite($file,"array(\"nombre\"=>'$nombre',\"documento\"=>'$documento')," . PHP_EOL);
			 }
		}
				 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();

		}
		
		//funcion que modifica el grupo
		function modificarDocumentos($name, $documento)
		{

			$mysqli=$this->conexionBD();
			$query="UPDATE `documentos` SET `DOCUMENTO`='$documento' where `NOMBRE`='$name'";
			$mysqli->query($query);
			$mysqli->close();
		}
		
		//funcion que crea un array con todos los grupos
		function consultarDocumentos()
		{
				 $file = fopen("../Archivos/ArrayConsultarDocumentos.php", "w");
				 fwrite($file,"<?php class consult23 { function array_consultar(){". PHP_EOL);
				 fwrite($file,"\$form=array(" . PHP_EOL);
			
			$mysqli=$this->conexionBD();
			$query="SELECT * FROM documentos";
			$resultado=$mysqli->query($query);
			if(mysqli_num_rows($resultado)){
				while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				$nombre=$fila['NOMBRE'];
				$documento=$fila['DOCUMENTO'];
				fwrite($file,"array(\"nombre\"=>'$nombre',\"documento\"=>'$documento')," . PHP_EOL);
			}
			}
			 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();
		}
			
		
		function buscarDocumentos($nombre)
		{
			 $file = fopen("../Archivos/ArrayBuscarDocumentos.php", "w");
				 fwrite($file,"<?php class buscar { function array_consultar(){". PHP_EOL);
				 fwrite($file,"\$form=array(" . PHP_EOL);
				 
				 $mysqli=$this->conexionBD();
			$query="SELECT * FROM documentos where `NOMBRE` like '%%$nombre%%'";
			$resultado=$mysqli->query($query);
		if(mysqli_num_rows($resultado)){
				while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				$nombre=$fila['NOMBRE'];
				$documento=$fila['DOCUMENTO'];
				fwrite($file,"array(\"nombre\"=>'$nombre',\"documento\"=>'$documento')," . PHP_EOL);
			}
			}
			 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();
		}
}

?>
			
			
			
			
			
			
			
			
			
			
			
			