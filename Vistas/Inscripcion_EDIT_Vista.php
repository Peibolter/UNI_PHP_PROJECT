<?php 
class InscripcionEDIT{

	function crear($idioma, $formInsc, $formAlum, $formEvent, $resultado,$form,$user,$mensaje){

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
 				echo "<script>alert(\"".$idiom["modificado"]."\")</script>";
 			}
 			if (!empty($mensaje)){
 				echo "<script>alert(\"".$mensaje."\")</script>";
 			}

			
			echo "<div class=\"container well\">";
 			echo "<div class=\"row\">";
			echo "<div class=\"col-xs-12\">";
			echo "<form enctype=\"multipart/form-data\" class=\"form-horizontal\" method=\"post\"  name=\"formulario\" id=\"formulario\" action=\"..\Controlador\Inscripcion_Controller.php?ModificarInscripcion=".$formInsc[0]['idInsc']."\"".">";
			echo "<fieldset><legend>".$idiom['Inscripcion']."</legend>";
			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"Alumno\"id =\"Alumno\"> ".$idiom['Alumno'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."select"." "."class=\"form-control\""." required id='Alumno' name='Alumno'>";
			for ($numar =0;$numar<count($formAlum);$numar++){
			echo "<option value=\"".$formAlum[$numar]["id"]."\">".$formAlum[$numar]['nombre']." ".$formAlum[$numar]['apellidos']."</option>";

				 }
			echo"</select>";
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"Evento\"id =\"Evento\"> ".$idiom['Evento'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."select"." "."class=\"form-control\""." required id='Evento' name='Evento'>";
			for ($numar =0;$numar<count($formEvent);$numar++){
			echo "<option value=\"".$formEvent[$numar]["id"]."\">".$formEvent[$numar]['nombre']."</option>";

				 }
			echo"</select>";
			echo "</div></div>";




			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"Fecha\"id =\"Fecha\" size=\"6\"  onblur=\"fechacomprobar();\"> ".$idiom['Fecha'].":</label>";
			echo "<div class=\"container\">";
            echo "<div class=\"hero-unit\">";
            echo "<div class=\"input-group col-sm-3\">";
            echo " <input  type=\"text\" class=\"form-control\" name=Fecha required pattern=\"[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])\"  id=\"example1\">";
            echo "</div></div></div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"Forma_pago\"id =\"Forma_pago\"> ".$idiom['Forma_pago'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=text required id=\"Forma_pago\" name=\"Forma_pago\">"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"Tiempo_pago\"id =\"Tiempo_pago\"> ".$idiom['Tiempo_pago'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=text required id=Tiempo_pago name=Tiempo_pago size=\"25\">"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"Actividad\"id =\"Actividad\"> ".$idiom['Actividad'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."select"." "."class=\"form-control\""." required id='Actividad' name='Actividad'>";
			for ($numar =0;$numar<count($form);$numar++){
			echo "<option value=\"".$form[$numar]["nombre"]."\">".$form[$numar]['nombre']."</option>";

				 }
			echo"</select>";
			echo "</div></div>";
			echo '<script language="javascript">';
			echo '</script>';
			echo "<a href=\"Inscripcion_Controller.php?ModificarInscripcion=".$formInsc[0]['idInsc']."\""."><input type=\"image\" src=\"..\Archivos\lapiz.png\" width=\"20\" height=\"20\" onClick=\"return confirm('".$idiom['confirmEditInscripcion'].":".$user."?')\"></a>";
			echo "</fieldset>";
			echo "</form>";
			echo "<a href=\"Inscripcion_Controller.php?Volver\"><input type=\"image\" src=\"..\Archivos\\volver.png\" width=\"20\" height=\"20\"></a>";

?>



<?php
	include '../plantilla/pie.php';
	}}


?>