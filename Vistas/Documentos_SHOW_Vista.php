<?php 
	class Documentos_SHOW{

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

<?php 
		if($origen=="Modificar"){
			echo "<form action=\"Documentos_Controller.php?ModificarView\" method=\"post\">";
  		}elseif($origen=="Baja"){
			echo "<form action=\"Documentos_Controller.php\" method=\"post\">";
		}
  		else{ 
			echo "<form action=\"Documentos_Controller.php\" method=\"post\">";
		}
?>

			<fieldset>
			<input type="text" aling="right" placeholder=<?php echo $idiom['Usuario']; ?> name="buscar" ><input  type="submit" name="buscador" value="Buscar">
			</fieldset>
			</form>
			
<?php 		 

		for ($numar =0;$numar<count($form);$numar++){

			echo "<div class=\"container well\">";
 			echo "<div class=\"row\">"; 
			echo "<div class=\"col-xs-12\">";
			if($origen=="Modificar"){
				echo "<form class=\"form-horizontal\" method=\"post\" action=\"..\Controlador\Documentos_Controller.php?Modificar=".$form[$numar]['nombre']."\">";
			}else{ 
			echo "<form class=\"form-horizontal\" method=\"post\" action=\"..\Controlador\Documentos_Controller.php?View=".$form[$numar]['nombre']."\">";
			}
			echo "<fieldset><legend>".$idiom['Documento']."</legend>";
			echo "<br>";

			echo $idiom['Nombre'].": ".$form[$numar]["nombre"];
			echo "<br>";
			if($origen=="Modificar"){
			echo "<a href=\"Documentos_Controller.php?Modificar=".$form[$numar]['nombre']."\""."><input type=\"image\" src=\"..\Archivos\\lapiz.png\" width=\"20\" height=\"20\"></a>";
				}elseif($origen=="Baja"){
					echo "<a href=\"Documentos_Controller.php?View=".$form[$numar]['nombre']."\""."><input type=\"image\" src=\"..\Archivos\\eliminar.png\" width=\"20\" height=\"20\"></a>";
				}else{ 
			echo "<a href=\"Documentos_Controller.php?View=".$form[$numar]['nombre']."\""."><input type=\"image\" src=\"..\Archivos\\lupa.jpg\" width=\"20\" height=\"20\"></a>";
				}
			echo"</fieldset>";
			echo"</form>";
 			echo "</div>";
			echo "</div>";
			echo "</div>";
			
		 	}
		 	echo "<a href=\"Documentos_Controller.php?Volver\"><input type=\"image\" src=\"..\Archivos\\volver.png\" width=\"20\" height=\"20\"></a>";

		 
?>
	</div></div></div>
		
	</div>
<?php 
include '../plantilla/pie.php';
}
}
?>