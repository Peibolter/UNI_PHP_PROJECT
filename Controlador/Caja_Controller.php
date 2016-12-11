<?php 

  include("../Modelos/Caja_Model.php");
  include("../Idiomas/idiomas.php");
  include("../Vistas/Caja_Vista.php");
  include("../Vistas/MenuPrincipal_SHOW_Vista.php");
  include ("../Modelos/Usuario_Model.php");
  include("../Modelos/Funcionalidad_Model.php");
  session_start();

		
	if(isset($_REQUEST['GestionDeCaja'])){
		$clase=new vistaCaja();
		$model=new Caja();
		
		
		$clase->mostrarGastos();
		$model->gastos();
		$clase->mostrarIngresos();
		$model->ingresos();
		$clase->mostrarTotal();
		$model->total();
		$clase->atras();
	} 

	
	

	
	
	
	
?>
		
		
		
   	