<?php 
	class Alumno_SHOW{

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
    		<header>
  			</header>
				<form action="Alumno_Controller.php" method="post">

					<fieldset>
						<input type="hidden" value="<?php echo $origen; ?>" name="origen">
						<input type="text" aling="right" placeholder= "<?php echo $idiom['Alumno']; ?>" name="Buscar" id="Buscar"> 
						<input  type="submit" name="Buscador" value="Buscar">
					</fieldset>
			
				</form>
<?php		 

	        for ($i = 0; $i < count($consulta); $i++){
?>
			<div class="container well">
				<div class="row">
					<div class="col-xs-12">
<?php
						if($origen=="modificar"){
?>
							<form class="form-horizontal" method="post" action="..\Controlador\Alumno_Controller.php?Update=<?php echo $consulta[$i]['dni']; ?> ">
<?php
						}
						else { 
?>
							<form class="form-horizontal" method="post" action="..\Controlador\Alumno_Controller.php?View=<?php echo $consulta[$i]['dni']; ?> " >
<?php										
						}
?>
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
						
							if($origen == "modificar"){
?>
								<a href="Alumno_Controller.php?Update=<?php echo $consulta[$i]['dni']; ?> ">
									<input type="image" src="..\Archivos\\lapiz.png" width="20" height="20">
								</a>
<?php
							}
							if ($origen == "consultar"){ 
?>
								<a href="Alumno_Controller.php?View=<?php echo $consulta[$i]['dni']; ?> ">
									<input type="image" src="..\Archivos\\lupa.jpg" width="20" height="20">
								</a>
<?php			
							}
?>
								</fieldset>
							</form>
					</div>
				</div>
			</div>
<?php
		 	}
?>
		 	<a href="Alumno_Controller.php?Volver">
				<input type="image" src="..\Archivos\\volver.png" width="20" height="20">
			</a>		 

		</div><
		/div>
		</div>
		
	</div>
<?php 
include '../plantilla/pie.php';
}
}
?>