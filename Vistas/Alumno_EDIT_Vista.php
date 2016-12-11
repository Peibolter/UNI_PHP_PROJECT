<?php 
class Alumno_EDIT{

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
				<div class="row">
					<div class="col-xs-12">
						<form enctype="multipart/form-data" class="form-horizontal"  method="post"  name="formulario" id="formulario" action="..\Controlador\Alumno_Controller.php?ModificarAlumno">
							<fieldset>
							
							<legend> <?php echo $idiom['Alumno']; ?> </legend>
							
								<div class="form-group"> 
									<label class="col-sm-2 control-label"  for="DNI" id ="DNIlabel"> <?php echo $idiom['DNI'] . ':'; ?> </label>
									<div class="input-group col-sm-3">
										<input class="form-control" id ="DNI" readonly value="<?php echo $consulta['DNI'];?>" type="text" size ="10" maxlength = "10" name="DNI"> 
										<p id="DNI1"> </p>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-sm-2 control-label" for="Nombre"> <?php echo $idiom['Nombre'] . ':'; ?> </label>
									<div class="input-group col-sm-3">
										<input class="form-control" type="text" required value="<?php echo $consulta['Nombre']; ?>" id="Nombre" name="Nombre" pattern="[A-Za-z]{4-16}" size="10" maxlength="20">
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 control-label" for="Apellidos" id ="Apellidoslabel"> <?php echo $idiom['Apellidos'] . ':'; ?> </label>
									<div class="input-group col-sm-3">
										<input class="form-control" type="text" required value="<?php echo $consulta['Apellidos']; ?>" id="Apellidos" name="Apellidos" size="15" maxlength ="30"> 
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 control-label" for="FechaNac" id ="FechaNaclabel" size="10"  onblur="fechacomprobar();"> <?php echo $idiom['Fecha de nacimiento'] . ':'; ?> </label>
									<div class="container">
										<div class="hero-unit">
											<div class="input-group col-sm-3">
												<input  type="text" class="form-control" value="<?php echo $consulta['Nacimiento']; ?>" placeholder="AAAA-MM-DD" size ="50" name="FechaNac" required pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])"  id="example1">
											</div>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 control-label" for="Direccion" id="Direccionlabel"> <?php echo $idiom['Direccion'] . ':'; ?> </label>
									<div class="input-group col-sm-3">
										<input class="form-control" type="text" required value="<?php echo $consulta['Direccion']; ?>" id="Direccion" name="Direccion" size="20" maxlength="100"> 
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-sm-2 control-label" for="Telefono" id ="Telefonolabel"> <?php echo $idiom['Telefono'] . ':'; ?> </label>		
									<div class="input-group col-sm-3">
										<input class="form-control" type="telefono" required value="<?php echo $consulta['Telefono']; ?>" id="Telefono" name="Telefono" maxlength ="15" size ="15"> 
									</div>
								</div>
								
								<div class="form-group"> 
									<label class="col-sm-2 control-label" for="email" id ="emaillabel"> <?php echo $idiom['Email'] . ':'; ?> </label>
									<div class="input-group col-sm-3">
										<span class="input-group-addon">@</span>
										<input class="form-control" placeholder = "ejemplo@um.es" value="<?php echo $consulta['Email']; ?>" type="text" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required id="Email" name="Email" maxlength =45> 
									</div>
								</div>

								<div class="form-group"> 
									<label class="col-sm-2 control-label" for="foto" id ="fotolabel"> <?php echo $idiom['Foto'] . ':';?> </label>
									<div class="input-group col-sm-3">
										<input class="form-control" name="Foto" required  type="file" id="Foto" accept=".jpg, .gif, .jpeg"/>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 control-label" for="cuenta" id ="cuentalabel"> <?php echo $idiom['Cuenta bancaria'] . ':'; ?> </label>
									<div class="input-group col-sm-3">
										<input class="form-control" type="number" value="<?php echo $consulta['CuentaBancaria']; ?>" required id="Cuenta" name="Cuenta" maxlength="50">
									</div>
								</div>
						
						
							<a href="Alumno_Controller.php?ModificarAlumno">
								<input type="image" src="..\Archivos\lapiz.png" width="20" height="20" onClick="return confirm('<?php echo $idiom['UpdateAlumno'] . ": " . $consulta['DNI'] . "?" ?>')">
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
	include '../plantilla/pie.php';
	}

}


?>