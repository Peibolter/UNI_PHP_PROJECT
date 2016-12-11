<?php 
class notificacionVista{

  function crear($idioma,$aviso,$form){ 

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
        //
         if(!empty($aviso)){
          echo "<script> alert(\"".$idiom['alerta']."\")</script>";
        }

      echo "<div class=\"container well\">";
      echo "<div class=\"row\">";
      echo "<div class=\"col-xs-12\">";
      echo "<form enctype=\"multipart/form-data\" class=\"form-horizontal\" method=\"post\"  name=\"formulario\" id=\"formulario\" action=\"..\Controlador\Notificacion_Controller.php?enviarnoti\">";
      echo "<fieldset><legend>".$idiom['notificacion']."</legend>";
      echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"usuario\"id =\"usuario\"> ".$idiom['Usuario'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			for($numar=0;$numar<count($form);$numar++)
							{
							echo "<input type=\"checkbox\" name=\"usuario[]\" value=\"".$form[$numar]["usuario"]."\">".$form[$numar]["usuario"]."";
							}
						echo "</div></div>";	
      echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"cuenta\"id =\"cuenta\"> ".$idiom['mensaje'].":</label>";
      echo "<div class=\"input-group col-sm-3\">";
      echo "<textarea rows=\"4\" cols=\"50\" name=\"mensaje\" form=\"formulario\"></textarea>";
      echo "</div></div>";
      echo "<a href=\"..\Controlador\Notificacion_Controller.php?enviarnoti\"><input type=\"image\" src=\"..\Archivos\añadir.png\" width=\"20\" height=\"20\" mouseover='encriptar();'></a>";
      echo "</fieldset>";
      echo "</form>";
      echo "<a href=\"Usuario_Controller.php?Volver\"><input type=\"image\" src=\"..\Archivos\\volver.png\" width=\"20\" height=\"20\"></a>";
      include '../plantilla/pie.php';
      }
  }
?>

  