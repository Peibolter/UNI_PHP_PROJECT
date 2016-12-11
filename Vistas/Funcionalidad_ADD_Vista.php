<?php 

class funcionalidadAlta{

	function crear($idioma,$resultado,$form,$mensaje,$formaccions)
	{
		//incluimos el archivo de funciones
        include '../Funciones/funciones.php';
        include('../plantilla/cabecera.php');
        include("../Funciones/comprobaridioma.php");
        include("../Archivos/ArrayNotificaciondeUsuario.php");
       
        //comprobamos el idioma
        $clases=new comprobacion();
        $idiom=$clases->comprobaridioma($idioma);
        //
         //cargamos las notificaciones en la cabecera
        $datos=new datos();
        $formulario=$datos->array_consultar();
        $clase=new cabecera();
        $clase->crear($idiom,$formulario);
        //
        include('../plantilla/menulateral.php');
        include("../Archivos/ArrayAccionesdelasFuncionalidades.php");
        //cargamos el array de funcionalidades acciones en el menu lateral
        $datos=new consultar60();
        $form54=$datos->array_consultar();
        $menus=new menulateral();
        $menus->crear($idiom,$form54);
?>
 <?php

 			if ($resultado==TRUE){
 				echo "<script>alert(\"".$idiom["IntroduccionErronea"]."\")</script>";
 			}
 			if($mensaje==TRUE){
 				echo "<script>alert(\"".$idiom["obligatorio"]."\")</script>";
 			}
			echo "<div class=\"container well\">";
 			echo "<div class=\"row\">";
			echo "<div class=\"col-xs-12\">";
			echo "<form class=\"form-horizontal\" id=formulario method=\"post\" action=\"..\Controlador\Funcionalidad_Controller.php?AltaFuncionalidad\">";
			echo "<fieldset><legend>".$idiom['Funcio']."</legend>";
			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"nombre\"> ".$idiom['Nombre'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=\"text\" required  name=\"Nombre\">"; 
			echo "</div></div>";
			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"cuenta\"id =\"cuenta\"> ".$idiom['descripcion'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<textarea rows=\"4\" cols=\"50\" name=\"descripcion\" required form=\"formulario\"></textarea>";
			echo "</div></div>";
			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"formacciones\"id =\"cuenta\"> ".$idiom['Accion'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			for($numar =0;$numar<count($formaccions);$numar++)
							{
							echo "<input type=\"checkbox\" name=\"formacciones[]\" value=\"".$formaccions[$numar]["nombre"]."\">".$formaccions[$numar]["nombre"]."<br>";
							}
						echo "</div></div>";	
			echo "<br>";
			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"grupo\"id =\"grupo\"> ".$idiom['GrupoName'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			for($numar =0;$numar<count($form);$numar++)
							{
							echo "<input type=\"checkbox\" name=\"grupo[]\" value=\"".$form[$numar]["nombre"]."\">".$form[$numar]["nombre"]."<br>";
							}
						echo "</div></div>";	
			echo "<a href=\"Funcionalidad_Controller.php?AltaFuncionalidad\"><input type=\"image\" src=\"..\Archivos\añadir.png\" width=\"20\" height=\"20\"></a>";
			echo "</fieldset>";
			echo "</form>";
			echo "<a href=\"Funcionalidad_Controller.php?Volver\"><input type=\"image\" src=\"..\Archivos\\volver.png\" width=\"20\" height=\"20\"></a>";
			


?>



<?php
	include '../plantilla/pie.php';
	}}


?>