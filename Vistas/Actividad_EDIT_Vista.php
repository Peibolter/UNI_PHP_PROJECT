<?php 
class Actividad_EDIT{

	function crear($espacios,$usuarios,$categorias,$datos12,$idioma,$origen,$resultado){

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
 				echo "<script>alert(\"".$idiom["errorModifcarActividad"]."\")</script>";
 			}
 			if (!empty($mensaje)){
 				echo "<script>alert(\"".$mensaje."\")</script>";
 			}

			echo "<div class=\"container well\">";
 			echo "<div class=\"row\">";
			echo "<div class=\"col-xs-12\">";
			echo "<form class=\"form-horizontal\" enctype=\"multipart/form-data\" id=\"formulario\" onSubmit='return validarActividad()' name=\"formulario\" method=\"post\" action=\"..\Controlador\Actividad_Controller.php?ModificarActividad\">";
			echo "<fieldset><legend>".$idiom['Actividad']."</legend>";
			
			echo "<"."input"." "."class=\"form-control\""."type=\"hidden\" value='".$datos12[0]."' name=\"NombreA\">";
			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"nombre\"> ".$idiom['Nombre'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=\"text\" required  value='".$datos12[0]."' name=\"Nombre\" pattern=\"[A-Za-z]{4-16}\" size=\"6\" length=\"6\">"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"Descripcion\"id =\"Descripcion\"> ".$idiom['descripcion'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."textarea"." "."class=\"form-control\""."rows=4 cols=50 id=Descripcion name=Descripcion>".$datos12[4]."</textarea>"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"categorias\"id =\"categorias\"> ".$idiom['Categoria'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<select name='categorias' id='categorias' class=\"form-control\">";
			for($i=0;$i<count($categorias);$i++){
				if($categorias[$i+1] == $datos12[1]){
					echo"<option selected value='".$categorias[$i]."'>".$categorias[$i]."</option>";
				}else{
					echo"<option value='".$categorias[$i]."'>".$categorias[$i]."</option>";
				}
			}
			echo "</select>";
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"espacio\"id =\"espacio\"> ".$idiom['Espacio'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<select name='espacio' id='espacio' class=\"form-control\">";
			for($i=0;$i<count($espacios);$i=$i+2){
				if($espacios[$i+1] == $datos12[2]){
					echo"<option selected value='".$espacios[$i]."'>".$espacios[$i+1]."</option>";
				}else{
					echo"<option value='".$espacios[$i]."'>".$espacios[$i+1]."</option>";
				}
			}
			echo "</select>";
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"usuario\"id =\"usuario\"> ".$idiom['Usuario'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<select name='usuario' id='usuario' class=\"form-control\">";
			for($i=0;$i<count($usuarios);$i=$i+2){
				if($usuarios[$i+1] == $datos12[3]){
					echo"<option selected value='".$usuarios[$i]."'>".$usuarios[$i+1]."</option>";
				}else{
					echo"<option value='".$usuarios[$i]."'>".$usuarios[$i+1]."</option>";					
				}
			}
			echo "</select>";
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"precio\"id =\"precio\"> ".$idiom['Precio']."(€):</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<input type='number' min='0.00' step='0.01' id='precio' name='precio' class='form-control' value=".$datos12[9].">";
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"maxAlumnos\"id =\"maxAlumnos\"> ".$idiom['maxAlumnos'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<input type='number' id='maxAlumnos' name='maxAlumnos' value=".$datos12[10]." class='form-control'>";
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"FechaInicio\"id =\"FechaInicio\" size=\"6\"> ".$idiom['FechaInicio'].":</label>";
			echo "<div class=\"container\">";
            echo "<div class=\"hero-unit\">";
            echo "<div class=\"input-group col-sm-3\">";
            echo " <input  type=\"text\" class=\"form-control\" name=FechaInicio required pattern=\"[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])\"  value=".$datos12[5]." id=\"datetimepicker1\">";
            echo "</div></div></div></div>";

            echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"FechaFin\"id =\"FechaFin\" size=\"6\"> ".$idiom['FechaFin'].":</label>";
			echo "<div class=\"container\">";
            echo "<div class=\"hero-unit\">";
            echo "<div class=\"input-group col-sm-3\">";
            echo " <input  type=\"text\" class=\"form-control\" name=FechaFin required pattern=\"[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])\" value=".$datos12[6]." id=\"datetimepicker2\">";
            echo "</div></div></div></div>";

            echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"HoraInicio\"id =\"HoraInicio\" size=\"6\" > ".$idiom['HoraInicio'].":</label>";
			echo "<div class=\"container\">";
            echo "<div class=\"hero-unit\">";
            echo "<div class=\"input-group date input-group col-sm-3\">";
            echo " <input type=\"time\" class=\"form-control\" name='HoraInicio' value=".$datos12[7]." required id=\"datetimepicker3\">";
            echo "</div></div></div></div>";

            echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"HoraFin\"id =\"HoraFin\" size=\"6\" > ".$idiom['HoraFin'].":</label>";
			echo "<div class=\"container\">";
            echo "<div class=\"hero-unit\">";
            echo "<div class=\"input-group date input-group col-sm-3\">";
            echo " <input type=\"time\" class=\"form-control\" name='HoraFin' id=\"datetimepicker4\" required value=".$datos12[8].">";
            echo "</div></div></div></div>";

            echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"dias\"id =\"dias\"> ".$idiom['Dias'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";

			$cadena = $datos12[11];

			if(strpos($cadena, "Lunes") !== false){
				echo "<input type='checkbox' checked name='dias[]' value='Lunes'>".$idiom['Lunes'];
			}else{
				echo "<input type='checkbox' name='dias[]' value='Lunes'>".$idiom['Lunes'];
			}

			if(strpos($cadena, "Martes") !== false){
				echo "<input type='checkbox' checked name='dias[]' value='Martes'>".$idiom['Martes'];
			}else{
				echo "<input type='checkbox' name='dias[]' value='Martes'>".$idiom['Martes'];
			}

			if(strpos($cadena, "Miercoles") !== false){
				echo "<input type='checkbox' checked name='dias[]' value='Miercoles'>".$idiom['Miercoles']."<br>";
			}else{
				echo "<input type='checkbox' name='dias[]' value='Miercoles'>".$idiom['Miercoles']."<br>";
			}

			if(strpos($cadena, "Jueves") !== false){
				echo "<input type='checkbox' checked name='dias[]' value='Jueves'>".$idiom['Jueves'];
			}else{
				echo "<input type='checkbox' name='dias[]' value='Jueves'>".$idiom['Jueves'];
			}

			if(strpos($cadena, "Viernes") !== false){
				echo "<input type='checkbox' checked name='dias[]' value='Viernes'>".$idiom['Viernes'];
			}else{
				echo "<input type='checkbox' name='dias[]' value='Viernes'>".$idiom['Viernes'];
			}

			if(strpos($cadena, "Sabado") !== false){
				echo "<input type='checkbox' checked name='dias[]' value='Sabado'>".$idiom['Sabado'];
			}else{
				echo "<input type='checkbox' name='dias[]' value='Sabado'>".$idiom['Sabado'];
			}

			if(strpos($cadena, "Domingo") !== false){
				echo "<input type='checkbox' checked name='dias[]' value='Domingo'>".$idiom['Domingo'];
			}else{
				echo "<input type='checkbox' name='dias[]' value='Domingo'>".$idiom['Domingo'];
			}

			echo "</div></div>";

			echo "<a href=\"Actividad_Controller.php?ModificarActividad\"><input type=\"image\" src=\"..\Archivos\lapiz.png\" width=\"20\" height=\"20\" onClick=\"return confirm('".$idiom['confirmActividad'].$datos12[0]."?')\"></a>";
			echo "</fieldset>";
			echo "</form>";
			echo "<a href=\"Actividad_Controller.php?Volver\"><input type=\"image\" src=\"..\Archivos\\volver.png\" width=\"20\" height=\"20\"></a>";

			echo" <script type=\"text/javascript\"> 
			$(document).ready(function (){
                
                $('#datetimepicker1').datepicker({

                    format: \"yyyy-mm-dd\"
                });
                 $('#datetimepicker2').datepicker({

                    format: \"yyyy-mm-dd\"
                }); 
            });
			</script>"

?>

<?php
	include '../plantilla/pie.php';
	}}


?>