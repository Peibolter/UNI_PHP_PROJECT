<?php 
class CategoriaDelete{

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
 			<form action="Categoria_Controller.php?BajaShow" method="post">
			<fieldset>
			<input type="text" aling="right" placeholder=<?php echo $idiom['Categoria']; ?> name="buscar" ><input  type="submit" name="BajaShow" value="Buscar">
			</fieldset>
			</form> <?php
			for ($numar =0;$numar<count($form);$numar++){

			echo "<div class=\"container well\">";
 			echo "<div class=\"row\">"; 
			echo "<div class=\"col-xs-12\">";
			echo "<form class=\"form-horizontal\" method=\"post\" action=\"..\Controlador\Categoria_Controller.php?ViewBaja=".$form[$numar]['nombre']."\">";
			echo "<fieldset><legend>".$idiom['Categoria']."</legend>";
			echo "<br>";
			echo $idiom['Nombre'].":".$form[$numar]["nombre"];
			echo "<br>";
			echo $idiom['Descripcion'].":".$form[$numar]["descripcion"];
			echo "<br>";
			echo "<a href=\"Categoria_Controller.php?ViewBaja=".$form[$numar]['nombre']."\""."><input type=\"image\"  src=\"..\Archivos\\eliminar.png\" width=\"20\" height=\"20\"></a>";
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
