
<?php
// controlador reservar fisio IU
	class RFController{

		public static function getRF($idRF){
				if(!isset($_SESSION)) session_start();
				$RF = NULL;
				$RF = RF::getData($idRF);
				if ($RF == NULL){
					ob_start(); 
	  			
					header("refresh: 3; url = ../Vistas/gRF.php"); 
					
					$errors = array();
					
					$errors["general"] = "La reserva de fisio no existe";
					echo $errors["general"]; 
					ob_end_flush();
				}else{
					return $RF;
				}
			}

		public static function getAll(){
			$RFs = new RF();
			return $RFs->getRFs();
		}

	public static function modificarRF(){
		if(!isset($_SESSION)) session_start();
		//if($_SESSION['grupo']=='monitores'){

		
		$fechaI = $_POST['fechaI'];
		$fechaF = $_POST['fechaF'];
		$idRF = $_POST['idRF'];
		
						
							if(RF::registerValid($usuario,$alumno)){
								RF::update($idRF,$fechaI,$fechaF);
								header("Location: ../Vistas/gRF.php"); 
								}else{
								ob_start(); 
								header("refresh: 3; url = ../Vistas/modificarrf.php?id=$idRF");  
								$errors = array();
								$errors["general"] = "ERROR.El formulario no fue bien completado.";
								echo $errors["general"]; 
								ob_end_flush();
								}
							//}
	
	}

	public static function crearRF(){
				if(!isset($_SESSION)) session_start();
				//if($_SESSION['grupo']=='monitores'){

				
				$usuario = $_POST['usuario'];
				$fechaI = $_POST['fechaI'];
				$fechaF = $_POST['fechaF'];
				$alumno = $_POST['alumno'];
 
				
						
							if(RF::registerValid($usuario,$alumno)){
								$RF = new RF();
								$RF->setUsuario($usuario);
								$RF->setFechaI($fechaI);
								$RF->setFechaF($fechaF);
								$RF->setAlumno($alumno);
								print_r($RF) ;
	  							$RF->saveRF($RF);
	  							
								header("Location: ../Vistas/gRF.php"); 
								
							}else{
								ob_start(); 
	  							
	  							header("Location: ../Vistas/gRF.php"); 
								$errors = array();
								$errors["general"] = "ERROR.El formulario no fue bien completado.";
								echo $errors["general"]; 
								ob_end_flush();
							}
					//	}
					
					
				
				}


			public static function eliminarRF(){
				if(!isset($_SESSION)) session_start();
					//if($_SESSION['grupo']=='monitores'){
							$idRF = $_POST['idRF'];
							if(RFMapper::exists($idRF)){
								RF::delete($idRF);
								header("Location: ../Vistas/gRF.php"); 
								} 
							/*}*/else{
								ob_start(); 
								header("refresh: 3; url = ../Vistas/gRF.php");  
								$errors = array();
								$errors["general"] = "ERROR.La reserva de fisio no existe.";
								echo $errors["general"]; 
								ob_end_flush();
							}
					
			}
	}
?>