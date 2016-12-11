<?php 

  include("../Modelos/ReservasDeEspacio_Model.php");
  include("../Modelos/Espacio_Model.php");
  include("../Idiomas/idiomas.php");
  include("../Vistas/ReservasDeEspacio_ADD_Vista.php");
  include("../Vistas/ReservasDeEspacio_DELETE_Vista.php");
  include("../Vistas/ReservasDeEspacio_SHOW_Vista.php");
  include("../Vistas/ReservasDeEspacio_VIEW_Vista.php");
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
        $alta=new ReservaEspacioAlta();
  			$alta->crear($idiom,TRUE);

  		}

  		if (isset($_REQUEST['AltaReservaEspacio'])and isset($_SESSION['usuario']))
  		{
  			$idiom=new idiomas();
  			$nombreReservaEspacio=$_POST['Nombre'];
        $descripcion=$_POST['Descripcion'];
  			$model=new ReservaEspacio();
  			$resultado=$model->comprobarexiste($nombreReservaEspacio);
  			if(!$resultado){
  			  $model->altaReservaEspacio($nombreReservaEspacio,$descripcion);
          $origen="Alta";
    			$vista=new panel();
          $vista->constructor($idiom,$origen);
  			}else{
    			$alta=new ReservaEspacioAlta();
    			$alta->crear($idiom,FALSE);

        }
  		}

  	 if(isset($_REQUEST['Consultar'])and isset($_SESSION['usuario'])){
        $datos=array();
        $origen="Consultar";
			  $idiom=new idiomas();
			  $model=new ReservaEspacio();
			  $datos=$model->listarReservaEspacios();
  			$vistas=new ReservasDeEspacios_VIEW();
  			$vistas->crear($datos,$idiom,$origen);
		 }
  	
    
      
  		if(isset($_REQUEST['Baja'])and isset($_SESSION['usuario'])){

  			$datos=array();
        $origen="Baja";
        $idiom=new idiomas();
        $model=new ReservaEspacio();
        $datos=$model->listarReservaEspacios();
        $vistas=new ReservaEspacios_VIEW();
        $vistas->crear($datos,$idiom,$origen);
  		}

  		 if (isset($_REQUEST['BajaReservaEspacio'])and isset($_SESSION['usuario'])){

          $origen = "BajaF";
          $idiom=new idiomas();
          $name=$_REQUEST['BajaReservaEspacio'];
          $model=new ReservaEspacio();
          $datos=$model->consultarReservaEspacio($name);
          $vista=new ReservasDeEspacio_DELETE();
          $vista->crear($datos,$idiom,$origen);
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