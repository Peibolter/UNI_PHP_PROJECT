<?php 


class Usuario
	{
	private $nombre;
	private $apellidos;
	private $email;
	private $usuario;
	private $dni;
	private $password;
	private $grupo;

	//constructor
	function constructor($nombre,$apellidos,$email,$usuario,$password,$dni,$grupo)
	{

		$this->nombre=$nombre;
		$this->apellidos=$apellidos;
		$this->email=$email;
		$this->usuario=$usuario;
		$this->password=$password;
		$this->grupo=$grupo;
		$this->dni=$dni;
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

	//funcion que crea un array con los grupos
	function crearArrrayGrupo(){
			
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

		//funcion que crea un array con los usuarios
	function creararrayUsuarios()
	{
		$file = fopen("../Archivos/ArrayConsultarUsuarios.php", "w");
		fwrite($file,"<?php class consult { function array_consultar(){". PHP_EOL);
				 	fwrite($file,"\$form=array(" . PHP_EOL);
		$mysqli=$this->conexionBD();
		$resultado=$mysqli->query("SELECT * FROM `usuario`");
		if(mysqli_num_rows($resultado)){
		while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				$nombre=$fila['NOMBRE'];
				 $apellido1=$fila['APELLIDOS'];
				 $dni=$fila['DNI'];
				 //$email=$fila['EMAIL'];
				 
				 $usuario=$fila['USUARIO'];
				 $password=$fila['PASSWORD'];
				// $fechaNac=$fila['FechaNac'];
				 fwrite($file,"array(\"nombre\"=>'$nombre',\"apellido1\"=>'$apellido1',
					\"dni\"=>'$dni',\"usuario\"=>'$usuario',
					\"password\"=>'$password')," . PHP_EOL);
			 }
		}
				 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();
	}
	//funciona que crea un array con los usuarios que sean parecidos a la busqueda
	function buscarUsuario($user)
		{
			 $file = fopen("../Archivos/ArrayBuscarUsuario.php", "w");
				 fwrite($file,"<?php class buscar { function array_consultar(){". PHP_EOL);
				 fwrite($file,"\$form=array(" . PHP_EOL);

				 $mysqli=$this->conexionBD();
			$query="SELECT * FROM usuario where USUARIO like '%$user%'";
			$resultado=$mysqli->query($query);
		if(mysqli_num_rows($resultado)){
				while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				$nombre=$fila['NOMBRE'];
				 $apellido1=$fila['APELLIDOS'];
				 $dni=$fila['DNI'];
				 //$email=$fila['EMAIL'];
				 
				 $usuario=$fila['USUARIO'];
				 $password=$fila['PASSWORD'];
				 fwrite($file,"array(\"nombre\"=>'$nombre',\"apellido1\"=>'$apellido1',
					\"dni\"=>'$dni',\"usuario\"=>'$usuario',
					\"password\"=>'$password')," . PHP_EOL);
			}
			}
			 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();
		}

		//funcion que comprueba el usuario y la constraseña en la base de datos
	function comprobarUsuario($user,$pass)
	{
		$mysqli=$this->conexionBD();
		$query="SELECT * FROM usuario WHERE USUARIO='$user' AND PASSWORD='$pass'";
		$resultado=$mysqli->query($query);
		if(mysqli_num_rows($resultado)){

		return true;
		}else{
			return false;
		}
	}
	//funcion que inserta en la base de datos el usuarios con sus atributos
	function altaUsuario($nombr,$apellidos,$fecha,$email,$usuario,$pass,$dni,$grupo,$foto,$codigopostal,$cuenta,$descripcion)
	{	
			$mysqli=$this->conexionBD();
			$query="INSERT INTO `usuario`(`USUARIO`, `PASSWORD`, `NOMBRE`, `APELLIDOS`, `DNI`, `GRUPO_NOMBRE_GRUPO`,`FOTO`, `CODIGOPOSTAL`, `CUENTABANCARIA`, `DESCRIPCION`, `FechaNac`,`EMAIL`) VALUES ('$usuario','$pass','$nombr','$apellidos','$dni','$grupo','$foto','$codigopostal','$cuenta','$descripcion','$fecha','$email')";
			$mysqli->query($query);
			$mysqli->close();
	}
	//funcion que te dice si el usuario o ese dni estan en la base de datos.
	function comprobarexiste($user,$dni)
		{
			$mysqli=$this->conexionBD();
			$query="SELECT * FROM usuario where USUARIO ='$user' or  DNI='$dni'";
			$resultado=$mysqli->query($query);
			if(mysqli_num_rows($resultado)){
				$mysqli->close();
				return TRUE;
			}else{
				$mysqli->close();
				return FALSE;
			}
		}
		//funcion que te comprueba que el usuario esta en la base de datos
		function comprobarusuarios($user){

			$mysqli=$this->conexionBD();
			$query="SELECT * FROM usuario where USUARIO ='$user'";
			$resultado=$mysqli->query($query);
			if(mysqli_num_rows($resultado)){
				$mysqli->close();
				return TRUE;
			}else{
				
				$mysqli->close();
				return FALSE;
			}
		}
		//funcion que te crea el array de los usuarios para la vista View
		function crearArrrayUsuario($user){

			$file = fopen("../Archivos/ArrayUsuarios.php", "w");
		fwrite($file,"<?php class consult { function array_consultar(){". PHP_EOL);
				 	fwrite($file,"\$form=array(" . PHP_EOL);
		$mysqli=$this->conexionBD();
		$resultado=$mysqli->query("SELECT * FROM usuario where USUARIO ='$user'");
		if(mysqli_num_rows($resultado)){
		while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				 $nombre=$fila['NOMBRE'];
				 $apellido1=$fila['APELLIDOS'];
				 $dni=$fila['DNI'];
				 $email=$fila['EMAIL'];
				 $usuario=$fila['USUARIO'];
				 $password=$fila['PASSWORD'];
				 $fechaNac=$fila['FechaNac'];
				 $grupo=$fila[ 'GRUPO_NOMBRE_GRUPO'];
				 $foto=$fila['FOTO'];
				 $codigopostal=$fila['CODIGOPOSTAL'];
				 $cuenta=$fila['CUENTABANCARIA'];
				 $descripcion=$fila['DESCRIPCION'];
				 fwrite($file,"array(\"nombre\"=>'$nombre',\"apellido1\"=>'$apellido1',
					\"dni\"=>'$dni',\"usuario\"=>'$usuario',\"email\"=>'$email',
					\"password\"=>'$password',\"fecha\"=>'$fechaNac',\"grupo\"=>'$grupo',\"foto\"=>'$foto',
					\"codigopostal\"=>'$codigopostal',\"cuenta\"=>'$cuenta',\"descripcion\"=>'$descripcion')," . PHP_EOL);
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

		//funcion que modifica al usuario con los datos recibidos del formulario
	function modificarUsuario($nombreUsuario,$apellidos,$Fecha,$email,$usuario,$password,$dni,$grupo,$foto,$codigopostal,$cuenta,$descripcion)
	{
		$mysqli=$this->conexionBD();
			$query="UPDATE `usuario` SET `USUARIO`='$usuario',`PASSWORD`='$password',`NOMBRE`='$nombreUsuario',`APELLIDOS`='$apellidos',`DNI`='$dni',`GRUPO_NOMBRE_GRUPO`='$grupo',`FOTO`='$foto',`CODIGOPOSTAL`='$codigopostal',`CUENTABANCARIA`='$cuenta',`DESCRIPCION`='$descripcion',`FechaNac`='$Fecha',`EMAIL`='$email' WHERE USUARIO='$usuario'";
			$mysqli->query($query);
			$mysqli->close();
	}
	//funcion que eliminar al usuario
	function eliminarUsuario($user)
	{
		$mysqli=$this->conexionBD();
				$query="DELETE FROM `usuario` WHERE USUARIO='$user'";
				$mysqli->query($query);
				$mysqli->close();
					
	}

	}