
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
                          <?php  
                         for($numar12=0;$numar12<count($form);$numar12++)
                            {
                            if($form[$numar12]["nombre"]=="Crear Notificacion"){
                             for($cont=0;$cont<5;$cont++){ 

                                     if(isset($form[$numar12]["accion"][$cont])and $form[$numar12]["accion"][$cont]=="Alta" ){ ?>
                        <li>
                         <a href="..\Controlador\Notificacion_Controller.php?notificacion" ><i class="fa fa-archive" aria-hidden="true"></i> <?php echo $idioma['notificacion'];?> </a>
                        </li>
                          <?php   }}}}?>
                           <?php  
                         for($numar=0;$numar<count($form);$numar++)
                            {
                            if($form[$numar]["nombre"]=="Crear Notificacion Correo"){
                             for($cont=0;$cont<5;$cont++){ 

                                     if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Alta" ){ ?>
                         <li>
                         <a href="..\Controlador\Notificacion_Controller.php?notificacionemail" ><i class="fa fa-archive" aria-hidden="true"></i> <?php echo $idioma['notificacionemail'];?> </a>
                        </li>
                          <?php   }}}}?>
               

                <li>
                        <li>
                         <?php
                         for($numar=0;$numar<count($form);$numar++)
                            {
                            if($form[$numar]["nombre"]=="Gestion de Alumnos"){
                              ?>
                        <a href="javascript:;" data-toggle="collapse" data-target="#down5"><i class="fa fa-file-text-o" aria-hidden="true"></i><?php echo $idioma['Gestionar Alumnos'];?> <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="down5" class="collapse">
                            <li>
                              <?php  for($cont=0;$cont<5;$cont++){ 

                                     if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Alta" ){?>
                                <a href="..\Controlador\Alumno_Controller.php?AltaMenu"><?php echo $idioma['AltaAlumno'];?></a>
                            </li>
                              <?php  } if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Baja"){ ?>
                            <li>
                                <a href="..\Controlador\Alumno_Controller.php?BajaMenu"><?php echo $idioma['BajaAlumno']; ?> </a>
                            </li>
                              <?php  }if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Modificar"){ ?>
                            <li>
                                <a href="..\Controlador\Alumno_Controller.php?ModificarMenu"><?php echo $idioma['ModificarAlumno'];?></a>
                            </li>
                             <?php  }if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Consultar"){  ?>
                            <li>
                                <a href="..\Controlador\Alumno_Controller.php?ConsultarMenu"><?php echo $idioma['ConsultarAlumno'];?></a>
                            </li>
                                       
                         <?php   }} echo"</ul>";}}?>
                        </li>
                        </li>
                        
                        <li>
                        <li>
                         <?php
                         for($numar=0;$numar<count($form);$numar++)
                            {
                            if($form[$numar]["nombre"]=="Gestion de Asistencia"){
                            ?>
                        <a href="javascript:;" data-toggle="collapse" data-target="#downAsistencia"><i class="fa fa-file-text-o" aria-hidden="true"></i><?php echo $idioma['Gestionar Asistencia'];?> <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="downAsistencia" class="collapse">
                            <li>
                              <?php  for($cont=0;$cont<5;$cont++){ 

                                     if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Alta" ){?>
                                <a href="..\Controlador\Asistencia_Controller.php?AltaMenu"><?php echo $idioma['AltaAsistencia'];?></a>
                            </li>
                              <?php  } if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Baja"){ ?>
                            <li>
                                <a href="..\Controlador\Asistencia_Controller.php?BajaMenu"><?php echo $idioma['BajaAsistencia']; ?> </a>
                            </li>
                              <?php  }if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Modificar"){ ?>
                            <li>
                                <a href="..\Controlador\Asistencia_Controller.php?ModificarMenu"><?php echo $idioma['ModificarAsistencia'];?></a>
                            </li>
                             <?php  }if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Consultar"){  ?>
                            <li>
                                <a href="..\Controlador\Asistencia_Controller.php?ConsultarMenu"><?php echo $idioma['ConsultarAsistencia'];?></a>
                            </li>
                                       
                         <?php   }} echo"</ul>";}}?>
                        </li>
                        </li>
                          <li>
                        <li>
                         <?php    
                         for($numar=0;$numar<count($form);$numar++)
                            {

                         if($form[$numar]["nombre"]=="Gestion de Espacios"){
                           ?>
                        <a href="javascript:;" data-toggle="collapse" data-target="#down10"><i class="fa fa-globe"></i> <?php echo $idioma['GestionEspacios'];?> <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="down10" class="collapse">
                        <?php  for($cont=0;$cont<5;$cont++){ 

                            if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Alta" ){?>
                                 
                            <li>
                                <a href="..\Controlador\Espacios_Controller.php?Alta"><?php echo $idioma['AltaEspacios'];?></a>
                            </li>
                               <?php  } if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Baja"){ ?>
                            <li>
                                <a href="..\Controlador\Espacios_Controller.php?Baja"><?php echo $idioma['BajaEspacios'];?></a>
                            </li>
                                  <?php  }if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Modificar"){ ?>
                            <li>
                                <a href="..\Controlador\Espacios_Controller.php?Modificar"><?php echo $idioma['ModificacionEspacios'];?></a>
                            </li>
                            <?php  }if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Consultar"){  ?>
                            <li>
                                <a href="..\Controlador\Espacios_Controller.php?Consultar"><?php echo $idioma['ConsultaEspacios'];?></a>
                            </li>
                            
                        <?php  }} echo"</ul>";} } ?>
                        
                        </li>
                    </li>

                    <li>
                        <li>
                         <?php    
                         for($numar=0;$numar<count($form);$numar++)
                            {

                         if($form[$numar]["nombre"]=="Gestion de Actividades"){
                           ?>
                        <a href="javascript:;" data-toggle="collapse" data-target="#down11"><i class="fa fa-asterisk"></i> <?php echo $idioma['GestionActividades'];?> <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="down11" class="collapse">
                        <?php  for($cont=0;$cont<5;$cont++){ 

                            if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Alta" ){?>
                                 
                            <li>
                                <a href="..\Controlador\Actividad_Controller.php?Alta"><?php echo $idioma['AltaActividades'];?></a>
                            </li>
                               <?php  } if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Baja"){ ?>
                            <li>
                                <a href="..\Controlador\Actividad_Controller.php?Baja"><?php echo $idioma['BajaActividades'];?></a>
                            </li>
                                  <?php  }if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Modificar"){ ?>
                            <li>
                                <a href="..\Controlador\Actividad_Controller.php?Modificar"><?php echo $idioma['ModificacionActividades'];?></a>
                            </li>
                            <?php  }if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Consultar"){  ?>
                            <li>
                                <a href="..\Controlador\Actividad_Controller.php?Consultar"><?php echo $idioma['ConsultaActividades'];?></a>
                            </li>
                            
                        <?php  }} echo"</ul>";} } ?>
                        
                        </li>
                    </li>
                    <li>
                        <li>
                         <?php    
                         for($numar=0;$numar<count($form);$numar++)
                            {

                         if($form[$numar]["nombre"]=="Gestion de Inscripciones"){
                           ?>
                        <a href="javascript:;" data-toggle="collapse" data-target="#downInsc"><i class="fa fa-file-text-o"></i> <?php echo $idioma['GestionInscripciones'];?> <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="downInsc" class="collapse">
                        <?php  for($cont=0;$cont<5;$cont++){ 

                                     if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Alta" ){?>
                                 
                            <li>
                                <a href="..\Controlador\Inscripcion_Controller.php?Alta"><?php echo $idioma['AltaInscripcion'];?></a>
                            </li>
                               <?php  } if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Baja"){ ?>
                            <li>
                                <a href="..\Controlador\Inscripcion_Controller.php?Baja"><?php echo $idioma['BajaInscripcion'];?></a>
                            </li>
                                  <?php  }if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Modificar"){ ?>
                            <li>
                                <a href="..\Controlador\Inscripcion_Controller.php?Modificar1"><?php echo $idioma['ModificarInscripcion'];?></a>
                            </li>
                            <?php  }if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Consultar"){  ?>
                            <li>
                                <a href="..\Controlador\Inscripcion_Controller.php?Consultar"><?php echo $idioma['ConsultarInscripcion'];?></a>
                            </li>
                            
                        <?php  }} echo"</ul>";} } ?>
                        
                        </li>

                    </li>
                    <li>
                        <li>
                         <?php    
                         for($numar=0;$numar<count($form);$numar++)
                            {

                         if($form[$numar]["nombre"]=="Gestion de Categorias"){
                           ?>
                        <a href="javascript:;" data-toggle="collapse" data-target="#downCat"><i class="fa fa-file-text-o"></i> <?php echo $idioma['GestionCategorias'];?> <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="downCat" class="collapse">
                        <?php  for($cont=0;$cont<5;$cont++){ 

                                     if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Alta" ){?>
                                 
                            <li>
                                <a href="..\Controlador\Categoria_Controller.php?Alta"><?php echo $idioma['AltaCategoria'];?></a>
                            </li>
                               <?php  } if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Baja"){ ?>
                            <li>
                                <a href="..\Controlador\Categoria_Controller.php?Baja"><?php echo $idioma['BajaCategoria'];?></a>
                            </li>
                                  <?php  }if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Modificar"){ ?>
                            <li>
                                <a href="..\Controlador\Categoria_Controller.php?Modificar1"><?php echo $idioma['ModificarCategoria'];?></a>
                            </li>
                            <?php  }if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Consultar"){  ?>
                            <li>
                                <a href="..\Controlador\Categoria_Controller.php?Consultar"><?php echo $idioma['ConsultarCategoria'];?></a>
                            </li>
                            
                        <?php  }} echo"</ul>";} } ?>
                        
                        </li>
                    </li>
                    <li>
                    
                     <li>
                        <li>
                         <?php    
                         for($numar=0;$numar<count($form);$numar++)
                            {

                         if($form[$numar]["nombre"]=="Gestion de Reservas de Espacios"){
                           ?>
                        <a href="javascript:;" data-toggle="collapse" data-target="#down142"><i class="fa fa-globe"></i> <?php echo $idioma['GestionReservasDeEspacios'];?> <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="down142" class="collapse">
                        <?php  for($cont=0;$cont<5;$cont++){ 

                            if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Alta" ){?>
                                 
                            <li>
                                <a href="#"><?php echo $idioma['AltaReservaEspacio'];?></a>
                            </li>
                               <?php  } if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Baja"){ ?>
                            <li>
                                <a href="#"><?php echo $idioma['BajaReservaEspacio'];?></a>
                            </li>
                               <?php  }if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Consultar"){  ?>
                            <li>
                                <a href="#"><?php echo $idioma['ConsultaReservaEspacio'];?></a>
                            </li>
                            
                        <?php  }} echo"</ul>";} } ?>
                        
                        </li>
                    </li>

                    <li>
                        <li>
                         <?php    
                         for($numar=0;$numar<count($form);$numar++)
                            {

                         if($form[$numar]["nombre"]=="Gestion de Reservas de Actividades"){
                           ?>
                        <a href="javascript:;" data-toggle="collapse" data-target="#down143"><i class="fa fa-asterisk"></i> <?php echo $idioma['GestionReservasDeActividades'];?> <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="down143" class="collapse">
                        <?php  for($cont=0;$cont<5;$cont++){ 

                            if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Alta" ){?>
                                 
                            <li>
                                <a href="#"><?php echo $idioma['AltaReservaActividad'];?></a>
                            </li>
                               <?php  } if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Baja"){ ?>
                            <li>
                                <a href="#"><?php echo $idioma['BajaReservaActividad'];?></a>
                            </li>
                               <?php  }if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Consultar"){  ?>
                            <li>
                                <a href="#"><?php echo $idioma['ConsultaReservaActividad'];?></a>
                            </li>
                            
                        <?php  }} echo"</ul>";} } ?>
                        
                        </li>
                    </li>
                    <li>
                         <?php    
                         for($numar=0;$numar<count($form);$numar++)
                            {

                         if($form[$numar]["nombre"]=="Gestion de Descuentos"){
                           ?>
                        <a href="javascript:;" data-toggle="collapse" data-target="#downDesc"><i class="fa fa-file-text-o"></i> Gestion de descuentos <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="downDesc" class="collapse">
                        <?php  for($cont=0;$cont<5;$cont++){ 

                                     if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Alta" ){?>
                                 
                            <li>
                                <a href="../Vistas/creardescuento.php">Alta de descuento></a>
                            </li>
                               <?php  } if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Baja"){ ?>
                            <li>
                                <a href="../Vistas/eliminardescuento.php">Baja de descuento</a>
                            </li>
                                  <?php  }if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Modificar"){ ?>
                            <li>
                                <a href="../Vistas/modificardescuento.php">Modificar Descuento</a>
                            </li>
                            <?php  }if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Consultar"){  ?>
                            <li>
                                <a href="../Vistas/gdescuentos.php">Consultar descuentos</a>
                            </li>
                            
                        <?php  }} echo"</ul>";} } ?>
                        
                        </li>
                    </li>

                    <li>
                        <li>
                         <?php    
                         for($numar=0;$numar<count($form);$numar++)
                            {

                         if($form[$numar]["nombre"]=="Gestion de Reservas"){
                           ?>
                        <a href="javascript:;" data-toggle="collapse" data-target="#downRes"><i class="fa fa-file-text-o"></i> Gestion de Reservas Fisio <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="downRes" class="collapse">
                        <?php  for($cont=0;$cont<5;$cont++){ 

                                     if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Alta" ){?>
                                 
                            <li>
                                <a href="../Vistas/crearrf.php">Alta Reserva</a>
                            </li>
                               <?php  } if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Baja"){ ?>
                            <li>
                                <a href="../Vistas/eliminarrf.php">Baja Reserva</a>
                            </li>
                                  <?php  }if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Modificar"){ ?>
                            <li>
                                <a href="../Vistas/modificarrf.php">Modificar Reserva</a>
                            </li>
                            <?php  }if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Consultar"){  ?>
                            <li>
                                <a href="../Vistas/gRF.php">Consultar reservas</a>
                            </li>
                            
                        <?php  }} echo"</ul>";} } ?>
                        
                        </li>
                    </li>
                    
                 <li>
                        <li>
                 <a href="javascript:;" data-toggle="collapse" data-target="#downFactura"><i class="fa fa-university" aria-hidden="true"></i><?php echo $idioma['GestionFactura'];?> <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="downFactura" class="collapse">
                    <li>    
                        <a href="..\Controlador\Factura_Controller.php?NuevoPago"><?php echo $idioma['NuevaFactura'];?></a>
                    </li>
                    <li>
                        <a href="..\Controlador\Factura_Controller.php?ConsultaFactura"><?php echo $idioma['ConsultaFactura'];?></a>
                    </li>
                    <li>
                            <a href="..\Controlador\Caja_Controller.php?GestionDeCaja"><?php echo $idioma['GestionDeCaja'];?></a>
                        </li>
                    </ul>   

                        </li>
                    </li>
               
                 <li>
                        <li>
                         <?php
                         for($numar=0;$numar<count($form);$numar++)
                            {
                            if($form[$numar]["nombre"]=="Gestion de Eventos"){
                              ?>
                        <a href="javascript:;" data-toggle="collapse" data-target="#down77"><i class="fa fa-file-text-o" aria-hidden="true"></i><?php echo $idioma['GestionarEventos'];?> <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="down77" class="collapse">
                            <li>
                              <?php  for($cont=0;$cont<5;$cont++){ 

                                     if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Alta" ){?>
                                <a href="..\Controlador\Eventos_Controller.php?Alta"><?php echo $idioma['AltaEventos'];?></a>
                            </li>
                              <?php  } if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Baja"){ ?>
                            <li>
                                <a href="..\Controlador\Eventos_Controller.php?Baja"><?php echo $idioma['BajaEventos']; ?> </a>
                            </li>
                              <?php  }if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Modificar"){ ?>
                            <li>
                                <a href="..\Controlador\Eventos_Controller.php?Modificar1"><?php echo $idioma['ModificarEventos'];?></a>
                            </li>
                             <?php  }if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Consultar"){  ?>
                            <li>
                                <a href="..\Controlador\Eventos_Controller.php?Consultar"><?php echo $idioma['ConsultarEventos'];?></a>
                            </li>
                                       
                         <?php   }} echo"</ul>";}}?>
                        </li>
                        </li>
                        
                        
                        
                        <li>
                        <li>
                         <?php
                         for($numar=0;$numar<count($form);$numar++)
                            {
                            if($form[$numar]["nombre"]=="Gestion de Documentos"){
                              ?>
                        <a href="javascript:;" data-toggle="collapse" data-target="#down69"><i class="fa fa-file-text-o" aria-hidden="true"></i><?php echo $idioma['GestionarDocumentos'];?> <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="down69" class="collapse">
                            <li>
                              <?php  for($cont=0;$cont<5;$cont++){ 

                                     if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Alta" ){?>
                                <a href="..\Controlador\Documentos_Controller.php?Alta"><?php echo $idioma['AltaDocumentos'];?></a>
                            </li>
                              <?php  } if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Baja"){ ?>
                            <li>
                                <a href="..\Controlador\Documentos_Controller.php?Baja"><?php echo $idioma['BajaDocumentos']; ?> </a>
                            </li>
                              <?php  }if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Modificar"){ ?>
                            <li>
                                <a href="..\Controlador\Documentos_Controller.php?Modificar1"><?php echo $idioma['ModificarDocumentos'];?></a>
                            </li>
                             <?php  }if(isset($form[$numar]["accion"][$cont])and $form[$numar]["accion"][$cont]=="Consultar"){  ?>
                            <li>
                                <a href="..\Controlador\Documentos_Controller.php?Consultar"><?php echo $idioma['ConsultarDocumentos'];?></a>
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