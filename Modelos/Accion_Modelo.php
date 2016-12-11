<?php 

class Accion{

	
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
		function altaAccion($nombre,$descripcion)
		{	
			
			$mysqli=$this->conexionBD();
			$query="INSERT INTO `acciones`(`NOMBREACCION`, `DESCRIPCION`) VALUES ('$nombre','$descripcion')";
			$mysqli->query($query);
			$mysqli->close();
				
		}
		//comprueba que existe el grupo
		function comprobarexiste($name)
		{
			
			$mysqli=$this->conexionBD();
			$query="SELECT * FROM acciones where `NOMBREACCION` ='$name'";
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
		function bajaAccion($name)
			{	
				
				$mysqli=$this->conexionBD();
				$query="DELETE FROM `acciones` WHERE `NOMBREACCION`='$name'";
				$mysqli->query($query);
				$mysqli->close();
					
			}

			//funcion que crea un array del grupo especificado
		function crearArrrayAccion($name){
			
			$file = fopen("../Archivos/ArrayAccion.php", "w");
		fwrite($file,"<?php class consult { function array_consultar(){". PHP_EOL);
				 	fwrite($file,"\$form=array(" . PHP_EOL);
		$mysqli=$this->conexionBD();
		$resultado=$mysqli->query("SELECT * FROM acciones where `NOMBREACCION` ='$name'");
		if(mysqli_num_rows($resultado)){
		while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				$nombre=$fila['NOMBREACCION'];
				$descripcion=$fila['DESCRIPCION'];
				 fwrite($file,"array(\"nombre\"=>'$nombre',\"descripcion\"=>'$descripcion')," . PHP_EOL);
			 }
		}
				 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();

		}
		//funcion que modifica el grupo
		function modificarAccion($name,$descripcion)
		{

			$mysqli=$this->conexionBD();
			$query="UPDATE `acciones` SET `DESCRIPCION`='$descripcion' where `NOMBREACCION`='$name'";
			$mysqli->query($query);
			$mysqli->close();
		}
		//funcion que crea un array con todos los grupos
		function consultarAccion()
		{
				 $file = fopen("../Archivos/ArrayConsultarAccion.php", "w");
				 fwrite($file,"<?php class consult23 { function array_consultar(){". PHP_EOL);
				 fwrite($file,"\$form=array(" . PHP_EOL);
			
			$mysqli=$this->conexionBD();
			$query="SELECT * FROM acciones ";
			$resultado=$mysqli->query($query);
			if(mysqli_num_rows($resultado)){
				while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				$nombre=$fila['NOMBREACCION'];
				$descripcion=$fila['DESCRIPCION'];
				fwrite($file,"array(\"nombre\"=>'$nombre',\"descripcion\"=>'$descripcion')," . PHP_EOL);
			}
			}
			 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();
		}
		

		
		function buscarAccion($nombre)
		{
			 $file = fopen("../Archivos/ArrayBuscarAccion.php", "w");
				 fwrite($file,"<?php class buscar { function array_consultar(){". PHP_EOL);
				 fwrite($file,"\$form=array(" . PHP_EOL);
				 
				 $mysqli=$this->conexionBD();
			$query="SELECT * FROM acciones where `NOMBREACCION` like '%%$nombre%%'";
			$resultado=$mysqli->query($query);
		if(mysqli_num_rows($resultado)){
				while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				$nombre=$fila['NOMBREACCION'];
				$descripcion=$fila['DESCRIPCION'];
				fwrite($file,"array(\"nombre\"=>'$nombre',\"descripcion\"=>'$descripcion')," . PHP_EOL);
			}
			}
			 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();
		}
}

?>