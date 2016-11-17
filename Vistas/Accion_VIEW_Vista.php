<?php 
	class Accion_VIEW{

		function crear($form,$idioma,$origen){ 

			include('../plantilla/cabecera.php');
        	include("../Funciones/comprobaridioma.php");
        	$clase=new cabecera();
        	$clases=new comprobacion();
        	$idiom=$clases->comprobaridioma($idioma);
        	$clase->crear($idiom);
        	include('../plantilla/menulateral.php');
        	$menus=new menulateral();
       		$menus->crear($idiom);
    		?>
    		<header>
		
  			</header>

<?php 		 

		for ($numar =0;$numar<count($form);$numar++){

			echo "<div class=\"container well\">";
 			echo "<div class=\"row\">"; 
			echo "<div class=\"col-xs-12\">";
			if($origen=="Baja"){
				echo "<form class=\"form-horizontal\" method=\"post\" action=\"..\Controlador\Accion_Controller.php?BajaAccion=".$form[$numar]['nombre']."\">";
				}
			if($origen=="Modificar"){
				echo "<form class=\"form-horizontal\" method=\"post\" action=\"..\Controlador\Accion_Controller.php?Modificar3=".$form[$numar]['nombre']."\">";
			}else{
				echo "<form class=\"form-horizontal\" method=\"post\" action=\"..\Controlador\Accion_Controller.php?View=".$form[$numar]['nombre']."\">";
			}		
			echo "<fieldset><legend>".$idiom['Acciones']."</legend>";
			echo "<br>";
			echo $idiom['Nombre'].":".$form[$numar]["nombre"];
			echo "<br>";
			echo $idiom['descripcion'].":".$form[$numar]["descripcion"];
			echo "<br>";
			echo $idiom['Funcio'].":".$form[$numar]["funcionalidad"]." ";
			echo "<br>";

			if($origen=="Baja"){
				echo "<a href=\"Accion_Controller.php?BajaAccion=".$form[$numar]['nombre']."\""."><input type=\"image\" onClick=\"return confirm('".$idiom['ConfirmarDelete'].":".$form[$numar]["nombre"]."?')\" src=\"..\Archivos\\eliminar.png\" width=\"20\" height=\"20\"></a>";
			}
			if($origen=="Modificar"){
				echo "<a href=\"Accion_Controller.php?Modificar3=".$form[$numar]['nombre']."\""."><input type=\"image\" src=\"..\Archivos\\lapiz.png\" width=\"20\" height=\"20\"></a>";
			}
			echo"</fieldset>";
			echo"</form>";
 			echo "</div>";
			echo "</div>";
			echo "</div>";
			
		 	}
		 	echo "<a href=\"Accion_Controller.php?Volver\"><input type=\"image\" src=\"..\Archivos\\volver.png\" width=\"20\" height=\"20\"></a>";

		 
?>
	</div></div></div>
		
	</div>
<?php 
include '../plantilla/pie.php';
}
}
?>