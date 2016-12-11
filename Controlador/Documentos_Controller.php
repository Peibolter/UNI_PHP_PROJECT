<?php 

  include("../Modelos/Documentos_Model.php");
  include("../Idiomas/idiomas.php");
  include("../Vistas/Documentos_ADD_Vista.php");
  include("../Vistas/Documentos_DELETE_Vista.php");
  include("../Vistas/Documentos_SHOW_Vista.php");
  include("../Vistas/Documentos_VIEW_Vista.php");
  include("../Vistas/Documentos_EDIT_Vista.php");
  include("../Vistas/MenuPrincipal_SHOW_Vista.php");
session_start();

  	

		//viene del menu principal vista
  		if(isset($_REQUEST['Alta'])and isset($_SESSION['usuario'])){
  			
  		$idiom=new idiomas();
        $model=new Documentos();
        $model->consultarDocumentos();
        include("../Archivos/ArrayConsultarEventos.php");
        $datos=new consult23();
        $form=$datos->array_consultar();
        $alta=new DocumentosAlta();
  			$alta->crear($idiom,TRUE,$form,FALSE);

  		}
  		//viene de la vista alta de acciones
  		if (isset($_REQUEST['AltaDocumentos'])and isset($_SESSION['usuario']))
  		{
  			$idiom=new idiomas();
  			$nombre=$_POST['Nombre'];
            $documento=$_POST['documento'];
  			$model=new Documentos();

			$model->altaDocumentos($nombre,$documento);
			$origen="Alta";
  			$vista=new panel();
			$vista->constructor($idiom,$origen);
  					
  		}
		
		
  		if (isset($_REQUEST['Consultar'])and isset($_SESSION['usuario']))
		{
        		$origen="consultar";
			   $idiom=new idiomas();
			   $model=new Documentos();
			   $model->ConsultarDocumentos();
  			include("../Archivos/ArrayConsultarDocumentos.php");
  			$arrays=new consult23();
  			$form=$arrays->array_consultar();
  			$vistas=new Documentos_SHOW();
  			$vistas->crear($form,$idiom,$origen);

		}
  		
  		//viene del buscado de la vista show
  		if (isset($_POST['buscador']) and !isset($_REQUEST['ModificarView'])and isset($_SESSION['usuario']))
  			{
        $origen="consultar";
  			$idiom=new idiomas();
  			$usuario=$_POST['buscar'];
  			$model=new Documentos();
  			$model->buscarDocumentos($usuario);
  			include("../Archivos/ArrayBuscarDocumentos.php");
  			$arrays=new buscar();
  			$form=$arrays->array_consultar();
  			$vistas=new Documentos_SHOW();
  			$vistas->crear($form,$idiom,$origen);

	  		}

	  		//viene del menu principal
    if (isset($_REQUEST['Modificar1'])and isset($_SESSION['usuario'])){
          $origen="Modificar";
          $idiom=new idiomas();
          $model=new Documentos();
          $model->ConsultarDocumentos();
          include("../Archivos/ArrayConsultarDocumentos.php");
          $arrays=new consult23();
          $form=$arrays->array_consultar();
          $vista=new Documentos_SHOW();
          $vista->crear($form,$idiom,$origen);
        }
        //viene de la vista show
	  if (isset($_REQUEST['Modificar'])and isset($_SESSION['usuario']))
  		{	
          $origen="Modificar";
		  $idiom=new idiomas();
          $model=new Documentos();
          $usuario=$_REQUEST['Modificar'];
          $model->buscarDocumentos($usuario);
          include("../Archivos/ArrayBuscarDocumentos.php");
          $arrays=new buscar();
          $form=$arrays->array_consultar();
          $vistas=new Documentos_VIEW();
          $vistas->crear($form,$idiom,$origen);
  		}
  		//viene de la vista view
       if(isset($_REQUEST['Modificar2'])and isset($_SESSION['usuario'])){
          $idiom=new idiomas();
          $origen="Modificar"; 
          $name=$_REQUEST['Modificar2'];
          $model=new Documentos();
          $model->consultarDocumentos();
          include("../Archivos/ArrayConsultarDocumentos.php");
          $datos=new consult23();
          $form=$datos->array_consultar();
          $vista=new DocumentosEDIT();
          $vista->crear($idiom,$name,$form,TRUE);
      }
      //viene de la vista de view con los datos del formulario
  		if (isset($_REQUEST['ModificarDocumentos'])and isset($_SESSION['usuario']))
  		{
       		$origen="Modificar";
  			$idiom=new idiomas();
  			$name=$_POST['Nombre'];
  			$documento=$_POST['documento'];
  			$model=new Documentos();
  			$model->modificarDocumentos($name,$documento);
  			$vista=new panel();
          $vista->constructor($idiom,$origen);
  		}
  		//viene de la vista principal
  		if(isset($_REQUEST['Baja'])and isset($_SESSION['usuario'])){

  				$idiom=new idiomas();
				$model=new Documentos();
				$model->ConsultarDocumentos();
				include("../Archivos/ArrayConsultarDocumentos.php");
				$arrays=new consult23();
				$form=$arrays->array_consultar();
  				$vista=new DocumentosDelete();
  				$vista->crear($idiom,TRUE,$form);
  		}
  		//viene de la vista de baja de accion
  		 if (isset($_REQUEST['BajaDocumentos'])and isset($_SESSION['usuario']))
  			{
			$origen="Baja";
  			$idiom=new idiomas();
  			$name=$_REQUEST['BajaDocumentos'];
  			$model=new Documentos();
  			$model->BajaDocumentos($name);
  			$vista=new panel();
			$vista->constructor($idiom,$origen);
  			}
  			//viene de la vista de consultar pinchando en ver
         if(isset($_REQUEST['View'])and isset($_SESSION['usuario']))
        {  
          $origen="consultar";
          $idiom=new idiomas();
          $name=$_REQUEST['View'];
          $model=new Documentos();
          $model->crearArrayDocumentos($name);
          include("../Archivos/ArrayDocumentos.php");
          $arrays=new consult();
          $form=$arrays->array_consultar();
          $vistas=new Documentos_VIEW();
          $vistas->crear($form,$idiom,$origen);
        }
        //viene de la vista 
          if(isset($_REQUEST['BajaShow'])and isset($_SESSION['usuario']))
        {  
          $origen="Baja";
          $idiom=new idiomas();
          $name=$_POST['buscar'];
          $model=new Documentos();
          $model->buscarDocumentos($name);
          include("../Archivos/ArrayBuscarDocumentos.php");
          $arrays=new buscar();
          $form=$arrays->array_consultar();
          $vistas=new DocumentosDelete();
          $vistas->crear($idiom,TRUE,$form);
        }

          if(isset($_REQUEST['BajaShow1'])and isset($_SESSION['usuario']))
         {

          $origen="Baja";
          $idiom=new idiomas();
          $name=$_REQUEST['BajaShow1'];
          $model=new Documentos();
          $model->buscarDocumentos($name);
          include("../Archivos/ArrayBuscarDocumentos.php");
          $arrays=new buscar();
          $form=$arrays->array_consultar();
          $vistas=new Documentos_VIEW();
          $vistas->crear($form,$idiom,$origen);
         }
        if(isset($_REQUEST['ModificarView'])and isset($_SESSION['usuario']))
      {
        $origen="Modificar";
        $idiom=new idiomas();
        $name=$_POST['buscar'];
        $model=new Documentos();
        $model->buscarDocumentos($name);
        include("../Archivos/ArrayBuscarDocumentos.php");
        $arrays=new buscar();
        $form=$arrays->array_consultar();
        $vistas=new Documentos_SHOW();
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