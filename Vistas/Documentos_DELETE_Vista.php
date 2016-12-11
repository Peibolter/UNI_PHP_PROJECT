<?php 
class DocumentosDelete{

	function crear($idioma,$resultado,$form){

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
 		if ($resultado==FALSE){
 			echo "<script>alert(\"".$idiom["Eliminado"]."\")</script>";
 		}
 ?>
 
		<form action="Documentos_Controller.php?BajaShow" method="post">
		<fieldset>
		<input type="text" aling="right" placeholder=<?php echo $idiom['Nombre']; ?> name="buscar" ><input  type="submit" name="BajaShow" value="Buscar">
		</fieldset>
		</form> 
		
<?php
 			echo "<a href=\"Documentos_Controller.php?Volver\"><input type=\"image\" src=\"..\Archivos\\volver.png\" width=\"20\" height=\"20\"></a>";
 			for ($numar =0;$numar<count($form);$numar++){
			echo "<div class=\"container well\">";
 			echo "<div class=\"row\">"; 
			echo "<div class=\"col-xs-12\">";
			echo "<form class=\"form-horizontal\" method=\"post\" action=\"..\Controlador\Documentos_Controller.php?BajaShow1=".$form[$numar]['nombre']."\">";
			echo "<fieldset><legend>".$idiom['Documentos']."</legend>";
			echo "<br>";
			echo $idiom['Nombre'].": ".$form[$numar]["nombre"];
			echo "<br>";
			echo "<a href=\"Documentos_Controller?BajaShow1=".$form[$numar]['nombre']."\""."><input type=\"image\"  src=\"..\Archivos\\eliminar.png\" width=\"20\" height=\"20\"></a>";
			echo"</fieldset>";
			echo"</form>";
 			echo "</div>";
			echo "</div>";
			echo "</div>";
		 	}


?>



<?php
	include '../plantilla/pie.php';
	}}


?>
			
			