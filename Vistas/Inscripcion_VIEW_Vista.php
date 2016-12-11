<?php 
	class Inscripcion_VIEW{

		function crear($form,$idioma,$origen){ 

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
			<!--<form action="Inscripcion_Controller.php" method="post">
			<fieldset>
			<input type="text" aling="right" placeholder=<?php //echo $idiom['Inscripcion']; ?> name="buscar" ><input  type="submit" name="buscador" value="Buscar">
			</fieldset>
			</form>-->
<?php 		 
		  for ($numar =0;$numar<count($form);$numar++){

			echo "<div class=\"container well\" >";
			echo "<div class=\"row\">"; 
			echo "<div class=\"col-xs-6\" id=\"col\">";
			echo "<br>";
			echo "</div></div>";
			//col-md-offset-2
			echo "<div class=\"row\">"; 
			echo "<div class=\"col-xs-6\"  id=\"col\">";
			if ($origen=="Baja"){
				echo "<form class=\"form-horizontal\"  method=\"post\" action=\"..\Controlador\Inscripcion_Controller.php?BajaInscripcion=".$form[$numar]['idInsc']."\">";
			}elseif($origen=="Modificar") { echo "<form class=\"form-horizontal\"  method=\"post\" action=\"..\Controlador\Inscripcion_Controller.php?Modificar2=".$form[$numar]['idInsc']."\">";}
			else{ 
			echo "<form class=\"form-horizontal\"  method=\"post\" action=\"..\Controlador\Inscripcion_Controller.php?View=".$form[$numar]['idInsc']."\">";
			}
			echo "<fieldset><legend aling=\"center\">".$idiom['Inscripcion']."</legend>";
			echo "<br>";
			
			echo $idiom['Usuario'].":"." ".$form[$numar]["usuario"];
			echo "<br>";
			echo $idiom['Alumno'].":"." ".$form[$numar]["alumno"];
			echo "<br>";
			echo $idiom['Fecha'].":"." ".$form[$numar]["fecha"];
			echo "<br>";
			echo $idiom['Actividad'].":"." ".$form[$numar]["actividad"];
			echo "<br>";
			echo $idiom['Evento'].":"." ".$form[$numar]["evento"];
			echo "<br>";
			echo $idiom['Forma_pago'].":"." ".$form[$numar]["forma_pago"];
			echo "<br>";
			echo $idiom['Tiempo_pago'].":"." ".$form[$numar]["tiempo_pago"];
			echo "<br>";

			if ($origen=="Baja"){
			echo "<a href=\"Inscripcion_Controller.php?BajaInscripcion=".$form[$numar]['idInsc']."\""."><input type=\"image\" onClick=\"return confirm('".$idiom['ConfirmDelete'].":".$form[$numar]["idInsc"]."?')\" src=\"..\Archivos\\eliminar.png\" width=\"20\" height=\"20\"></a>";
			}
			if ($origen=="Modificar"){
				echo "<a href=\"Inscripcion_Controller.php?Modificar2=".$form[$numar]['idInsc']."\""."><input type=\"image\"  src=\"..\Archivos\\lapiz.png\" width=\"20\" height=\"20\"></a>";
			}
			echo"</fieldset>";
			echo"</form>";
 			echo "</div>";
			echo "</div>";
			echo "</div>";
			
		 	}
		 	echo "<a href=\"Inscripcion_Controller.php?Volver\"><input type=\"image\" src=\"..\Archivos\\volver.png\" width=\"20\" height=\"20\"></a>";

		 
?>
	</div></div></div>
		
	</div>
<?php 
include '../plantilla/pie.php';
}
}
?>