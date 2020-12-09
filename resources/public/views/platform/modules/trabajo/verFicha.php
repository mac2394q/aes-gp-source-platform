<?php session_start(); ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
    <?php
include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once (PLATFORM_PATH."global/inc/platform/head.php");
require_once (LIB_PATH."session.php");
require_once (CONTROLLERS_PATH."empresaController.php");
require_once (CONTROLLERS_PATH."trabajoController.php");
require_once (CONTROLLERS_PATH."usuarioController.php");
session::verificarSesion($_SESSION['idsesion']);
date_default_timezone_set('America/Bogota');
setlocale(LC_ALL,"es_CO");
$objTrabajo = trabajoController::trabajoId($_GET['id']);
$entidad = entidadController::obtenerEntidad($objTrabajo->getId_entrada_trabajo());
$idempresa = $_GET['id'];
//print_r($entidad);
//print_r($objTrabajo);
?>
    <style>
        .user-profile {
            background: url(https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/app-assets/images/gallery/dark-menu.jpg) center center no-repeat;
        }
        .user-profile .user-info {
            background-color: rgba(0, 0, 0, 0.35);
        }
    </style>
</head>
<!-- END: Head-->
<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern material-vertical-layout material-layout 2-columns   fixed-navbar"
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:75%;">
    <input type="hidden" name="idempresa" id="idempresa" value="<?php echo  $idempresa; ?>" />
    <input type="hidden" name="idsesion" id="idsesion" value="" />
    <input type="hidden" value="0" name="certificadosDinamicos" />
    <!-- BEGIN: Header-->
    <?php require_once (PLATFORM_PATH."global/inc/component/fixed_top.php"); ?>
    <!-- END: Header-->
    <!-- BEGIN: Main Menu-->
    <?php require_once (PLATFORM_PATH."global/inc/component/main_menu.php"); ?>
    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-header row">
            <div class="content-header-dark bg-img col-12">
                <div class="row">
                    <div class="content-header-left col-md-9 col-12 mb-2">
                        <h3 class="content-header-title titulo">Módulo Trabajo</h3>
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <?php if($_SESSION['rol'] == "ADMINISTRADOR" || $_SESSION['rol'] == "LIDER OEA" || $_SESSION['rol'] == "ASISTENTE" ){ ?>
                                    <li class="breadcrumb-item active parrafo text-black"><a class="text-black"
                                            href="index.php">Listado </a>
                                    </li>
                                    <?php }?>
                                    <li class="breadcrumb-item active parrafo text-black">Ver Ficha de Trabajo
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-wrapper">
            <div class="content-body">
                <!-- contendio -->
                <div class="row">
                    <div class="col-md-12">
                        <ul class="list-inline mb-0">
                            <?php if($objTrabajo->getEstado_trabajo() != "CANCELADO" ){ ?>
                            <li><a href="<?php echo "gestionProyecto.php?id=".$idempresa; ?>"
                                    class="btn text-white capa round btn-min-width mr-1 mb-1 waves-effect waves-light">
                                    <i class="fa fa-business-time fa-2x"></i>&nbsp; Gestión de Proyectos </a>
                            </li>
                            <?php }?>
                            <?php if($_SESSION['rol'] == "ADMINISTRADOR" || $_SESSION['rol'] == "LIDER OEA" || $_SESSION['rol'] == "ASISTENTE" ){ ?>
                            <?php if($objTrabajo->getEstado_trabajo() != "CANCELADO"){ ?>
                            <li><a href="<?php echo "gestionContractos.php?id=".$idempresa; ?>"
                                    class="btn text-white capa round btn-min-width mr-1 mb-1 waves-effect waves-light">
                                    <i class="fa fa-paste fa-2x"></i>&nbsp; Gestión de Contratos </a>
                            </li>
                            <?php }?>
                            <?php }?>
                            <?php if($_SESSION['rol'] == "ADMINISTRADOR" || $_SESSION['rol'] == "LIDER OEA" || $_SESSION['rol'] == "ASISTENTE" ){ ?>
                            <?php if($objTrabajo->getEstado_trabajo() != "CANCELADO"){ ?>
                            <li><a href="<?php echo "dian.php?id=".$idempresa; ?>"
                                    class="btn text-white capa round btn-min-width mr-1 mb-1 waves-effect waves-light">
                                    <i class="fa fa-balance-scale fa-2x"></i>&nbsp; Inscripción Dian </a>
                            </li>
                            <?php }?>
                            <?php }?>
                         
                           
                            <?php if( $_SESSION['rol'] == "ADMINISTRADOR" || $_SESSION['rol'] == "LIDER OEA" || $_SESSION['rol'] == "ASISTENTE" ){ ?>
                            <?php if($objTrabajo->getEstado_trabajo() != "CANCELADO" && $objTrabajo->getEstado_trabajo() != "TERMINADO"){ ?>
                            <li><a href="#" id="cancelarTrabajo"
                                    class="btn btn-danger round btn-min-width mr-1 mb-1 waves-effect waves-light">
                                    <i class="fa fa-ban fa-2x"></i>&nbsp; Cancelar Trabajo </a>
                            </li>
                            <?php }?>
                            <?php }?>
                            <li><h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4>
                            </li>
                            <?php if( $_SESSION['rol'] == "ADMINISTRADOR" || $_SESSION['rol'] == "LIDER OEA" || $_SESSION['rol'] == "ASISTENTE"){ ?>
                            <?php if($objTrabajo->getEstado_trabajo() != "CANCELADO" && $objTrabajo->getEstado_trabajo() != "TERMINADO"){ ?>
                            <li><a href="<?php echo "CierreTrabajo.php?id=".$idempresa; ?> "
                                    class="btn btn-secondary round btn-min-width mr-1 mb-1 waves-effect waves-light">
                                    <i class="fa fa-archive fa-2x"></i>&nbsp; Cierre del Trabajo </a>
                            </li>
                            <?php }?>
                            <?php }?>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="card" style="">
                            <div class="card-header">
                                <h4 class="card-title parrafo" id="basic-layout-form">
                                    Estado del Proceso:
                                    <? echo trabajoController::estadoColorTag($objTrabajo->getEstado_trabajo()); ?>
                                </h4>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="card-text">
                                        <div id="smg"></div>
                                    </div>
                                    <div class="form">
                                        <div class="form-body">
                                            <h2 class="form-section"><i class="fa fa-id-card-alt"></i>
                                                Información General
                                            </h2>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">
                                                            <h5 class="card-title">
                                                                Entidad:
                                                            </h5>
                                                        </label>
                                                        <input readonly type="text" class="form-control"
                                                            placeholder=". . ." name="razonSocial" id="razonSocial"
                                                            value="<?php echo $entidad['entidad'];?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">
                                                            <h5 class="card-title">
                                                                Tipo de Entidad: </h5>
                                                        </label>
                                                        <input readonly type="text" class="form-control"
                                                            placeholder=". . ." name="nit" id="nit"
                                                            value="<?php echo $entidad['tipo'];?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                         
                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <?php  
                            
                            if($_SESSION['rol'] == "ADMINISTRADOR" ||
                             $_SESSION['rol'] == "LIDER OEA" || 
                             $_SESSION['rol'] == "ASISTENTE" || 
                             $_SESSION['rol'] == "EMPRESA" || 
                             $_SESSION['rol'] == "GRUPO" ||
                             $_SESSION['idsesion'] == $objTrabajo->getId_usuario_diagnostico() ){?>
                            <div class="col-xl-4 col-lg-6 col-12">
                                <div class="card pull-up">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="media-body text-left">
                                                    <h3 class="secondary">
                                                        <li class=" fa fa-user-tag info fa-2x"></li>&nbsp;
                                                        <?php
                                                       
                                                            if(is_null($objTrabajo->getId_usuario_diagnostico()) == true){
                                                                echo "<li class='fa fa-ban'></li>&nbsp;Usuario no Asignado.";
                                                            }else{
                                                                $user = usuarioController::usuarioId($objTrabajo->getId_usuario_diagnostico());
                                                                echo $user->getNombre_usuario();
                                                            }
                                                        ?>
                                                    </h3>
                                                    <a href="<?php echo "diagnostico.php?id=".$_GET['id']; ?>"
                                                        title="Diagnotico del Proceso">
                                                        <h6 class="parrafo">Proceso: Diagnóstico</h6>
                                                    </a>
                                                </div>
                                                <div>
                                                    <a href="<?php echo "diagnostico.php?id=".$_GET['id']; ?>"
                                                        title="Diagnotico del Proceso"><i
                                                            class="fa fa-tasks success font-large-2 float-right"></i>&nbsp;</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }
                           
                            if($_SESSION['rol'] == "ADMINISTRADOR" ||
                             $_SESSION['rol'] == "LIDER OEA" || 
                             $_SESSION['rol'] == "ASISTENTE" || 
                             $_SESSION['rol'] == "EMPRESA" || 
                             $_SESSION['rol'] == "GRUPO" ||
                             $_SESSION['idsesion'] == $objTrabajo->getId_usuario_implementacion() ){?>
                            <div class="col-xl-4 col-lg-6 col-12">
                                <div class="card pull-up">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="media-body text-left">
                                                    <h3 class="secondary">
                                                        <li class="fa fa-user-tag info fa-2x"></li>&nbsp;
                                                        <?php
                                                       
                                                            if(is_null($objTrabajo->getId_usuario_implementacion()) == true){
                                                                echo "<li class='fa fa-ban'></li>&nbsp;Usuario no Asignado.";
                                                            }else{
                                                                $user = usuarioController::usuarioId($objTrabajo->getId_usuario_implementacion());
                                                                echo $user->getNombre_usuario();
                                                            }
                                                        ?>
                                                    </h3>
                                                    <a href="<?php echo "implementacion.php?id=".$_GET['id']; ?>"
                                                        title="Diagnotico del Proceso">
                                                        <h6 class="parrafo">Proceso: Implementación</h6>
                                                    </a>
                                                </div>
                                                <div>
                                                    <a href="<?php echo "implementacion.php?id=".$_GET['id']; ?>"
                                                        title="Diagnotico del Proceso"><i
                                                            class="fa fa-tasks success font-large-2 float-right"></i>&nbsp;</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php  
                             }
                            if($_SESSION['rol'] == "ADMINISTRADOR" ||
                             $_SESSION['rol'] == "LIDER OEA" || 
                             $_SESSION['rol'] == "ASISTENTE" || 
                             $_SESSION['rol'] == "EMPRESA" ||
                             $_SESSION['rol'] == "GRUPO" || 
                             $_SESSION['idsesion'] == $objTrabajo->getId_usuario_preauditoria() ){?>
                            <div class="col-xl-4 col-lg-6 col-12">
                                <div class="card pull-up">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="media-body text-left">
                                                    <h3 class="secondary">
                                                        <li class="fa fa-user-tag info fa-2x"></li>&nbsp;
                                                        <?php
                                                       
                                                            if(is_null($objTrabajo->getId_usuario_preauditoria()) == true){
                                                                echo "<li class='fa fa-ban'></li>&nbsp;Usuario no Asignado.";
                                                            }else{
                                                                $user = usuarioController::usuarioId($objTrabajo->getId_usuario_preauditoria());
                                                                echo $user->getNombre_usuario();
                                                            }
                                                        ?>
                                                    </h3>
                                                    <a href="<?php echo "preauditoria.php?id=".$_GET['id']; ?>"
                                                        title="Diagnostico del Proceso">
                                                        <h6 class="parrafo">Proceso: Pre Auditoría</h6>
                                                    </a>
                                                </div>
                                                <div>
                                                    <a href="<?php echo "preauditoria.php?id=".$_GET['id']; ?>"
                                                        title="Diagnostico del Proceso"><i
                                                            class="fa fa-tasks success font-large-2 float-right"></i>&nbsp;</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ contendio -->
        </div>
    </div>
    <!-- END: Content-->
    <!-- BEGIN: Customizer-->
    <!-- End: Customizer-->
    <!-- Buynow Button-->
    <?php
    //require_once (PLATFORM_PATH."global/inc/component/customizer.php");
    //require_once (PLATFORM_PATH."global/inc/component/buy.php");
    require_once (PLATFORM_PATH."global/inc/component/footer.php");
    require_once (PLATFORM_PATH."global/inc/platform/lib.php");
   
  ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="<?php echo CORE_JS_SERVER."directory.js"; ?>"></script>
    <script src="<?php echo CORE_JS_SERVER."app.js"; ?>"></script>
    <script src="<?php echo PLATFORM_SERVER."modules/trabajo/triggers/module.js"; ?>"></script>
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</body>
<!-- END: Body-->
</html>
