<?php 


class Funcionalidad{


		private $name;

	function creador($name){

		$this->$name=$name;
	}

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
		function altaFuncionalidadAcciones($funcionalidad,$acciones){

			foreach($acciones as $accion)
				{  
				$mysqli=$this->conexionBD();
				$query="INSERT INTO `fun_accion`(`NOMBRE_FUNCIONALIDADES`, `NOMBRE_ACCIONES`) VALUES ('$funcionalidad','$accion')";
				$mysqli->query($query);
				$mysqli->close();
				}

		}

		function altaFuncionalidad($nombre,$descripcion)
		{	
			$mysqli=$this->conexionBD();
			$query="INSERT INTO `funcionalidades`(`NOMBRE_FUNCIONALIDAD`, `DESCRIPCION`) VALUES ('$nombre','$descripcion')";
			$mysqli->query($query);
			$mysqli->close();
		}

		function comprobarexiste($name)
		{
			$mysqli=$this->conexionBD();
			$query="SELECT * FROM funcionalidades where NOMBRE_FUNCIONALIDAD ='$name'";
			$resultado=$mysqli->query($query);
			if(mysqli_num_rows($resultado)){
				$mysqli->close();
				return TRUE;
			}else{
				$mysqli->close();
				return FALSE;
			}
		}

		function eliminarfungrupo($funcionalidad)
		{
				$mysqli=$this->conexionBD();
				$query="DELETE FROM `fun_grupo` WHERE NOMBRE_FUNCIONALIDAD='$funcionalidad'";
				$mysqli->query($query);
				$mysqli->close();
		}

		function eliminarfunaccion($funcionalidad)
		{
				$mysqli=$this->conexionBD();
				$query="DELETE FROM `fun_accion` WHERE `NOMBRE_FUNCIONALIDADES`='$funcionalidad'";
				$mysqli->query($query);
				$mysqli->close();
		}

		function bajaFuncionalidad($name)
			{
				$mysqli=$this->conexionBD();
				$query="DELETE FROM `funcionalidades` WHERE NOMBRE_FUNCIONALIDAD='$name'";
				$mysqli->query($query);
				$mysqli->close();
					
			}
		
			function crearArrrayGrupo(){

			$file = fopen("../Archivos/ArrayGrupo_usuarios.php", "w");
		fwrite($file,"<?php class consult45 { function array_consultar(){". PHP_EOL);
				 	fwrite($file,"\$form=array(" . PHP_EOL);
		$mysqli=$this->conexionBD();
		$resultado=$mysqli->query("SELECT * FROM grupo");
		if(mysqli_num_rows($resultado)){
		while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				$nombre=$fila['NOMBRE_GRUPO'];
				
				 fwrite($file,"array(\"nombre\"=>'$nombre')," . PHP_EOL);
			 }
		}
		
				 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();

		}
		function modificarFuncionalidad($name,$descripcion)
		{
			$mysqli=$this->conexionBD();
			$query="UPDATE `funcionalidades` SET `DESCRIPCION`='$descripcion' where `NOMBRE_FUNCIONALIDAD`='$name'";
			$mysqli->query($query);
			$mysqli->close();
		}
		function modificarFuncionalidadGrupo($funcionalidad,$grupos){
			
			
				$mysqli=$this->conexionBD();
				$query="DELETE from `fun_grupo` WHERE `NOMBRE_FUNCIONALIDAD`='$funcionalidad'";
				$mysqli->query($query);
				$mysqli->close();
				foreach($grupos as $grupo)
				{  
				$mysqli=$this->conexionBD();
				$query="INSERT INTO `fun_grupo`(`NOMBRE_FUNCIONALIDAD`, `NOMBRE_GRUPO`) VALUES ('$funcionalidad','$grupo')";
				$mysqli->query($query);
				$mysqli->close();
				}
		}
		function modificaFuncionalidadAccion($funcionalidad,$acciones){


				$mysqli=$this->conexionBD();
				$query="DELETE from `fun_accion` WHERE `NOMBRE_FUNCIONALIDADES`='$funcionalidad'";
				$mysqli->query($query);
				$mysqli->close();
				foreach($acciones as $accion)
				{  
				$mysqli=$this->conexionBD();
				$query="INSERT INTO `fun_accion`(`NOMBRE_FUNCIONALIDADES`, `NOMBRE_ACCIONES`) VALUES ('$funcionalidad','$accion')";
				$mysqli->query($query);
				$mysqli->close();
				}

		}

		function insertargrupoFuncionalidad($funcionalidad,$grupos){

			foreach($grupos as $grupo)
			{
			$mysqli=$this->conexionBD();
			$query="INSERT INTO `fun_grupo`(`NOMBRE_FUNCIONALIDAD`, `NOMBRE_GRUPO`) VALUES ('$funcionalidad','$grupo')";
			$mysqli->query($query);
			$mysqli->close();
			}
		}
		function accionesdeFuncionalidades($funcionalidades)
		{

			$file=fopen("../Archivos/ArrayAccionesdelasFuncionalidades.php", "w");
		    fwrite($file,"<?php class consultar60 { function array_consultar(){". PHP_EOL);
			fwrite($file,"\$form=array(". PHP_EOL);
				
			foreach($funcionalidades as $funcionalidad)
			{	
					$mysqli=$this->conexionBD();
					$query="SELECT * FROM `fun_accion` WHERE `NOMBRE_FUNCIONALIDADES`='$funcionalidad'";
					$result=$mysqli->query($query);
					
			if ($result->num_rows > 0){
   		  $boolean=TRUE;
   		 while($fila = $result->fetch_assoc()){
				if($boolean==TRUE){

				$nombre=$fila['NOMBRE_FUNCIONALIDADES'];
				fwrite($file,"array(\"nombre\"=>'$nombre',". PHP_EOL);
					fwrite($file,"\"accion\"=>array(". PHP_EOL);
				$boolean=FALSE;
				}
				$accion=$fila['NOMBRE_ACCIONES'];
				fwrite($file,"'$accion',". PHP_EOL);
				 }
				 fwrite($file,")),". PHP_EOL);
			  }
			  //mysqli_free_result($resultado);
			  $result->close();
			  $mysqli->close();
			}
			fwrite($file,");return \$form;}}?>". PHP_EOL);
			fclose($file);
			
			}

		function accionesdeFuncionalidad($name){

			$mysqli=$this->conexionBD();
			ini_set('auto_detect_line_endings', TRUE); 
			$file = fopen("../Archivos/ArrayAccionesFuncionalidad.php", "w");

		    fwrite($file,"<?php class permisosfuncionalidadesss { function array_consultar(){". PHP_EOL);
			fwrite($file,"\$form=array(" . PHP_EOL);
			$query="SELECT * FROM `fun_accion` WHERE `NOMBRE_FUNCIONALIDADES`='$name'";
			$resultado=$mysqli->query($query);
			if($resultado!=NULL){
			if(mysqli_num_rows($resultado)){
				while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				$nombre=$fila['NOMBRE_FUNCIONALIDADES'];
				$accion=$fila['NOMBRE_ACCIONES'];
				
				 fwrite($file,"array(\"nombre\"=>'$nombre',\"accion\"=>'$accion')," . PHP_EOL);
				 }
				}
			fwrite($file,");return \$form;}}?>". PHP_EOL);
			}else{ 
				fwrite($file,");return \$form;}}?>". PHP_EOL);
			}
			fclose($file);
			$mysqli->query($query);
			$mysqli->close();
		}

		function crearArraGrupodeFuncionalidad($name){
			$mysqli=$this->conexionBD();
			$file = fopen("../Archivos/ArraGrupodeFuncionalidad.php", "w");
		    fwrite($file,"<?php class grupos1 { function array_consultar(){". PHP_EOL);
			fwrite($file,"\$form=array(" . PHP_EOL);
			$query="SELECT * FROM `fun_grupo` WHERE `NOMBRE_FUNCIONALIDAD`='$name'";
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
		}
		else{ fwrite($file,");return \$form;}}?>". PHP_EOL);}	
			fclose($file);
			$mysqli->query($query);
			$mysqli->close();

		}

		function crearArraFuncionalidades($name){
			$mysqli=$this->conexionBD();
			ini_set('auto_detect_line_endings', TRUE);
			$file = fopen("../Archivos/ArrayFuncionalidadesDeGrupo.php", "w");
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


		function crearArrrayFuncionalidad($name){
			
			$file = fopen("../Archivos/ArrayFuncionalidad.php", "w");
		fwrite($file,"<?php class consult { function array_consultar(){". PHP_EOL);
				 	fwrite($file,"\$form=array(" . PHP_EOL);
		$mysqli=$this->conexionBD();
		$resultado=$mysqli->query("SELECT * FROM `funcionalidades` where `NOMBRE_FUNCIONALIDAD`='$name' ");
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
		function funcionalidadAcciones($name){

			$file = fopen("../Archivos/ArrayFuncionalidadAcciones.php", "w");
		fwrite($file,"<?php class consult3 { function array_consultar(){". PHP_EOL);
				 	fwrite($file,"\$form=array(" . PHP_EOL);
		$mysqli=$this->conexionBD();
		$resultado=$mysqli->query("SELECT * FROM `fun_accion` WHERE `NOMBRE_FUNCIONALIDADES`='$name'");
		if(mysqli_num_rows($resultado)){
		while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				$nombre=$fila['NOMBRE_FUNCIONALIDADES'];
				$accion=$fila['NOMBRE_ACCIONES'];
				 fwrite($file,"array(\"nombre\"=>'$nombre',\"accion\"=>'$accion')," . PHP_EOL);
			 }
			}
				 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();
		}

		function consultarFuncionalidad()
		{		
				 ini_set('auto_detect_line_endings', TRUE); 
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
		function buscarFuncionalidad($nombre)
		{	
			ini_set('auto_detect_line_endings', TRUE); 
			 $file = fopen("../Archivos/ArrayBuscarFuncionalidad.php", "w");
				 fwrite($file,"<?php class buscar { function array_consultar(){". PHP_EOL);
				 fwrite($file,"\$form=array(" . PHP_EOL);

				 $mysqli=$this->conexionBD();
			$query="SELECT * FROM funcionalidades where `NOMBRE_FUNCIONALIDAD` like '%$nombre%'";
			$resultado=$mysqli->query($query);
			if($resultado!=Null){
		if(mysqli_num_rows($resultado)){
				while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				$nombre=$fila['NOMBRE_FUNCIONALIDAD'];
				$descripcion=$fila['DESCRIPCION'];
				fwrite($file,"array(\"nombre\"=>'$nombre', \"descripcion\"=>'$descripcion')," . PHP_EOL);
			}
			}
			 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();
		}else{
			 fwrite($file,");return \$form;}}?>". PHP_EOL);

		}}
}

?>