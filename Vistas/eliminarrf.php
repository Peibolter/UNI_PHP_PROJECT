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
    <link rel="stylesheet" type="text/css" href="../css/eliminarrf.css" />

  </head>
  <body>
  <h2 style="margin-left: 30px">¿Seguro que quiere eliminar la siguiente reserva de fisio?</h2>

  


    <div class="container">
     
     <h1 style="margin-left: 20px">Reserva de fisio: <?php echo $RF->getIdRF();?></h1>

  
     <div id="container-rf">

      <div class="row"> 

          </div>
          <div style="padding-left: 30px" class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><p><b>Fecha Inicio: <?php echo $RF->getFechaI(); ?></b></p></div>
          <div style="padding-left: 30px" class="col-xs-8 col-sm-8 col-md-8 col-lg-8"><p><b>Fecha Fin: <?php echo $RF->getFechaF(); ?></b></p></div>
          <div style="padding-left: 30px" class="col-xs-8 col-sm-8 col-md-8 col-lg-8"><p><b>Alumno: <?php echo $RF->getAlumno(); ?></b></p></div>
      </div>

     </div> 
<div>
<form style="margin-left: 30px;" action="../Controlador/defaultcontroller.php?controlador=rf&accion=eliminarrf" method="POST">
<input type="hidden" name="idRF" value="<?php echo $RF->getIdRF();?>">
<button style="float: left;margin-bottom: 10px" href="#" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-ok"></span> Aceptar</button>
</form>
<a href="gRF.php"><button style="float: left;margin-left: 30px;margin-bottom: 20px" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancelar</button></a>
</div>
  </div>

  </body>

  </html>
