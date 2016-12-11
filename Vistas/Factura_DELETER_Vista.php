<?php 

class vista3{
	
	function mostrarfacturas(){ 
		?>
		<!DOCTYPE html>
		<html>
			<body>
				<p>Selecciona un número de factura para eliminar una de sus facturas:</p>
				<form method="post" action="..\Controlador\Factura_Controller.php?Eliminar" >
					<input type="text" align="right" placeholder="Numero de factura" name="IdentificadorParaEliminar" >
					<input type="submit" name="buscadorParaEliminar2" value="Eliminar">
					<button type="button" onclick="history.back()">Atras</button>
				</form>
			</body>
		</html>
		<?php 
	}
	
	function confirmar(){
		?>
		<!DOCTYPE html>
		<html>
			<body>
				<p>Tu factura se ha eliminado correctamente:</p>
				<a href= "./MenuPrincipal_Controller.php?acceso=acceso"> <button type="button" >Atras</button> </a>
			</body>
		</html>
		<?php 
		
	}
} 
?>
