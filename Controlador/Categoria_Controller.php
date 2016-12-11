<?php 

  include("../Modelos/Categoria_Model.php");
  include("../Idiomas/idiomas.php");
  include("../Vistas/Categoria_ADD_Vista.php");
  include("../Vistas/Categoria_DELETE_Vista.php");
  include("../Vistas/Categoria_SHOW_Vista.php");
  include("../Vistas/Categoria_VIEW_Vista.php");
  include("../Vistas/Categoria_EDIT_Vista.php");
  include("../Vistas/MenuPrincipal_SHOW_Vista.php");
  include("../Modelos/Funcionalidad_Model.php");
  session_start();

  	if(isset($_REQUEST['categorias']))
  		{
  			$idiom=new idiomas();
  			$vista=new Categoriaes_Menu();
  			$vista->crear($idiom);
  		}
  		if(isset($_REQUEST['Alta']))
      {
  		  $idiom=new idiomas();
  		  $alta=new CategoriaAlta();
        $model=new Categoria();
        $model->crearArrrayDescuentos();
        include("../Archivos/ArrayDescuentos.php");
        $arrays=new consult();
        $form=$arrays->array_consultar();
  			$alta->crear($idiom,TRUE,$form,null);
  		}
  		if (isset($_REQUEST['AltaCategoria']))
  		{ 
  			$idiom=new idiomas();
        $model=new Categoria();
        $nombre=$_POST['Nombre'];
        $descripcion=$_POST['Descripcion'];
        $descuentoCant=$_POST['Descuento'];
        $descuento = $model->getDescuentoId($descuentoCant);
			  $model->altaCategoria($nombre,$descripcion,$descuento);
         $origen="Alta";
          /*	//actualizo los permisos conforme a las nuevas funcionalidades
        $usuario=$model->getIdUser($_SESSION['usuario']);
       
        $grupo=$model->obtenergrupo($usuario);
        $modelfunc=new funcionalidad();
        $modelfunc->crearArraFuncionalidades($grupo);
        include("../Archivos/ArrayFuncionalidadesDeGrupo.php");
        $datos=new grupos1();
        $form=$datos->array_consultar();
        $funcionalidades[]="";
         for($numar=0;$numar<count($form);$numar++)
        {
          $funcionalidades[]=$form[$numar]["funcionalidad"];
        } 
        $modelfunc->accionesdeFuncionalidades($funcionalidades);*/
        $vista=new panel();
        $vista->constructor($idiom,$origen);
  			
        }
        
  		
  		if (isset($_REQUEST['Consultar']))
		 {  
        $origen="consultar";
			  $idiom=new idiomas();
			  $model=new Categoria();
			  $model->creararrayCategorias();
  			include("../Archivos/ArrayConsultarCategorias.php");
  			$arrays=new consult();
  			$form=$arrays->array_consultar();
  			$vistas=new Categoria_SHOW();
  			$vistas->crear($form,$idiom,$origen);
		}
  		if (isset($_POST['buscador']) and !isset($_REQUEST['ModificarView']))
  		
      	{
        $origen="consultar";
  			$idiom=new idiomas();
  			$name=$_POST['buscar'];
  			$model=new Categoria();
  			$model->buscarCategoria($name);
  			include("../Archivos/ArrayBuscarCategoria.php");
  			$arrays=new buscar();
  			$form=$arrays->array_consultar();
  			$vistas=new Categoria_SHOW();
  			$vistas->crear($form,$idiom,$origen);
	  		}

        if (isset($_REQUEST['Modificar1']))
        { 
        $idiom=new idiomas();
        $origen="Modificar";
        $model=new Categoria();
        $model->creararrayCategorias();
        include("../Archivos/ArrayConsultarCategorias.php");
        $arrays=new consult();
        $form=$arrays->array_consultar();
        $vistas=new Categoria_SHOW();
        $vistas->crear($form,$idiom,$origen);
        }

	  if (isset($_REQUEST['Modificar']))
  		{	
          $origen="Modificar";
  			  $idiom=new idiomas();
          $usuario=$_REQUEST['Modificar'];
          $model=new Categoria();
          $model->crearArrrayCategoria($usuario);
          include("../Archivos/ArrayConsultaCategoria.php");
          $arrays=new consultCategoria();
          $form=$arrays->array_consultar();
          $vistas=new Categoria_VIEW();
          $vistas->crear($form,$idiom,$origen);

  		}
      if(isset($_REQUEST['Modificar2']))
      {   
          $idiom=new idiomas();
          $origen="Modificar"; 
          $insc=$_REQUEST['Modificar2'];
          $vista=new CategoriaEDIT();
          $model=new Categoria();

          include("../Archivos/ArrayConsultaCategoria.php");
          $model->crearArrrayCategoria($insc);
          $arrayInsc = new consultCategoria();
          $formInsc = $arrayInsc->array_consultar();
          $model->crearArrrayDescuentos();
          include("../Archivos/ArrayDescuentos.php");
          $arrays=new consult();
          $form=$arrays->array_consultar();
          
          $vista->crear($idiom, $formInsc, TRUE,$form,$insc,null);
      }
  		if (isset($_REQUEST['ModificarCategoria']))
  		{
        $msg="";
  			$idiom=new idiomas();
        $model=new Categoria();
        $insc=$_REQUEST['ModificarCategoria'];
        $nombre=$_POST['Nombre'];
        $descripcion=$_POST['Descripcion'];
        $descuentoCant=$_POST['Descuento'];
        $descuento = $model->getDescuentoId($descuentoCant);
        $usuario=$model->getIdUser($_SESSION['usuario']);
        $resultado=$model->comprobarcategoria($insc);
        if($resultado==TRUE)
        { 

          $origen="Modificar";
          $model->modificarCategoria($insc,$nombre,$descripcion,$descuento);
        $model=new Categoria();
        $user=$_SESSION['usuario'];
        $grupo=$model->obtenergrupo($user);
        $modelfunc=new funcionalidad();
        $modelfunc->crearArraFuncionalidades($grupo);
        include("../Archivos/ArrayFuncionalidadesDeGrupo.php");
        $datos=new grupos1();
        $form=$datos->array_consultar();
        $funcionalidades[]="";
         for($numar=0;$numar<count($form);$numar++)
        {
          $funcionalidades[]=$form[$numar]["funcionalidad"];
        } 
        $modelfunc->accionesdeFuncionalidades($funcionalidades);

  				$idiom=new idiomas();
  				 $vista=new panel();
          $vista->constructor($idiom,$origen);
  			}else{
			   	$idiom=new idiomas();
  				$vista=new CategoriaEDIT();
          $model=new Categoria();
         //$model->crearArrrayGrupo();
         include("../Archivos/ArrayGrupo_usuarios.php");
         $arrays=new consult();
         $form=$arrays->array_consultar();
  				$vista->crear($idiom, $formInsc, FALSE ,$form,$insc,null);
  			}
        }
  		
      if(isset($_REQUEST['ModificarView']))
      {
        $origen="Modificar";
        $idiom=new idiomas();
        $name=$_POST['buscar'];
        $model=new Categoria();
        $model->buscarCategoria($name);
        include("../Archivos/ArrayBuscarCategoria.php");
        $arrays=new buscar();
        $form=$arrays->array_consultar();
        $vistas=new Categoria_SHOW();
        $vistas->crear($form,$idiom,$origen);
      }
  		if(isset($_REQUEST['Baja'])){

  				$idiom=new idiomas();
          $model=new Categoria();
          $model->creararrayCategorias();
          include("../Archivos/ArrayConsultarCategorias.php");
          $arrays=new consult();
          $form=$arrays->array_consultar();
  				$vista=new CategoriaDelete();
  				$vista->crear($idiom,TRUE,$form);

  		}
  		 if (isset($_REQUEST['BajaCategoria']))
  			{

  			$idiom=new idiomas();
  			$cat=$_REQUEST['BajaCategoria'];
  			$model=new Categoria();
  			$resultado=$model->comprobarcategoria($cat);
  			if($resultado==TRUE){
          $origen="Baja";
  				$model->eliminarCategoria($cat);
  				$idiom=new idiomas();
  				$vista=new panel();
  				$vista->constructor($idiom,$origen);
  			}else{
				$idiom=new idiomas();
          $model->creararrayCategorias();
        include("../Archivos/ArrayConsultarCategorias.php");
        $arrays=new consult();
        $form=$arrays->array_consultar();
  				$vista=new CategoriaDelete();
  				$vista->crear($idiom,FALSE,$form);
  			}
  			}
        
        if (isset($_REQUEST['BajaShow']))
        {

        $idiom=new idiomas();
        $name=$_POST['buscar'];
        $model=new Categoria();
        $model->buscarCategoria($name);
        include("../Archivos/ArrayBuscarCategoria.php");
        $arrays=new buscar();
        $form=$arrays->array_consultar();
        $vista=new CategoriaDelete();
        $vista->crear($idiom,TRUE,$form);

        }
        if(isset($_REQUEST['View']))
        {  
          $origen="consultar";
          $idiom=new idiomas();
          $insc=$_REQUEST['View'];
          $model=new Categoria();
          $model->crearArrrayCategoria($insc);
          include("../Archivos/ArrayCategorias.php");
          $arrays=new consult();
          $form=$arrays->array_consultar();
          $vistas=new Categoria_VIEW();
          $vistas->crear($form,$idiom,$origen);
        }
        if(isset($_REQUEST['ViewBaja']))
        { 

          $origen="Baja";
          $idiom=new idiomas();
          $cat=$_REQUEST['ViewBaja'];
          $model=new Categoria();
          $model->crearArrrayCategoria($cat);
          include("../Archivos/ArrayConsultaCategoria.php");
          $arrays=new consultCategoria();
          $form=$arrays->array_consultar();
          $vistas=new Categoria_VIEW();
          $vistas->crear($form,$idiom,$origen);
           }
  			if (isset($_REQUEST['Volver']))
  			{
          $origen="inicio";
  			$idiom=new idiomas();
  			$vista=new panel();
  			$vista->constructor($idiom,$origen);
  			}
        if(!isset($_SESSION['usuario'])){
          session_destroy();
          echo"<script>window.location=\"../index.php\"</script>";
        }

  		
?>