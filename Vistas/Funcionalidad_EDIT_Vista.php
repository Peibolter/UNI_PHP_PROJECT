<?php 
class funcionalidadEDIT{

	function crear($idioma,$form,$formgrupo,$formfuncionalidadgrupos,$mensaje,$formacciones,$formaccionesfun){

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
 			if($mensaje==FALSE){
 				echo "<script>alert(\"".$idiom["obligatorio"]."\")</script>";
 			}
			echo "<div class=\"container well\">";
 			echo "<div class=\"row\">";
			echo "<div class=\"col-xs-12\">";
			echo "<form class=\"form-horizontal\" name=\"formulario\" id=\"formulario\" method=\"post\" action=\"..\Controlador\Funcionalidad_Controller.php?ModificarFuncionalidad\">";
			echo "<fieldset><legend>".$idiom['Funcio']."</legend>";
			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"nombre\"> ".$idiom['Nombre'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=\"text\" required value=\"".$form[0]["nombre"]."\" name=\"Nombre\" readonly>"; 
			echo "</div></div>";
			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"cuenta\"id =\"cuenta\" > ".$idiom['descripcion'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<textarea rows=\"4\" cols=\"50\" name=\"descripcion\" required form=\"formulario\" ></textarea>";
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"formacciones\"id =\"cuenta\"> ".$idiom['Permisos'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			for($numar12=0;$numar12<count($formacciones);$numar12++)
			{	
				$boolean=TRUE;
				for($cont=0;$cont<count($formaccionesfun);$cont++){ 
				if(isset($formaccionesfun[$cont]["accion"]) and ($formaccionesfun[$cont]["accion"]==$formacciones[$numar12]["nombre"]) ){
				echo "<input type=\"checkbox\" name=\"formacciones[]\" id=cuenta value=\"".$formaccionesfun[$cont]["accion"]."\" checked>".$formaccionesfun[$cont]["accion"]."<br>";
				$boolean=FALSE;
				}
			}

			if($boolean==TRUE){
				echo "<input type=\"checkbox\" name=\"formacciones[]\" id=cuenta  value=\"".$formacciones[$numar12]["nombre"]."\">".$formacciones[$numar12]["nombre"]."<br>";
			}

			}
			
			echo "</div></div>";
			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"grupo\"id =\"grupo\"> ".$idiom['GrupoName'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			
			for($numar=0;$numar<count($formgrupo);$numar++)
			{	$boolean=TRUE;
				for($cont=0;$cont<count($formfuncionalidadgrupos);$cont++)
				{	
					if(($formgrupo[$numar]["nombre"])==($formfuncionalidadgrupos[$cont]["grupo"])){ 
			      		echo "<input type=\"checkbox\" name=\"grupo[]\" value=\"".$formgrupo[$numar]["nombre"]."\" checked>".$formgrupo[$numar]["nombre"]."\n\n";
			      		$boolean=FALSE;
					}
				}
				if($boolean==TRUE)
				{
				echo "<input type=\"checkbox\" name=\"grupo[]\" value=\"".$formgrupo[$numar]["nombre"]."\">".$formgrupo[$numar]["nombre"]."\n\n";
				}
			}
			echo "</div></div>";	
			echo "<a href=\"Funcionalidad_Controller.php?ModificarFuncionalidad\"><input type=\"image\" src=\"..\Archivos\\lapiz.png\" onClick=\"return confirm('".$idiom['confirmeEditName'].":".$form[0]["nombre"]."?')\" width=\"20\" height=\"20\"></a>";
			echo "</fieldset>";
			echo "</form>";
			echo "<a href=\"Funcionalidad_Controller.php?Volver\"><input type=\"image\" src=\"..\Archivos\\volver.png\" width=\"20\" height=\"20\"></a>";

?>



<?php
	include '../plantilla/pie.php';
	}}


?>