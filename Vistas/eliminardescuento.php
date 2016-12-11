<?php
include_once('../Controlador/defaultcontroller.php');
include_once('../Modelos/ModeloGeneral.php');

if(!isset($_SESSION)) session_start();
 //$idUsuario=$_SESSION['idUsuario'];
 //if ($_SESSION['tipoUsuario'] =='3'){

    $idDesc = $_GET['id'];
    $descuento = DescuentoController::getDescuento($idDesc);

    


?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <title>Descuentos</title>


    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/eliminardescuento.css" />

  </head>
  <body>
  <h2 style="margin-left: 30px">¿Seguro de que quiere eliminar el siguiente descuento?</h2>

  


    <div class="container">
     
     <h1 style="margin-left: 20px">Descuento:</h1>

  
     <div id="container-descuentos">

      <div class="row">
      
          <div style="padding-left: 30px" class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><p><b>Cantidad: <?php echo $descuento->getCantidad(); ?></b></p></div>

         
          
      </div>

     </div> 
<div>
<form style="margin-left: 30px;" action="../Controlador/defaultcontroller.php?controlador=descuento&accion=eliminarDescuento" method="POST">
<input type="hidden" name="idDescuento" value="<?php echo $descuento->getIdDescuento();?>">
<input type="hidden" name="cantidad" value="<?php echo $descuento->getCantidad();?>">
<button style="float: left;margin-bottom: 10px" href="#" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-ok"></span> Aceptar</button>
</form>
<a href="gdescuentos.php"><button style="float: left;margin-left: 30px;margin-bottom: 20px" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancelar</button></a>
</div>
  </div>


  </body>

  </html>
  <?php
 
/*}else{
        ob_start(); 
             if($_SESSION["tipoUsuario"]!='0'){
                  header("Location: ../view/index.php");  
             }else{
                header("Location: = /../../index.php"); 
             }
          }
          
        ob_end_flush();  */

?>