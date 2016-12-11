

<?php

include_once "../Controlador/ConexionBD.php";
include_once "DescuentoMapper.php";

class Descuento {
 
  private $idDescuento;
  private $cantidad;
 
  public function __construct($idDescuento=NULL,$cantidad=NULL) {
    $this->idDescuento = $idDescuento;
    $this->cantidad = $cantidad;
  
  }
  

  public function getIdDescuento() {
    return $this->idDescuento;
  }


  public function getCantidad() {
    return $this->cantidad;
  }  
       
  public function setCantidad($cantidad) {
    $this->cantidad = $cantidad;
  }

   
  
  public static function getDescuentos()
    {
        return $lista = DescuentoMapper::listar();
    }



 
  public static function saveDescuento($descuento){  
    return DescuentoMapper::saveDescuento($descuento);
  }


  public static function getData($idDescuento) {
    if ($idDescuento) {
        if ($res = DescuentoMapper::isValidDescuento($idDescuento)) {
                return DescuentoMapper::findByIdDescuento($idDescuento);
        } else {
                echo "ERROR: El descuento seleccionado no existe.";
            }
        } else {
            return "ERROR, no existe el descuento seleccionado";
        }
  }
 



 public static function registerValid($cantidad){
      $error = array();
      if ($cantidad < 0 || $cantidad > 1000) {
       $error["cantidad"] = "La cantidad no puede ser inferior a 0 o superior a 1000 euros.";  
      }
      if (sizeof($error)>0){
	     echo "Los datos introducidos no son validos: ";
       print_r(array_values($error));
      }
      if (sizeof($error)==0){
       return true;
      }else{
        return true;
      }
      
  }


  public static function update($idDescuento,$cantidad){
      DescuentoMapper::update($idDescuento,$cantidad);
  } 


  public static function delete($idDescuento){
      DescuentoMapper::delete($idDescuento);
  }


  public static function deleteDescuentoTabla($idDescuento){
      DescuentoMapper::deleteRelacion($idDescuento);
  }

  
}
?>