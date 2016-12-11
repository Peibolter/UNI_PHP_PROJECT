<?php 


class Grupo{
	

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
		//funcion que inserta el grupo 
		function altaGrupo($nombre,$descripcion)
		{	
			$mysqli=$this->conexionBD();
			$query="INSERT INTO `grupo`(`NOMBRE_GRUPO`, `DESCRIPCION`) VALUES ('$nombre','$descripcion')";
			$mysqli->query($query);
			$mysqli->close();
				
		}
		//comprueba que existe el grupo
		function comprobarexiste($name)
		{
			$mysqli=$this->conexionBD();
			$query="SELECT * FROM grupo where `NOMBRE_GRUPO` ='$name'";
			$resultado=$mysqli->query($query);
			if(mysqli_num_rows($resultado)){
				$mysqli->close();
				return TRUE;
			}else{
				
				$mysqli->close();
				return FALSE;
			}
		}
		//funciona que crea un array con todas 
		function consultarFuncionalidad()
		{
				 $file = fopen("../Archivos/ArrayConsultarFuncionalidad.php", "w");
				 fwrite($file,"<?php class consult { function array_consultar(){". PHP_EOL);
				 fwrite($file,"\$form=array(" . PHP_EOL);

			$mysqli=$this->conexionBD();
			$query="SELECT * FROM funcionalidades ";
			$resultado=$mysqli->query($query);
			if(mysqli_num_rows($resultado)){
				while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				$nombre=$fila['NOMBRE_FUNCIONALIDAD'];
				$descripcion=$fila['DESCRIPCION'];
				fwrite($file,"array(\"nombre\"=>'$nombre',\"descripcion\"=>'$descripcion')," . PHP_EOL);
			}
			}
			 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();
		}
		//funcion que inserta el grupo y la funcionalidad 
		function inserGrupoFuncionalidades($grupo,$funcionalidades){
			foreach($funcionalidades as $funcionalidad)
			{
			$mysqli=$this->conexionBD();
			$query="INSERT INTO `fun_grupo`(`NOMBRE_FUNCIONALIDAD`, `NOMBRE_GRUPO`) VALUES ('$funcionalidad','$grupo')";
			$mysqli->query($query);
			$mysqli->close();
			}

		}
		//funcion que eliminar un grupo
		function bajaGrupo($name)
			{
				$mysqli=$this->conexionBD();
				$query="DELETE FROM `grupo` WHERE `NOMBRE_GRUPO`='$name'";
				$mysqli->query($query);
				$mysqli->close();
					
			}

			//funcion que crea un array del grupo especificado
		function crearArrrayGrupo($name){
			
			$file = fopen("../Archivos/ArrayGrupo.php", "w");
		fwrite($file,"<?php class consult { function array_consultar(){". PHP_EOL);
				 	fwrite($file,"\$form=array(" . PHP_EOL);
		$mysqli=$this->conexionBD();
		$resultado=$mysqli->query("SELECT * FROM grupo where `NOMBRE_GRUPO` ='$name'");
		if(mysqli_num_rows($resultado)){
		while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				$nombre=$fila['NOMBRE_GRUPO'];
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
		function modificarGrupo($name,$descripcion)
		{
			$mysqli=$this->conexionBD();
			$query="UPDATE `grupo` SET `DESCRIPCION`='$descripcion' where `NOMBRE_GRUPO`='$name'";
			$mysqli->query($query);
			$mysqli->close();
		}
		//funcion que crea un array con todos los grupos
		function consultarGrupo()
		{
				 $file = fopen("../Archivos/ArrayConsultarGrupo.php", "w");
				 fwrite($file,"<?php class consult { function array_consultar(){". PHP_EOL);
				 fwrite($file,"\$form=array(" . PHP_EOL);

			$mysqli=$this->conexionBD();
			$query="SELECT * FROM grupo ";
			$resultado=$mysqli->query($query);
			if(mysqli_num_rows($resultado)){
				while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				$nombre=$fila['NOMBRE_GRUPO'];
				$descripcion=$fila['DESCRIPCION'];
				fwrite($file,"array(\"nombre\"=>'$nombre',\"descripcion\"=>'$descripcion')," . PHP_EOL);
			}
			}
			 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();
		}
		//funcion que modifica
		function modificarFuncionalidadGrupo($funcionalidades,$grupo){
			
				$mysqli=$this->conexionBD();
				$query="DELETE from `fun_grupo` WHERE `NOMBRE_GRUPO`='$grupo'";
				$mysqli->query($query);
				$mysqli->close();
				foreach($funcionalidades as $funcionalidad)
				{  
				$mysqli=$this->conexionBD();
				$query="INSERT INTO `fun_grupo`(`NOMBRE_FUNCIONALIDAD`, `NOMBRE_GRUPO`) VALUES ('$funcionalidad','$grupo')";
				$mysqli->query($query);
				$mysqli->close();
				}

		}
		function eliminarFuncionalidadGrupo($grupo){

			$mysqli=$this->conexionBD();
				$query="DELETE from `fun_grupo` WHERE `NOMBRE_GRUPO`='$grupo'";
				$mysqli->query($query);
				$mysqli->close();
		}

		function crearArraGrupodeFuncionalidad($name){
			$mysqli=$this->conexionBD();
			$file = fopen("../Archivos/ArraGrupodeFuncionalidad.php", "w");
		    fwrite($file,"<?php class grupos1 { function array_consultar(){". PHP_EOL);
			fwrite($file,"\$form=array(" . PHP_EOL);
			$query="SELECT * FROM `fun_grupo` WHERE `NOMBRE_GRUPO`='$name'";
			$resultado=$mysqli->query($query);
			if($resultado!=NULL){
			if(mysqli_num_rows($resultado)){
				while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				$grupo=$fila['NOMBRE_GRUPO'];
				$funcionalidad=$fila['NOMBRE_FUNCIONALIDAD'];
				fwrite($file,"array(\"grupo\"=>'$grupo',\"funcionalidad\"=>'$funcionalidad')," . PHP_EOL);
			 }
			 }
			fwrite($file,");return \$form;}}?>". PHP_EOL);
		}else{ fwrite($file,");return \$form;}}?>". PHP_EOL);}	
			fclose($file);
			$mysqli->query($query);
			$mysqli->close();

		}
		function buscarGrupo($nombre)
		{
			 $file = fopen("../Archivos/ArrayBuscarGrupo.php", "w");
				 fwrite($file,"<?php class buscar { function array_consultar(){". PHP_EOL);
				 fwrite($file,"\$form=array(" . PHP_EOL);
				 $mysqli=$this->conexionBD();
			$query="SELECT * FROM grupo where `NOMBRE_GRUPO` like '%%$nombre%%'";
			$resultado=$mysqli->query($query);
		if(mysqli_num_rows($resultado)){
				while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				$nombre=$fila['NOMBRE_GRUPO'];
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