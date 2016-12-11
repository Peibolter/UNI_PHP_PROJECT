<?php 
	class AsistenciaSHOW{

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
 <?php
		if($origen == "sindatos"){
?>
		<header></header>
			<form action="Asistencia_Controller.php" method="post">

				<fieldset>
					<input type ="hidden" name="origen" value ="$origen">			
					<input type="text" aling="right" disabled ="true" placeholder="AAAA-MM-DD" required pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" name="fechabusca" id="fechabusca"> 
					<input  type="submit" disabled ="true" name="buscador" value="<?php echo $idiom['Buscar'];?>">
					
				</fieldset>
			</form>
			</br>
			<div id="data">
				<p class="alert alert-warning">No existen asistencias.</p>
			</div>
			<a href="Asistencia_Controller.php?Volver">
				<input type="image" src="..\Archivos\\volver.png" width="20" height="20">
			</a>				
<?php			
		}else{
?>
    		<header>
  			</header>
		
		
				<form action="Asistencia_Controller.php" method="post">

					<fieldset>
						<input type ="hidden" name="origen" value ="$origen">
						<input type="text" aling="right" placeholder="AAAA-MM-DD" required pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" name="fechabusca" id="fechabusca"> 
						<input  type="submit" name="buscador" value="<?php echo $idiom['Buscar'];?>">
						
					</fieldset>
			
				</form>
<?php		 
	        for ($i = 0; $i < count($consulta); $i++){
?>
			<div class="container well">
				<div class="row">
					<div class="col-xs-12">
<?php
						if($origen == "consultar"){
?>							
							<form class="form-horizontal" method="post" action="..\Controlador\Asistencia_Controller.php?ConsultarAsistencia&id_monitor=<?php echo $consulta[$i]['id_monitor']; ?>&fecha=<?php echo $consulta[$i]['fecha']; ?>" >
<?php	
						}else{
?>		
							<form class="form-horizontal" method="post" action="..\Controlador\Asistencia_Controller.php?EliminarAsistencia&id_monitor=<?php echo $consulta[$i]['id_monitor']; ?>&fecha=<?php echo $consulta[$i]['fecha']; ?>" >
<?php
						}
?>
								<fieldset>
							
								<legend> 
									<?php echo $idiom['Asistencia']; ?> 
								</legend>
					
								<br>
<?php
									echo $idiom['Monitor'] . ": " . $consulta[$i]["nombre_monitor"];
									echo "<br>";
									echo $idiom['Fecha'] . ": " . $consulta[$i]["fecha"];
									echo "<br>";
								
								if($origen=="consultar"){
?>

								<a href="Asistencia_Controller.php?ConsultarAsistencia&id_monitor=<?php echo $consulta[$i]['id_monitor']; ?>&fecha=<?php echo $consulta[$i]['fecha']; ?>" >
									<input type="image" src="..\Archivos\\lupa.jpg" width="20" height="20">
								</a>
<?php
								}else{
?>
								<a href="Asistencia_Controller.php?EliminarAsistencia&id_monitor=<?php echo $consulta[$i]['id_monitor']; ?>&fecha=<?php echo $consulta[$i]['fecha']; ?>" >
									<input type="image" src="..\Archivos\\eliminar.png" width="20" height="20">
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
		 	<a href="Asistencia_Controller.php?Volver">
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
}
?>