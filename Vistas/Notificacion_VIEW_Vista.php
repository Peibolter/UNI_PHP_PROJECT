<?php 

class Notificacion_VIEW{

		function crear($idioma,$form){ 
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
        if(count($form)>1){ 
        echo "<a href=\"Notificacion_Controller.php?borrartodo\"><input type=\"submit\" class=\"btn btn-primary\" onClick=\"return confirm('".$idiom['confirmareliminado']."')\" name=borratodo value=\"".$idiom['borrartodo']."\"></a>";
        }
		for ($numar =0;$numar<count($form);$numar++){

			echo "<div class=\"container well\">";
 			echo "<div class=\"row\">"; 
			echo "<div class=\"col-xs-12\">";
			

			echo "<form class=\"form-horizontal\"  method=\"post\" action=\"../Controlador/Notificacion_Controller.php?Baja=".$form[$numar]['id']."\">";
			echo "<fieldset><legend>".$idiom['Notificacion1']."</legend>";
			echo "<br>";
			echo "<input type=\"image\" src=\"..\Archivos\\".$form[$numar]["foto"]."\"width=\"50\" height=\"50\">";
			echo "<br>";
			echo "<br>";
			echo $idiom['Fecha'].":".$form[$numar]["fecha"];
			echo "<br>";
			echo $idiom['de'].":".$form[$numar]["usuarioorigen"];
			echo "<br>";
			echo $idiom['to'].":".$form[$numar]["usuario"];
			echo "<br>";
			echo $idiom['mensaje'].":".$form[$numar]["comentario"];
			echo "<br>";
				echo "<a href=\"../Controlador/Notificacion_Controller.php?Baja=".$form[$numar]['id']."\""."><input type=\"image\" onClick=\"return confirm('".$idiom['confirmareliminado']."')\" src=\"../Archivos/eliminar.png\" width=\"20\" height=\"20\"></a>";
			echo"</fieldset>";
			echo"</form>";
 			echo "</div>";
			echo "</div>";
			echo "</div>";
		 	}
		 	echo "<a href=\"../Controlador/Funcionalidad_Controller.php?Volver\"><input type=\"image\" src=\"..\Archivos\\volver.png\" width=\"20\" height=\"20\"></a>";

		 
?>
	</div></div></div>
		
	</div>
<?php
include '../plantilla/pie.php';
 }
}

?>