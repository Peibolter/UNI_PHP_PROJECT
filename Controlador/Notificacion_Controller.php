<?php 

include("../Vistas/Notificacion_ADD_Vista.php");
include("../Idiomas/idiomas.php");
include("../Modelos/Notificacion_Modelo.php");
include("../Vistas/MenuPrincipal_SHOW_Vista.php");
include("../Modelos/Usuario_Model.php");
include("../Vistas/Notificacion_VIEW_Vista.php");
include('../phpmailer/PHPMailerAutoload.php');
include("../Vistas/NotificacionEmail_ADD_Vista.php");
session_start();
date_default_timezone_set('UTC');

 	if(isset($_REQUEST['notificacion']))
 	{		
 			$idioma=new idiomas();
 			$notificacion=new notificacionVista();
 			$model=new Notificacion();
 			$model->creararrayEmailusuarios();
 			include("../Archivos/ArrayEmailUsuarios.php");
 			$datos=new consultar();
 			$form=$datos->array_consultar();

 			$notificacion->crear($idioma,NULL,$form);
 	}

 		if(isset($_REQUEST['enviarnoti'])){

 			  $aviso="aviso";
 			  $origen="Alta";
 			  $idioma=new idiomas();
 			  $model=new Notificacion();
 			  $hoy=getdate();
        		$d = $hoy['mday'];
				$m = $hoy['mon'];
				$y = $hoy['year'];
				$hour = $hoy['hours'];
				$minute = $hoy['minutes'];
				$seconds = $hoy['seconds'];
				$user=$_SESSION['usuario'];
				$date= $y."-".$m."-".$d." ".$hour.":".$minute.":".$seconds;
				//echo $date;
 			  if(isset($_POST['usuario']) and isset($_POST['mensaje']))
 			  {

 			  	$usuarios=$_POST['usuario'];
 			  	$mensaje=$_POST['mensaje'];
 			  	$modelusuario=new Usuario();
 			  	$foto=$modelusuario->devolverfoto($user);
 			  	$model->altaNotificacion($usuarios,$mensaje,$date,$user,$foto);
 			  	//cargo las notificaciones del usuario
 			  	$user=$_SESSION['usuario'];
 				$modelnotificacion=new Notificacion();
 				$modelnotificacion->arrayNotificacionesUsuario($user);
 				
 			  	$vista=new panel();
        		$vista->constructor($idioma,$origen);

 			  }else{

 			$notificacion=new notificacionVista();
 			$model->creararrayEmailusuarios();
 			include("../Archivos/ArrayEmailUsuarios.php");
 			$datos=new consultar();
 			$form=$datos->array_consultar();
 			$notificacion->crear($idioma,$aviso,$form);
 			  }
 			  
 			  }

 			  if(isset($_REQUEST['noti']))
 			  {

 			  	$idioma=new idiomas();
 			    $idnotificacion=$_REQUEST['noti'];
 			  	$model=new Notificacion();
 			  	$model->arraynotificiacionporid($idnotificacion);
 			  	include("../Archivos/ArrayNotificacionid.php");
 			  	$datos=new arrays();
 			  	$form=$datos->array_consultar();
 			  	$clase=new Notificacion_VIEW();
 			  	$clase->crear($idioma,$form);

 			  }

 			   if(isset($_REQUEST['Baja']))
 			  {
 			  $origen="Baja";
 			  $idioma=new idiomas();
 			  $id=$_REQUEST['Baja'];
 			  $model=new Notificacion();
 			  $model->eliminarnotificacion($id);
 			  $user=$_SESSION['usuario'];
 			  //cargo las notificaciones del usuario
 				$modelnotificacion=new Notificacion();
 				$modelnotificacion->arrayNotificacionesUsuario($user);
 			  //
 			  $vista=new panel();
        	  $vista->constructor($idioma,$origen);

 			  }
 			   if(isset($_REQUEST['mostrar']))
 			  {
 			  	
 			  	$idioma=new idiomas();
 			  	$model=new Notificacion();
 			  	$usuario=$_SESSION['usuario'];
 			  	$model->arraynotificiacionporusuario($usuario);
 			  	include("../Archivos/ArrayNotificaciousuario.php");
 			  	$datos=new arrays();
 			  	$form=$datos->array_consultar();
 			  	$clase=new Notificacion_VIEW();
 			  	$clase->crear($idioma,$form);

 			  }

 			  if(isset($_REQUEST['borrartodo'])){

 			  	 $origen="Baja";
 			  	$idioma=new idiomas();
 			  	$model=new Notificacion();
 			  	$usuario=$_SESSION['usuario'];
 			  	$model->eliminartodaslasnotificacionesUsuario($usuario);
 			  	//cargo las notificaciones del usuario
 				$modelnotificacion=new Notificacion();
 				$modelnotificacion->arrayNotificacionesUsuario($usuario);
 			  	//
 			  $vista=new panel();
        	  $vista->constructor($idioma,$origen);
 			  }
 			   if(isset($_REQUEST['notificacionemail']))
 			  {
 			  $idioma=new idiomas();
 			$notificacion=new notificacioncorreo();
 			$model=new Notificacion();
 			$model->arrayalumnos();
 			include("../Archivos/ArrayEmailAlumnos.php");
 			$datos=new consultar();
 			$form=$datos->array_consultar();
 			$notificacion->crear($idioma,$form,TRUE);

 			  }

 			  if(isset($_REQUEST['correo'])){
							 
					$user=$_SESSION['usuario'];			
					$enviado=TRUE;
					$model=new Usuario();
					$model->crearArrrayUsuario($user);
					include("../Archivos/ArrayUsuarios.php");
					$array=new consult1();
					$form=$array->array_consultar();
					$correofrom=$form[0]["email"];
					$password=$form[0]["emailpass"];
					$nombre=$form[0]["nombre"];
					$mensaje=$_POST['mensaje'];
					$asunto=$_POST['asunto'];

					

					if(isset($_POST['opcion'])){
						
						$alumnos=$_POST['opcion'];
						foreach ($alumnos as $alumno){ 


							$correo=new PHPMailer();
							$correo->IsSMTP();
							$correo->CharSet = 'UTF-8';
							$correo->Timeout=30;
							 
							$correo->SMTPAuth= true;
							 
							$correo->SMTPSecure= 'tls';
							//$correo->SMTPDebug = 1;
							 
							$correo->Host= "smtp.gmail.com";
							 
							$correo->Port= 587;
							 
							$correo->Username = "$correofrom";
							 
							$correo->Password = "$password";
							 
							$correo->SetFrom("$correofrom", "$nombre");
							 
							$correo->AddReplyTo("$correofrom","$nombre");
							 
							$correo->AddAddress("$alumno", "Alumno");
							 
							$correo->Subject = "$asunto";
							 
							$correo->IsHTML(false);
 							$correo->Body = "$mensaje";
							 
							//$correo->AddAttachment("../phpmailer/examples/images/phpmailer.png");
							
							if(!$correo->Send()) {
							  //echo "Hubo un error: " . $correo->ErrorInfo;
							  $enviado=FALSE;
							} else {
								$enviado=TRUE;
							  //echo "Mensaje enviado con exito.";
							}

							}

							if($enviado==TRUE){
							$origen="Alta";
							$idioma=new idiomas();
							  $vista=new panel();
				        	  $vista->constructor($idioma,$origen);
							}else{
								$mensaje="no enviado";
								$idioma=new idiomas();
					 			$notificacion=new notificacioncorreo();
					 			$model=new Notificacion();
					 			$model->arrayalumnos();
					 			include("../Archivos/ArrayEmailAlumnos.php");
					 			$datos=new consultar();
					 			$form=$datos->array_consultar();
					 			$notificacion->crear($idioma,$form,$mensaje);
								}
					
					 }else{
					 		$idioma=new idiomas();
					 			$notificacion=new notificacioncorreo();
					 			$model=new Notificacion();
					 			$model->arrayalumnos();
					 			include("../Archivos/ArrayEmailAlumnos.php");
					 			$datos=new consultar();
					 			$form=$datos->array_consultar();
					 		$notificacion->crear($idioma,$form,$mensaje);
					 }			

 			  	} 
 			  
 		
?>