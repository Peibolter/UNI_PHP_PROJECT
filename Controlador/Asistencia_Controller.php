<?php

	include("../Modelos/Asistencia_Model.php");
	include("../Idiomas/idiomas.php");
	include("../Vistas/Asistencia_ADD_Vista.php");
	include("../Vistas/Asistencia_EDIT_Vista.php");
	include("../Vistas/Asistencia_SHOW_Vista.php");
	include("../Vistas/Asistencia_VIEW_Vista.php");
	include("../Vistas/Asistencia_DELETE_Vista.php");
	include("../Vistas/MenuPrincipal_SHOW_Vista.php");
	session_start();

	//Viene del menú lateral de haber pinchado en alta asistencia, se lanza la vista ADD
	if(isset($_REQUEST['AltaMenu'])){
		
		$etapa = "monitores";
		$idiom=new idiomas();
		$alta = new AsistenciaAlta();
		$mensaje = null;
		
		$model = new Asistencia();
		$consulta = $model -> consultaMonitores();
		$alta -> crear($idiom,$mensaje,$etapa,$consulta);	
	}
	
	//El usuario ha seleccionado un monitor en la vista ADD
	if(isset($_REQUEST['AsistenciaMonitores'])){
	
		$monitorID = $_REQUEST['monitor'];
		$etapa = "alumnos";
		$idiom=new idiomas();
		$alta = new AsistenciaAlta();
		
		$model = new Asistencia();
		$consulta = $model -> consultaAlumnos($monitorID);
		if($consulta != false){
			$mensaje = null;
			$alta -> crear($idiom,$mensaje,$etapa, $consulta);
		}else{
			$mensaje = 'No existen alumnos para ese monitor';
			$alta -> crear($idiom,$mensaje,"monitores", $model->consultaMonitores());
		}
	}
	
	//El usuario ha establecido la asistencia en la vista ADD
	if( isset( $_REQUEST['AltaAsistencia'] ) ){
		
		
		$id_monitor = $_REQUEST['id_monitor'];
		$fecha = $_REQUEST['fecha'];
		$model = new Asistencia();
		$idiom=new idiomas();
		
		$existeAsistencia = $model -> consultaAsistencia($fecha, $id_monitor);
	
		//Si ya existe esa fecha y monitor en la BBDD no se deja crear una nueva.
		if(is_array($existeAsistencia)){
			
			$alta = new AsistenciaAlta();
			$mensaje = "Ya existe una asistencia para ese monitor y fecha";
			$alta -> crear($idiom,$mensaje,"monitores", $model->consultaMonitores());
			
		}else{
			//Se establece para todos los alumnos asistencia 0.
			$alumnos = $model -> consultaAlumnos($id_monitor);
			for($i=0; $i<count($alumnos); $i++){
				$model -> AltaAsistencia($id_monitor, $alumnos[$i]['id_alumno'], $alumnos[$i]['actividad'], $fecha, 0);
			}
		
			//Si un alumno ha asistido se pone la asistencia a 1.
			if(isset( $_REQUEST['inscripciones'] )){
				$inscripcion = $_REQUEST['inscripciones'];
				$boxes = count($inscripcion);
				for ($i = 0; $i < $boxes; $i++) {
					$datos = $model -> consultaInscripcion($inscripcion[$i]);
					$idAsistencia = $model -> consultaIDAsistencia($datos['id_monitor'], $datos['id_alumno'], $fecha);
					$model -> modificarAsistencia($idAsistencia, 1);
				}
			}
	
			//Crea de nuevo el MenuPrincipal_SHOW_Vista, confirmando la alta.
			$origen = "Alta";
			$vista = new panel();
			$vista->constructor($idiom,$origen);		
		}	
	}

	//El usuario ha pinchado en consultar
	if(isset($_REQUEST['ConsultarMenu'])){
		
		$idiom=new idiomas();
				
		$model = new Asistencia();
		$consulta = $model -> consultarAsistencias();
		$alta = new AsistenciaSHOW();
		if($consulta == false){
			$etapa = "sindatos";
			$alta -> crear($consulta, $idiom, $etapa);
		}else{
			$etapa = "consultar";
			$alta -> crear($consulta, $idiom, $etapa);
		}		
	}
	
	//Se pasa a la vista view
	if(isset($_REQUEST['ConsultarAsistencia'])){
	
		$id = $_REQUEST['ConsultarAsistencia'];
		$id_monitor = $_REQUEST['id_monitor'];
		$fecha = $_REQUEST['fecha'];
		
		$model = new Asistencia();
		$consulta = $model -> consultaAsistencia($fecha, $id_monitor);
	
		$idiom=new idiomas();
		$resultado = FALSE;
		$mensaje = "";
		
		$view = new AsistenciaVIEW();
		
		if($consulta != false){
			$view -> crear($idiom,$consulta);
		}else{
			//$view -> crear($idiom,$resultado,"No existen asistencias para los valores seleccionados!","monitores",$model -> consultaMonitores());
		}
	}
	
	
	
	
	
	
	//El usuario ha pinchado baja asistencia
	if(isset($_REQUEST['BajaMenu'])){
		
		$idiom=new idiomas();
		
		$model = new Asistencia();
		$consulta = $model -> consultarAsistencias();
		$alta = new AsistenciaSHOW();
		
		if($consulta == false){
			$etapa = "sindatos";
			$alta -> crear($consulta, $idiom, $etapa);
		}else{
			$etapa = "eliminar";
			$alta -> crear($consulta, $idiom, $etapa);
		}
	}
	
	//Se pasa a la vista delete
	if(isset($_REQUEST['BajaAsistencia'])){
	
		$etapa = "consultar";
		
		$idiom=new idiomas();
		$resultado = FALSE;
		$mensaje = "";
		
		$model = new Asistencia();
		$consulta = $model -> consultaAsistencias();
		
		$alta = new AsistenciaSHOW();
		$alta -> crear($consulta, $idiom, $etapa);
	}
	
	
	//Se pasa a la vista delete, viene del show
	if(isset($_REQUEST['EliminarAsistencia'])){
	
		$id = $_REQUEST['EliminarAsistencia'];
		$id_monitor = $_REQUEST['id_monitor'];
		$fecha = $_REQUEST['fecha'];
		
		$model = new Asistencia();
		$consulta = $model -> consultaAsistencia($fecha, $id_monitor);
	
		$idiom=new idiomas();
		$resultado = FALSE;
		$mensaje = "";
		
		$view = new AsistenciaDELETE();
		
		if($consulta != false){
			$view -> crear($idiom,$consulta);
		}else{
			//$view -> crear($idiom,$resultado,"No existen asistencias para los valores seleccionados!","monitores",$model -> consultaMonitores());
		}		
	}
	
	//El usuario ha confirmado la eliminacion
	if(isset($_REQUEST['ConfirmarEliminarAsistencia'])){
		
		$id_monitor = $_REQUEST['id_monitor'];
		$fecha = $_REQUEST['fecha'];
		
		$model = new Asistencia();
		$model -> deleteAsistencia($id_monitor, $fecha);
		
		$origen="Baja";
		$idiom=new idiomas();
		$vista=new panel();
		$vista->constructor($idiom,$origen);
	}
	
	//El usuario ha pinchado en modificar
	if(isset($_REQUEST['ModificarMenu'])){
		
		$etapa = "monitores";
		
		$idiom=new idiomas();
		$alta = new AsistenciaEDIT();
		$mensaje = null;
		
		$model = new Asistencia();
		$consulta = $model -> consultaMonitores();
		$alta -> crear($idiom,$mensaje,$etapa,$consulta);
	}
	
	//El usuario ha usado el buscador para modificar las asistencias.
	if( isset( $_REQUEST['AsistenciaEDIT'] ) ){
		
		$fecha = $_REQUEST['fecha'];
		$monitorID = $_REQUEST['monitor'];
		
		$idiom=new idiomas();
		$alta = new AsistenciaEDIT();
		$mensaje = null;
		
		$model = new Asistencia();
		$consulta = $model -> consultaAsistencia($fecha, $monitorID);
		if($consulta != false){
			$alta -> crear($idiom,$mensaje,"alumnos",$consulta);
		}else{
			$alta -> crear($idiom,"No existen asistencias para los valores seleccionados!","monitores",$model -> consultaMonitores());
		}
	}
	
	//El usuario ha modificado la asistencia.
	if (isset( $_REQUEST['AsistenciaUPDATE'] ) ){
		
		$model = new Asistencia();
		
		//Las asistencias viejas se ponen a no asisten.
		$asistenciasViejas = $model -> consultaAsistencia($_REQUEST['fecha'], $_REQUEST['id_monitor']);
		for($i=0; $i<count($asistenciasViejas); $i++){
			$model -> modificarAsistencia($asistenciasViejas[$i]['id_asistencia'], 0);
		}	
		
		//Se marcan las nuevas asistencias.
		if(isset( $_REQUEST['asistencias'] )){
			$asistencia=$_REQUEST['asistencias'];
			$boxes = count($asistencia);
			for ($i = 0; $i < $boxes; $i++) {
				
				$model -> modificarAsistencia($asistencia[$i], 1);
			}
		}	
		
		//Se genera un mensaje confirmando y se vuelve al menu principal.
		$idiom=new idiomas();
		$origen = "Modificar";
		$vista = new panel();
		$vista->constructor($idiom,$origen);
	}

	
	
	//Buscador vista SHOW
	if(isset($_REQUEST['buscador'])){
				
		$idiom=new idiomas();
		$busqueda=$_POST['fechabusca'];
		$model=new Asistencia();
		$consulta = $model->buscarAsistencia($busqueda);
		$consulta2 = $model -> consultarAsistencias();
		$alta = new AsistenciaSHOW();
		if($consulta == false){
			$alta -> crear($consulta2, $idiom, $_POST['origen']);
		}else{		
			$alta->crear($consulta,$idiom,$_POST['origen']);
		}
	}
	
	//Boton volver
	if ( isset( $_REQUEST['Volver'] ) )
  	{
        $origen="inicio";
  		$idiom=new idiomas();
  		$vista=new panel();
  		$vista->constructor($idiom,$origen);
  	}



?>