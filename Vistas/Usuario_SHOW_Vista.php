<?php 
	class Usuario_SHOW{

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
    		<header>
  			</header>
  			<?php  	

  			if($origen=="Modificar"){
  				
			echo "<form action=\"Usuario_Controller.php?ModificarView\" method=\"post\">";
  				} 
  				else{
			echo "<form action=\"Usuario_Controller.php\" method=\"post\">";
			}
			echo "<fieldset>";
			echo "<input type=\"text\" aling=\"right\" placeholder=\"".$idiom['Usuario']."\"name=\"buscar\" ><input  type=\"submit\" name=\"buscador\" value=\"".$idiom['Buscar']."\">";
			echo "</fieldset>";
			echo "</form>";
	 

		for ($numar =0;$numar<count($form);$numar++){

			echo "<div class=\"container well\">";
 			echo "<div class=\"row\">"; 
			echo "<div class=\"col-xs-12\">";
			if($origen=="Modificar"){
			echo "<form class=\"form-horizontal\" method=\"post\" action=\"..\Controlador\Usuario_Controller.php?Modificar=".$form[$numar]['usuario']."\">";
				}else{ 
			echo "<form class=\"form-horizontal\" method=\"post\" action=\"..\Controlador\Usuario_Controller.php?View=".$form[$numar]['usuario']."\">";
			}
			echo "<fieldset><legend>".$idiom['Usuario']."</legend>";
			echo "<br>";
			/*echo $idiom['Nombre'].":".$form[$numar]["nombre"];
			echo "<br>";
			echo $idiom['Apellidos'].":".$form[$numar]["apellido1"];
			echo "<br>";*/
			echo $idiom['DNI'].":".$form[$numar]["dni"];
			echo "<br>";
			echo $idiom['Usuario'].":".$form[$numar]["usuario"];
			echo "<br>";
			if($origen=="Modificar"){
				echo "<a href=\"Usuario_Controller.php?Modificar=".$form[$numar]['usuario']."\""."><input type=\"image\" src=\"..\Archivos\\lapiz.png\" width=\"20\" height=\"20\"></a>";
			}
			else{ 
			echo "<a href=\"Usuario_Controller.php?View=".$form[$numar]['usuario']."\""."><input type=\"image\" src=\"..\Archivos\\lupa.jpg\" width=\"20\" height=\"20\"></a>";
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