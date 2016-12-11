<?php 

  include("../Modelos/Espacio_Model.php");
  include("../Idiomas/idiomas.php");
  include("../Vistas/Espacio_ADD_Vista.php");
  include("../Vistas/Espacio_DELETE_Vista.php");
  include("../Vistas/Espacio_SHOW_Vista.php");
  include("../Vistas/Espacio_VIEW_Vista.php");
  include("../Vistas/Espacio_EDIT_Vista.php");
  include("../Vistas/MenuPrincipal_SHOW_Vista.php");
 
session_start();

 /* 	if(isset($_POST['grupo'])and isset($_SESSION['usuario']))
  		{
  			$idiom=new idiomas();
  			$vista=new Grupo_Menu();
  			$vista->crear($idiom);
  		}*/

  		if(isset($_REQUEST['Alta'])and isset($_SESSION['usuario'])){
  			$idiom=new idiomas();
        $alta=new EspacioAlta();
  			$alta->crear($idiom,TRUE);

  		}

  		if (isset($_REQUEST['AltaEspacio'])and isset($_SESSION['usuario']))
  		{
  			$idiom=new idiomas();
  			$nombreEspacio=$_POST['Nombre'];
        $descripcion=$_POST['Descripcion'];
  			$model=new Espacio();
  			$resultado=$model->comprobarexiste($nombreEspacio);
  			if(!$resultado){
  			  $model->altaEspacio($nombreEspacio,$descripcion);
          $origen="Alta";
    			$vista=new panel();
          $vista->constructor($idiom,$origen);
  			}else{
    			$alta=new EspacioAlta();
    			$alta->crear($idiom,FALSE);

        }
  		}

  	 if(isset($_REQUEST['Consultar'])and isset($_SESSION['usuario'])){
        $datos=array();
        $origen="Consultar";
			  $idiom=new idiomas();
			  $model=new Espacio();
			  $datos=$model->listarEspacios();
  			$vistas=new Espacios_VIEW();
  			$vistas->crear($datos,$idiom,$origen);
		 }
  		
  		if (isset($_POST['buscador']) and !isset($_REQUEST['ModificarView'])and isset($_SESSION['usuario'])){
        $origen=$_REQUEST['origen'];
  			$idiom=new idiomas();
  			$name=$_POST['buscar'];
  			$model=new Espacio();
  			$resultado = $model->buscarEspacio($name);
  			$vistas=new Espacios_VIEW();
  			$vistas->crear($resultado,$idiom,$origen);

	  		}

    if (isset($_REQUEST['Modificar'])and isset($_SESSION['usuario'])){

        $datos=array();
        $origen="Modificar";
        $idiom=new idiomas();
        $model=new Espacio();
        $datos=$model->listarEspacios();
        $vistas=new Espacios_VIEW();
        $vistas->crear($datos,$idiom,$origen);
    }

	   if (isset($_REQUEST['ModificarEspacio'])and isset($_SESSION['usuario'])){
      $origen="Modificar";
      $datos = array();

      if(isset($_REQUEST['Nombre'])){

        $nombre = $_REQUEST['Nombre'];
        $descripcion = $_REQUEST['descripcion'];
        $nombreAnterior = $_REQUEST['NombreA'];

        $idioma=new idiomas();
        $model=new Espacio();
        $datos= $model->modificarEspacio($nombre,$descripcion,$nombreAnterior);
        $vista=new panel;
        $vista->constructor($idioma,$origen);

      }else{

        $nombre = $_REQUEST['ModificarEspacio'];
  			$idioma=new idiomas();
        $model=new Espacio();
        $datos= $model->consultarEspacio($nombre);
        $vistas=new Espacio_EDIT();
        $vistas->crear($datos,$idioma,$origen);
        }
  		}
      
  		if(isset($_REQUEST['Baja'])and isset($_SESSION['usuario'])){

  			$datos=array();
        $origen="Baja";
        $idiom=new idiomas();
        $model=new Espacio();
        $datos=$model->listarEspacios();
        $vistas=new Espacios_VIEW();
        $vistas->crear($datos,$idiom,$origen);
  		}

  		 if (isset($_REQUEST['BajaEspacio'])and isset($_SESSION['usuario'])){

          $origen = "BajaF";
          $idiom=new idiomas();
          $name=$_REQUEST['BajaEspacio'];
          $model=new Espacio();
          $datos=$model->consultarEspacio($name);
          $vista=new Espacio_DELETE();
          $vista->crear($datos,$idiom,$origen);
      }

      if (isset($_REQUEST['BajaF'])and isset($_SESSION['usuario'])){

          $origen = "Baja";
          $idioma=new idiomas();
          $name=$_REQUEST['BajaF'];
          $model=new Espacio();
          $datos=$model->bajaEspacio($name);
          $vista=new panel();
          $vista->constructor($idioma,$origen);;
      }
  			
      if(isset($_REQUEST['Mostrar'])and isset($_SESSION['usuario'])){  
        $origen="Consultar";
        $idiom=new idiomas();
        $model=new Espacio();
        $datos=$model->listarEspacios();
        $vistas=new Espacio_SHOW();
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