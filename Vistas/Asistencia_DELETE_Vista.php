<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html;charset=utf-8" />
	<meta charset="utf-8">
	<meta charset="encoding">	
</head>
<body>

<?php 

class AsistenciaDELETE{

	function crear($idioma, $consulta){

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

		<div class="container well">
			<div class="col-xs-12">
				<h1><?php echo $idiom['Asistencia']; ?></h1>
					<form class="form-horizontal" id="loadlist" role="form" action="..\Controlador\Asistencia_Controller.php?ConfirmarEliminarAsistencia&id_monitor=<?php echo $consulta[0]['id_monitor']; ?>&fecha=<?php echo $consulta[0]['fecha']; ?>" method="post">
									
						<table class="table table-bordered table-hover">
						<thead>
							<th style="text-align:center" ><?php echo $idiom['Monitor']; ?>: <?php echo $consulta[0]['nombre_monitor']; ?></th>
							<th colspan="2" style="text-align:center"  ><?php echo $idiom['Fecha']; ?>: <?php echo $consulta[0]['fecha']; ?></th>
						</thead>
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
									<input type="checkbox" disabled = "true" <?php if( $consulta[$i]['asiste']==1){echo "checked";} ?> name="asistencias[]" value="<?php echo $consulta[$i]['id_asistencia']; ?>" >
								</td>
							</tr>						
<?php
						}		
?>
					</table>
						<a href="Asistencia_Controller.php?ConfirmarEliminarAsistencia&id_monitor=<?php echo $consulta[0]['id_monitor']; ?>&fecha=<?php echo $consulta[0]['fecha']; ?>" >
							<input type="image" onClick="return confirm('<?php echo $idiom['DeleteAsistencia'] . ": " . $consulta[0]["nombre_monitor"] . "?";?>')"src="..\Archivos\\eliminar.png" width="20" height="20">
						</a>
						
					</form>
					</div>
					</div>		

						<a href="Asistencia_Controller.php?Volver">
							<input type="image" src="..\Archivos\volver.png" width="20" height="20">
						</a>
<?php
	include '../plantilla/pie.php';
	}
}
?>
</body>
</html>