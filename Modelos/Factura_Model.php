<?php 


class Factura
	{
		private $idlinea;
		private $pagado;
		private $precio_inscripcion;
		private $precio_fisio;


		//constructor
		function constructor($cantidad,$usuario,$inscipcion,$fisio,$fecha,$descuento,$tiempo_pago,$forma_pago)
		{
			$this->cantidad=$cantidad;
			$this->usuario=$usuario;
			$this->inscipcion=$inscipcion;
			$this->$fisio=$fisio;
			$this->fecha=$fecha;
			$this->descuento=$descuento;
			$this->tiempo_pago=$tiempo_pago;		
			$this->forma_pago=$forma_pago;
			
		}
		function Sumar($cantidad,$usuario,$inscipcion,$fisio,$fecha,$descuento,$tiempo_pago,$forma_pago)
		{	
			$result = mysql_query("SELECT SUM(puntos) as total FROM encuesta WHERE idusuario=1");	
			$row = mysql_fetch_array($result, MYSQL_ASSOC);
			echo $row["total"];

				
		}
		
		
			//funcion que inserta en la base de datos la factura con sus atributos
		function altaFactura($cantidad,$usuario,$inscipcion,$fisio,$fecha,$descuento,$tiempo_pago,$forma_pago)
		{	
				$mysqli=$this->conexionBD();
				$query="INSERT INTO `linea_factura`(`CANTIDAD`,`USUARIO`,`INSCRIPCION`,`FISIO`,`FECHA`,`DESCUENTO`,`TIEMPO_PAGO`,`FORMA_PAGO`) VALUES ('$cantidad','$usuario','$inscipcion','$fisio', '$fecha','$descuento','$tiempo_pago','$forma_pago')";
				$mysqli->query($query);
				$mysqli->close();
				
				
		}

		//funcion que crea un array con los grupos
		function crearArrayFacturas(){
					
				$file = fopen("../Archivos/ArrayGrupoFacturas.php", "w");
				fwrite($file,"<?php class consult { function array_consultar(){". PHP_EOL);
				fwrite($file,"\$form=array(" . PHP_EOL);
				$mysqli=$this->conexionBD();
				$resultado=$mysqli->query("SELECT * FROM linea_factura");
				if(mysqli_num_rows($resultado)){
				while($fila = $resultado->fetch_array())
					{
						$filas[] = $fila;
					}
					foreach($filas as $fila)
					{ 
						$nombre=$fila['USUARIO'];
						
						 fwrite($file,"array(\"nombre\"=>'$nombre')," . PHP_EOL);
					 }
				}
						 fwrite($file,");return \$form;}}?>". PHP_EOL);
						 fclose($file);
						 $resultado->free();
						 $mysqli->close();

		}
		//Funcion para ver todas las facturas
		function VerFactura()
		{		
			$con=$this->conexionBD();
			$db_connect=$this->conexionBD();
			if(!$db_connect){
				echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
				echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
				echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
				exit;
			}
			
			if (mysqli_connect_error())
			{
			 die ('error de conexión('. mysqli_connect_errno().') '
			 . mysqli_connect_error());
			}

	
			$consulta = mysqli_query($con, "select * from linea_factura")
			or die ("error al traer los datos");
			echo '<p> </p>';
			echo '<table border="1">';
			echo '<tr>';
			echo '<th id="USUARIO"> Alumno </th>';
			echo '<th id="CANTIDAD"> Cantidad total </th>';

			echo '</tr>';

			while($extraido = mysqli_fetch_array($consulta))
			{
			echo '<tr>';
			echo '<td><p>'.$extraido['USUARIO'].'</p></td>';
			echo '<td><p>'.$extraido['CANTIDAD'].'</p></td>';
			echo '</tr>';

			}
				
			mysqli_close($db_connect);
			echo '</table>';
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
		
		function VerFacturaEnDetalle($USER)
		{		

			$con=$this->conexionBD();
			$db_connect=$this->conexionBD();
			if(!$db_connect){
				echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
				echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
				echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
				exit;
			}
			
			if (mysqli_connect_error())
			{
				die ('error de conexión('. mysqli_connect_errno().') '
				 . mysqli_connect_error());
			}
			$consulta = mysqli_query($con, "select * from linea_factura where `USUARIO` = '" . $USER . "'")
			or die (" error al traer los datos");
			echo '<p> </p>';
			echo '<table border="1">';
			echo '<tr>';
			echo '<th id="USUARIO"> Alumno </th>';
			echo '<th id="CANTIDAD"> Cantidad total </th>';
			echo '<th id="INSCRIPCION"> Precio de la inscripcion </th>';
			echo '<th id="FISIO"> Precio del fisioterapeuta </th>';
			echo '<th id="FECHA"> Fecha de la factura </th>';
			echo '<th id="DESCUENTO"> Descuento</th>';
			echo '<th id="TIEMPO_PAGO"> Tiempo pagado </th>';
			echo '<th id="FORMA_PAGO"> Forma de pago </th>';
			echo '</tr>';

			while($extraido = mysqli_fetch_array($consulta))
			{
				echo '<tr>';
				echo '<td><p>'.$extraido['USUARIO'].'</p></td>';
				echo '<td><p>'.$extraido['CANTIDAD'].'</p></td>';
				echo '<td><p>'.$extraido['INSCRIPCION'].'</p></td>';
				echo '<td><p>'.$extraido['FISIO'].'</p></td>';
				echo '<td><p>'.$extraido['FECHA'].'</p></td>';
				echo '<td><p>'.$extraido['DESCUENTO'].'</p></td>';
				echo '<td><p>'.$extraido['TIEMPO_PAGO'].'</p></td>';
				echo '<td><p>'.$extraido['FORMA_PAGO'].'</p></td>';			
				echo '</tr>';
			}
				
			mysqli_close($db_connect);
			echo '</table>';
			echo '<button type="button" onclick="history.back()">Atras</button>';
			echo '<a href= "./MenuPrincipal_Controller.php?acceso=acceso"> <button type="button" >Volver al menu</button> </a>';
			}
			
			
		function VerFacturaEnDetalleParaEliminar($USER)
		{	
	

			$con=$this->conexionBD();
			$db_connect=$this->conexionBD();
			if(!$db_connect){
				echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
				echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
				echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
				exit;
			}
			
			if (mysqli_connect_error())
			{
				die ('error de conexión('. mysqli_connect_errno().') '
				 . mysqli_connect_error());
			}
			else
			{
				echo ('conexion exitosa');
				echo '<p> </p>';
			}
			$consulta = mysqli_query($con, "select * from linea_factura where `USUARIO` = '" . $USER . "'")
			or die (" error al traer los datos");
			echo '<p> </p>';
			echo '<table border="1">';
			echo '<tr>';
			echo '<th id="ID"> Numero de Factura</th>';
			echo '<th id="USUARIO"> Alumno </th>';
			echo '<th id="CANTIDAD"> Cantidad total </th>';
			echo '<th id="INSCRIPCION"> Precio de la inscripcion </th>';
			echo '<th id="FISIO"> Precio del fisioterapeuta </th>';
			echo '<th id="FECHA"> Fecha de la factura </th>';
			echo '<th id="DESCUENTO"> Descuento</th>';
			echo '<th id="TIEMPO_PAGO"> Tiempo pagado </th>';
			echo '<th id="FORMA_PAGO"> Forma de pago </th>';
			echo '</tr>';

			while($extraido = mysqli_fetch_array($consulta))
			{
				echo '<tr>';
				echo '<td><p>'.$extraido['ID'].'</p></td>';
				echo '<td><p>'.$extraido['USUARIO'].'</p></td>';
				echo '<td><p>'.$extraido['CANTIDAD'].'</p></td>';
				echo '<td><p>'.$extraido['INSCRIPCION'].'</p></td>';
				echo '<td><p>'.$extraido['FISIO'].'</p></td>';
				echo '<td><p>'.$extraido['FECHA'].'</p></td>';
				echo '<td><p>'.$extraido['DESCUENTO'].'</p></td>';
				echo '<td><p>'.$extraido['TIEMPO_PAGO'].'</p></td>';
				echo '<td><p>'.$extraido['FORMA_PAGO'].'</p></td>';			
				echo '</tr>';
			}
				
			mysqli_close($db_connect);
			echo '</table>';
			}
		function Eliminar($ID)
		{		
			$mysqli=$this->conexionBD();
			$query="DELETE FROM `linea_factura` WHERE `ID` = '" . $ID . "'";
			$mysqli->query($query);
			$mysqli->close();
				
		}
	
	}			
?>
	