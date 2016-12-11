<?php

	class Usuarios_Menu{

		function crear($idioma){ 
      
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
        $form=$datos->array_consultar();
        $menus=new menulateral();
        $menus->crear($idiom,$form);
        //
        $idiomacalendario="español";
        if(isset($_SESSION['idioma'])){
        $idiomacalendario=$_SESSION['idioma'];
    		?>
    
			<div class="container well">
 			<div class="row">
			<div class="col-xs-12">
    		<form id="formulario" class="principal" method="post" action="..\Controlador\Usuario_Controller.php">
             <input type="submit" class="btn btn-default" name="Alta"  value="<?php echo $idiom['AltaUsuario'];?>">    
              </form>
              <form class="principal" method="post" action="..\Controlador\Usuario_Controller.php">
             <input type="submit" class="btn btn-default" name="Baja"  value="<?php echo $idiom['BajaUsuario'];?>">    
              </form>
              <form class="principal" method="post" action="..\Controlador\Usuario_Controller.php">
             <input type="submit" class="btn btn-default" name="Modificar"  value="<?php echo $idiom['ModificacionUsuario'];?>">    
              </form>
              <form class="principal" method="post" action="..\Controlador\Usuario_Controller.php">
             <input type="submit" class="btn btn-default" name="Consultar"  value="<?php echo $idiom['ConsultaUsaurio'];?>">
              </form>
	</div>
	</div>
	</div>
			<?php 
	include '../plantilla/pie.php';
		}	

			

		}
?>