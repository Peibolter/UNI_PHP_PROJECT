<?php 
class GrupoEDIT{

	function crear($idioma,$name,$formfuncionalidadgrupos,$formfuncionalidades,$mensaje){

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
 			if($mensaje==FALSE){
 				echo "<script>alert(\"".$idiom["funcionalidadobligatoria"]."\")</script>";
 			}
			echo "<div class=\"container well\">";
 			echo "<div class=\"row\">";
			echo "<div class=\"col-xs-12\">";
			echo "<form class=\"form-horizontal\" name=\"formulario\" id=\"formulario\" method=\"post\" action=\"..\Controlador\Grupo_Controller.php?ModificarGrupo\">";
			echo "<fieldset><legend>".$idiom['Grupo']."</legend>";
			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"nombre\"> ".$idiom['Nombre'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=\"text\" required value=\"".$name."\" name=\"Nombre\" readonly>"; 
			echo "</div></div>";
			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"cuenta\"id =\"cuenta\"> ".$idiom['descripcion'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<textarea rows=\"4\" cols=\"50\" name=\"descripcion\" required form=\"formulario\"></textarea>";
			echo "</div></div>";
			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"funcional\"id =\"funcional\"> ".$idiom['Funcionalidades'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			for($numar =0;$numar<count($formfuncionalidades);$numar++)
			{
				$boolean=TRUE;
				for($cont =0;$cont<count($formfuncionalidadgrupos);$cont++)
				{
					if(($formfuncionalidades[$numar]["nombre"])==($formfuncionalidadgrupos[$cont]["funcionalidad"])){ 
				  echo "<input type=\"checkbox\" name=\"funcional[]\" value=\"".$formfuncionalidades[$numar]["nombre"]."\" checked>".$formfuncionalidades[$numar]["nombre"]."<br>";
					$boolean=FALSE;
					}	
				}	
				if($boolean==TRUE)
				{
				echo "<input type=\"checkbox\" name=\"funcional[]\" value=\"".$formfuncionalidades[$numar]["nombre"]."\">".$formfuncionalidades[$numar]["nombre"]."\n\n";
				}

			}

						echo "</div></div>";
			echo "<a href=\"Grupo_Controller.php?ModificarGrupo\"><input type=\"image\" onClick=\"return confirm('".$idiom['confirmeEditName'].":".$name."?')\" src=\"..\Archivos\\lapiz.png\" width=\"20\" height=\"20\"></a>";
			echo "</fieldset>";
			echo "</form>";
			echo "<a href=\"Grupo_Controller.php?Volver\"><input type=\"image\" src=\"..\Archivos\\volver.png\" width=\"20\" height=\"20\"></a>";

?>



<?php
	include '../plantilla/pie.php';
	}}


?>