


<?php 
	class ReservasDeEspacios_VIEW{

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
			
			<form action="ReservasDeEspacios_Controller.php?origen=<?php echo $origen ?>" method="post">
			<fieldset>
			<input type="text" aling="right" placeholder=<?php echo $idiom['ReservasDeEspacio']; ?> name="buscar" ><input  type="submit" name="buscador" value="Buscar">
			</fieldset>
			</form>
<?php 		 
		  for ($i =0;$i<count($datos)-1;$i=$i+2){

			echo "<div class=\"container well\" >";
			echo "<div class=\"row\">"; 
			echo "<div class=\"col-xs-6\">";
			echo "<br>";
			echo "</div></div>";
			//col-md-offset-2
			echo "<div class=\"row\">"; 
			echo "<div class=\"col-xs-6\" >";
			if ($origen=="Baja"){
				echo "<form class=\"form-horizontal\"  method=\"post\" action=\"..\Controlador\ReservasDeEspacios_Controller.php?BajaReservaEspacio=".$datos[$i]."\">";
			}else if($origen=="Modificar") { 
				echo "<form class=\"form-horizontal\"  method=\"post\" action=\"..\Controlador\ReservasDeEspacios_Controller.php?ModificarReservaEspacio=".$datos[$i]."\">";
			}else{ 
			echo "<form class=\"form-horizontal\"  method=\"post\" action=\"..\Controlador\ReservasDeEspacios_Controller.php?Mostrar=".$datos[$i]."\">";
			}
			echo "<fieldset><legend aling=\"center\">".$idiom['ReservasDeEspacio']."</legend>";
			echo "<br>";
			
			echo $idiom['Nombre'].":"." ".$datos[$i];
			echo "<br>";
			echo $idiom['descripcion'].":"." ".$datos[$i+1];
			echo "<br>";
			echo "<br>";

			if ($origen=="Baja"){
			echo "<a href=\"ReservasDeEspacios_Controller.php?BajaReservaEspacio=".$datos[$i]."\""."><input type=\"image\" src=\"..\Archivos\\eliminar.png\" width=\"20\" height=\"20\"></a>";
			}
			else if($origen == "Consultar"){
				echo "<a href=\"ReservasDeEspacios_Controller.php?Mostrar=".$datos[$i]."\""."><input type=\"image\" src=\"..\Archivos\\lupa.jpg\" width=\"20\" height=\"20\"></a>";
			}
			echo"</fieldset>";
			echo"</form>";
 			echo "</div>";
			echo "</div>";
			echo "</div>";
			
		 	}
		 	echo "<a href=\"ReservasDeEspacios_Controller.php?Volver\"><input type=\"image\" src=\"..\Archivos\\volver.png\" width=\"20\" height=\"20\"></a>";

?>
	</div></div></div>
		
	</div>
<?php 
include '../plantilla/pie.php';
}
}
?>