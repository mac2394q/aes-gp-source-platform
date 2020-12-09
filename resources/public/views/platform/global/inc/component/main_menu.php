<?php session_start(); 

       include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');?>

<div  id="top_bar" class="main-menu material-menu menu-fixed menu-light menu-accordion menu-shadow expanded" data-scroll-to-active="true">

    <div class="main-menu-content">

        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="navigation-header open"><span>ROL : <?php echo $_SESSION['rol']; ?></span>

                <i class="fa fa-keyboard" data-toggle="tooltip" data-placement="right"

                    data-original-title="Paneles de administracion"></i>

            </li>

            <li class=" nav-item"><a href="<?php echo INDEX_PLATFORM_PATH; ?>"><i class="fa fa-home"></i>

                <span class="menu-title">INICIO</span></a>

            </li>



            <?php if($_SESSION['rol'] == "ADMINISTRADOR" || $_SESSION['rol'] == "LIDER OEA" || $_SESSION['rol'] == "ASISTENTE"){ ?>

            <li class="nav-item has-sub"><a href="#">

                    <i class="fa fa-code-branch"></i>

                    <span class="menu-title">TRABAJO</span>&nbsp;</a>

                <ul class="menu-content">

                    <li><a class="menu-item" href="<?php echo MODULE_APP_SERVER."trabajo/";?>">Listado de trabajos</a>

                    </li>

                    

                    <li><a class="menu-item" href="<?php echo MODULE_APP_SERVER."trabajo/registrarTrabajo.php";?>">Registrar  trabajo</a>

                    </li>

                </ul>

            </li>

            <?php }?>





            <?php if($_SESSION['rol'] == "ADMINISTRADOR" || $_SESSION['rol'] == "LIDER OEA" || $_SESSION['rol'] == "ASISTENTE"){ ?>

                <li class="nav-item has-sub"><a href="#">

                    <i class="fa fa-industry"></i>

                    <span class="menu-title">EMPRESA </span>&nbsp;</a>

                <ul class="menu-content">

                    <li><a class="menu-item" href="<?php echo MODULE_APP_SERVER."empresa/";?>">Listado de empresas</a>

                    </li>

                    <li><a class="menu-item" href="<?php echo MODULE_APP_SERVER."empresa/registrarEmpresa.php";?>">Registrar  empresa</a>

                    </li>

                    <li><a class="menu-item" href="<?php echo MODULE_APP_SERVER."empresa/grupos.php";?>"> Grupos empresariales</a>

                    </li>

                </ul>

            </li>

            <?php }?>

            <?php if($_SESSION['rol'] == "EMPRESA"){ ?>

            <li class="nav-item has-sub"><a href="#">

                    <i class="fa fa-industry"></i>

                    <span class="menu-title">MI FICHA </span>&nbsp;</a>

                <ul class="menu-content">

                    <li><a class="menu-item" href="<?php echo MODULE_APP_SERVER."empresa/verFicha.php?id=".$_SESSION['idempresa'];?>">Ver Ficha </a>

                    </li>

                    <li><a class="menu-item" href="<?php echo MODULE_APP_SERVER."trabajo/historialEmpresa.php?id=".$_SESSION['idempresa'];?>">Historial de Trabajos</a>

                    </li>

             

                </ul>

            </li>

            <?php }?>

            <?php if($_SESSION['rol'] == "GRUPO"){ ?>

            <li class="nav-item has-sub"><a href="#">

                    <i class="fa fa-industry"></i>

                    <span class="menu-title">MI FICHA </span>&nbsp;</a>

                <ul class="menu-content">

                   <!--  <li><a class="menu-item" href="<?php echo MODULE_APP_SERVER."empresa/verFicha.php?id=".$_SESSION['idgrupo'];?>">Ver Ficha </a>

                    </li> -->

                    <li><a class="menu-item" href="<?php echo MODULE_APP_SERVER."trabajo/historialEmpresa.php?id=".$_SESSION['idgrupo'];?>">Historial de Trabajos</a>

                    </li>

                    <!-- <li><a class="menu-item" href="<?php echo MODULE_APP_SERVER."empresa/autentificacionGrupo.php?id=".$_SESSION['idgrupo'];?>"> Autenticacion</a>

                    </li> -->

                </ul>

            </li>

            <?php }?>

            <?php if($_SESSION['rol'] == "ADMINISTRADOR" || $_SESSION['rol'] == "LIDER OEA" || $_SESSION['rol'] == "ASISTENTE" ){ ?>

            <li class="nav-item has-sub"><a href="#"><i class="fa fa-laptop"></i><span class="menu-title">PLANTILLA </span>&nbsp;</a>

                <ul class="menu-content">

                    <li><a class="menu-item" href="<?php echo MODULE_APP_SERVER."plantillas/";?>">Listado de plantillas</a></li>

                    <?php if($_SESSION['rol'] == "ADMINISTRADOR" ){ ?>

                    <li><a class="menu-item" href="<?php echo MODULE_APP_SERVER."plantillas/registrarPlantilla.php";?>">Registrar plantilla</a>

                    </li>

                    <?php }?>

                </ul>

            </li>

            <?php }?>

     

           

            

            <?php if($_SESSION['rol'] == "ADMINISTRADOR" || $_SESSION['rol'] == "LIDER OEA" || $_SESSION['rol'] == "ASISTENTE"){ ?>

            <li class="nav-item has-sub"><a href="#"><i class="fa fa-users"></i>

                    <span class="menu-title">USUARIOS AES</span>&nbsp;</a>

                <ul class="menu-content">

                    <li><a class="menu-item"

                            href="<?php echo MODULE_APP_SERVER."usuarios/index.php";?>">Colaboradores</a>

                    </li>

                    <li><a class="menu-item"

                            href="<?php echo MODULE_APP_SERVER."usuarios/registrarUsuario.php";?>">Registrar Usuarios</a>

                    </li>

                </ul>

            </li>

            <?php }?>

            <?php if($_SESSION['rol'] == "ESPECIALISTA" ){ ?>

            <li class="nav-item has-sub"><a href="#"><i class="fa fa-users"></i>

                    <span class="menu-title">MI PERFIL</span>&nbsp;</a>

                <ul class="menu-content">

                    <li><a class="menu-item"

                            href="<?php echo MODULE_APP_SERVER."usuarios/verFicha.php?id=".$_SESSION['idsesion'];?>">Ficha Especialista</a>

                    </li>

                </ul>

            </li>

            <?php }?>


            <?php if($_SESSION['rol'] == "ESPECIALISTA" ){ ?>

            <li class="nav-item has-sub"><a href="#"><i class="fa fa-code-branch"></i>

                    <span class="menu-title">MIS TRABAJOS</span>&nbsp;</a>

                <ul class="menu-content">

                    <li><a class="menu-item"

                            href="<?php echo MODULE_APP_SERVER."trabajo/historialEspecialista.php?id=".$_SESSION['idsesion'];?>">Historial</a>

                    </li>

                </ul>

            </li>

            <?php }?>

            

            <?php if($_SESSION['rol'] == "ESPECIALISTA" || $_SESSION['rol'] == "ADMINISTRADOR" || $_SESSION['rol'] == "LIDER OEA" || $_SESSION['rol'] == "ASISTENTE"){ ?>

            <li class="nav-item has-sub"><a href="#">

                    <i class="fa fa-tools"></i>

                    <span class="menu-title">HERRAMIENTAS </span>&nbsp;</a>

                <ul class="menu-content">

                    <li><a class="menu-item" href="https://smallpdf.com/es/convertidor-pdf">Convertidor de PDF</a>

                    </li>

                    <li><a class="menu-item" href="https://www.correctoronline.es/">Corrector  Español</a>

                    </li>

                    <li><a class="menu-item" href="https://languagetool.org/es/">Corrector  Idiomas</a>

                    </li>

                    <li><a class="menu-item" href="https://convertio.co/es/document-converter/">Convertidor de Formatos</a>

                    </li>

                </ul>

            </li>

            <?php }?>

        </ul>

    </div>

</div>