<?php 

class notificacioncorreo{
  function crear($idioma,$form,$mensaje){
      //incluimos el archivo de funciones
        include '../Funciones/funciones.php';
        include('../plantilla/cabecera.php');
        include("../Funciones/comprobaridioma.php");
        include("../Archivos/ArrayNotificaciondeUsuario.php");
       
        //comprobamos el idioma
        $clases=new comprobacion();
        $idiom=$clases->comprobaridioma($idioma);
        //
        //cargamos las notificaciones en la cabecera
        $datos=new datos();
        $formulario=$datos->array_consultar();
        $clase=new cabecera();
        $clase->crear($idiom,$formulario);
        include('../plantilla/menulateral.php');
        include("../Archivos/ArrayAccionesdelasFuncionalidades.php");
        //cargamos el array de funcionalidades acciones en el menu lateral
        $datos=new consultar60();
        $form54=$datos->array_consultar();
        $menus=new menulateral();
        $menus->crear($idiom,$form54);    
?>
<html>
<head>
<title>titulo</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js">
</script>
 
<script type="text/javascript">
$(document).ready(function(){  
 $("#chk_todos").click(function(){
 var checked_estado = this.checked;
  $(".chk").each(function(){
  this.checked = checked_estado;
  });
 }); 
});
</script>
</head>
    <div class="container well">
      <div class="row">
       <div class="col-xs-12">
      <?php  if($mensaje==FALSE){
        echo "<script>alert(\"".$idiom["configurarcorreo"]."\")</script>";
      } ?>
        <form id="form1" class="form-horizontal" method="post" action="../Controlador/Notificacion_Controller.php?correo" style="width: 50%;" name="form1">
        <fieldset><legend><?php echo $idiom['Notificacionescorreo']; ?></legend>
        <div class="form-group"><label class="col-sm-2 control-label" for="cuenta" id ="form1"><?php echo $idiom['alumnos'].":";?></label>
          <div class="input-group col-sm-6">
        <input type='checkbox' id='chk_todos' value="checkbox"><?php echo $idiom['all']; ?>
        <ul> 
        <?php  for ($numar =0;$numar<count($form);$numar++){ ?>
         <li>
          <input class="chk" type="checkbox" name="opcion[]" value="<?php echo $form[$numar]["email"];?>"><?php echo $form[$numar]["email"];?>
          <input type="hidden" name="nombre[]" value="<?php echo $form[$numar]["nombre"]; ?>" >
          </li>
        <?php } ?>
        </ul>
        </div></div>
        <div class="form-group"><label class="col-sm-2 control-label" for="asunto" id ="form1"><?php echo $idiom['asunto'].":";?></label>
         <div class="input-group col-sm-3">
        <input type='text' id='asunto' name='asunto' required>
         </div></div>
        <div class="form-group"><label class="col-sm-2 control-label" for="mensaje" id ="form1"><?php echo $idiom['mensaje']; ?>:</label>
          <div class="input-group col-sm-3">
            <textarea rows="4" cols="50" name="mensaje" required form="form1"></textarea>
            </div></div>
        </fieldset>
        <br>
          <label>
          <input type="submit" name="Submit" value="<?php echo $idiom['enviar'];?>" onClick="return confirm('<?php echo $idiom['seguronotificacion'] ?>)" >
          </label>
        
        </form>
        <?php
    include '../plantilla/pie.php';
  }
}