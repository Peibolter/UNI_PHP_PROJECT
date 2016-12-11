<?php 
	class ReservasDeActividad_SHOW{

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
    		<header>
  			</header>
  			<?php  	

			echo "<div class=\"container well\">";
 			echo "<div class=\"row\">"; 
			echo "<div class=\"col-xs-12\">";
			if($origen=="Consultar"){
				echo "<form class=\"form-horizontal\" method=\"post\" action=\"..\Controlador\Usuario_Controller.php?Consultar=".$datos[0]."\">";
			}else if($origen="Baja"){ 
				echo "<form class=\"form-horizontal\" method=\"post\" action=\"..\Controlador\Usuario_Controller.php?Baja=".$datos[0]."\">";
			}
			echo "<fieldset><legend>".$idiom['ReservasDeActividad']."</legend>";
			echo "<br>";
			echo $idiom['Nombre'].":".$datos[0];
			echo "<br>";
			echo $idiom['Categoria'].":".$datos[1];
			echo "<br>";
			echo $idiom['Espacio'].":".$datos[2];
			echo "<br>";
			echo $idiom['Usuario'].":".$datos[3];
			echo "<br>";
			echo $idiom['descripcion'].":".$datos[4];
			echo "<br>";
			echo $idiom['FechaInicio'].":".$datos[5];
			echo "<br>";
			echo $idiom['FechaFin'].":".$datos[6];
			echo "<br>";
			echo $idiom['HoraInicio'].":".$datos[7];
			echo "<br>";
			echo $idiom['HoraFin'].":".$datos[8];
			echo "<br>";
			echo $idiom['Precio'].":".$datos[9];
			echo "<br>";
			echo $idiom['maxAlumnos'].":".$datos[10];
			echo "<br>";
			echo $idiom['Dias'].":".$datos[11];
			echo "<br>";
			if($origen=="Modificar"){
				echo "<a href=\"Espacios_Controller.php?Modificar=".$datos[0]."\""."><input type=\"image\" src=\"..\Archivos\\lapiz.png\" width=\"20\" height=\"20\"></a>";
			}
			else if($origen=="Baja"){ 
				echo "<a href=\"Espacios_Controller.php?View=".$datos[0]."\""."><input type=\"image\" src=\"..\Archivos\\lupa.jpg\" width=\"20\" height=\"20\"></a>";
			}
			echo"</fieldset>";
			echo"</form>";
 			echo "</div>";
			echo "</div>";
			echo "</div>";
			
		 	echo "<a href=\"Usuario_Controller.php?Volver\"><input type=\"image\" src=\"..\Archivos\\volver.png\" width=\"20\" height=\"20\"></a>";

		 
?>
	</div></div></div>
		
	</div>
<?php 
include '../plantilla/pie.php';
}
}
?>