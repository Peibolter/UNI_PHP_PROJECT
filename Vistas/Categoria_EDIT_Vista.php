<?php 
class CategoriaEDIT{

	function crear($idioma, $formInsc, $resultado,$form,$user,$mensaje){

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
			echo "<form enctype=\"multipart/form-data\" class=\"form-horizontal\" method=\"post\"  name=\"formulario\" id=\"formulario\" action=\"..\Controlador\Categoria_Controller.php?ModificarCategoria=".$formInsc[0]['nombre']."\"".">";
			echo "<fieldset><legend>".$idiom['Categoria']."</legend>";
			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"nombre\"> ".$idiom['Nombre'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=\"text\" required  name=\"Nombre\" pattern=\"[A-Za-z]{4-16}\" size=\"6\" length=\"6\">"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"Descripcion\"id =\"Descripcion\"> ".$idiom['Descripcion'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=text required id=Descripcion name=Descripcion size=\"25\">"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"Descuento\"id =\"Descuento\"> ".$idiom['Descuento'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."select"." "."class=\"form-control\""." required id='Descuento' name='Descuento'>";
			for ($numar =0;$numar<count($form);$numar++){
			echo "<option value=\"".$form[$numar]["cantidad"]."\">".$form[$numar]['cantidad']."%"."</option>";

				 }
			echo"</select>";
			echo "</div></div>";
			echo '<script language="javascript">';
			echo '</script>';
			echo "<a href=\"Categoria_Controller.php?ModificarCategoria=".$formInsc[0]['nombre']."\""."><input type=\"image\" src=\"..\Archivos\lapiz.png\" width=\"20\" height=\"20\" onClick=\"return confirm('".$idiom['confirmEditCategoria'].":".$user."?')\"></a>";
			echo "</fieldset>";
			echo "</form>";
			echo "<a href=\"Categoria_Controller.php?Volver\"><input type=\"image\" src=\"..\Archivos\\volver.png\" width=\"20\" height=\"20\"></a>";

?>



<?php
	include '../plantilla/pie.php';
	}}


?>