<?php 

  include("../Modelos/ReservasDeActividad_Model.php");
  include("../Modelos/ReservasDeEspacio_Model.php");
   include("../Modelos/Actividad_Model.php");
  include("../Modelos/Usuario_Model.php");
  include("../Idiomas/idiomas.php");
  include("../Vistas/ReservasDeActividad_ADD_Vista.php");
  include("../Vistas/ReservasDeActividad_DELETE_Vista.php");
  include("../Vistas/ReservasDeActividad_SHOW_Vista.php");
  include("../Vistas/ReservasDeActividad_VIEW_Vista.php");
  include("../Vistas/MenuPrincipal_SHOW_Vista.php");
 
session_start();



  	 if(isset($_REQUEST['Alta'])and isset($_SESSION['usuario'])){

        $model = new Usuario();
    	$idiom=new idiomas();
        $alta= new ReservasDeActividad();
        $espacio = $reservadeactividad -> selectEspacios();
        $actividad = $reservadeactividad -> selectActividades();
  			$alta->altaReservaActividad($actividad, $espacio);

  		}

  		if (isset($_REQUEST['AltaActividadReserva'])and isset($_SESSION['usuario']))
  		{
  		$idiom=new idiomas();
  		$nombre=$_POST['Nombre'];
        $descripcion=$_POST['Descripcion'];
        $categoria = $_POST['categorias'];
        $espacio = $_POST['espacio'];
        $usuario = $_POST['usuario'];
        $precio = $_POST['precio'];
        $maxalumnos = $_POST['maxAlumnos'];
        $fechainicio = $_POST['FechaInicio'];
        $fechafin = $_POST['FechaFin'];
        $horainicio = $_POST['HoraInicio'];
        $horafin = $_POST['HoraFin'];
        $dias = array();
        $diasF = "";
	
        }
  		}

  	 if(isset($_REQUEST['Consultar'])and isset($_SESSION['usuario'])){
        $datos=array();
        $origen="Consultar";
			  $idiom=new idiomas();
			  $model=new Actividad();
			  $datos=$model->listarActividades();
  			$vistas=new Actividades_VIEW();
  			$vistas->crear($datos,$idiom,$origen);
		 }
  		
  		if (isset($_POST['buscador']) and !isset($_REQUEST['ModificarView'])and isset($_SESSION['usuario'])){
        $origen=$_REQUEST['origen'];
  			$idiom=new idiomas();
  			$name=$_POST['buscar'];
  			$model=new Actividad();
  			$resultado = $model->buscarActividad($name);
  			$vistas=new Actividades_VIEW();
  			$vistas->crear($resultado,$idiom,$origen);

	  		}

  		if(isset($_REQUEST['Baja'])and isset($_SESSION['usuario'])){

  			$datos=array();
        $origen="Baja";
        $idiom=new idiomas();
        $model=new Actividad();
        $datos=$model->listarActividades();
        $vistas=new Actividades_VIEW();
        $vistas->crear($datos,$idiom,$origen);
  		}

  		 if (isset($_REQUEST['BajaActividad'])and isset($_SESSION['usuario'])){

          $origen = "BajaF";
          $idiom=new idiomas();
          $name=$_REQUEST['BajaActividad'];
          $model=new Actividad();
          $datos=$model->consultarActividad($name);
          $vista=new Actividad_DELETE();
          $vista->crear($datos,$idiom,$origen);
      }

      if (isset($_REQUEST['BajaF'])and isset($_SESSION['usuario'])){

          $origen = "Baja";
          $idioma=new idiomas();
          $name=$_REQUEST['BajaF'];
          $model=new Actividad();
          $datos=$model->bajaActividad($name);
          $vista=new panel();
          $vista->constructor($idioma,$origen);;
      }
  			
      if(isset($_REQUEST['MostrarActividad'])and isset($_SESSION['usuario'])){  
        $origen="Consultar";
        $name=$_REQUEST['MostrarActividad'];
        $idiom=new idiomas();
        $model=new Actividad();
        $datos=$model->consultarActividad($name);
        $vistas=new Actividad_SHOW();
        $vistas->crear($datos,$idiom,$origen);

        }

  		if (isset($_REQUEST['Volver'])and isset($_SESSION['usuario'])){
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
