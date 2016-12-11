<?php 

class Caja
	{
		private $id;
		private $cantidad_gastos;
		private $cantidad_ingresos;
		private $fecha;
		private $totalefectivo;


		//constructor
		function constructor($cantidad_gastos, $cantidad_ingresos, $fecha, $totalefectivo)
		{
			$this->cantidad_gastos=$cantidad_gastos;
			$this->cantidad_ingresos=$cantidad_ingresos;
			$this->fecha=$fecha;
			$this->totalefectivo=$totalefectivo;
		}
		
		/*function sumar($cantidad,$usuario,$inscipcion,$fisio,$fecha,$descuento,$tiempo_pago,$forma_pago)
		{	
			$result = mysql_query("SELECT SUM(puntos) as total FROM encuesta WHERE idusuario=1");	
			$row = mysql_fetch_array($result, MYSQL_ASSOC);
			echo $row["total"];

				
		}
		*/
		function gastos()
		{	
			$mysqli=$this->conexionBD();
			$query="SELECT sum(`CANTIDAD`) as sumas FROM `gasto` WHERE `FECHA`=CURRENT_DATE()";
			$suma = $mysqli->query($query);
			$toret=$suma->fetch_array();
			echo $toret[0];
			$mysqli->close();
	
		}
				
		
		function ingresos()
		{	
			/*$result = mysql_query("SELECT sum(`CANTIDAD`) as sumas FROM `linea_factura` WHERE `FECHA`=CURRENT_DATE()");
			$row = mysql_fetch_array($result, MYSQL_ASSOC);
			echo $row["sumas"];
			*/
			$mysqli=$this->conexionBD();
			$query="SELECT sum(`CANTIDAD`) as sumas FROM `linea_factura` WHERE `FECHA`=CURRENT_DATE()";
			$suma = $mysqli->query($query);
			$toret=$suma->fetch_array();
			echo $toret[0];
			$mysqli->close();
				
		}

		function total()
		{	
			//$gasto = mysql_query("SELECT sum(`CANTIDAD`) as sumas FROM `gasto` WHERE `FECHA`=CURRENT_DATE()");
			//$ingresos = mysql_query("SELECT sum(`CANTIDAD`) as sumas FROM `linea_factura` WHERE `FECHA`=CURRENT_DATE()");
			//$gas = mysql_fetch_array($gasto, MYSQL_ASSOC);
			//$ing = mysql_fetch_array($ingresos, MYSQL_ASSOC);
			
			//$toret = $this->ingresos() - $this->gastos();
			//echo $toret;
			
			$mysqli=$this->conexionBD();
			
			$query1="SELECT sum(`CANTIDAD`) as sumas FROM `gasto` WHERE `FECHA`=CURRENT_DATE()";
			$suma1 = $mysqli->query($query1);
			$toret1=$suma1->fetch_array();



			$query2="SELECT sum(`CANTIDAD`) as sumas FROM `linea_factura` WHERE `FECHA`=CURRENT_DATE()";
			$suma2 = $mysqli->query($query2);
			$toret2=$suma2->fetch_array();
	
			
			echo $toret2[0]-$toret1[0];
			$mysqli->close();
			
			
				
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
		
	
	}			
?>
	