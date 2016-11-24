<?php 

class UsuarioAlta{

	function crear($idioma,$resultado,$form,$mensaje){

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
 <?php
 			if ($resultado==FALSE){
 				echo "<script>alert(\"".$idiom["USUARIOSINCORRECTO"]."\")</script>";
 			}
 			if (!empty($mensaje)){
 				echo "<script>alert(\"".$mensaje."\")</script>";
 			}
			echo "<div class=\"container well\">";
 			echo "<div class=\"row\">";
			echo "<div class=\"col-xs-12\">";
			echo "<form enctype=\"multipart/form-data\" class=\"form-horizontal\" method=\"post\"  name=\"formulario\" id=\"formulario\" action=\"..\Controlador\Usuario_Controller.php?AltaUsuario\">";
			echo "<fieldset><legend>".$idiom['Usuario']."</legend>";
			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"nombre\"> ".$idiom['Nombre'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=\"text\" required  name=\"Nombre\" pattern=\"[A-Za-z]{4-16}\" size="6">"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"Apellido\"id =\"Apellido\"> ".$idiom['Apellidos'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=text required id=Apellido name=Apellido size="25">"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"FechaNac\"id =\"FechaNac\" size="6" onblur=\"fechacomprobar();\"> ".$idiom['FechaNac'].":</label>";
			echo "<div class=\"container\">";
            echo "<div class=\"hero-unit\">";
            echo "<div class=\"input-group col-sm-3\">";
            echo " <input  type=\"text\" class=\"form-control\" name=FechaNac required pattern=\"[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])\"  id=\"example1\">";
            echo "</div></div></div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"DNI\"id =\"DNI\"> ".$idiom['DNI'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=text required id=\"DNI\" name=\"DNI\">"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"email\"id =\"email\"> ".$idiom['email'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<span class=\"input-group-addon\">@</span>";
			echo "<"."input"." "."class=\"form-control\""."type=text  pattern=\"[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$\"required id=email name=email>"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"Usuario\"id =\"Usuario\"> ".$idiom['Usuario'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=text required id=Usuario name=Usuario>"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"Password\"id =\"Password\"> ".$idiom['Password'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type='Password' required id='Password' name='Password'>"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"foto\"id =\"foto\"> ".$idiom['foto'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<input class=\"form-control\" name=\"foto\" type=\"file\" id=\"foto\"/>";
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"codigopostal\"id =\"codigopostal\"> ".$idiom['codigopostal'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type='number' required id='codigopostal' name='codigopostal'>"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"cuenta\"id =\"cuenta\"> ".$idiom['cuenta'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type='number' required id='cuenta' name='cuenta'>"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"cuenta\"id =\"cuenta\"> ".$idiom['descripcion'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<textarea rows=\"4\" cols=\"50\" name=\"descripcion\" form=\"formulario\"></textarea>";
			echo "</div></div>";
			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"grupo\"id =\"grupo\"> ".$idiom['GrupoName'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."select"." "."class=\"form-control\""." required id='grupo' name='grupo'>";
			for ($numar =0;$numar<count($form);$numar++){
			echo "<option value=\"".$form[$numar]["nombre"]."\">".$form[$numar]['nombre']."</option>";

				 }
			echo"</select>";
			echo "</div></div>";
			echo "<a href=\"Usuario_Controller.php?AltaFuncionalidad\"><input type=\"image\" src=\"..\Archivos\añadir.png\" width=\"20\" height=\"20\" mouseover='encriptar();'></a>";
			echo "</fieldset>";
			echo "</form>";
			echo "<a href=\"Usuario_Controller.php?Volver\"><input type=\"image\" src=\"..\Archivos\\volver.png\" width=\"20\" height=\"20\"></a>";

?>



<?php
	include '../plantilla/pie.php';
	}}


?>