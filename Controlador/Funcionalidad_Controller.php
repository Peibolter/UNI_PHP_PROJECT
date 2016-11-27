<?php 

  include("../Modelos/Funcionalidad_Model.php");
  include("../Idiomas/idiomas.php");
  include("../Vistas/Funcionalidad_ADD_Vista.php");
  include("../Vistas/Funcionalidad_DELETE_Vista.php");
  include("../Vistas/Funcionalidad_SHOW_Vista.php");
  include("../Vistas/Funcionalidad_VIEW_Vista.php");
  include("../Vistas/Funcionalidad_EDIT_Vista.php");
  include("../Vistas/MenuPrincipal_SHOW_Vista.php");
  include ("../Modelos/Usuario_Model.php");
  include("../Modelos/Accion_Modelo.php");
  session_start();

  	if(isset($_POST['funcionalidad'])and isset($_SESSION['usuario']))
  		{
  			$idiom=new idiomas();
  			$vista=new Funcionalidad_Menu();
  			$vista->crear($idiom);
  		}

  		if(isset($_REQUEST['Alta'])and isset($_SESSION['usuario']))
      {
  			$idiom=new idiomas();
        $model=new Funcionalidad();
        $model->crearArrrayGrupo();
        include("../Archivos/ArrayGrupo_usuarios.php");
        $arrays=new consult45();
        $form=$arrays->array_consultar();
        $modeloaccion=new Accion();
        $modeloaccion->consultarAccion();
        include("../Archivos/ArrayConsultarAccion.php");
        $datos=new consult23();
        $formacciones=$datos->array_consultar();
  			$alta=new funcionalidadAlta();
  			$alta->crear($idiom,FALSE,$form,FALSE,$formacciones);
  		}

  		if (isset($_REQUEST['AltaFuncionalidad'])and isset($_SESSION['usuario']))
  		{
  			$idiom=new idiomas();
  			$nombrefuncionalidad=$_POST['Nombre'];
        $descripcion=$_POST['descripcion'];
        $model=new Funcionalidad();
        
        if(isset($_POST['grupo'])and isset($_POST['formacciones'])and isset($_SESSION['usuario'])){
           $grupo=$_POST['grupo'];
           $acciones=$_POST['formacciones']; 
  			$resultado=$model->comprobarexiste($nombrefuncionalidad);
  			if($resultado==FALSE)
  			{
        $origen="AltaFuncionalidad";
			  $model->altaFuncionalidad($nombrefuncionalidad,$descripcion);
        $model->insertargrupoFuncionalidad($nombrefuncionalidad,$grupo);
        $model->altaFuncionalidadAcciones($nombrefuncionalidad,$acciones);
        //actualizo los permisos conforme a las nuevas funcionalidades
        $model=new Usuario();
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
  			}else
  			{
        $model->crearArrrayGrupo();
        include("../Archivos/ArrayGrupo_usuarios.php");
        $arrays=new consult45();
        $form=$arrays->array_consultar();
        $modeloaccion=new Accion();
        $modeloaccion->consultarAccion();
        include("../Archivos/ArrayConsultarAccion.php");
        $datos=new consult23();
        $formacciones=$datos->array_consultar();
  			$alta=new funcionalidadAlta();
  			$alta->crear($idiom,TRUE,$form,FALSE,$formacciones);
  			}
        }
        else{
          $model->crearArrrayGrupo();
        include("../Archivos/ArrayGrupo_usuarios.php");
        $arrays=new consult45();
        $form=$arrays->array_consultar();
        $modeloaccion=new Accion();
        $modeloaccion->consultarAccion();
        include("../Archivos/ArrayConsultarAccion.php");
        $datos=new consult23();
        $formacciones=$datos->array_consultar();
        $alta=new funcionalidadAlta();
        $alta->crear($idiom,FALSE,$form,TRUE,$formacciones);
       
        }
      }

  		if (isset($_REQUEST['Consultar'])and isset($_SESSION['usuario']))
		{
        $origen="consultar";
			  $idiom=new idiomas();
			  $model=new Funcionalidad();
			  $model->ConsultarFuncionalidad();
  			include("../Archivos/ArrayConsultarFuncionalidad.php");
  			$arrays=new consult();
  			$form=$arrays->array_consultar();
  			$vistas=new Funcionalidad_SHOW();
  			$vistas->crear($form,$idiom,$origen);

		}
  		
  		if (isset($_POST['buscador']) and !isset($_REQUEST['ModificarView'])and isset($_SESSION['usuario']))
  			{
          $origen="consultar";
  			$idiom=new idiomas();
  			$name=$_POST['buscar'];
  			$model=new Funcionalidad();
  			$model->buscarFuncionalidad($name);
  			include("../Archivos/ArrayBuscarFuncionalidad.php");
  			$arrays=new buscar();
  			$form=$arrays->array_consultar();
  			$vistas=new Funcionalidad_SHOW();
  			$vistas->crear($form,$idiom,$origen);

	  		}

	  if (isset($_REQUEST['Modificar'])and isset($_SESSION['usuario']))
  		 {	  
          $origen="Modificar";
  				$idiom=new idiomas();
          $name=$_REQUEST['Modificar'];
          $model=new Funcionalidad();
          $model->crearArrrayFuncionalidad($name);
          include("../Archivos/ArrayFuncionalidad.php");
          $arrays=new consult();
          $form=$arrays->array_consultar();
          $model->crearArraGrupodeFuncionalidad($name);
          include("../Archivos/ArraGrupodeFuncionalidad.php");
          $arrays=new grupos1();
          $formgrupo=$arrays->array_consultar();
          $model->funcionalidadAcciones($name);
          include("../Archivos/ArrayFuncionalidadAcciones.php");
          $clase=new consult3();
          $formaccionesfunc=$clase->array_consultar();
  				$vista=new Funcionalidad_VIEW();
  				$vista->crear($form,$idiom,$origen,$formgrupo,$formaccionesfunc);
  		}
      if (isset($_REQUEST['Modificar1'])and isset($_SESSION['usuario']))
      {
          $origen="Modificar";
          $idiom=new idiomas();
          $model=new Funcionalidad();
          $model->consultarFuncionalidad();
          include("../Archivos/ArrayConsultarFuncionalidad.php");
          $arrays=new consult();
          $form=$arrays->array_consultar();
          $vista=new Funcionalidad_SHOW();
          $vista->crear($form,$idiom,$origen);
         }
      if(isset($_REQUEST['Modificar2'])and isset($_SESSION['usuario'])){
          $idiom=new idiomas();
          $origen="Modificar"; 
          $name=$_REQUEST['Modificar2'];
          $model=new Funcionalidad();
          $model2=new Accion();
          
          //crear array de acciones
          $model2->consultarAccion();
          include("../Archivos/ArrayConsultarAccion.php");
          $array=new consult23();
          $formacciones=$array->array_consultar();
          //acciones de la funcionalidad
          $model->funcionalidadAcciones($name);
          include("../Archivos/ArrayFuncionalidadAcciones.php");
          $clase=new consult3();
          $formaccionesfunc=$clase->array_consultar();

          //array de funcionalidad
           $model->crearArrrayFuncionalidad($name);
          include("../Archivos/ArrayFuncionalidad.php");
          $arrays=new consult();
          $form=$arrays->array_consultar();
          
          
          //crear array de grupos
          $model->crearArrrayGrupo();
          include("../Archivos/ArrayGrupo_usuarios.php");
          $arrays=new consult45();
          $formgrupo=$arrays->array_consultar();

          //cargo los grupos de la funcionalidad
          $model->crearArraGrupodeFuncionalidad($name);
          include("../Archivos/ArraGrupodeFuncionalidad.php");
          $arrayss=new grupos1();
          $formfuncionalidadgrupo=$arrayss->array_consultar();
          $vista=new funcionalidadEDIT();
          $vista->crear($idiom,$form,$formgrupo,$formfuncionalidadgrupo,TRUE,$formacciones,$formaccionesfunc);
      }
  		if (isset($_REQUEST['ModificarFuncionalidad'])and isset($_SESSION['usuario']))
  		{   
  			  $idiom=new idiomas();
  			  $name=$_POST['Nombre'];

          if(isset($_POST['grupo'])and isset($_POST['formacciones']))
          { 
          $origen="Modificar";
          $grupo=$_POST['grupo'];
          $acciones=$_POST['formacciones'];
          $descripcion=$_POST['descripcion'];
          $model=new Funcionalidad();
  				$model->modificarFuncionalidad($name,$descripcion);
          $model->modificarFuncionalidadGrupo($name,$grupo);
          $model->modificaFuncionalidadAccion($name,$acciones);
         //actualizo los permisos conforme a las nuevas funcionalidades
          //actualizar los permisos de las funcionalidades
          $model1=new Usuario();
          $user=$_SESSION['usuario'];
        $grupo=$model1->obtenergrupo($user);
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
          //actualizar los permisos de las funcionalidades
  				$vista=new panel();
          $vista->constructor($idiom,$origen);

          }else{
           $idiom=new idiomas();
          $model=new Funcionalidad();
          $model2=new Accion();
          
          //crear array de acciones
          $model2->consultarAccion();
          include("../Archivos/ArrayConsultarAccion.php");
          $array=new consult23();
          $formacciones=$array->array_consultar();
          //acciones de la funcionalidad
          $model->funcionalidadAcciones($name);
          include("../Archivos/ArrayFuncionalidadAcciones.php");
          $clase=new consult3();
          $formaccionesfunc=$clase->array_consultar();

          //array de funcionalidad
           $model->crearArrrayFuncionalidad($name);
          include("../Archivos/ArrayFuncionalidad.php");
          $arrays=new consult();
          $form=$arrays->array_consultar();
          
          
          //crear array de grupos
          $model->crearArrrayGrupo();
          include("../Archivos/ArrayGrupo_usuarios.php");
          $arrays=new consult45();
          $formgrupo=$arrays->array_consultar();

          //cargo los grupos de la funcionalidad
          $model->crearArraGrupodeFuncionalidad($name);
          include("../Archivos/ArraGrupodeFuncionalidad.php");
          $arrayss=new grupos1();
          $formfuncionalidadgrupo=$arrayss->array_consultar();
          $vista=new funcionalidadEDIT();
          
          $vista->crear($idiom,$form,$formgrupo,$formfuncionalidadgrupo,FALSE,$formacciones,$formaccionesfunc);                
              }
  			}

  		if(isset($_REQUEST['Baja'])and isset($_SESSION['usuario']))
      {
          $idiom=new idiomas();
          $model=new Funcionalidad();
          $model->ConsultarFuncionalidad();
          include("../Archivos/ArrayConsultarFuncionalidad.php");
          $arrays=new consult();
          $form=$arrays->array_consultar();
  				$vista=new FuncionalidadDelete();
  				$vista->crear($idiom,TRUE,$form);

  		}
  		 if (isset($_REQUEST['BajaFuncionalidad'])and isset($_SESSION['usuario']))
  			{
        $origen="Baja";
  			$idiom=new idiomas();
  			$name=$_REQUEST['BajaFuncionalidad'];
  			$model=new Funcionalidad();
  			$model->BajaFuncionalidad($name);
        $model->eliminarfungrupo($name);
        $model->eliminarfunaccion($name);
        $vista=new panel();
        $vista->constructor($idiom,$origen);
  			}
        
        if(isset($_REQUEST['View'])and isset($_SESSION['usuario']))
        {  
          $origen="consultar";
          $idiom=new idiomas();
          $name=$_REQUEST['View'];
          $model=new Funcionalidad();
          $model->crearArrrayFuncionalidad($name);
          include("../Archivos/ArrayFuncionalidad.php");
          $arrays=new consult();
          $form=$arrays->array_consultar();
          $model->crearArraGrupodeFuncionalidad($name);
          include("../Archivos/ArraGrupodeFuncionalidad.php");
          $arrays=new grupos1();
          $formgrupo=$arrays->array_consultar();
          $model->funcionalidadAcciones($name);
          include("../Archivos/ArrayFuncionalidadAcciones.php");
          $clase=new consult3();
          $formaccionesfunc=$clase->array_consultar();
          $vistas=new Funcionalidad_VIEW();
          $vistas->crear($form,$idiom,$origen,$formgrupo,$formaccionesfunc);
        }
        if(isset($_REQUEST['BajaShow'])and isset($_SESSION['usuario']))
        {  
          $origen="Baja";
          $idiom=new idiomas();
          $name=$_POST['buscar'];
          $model=new Funcionalidad();
          $model->buscarFuncionalidad($name);
          include("../Archivos/ArrayBuscarFuncionalidad.php");
          $arrays=new buscar();
          $form=$arrays->array_consultar();
          $vistas=new funcionalidadDelete();
          $vistas->crear($idiom,TRUE,$form);
        }
         if(isset($_REQUEST['BajaShow1'])and isset($_SESSION['usuario']))
         {
          $origen="Baja";
          $idiom=new idiomas();
          $name=$_REQUEST['BajaShow1'];
          $model=new Funcionalidad();
          $model->crearArrrayFuncionalidad($name);
          include("../Archivos/ArrayFuncionalidad.php");
          $arrays=new consult();
          $form=$arrays->array_consultar();
          include("../Archivos/ArraGrupodeFuncionalidad.php");
          $arrays=new grupos1();
          $formgrupo=$arrays->array_consultar();
          $model->funcionalidadAcciones($name);
          include("../Archivos/ArrayFuncionalidadAcciones.php");
          $clase=new consult3();
          $formaccionesfunc=$clase->array_consultar();
          $vistas=new Funcionalidad_VIEW();
          $vistas->crear($form,$idiom,$origen,$formgrupo,$formaccionesfunc);
         }
        if(isset($_REQUEST['ModificarView'])and isset($_SESSION['usuario']))
      {
        $origen="Modificar";
        $idiom=new idiomas();
        $name=$_POST['buscar'];
        $model=new Funcionalidad();
        $model->buscarFuncionalidad($name);
        include("../Archivos/ArrayBuscarFuncionalidad.php");
        $arrays=new buscar();
        $form=$arrays->array_consultar();
        $model->crearArraGrupodeFuncionalidad($name);
        include("../Archivos/ArraGrupodeFuncionalidad.php");
        $arrays=new grupos1();
        $formgrupo=$arrays->array_consultar();
        $vistas=new Funcionalidad_Show();
        $vistas->crear($form,$idiom,$origen,$formgrupo);
      }
  			if (isset($_REQUEST['Volver'])and isset($_SESSION['usuario']))
  			{
          $origen="volver";
        $idiom=new idiomas();
        $vista=new panel();
        $vista->constructor($idiom,$origen);
  			}
        if(!isset($_SESSION['usuario'])){
          session_destroy();
          echo"<script>window.location=\"../index.php\"</script>";
        }

  		
?>