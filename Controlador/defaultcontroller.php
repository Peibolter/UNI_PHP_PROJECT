<?php

	include_once('DescuentoController.php');
	include_once('RFController.php');
	include_once('../Modelos/ModeloGeneral.php');

	if(isset($_GET["controlador"]) && isset($_GET["accion"])){
		$targetController = ucfirst($_GET["controlador"])."Controller";
		$action = $_GET["accion"];
		$targetController::$action();
	}
	?>