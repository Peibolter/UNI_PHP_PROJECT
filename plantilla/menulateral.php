
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
                        $funcionalidad=TRUE;
                        for($numar=0;$numar<count($form);$numar++)
                            {
                                if($form[$numar]["nombre"]=="Gestion de Funcionalidades" and $funcionalidad==TRUE)
                                {   $funcionalidad=FALSE;
                                     ?>  
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-cogs" aria-hidden="true"></i> <?php echo $idioma['Funcionalidad'];?> <i class="fa fa-fw fa-caret-down" id =""></i></a>
                        <ul id="demo" class="collapse">
                                 <?php    if($form[$numar]["alta"]=="1"){ 
                                     ?>
                            <li>
                                <a href="..\Controlador\Funcionalidad_Controller.php?Alta"><?php echo $idioma['AltaFuncionalidad'];?></a>
                            </li>
                                     <?php  }if($form[$numar]["eliminar"]=="1"){  ?>
                            <li>
                                <a href="..\Controlador\Funcionalidad_Controller.php?Baja"><?php echo $idioma['BajaFuncionalidad'];?></a>
                            </li>
                                 <?php  }if($form[$numar]["modificar"]=="1"){  ?>
                             <li>
                                <a href="..\Controlador\Funcionalidad_Controller.php?Modificar1"><?php echo $idioma['ModificarFuncionalidad'];?></a>
                            </li>
                            <?php  }if($form[$numar]["consultar"]=="1"){  ?>
                             <li>
                                <a href="..\Controlador\Funcionalidad_Controller.php?Consultar"><?php echo $idioma['ConsultarFuncionalidad'];?></a>
                            </li>
                            <?php  }}}?>
                        </ul>
                        </li>
                    </li>

                    <li>
                        <li>

                         <?php 
                         $Usuario=TRUE;
                         for($numar=0;$numar<count($form);$numar++)
                            {
                         if($form[$numar]["nombre"]=="Gestion de Usuarios" and $Usuario==TRUE){
                            $Usuario=FALSE;
                           ?>
                        <a href="javascript:;" data-toggle="collapse" data-target="#down3"><i class="fa fa-user"></i> <?php echo $idioma['GestionUsuarios'];?> <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="down3" class="collapse">
                             <?php    if($form[$numar]["alta"]=="1"){ ?>
                            <li>
                                <a href="..\Controlador\Usuario_Controller.php?Alta"><?php echo $idioma['AltaUsuario'];?></a>
                            </li>
                               <?php  }if($form[$numar]["eliminar"]=="1"){  ?>
                            <li>
                                <a href="..\Controlador\Usuario_Controller.php?Baja"><?php echo $idioma['BajaUsuario'];?></a>
                            </li>
                                 <?php  }if($form[$numar]["modificar"]=="1"){  ?>
                            <li>
                                <a href="..\Controlador\Usuario_Controller.php?Modificar1"><?php echo $idioma['ModificacionUsuario'];?></a>
                            </li>
                            <?php  }if($form[$numar]["consultar"]=="1"){  ?>
                            <li>
                                <a href="..\Controlador\Usuario_Controller.php?Consultar"><?php echo $idioma['ConsultaUsaurio'];?></a>
                            </li>
                            <?php  }}}?>
                        </ul>
                        </li>
                    </li>
                    <li>
                        <li>
                        <?php
                        $Grupo=TRUE;
                         for($numar=0;$numar<count($form);$numar++)
                            {
                            if($form[$numar]["nombre"]=="Gestion de Grupos" and $Grupo==TRUE){
                                 $Grupo=FALSE;
                              ?>
                        <a href="javascript:;" data-toggle="collapse" data-target="#down2"><i class="fa fa-users"></i> <?php echo $idioma['Grupo'];?> <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="down2" class="collapse">
                            <?php    if($form[$numar]["alta"]=="1"){ ?>
                            <li>
                                <a href="..\Controlador\Grupo_Controller.php?Alta"><?php echo $idioma['AltaGrupo'];?></a>
                            </li>
                             <?php  }if($form[$numar]["eliminar"]=="1"){  ?>
                            <li>
                                <a href="..\Controlador\Grupo_Controller.php?Baja"><?php echo $idioma['BajaGrupo'];?></a>
                            </li>
                                 <?php  }if($form[$numar]["modificar"]=="1"){  ?>
                            <li>
                                <a href="..\Controlador\Grupo_Controller.php?Modificar1"><?php echo $idioma['ModificarGrupo'];?></a>
                            </li>
                                <?php  }if($form[$numar]["consultar"]=="1"){  ?>
                            <li>
                                <a href="..\Controlador\Grupo_Controller.php?Consultar"><?php echo $idioma['ConsultarGrupo'];?></a>
                            </li>
                                <?php   }}}?>
                       </ul>
                      </li>
                    </li>
                    <!--<li>
                        <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#down1"><i class="fa fa-file-text-o" aria-hidden="true"></i><?php echo $idioma['GestionarAcciones'];?> <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="down1" class="collapse">
                            <li>
                                <a href="..\Controlador\Accion_Controller.php?Alta"><?php //echo $idioma['AltaAcciones'];?></a>
                            </li>
                            <li>
                                <a href="..\Controlador\Accion_Controller.php?Baja"><?php //echo $idioma['BajaAccion'];?></a>
                            </li>
                            <li>
                                <a href="..\Controlador\Accion_Controller.php?Modificar1"><?php //echo $idioma['ModificarAccion'];?></a>
                            </li>
                            <li>
                                <a href="..\Controlador\Accion_Controller.php?Consultar"><?php //echo $idioma['ConsultarAccion'];?></a>
                            </li>
                        </ul>
                        </li>
                    </li>
                    <li>
                       <li>
                        <a href="..\Controlador\Permisos_Controller.php?Permisos" data-toggle="collapse" data-target="#es"><i class="fa fa-check-square-o" aria-hidden="true"></i> <?php echo $idioma['asignarpermisos'];?></a>
                       </li>
                    </li>
                </ul>-->
            </div>
              </nav>

<?php 
 }
}?>
        <!-- /#page-wrapper -->