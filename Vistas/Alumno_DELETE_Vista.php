<?php 
class Alumno_DELETE{

	function crear($idioma,$resultado,$consulta){

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
 			if ($resultado == FALSE){
 				echo "<script>alert(\"".$idiom["Eliminado"]."\")</script>";
 			}
?>

 			<form action="Alumno_Controller.php?BajaShow" method="post">
				<fieldset>
					<input type="text" aling="right" placeholder="<?php echo $idiom['Alumno']; ?>" name="Buscar" >
						<input  type="submit" name="buscadorDelete" value="Buscar">
				</fieldset>
			</form> 
<?php
			for ($i =0;$i<count($consulta);$i++){
?>
			<div class="container well">
				<div class="row">
					<div class="col-xs-12">
						<form class="form-horizontal" method="post" action="..\Controlador\Alumno_Controller.php?ViewBaja=<?php echo $consulta[$i]["dni"]; ?> ">
						
						<fieldset>
							<legend> 
								<?php echo $idiom['Alumno']; ?> 
							</legend>
							
							<br>
<?php
								echo $idiom['Nombre'] . ": " . $consulta[$i]["nombre"];
								echo "<br>";
								echo $idiom['Apellidos'] . ": " . $consulta[$i]["apellidos"];
								echo "<br>";
								echo $idiom['DNI'] . ": " . $consulta[$i]["dni"];
								echo "<br>";
?>
							<a href="Alumno_Controller.php?ViewBaja=<?php echo $consulta[$i]["dni"]; ?> ">
								<input type="image"  src="..\Archivos\\eliminar.png" width="20" height="20">
							</a>
							
						</fieldset>
						
						</form>
	
						<a href="Alumno_Controller.php?Volver">
							<input type="image" src="..\Archivos\volver.png" width="20" height="20">
						</a>
					</div>
				</div>
			</div>
<?php			
		 	}

	include '../plantilla/pie.php';
	}
}

?>
