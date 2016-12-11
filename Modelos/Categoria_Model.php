<?php 


class Categoria
	{
	private $usuario;
	private $alumno;
	private $actividad;
	private $evento;
	private $fecha;
	private $forma_pago;
	private $tiempo_pago;

	//constructor
	function constructor($usuario,$alumno,$actividad,$evento,$forma_pago,$fecha,$tiempo_pago)
	{

		$this->usuario=$usuario;
		$this->alumno=$alumno;
		$this->actividad=$actividad;
		$this->evento=$evento;
		$this->forma_pago=$forma_pago;
		$this->tiempo_pago=$tiempo_pago;
		$this->fecha=$fecha;
	}
	//funcion para conectar a la base de datos
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

	function crearArrrayDescuentos(){
			
			$file = fopen("../Archivos/ArrayDescuentos.php", "w");
		fwrite($file,"<?php class consult { function array_consultar(){". PHP_EOL);
				 	fwrite($file,"\$form=array(" . PHP_EOL);
		$mysqli=$this->conexionBD();
		$resultado=$mysqli->query("SELECT * FROM descuento");
		if(mysqli_num_rows($resultado)){
		while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				$cantidad=$fila['CANTIDAD'];
				
				 fwrite($file,"array(\"cantidad\"=>'$cantidad')," . PHP_EOL);
			 }
		}
				 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();

		}


		//funcion que crea un array con las inscripciones
	function creararrayCategorias()
	{
		$file = fopen("../Archivos/ArrayConsultarCategorias.php", "w");
		fwrite($file,"<?php class consult { function array_consultar(){". PHP_EOL);
				 	fwrite($file,"\$form=array(" . PHP_EOL);
		$mysqli=$this->conexionBD();
		$resultado=$mysqli->query("SELECT * FROM `categoria_actividad`");
		if(mysqli_num_rows($resultado)){
		while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				 $nombre=$fila['NOMBRE'];
				 $descripcion=$fila['DESCRIPCION'];
				 $descuento=$fila['DESCUENTO'];
				 fwrite($file,"array(\"nombre\"=>'$nombre', \"descripcion\"=>'$descripcion',\"descuento\"=>'$descuento')," . PHP_EOL);
			 }
		}
				 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();
	}
	//funciona que crea un array con los eventos que sean parecidos a la busqueda
	function buscarCategoria($name)
		{
			 $file = fopen("../Archivos/ArrayBuscarCategoria.php", "w");
				 fwrite($file,"<?php class buscar { function array_consultar(){". PHP_EOL);
				 fwrite($file,"\$form=array(" . PHP_EOL);

				 $mysqli=$this->conexionBD();
			$query="SELECT * FROM categoria_actividad where NOMBRE like '%$name%' OR DESCRIPCION like '%name%'";
			$resultado=$mysqli->query($query);
		if(mysqli_num_rows($resultado)){
				while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 

				 $nombre=$fila['NOMBRE'];
				 $descripcion=$fila['DESCRIPCION'];
				 $descuento=$fila['DESCUENTO'];
				 fwrite($file,"array(\"nombre\"=>'$nombre',\"descripcion\"=>'$descripcion', \"descuento\"=>'$descuento')," . PHP_EOL);
			}
			}
			 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();
		}

		//funcion que comprueba el evento y la constraseña en la base de datos
	function comprobarUsuario($user,$pass)
	{
		$mysqli=$this->conexionBD();
		$query="SELECT * FROM evento WHERE USUARIO='$user' AND PASSWORD='$pass'";
		$resultado=$mysqli->query($query);
		if(mysqli_num_rows($resultado)){

		return true;
		}else{
			return false;
		}
	}
	//funcion que inserta en la base de datos el eventos con sus atributos
	function altaCategoria($nombre,$descripcion,$descuento) 
	{	
			$mysqli=$this->conexionBD();
			$query="INSERT INTO `categoria_actividad`(`NOMBRE`, `DESCRIPCION`, `DESCUENTO`) VALUES ('$nombre','$descripcion','$descuento')";
			$mysqli->query($query);
			$mysqli->close();
	}

	function getIdUser($usuario){
		$mysqli=$this->conexionBD();
		$resultado=$mysqli->query("SELECT * FROM usuario where USUARIO ='$usuario'");
		if(mysqli_num_rows($resultado)){
		while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				 $idUser=$fila['ID'];
				 return $idUser;
			}
		}


	}

	function getDescuentoId($cant){
		$mysqli=$this->conexionBD();
		$query= "SELECT * FROM descuento where CANTIDAD ='$cant'";
		echo '<script language="javascript">';
			echo 'alert("'.$query.'")';
			echo '</script>';
		$resultado=$mysqli->query($query);
		if(mysqli_num_rows($resultado)){
		while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				 $idDescuento=$fila['ID'];
				 return $idDescuento;
			}
		}


	}

		//funcion que te comprueba que el evento esta en la base de datos
		function comprobarcategoria($cat){

			$mysqli=$this->conexionBD();
			$query="SELECT * FROM categoria_actividad where NOMBRE ='$cat'";
			$resultado=$mysqli->query($query);
			if(mysqli_num_rows($resultado)){
				$mysqli->close();
				return TRUE;
			}else{
				
				$mysqli->close();
				return FALSE;
			}
		}
		//funcion que te crea el array de los eventos para la vista View
		function crearArrrayCategoria($insc){

			$file = fopen("../Archivos/ArrayConsultaCategoria.php", "w");
		fwrite($file,"<?php class consultCategoria { function array_consultar(){". PHP_EOL);
				 	fwrite($file,"\$form=array(" . PHP_EOL);
		$mysqli=$this->conexionBD();
		$resultado=$mysqli->query("SELECT * FROM categoria_actividad where NOMBRE ='$insc'");
		if(mysqli_num_rows($resultado)){
		while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				  $nombre=$fila['NOMBRE'];
				 $descripcion=$fila['DESCRIPCION'];
				 $descuento=$fila['DESCUENTO'];
				 fwrite($file,"array(\"nombre\"=>'$nombre', \"descripcion\"=>'$descripcion',\"descuento\"=>'$descuento')," . PHP_EOL);
			 }
		}
				 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();
		}

	


	//funcion que obtiene el grupo del usuario
		function obtenergrupo($user){
			$grupo="";
		$mysqli=$this->conexionBD();
			$mysqli=$this->conexionBD();
		$resultado=$mysqli->query("SELECT * FROM usuario where USUARIO ='$user'");
		if(mysqli_num_rows($resultado)){
		while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 	
				 $grupo=$fila[ 'GRUPO_NOMBRE_GRUPO'];
			 }
		}
				 $resultado->free();
				 $mysqli->close();
				 return $grupo;
		}

		//funcion que modifica al evento con los datos recibidos del formulario
	function modificarCategoria($actual,$nombre,$descripcion,$descuento)
	{
		$mysqli=$this->conexionBD();
			$query="UPDATE `categoria_actividad` SET `NOMBRE`='$nombre',`DESCRIPCION`='$descripcion',`DESCUENTO`='$descuento' WHERE `NOMBRE`='$actual'";
			$mysqli->query($query);
			$mysqli->close();
	}
	//funcion que eliminar al evento
	function eliminarCategoria($cat)
	{
		$mysqli=$this->conexionBD();
				$query="DELETE FROM `categoria_actividad` WHERE NOMBRE='$cat'";
				$mysqli->query($query);
				$mysqli->close();
					
	}

	}