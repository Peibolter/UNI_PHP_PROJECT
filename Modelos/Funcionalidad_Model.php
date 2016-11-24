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
		function altaFuncionalidad($nombre,$descripcion,$acciones)
		{	
				$alta=0;
				$baja=0;
				$consultar=0;
				$modificar=0;
				$view=0;
				foreach($acciones as $accion)
				{	
            	if($accion=="Alta")
            	{
              		$alta=1;
            	}
            	if($accion=="Baja"){
            		$baja=1;
            	}
            	if($accion=="Modificar"){
            		$modificar=1;
            	}if($accion=="Consultar"){
            		$consultar=1;
            	}if($accion=="VerDetalle"){
            		$view=1;
            	}
            	}
			$mysqli=$this->conexionBD();
			$query="INSERT INTO `funcionalidades`(`NOMBRE_FUNCIONALIDAD`, `DESCRIPCION`, `CREAR`, `MODIFICAR`, `ELIMINAR`, `CONSULTAR`, `VERDETALLE`) VALUES ('$nombre','$descripcion',$alta,$modificar,$baja,$consultar,$view)";
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

		function bajaFuncionalidad($name)
			{
				$mysqli=$this->conexionBD();
				$query="DELETE FROM `funcionalidades` WHERE NOMBRE_FUNCIONALIDAD='$name'";
				$mysqli->query($query);
				$mysqli->close();
					
			}
		
			function crearArrrayGrupo(){
				ini_set('auto_detect_line_endings', TRUE); 
			$file = fopen("../Archivos/ArrayGrupo_usuarios.php", "w");
		fwrite($file,"<?php class consult { function array_consultar(){". PHP_EOL);
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
		function modificarFuncionalidad($name,$descripcion,$permisos)
		{
			$mysqli=$this->conexionBD();
				$alta=0;
				$baja=0;
				$consultar=0;
				$modificar=0;
				$view=0;
				foreach($permisos as $permiso)
				{	
            	if($permiso=="Alta")
            	{
              		$alta=1;
            	}
            	if($permiso=="Baja"){
            		$baja=1;
            	}
            	if($permiso=="Modificar"){
            		$modificar=1;
            	}if($permiso=="Consultar"){
            		$consultar=1;
            	}if($permiso=="VerDetalle"){
            		$view=1;
            	}
            	}
			$query="UPDATE `funcionalidades` SET `DESCRIPCION`='$descripcion',`CREAR`='$alta',`MODIFICAR`='$modificar',`ELIMINAR`='$baja',`CONSULTAR`='$consultar',`VERDETALLE`='$view' where `NOMBRE_FUNCIONALIDAD`='$name'";
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


		function insertargrupoFuncionalidad($funcionalidad,$grupos){

			
			foreach($grupos as $grupo)
			{
			$mysqli=$this->conexionBD();
			$query="INSERT INTO `fun_grupo`(`NOMBRE_FUNCIONALIDAD`, `NOMBRE_GRUPO`) VALUES ('$funcionalidad','$grupo')";
			$mysqli->query($query);
			$mysqli->close();
			}
			
		}
		function permisosdeFuncionalidades($funcionalidades){
			
			ini_set('auto_detect_line_endings', TRUE); 
			$file = fopen("../Archivos/ArrayPermisosFuncionalidadades.php", "w");
		    fwrite($file,"<?php class consultar { function array_consultar(){". PHP_EOL);
			fwrite($file,"\$form=array(" . PHP_EOL);
			for($numar =0;$numar<count($funcionalidades);$numar++)
				{	
					$mysqli=$this->conexionBD();
					$name=$funcionalidades[$numar]["funcionalidad"];
					$query="SELECT * FROM `funcionalidades` WHERE `NOMBRE_FUNCIONALIDAD`='$name'";
					$resultado=$mysqli->query($query);
			if(mysqli_num_rows($resultado)){
				while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				$nombre=$fila['NOMBRE_FUNCIONALIDAD'];
				$consultar=$fila['CONSULTAR'];
				$modificar=$fila['MODIFICAR'];
				$detalle=$fila['VERDETALLE'];
				$alta=$fila['CREAR'];
				$eliminar=$fila['ELIMINAR'];
				 fwrite($file,"array(\"nombre\"=>'$nombre',\"consultar\"=>'$consultar',\"modificar\"=>'$modificar',\"detalle\"=>'$detalle',\"alta\"=>'$alta',\"eliminar\"=>'$eliminar')," . PHP_EOL);
				 }
				}
				
			$mysqli->query($query);
			$mysqli->close();
				}
			fwrite($file,");return \$form;}}?>". PHP_EOL);
			fclose($file);
			
			}

		function permisosdeFuncionalidad($name){
			$mysqli=$this->conexionBD();
			ini_set('auto_detect_line_endings', TRUE); 
			$file = fopen("../Archivos/ArrayPermisosFuncionalidad.php", "w");
		    fwrite($file,"<?php class permisosfuncionalidadesss { function array_consultar(){". PHP_EOL);
			fwrite($file,"\$form=array(" . PHP_EOL);
			$query="SELECT * FROM `funcionalidades` WHERE `NOMBRE_FUNCIONALIDAD`='$name'";
			$resultado=$mysqli->query($query);
			if($resultado!=NULL){
			if(mysqli_num_rows($resultado)){
				while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				$nombre=$fila['NOMBRE_FUNCIONALIDAD'];
				$consultar=$fila['CONSULTAR'];
				$modificar=$fila['MODIFICAR'];
				$detalle=$fila['VERDETALLE'];
				$alta=$fila['CREAR'];
				$eliminar=$fila['ELIMINAR'];
				 fwrite($file,"array(\"nombre\"=>'$nombre',\"consultar\"=>'$consultar',\"modificar\"=>'$modificar',\"detalle\"=>'$detalle',\"alta\"=>'$alta',\"eliminar\"=>'$eliminar')," . PHP_EOL);
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
			ini_set('auto_detect_line_endings', TRUE); 
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
		}else{ fwrite($file,");return \$form;}}?>". PHP_EOL);}	
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
			
			ini_set('auto_detect_line_endings', TRUE); 
			$file = fopen("../Archivos/ArrayFuncionalidad.php", "w");
		fwrite($file,"<?php class consult { function array_consultar(){". PHP_EOL);
				 	fwrite($file,"\$form=array(" . PHP_EOL);
		$mysqli=$this->conexionBD();
		$resultado=$mysqli->query("SELECT * FROM funcionalidades where `NOMBRE_FUNCIONALIDAD`='$name' ");
		if(mysqli_num_rows($resultado)){
		while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				$nombre=$fila['NOMBRE_FUNCIONALIDAD'];
				$descripcion=$fila['DESCRIPCION'];
				$consultar=$fila['CONSULTAR'];
				$eliminar=$fila['ELIMINAR'];
				$crear=$fila['CREAR'];
				$modificar=$fila['MODIFICAR'];
				$verdetalle=$fila['VERDETALLE'];
				 fwrite($file,"array(\"nombre\"=>'$nombre',\"descripcion\"=>'$descripcion',\"consultar\"=>'$consultar',\"eliminar\"=>'$eliminar',\"crear\"=>'$crear',
				 	\"verdetalle\"=>'$verdetalle',\"modificar\"=>'$modificar')," . PHP_EOL);
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