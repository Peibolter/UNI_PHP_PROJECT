<?php 

  include("../Modelos/Accion_Modelo.php");
  include("../Idiomas/idiomas.php");
  include("../Vistas/Accion_ADD_Vista.php");
  include("../Vistas/Accion_DELETE_Vista.php");
  include("../Vistas/Accion_SHOW_Vista.php");
  include("../Vistas/Accion_VIEW_Vista.php");
  include("../Vistas/Accion_EDIT_Vista.php");
  include("../Vistas/MenuPrincipal_SHOW_Vista.php");
session_start();

  	

		//viene del menu principal vista
  		if(isset($_REQUEST['Alta'])and isset($_SESSION['usuario'])){
  			
  		$idiom=new idiomas();
        $model=new Accion();
        $model->consultarAccion();
        include("../Archivos/ArrayConsultarAccion.php");
        $datos=new consult23();
        $form=$datos->array_consultar();
        $alta=new AccionAlta();
  			$alta->crear($idiom,TRUE,$form,FALSE);

  		}
  		//viene de la vista alta de acciones
  		if (isset($_REQUEST['AltaAccion'])and isset($_SESSION['usuario']))
  		{
  			$idiom=new idiomas();
  			$nombreAccion=$_POST['Nombre'];
        $descripcion=$_POST['descripcion'];
  			$model=new Accion();
  			$resultado=$model->comprobarexiste($nombreAccion);
  			if($resultado==FALSE)
  			{
			  $model->altaAccion($nombreAccion,$descripcion);
        $origen="Alta";
  			$vista=new panel();
        $vista->constructor($idiom,$origen);
  			}else
  			{
        $model=new Accion();
        $model->consultarAccion();
        include("../Archivos/ArrayConsultarAccion.php");
        $datos=new consult23();
        $form=$datos->array_consultar();
  			$alta=new AccionAlta();
  			$alta->crear($idiom,FALSE,$form,FALSE);
  			}		
  		}
  		if (isset($_REQUEST['Consultar'])and isset($_SESSION['usuario']))
		{
        		$origen="consultar";
			   $idiom=new idiomas();
			   $model=new Accion();
			   $model->ConsultarAccion();
  			include("../Archivos/ArrayConsultarAccion.php");
  			$arrays=new consult23();
  			$form=$arrays->array_consultar();
  			$vistas=new Accion_SHOW();
  			$vistas->crear($form,$idiom,$origen);

		}
  		
  		//viene del buscado de la vista show
  		if (isset($_POST['buscador']) and !isset($_REQUEST['ModificarView'])and isset($_SESSION['usuario']))
  			{
        $origen="consultar";
  			$idiom=new idiomas();
  			$name=$_POST['buscar'];
  			$model=new Accion();
  			$model->buscarAccion($name);
  			include("../Archivos/ArrayBuscarAccion.php");
  			$arrays=new buscar();
  			$form=$arrays->array_consultar();
  			$vistas=new Accion_SHOW();
  			$vistas->crear($form,$idiom,$origen);

	  		}

	  		//viene del menu principal
    if (isset($_REQUEST['Modificar1'])and isset($_SESSION['usuario'])){
          $origen="Modificar";
          $idiom=new idiomas();
          $model=new Accion();
          $model->ConsultarAccion();
          include("../Archivos/ArrayConsultarAccion.php");
          $arrays=new consult23();
          $form=$arrays->array_consultar();
          $vista=new Accion_SHOW();
          $vista->crear($form,$idiom,$origen);
        }
        //viene de la vista show
	  if (isset($_REQUEST['Modificar'])and isset($_SESSION['usuario']))
  		{	
          $origen="Modificar";
  				$idiom=new idiomas();
          $model=new Accion();
          $nombre=$_REQUEST['Modificar'];
          $model->buscarAccion($nombre);
          include("../Archivos/ArrayBuscarAccion.php");
          $arrays=new buscar();
          $form=$arrays->array_consultar();
          $vistas=new Accion_VIEW();
          $vistas->crear($form,$idiom,$origen);
  		}
  		//viene de la vista view
       if(isset($_REQUEST['Modificar2'])and isset($_SESSION['usuario'])){
          $idiom=new idiomas();
          $origen="Modificar"; 
          $name=$_REQUEST['Modificar2'];
          $model=new Accion();
          $model->consultarAccion();
          include("../Archivos/ArrayConsultarAccion.php");
          $datos=new consult23();
          $form=$datos->array_consultar();
          $vista=new AccionEDIT();
          $vista->crear($idiom,$name,$form,TRUE);
      }
      //viene de la vista de view con los datos del formulario
  		if (isset($_REQUEST['ModificarAccion'])and isset($_SESSION['usuario']))
  		{
       		$origen="Modificar";
  			$idiom=new idiomas();
  			$name=$_POST['Nombre'];
  			$descripcion=$_POST['descripcion'];
  			$model=new Accion();
  			$model->modificarAccion($name,$descripcion);
  			$vista=new panel();
          $vista->constructor($idiom,$origen);
  		}
  		//viene de la vista principal
  		if(isset($_REQUEST['Baja'])and isset($_SESSION['usuario'])){

  				$idiom=new idiomas();
            $model=new Accion();
            $model->ConsultarAccion();
          include("../Archivos/ArrayConsultarAccion.php");
          $arrays=new consult23();
          $form=$arrays->array_consultar();
  				$vista=new AccionDelete();
  				$vista->crear($idiom,TRUE,$form);
  		}
  		//viene de la vista de baja de accion
  		 if (isset($_REQUEST['BajaAccion'])and isset($_SESSION['usuario']))
  			{
        $origen="Baja";
  			$idiom=new idiomas();
  			$name=$_REQUEST['BajaAccion'];
  			$model=new Accion();
  			$resultado=$model->comprobarexiste($name);
  			$model->BajaAccion($name);
  			$vista=new panel();
        $vista->constructor($idiom,$origen);
  			}
  			//viene de la vista de consultar pinchando en ver
         if(isset($_REQUEST['View'])and isset($_SESSION['usuario']))
        {  
          $origen="consultar";
          $idiom=new idiomas();
          $name=$_REQUEST['View'];
          $model=new Accion();
          $model->crearArrrayAccion($name);
          include("../Archivos/ArrayAccion.php");
          $arrays=new consult();
          $form=$arrays->array_consultar();
          $vistas=new Accion_VIEW();
          $vistas->crear($form,$idiom,$origen);
        }
        //viene de la vista 
          if(isset($_REQUEST['BajaShow'])and isset($_SESSION['usuario']))
        {  
          $origen="Baja";
          $idiom=new idiomas();
          $name=$_POST['buscar'];
          $model=new Accion();
          $model->buscarAccion($name);
          include("../Archivos/ArrayBuscarAccion.php");
          $arrays=new buscar();
          $form=$arrays->array_consultar();
          $vistas=new AccionDelete();
          $vistas->crear($idiom,TRUE,$form);
        }

          if(isset($_REQUEST['BajaShow1'])and isset($_SESSION['usuario']))
         {

          $origen="Baja";
          $idiom=new idiomas();
          $name=$_REQUEST['BajaShow1'];
          $model=new Accion();
          $model->buscarAccion($name);
          include("../Archivos/ArrayBuscarAccion.php");
          $arrays=new buscar();
          $form=$arrays->array_consultar();
          $vistas=new Accion_VIEW();
          $vistas->crear($form,$idiom,$origen);
         }
        if(isset($_REQUEST['ModificarView'])and isset($_SESSION['usuario']))
      {
        $origen="Modificar";
        $idiom=new idiomas();
        $name=$_POST['buscar'];
        $model=new Accion();
        $model->buscarAccion($name);
        include("../Archivos/ArrayBuscarAccion.php");
        $arrays=new buscar();
        $form=$arrays->array_consultar();
        $vistas=new Accion_SHOW();
        $vistas->crear($form,$idiom,$origen);
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