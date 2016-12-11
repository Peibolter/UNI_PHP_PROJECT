<?php 

  include("../Modelos/Factura_Model.php");
  include("../Idiomas/idiomas.php");
  include("../Vistas/Factura_ADD_Vista.php");
  include("../Vistas/Factura_SHOW_Vista.php");
  include("../Vistas/Factura_VIEW_Vista.php");
  include("../Vistas/Factura_DELETER_Vista.php");
  include("../Vistas/MenuPrincipal_SHOW_Vista.php");
  include ("../Modelos/Usuario_Model.php");
  include("../Modelos/Funcionalidad_Model.php");
  session_start();

	if(isset($_REQUEST['NuevoPago'])){
		
		$clase=new vista();
		$clase->crear();
	} 
		
	if(isset($_REQUEST['GestionDeCaja'])){

	} 

	if(isset($_REQUEST['AltaFactura'])){
			
		echo "TU FACTURA SE HA ACEPTADO CORRECTAMENTE";
		echo "<p></p>";
		$cantidad=$_POST['cantidad'];	
		$usuario=$_POST['alumno'];	
		$inscipcion=$_POST['precio_inscipcion'];	
		$fisio=$_POST['precio_fisio'];
		$fecha=$_POST['fecha'];			
		$descuento=$_POST['descuento'];	
		$tiempo_pago=$_POST['tipo_de_mensualidad'];	
		$forma_pago=$_POST['forma_de_pago'];	
	
		
		$model=new Factura();
		$model->altaFactura($cantidad,$usuario,$inscipcion,$fisio,$fecha,$descuento,$tiempo_pago,$forma_pago);	
		$clase=new vista();
		$clase->atras();

	}
	
	if(isset($_REQUEST['ConsultaFactura'])){
		
		echo "<p>";
		echo "TODAS LAS FACTURAS";
		echo "</p>";
		$clase=new vista2();
		$model=new Factura();
		$model->VerFactura();
		$clase->mostrarfacturas();
	
	}	
	
	
	if(isset($_REQUEST['buscadorDeNombre'])){
		echo "<p>";
		echo "DETALLE DE LA FACTURA";
		echo "</p>";
		echo "<p>";
		echo "El controlador se ha cargado";
		echo "</p>";
		$NOM=$_POST['Identificador'];
		//COMPROBAR QUE LLEGA HASTA AQUI Y QUE RECOPILA BIEN EL DATO:    echo " tt " . $_POST['Identificador'];
		$clase=new vista2();
		$model=new Factura();
		$model->VerFacturaEnDetalle($NOM);

	}
	
		if(isset($_REQUEST['buscadorParaEliminar'])){
		echo "<p>";
		echo "Facturas de ".$_POST['IdentificadorParaEliminar'].".";
		echo "</p>";
		$NOM=$_POST['IdentificadorParaEliminar'];
		//COMPROBAR QUE LLEGA HASTA AQUI Y QUE RECOPILA BIEN EL DATO:    echo " tt " . $_POST['Identificador'];
		$clase=new vista3();
		$model2=new Factura();
		//La siguiente linee es para ver la tabla de facturas
		$model2->VerFacturaEnDetalleParaEliminar($NOM);
		//La siguiente linea es para el formulario
		$clase->mostrarfacturas();
	}
	
	if(isset($_REQUEST['buscadorParaEliminar2'])){

		$NOM=$_POST['IdentificadorParaEliminar'];
		$model2=new Factura();
		//La siguiente linea es para ver la tabla de facturas
		$model2->Eliminar($NOM);
		//La siguiente linea es para eliminar
		$clase=new vista3();
		$clase->confirmar();
	}
		

	
	
	
	
?>
		
		
		
   	