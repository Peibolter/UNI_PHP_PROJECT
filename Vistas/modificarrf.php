<?php
include_once('../Controlador/defaultcontroller.php');
include_once('../Modelos/ModeloGeneral.php');

if(!isset($_SESSION)) session_start();
 //$user=$_SESSION["usuario"];
 

    $idRF = $_GET['id'];
    $RF = RFController::getRF($idRF);

    


?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Aplicacion Gimnasio</title>


    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/modificarrf.css" />
    <link rel="stylesheet" type="text/css" href="../css/prueba1.css" />

  
  </head>
  <body>
  </body>
  <div style="margin-left: 0px" class="container">
     
     <h1 style="margin-left: 50px; color: white">Modificar Reserva Fisio: <?php echo $RF->getIdRF();?></h1>

     <div id="container-formulario">

   
     <div style="color: white" id="container">
        <form action="../Controlador/defaultcontroller.php?controlador=rf&accion=modificarRF" method="POST" style="margin:10px;" enctype="multipart/form-data">
   
        <div class="row">

          <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-8">
              <label for="ini">Fecha Inicio: </label>
              <input type="date" class="form-control" required="" name="fechaI" placeholder="<?php echo $RF->getFechaI(); ?>">
          </div>

      
          <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4">
              <label for="fin">Fecha Fin: </label>
              <input type="date" required="" class="form-control" name="fechaF" maxlength="30" placeholder="<?php echo $RF->getFechaF();?>">
          </div>
          
            
          </div> 
          <input type="hidden" name="idRF" value="<?php echo $RF->getIdRF();?>">
          <p style="text-align:center">
           <button id="btModificar" type="submit" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil"></span> Modificar</button>

          <a href="gRF.php"><button type="button" class="btn btn-default2">Atr&aacutes</button></a></p>
        </form>
      </div> 
     </div>

  </div>
  </html>
