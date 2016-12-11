<?php 

class vista2{
	
	function mostrarfacturas(){ 
		?>
		<!DOCTYPE html>
		<html>
			<body>
				<p></p>
				<p>Selecciona un alumno para ver el detalle de sus facturas:</p>
				<form method="post" action="..\Controlador\Factura_Controller.php?VerFacturaAlDetalle" >
					<input type="text" align="right" placeholder="Nombre" name="Identificador" >
					<input type="submit" name="buscadorDeNombre" value="Buscar">
					<button type="button" onclick="history.back()">Atras</button>
				</form>
				<p>Selecciona un alumno para eliminar una de sus facturas:</p>
				<form method="post" action="..\Controlador\Factura_Controller.php?VerFacturaAlDetalleParaEliminar" >
					<input type="text" align="right" placeholder="Nombre" name="IdentificadorParaEliminar" >
					<input type="submit" name="buscadorParaEliminar" value="Continuar">
					<button type="button" onclick="history.back()">Atras</button>
				</form>
			</body>
		</html>
		<?php 
	}
} 
?>
