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
require_once (CONTROLLERS_PATH."alcanceController.php");
require_once (CONTROLLERS_PATH."plantillaController.php");
require_once (CONTROLLERS_PATH."proyectoController.php");
session::verificarSesion($_SESSION['idsesion']);
date_default_timezone_set('America/Bogota');
setlocale(LC_ALL,"es_CO");
$objTrabajo = trabajoController::trabajoId($_GET['id']);
$entidad = entidadController::obtenerEntidad($objTrabajo->getId_entrada_trabajo());
$idempresa = $_GET['id'];
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
    <input type="hidden" name="idtrabajo" id="idtrabajo" value="<?php echo  $idempresa; ?>" />
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
                                <?php if($_SESSION['rol'] == "ESPECIALISTA" || $_SESSION['rol'] == "ADMINISTRADOR" || $_SESSION['rol'] == "LIDER OEA" || $_SESSION['rol'] == "ASISTENTE" ){ ?>
                                    <li class="breadcrumb-item active parrafo text-black"><a class="text-black"
                                            href="index.php">Listado </a>
                                    </li>
                                <?php }?>
                                    <li class="breadcrumb-item active parrafo text-black"><a class="text-black"
                                            href="<?php echo "verFicha.php?id=".$_GET['id']; ?>">Ver Ficha de
                                            Trabajo</a>
                                    </li>
                                    <li class="breadcrumb-item active parrafo text-black">Gestión de Proyectos
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
                        <?php if( $_SESSION['rol'] == "ADMINISTRADOR" || $_SESSION['rol'] == "LIDER OEA" || $_SESSION['rol'] == "ASISTENTE" ){ ?>
                            <li><a href="<?php echo "alcanceProyectos.php?id=".$idempresa; ?>"
                                    class="btn text-white capa round btn-min-width mr-1 mb-1 waves-effect waves-light">
                                    <i class="fa fa-globe fa-2x"></i> Alcance Proyectos</a>
                            </li>
                            <li><a href="<?php echo "gestionContractos.php?id=".$idempresa; ?>"
                                    class="btn text-white capa round btn-min-width mr-1 mb-1 waves-effect waves-light">
                                    <i class="fa fa-paste fa-2x"></i> Gestión de Contratos </a>
                            </li>
                        <?php }?>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="card" >
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="card-text">
                                        <div id="smg"></div>
                                    </div>
                                    <h2 class="form-section"><i class="fa fa-id-card-alt"></i>
                                        Administración de Proyectos
                                    </h2>
                                    <div class="row">
                                        <div class="col-md-7">
                                        <?php if ($_SESSION['rol'] == "ADMINISTRADOR" || $_SESSION['rol'] == "LIDER OEA" || $_SESSION['rol'] == "ASISTENTE" ){ ?>
                                            <div class="form-group">
                                                <label for="">
                                                    <h5 class="card-title"><span class="text-danger">*</span>
                                                        Listado Plantilla: </h5>
                                                </label>
                                                <?php echo trabajoController::listadoPlantilla();?>
                                            </div>
                                        </div>
                                        <?php }?>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                            <?php if( $_SESSION['rol'] == "ADMINISTRADOR" || $_SESSION['rol'] == "LIDER OEA" || $_SESSION['rol'] == "ASISTENTE" ){ ?>
                                                <button type="button" id="registrarProyecto"
                                                    class="btn text-white round capa waves-effect waves-light">
                                                    <i class="fa fa-folder-plus fa-2x"></i>&nbsp;Agregar
                                                </button>
                                            <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12" id="refrescarTabla">
                                        <?php 
                                        if($_SESSION['rol'] == "EMPRESA" || $_SESSION['rol'] == "GRUPO" ){
                                            echo proyectoController::listadoProyectosTrabajo($_GET['id'],$_SESSION['rol'],$_SESSION['id']);
                                        }else{
                                            echo proyectoController::listadoProyectosTrabajo($_GET['id'],$_SESSION['rol'],$_SESSION['idsesion']);
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
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
 
    require_once (PLATFORM_PATH."global/inc/platform/lib.php");
    
  ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="<?php echo CORE_JS_SERVER."directory.js"; ?>"></script>
    <script src="<?php echo CORE_JS_SERVER."app.js"; ?>"></script>
    <script src="<?php echo PLATFORM_SERVER."modules/trabajo/triggers/module.js"; ?>"></script>
    <script src="<?php echo PLATFORM_SERVER."modules/trabajo/triggers/ui.js"; ?>"></script>
    <script>
        $('#actualizarCambios').hide();
        $(document).on('click', '#agregarCertificado', function (e) {
            var contador = document.getElementsByName("certificadosDinamicos")[0].value;
            //alert(contador);
            contador = parseInt(contador) + 1;
            //alert(contador);
            document.getElementsByName("certificadosDinamicos")[0].value = contador;
        });
        $(document).on('click', '#eliminarCertificado', function (e) {
            var contador = document.getElementsByName("certificadosDinamicos")[0].value;
            if (parseInt(contador) > 0) {
                //alert(contador);
                contador = parseInt(contador) - 1;
                //alert(contador);
                document.getElementsByName("certificadosDinamicos")[0].value = contador;
            }
        });
    </script>
</body>
<!-- END: Body-->
</html>
