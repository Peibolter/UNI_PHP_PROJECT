<?php 


class Inscripcion
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

	function crearArrrayActividades(){
			
			$file = fopen("../Archivos/ArrayGrupo_usuarios.php", "w");
		fwrite($file,"<?php class consult { function array_consultar(){". PHP_EOL);
				 	fwrite($file,"\$form=array(" . PHP_EOL);
		$mysqli=$this->conexionBD();
		$resultado=$mysqli->query("SELECT * FROM actividad");
		if(mysqli_num_rows($resultado)){
		while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				$nombre=$fila['NOMBRE'];
				
				 fwrite($file,"array(\"nombre\"=>'$nombre')," . PHP_EOL);
			 }
		}
				 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();

		}

		function crearArrayAlumnos(){
			
			$file = fopen("../Archivos/ArrayAlumnos.php", "w");
		fwrite($file,"<?php class consultAlumno { function array_consultar(){". PHP_EOL);
				 	fwrite($file,"\$form=array(" . PHP_EOL);
		$mysqli=$this->conexionBD();
		$resultado=$mysqli->query("SELECT * FROM alumno ORDER BY NOMBRE");
		if(mysqli_num_rows($resultado)){
		while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				$id=$fila['ID'];
				$nombre=$fila['NOMBRE'];
				$apellidos=$fila['APELLIDOS'];
				
				 fwrite($file,"array(\"id\"=>'$id', \"nombre\"=>'$nombre', \"apellidos\"=>'$apellidos')," . PHP_EOL);
			 }
		}
				 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();

		}

		function crearArrayEventos(){
			
			$file = fopen("../Archivos/ArrayEventos.php", "w");
		fwrite($file,"<?php class consultEvento { function array_consultar(){". PHP_EOL);
				 	fwrite($file,"\$form=array(" . PHP_EOL);
		$mysqli=$this->conexionBD();
		$resultado=$mysqli->query("SELECT * FROM evento ORDER BY NOMBRE");
		if(mysqli_num_rows($resultado)){
		while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				$id=$fila['ID'];
				$nombre=$fila['NOMBRE'];
				
				 fwrite($file,"array(\"id\"=>'$id', \"nombre\"=>'$nombre')," . PHP_EOL);
			 }
		}
				 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();

		}


		//funcion que crea un array con las inscripciones
	function creararrayInscripciones()
	{
		$file = fopen("../Archivos/ArrayConsultarInscripciones.php", "w");
		fwrite($file,"<?php class consult { function array_consultar(){". PHP_EOL);
				 	fwrite($file,"\$form=array(" . PHP_EOL);
		$mysqli=$this->conexionBD();
		$resultado=$mysqli->query("SELECT * FROM `inscripcion`");

		if(mysqli_num_rows($resultado)){
		while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{
				 $idalumno=$fila['ALUMNO'];
				 $resultadoAlumno=$mysqli->query("SELECT NOMBRE, APELLIDOS FROM `alumno` WHERE ID='$idalumno'");
				 $filaAlumno = $resultadoAlumno->fetch_array();
				 $alumno = $filaAlumno['NOMBRE']." ".$filaAlumno['APELLIDOS']; 
				 $idInsc=$fila['ID'];
				 $usuario=$fila['USUARIO'];
				 
				 $fecha=$fila['FECHA'];
				 $actividad=$fila['ACTIVIDAD'];
				 
				 $evento=$fila['EVENTO'];
				 $forma_pago=$fila['FORMA_PAGO'];
				 $tiempo_pago=$fila['TIEMPO_PAGO'];
				 fwrite($file,"array(\"idInsc\"=>'$idInsc', \"usuario\"=>'$usuario',\"alumno\"=>'$alumno',
					\"fecha\"=>'$fecha',\"actividad\"=>'$actividad', \"evento\"=>'$evento',
					\"forma_pago\"=>'$forma_pago', \"tiempo_pago\"=>'$tiempo_pago')," . PHP_EOL);
			 }
		}
				 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();
	}
	//funciona que crea un array con los eventos que sean parecidos a la busqueda
	function buscarInscripcion($str)
		{
			 $file = fopen("../Archivos/ArrayBuscarInscripcion.php", "w");
				 fwrite($file,"<?php class buscar { function array_consultar(){". PHP_EOL);
				 fwrite($file,"\$form=array(" . PHP_EOL);

				 $mysqli=$this->conexionBD();
			$resultadoAlumno=$mysqli->query("SELECT ID FROM `alumno` WHERE NOMBRE like '%$str%' OR APELLIDOS like '%$str%'");
			$filaAlumno = $resultadoAlumno->fetch_array();
			$idalumno = $filaAlumno['ID'];
			$query="SELECT * FROM inscripcion where ACTIVIDAD like '%$str%' OR ALUMNO='$idalumno'";
			$resultado=$mysqli->query($query);
		if(mysqli_num_rows($resultado)){
				while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				 $idalumno=$fila['ALUMNO'];
				 $resultadoAlumno=$mysqli->query("SELECT NOMBRE, APELLIDOS FROM `alumno` WHERE ID='$idalumno'");
				 $filaAlumno = $resultadoAlumno->fetch_array();
				 $alumno = $filaAlumno['NOMBRE']." ".$filaAlumno['APELLIDOS']; 
				 $idInsc=$fila['ID'];
				 $usuario=$fila['USUARIO'];
				 
				 $fecha=$fila['FECHA'];
				 $actividad=$fila['ACTIVIDAD'];
				 
				 $evento=$fila['EVENTO'];
				 $forma_pago=$fila['FORMA_PAGO'];
				 $tiempo_pago=$fila['TIEMPO_PAGO'];
				 fwrite($file,"array(\"idInsc\"=>'$idInsc', \"usuario\"=>'$usuario',\"alumno\"=>'$alumno',
					\"fecha\"=>'$fecha',\"actividad\"=>'$actividad', \"evento\"=>'$evento',
					\"forma_pago\"=>'$forma_pago', \"tiempo_pago\"=>'$tiempo_pago')," . PHP_EOL);
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
	function altaInscripcion($usuario,$alumno,$actividad,$evento,$fecha,$forma_pago,$tiempo_pago) 
	{	
			$mysqli=$this->conexionBD();
			$query="INSERT INTO `inscripcion`(`USUARIO`, `ALUMNO`, `ACTIVIDAD`, `EVENTO`, `FECHA`, `FORMA_PAGO`,`TIEMPO_PAGO`) VALUES ('$usuario','$alumno','$actividad','$evento','$fecha','$forma_pago','$tiempo_pago')";
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
		//funcion que te comprueba que el evento esta en la base de datos
		function comprobarinscripciones($insc){

			$mysqli=$this->conexionBD();
			$query="SELECT * FROM inscripcion where ID ='$insc'";
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
		function crearArrrayInscripcion($insc){

			$file = fopen("../Archivos/ArrayInscripciones.php", "w");
		fwrite($file,"<?php class consult { function array_consultar(){". PHP_EOL);
				 	fwrite($file,"\$form=array(" . PHP_EOL);
		$mysqli=$this->conexionBD();
		$resultado=$mysqli->query("SELECT * FROM inscripcion where ID ='$insc'");
		if(mysqli_num_rows($resultado)){
		while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				 $idInsc=$fila['ID'];
				 $usuario=$fila['USUARIO'];
				 $alumno=$fila['ALUMNO'];
				 $fecha=$fila['FECHA'];
				 $actividad=$fila['ACTIVIDAD'];
				 $evento=$fila['EVENTO'];
				 $forma_pago=$fila['FORMA_PAGO'];
				 $tiempo_pago=$fila['TIEMPO_PAGO'];
				 fwrite($file,"array(\"idInsc\"=>'$idInsc', \"usuario\"=>'$usuario',\"alumno\"=>'$alumno',
					\"fecha\"=>'$fecha',\"actividad\"=>'$actividad', \"evento\"=>'$evento',
					\"forma_pago\"=>'$forma_pago', \"tiempo_pago\"=>'$tiempo_pago')," . PHP_EOL);
			 }
		}
				 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();
		}

		function crearArrayInscripcion($insc){

			$file = fopen("../Archivos/ArrayConsultaInscripcion.php", "w");
		fwrite($file,"<?php class consultInscripcion { function array_consultar(){". PHP_EOL);
				 	fwrite($file,"\$form=array(" . PHP_EOL);
		$mysqli=$this->conexionBD();
		$resultado=$mysqli->query("SELECT * FROM inscripcion where ID ='$insc'");
		if(mysqli_num_rows($resultado)){
		while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				 $idInsc=$fila['ID'];
				 $usuario=$fila['USUARIO'];
				 $alumno=$fila['ALUMNO'];
				 $fecha=$fila['FECHA'];
				 $actividad=$fila['ACTIVIDAD'];
				 $evento=$fila['EVENTO'];
				 $forma_pago=$fila['FORMA_PAGO'];
				 $tiempo_pago=$fila['TIEMPO_PAGO'];
				 fwrite($file,"array(\"idInsc\"=>'$idInsc', \"usuario\"=>'$usuario',\"alumno\"=>'$alumno',
					\"fecha\"=>'$fecha',\"actividad\"=>'$actividad', \"evento\"=>'$evento',
					\"forma_pago\"=>'$forma_pago', \"tiempo_pago\"=>'$tiempo_pago')," . PHP_EOL);
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
	function modificarInscripcion($idInsc,$usuario,$alumno,$actividad,$evento,$fecha,$forma_pago,$tiempo_pago)
	{
		$mysqli=$this->conexionBD();
			$query="UPDATE `inscripcion` SET `USUARIO`='$usuario',`ALUMNO`='$alumno',`ACTIVIDAD`='$actividad',`EVENTO`='$evento',`FECHA`='$fecha',`FORMA_PAGO`='$forma_pago',`TIEMPO_PAGO`='$tiempo_pago' WHERE ID='$idInsc'";
			$mysqli->query($query);
			$mysqli->close();
	}
	//funcion que eliminar al evento
	function eliminarInscripcion($insc)
	{
		$mysqli=$this->conexionBD();
				$query="DELETE FROM `inscripcion` WHERE ID='$insc'";
				$mysqli->query($query);
				$mysqli->close();
					
	}

	}