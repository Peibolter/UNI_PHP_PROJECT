<?php 

class Alumno
{
	private $dni;
	private $nombre;
	private $apellidos;
	private $nacimiento;
	private $direccion;
	private $telefono;
	private $email;
	private $foto;
	private $cuentaBancaria;
		
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
	
	//Funcion que modifica el alumno con los datos recibidos del formulario.(OK)
	function modificarAlumno($dni,$nombre,$apellidos,$nacimiento,$direccion,$telefono,$email,$foto,$cuentabancaria)
	{
		$mysqli=$this->conexionBD();
		$query="UPDATE `alumno` SET `NOMBRE`='$nombre',`APELLIDOS`='$apellidos', `NACIMIENTO`='$nacimiento', `DIRECCION`='$direccion', `TELEFONO`='$telefono', `FOTO`='$foto',`CUENTABANCARIA`='$cuentabancaria' WHERE DNI='$dni'";
		$mysqli->query($query);
		$mysqli->close();
	}
	//funcion que elimina al alumno (OK)
	function eliminarAlumno($dni)
	{
		$mysqli=$this->conexionBD();
		$query="DELETE FROM `alumno` WHERE DNI='$dni'";
		$mysqli->query($query);
		$mysqli->close();
					
	}
	
	//funcion que inserta en la base de datos el alumno con sus atributos (OK)
	function altaAlumno($dni,$nombre,$apellidos,$nacimiento,$direccion,$telefono,$email,$foto,$cuentabancaria)
	{	
			$mysqli=$this->conexionBD();
			$query="INSERT INTO `alumno`(`DNI`, `NOMBRE`, `APELLIDOS`, `NACIMIENTO`, `DIRECCION`, `TELEFONO`, `EMAIL`,`FOTO`, `CUENTABANCARIA`) VALUES ('$dni', '$nombre','$apellidos','$nacimiento','$direccion','$telefono','$email','$foto','$cuentabancaria')";
			$mysqli->query($query);
			$mysqli->close();
	}
	
	//funcion que te dice si el alumno o su dni están en la base de datos. (ok)
	function comprobarexiste($nombre,$dni)
	{
		$mysqli=$this->conexionBD();
		$query="SELECT * FROM alumno where [NOMBRE LIKE '%" . $nombre . "%'] OR  [DNI='$dni']";
		$resultado=$mysqli->query($query);
		if(mysqli_num_rows($resultado)){
			$mysqli->close();
			return TRUE;
		}
		return FALSE;
	}
	//funcion que te comprueba que el alumno está en la base de datos (OK)
	function existeAlumno($dni){

		$mysqli=$this->conexionBD();
		$query="SELECT * FROM alumno where DNI ='$dni'";
		$resultado=$mysqli->query($query);
		//Si se devuelve alguna fila, return true
		if (!$resultado){
			echo 'No se ha podido conectar con la base de datos';		
		}
		if($resultado -> num_rows  == 0){
			$mysqli->close();
			return FALSE;
		}
		$mysqli->close();
		return TRUE;
	}
	
	//Método que sirve para extraer el nombre, apellidos y dni de todos los alumnos de la base de datos	
	function consultarTodo()
	{
		$mysqli = $this->conexionBD();
		$sql = "SELECT nombre, apellidos, dni FROM alumno";
		$resultado = $mysqli -> query($sql);
		
		if(!$resultado){
			echo 'Se ha producido un error en la consulta';
			return false;
		}
		
		if($resultado){
			$resultado2 = array();
			while($obj = $resultado -> fetch_object()){
				$nom = $obj -> nombre;
				$ap = $obj -> apellidos;
				$dni = $obj -> dni;
				$aux = array ( 'nombre' => $nom, 'apellidos' => $ap, 'dni' => $dni);
				array_push($resultado2, $aux); 
			}
			return $resultado2;
		}
	}
	
	//Método que busca un usuario por dni o nombre; return nombre, apellidos y dni para una búsqueda, false en otro caso
	function buscarAlumno($busqueda)
	{
		$mysqli = $this->conexionBD();
		$sql = "SELECT nombre, apellidos, dni FROM alumno WHERE nombre like '%$busqueda%' or dni like '%$busqueda%' ";
		$resultado = $mysqli -> query($sql);
		
		if($resultado -> num_rows == 0){
			//echo 'Se ha producido un error en la consulta';
			return false;
		}
		
		if($resultado){
			$resultado2 = array();
			while($obj = $resultado -> fetch_object()){
				$nom = $obj -> nombre;
				$ap = $obj -> apellidos;
				$dni = $obj -> dni;
				$aux = array ( 'nombre' => $nom, 'apellidos' => $ap, 'dni' => $dni);
				array_push($resultado2, $aux); 
			}

			return $resultado2;
		}
	}
	
	//Función que devuelve un array asocitativo con todos los datos para un alumno; false si no se encuentra
	function datosAlumno($dni){
		
		$mysqli = $this->conexionBD();
		$sql = "SELECT nombre, apellidos, dni, nacimiento, direccion, telefono, cuentabancaria, foto, email FROM alumno WHERE dni LIKE '%$dni%' ";
		$resultado = $mysqli -> query($sql);
				
		if($resultado -> num_rows == 0){
			//echo 'Se ha producido un error en la consulta';
			return false;
		}
		
		if($resultado){
			$resultado2 = array();
			while($obj = $resultado->fetch_object()){
							
				$resultado2['Nombre'] = $obj -> nombre;
				$resultado2['Apellidos'] = $obj -> apellidos;
				$resultado2['DNI'] = $obj -> dni;
				$resultado2['Nacimiento'] = $obj -> nacimiento;
				$resultado2['Direccion'] = $obj -> direccion;
				$resultado2['Telefono'] = $obj -> telefono;
				$resultado2['CuentaBancaria'] = $obj -> cuentabancaria;
				$resultado2['Foto'] = $obj -> foto;
				$resultado2['Email'] = $obj -> email;
				
			}
			
			return $resultado2;
		}		
	}
}
?>