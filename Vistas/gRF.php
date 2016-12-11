<?php
// vista general de RF
include_once('../Controlador/defaultcontroller.php');
include_once('../Modelos/ModeloGeneral.php');

if(!isset($_SESSION)) session_start();
 //$user=$_SESSION["usuario"];
 
  $row = RFController::getAll();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Aplicacion Gimnasio</title>

 
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/gRF.css" />

   
  </head>
  <body>

 
  <nav style="top: 0px;margin-bottom: 0px;" class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
  <div class="navbar-header">
  <button style="margin-left: 5px" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>  
    <a class="navbar-brand" href="#">Aplicacion Gimnasio</a>
  </div>
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
         <li><a href="index.php">Volver al menú</a></li>
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Idioma
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
           <li><a href="#">Esp</a></li>
           <li><a href="#">Eng</a></li>
        </ul>
       </li>
      <li><a href='login.php'>Salir</a></li>
    </ul>
  </div>
  </div>
  </nav>

  <div class="container">
     
     <div style="margin-bottom: 20px;margin-left: 30px" class="row">
     <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
     <h1 >Lista de Reservas de fisio:</h1>
     </div>
  
     <div class="row" style="margin-top: 20px; margin-bottom: 10px;">

       
       </div>

       </div>

          <?php
          if($row!=null){ 
            foreach ($row as $rf) {
          ?>
          <div id="fila">
          <tr>
                           <div style="margin-bottom: 20px;margin-left: 30px" class="row">
                    
                 
                          <div style="margin-bottom: 5px" class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                            <td width='10%'><strong>Fecha de Inicio: </strong><?php echo $rf['INICIO'] ?> </td>
                          </div>
                
                          <div style="margin-bottom: 5px" class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                            <td width='10%'><strong>Fecha de Fin: </strong><?php echo $rf['FIN'] ?> </td>
                          </div>
                     
                          <div style="margin-bottom: 15px" class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                            <td width='10%'><strong>Alumno: </strong><?php echo $rf['ALUMNO'] ?> </td>
                          </div>                          
                    
                          <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                            <td width='10%'>  <a href="crearrf.php?id=<?php echo $rf['ID']; ?>"><button class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil"></span> Crear</button></a></td>
                            <td width='10%'>  <a href="modificarrf.php?id=<?php echo $rf['ID']; ?>"><button class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil"></span> Modificar</button></a></td>
                            <td width='10%'>   <a href="eliminarrf.php?id=<?php echo $rf['ID']; ?>"><button  class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span>Eliminar</button></a></td>
                          </div>

          </tr>

          <br>
          </div>
          <?php
            }
          }
          ?>

      </div>


     </div>

  </div>

   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>

  </body>

  </html>
