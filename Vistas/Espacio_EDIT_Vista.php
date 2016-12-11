<?php 
class Espacio_EDIT{

	function crear($datos12,$idioma,$origen){
		$resultado=TRUE;
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
 			if ($resultado==FALSE){
 				echo "<script>alert(\"".$idiom["modificado"]."\")</script>";
 			}
 			if (!empty($mensaje)){
 				echo "<script>alert(\"".$mensaje."\")</script>";
 			}

			
			echo "<div class=\"container well\">";
 			echo "<div class=\"row\">";
			echo "<div class=\"col-xs-12\">";
			echo "<form class=\"form-horizontal\" enctype=\"multipart/form-data\" id=\"formulario\"  name=\"formulario\"  method=\"post\" action=\"..\Controlador\Espacios_Controller.php?ModificarEspacio\">";
			echo "<fieldset><legend>".$idiom['Espacio']."</legend>";
			
			echo "<"."input"." "."class=\"form-control\""."type=\"hidden\" value='".$datos12[0]."' name=\"NombreA\">"; 
			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\"  for=\"nombre\"> ".$idiom['Nombre'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=\"text\" required value='".$datos12[0]."' name=\"Nombre\">"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"descripcion\"id =\"Descripcion\"> ".$idiom['descripcion'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<textarea rows=\"4\" cols=\"50\" name=\"descripcion\" id=\"descripcion\" form=\"formulario\">".$datos12[1]."</textarea>";
			echo "</div></div>";
			echo "<a href=\"Espacios_Controller.php?ModificarEspacio\"><input type=\"image\" src=\"..\Archivos\lapiz.png\" width=\"20\" height=\"20\" onClick=\"return confirm('".$idiom['confirmEspacio'].$datos12[0]."?')\"></a>";
			echo "</fieldset>";
			echo "</form>";
			echo "<a href=\"Espacio_Controller.php?Volver\"><input type=\"image\" src=\"..\Archivos\\volver.png\" width=\"20\" height=\"20\"></a>";

?>

<?php
	include '../plantilla/pie.php';
	}}


?>