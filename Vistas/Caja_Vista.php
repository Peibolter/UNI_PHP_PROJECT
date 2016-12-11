<?php 

class vistaCaja{
	
	function mostrarGastos(){ 
		?>
		<!DOCTYPE html>
		<html>
			<body>
				<p></p>
				<p>Total de los gastos de hoy son: </p>
			</body>
		</html>
		<?php 
	}
	
	function mostrarIngresos(){ 
		?>
		<!DOCTYPE html>
		<html>
			<body>
				<p>Total de los ingresos de hoy son: </p>
			</body>
		</html>
		<?php 
	}
	
	function mostrarTotal(){ 
		?>
		<!DOCTYPE html>
		<html>
			<body>
				<p>________________________________________</p>
				<p>Total: </p>
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
