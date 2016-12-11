<?php 

class Notificacion
	{


function conexionBD(){

				$mysqli=mysqli_connect("127.0.0.1","root","iu","iu2");
				if(!$mysqli){
					echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    				echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
    				echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    				exit;
				}
				
			return $mysqli;
	}


	function creararrayEmailusuarios()
	{
		
		$file=fopen("../Archivos/ArrayEmailUsuarios.php", "w");
		    fwrite($file,"<?php class consultar{ function array_consultar(){". PHP_EOL);
			fwrite($file,"\$form=array(". PHP_EOL);

		$mysqli=$this->conexionBD();
		
		$resultado=$mysqli->query("SELECT * FROM `usuario`");
		if(mysqli_num_rows($resultado))
		{
		while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				 $nombre=$fila['NOMBRE'];
				 $dni=$fila['DNI'];
				 $email=$fila['EMAIL'];
				 $usuario=$fila['USUARIO'];
				 $password=$fila['PASSWORD'];
				 $fechaNac=$fila['FechaNac'];
				 fwrite($file,"array(\"email\"=>\"$email\",\"nombre\"=>\"$nombre\",\"usuario\"=>\"$usuario\"),". PHP_EOL);
				 
			 }

		}		 
				 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();
	}
	
	function arrayalumnos(){


		$file=fopen("../Archivos/ArrayEmailAlumnos.php", "w");
		    fwrite($file,"<?php class consultar{ function array_consultar(){". PHP_EOL);
			fwrite($file,"\$form=array(". PHP_EOL);

		$mysqli=$this->conexionBD();
		
		$resultado=$mysqli->query("SELECT * FROM `alumno`");
		if(mysqli_num_rows($resultado))
		{
		while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				 $nombre=$fila['NOMBRE'];
				 $apellidos=$fila['APELLIDOS'];
				 $email=$fila['EMAIL'];
				 fwrite($file,"array(\"email\"=>\"$email\",\"nombre\"=>\"$nombre\",\"apellidos\"=>\"$apellidos\"),". PHP_EOL);
				 
			 }

		}		 
				 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();
	}

	

	function altanotificacion($usuarios,$comentario,$fecha,$userorigen,$foto)
	{
		$visto=1;
		foreach($usuarios as $usuario)
			{

			$mysqli=$this->conexionBD();
			$query="INSERT INTO `notificacion`(`USUARIO`, `COMENTARIO`, `FECHATIME`,`USUARIOORIGEN`, `VISTO`, `FOTO`) VALUES ('$usuario','$comentario','$fecha','$userorigen','$visto','$foto')";
			$mysqli->query($query);
			$mysqli->close();


			}

	}
	function arrayNotificacionesUsuario($usuario){

		$file = fopen("../Archivos/ArrayNotificaciondeUsuario.php", "w");
		fwrite($file,"<?php class datos { function array_consultar(){". PHP_EOL);
		fwrite($file,"\$form=array(" . PHP_EOL);
		$mysqli=$this->conexionBD();
		$resultado=$mysqli->query("SELECT * FROM `notificacion` WHERE `USUARIO`='$usuario'");
		if(mysqli_num_rows($resultado)){
		while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 	
				$id=$fila['ID'];
				$usuario=$fila['USUARIO'];
				$comentario=$fila['COMENTARIO'];
				$fecha=$fila['FECHATIME'];
				$usuarioorigen=$fila['USUARIOORIGEN'];
				$visto=$fila['VISTO'];
				$foto=$fila['FOTO'];
				
				 fwrite($file,"array(\"id\"=>'$id',\"usuario\"=>'$usuario',\"comentario\"=>'$comentario',\"fecha\"=>'$fecha',\"usuarioorigen\"=>'$usuarioorigen',
				 	\"visto\"=>'$visto',\"foto\"=>'$foto')," . PHP_EOL);
			 }
		}
		
				 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();

	}
	

	function arraynotificiacionporid($id){

		$file = fopen("../Archivos/ArrayNotificacionid.php", "w");
		fwrite($file,"<?php class arrays { function array_consultar(){". PHP_EOL);
		fwrite($file,"\$form=array(" . PHP_EOL);
		$mysqli=$this->conexionBD();
		$resultado=$mysqli->query("SELECT * FROM `notificacion` WHERE `ID`='$id'");
		if(mysqli_num_rows($resultado)){
		while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 	
				$id=$fila['ID'];
				$usuario=$fila['USUARIO'];
				$comentario=$fila['COMENTARIO'];
				$fecha=$fila['FECHATIME'];
				$usuarioorigen=$fila['USUARIOORIGEN'];
				$visto=$fila['VISTO'];
				$foto=$fila['FOTO'];
				
				 fwrite($file,"array(\"id\"=>'$id',\"usuario\"=>'$usuario',\"comentario\"=>'$comentario',\"fecha\"=>'$fecha',\"usuarioorigen\"=>'$usuarioorigen',
				 	\"visto\"=>'$visto',\"foto\"=>'$foto')," . PHP_EOL);
			 }
		}
		
				 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();


	}

	function arraynotificiacionporusuario($usuario){


		$file = fopen("../Archivos/ArrayNotificaciousuario.php", "w");
		fwrite($file,"<?php class arrays { function array_consultar(){". PHP_EOL);
		fwrite($file,"\$form=array(" . PHP_EOL);
		$mysqli=$this->conexionBD();
		$resultado=$mysqli->query("SELECT * FROM `notificacion` WHERE `USUARIO`='$usuario'");
		if(mysqli_num_rows($resultado)){
		while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 	
				$id=$fila['ID'];
				$usuario=$fila['USUARIO'];
				$comentario=$fila['COMENTARIO'];
				$fecha=$fila['FECHATIME'];
				$usuarioorigen=$fila['USUARIOORIGEN'];
				$visto=$fila['VISTO'];
				$foto=$fila['FOTO'];
				
				 fwrite($file,"array(\"id\"=>'$id',\"usuario\"=>'$usuario',\"comentario\"=>'$comentario',\"fecha\"=>'$fecha',\"usuarioorigen\"=>'$usuarioorigen',
				 	\"visto\"=>'$visto',\"foto\"=>'$foto')," . PHP_EOL);
			 }
		}
		
				 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();

	}
	function eliminartodaslasnotificacionesUsuario($usuario){
		
		$mysqli=$this->conexionBD();
		$mysqli->query("DELETE  FROM `notificacion` WHERE `USUARIO`='$usuario'");
		$mysqli->close();

	}
	function eliminarnotificacion($id)
	{
		$mysqli=$this->conexionBD();
		$mysqli->query("DELETE  FROM `notificacion` WHERE `ID`='$id'");
		$mysqli->close();
	}
}

?>