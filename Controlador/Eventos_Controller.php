<?php 

  include("../Modelos/Eventos_Model.php");
  include("../Idiomas/idiomas.php");
  include("../Vistas/Eventos_ADD_Vista.php");
  include("../Vistas/Eventos_DELETE_Vista.php");
  include("../Vistas/Eventos_SHOW_Vista.php");
  include("../Vistas/Eventos_VIEW_Vista.php");
  include("../Vistas/Eventos_EDIT_Vista.php");
  include("../Vistas/MenuPrincipal_SHOW_Vista.php");
session_start();

  	

		//viene del menu principal vista
  		if(isset($_REQUEST['Alta'])and isset($_SESSION['usuario'])){
  			
  		$idiom=new idiomas();
        $model=new Eventos();
        $model->consultarEventos();
        include("../Archivos/ArrayConsultarEventos.php");
        $datos=new consult23();
        $form=$datos->array_consultar();
        $alta=new EventosAlta();
  			$alta->crear($idiom,TRUE,$form,FALSE);

  		}
  		//viene de la vista alta de acciones
  		if (isset($_REQUEST['AltaEventos'])and isset($_SESSION['usuario']))
  		{
  			$idiom=new idiomas();
  			$nombre=$_POST['Nombre'];
            $usuario=$_POST['usuario'];
			$espacio=$_POST['espacio'];
  			$model=new Eventos();
  			$resultado=$model->comprobarexiste($nombre);
  			if($resultado==FALSE)
  			{
			  $model->altaEventos($nombre,$usuario,$espacio);
			$origen="Alta";
  			$vista=new panel();
			$vista->constructor($idiom,$origen);
  			}else
  			{
        $model=new Eventos();
        $model->consultarEventos();
        include("../Archivos/ArrayConsultarEventos.php");
        $datos=new consult23();
        $form=$datos->array_consultar();
  			$alta=new EventosAlta();
  			$alta->crear($idiom,FALSE,$form,FALSE);
  			}		
  		}
		
		
  		if (isset($_REQUEST['Consultar'])and isset($_SESSION['usuario']))
		{
        		$origen="consultar";
			   $idiom=new idiomas();
			   $model=new Eventos();
			   $model->ConsultarEventos();
  			include("../Archivos/ArrayConsultarEventos.php");
  			$arrays=new consult23();
  			$form=$arrays->array_consultar();
  			$vistas=new Eventos_SHOW();
  			$vistas->crear($form,$idiom,$origen);

		}
  		
  		//viene del buscado de la vista show
  		if (isset($_POST['buscador']) and !isset($_REQUEST['ModificarView'])and isset($_SESSION['usuario']))
  			{
        $origen="consultar";
  			$idiom=new idiomas();
  			$name=$_POST['buscar'];
  			$model=new Eventos();
  			$model->buscarEventos($name);
  			include("../Archivos/ArrayBuscarEventos.php");
  			$arrays=new buscar();
  			$form=$arrays->array_consultar();
  			$vistas=new Eventos_SHOW();
  			$vistas->crear($form,$idiom,$origen);

	  		}

	  		//viene del menu principal
    if (isset($_REQUEST['Modificar1'])and isset($_SESSION['usuario'])){
          $origen="Modificar";
          $idiom=new idiomas();
          $model=new Eventos();
          $model->ConsultarEventos();
          include("../Archivos/ArrayConsultarEventos.php");
          $arrays=new consult23();
          $form=$arrays->array_consultar();
          $vista=new Eventos_SHOW();
          $vista->crear($form,$idiom,$origen);
        }
        //viene de la vista show
	  if (isset($_REQUEST['Modificar'])and isset($_SESSION['usuario']))
  		{	
          $origen="Modificar";
  				$idiom=new idiomas();
          $model=new Eventos();
          $nombre=$_REQUEST['Modificar'];
          $model->buscarEventos($nombre);
          include("../Archivos/ArrayBuscarEventos.php");
          $arrays=new buscar();
          $form=$arrays->array_consultar();
          $vistas=new Eventos_VIEW();
          $vistas->crear($form,$idiom,$origen);
  		}
  		//viene de la vista view
       if(isset($_REQUEST['Modificar2'])and isset($_SESSION['usuario'])){
          $idiom=new idiomas();
          $origen="Modificar"; 
          $name=$_REQUEST['Modificar2'];
          $model=new Eventos();
          $model->consultarEventos();
          include("../Archivos/ArrayConsultarEventos.php");
          $datos=new consult23();
          $form=$datos->array_consultar();
          $vista=new EventosEDIT();
          $vista->crear($idiom,$name,$form,TRUE);
      }
      //viene de la vista de view con los datos del formulario
  		if (isset($_REQUEST['ModificarEventos'])and isset($_SESSION['usuario']))
  		{
       		$origen="Modificar";
  			$idiom=new idiomas();
  			$name=$_POST['Nombre'];
  			$usuario=$_POST['usuario'];
			$espacio=$_POST['espacio'];
  			$model=new Eventos();
  			$model->modificarEventos($name,$usuario,$espacio);
  			$vista=new panel();
          $vista->constructor($idiom,$origen);
  		}
  		//viene de la vista principal
  		if(isset($_REQUEST['Baja'])and isset($_SESSION['usuario'])){

  				$idiom=new idiomas();
            $model=new Eventos();
            $model->ConsultarEventos();
          include("../Archivos/ArrayConsultarEventos.php");
          $arrays=new consult23();
          $form=$arrays->array_consultar();
  				$vista=new EventosDelete();
  				$vista->crear($idiom,TRUE,$form);
  		}
  		//viene de la vista de baja de accion
  		 if (isset($_REQUEST['BajaEventos'])and isset($_SESSION['usuario']))
  			{
        $origen="Baja";
  			$idiom=new idiomas();
  			$name=$_REQUEST['BajaEventos'];
  			$model=new Eventos();
  			$resultado=$model->comprobarexiste($name);
  			$model->BajaEventos($name);
  			$vista=new panel();
        $vista->constructor($idiom,$origen);
  			}
  			//viene de la vista de consultar pinchando en ver
         if(isset($_REQUEST['View'])and isset($_SESSION['usuario']))
        {  
          $origen="consultar";
          $idiom=new idiomas();
          $name=$_REQUEST['View'];
          $model=new Eventos();
          $model->crearArrayEventos($name);
          include("../Archivos/ArrayEventos.php");
          $arrays=new consult();
          $form=$arrays->array_consultar();
          $vistas=new Eventos_VIEW();
          $vistas->crear($form,$idiom,$origen);
        }
        //viene de la vista 
          if(isset($_REQUEST['BajaShow'])and isset($_SESSION['usuario']))
        {  
          $origen="Baja";
          $idiom=new idiomas();
          $name=$_POST['buscar'];
          $model=new Eventos();
          $model->buscarEventos($name);
          include("../Archivos/ArrayBuscarEventos.php");
          $arrays=new buscar();
          $form=$arrays->array_consultar();
          $vistas=new EventosDelete();
          $vistas->crear($idiom,TRUE,$form);
        }

          if(isset($_REQUEST['BajaShow1'])and isset($_SESSION['usuario']))
         {

          $origen="Baja";
          $idiom=new idiomas();
          $name=$_REQUEST['BajaShow1'];
          $model=new Eventos();
          $model->buscarEventos($name);
          include("../Archivos/ArrayBuscarEventos.php");
          $arrays=new buscar();
          $form=$arrays->array_consultar();
          $vistas=new Eventos_VIEW();
          $vistas->crear($form,$idiom,$origen);
         }
        if(isset($_REQUEST['ModificarView'])and isset($_SESSION['usuario']))
      {
        $origen="Modificar";
        $idiom=new idiomas();
        $name=$_POST['buscar'];
        $model=new Eventos();
        $model->buscarEventos($name);
        include("../Archivos/ArrayBuscarEventos.php");
        $arrays=new buscar();
        $form=$arrays->array_consultar();
        $vistas=new Eventos_SHOW();
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