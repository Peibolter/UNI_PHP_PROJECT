

<?php 

class vista{
	
	function crear(){ 
			
		?>
		<!DOCTYPE html>
		<html>
			<body>
			<p>NUEVA FACTURA:</p>
			<form method="post" action="..\Controlador\Factura_Controller.php?AltaFactura">
			
				<br>Alumno:
					<input type="text" name="alumno">
				<br>
				<br>Precio de la inscipcion:
					<input type="number" name="precio_inscipcion">
				<br>
				<br>Precio del fisioterapeuta:
					<input type="number" name="precio_fisio">
				<br>
				<br>Descuento y promociones:
					<input type="number" name="descuento">
				<br>
				<br>Fecha de la transaccion:
					<input type="date" name="fecha">
				<br>
				<br>Tipo de mensualidad:
				<input list="TipoDeMensualidad" name="tipo_de_mensualidad">
					  <datalist id="TipoDeMensualidad">
						<option value="UN MES">
						<option value="BIMESTRE">
						<option value="TRIMESTRE">
						<option value="CUATRIMESTRE">
						<option value="MEDIAÑO">
						<option value="UN AÑO">
					</datalist>
				<br>
				<br>Forma de Pago:
					<input list="formaPago" name="forma_de_pago">
					  <datalist id="formaPago">
						<option value="EFECTIVO">
						<option value="TARJETA">
					</datalist>
				<br>
				<br>Cantidad a pagar TOTAL:
					<input type="number" name="cantidad">
				<br>
				
			
				<button type="button" onclick="history.back()">Atras</button>
				<input type="submit" name ="NuevaFactura" value="Aceptar">
			</form> 
			</body>
		</html>
		<?php 
	}
	
	
	function atras(){ 
		?>
		<!DOCTYPE html>
		<html>
			<body>
				<p></p>
				<a href= "./MenuPrincipal_Controller.php?acceso=acceso"> <button type="button" >Atras</button> </a>
			</body>
		</html>
		<?php 
	}
	
} 
?>


