<?php 

  include("../Modelos/Inscripcion_Model.php");
  include("../Idiomas/idiomas.php");
  include("../Vistas/Inscripcion_ADD_Vista.php");
  include("../Vistas/Inscripcion_DELETE_Vista.php");
  include("../Vistas/Inscripcion_SHOW_Vista.php");
  include("../Vistas/Inscripcion_VIEW_Vista.php");
  include("../Vistas/Inscripcion_EDIT_Vista.php");
  include("../Vistas/MenuPrincipal_SHOW_Vista.php");
  include("../Modelos/Funcionalidad_Model.php");
  session_start();

  	if(isset($_REQUEST['inscripciones']))
  		{
  			$idiom=new idiomas();
  			$vista=new Inscripciones_Menu();
  			$vista->crear($idiom);
  		}
  		if(isset($_REQUEST['Alta']))
      {
  		  $idiom=new idiomas();
  		  $alta=new InscripcionAlta();
        $model=new Inscripcion();
        $model->crearArrrayActividades();
        $model->crearArrayAlumnos();
        $model->crearArrayEventos();
        include("../Archivos/ArrayGrupo_usuarios.php");
        include("../Archivos/ArrayAlumnos.php");
        include("../Archivos/ArrayEventos.php");
        $arrays=new consult();
        $form=$arrays->array_consultar();
        $arraysalumnos = new consultAlumno();
        $formAlum=$arraysalumnos->array_consultar();
        $arrayseventos= new consultEvento();
        $formEvent = $arrayseventos->array_consultar();
  			$alta->crear($idiom,TRUE,$form, $formAlum, $formEvent, null);
  		}
  		if (isset($_REQUEST['AltaInscripcion']))
  		{ 
  			$idiom=new idiomas();
        $alumno=$_POST['Alumno'];
        $actividad=$_POST['Actividad'];
        $evento=$_POST['Evento'];
        $fecha=$_POST['Fecha'];
        $forma_pago=$_POST['Forma_pago'];
        $tiempo_pago=$_POST['Tiempo_pago'];
        $origen="Alta";
        $model=new Inscripcion();
        $usuario=$model->getIdUser($_SESSION['usuario']);
        echo $actividad;
			  $model->altaInscripcion($usuario,$alumno,$actividad,$evento,$fecha,$forma_pago,$tiempo_pago);
          	/*//actualizo los permisos conforme a las nuevas funcionalidades
        
        $grupo=$model->obtenergrupo($usuario);
        $modelfunc=new funcionalidad();
        $modelfunc->crearArraFuncionalidades($grupo);
        include("../Archivos/ArrayFuncionalidadesDeGrupo.php");
        $datos=new grupos1();
        $form=$datos->array_consultar();
        $funcionalidades[]="";
         for($numar=0;$numar<count($form);$numar++)
        {
          $funcionalidades[]=$form[$numar]["funcionalidad"];
        } 
        $modelfunc->accionesdeFuncionalidades($funcionalidades);*/
        $vista=new panel();
        $vista->constructor($idiom,$origen);
  			
        }
        
  		
  		if (isset($_REQUEST['Consultar']))
		 {  
        $origen="consultar";
			  $idiom=new idiomas();
			  $model=new Inscripcion();
			  $model->creararrayInscripciones();
  			include("../Archivos/ArrayConsultarInscripciones.php");
  			$arrays=new consult();
  			$form=$arrays->array_consultar();
  			$vistas=new Inscripcion_SHOW();
  			$vistas->crear($form,$idiom,$origen);
		}
  		if (isset($_POST['buscador']) and !isset($_REQUEST['ModificarView']))
  		
      	{
        $origen="consultar";
  			$idiom=new idiomas();
  			$name=$_POST['buscar'];
  			$model=new Inscripcion();
  			$model->buscarInscripcion($name);
  			include("../Archivos/ArrayBuscarInscripcion.php");
  			$arrays=new buscar();
  			$form=$arrays->array_consultar();
  			$vistas=new Inscripcion_SHOW();
  			$vistas->crear($form,$idiom,$origen);
	  		}

        if (isset($_REQUEST['Modificar1']))
        { 
        $idiom=new idiomas();
        $origen="Modificar";
        $model=new Inscripcion();
        $model->creararrayInscripciones();
        include("../Archivos/ArrayConsultarInscripciones.php");
        $arrays=new consult();
        $form=$arrays->array_consultar();
        $vistas=new Inscripcion_SHOW();
        $vistas->crear($form,$idiom,$origen);
        }

	  if (isset($_REQUEST['Modificar']))
  		{	
          $origen="Modificar";
  			  $idiom=new idiomas();
          $usuario=$_REQUEST['Modificar'];
          $model=new Inscripcion();
          $model->crearArrrayInscripcion($usuario);
          include("../Archivos/ArrayInscripciones.php");
          $arrays=new consult();
          $form=$arrays->array_consultar();
          $vistas=new Inscripcion_VIEW();
          $vistas->crear($form,$idiom,$origen);

  		}
      if(isset($_REQUEST['Modificar2']))
      {   
          $idiom=new idiomas();
          $origen="Modificar"; 
          $insc=$_REQUEST['Modificar2'];
          $vista=new InscripcionEDIT();
          $model=new Inscripcion();

          include("../Archivos/ArrayConsultaInscripcion.php");
          $model->crearArrayInscripcion($insc);
          $arrayInsc = new consultInscripcion();
          $formInsc = $arrayInsc->array_consultar();
          $model->crearArrrayActividades();
          $model->crearArrayAlumnos();
          $model->crearArrayEventos();
          include("../Archivos/ArrayGrupo_usuarios.php");
          include("../Archivos/ArrayAlumnos.php");
          include("../Archivos/ArrayEventos.php");
          $arrays=new consult();
          $form=$arrays->array_consultar();
          $arraysalumnos = new consultAlumno();
          $formAlum=$arraysalumnos->array_consultar();
          $arrayseventos= new consultEvento();
          $formEvent = $arrayseventos->array_consultar();
          
          $vista->crear($idiom, $formInsc, $formAlum, $formEvent, TRUE,$form,$insc,null);
      }
  		if (isset($_REQUEST['ModificarInscripcion']))
  		{
        $msg="";
  			$idiom=new idiomas();
        $insc=$_REQUEST['ModificarInscripcion'];
        $alumno=$_POST['Alumno'];
        $actividad=$_POST['Actividad'];
        $evento=$_POST['Evento'];
        $fecha=$_POST['Fecha'];
        $forma_pago=$_POST['Forma_pago'];
        $tiempo_pago=$_POST['Tiempo_pago'];
        $model=new Inscripcion();
        $usuario=$model->getIdUser($_SESSION['usuario']);
        $resultado=$model->comprobarinscripciones($insc);
        if($resultado==TRUE)
        { 

          $origen="Modificar";
          $model->modificarInscripcion($insc,$usuario,$alumno,$actividad,$evento,$fecha,$forma_pago,$tiempo_pago);
        $model=new Inscripcion();
        $user=$_SESSION['usuario'];
        $grupo=$model->obtenergrupo($user);
        $modelfunc=new funcionalidad();
        $modelfunc->crearArraFuncionalidades($grupo);
        include("../Archivos/ArrayFuncionalidadesDeGrupo.php");
        $datos=new grupos1();
        $form=$datos->array_consultar();
        $funcionalidades[]="";
         for($numar=0;$numar<count($form);$numar++)
        {
          $funcionalidades[]=$form[$numar]["funcionalidad"];
        } 
        $modelfunc->accionesdeFuncionalidades($funcionalidades);

  				$idiom=new idiomas();
  				 $vista=new panel();
          $vista->constructor($idiom,$origen);
  			}else{
			   	$idiom=new idiomas();
  				$vista=new InscripcionEDIT();
          $model=new Inscripcion();
         //$model->crearArrrayGrupo();
         include("../Archivos/ArrayGrupo_usuarios.php");
         $arrays=new consult();
         $form=$arrays->array_consultar();
  				$vista->crear($idiom, $formInsc, FALSE ,$form,$insc,null);
  			}
        }
  		
      if(isset($_REQUEST['ModificarView']))
      {
        $origen="Modificar";
        $idiom=new idiomas();
        $name=$_POST['buscar'];
        $model=new Inscripcion();
        $model->buscarInscripcion($name);
        include("../Archivos/ArrayBuscarInscripcion.php");
        $arrays=new buscar();
        $form=$arrays->array_consultar();
        $vistas=new Inscripcion_SHOW();
        $vistas->crear($form,$idiom,$origen);
      }
  		if(isset($_REQUEST['Baja'])){

  				$idiom=new idiomas();
          $model=new Inscripcion();
          $model->creararrayInscripciones();
          include("../Archivos/ArrayConsultarInscripciones.php");
          $arrays=new consult();
          $form=$arrays->array_consultar();
  				$vista=new InscripcionDelete();
  				$vista->crear($idiom,TRUE,$form);

  		}
  		 if (isset($_REQUEST['BajaInscripcion']))
  			{

  			$idiom=new idiomas();
  			$insc=$_REQUEST['BajaInscripcion'];
  			$model=new Inscripcion();
  			$resultado=$model->comprobarinscripciones($insc);
  			if($resultado==TRUE){
          $origen="Baja";
  				$model->eliminarInscripcion($insc);
  				$idiom=new idiomas();
  				$vista=new panel();
  				$vista->constructor($idiom,$origen);
  			}else{
				$idiom=new idiomas();
          $model->creararrayInscripcions();
        include("../Archivos/ArrayConsultarInscripcions.php");
        $arrays=new consult();
        $form=$arrays->array_consultar();
  				$vista=new InscripcionDelete();
  				$vista->crear($idiom,FALSE,$form);
  			}
  			}
        
        if (isset($_REQUEST['BajaShow']))
        {

        $idiom=new idiomas();
        $name=$_POST['buscar'];
        $model=new Inscripcion();
        $model->buscarInscripcion($name);
        include("../Archivos/ArrayBuscarInscripcion.php");
        $arrays=new buscar();
        $form=$arrays->array_consultar();
        $vista=new InscripcionDelete();
        $vista->crear($idiom,TRUE,$form);

        }
        if(isset($_REQUEST['View']))
        {  
          $origen="consultar";
          $idiom=new idiomas();
          $insc=$_REQUEST['View'];
          $model=new Inscripcion();
          $model->crearArrrayInscripcion($insc);
          include("../Archivos/ArrayInscripciones.php");
          $arrays=new consult();
          $form=$arrays->array_consultar();
          $vistas=new Inscripcion_VIEW();
          $vistas->crear($form,$idiom,$origen);
        }
        if(isset($_REQUEST['ViewBaja']))
        { 

          $origen="Baja";
          $idiom=new idiomas();
          $insc=$_REQUEST['ViewBaja'];
          $model=new Inscripcion();
          $model->crearArrrayInscripcion($insc);
          include("../Archivos/ArrayInscripciones.php");
          $arrays=new consult();
          $form=$arrays->array_consultar();
          $vistas=new Inscripcion_VIEW();
          $vistas->crear($form,$idiom,$origen);
           }
  			if (isset($_REQUEST['Volver']))
  			{
          $origen="inicio";
  			$idiom=new idiomas();
  			$vista=new panel();
  			$vista->constructor($idiom,$origen);
  			}
        if(!isset($_SESSION['usuario'])){
          session_destroy();
          echo"<script>window.location=\"../index.php\"</script>";
        }

  		
?>