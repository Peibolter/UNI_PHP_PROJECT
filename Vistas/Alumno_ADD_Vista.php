<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html;charset=utf-8" />
	<meta charset="utf-8">
	<meta charset="encoding">
	<!--LLamada al javascript-->	
</head>
<body>
<script type = "text/javascript">
	function validarImagen(archivo){
		var aux = archivo.split('.');
		if(aux[aux.length-1] == 'jpeg' || aux[aux.length-1] == 'jpg' || aux[aux.length-1] == 'gif'){
			return true;
		}else{
			alert('El archivo debe ser una imagen');
			return false;
		}
	}
	
	function validarDNI(campo)
{	
	var dni = campo.value;
	var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];
	
	if( !(/^\d{8}[A-Z]$/.test(dni) ) ) {
		//return false;
		alert ("El DNI es incorrecto!");
	}else if ( dni.charAt(8) != letras[(dni.substring(0, 8))%23] ){
		alert ("La letra introducida es incorrecta!");
	}	
}
	
	
</script>

<?php 

class AlumnoAlta{

	function crear($idioma,$resultado,$mensaje){

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
 			if($resultado==FALSE){
 				echo "<script>alert(\"".$idiom["USUARIOSINCORRECTO"]."\")</script>";
 			}
 			if (!empty($mensaje)){
 				echo "<script>alert(\"".$mensaje."\")</script>";
 			}
?>
	<div class="container well">
 	<div class="row">
		<div class="col-xs-12">
			<form enctype="multipart/form-data" class="form-horizontal"  method="post"  name="formulario" id="formulario" action="..\Controlador\Alumno_Controller.php?AltaAlumno">
				<fieldset>
				
				<legend> <?php echo $idiom['Alumno']; ?> </legend>
				
					<div class="form-group"> 
						<label class="col-sm-2 control-label"  for="DNIlabel" id ="DNIlabel"> <?php echo $idiom['DNI'] . ':'; ?> </label>
						<div class="input-group col-sm-3">
							<input class="form-control" id ="DNI" onBlur = 'validarDNI(this);' required placeholder = "12312311F" type="text" size ="10" maxlength = "10" name="DNI"> 
							<p id="DNI1"> </p>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label" for="Nombre"> <?php echo $idiom['Nombre'] . ':'; ?> </label>
						<div class="input-group col-sm-3">
							<input class="form-control" type="text" required  id="Nombre" name="Nombre" pattern="[A-Za-z]{4-16}" size="10" maxlength="20">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label" for="Apellidos" id ="Apellidoslabel"> <?php echo $idiom['Apellidos'] . ':'; ?> </label>
						<div class="input-group col-sm-3">
							<input class="form-control" type="text" required id="Apellidos" pattern="[A-Za-z]{4-16}" name="Apellidos" size="15" maxlength ="30"> 
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label" for="FechaNac" id ="FechaNaclabel" size="10"  onblur="fechacomprobar();"> <?php echo $idiom['Fecha de nacimiento'] . ':'; ?> </label>
						<div class="container">
							<div class="hero-unit">
								<div class="input-group col-sm-3">
									<input  type="text" class="form-control" placeholder="AAAA-MM-DD" size ="50" name="FechaNac" required pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])"  id="example1">
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label" for="Direccion" id="Direccionlabel"> <?php echo $idiom['Direccion'] . ':'; ?> </label>
						<div class="input-group col-sm-3">
							<input class="form-control" type="text" required id="Direccion" name="Direccion" size="20" maxlength="100"> 
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label" for="Telefono" id ="Telefonolabel"> <?php echo $idiom['Telefono'] . ':'; ?> </label>		
						<div class="input-group col-sm-3">
							<input class="form-control" type="telefono" required id="Telefono" name="Telefono" maxlength ="15" size ="15"> 
						</div>
					</div>
					
					<div class="form-group"> 
						<label class="col-sm-2 control-label" for="email" id ="emaillabel"> <?php echo $idiom['Email'] . ':'; ?> </label>
						<div class="input-group col-sm-3">
							<span class="input-group-addon">@</span>
							<input class="form-control" placeholder = "ejemplo@um.es" type="text" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required id="Email" name="Email" maxlength =45> 
						</div>
					</div>

					<div class="form-group"> 
						<label class="col-sm-2 control-label" for="fotoLabel" id ="fotolabel"> <?php echo $idiom['Foto'] . ':';?> </label>
						<div class="input-group col-sm-3">
							<input class="form-control" name="Foto" required type="file" id="Foto" accept=".jpg, .gif, .jpeg"/>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label" for="cuenta" id ="cuentalabel"> <?php echo $idiom['Cuenta bancaria'] . ':'; ?> </label>
						<div class="input-group col-sm-3">
							<input class="form-control" type="number" required id="Cuenta" name="Cuenta" maxlength="30">
						</div>
					</div>
			
					<a>
						<input type="image" type="submit" src="..\Archivos\añadir.png" width="20" height="20" >
					</a>
				</fieldset>
			</form>
			
			
			<a href="Usuario_Controller.php?Volver">
				<input type="image" src="..\Archivos\volver.png" width="20" height="20">
			</a>
<?php
	include '../plantilla/pie.php';
	}
}
?>

</body>
</html>