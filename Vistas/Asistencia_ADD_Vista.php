<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html;charset=utf-8" />
	<meta charset="utf-8">
	<meta charset="encoding">
</head>
<body>

<?php 

class AsistenciaAlta{

	function crear($idioma,$mensaje,$etapa, $consulta){

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
	
	
	if($etapa == "monitores"){
?>
		<div class="container well">
			<div class="col-xs-12">
				<h1><?php echo $idiom['Asistencia']; ?> </h1>
					<form class="form-horizontal" id="loadlist" role="form" action="..\Controlador\Asistencia_Controller.php?AsistenciaMonitores" method="post">
						<div class="form-group">
							<label for="inputEmail1" class="col-lg-2 control-label"><?php echo $idiom['Monitor']; ?>:</label>
								<div class="col-lg-7">
									<select class="form-control" required id='monitor' name='monitor'>
												<option value=""> ---- <?php echo $idiom['Seleccione Monitor']; ?> ----- </option>
<?php
												for ($i =0;$i<count($consulta);$i++){
?>
													<option value= "<?php echo $consulta[$i]["id"]; ?>" > <?php echo $consulta[$i]["nombre"]; ?> </option>
<?php
												}
?>
											</select>
								</div>
																													
								<div class="col-lg-offset-3">
										<input type="submit" class="btn btn-primary" value="<?php echo $idiom['Aceptar'];?>"></button>
									</div>
						</div>
					</form>
					<div id="data">
					<p class="alert alert-warning"><?php echo $idiom['Por favor, seleccione un monitor'] . ".";?></p>
					</div>
			</div>
		</div>
		
		<a href="Usuario_Controller.php?Volver">
				<input type="image" src="..\Archivos\volver.png" width="20" height="20">
		</a>
<?php
}
	if($etapa == "alumnos"){
?>
		<div class="container well">
			<div class="col-xs-12">
				<h1><?php echo $idiom['Asistencia']; ?></h1>
					<form class="form-horizontal" id="loadlist" role="form" action="..\Controlador\Asistencia_Controller.php?AltaAsistencia" method="post">
						<label for="FechaAsistencia" class="col-lg-2 control-label" onblur="fechacomprobar();" ><?php echo $idiom['Seleccionar Fecha']; ?>:</label>
							<div class="col-lg-7">
								<input type="date"  placeholder="AAAA-MM-DD" required pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" name="fecha"  required class="form-control" >
							</div>						
						
						<input type="hidden" name="id_monitor" value="<?php echo $consulta[0]['id_monitor']; ?>">
			
						<table class="table table-bordered table-hover">
						<thead>
							<th><?php echo $idiom['Alumno']; ?></th>
							<th><?php echo $idiom['Actividad']; ?></th>
							<th><?php echo $idiom['Asistencia']; ?></th>
						</thead>
<?php	
						for($i=0;$i<count($consulta);$i++)
						{
?>							<tr>
								<td>
									<?php echo $consulta[$i]["nombre_alumno"]; ?>
								</td>
								<td>
									<?php echo $consulta[$i]["actividad"]; ?>
								</td>
								<td>
									<input type="checkbox" name="inscripciones[]" value="<?php echo $consulta[$i]['id_inscripcion']; ?>" >
								</td>
							</tr>
							<br>
<?php
						}					
?>
					</table>
					<a>
						<input type="image" type="submit" src="..\Archivos\añadir.png" width="20" height="20" >
					</a>
					
					</form>
					</div>
					</div>		

						<a href="Asistencia_Controller.php?Volver">
				<input type="image" src="..\Archivos\volver.png" width="20" height="20">
		</a>
			</div>
		</div>
<?php
	}
	?>
 <?php
 			if (!empty($mensaje)){
 				echo "<script>alert(\"".$idiom[$mensaje]."\")</script>";
 			}
?>

<?php
	include '../plantilla/pie.php';
	}
}
?>
</body>
</html>