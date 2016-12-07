<?php 
class EventosDelete{

	function crear($idioma,$resultado,$form){

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
 		if ($resultado==FALSE){
 			echo "<script>alert(\"".$idiom["Eliminado"]."\")</script>";
 		}
 ?>
 
		<form action="Eventos_Controller.php?BajaShow" method="post">
		<fieldset>
		<input type="text" aling="right" placeholder=<?php echo $idiom['Nombre']; ?> name="buscar" ><input  type="submit" name="BajaShow" value="Buscar">
		</fieldset>
		</form> 
		
<?php
 			echo "<a href=\"Eventos_Controller.php?Volver\"><input type=\"image\" src=\"..\Archivos\\volver.png\" width=\"20\" height=\"20\"></a>";
 			for ($numar =0;$numar<count($form);$numar++){
			echo "<div class=\"container well\">";
 			echo "<div class=\"row\">"; 
			echo "<div class=\"col-xs-12\">";
			echo "<form class=\"form-horizontal\" method=\"post\" action=\"..\Controlador\Eventos_Controller.php?BajaShow1=".$form[$numar]['nombre']."\">";
			echo "<fieldset><legend>".$idiom['Eventos']."</legend>";
			echo "<br>";
			echo $idiom['Nombre'].":".$form[$numar]["nombre"];
			echo "<br>";
			echo "<a href=\"Eventos_Controller?BajaShow1=".$form[$numar]['nombre']."\""."><input type=\"image\"  src=\"..\Archivos\\eliminar.png\" width=\"20\" height=\"20\"></a>";
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
			
			
