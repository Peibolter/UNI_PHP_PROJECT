
<!-- MenuLateral -->

<?php 

class menulateral{

	function crear($idioma,$form){

 		
?>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <li>
                       <?php 

                        for($numar=0;$numar<count($form);$numar++)
                            {
                                if($form[$numar]["nombre"]=="Gestion de Funcionalidades")
                                {  ?>
                                      
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-cogs" aria-hidden="true"></i> <?php echo $idioma['Funcionalidad'];?> <i class="fa fa-fw fa-caret-down" id =""></i></a>
                        <ul id="demo" class="collapse">
                                       <?php   
                                       for($cont=0;$cont<5;$cont++){ 

                                     if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Alta" ){  
                                      ?>
                                        
                            <li>
                                <a href="..\Controlador\Funcionalidad_Controller.php?Alta"><?php echo $idioma['AltaFuncionalidad'];?></a>
                            </li>
                                     <?php  } if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Baja"){ ?>
                            <li>
                                <a href="..\Controlador\Funcionalidad_Controller.php?Baja"><?php echo $idioma['BajaFuncionalidad'];?></a>
                            </li>
                                 <?php  }if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Modificar"){ ?>
                             <li>
                                <a href="..\Controlador\Funcionalidad_Controller.php?Modificar1"><?php echo $idioma['ModificarFuncionalidad'];?></a>
                            </li>
                    <?php  }if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Consultar"){  ?>
                             <li>
                                <a href="..\Controlador\Funcionalidad_Controller.php?Consultar"><?php echo $idioma['ConsultarFuncionalidad'];?></a>
                            </li>
                             
                         <?php  }} echo"</ul>";}} ?>
                        </li>
                    </li>
                    <li>
                        <li>
                         <?php    
                         for($numar=0;$numar<count($form);$numar++)
                            {

                         if($form[$numar]["nombre"]=="Gestion de Usuarios"){
                           ?>
                        <a href="javascript:;" data-toggle="collapse" data-target="#down3"><i class="fa fa-user"></i> <?php echo $idioma['GestionUsuarios'];?> <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="down3" class="collapse">
                        <?php  for($cont=0;$cont<5;$cont++){ 

                                     if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Alta" ){?>
                                 
                            <li>
                                <a href="..\Controlador\Usuario_Controller.php?Alta"><?php echo $idioma['AltaUsuario'];?></a>
                            </li>
                               <?php  } if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Baja"){ ?>
                            <li>
                                <a href="..\Controlador\Usuario_Controller.php?Baja"><?php echo $idioma['BajaUsuario'];?></a>
                            </li>
                                  <?php  }if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Modificar"){ ?>
                            <li>
                                <a href="..\Controlador\Usuario_Controller.php?Modificar1"><?php echo $idioma['ModificacionUsuario'];?></a>
                            </li>
                            <?php  }if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Consultar"){  ?>
                            <li>
                                <a href="..\Controlador\Usuario_Controller.php?Consultar"><?php echo $idioma['ConsultaUsaurio'];?></a>
                            </li>
                            
                        <?php  }} echo"</ul>";} } ?>
                        
                        </li>
                    </li>
                    <li>
                        <li>
                        <?php

                         for($numar=0;$numar<count($form);$numar++)
                            {
                            if($form[$numar]["nombre"]=="Gestion de Grupos"){
                              ?>
                        <a href="javascript:;" data-toggle="collapse" data-target="#down2"><i class="fa fa-users"></i> <?php echo $idioma['Grupo'];?> <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="down2" class="collapse">
                         <?php  for($cont=0;$cont<5;$cont++){ 

                                     if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Alta" ){?>
                            <li>
                                <a href="..\Controlador\Grupo_Controller.php?Alta"><?php echo $idioma['AltaGrupo'];?></a>
                            </li>
                             <?php  } if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Baja"){ ?>
                            <li>
                                <a href="..\Controlador\Grupo_Controller.php?Baja"><?php echo $idioma['BajaGrupo'];?></a>
                            </li>
                                  <?php  }if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Modificar"){ ?>
                            <li>
                                <a href="..\Controlador\Grupo_Controller.php?Modificar1"><?php echo $idioma['ModificarGrupo'];?></a>
                            </li>
                              <?php  }if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Consultar"){  ?>
                            <li>
                                <a href="..\Controlador\Grupo_Controller.php?Consultar"><?php echo $idioma['ConsultarGrupo'];?></a>
                            </li>
                                
                       <?php   }}echo"</ul>";}} ?>
                      </li>
                    </li>
                        <li>
                        <li>
                         <?php
                         for($numar=0;$numar<count($form);$numar++)
                            {
                            if($form[$numar]["nombre"]=="Gestion de Acciones"){
                              ?>
                        <a href="javascript:;" data-toggle="collapse" data-target="#down1"><i class="fa fa-file-text-o" aria-hidden="true"></i><?php echo $idioma['GestionarAcciones'];?> <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="down1" class="collapse">
                            <li>
                              <?php  for($cont=0;$cont<5;$cont++){ 

                                     if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Alta" ){?>
                                <a href="..\Controlador\Accion_Controller.php?Alta"><?php echo $idioma['AltaAcciones'];?></a>
                            </li>
                              <?php  } if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Baja"){ ?>
                            <li>
                                <a href="..\Controlador\Accion_Controller.php?Baja"><?php echo $idioma['BajaAccion']; ?> </a>
                            </li>
                              <?php  }if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Modificar"){ ?>
                            <li>
                                <a href="..\Controlador\Accion_Controller.php?Modificar1"><?php echo $idioma['ModificarAccion'];?></a>
                            </li>
                             <?php  }if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Consultar"){  ?>
                            <li>
                                <a href="..\Controlador\Accion_Controller.php?Consultar"><?php echo $idioma['ConsultarAccion'];?></a>
                            </li>
                                       
                         <?php   }} echo"</ul>";}}?>
                        </li>
                        </li>
                   
                </ul>
            </div>
              </nav>

<?php 
 }
}?>
        <!-- /#page-wrapper -->