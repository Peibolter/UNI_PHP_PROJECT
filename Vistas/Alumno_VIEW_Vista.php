<?php 
	class Alumno_VIEW{

		function crear($consulta,$idioma,$origen){ 

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

			<div class="container well" >
				<div class="row">
					<div class="col-xs-6" id="col">
<?php
						echo "<input type=\"image\" src=\"..\Archivos\\".$consulta["Foto"]."\"width=\"100\" height=\"100\">";
?>
						<br>
					</div>
				</div>	
				
				<div class="row">
					<div class="col-xs-6"  id="col">
<?php
						if ($origen=="baja"){
?>
							<form class="form-horizontal"  method="post" action="..\Controlador\Alumno_Controller.php?Eliminar=<?php echo $consulta["DNI"]; ?>" >
<?php				
						}else if ($origen == "modificar") {
?>
							<form class="form-horizontal"  method="post" action="..\Controlador\Alumno_Controller.php?Modificar=<?php echo $consulta["DNI"]; ?>" >
<?php				
						}else{
?>
							<form class="form-horizontal"  method="post" action="..\Controlador\Usuario_Controller.php?View=<?php echo $consulta["DNI"]; ?>">
<?php							
						}
?>
						<fieldset>
							<legend aling="center"> 
								<?php echo $idiom['Alumno']; ?>
							</legend>
			
						<br>
<?php			
						echo $idiom['Nombre'] . ": " . $consulta['Nombre'];
						echo "<br>";
						echo $idiom['Apellidos'] . ": " . $consulta['Apellidos'];
						echo "<br>";
						echo $idiom['DNI'] . ": " . $consulta["DNI"];
						echo "<br>";
						echo $idiom['Fecha de nacimiento'] . ": " . $consulta["Nacimiento"];
						echo "<br>";
						echo $idiom['Direccion'] . ": " . $consulta["Direccion"];
						echo "<br>";
						echo $idiom['Telefono'] . ": " . $consulta["Telefono"];
						echo "<br>";
						echo $idiom['Email'] . ": " . $consulta["Email"];
						echo "<br>";
						echo $idiom['Cuenta bancaria'] . ": " . $consulta["CuentaBancaria"];
						echo "<br>";
			
						if ($origen=="baja"){
?>
							<a href="Alumno_Controller.php?Eliminar=<?php echo $consulta["DNI"]; ?>" >
								<input type="image" onClick="return confirm('<?php echo $idiom['DeleteAlumno'] . ": " . $consulta["DNI"] . "?";?>')" src="..\Archivos\\eliminar.png" width="20" height="20">
							</a>
<?php		
						}
						
						if ($origen=="modificar"){
?>
							<a href="Alumno_Controller.php?Modificar= <?php echo $consulta["DNI"]; ?>" >
								<input type="image"  src="..\Archivos\\lapiz.png" width="20" height="20">
							</a>
<?php
						}
?>
						</fieldset>
							</form>
					</div>
				</div>
			</div>
			
		 	<a href="Alumno_Controller.php?Volver">
				<input type="image" src="..\Archivos\\volver.png" width="20" height="20">
			</a>
<?php 
include '../plantilla/pie.php';
}
}
?>