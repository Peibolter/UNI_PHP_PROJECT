<?php 

include '../Vistas/MenuPrincipal_SHOW_Vista.php';
include '../Idiomas/idiomas.php';
include '../Modelos/Usuario_Model.php';
include("../Modelos/Funcionalidad_Model.php");
include("../Funciones/basededatos.php");
session_start();

		//viene de las banderas donde pone el idioma que seleccionas
		if (isset($_REQUEST['idiomas'])and isset($_SESSION['usuario']))
		{  		$origen="principal";
				 $idiom=new idiomas();
				 $_SESSION['idioma']=$_REQUEST['idiomas'];
				 $menu=new panel();
				 $menu->constructor($idiom,$origen);
		}
		//viene del boton index
 		if(isset($_POST['login']) and isset($_POST['usuario']) and isset($_POST['password']))
 		{		
 			    $origen="inicio";
 				$user=$_POST['usuario'];
 				$pass=$_POST['password'];
 				$pass=md5($pass);
 				//Compruebo el usuario y si es verdadero lo dejo entrar y sino lo envio al login.
 				$model=new Usuario();
 				$resultado=$model->comprobarUsuario($user,$pass);
 				if($resultado==true){
 				$_SESSION['usuario']=$user;
 				$grupo=$model->obtenergrupo($user);
 				$modelfunc=new funcionalidad();
 				$modelfunc->crearArraFuncionalidades($grupo);
 				include("../Archivos/ArrayFuncionalidadesDeGrupo.php");
 				$datos=new grupos1();
 				$form=$datos->array_consultar();
 				//generamos el array con todas las funcionalidades y los permisos del grupo de usuario
 				$modelfunc->permisosdeFuncionalidades($form);
 				$idiom=new idiomas();
 				$menus=new panel();
 				$menus->constructor($idiom,$origen);
 				}
 				else {
 					echo"<script>window.location=\"../index.php\"</script>";
 				}
 		}

 	//viene de acceder del boton menu principal o index.php
 	 	if(isset($_REQUEST['principal'])and isset($_SESSION['usuario']))
 	 		{ 	
 	 			$origen="inicio";
 	 			$idiom=new idiomas();
 	 			/*$model=new Usuario();
 	 			$user=$_SESSION['usuario'];
 	 			$grupo=$model->obtenergrupo($user);
 				$modelfunc=new funcionalidad();
 				$modelfunc->crearArraFuncionalidades($grupo);
 				include("../Archivos/ArrayFuncionalidadesDeGrupo.php");
 				$datos=new grupos1();
 				$form=$datos->array_consultar();
 				//generamos el array con todas las funcionalidades y los permisos del grupo de usuario
 				$modelfunc->permisosdeFuncionalidades($form);*/
 	 			$menus=new panel();
 				$menus->constructor($idiom,$origen);

			}
			//viene del logout destruye la sesion y vuelve al index
			if(isset($_REQUEST['salir'])and isset($_SESSION['usuario'])){
				session_destroy();
				echo "<script> window.location=\".././index.php\"</script>";
			}

			if(isset($_REQUEST['acceso'])and isset($_SESSION['usuario'])){
				$origen="inicio";
				$idiom=new idiomas();
				$panelprincipal=new panel();
				$panelprincipal->constructor($idiom,$origen);
			}

			if(isset($_REQUEST['lanzar'])){
				$base=new Create_database();
				$base->my_db();
				echo "<script> alert(\"Base de datos Instalada\");</script>";
				echo "<script> window.location=\".././index.php\"</script>";
			}
			
	
?>