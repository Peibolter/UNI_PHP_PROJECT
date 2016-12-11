<?php 

class ReservasDeActividadAlta{

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
			<!--<form action="Usuario_Controller.php" method="post">
			<fieldset>
			<input type="text" aling="right" placeholder=<?php //echo $idiom['Usuario']; ?> name="buscar" ><input  type="submit" name="buscador" value="Buscar">
			</fieldset>
			</form>-->
<?php 		 
		  for ($numar =0;$numar<count($form);$numar++){

			echo "<div class=\"container well\" >";
			echo "<div class=\"row\">"; 
			echo "<div class=\"col-xs-6\" id=\"col\">";
			echo "<input type=\"image\" src=\"..\Archivos\\".$form[$numar]["foto"]."\"width=\"100\" height=\"100\">";
			echo "<br>";
			echo "</div></div>";
			//col-md-offset-2
			echo "<div class=\"row\">"; 
			echo "<div class=\"col-xs-6\"  id=\"col\">";
			if ($origen=="Baja"){
				echo "<form class=\"form-horizontal\"  method=\"post\" action=\"..\Controlador\Usuario_Controller.php?BajaUsuario=".$form[$numar]['usuario']."\">";
			}elseif($origen=="Modificar") { echo "<form class=\"form-horizontal\"  method=\"post\" action=\"..\Controlador\Usuario_Controller.php?Modificar2=".$form[$numar]['usuario']."\">";}
			else{ 
			echo "<form class=\"form-horizontal\"  method=\"post\" action=\"..\Controlador\Usuario_Controller.php?View=".$form[$numar]['usuario']."\">";
			}
			echo "<fieldset><legend aling=\"center\">".$idiom['Usuario']."</legend>";
			echo "<br>";
			
			echo $idiom['Nombre'].":"." ".$form[$numar]["nombre"];
			echo "<br>";

			if ($origen=="AltaActividadReserva"){
				echo "<a href=\"Usuario_Controller.php?Modificar2=".$form[$numar]['usuario']."\""."><input type=\"image\"  src=\"..\Archivos\\lapiz.png\" width=\"20\" height=\"20\"></a>";
			}
			echo"</fieldset>";
			echo"</form>";
 			echo "</div>";
			echo "</div>";
			echo "</div>";
			
		 	}
		 	echo "<a href=\"Usuario_Controller.php?Volver\"><input type=\"image\" src=\"..\Archivos\\volver.png\" width=\"20\" height=\"20\"></a>";

		 
?>
	</div></div></div>
		
	</div>
<?php 
include '../plantilla/pie.php';
}
}
?>