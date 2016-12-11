<?php
include_once('../Controlador/defaultcontroller.php');
include_once('../Modelos/ModeloGeneral.php');

if(!isset($_SESSION)) session_start();
 //$idUsuario=$_SESSION['idUsuario'];
// if ($_SESSION['tipoUsuario'] =='3'){

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
    <link rel="stylesheet" type="text/css" href="../css/modificardescuento.css" />
    <link rel="stylesheet" type="text/css" href="../css/descuentos.css" />

  
  </head>
  <body>
  </body>
  <div style="margin-left: 0px" class="container">
     
     <h1 style="margin-left: 50px; color: blue">Modificar Descuento: <?php echo $descuento->getCantidad();?></h1>

     <div id="container-formulario">

   
     <div style="color: white" id="container">
        <form action="../Controlador/defaultcontroller.php?controlador=descuento&accion=modificarDescuento" method="POST" style="margin:10px;" enctype="multipart/form-data">
   
        <div class="row">
           <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4">
              <label for="cant">Cantidad: </label>
              <input type="number" required="" class="form-control" name="cantidad" maxlength="1001" placeholder="<?php echo $descuento->getCantidad(); ?>">
          </div> 
          </div> 
          <input type="hidden" name="idDescuento" value="<?php echo $descuento->getIdDescuento();?>">
          <p style="text-align:center">
           <button id="btModificar" type="submit" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil"></span> Modificar</button>

          <a href="gdescuentos.php"><button type="button" class="btn btn-default2">Atr&aacutes</button></a></p>
        </form>
      </div> 
     </div>

  </div>
  </html>
<?php
 
//}else{
       // ob_start(); 
             //if($_SESSION["tipoUsuario"]!='3'){
                 // header("Location: ../view/index.php");  
            // }else{
               // header("Location: = /../../index.php"); 
            // }
        //  }
          
     //   ob_end_flush();  

?>