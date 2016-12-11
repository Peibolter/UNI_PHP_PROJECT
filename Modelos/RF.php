

<?php
// modelo gestionar reservas fisio
include_once "../Controlador/ConexionBD.php";
include_once "RFMapper.php";

class RF {
 
  private $idRF;
  private $usuario;
  private $fechaI;
  private $fechaF;
  private $alumno;

 
  public function __construct($idRF=NULL,$usuario=NULL, $fechaI=NULL, $fechaF=NULL, $alumno=NULL) {
    $this->idRF = $idRF;
    $this->usuario = $usuario;
    $this->fechaI = $fechaI;
    $this->fechaF = $fechaF; 
    $this->alumno = $alumno;
 
  }
  

  public function getIdRF() {
    return $this->idRF;
  }


  public function getUsuario() {
    return $this->usuario;
  }  
       
  public function setUsuario($usuario) {
    $this->usuario = $usuario;
  }

   
  public function getFechaI() {
    return $this->fechaI;
  }  
       
  public function setFechaI($fechaI) {
    $this->fechaI = $fechaI;
  }


  public function getFechaF() {
    return $this->fechaF;
  }  
       
  public function setFechaF($fechaF) {
    $this->fechaF = $fechaF;
  }


  public function getAlumno() {
    return $this->alumno;
  }  
       
  public function setAlumno($alumno) {
    $this->alumno = $alumno;
  }


 


  public static function getRFs()
    {
        return $lista = RFMapper::listar();
    }



 
  public static function saveRF($rf){  
    return RFMapper::saveRF($rf);
  }


  public static function getData($idRF) {
    if ($idRF) {
        if ($res = RFMapper::isValidRF($idRF)) {
                return RFMapper::findByIdRF($idRF);
        } else {
                echo "ERROR: La reserva de fisio seleccionada no existe.";
           } 
        } else {
            return "ERROR, no existe la reserva de fisio seleccionada";
        }
    }
    
 



 public static function registerValid($usuario,$alumno){
      $error = array();
      if (strlen($usuario) < 1) {
       $error["usuario"] = "Tiene que haber un usuario asignado.";  
      }
      if (strlen($alumno) < 1) {
       $error["alumno"] = "Tiene que haber un alumno asignado.";  
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


  public static function update($idRF,$fechaI,$fechaF){
      RFMapper::update($idRF,$fechaI,$fechaF);
  } 


  public static function delete($idRF){
      RFMapper::delete($idRF);
  }


  
}

?>