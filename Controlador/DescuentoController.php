<?php
	class DescuentoController{

		public static function getDescuento($idDescuento){
				if(!isset($_SESSION)) session_start();
				$descuento = NULL;
				$descuento = Descuento::getData($idDescuento);
				if ($descuento == NULL){
					ob_start(); 
	  			
					header("refresh: 3; url = ../Vistas/gdescuentos.php"); 
					
					$errors = array();
					
					$errors["general"] = "El descuento no existe";
					echo $errors["general"]; 
					ob_end_flush();
				}else{
					return $descuento;
				}
			}

		public static function getAll(){
			$descuentos = new Descuento();
			return $descuentos->getDescuentos();
		}

	public static function modificarDescuento(){
		if(!isset($_SESSION)) session_start();
		//if($_SESSION['tipoUsuario']=='3'){

		$cantidad = $_POST['cantidad'];
		$idDescuento = $_POST['idDescuento'];
		
							if(Descuento::registerValid($cantidad)){
							    
								Descuento::update($idDescuento,$cantidad);
								
								header("Location: ../Vistas/gdescuentos.php"); 
								}else{
								ob_start(); 
								header("refresh: 3; url = ../Vistas/modificardescuento.php?id=$idDescuento");  
								$errors = array();
								$errors["general"] = "ERROR.El formulario no fue bien completado.";
								echo $errors["general"]; 
								ob_end_flush();
							}
						//}
	}

	public static function crearDescuento(){
				if(!isset($_SESSION)) session_start();
				//if($_SESSION['tipoUsuario']=='3'){

				
				$cantidad = $_POST['cantidad'];
						if(!DescuentoMapper::exists($cantidad)){
							if(Descuento::registerValid($cantidad)){
								$descuento = new Descuento();
								$descuento->setCantidad($cantidad);
	  							$descuento->saveDescuento($descuento);
	  							
								header("Location: ../Vistas/gdescuentos.php"); 
								
							}else{
								ob_start(); 
	  							
	  							header("Location: ../Vistas/gdescuentos.php"); 
								$errors = array();
								$errors["general"] = "ERROR.El formulario no fue bien completado.";
								echo $errors["general"]; 
								ob_end_flush();
							}
							}else{
							ob_start(); 
	  						
	  						header("Location: ../Vistas/gdescuentos.php"); 
							$errors = array();
							$errors["general"] = "ERROR.El descuento ya existe.";
							echo $errors["general"]; 
							ob_end_flush();
						}
						
					}
					
				
				


			public static function eliminarDescuento(){
				if(!isset($_SESSION)) session_start();
					//if($_SESSION['tipoUsuario']=='3'){
							$idDescuento = $_POST['idDescuento'];
							$cantidad = $_POST['cantidad'];
							if(DescuentoMapper::exists($cantidad)){
								Descuento::deleteDescuentoTabla($idDescuento);
								Descuento::delete($idDescuento);
								header("Location: ../Vistas/gdescuentos.php"); 
								} 
							else{
								ob_start(); 
								header("refresh: 3; url = ../Vistas/gdescuentos.php");  
								$errors = array();
								$errors["general"] = "ERROR.El descuento no existe.";
								echo $errors["general"]; 
								ob_end_flush();
							}
					
			}
	}
?>