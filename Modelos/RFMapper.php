<?php
include_once "../Controlador/ConexionBD.php";
include_once "../Modelos/ModeloGeneral.php";
// mapper de gestionar reservas fisio
class RFMapper{


    public static function update($idRF,$fechaI,$fechaF)
    {
        $db = new ConexionBD();
        $resultado = "UPDATE consultafisio SET INICIO=\"$fechaI\", FIN =\"$fechaF\"  WHERE ID=\"$idRF\"";
        $db->consulta($resultado) or die('Error al crear la reserva de fisio');
        $db->desconectar();
        return true;
        
    }
   

    public static function delete($idRF){
        $db = new ConexionBD();
        $resultado =  $db->consulta("DELETE FROM consultafisio WHERE ID=\"$idRF\"");
        return $resultado;
    }

    public static function listar()
    {
        $db = new ConexionBD();
        $sqlRF = $db->consulta("SELECT * FROM consultafisio");
        $arrayRF = array();
        while ($row_RF = mysqli_fetch_assoc($sqlRF))
            $arrayRF[] = $row_RF;
        $db->desconectar();
        return $arrayRF;
    }

   
    public static function exists($idRF) {
        $db = new ConexionBD();
        $sqlexiste = $db->consulta("SELECT * FROM consultafisio WHERE ID=\"$idRF\"");
        $busqueda = mysqli_num_rows($sqlexiste);
        if( $busqueda > 0) {
            return true;
        }
    }


    public static function saveRF($RF){  
            $db = new ConexionBD();
            $insertaRF = "INSERT INTO consultafisio (USUARIO,INICIO,FIN,ALUMNO) VALUES ('";
            $insertaRF = $insertaRF.$RF->getUsuario()."','".$RF->getFechaI()."','".$RF->getFechaF()."','".$RF->getAlumno()."')";
            $db->consulta($insertaRF) or die('Error al crear la reserva de fisio');
            return true;
            $db->desconectar();
    }
    
    

    public static function findByIdRF($idRF){
        $db = new ConexionBD();
        $sqlfind = $db->consulta('SELECT * FROM consultafisio WHERE ID ="'.$idRF.'"');
        if (mysqli_num_rows($sqlfind) > 0) {
            $row = mysqli_fetch_assoc($sqlfind);
            $RF= new RF($row['ID'],$row['USUARIO'],$row['INICIO'],$row['FIN'],$row['ALUMNO']);
            return $RF;
        } else {
            return NULL;
        }
    }


    public static function isValidRF($idRF) {
        $db = new ConexionBD();
        $sqlesvalido = $db->consulta("SELECT * FROM consultafisio WHERE ID=\"$idRF\"");
        $busqueda = mysqli_num_rows($sqlesvalido);
        if( $busqueda > 0) {
            return true;
        }
    }

    
}
?>