<?php

  include("../Modelos/Alumno_Model.php");
  include("../Idiomas/idiomas.php");
  include("../Vistas/Alumno_ADD_Vista.php");
  include("../Vistas/Alumno_SHOW_Vista.php");
  include("../Vistas/Alumno_VIEW_Vista.php");
  include("../Vistas/Alumno_EDIT_Vista.php");
  include("../Vistas/Alumno_DELETE_Vista.php");
  include("../Vistas/MenuPrincipal_SHOW_Vista.php");
  session_start();
  
    
  //Viene del menú por haber pinchado alta alumno.
	if (isset ($_REQUEST['AltaMenu'])){
		$idiom=new idiomas();
		$alta = new AlumnoAlta();
		$alta->crear($idiom,TRUE,null);
	}
  
  //AltaAlumno en la base de datos.
    if(isset($_REQUEST['AltaAlumno']))
	{
		$msg = "" ;
		$formatocorrecto = true;
		
		if (!($_FILES['Foto']['type'] == "image/jpeg") && !($_FILES['Foto']['type'] == "image/gif") && !($_FILES['Foto']['type'] == "image/jpg") ){

			$msg = $msg . "Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos. ";
			$formatocorrecto = false;
			
			if ($_FILES['Foto']['size'] > 200000 ){
			
				$msg = $msg . "El archivo es mayor que 200KB, debes reducirlo antes de subirlo. ";
				$formatocorrecto = false;
			}
			
		}
		
		//validacion dni
		$letra = substr($_REQUEST['DNI'], -1);
		$numeros = substr($_REQUEST['DNI'], 0, -1);
		if ( !(substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8) ){
			$msg = $msg . "DNI no válido";
			$formatocorrecto = false;
		}
		

		if($formatocorrecto == true){
	
			$foto=$_FILES['Foto']['name'];
			$ruta=$_FILES['Foto']['tmp_name'];
			$destino="../Archivos/".$foto;
			copy($ruta,$destino);
		
			$alumn = new Alumno();
			$resultado = $alumn-> existeAlumno($_POST['DNI']);
			
			//Si no existe el alumno se crea
			if($resultado == false){
				$alumn -> altaAlumno($_POST['DNI'],$_POST['Nombre'],$_POST['Apellidos'],$_POST['FechaNac'],$_POST['Direccion'],$_POST['Telefono'],$_POST['Email'],$foto,$_POST['Cuenta']);
				$idioma = new idiomas();
				//Para mostrar el mensaje de éxito ubicado en MenuPrincipal_SHOW_Vista
				$origen = "Alta";
				//Creación del nuevo MenuPrincipal_SHOW_Vista
				$vista = new panel();
				$vista->constructor($idioma,$origen);
			}
			//Se vuelve a mostrar el formulario para que el usuario lo complete con nuevos datos
			else{
				$idiom=new idiomas();
				$alta = new AlumnoAlta();
				$alta->crear($idiom,FALSE,null);
			}
		}else{
				$idiom=new idiomas();
				$alta = new AlumnoAlta();
				$alta->crear($idiom,TRUE,$msg);
		}
	}
    
	//El usuario ha pinchado baja alumno
	if (isset($_REQUEST['BajaMenu']))
	{  
		$origen="baja";
		$idiom=new idiomas();
		$model=new Alumno();
		$consulta = $model -> consultarTodo();
		$vistas=new Alumno_DELETE();
		//No salte el aviso de que no se puede eliminar.
		$resultado = TRUE;
		$vistas->crear($idiom, $resultado, $consulta);
	}
	
	//El usuario ha seleccionado un alumno a eliminar; origen vista delete; destino view
	if (isset($_REQUEST['ViewBaja']))
	{  
        $origen="baja";
		$idiom=new idiomas();
		$alumnoDNI=$_REQUEST['ViewBaja'];
		$model=new Alumno();
		$consulta = $model->datosAlumno($alumnoDNI);
		$vistas=new Alumno_VIEW();
		$vistas->crear($consulta,$idiom,$origen);
	}
	
	//Se hace el delete sobre la bbdd
	if ( isset( $_REQUEST['Eliminar'] ) )
	{
		$idiom=new idiomas();
		$alumnoDNI=$_REQUEST['Eliminar'];
		$model=new Alumno();
		$resultado=$model->existeAlumno($alumnoDNI);
		
		//Si el alumno existe en la BBDD se borra.
		if($resultado == TRUE){
			$origen = "Baja";
			$model->eliminarAlumno($alumnoDNI);
			$idiom=new idiomas();
			$vista=new panel();
			$vista->constructor($idiom,$origen);
		}
		//Si el alumno no existe en la BBDD.
		else{
			$idiom=new idiomas();
			$vista=new Alumno_DELETE();
			$vista->crear($idiom,FALSE,$form);
		}
	}
	
	
	//Buscador de la vista delete
	if ( isset($_POST['buscadorDelete']) )
  	{
		$idiom=new idiomas();
		$busqueda=$_POST['Buscar'];
		$model=new Alumno();
		$consulta = $model->buscarAlumno($busqueda);
		$consulta2 = $model -> consultarTodo();
		$vistas=new Alumno_DELETE();
		if($consulta == false){
			$vistas->crear($idiom,TRUE,$consulta2);
		}else{
			$vistas->crear($idiom,TRUE,$consulta);
		}		
	}

	//Viene del menú lateral de haber pinchado en consultar alumno.
	if (isset($_REQUEST['ConsultarMenu']))
	{  
        $origen = "consultar";
		$idiom=new idiomas();
		$model=new Alumno();
		$consulta = $model -> consultarTodo();
		$vistas=new Alumno_SHOW();
		$vistas->crear($consulta,$idiom,$origen);
	}
	
	//viene del show y va al view
	if( isset( $_REQUEST['View'] ) )
    {  
          $origen="consultar";
          $idiom=new idiomas();
          $alumnoDNI=$_REQUEST['View'];
          $model=new Alumno();
          $consulta = $model->datosAlumno($alumnoDNI);
          $vistas=new Alumno_VIEW();
          $vistas->crear($consulta,$idiom,$origen);
    }
	
	
	//Buscador vista SHOW
	if ( isset($_REQUEST['Buscador']) )
  	{
		$idiom=new idiomas();
		$busqueda=$_POST['Buscar'];
		$model=new Alumno();
		$consulta = $model->buscarAlumno($busqueda);
		$consulta2 = $model -> consultarTodo();
		$vistas=new Alumno_SHOW();
		if($consulta == false){
			$vistas->crear($consulta2,$idiom,$_REQUEST['origen']);
		}else{
			$vistas->crear($consulta,$idiom,$_REQUEST['origen']);
		}
	}
	
	//El usuario ha pinchado modificar alumno
	if (isset($_REQUEST['ModificarMenu']))
	{  
        $origen = "modificar";
		$idiom=new idiomas();
		$model=new Alumno();
		$consulta = $model -> consultarTodo();
		$vistas=new Alumno_SHOW();
		$vistas->crear($consulta,$idiom,$origen);
	}	
	
	//Viene del show y va al view para confirmar datos.
	if ( isset( $_REQUEST['Update'] ) )
  	{
		  $origen = "modificar";
          $idiom=new idiomas();
          $alumnoDNI=$_REQUEST['Update'];
          $model=new Alumno();
          $consulta = $model->datosAlumno($alumnoDNI);
          $vistas=new Alumno_VIEW();
          $vistas->crear($consulta,$idiom,$origen);
	}
	
	//viene del show y va al edit
	if ( isset( $_REQUEST['Modificar'] ) )
  	{
		  //$origen = "modificar";
          $idiom=new idiomas();
          $alumnoDNI=$_REQUEST['Modificar'];
          $model=new Alumno();
          $consulta = $model->datosAlumno($alumnoDNI);
          $vistas=new Alumno_EDIT();
          $vistas->crear($idiom,$consulta);
	}
	
	//Se hace el update en la BBDD
	if(isset($_REQUEST['ModificarAlumno']))
	{
		
		$foto=$_FILES['Foto']['name'];
		$ruta=$_FILES["Foto"]["tmp_name"];
		$destino="../Archivos/".$foto;
		copy($ruta,$destino);
		
	 
		$alumn = new Alumno();
		$resultado = $alumn-> existeAlumno($_POST['DNI']);
		//$resultado = $alumn -> existeAlumno($_POST['DNI']);
		//Si no existe el alumno se crea
		if($resultado == true){
			$alumn -> modificarAlumno($_POST['DNI'],$_POST['Nombre'],$_POST['Apellidos'],$_POST['FechaNac'],$_POST['Direccion'],$_POST['Telefono'],$_POST['Email'],$foto,$_POST['Cuenta']);
			$idioma = new idiomas();
			//Para mostrar el mensaje de éxito ubicado en MenuPrincipal_SHOW_Vista
			$origen = "Alta";
			//Creación del nuevo MenuPrincipal_SHOW_Vista
			$vista = new panel();
			$vista->constructor($idioma,$origen);
		}
	}
		
	if ( isset( $_REQUEST['Volver'] ) )
  	{
        $origen="inicio";
  		$idiom=new idiomas();
  		$vista=new panel();
  		$vista->constructor($idiom,$origen);
  	}
?>