<?php 
	class Usuario_VIEW{

		function crear($form,$idioma,$origen){ 

			include('../plantilla/cabecera.php');
        include("../Funciones/comprobaridioma.php");
        $clase=new cabecera();
        $clases=new comprobacion();
        $idiom=$clases->comprobaridioma($idioma);
        $clase->crear($idiom);
        include('../plantilla/menulateral.php');
        include("../Archivos/ArrayPermisosFuncionalidadades.php");
        $datos=new consultar();
        $form1=$datos->array_consultar();
        $menus=new menulateral();
        $menus->crear($idiom,$form1);
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
			echo $idiom['Apellidos'].":"." ".$form[$numar]["apellido1"];
			echo "<br>";
			echo $idiom['DNI'].":"." ".$form[$numar]["dni"];
			echo "<br>";
			echo $idiom['Usuario'].":"." ".$form[$numar]["usuario"];
			echo "<br>";
			echo $idiom['email'].":"." ".$form[$numar]["email"];
			echo "<br>";
			echo $idiom['FechaNac'].":"." ".$form[$numar]["fecha"];
			echo "<br>";
			echo $idiom['GrupoName'].":"." ".$form[$numar]["grupo"];
			echo "<br>";
			echo $idiom['codigopostal'].":"." ".$form[$numar]["codigopostal"];
			echo "<br>";
			echo $idiom['cuenta'].":"." ".$form[$numar]["cuenta"];
			echo "<br>";
			echo $idiom['descripcion'].":"." ".$form[$numar]["descripcion"];
			echo "<br>";

			if ($origen=="Baja"){
			echo "<a href=\"Usuario_Controller.php?BajaUsuario=".$form[$numar]['usuario']."\""."><input type=\"image\" onClick=\"return confirm('".$idiom['ConfirmDelete'].":".$form[$numar]["usuario"]."?')\" src=\"..\Archivos\\eliminar.png\" width=\"20\" height=\"20\"></a>";
			}
			if ($origen=="Modificar"){
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