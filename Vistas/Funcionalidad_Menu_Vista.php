<?php

	class Funcionalidad_Menu{

		function crear($idioma,$origen){ 
			include '../plantilla/cabecera.php';
			
			$cabecera=new cabecera();
			$cabecera->crear($idioma);

       		$clase=new comprobacion();
    		$idiom=$clase->comprobaridioma($idioma);

    		
 			    		?>
			<div class="container well">
 			<div class="row">
			<div class="col-xs-12">
    		<form class="principal" method="post" action="..\Controlador\Funcionalidad_Controller.php">
             <input type="submit" class="btn btn-default" name="Alta"  value="<?php echo $idiom['AltaFuncionalidad'];?>">    
              </form>
              <form class="principal" method="post" action="..\Controlador\Funcionalidad_Controller.php">
             <input type="submit" class="btn btn-default" name="Baja"  value="<?php echo $idiom['BajaFuncionalidad'];?>">    
              </form>
              <form class="principal" method="post" action="..\Controlador\Funcionalidad_Controller.php">
             <input type="submit" class="btn btn-default" name="Modificar"  value="<?php echo $idiom['ModificarFuncionalidad'];?>">    
              </form>
              <form class="principal" method="post" action="..\Controlador\Funcionalidad_Controller.php">
             <input type="submit" class="btn btn-default" name="Consultar"  value="<?php echo $idiom['ConsultarFuncionalidad'];?>">    
              </form>
             
	</div>
	</div>
	</div>
			<?php 


		}	

			

		}
?>