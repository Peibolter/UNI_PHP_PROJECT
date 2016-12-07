<?php 
	class Eventos_SHOW{

		function crear($form,$idioma,$origen){ 

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
		if($origen=="Modificar"){
			echo "<form action=\"Eventos_Controller.php?ModificarView\" method=\"post\">";
  		}elseif($origen=="Baja"){
			echo "<form action=\"Eventos_Controller.php\" method=\"post\">";
		}
  		else{ 
			echo "<form action=\"Eventos_Controller.php\" method=\"post\">";
		}
?>

			<fieldset>
			<input type="text" aling="right" placeholder=<?php echo $idiom['Nombre']; ?> name="buscar" ><input  type="submit" name="buscador" value="Buscar">
			</fieldset>
			</form>
			
<?php 		 

		for ($numar =0;$numar<count($form);$numar++){

			echo "<div class=\"container well\">";
 			echo "<div class=\"row\">"; 
			echo "<div class=\"col-xs-12\">";
			if($origen=="Modificar"){
				echo "<form class=\"form-horizontal\" method=\"post\" action=\"..\Controlador\Eventos_Controller.php?Modificar=".$form[$numar]['nombre']."\">";
			}else{ 
			echo "<form class=\"form-horizontal\" method=\"post\" action=\"..\Controlador\Eventos_Controller.php?View=".$form[$numar]['nombre']."\">";
			}
			echo "<fieldset><legend>Eventos</legend>";
			echo "<br>";

			echo $idiom['Nombre'].":".$form[$numar]["nombre"];
			echo "<br>";
			echo "Usuario:".$form[$numar]["usuario"];
			echo "<br>";
			echo "Espacio:".$form[$numar]["espacio"];
			echo "<br>";
			if($origen=="Modificar"){
			echo "<a href=\"Eventos_Controller.php?Modificar=".$form[$numar]['nombre']."\""."><input type=\"image\" src=\"..\Archivos\\lapiz.png\" width=\"20\" height=\"20\"></a>";
				}elseif($origen=="Baja"){
					echo "<a href=\"Eventos_Controller.php?View=".$form[$numar]['nombre']."\""."><input type=\"image\" src=\"..\Archivos\\eliminar.png\" width=\"20\" height=\"20\"></a>";
				}else{ 
			echo "<a href=\"Eventos_Controller.php?View=".$form[$numar]['nombre']."\""."><input type=\"image\" src=\"..\Archivos\\lupa.jpg\" width=\"20\" height=\"20\"></a>";
				}
			echo"</fieldset>";
			echo"</form>";
 			echo "</div>";
			echo "</div>";
			echo "</div>";
			
		 	}
		 	echo "<a href=\"Eventos_Controller.php?Volver\"><input type=\"image\" src=\"..\Archivos\\volver.png\" width=\"20\" height=\"20\"></a>";

		 
?>
	</div></div></div>
		
	</div>
<?php 
include '../plantilla/pie.php';
}
}
?>