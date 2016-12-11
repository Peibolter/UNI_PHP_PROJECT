<?php 
	class Categoria_VIEW{

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
			<!--<form action="Categoria_Controller.php" method="post">
			<fieldset>
			<input type="text" aling="right" placeholder=<?php //echo $idiom['Categoria']; ?> name="buscar" ><input  type="submit" name="buscador" value="Buscar">
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
				echo "<form class=\"form-horizontal\"  method=\"post\" action=\"..\Controlador\Categoria_Controller.php?BajaCategoria=".$form[$numar]['nombre']."\">";
			}elseif($origen=="Modificar") { echo "<form class=\"form-horizontal\"  method=\"post\" action=\"..\Controlador\Categoria_Controller.php?Modificar2=".$form[$numar]['nombre']."\">";}
			else{ 
			echo "<form class=\"form-horizontal\"  method=\"post\" action=\"..\Controlador\Categoria_Controller.php?View=".$form[$numar]['nombre']."\">";
			}
			echo "<fieldset><legend aling=\"center\">".$idiom['Categoria']."</legend>";
			echo "<br>";
			
			echo $idiom['Nombre'].":"." ".$form[$numar]["nombre"];
			echo "<br>";
			echo $idiom['Descripcion'].":"." ".$form[$numar]["descripcion"];
			echo "<br>";
			echo $idiom['Descuento'].":"." ".$form[$numar]["descuento"]." %";
			echo "<br>";

			if ($origen=="Baja"){
			echo "<a href=\"Categoria_Controller.php?BajaCategoria=".$form[$numar]['nombre']."\""."><input type=\"image\" onClick=\"return confirm('".$idiom['ConfirmDelete'].":".$form[$numar]["nombre"]."?')\" src=\"..\Archivos\\eliminar.png\" width=\"20\" height=\"20\"></a>";
			}
			if ($origen=="Modificar"){
				echo "<a href=\"Categoria_Controller.php?Modificar2=".$form[$numar]['nombre']."\""."><input type=\"image\"  src=\"..\Archivos\\lapiz.png\" width=\"20\" height=\"20\"></a>";
			}
			echo"</fieldset>";
			echo"</form>";
 			echo "</div>";
			echo "</div>";
			echo "</div>";
			
		 	}
		 	echo "<a href=\"Categoria_Controller.php?Volver\"><input type=\"image\" src=\"..\Archivos\\volver.png\" width=\"20\" height=\"20\"></a>";

		 
?>
	</div></div></div>
		
	</div>
<?php 
include '../plantilla/pie.php';
}
}
?>