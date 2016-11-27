<?php 

class AccionAlta{

	function crear($idioma,$resultado,$form,$mensaje){

		
		include('../plantilla/cabecera.php');
        include("../Funciones/comprobaridioma.php");
        $clase=new cabecera();
        $clases=new comprobacion();
        $idiom=$clases->comprobaridioma($idioma);
        $clase->crear($idiom);
        include('../plantilla/menulateral.php');
        include("../Archivos/ArrayAccionesdelasFuncionalidades.php");
        $datos=new consultar60();
        $form1=$datos->array_consultar();
        $menus=new menulateral();
        $menus->crear($idiom,$form1);


?>
 <?php
 			if ($resultado==FALSE){
 				echo "<script>alert(\"".$idiom["IntroduccionErronea"]."\")</script>";
 			}
 			if($mensaje==TRUE){
 				echo "<script>alert(\"".$idiom["funcionalidadobligatoria"]."\")</script>";
 			}
			echo "<div class=\"container well\">";
 			echo "<div class=\"row\">";
			echo "<div class=\"col-xs-12\">";
			echo "<form class=\"form-horizontal\" id=formulario method=\"post\" action=\"..\Controlador\Accion_Controller.php?AltaAccion\">";
			echo "<fieldset><legend>".$idiom['AltaAcciones']."</legend>";
			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"nombre\"> ".$idiom['Accion'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=\"text\" required  name=\"Nombre\">"; 
			echo "</div></div>";
			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"cuenta\"id =\"cuenta\"> ".$idiom['descripcion'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<textarea rows=\"4\" cols=\"50\" name=\"descripcion\" required form=\"formulario\"></textarea>";
			echo "</div></div>";
			echo "<a href=\"Accion_Controller.php?AltaAccion\"><input type=\"image\" src=\"..\Archivos\añadir.png\" width=\"20\" height=\"20\"></a>";
			echo "</fieldset>";
			echo "</form>";
			echo "<a href=\"Accion_Controller.php?Volver\"><input type=\"image\" src=\"..\Archivos\\volver.png\" width=\"20\" height=\"20\"></a>";
			

?>



<?php
	include '../plantilla/pie.php';
	}}