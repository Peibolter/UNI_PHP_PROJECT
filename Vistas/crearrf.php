<?php
include_once('../Controlador/defaultcontroller.php');
include_once('../Modelos/ModeloGeneral.php');

if(!isset($_SESSION)) session_start();
 //$user=$_SESSION["usuario"];

?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Aplicacion Gimnasio</title>


    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/crearrf.css" />
    <link rel="stylesheet" type="text/css" href="../css/prueba1.css" />

  </head>
  <body>


  <nav style="top: 0px;" class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
  <div class="navbar-header">
  <button style="margin-left: 5px" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>  
    <a class="navbar-brand" href='gRF.php'>Gymtastic</a>
  </div>
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
   <ul class="nav navbar-nav">
       <li><a href='menugeneral.php'>Inicio</a></li>
        <li>
        <li><a href='gRF.php'>Volver a lista de reservas de fisio</a></li>
    </ul>
   <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Idioma <span class="caret"></span></a>
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
     
     <h1 style="color: white; margin-left: 50px;">Crear Reserva Fisio: </h1>

 
     <div id="container-rf">
        <form action="../Controlador/defaultcontroller.php?controlador=rf&accion=crearRF" method='POST' style="margin:10px;" enctype="multipart/form-data">

        <div class="row"> 
   
          <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4">
              <label for="nomuser">Usuario: </label>
              <input type="number" class="form-control" name="usuario" maxlength="45"  required="">
          </div>
    
          <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-8">
              <label for="fechaI">Fecha Inicio: </label>
              <input type="date" class="form-control" name="fechaI"   required="" placeholder="xx-xx-xxxx">
          </div>
   
        
         <div style="margin-bottom: 15px" class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
              <label for="fechaF">Fecha Fin: </label>
              <input type="date" class="form-control" name="fechaF"   required="" placeholder="xx-xx-xxxx">                            
         </div>
        

          <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
              <label for="alum">Alumno: </label>
              <input type="number" class="form-control" required="" name="alumno" maxlength="45" placeholder="">
          </div>
   
          </div> 

          <p style="text-align:center">
          <button id="btCrear" type="submit" style="margin-right: 10px;" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-plus"></span> Crear</button>

          <a href="gRF.php"><button type="button" class="btn btn-default2">Atr&aacutes</button></a></p>
        </form>
     </div> 

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  
  </body>
 
  </html>
