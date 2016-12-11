<?php
include_once "../Controlador/ConexionBD.php";
include_once "../Modelos/ModeloGeneral.php";

class DescuentoMapper{


    public static function update($idDescuento,$cantidad)
    {
        $db = new ConexionBD();
        $resultado = "UPDATE descuento SET CANTIDAD=\"$cantidad\" WHERE ID=\"$idDescuento\"";
        $db->consulta($resultado) or die('Error al actualizar el descuento');
        $db->desconectar();
        return true;

        
    }
   


 
    public static function delete($idDescuento){
        $db = new ConexionBD();
        $resultado =  $db->consulta("DELETE FROM descuento WHERE ID=\"$idDescuento\"");
        return $resultado;
    }

  
    public static function deleteRelacion($idDescuento){
        $db = new ConexionBD();
        $resultado = $db->consulta("DELETE FROM categoria_actividad WHERE DESCUENTO=\"$idDescuento\"");
        return $resultado;
    }



    public static function listar()
    {
        $db = new ConexionBD();
        $sqlDescuento = $db->consulta("SELECT * FROM descuento");
        $arrayDescuento = array();
        while ($row_descuento = mysqli_fetch_assoc($sqlDescuento))
            $arrayDescuento[] = $row_descuento;
        $db->desconectar();
        return $arrayDescuento;
    }

   
    public static function exists($cantidad) {
        $db = new ConexionBD();
        $sqlexiste = $db->consulta("SELECT * FROM descuento WHERE CANTIDAD=\"$cantidad\"");
        $busqueda = mysqli_num_rows($sqlexiste);
        if( $busqueda > 0) {
            return true;
        }
    }


    public static function saveDescuento($descuento){  
        $db = new ConexionBD();

         
            $insertaDesc = "INSERT INTO descuento (CANTIDAD) VALUES ('";
            $insertaDesc = $insertaDesc.$descuento->getCantidad()."')";
            $db->consulta($insertaDesc) or die('Error al crear el descuento');
            return true;
   
        
        $db->desconectar();
    }
    
    

    public static function findByIdDescuento($idDescuento){
        $db = new ConexionBD();
        $sqlfind = $db->consulta('SELECT * FROM descuento WHERE ID ="'.$idDescuento.'"');
        if (mysqli_num_rows($sqlfind) > 0) {
            $row = mysqli_fetch_assoc($sqlfind);
            
            $descuento= new Descuento($row['ID'],$row['CANTIDAD']);
            return $descuento;
        } else {
            return NULL;
        }
    }


    public static function isValidDescuento($idDescuento) {
        $db = new ConexionBD();
        $sqlesvalido = $db->consulta("SELECT * FROM descuento WHERE ID=\"$idDescuento\"");
        $busqueda = mysqli_num_rows($sqlesvalido);
        if( $busqueda > 0) {
            return true;
        }
    }

    
}
?>