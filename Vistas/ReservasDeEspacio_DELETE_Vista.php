<?php 
class ReservasDeEspacio_DELETE{

	function crear($datos,$idioma,$origen){

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

			echo "<div class=\"container well\">";
 			echo "<div class=\"row\">"; 
			echo "<div class=\"col-xs-12\">";
			echo "<form class=\"form-horizontal\" method=\"post\" action=\"..\Controlador\ReservasDeEspacios_Controller.php?BajaF=".$datos[0]."\">";
			echo "<fieldset><legend>".$idiom['ReservasDeEspacio']."</legend>";
			echo "<br>";
			echo $idiom['Nombre'].":".$datos[0];
			echo "<br>";
			echo $idiom['descripcion'].":".$datos[1];
			echo "<br>";
			echo "<a href=\"ReservasDeEspacios_Controller.php?BajaF=".$datos[0]."\""."><input type=\"image\"  src=\"..\Archivos\\eliminar.png\" onClick=\"return confirm('".$idiom['ConfirmarEDelete'].$datos[0]."?')\" width=\"20\" height=\"20\"></a>";
			echo"</fieldset>";
			echo"</form>";
 			echo "</div>";
			echo "</div>";
			echo "</div>";
			
?>



<?php
	include '../plantilla/pie.php';
	}}


?>
