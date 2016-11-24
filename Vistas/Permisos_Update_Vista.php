<?php 

class PermisosUpdate{


function crear($formfunciona,$formGrupo,$formacciones,$idioma,$funcionalidad){

			include('../plantilla/cabecera.php');
        	include("../Funciones/comprobaridioma.php");
        	$clase=new cabecera();
        	$clases=new comprobacion();
        	$idiom=$clases->comprobaridioma($idioma);
        	$clase->crear($idiom);
        	include('../plantilla/menulateral.php');
        	$menus=new menulateral();
       		$menus->crear($idiom);

 		echo "<div class=\"container well\">";
 			echo "<div class=\"row\">";
				echo "<div class=\"col-xs-4\">";
					echo "<form class=\"form-horizontal\" id=\"formularioduro\" method=\"post\" action=\"..\Controlador\Permisos_Controller.php?Funcionalidad\">";
							echo "<fieldset><legend>".$idiom['GrupoName']."</legend>";
							echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"grupo\"id =\"grupo\"> ".$idiom['GrupoName'].":</label>";
							echo "<div class=\"input-group col-sm-5\">";
							echo "<"."select"." "."class=\"form-control\""." required id='grupo' name='grupo'>";
								for ($numar =0;$numar<count($formGrupo);$numar++){
							echo "<option value=".$formGrupo[$numar]["nombre"].">".$formGrupo[$numar]['nombre']."</option>";
								 }
						echo"</select>";
						echo "</div></div>";
 							 echo "</div>";
				echo "<div class=\"col-xs-4\">";
							echo "<legend>".$idiom['Funcio']."</legend>";
							echo "<div class=\"form-group\"><label class=\"col-sm-4 control-label\" for=\"funcion\"id =\"funcion\"> ".$idiom['Funcio'].":</label>";
							echo "<div class=\"input-group col-sm-6\">";
							echo "<"."select"." "."class=\"form-control\""." required id=\"funcion\" multiple onchange=\"prueba();\"name='funcion'>";
								for ($numar =0;$numar<count($formfunciona);$numar++){
									if($funcionalidad==$formfunciona[$numar]["funcionalidad"]){
										echo "<option selected value=\"".$formfunciona[$numar]["funcionalidad"]."\">".$formfunciona[$numar]['funcionalidad']."</option>";
									}else{
							echo "<option value=\"".$formfunciona[$numar]["funcionalidad"]."\">".$formfunciona[$numar]['funcionalidad']."</option>";
								 }}
						echo"</select>";
						echo "</div></div>";
 							 echo "</div>";

 							 echo "<div class=\"col-xs-3\">";
							echo "<legend>".$idiom['Acciones']."</legend>";
							echo "<div class=\"form-group\"><label class=\"col-sm-4 control-label\" for=\"funcion\"id =\"funcion\"> ".$idiom['Accion'].":</label>";
							echo "<div class=\"input-group col-sm-6\">";
							for($numar =0;$numar<count($formacciones);$numar++)
							{
								echo "<input type=\"checkbox\" name=\"formacciones[]\" value=\"".$formacciones[$numar]["nombre"]."\">".$formacciones[$numar]["nombre"]."<br>";
							}
							echo "<br>";
							echo "<a href=\"..\Controlador\Permisos_Controller.php?Funcionalidad\"><input type=\"image\" src=\"..\Archivos\añadir.png\" width=\"20\" height=\"20\"></a>";
							 echo "</div>";
							 echo "</div>";
							 echo"</fieldset>";
							 echo"</form>";
							 echo "</div>";
							 echo "</div>";

}

}

?>