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
$idproyecto = trabajoController::proyectoId($_GET['idproyecto']);
$idinforme = trabajoController::informeDiagnostico($_GET['idproyecto']);
$idproyectoObjDinamic= trabajoController::proyectoIdFechas($_GET['idproyecto']);
$idempresa = $_GET['idproyecto'];
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

<body class="vertical-layout vertical-menu-modern material-vertical-layout material-layout 2-columns   bg-white"
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:70%;">
    <input type="hidden" name="idproyecto" id="idproyecto" value="<?php echo  $idempresa; ?>" />
    <input type="hidden" name="id" id="id" value="<?php echo  $_GET['id']; ?>" />
    <div id="ocultar3">
        <!-- BEGIN: Header-->
        <?php require_once (PLATFORM_PATH."global/inc/component/fixed_top.php"); ?>
        <!-- END: Header-->
        <!-- BEGIN: Main Menu-->
        <?php require_once (PLATFORM_PATH."global/inc/component/main_menu.php"); ?>
        <!-- END: Main Menu-->
        <!-- BEGIN: Content-->
    </div>
    <div class="app-content content">
        <div id="ocultar4">
            <div class="content-header row">
                <div class="content-header-dark bg-img col-12">
                    <div class="row">
                        <div class="content-header-left col-md-9 col-12 mb-2">
                            <h3 class="content-header-title titulo">Módulo Trabajo</h3>
                            <div class="row breadcrumbs-top">
                                <div class="breadcrumb-wrapper col-12">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active parrafo text-black"><a class="text-black"
                                                href="index.php">Listado </a>
                                        </li>
                                        <li class="breadcrumb-item active parrafo text-black"><a class="text-black"
                                                href="<?php echo "verFicha.php?id=".$_GET['id']; ?>">Ver Ficha de
                                                Trabajo</a>
                                        </li>
                                        <li class="breadcrumb-item active parrafo text-black"><a class="text-black"
                                                href="<?php echo "gestionProyecto.php?id=".$_GET['id']; ?>">Gestión de
                                                Proyectos</a>
                                        </li>
                                        <li class="breadcrumb-item active parrafo text-black">Actas de Implementación
                                        </li>
                                    </ol>
                                </div>
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
                        <div class="card" s>

                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="card-header">
                                        <img src="<?php echo VENDOR_SERVER."aes/aes2/4.jpg";  ?>">
                                        <br><br><br>
                                        <h2 class="form-section text-black parrafo"><i class="fa fa-business-time"></i>
                                        ACTA DE SEGUIMIENTO </h2>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title text-black parrafo">
                                                            RAZÓN SOCIAL DE LA EMPRESA
                                                        </h5>
                                                    </label>
                                                    <input readonly="" type="text" class="form-control text-black parrafo"
                                                        placeholder=". . ." name="razonSocial" id="razonSocial"
                                                        value="<?php echo $entidad['entidad'];?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title text-black parrafo">
                                                            Nombre Especialista
                                                        </h5>
                                                    </label>
                                                    <input readonly="" type="text" class="form-control text-black parrafo"
                                                        placeholder=". . ." name="razonSocial" id="razonSocial"
                                                        value="<?php echo usuarioController::usuarioId($objTrabajo->getId_usuario_diagnostico())->getNombre_usuario() ; ?>">
                                                </div>
                                            </div>
                                           
                                            
                                        </div>
                                    </div>
                                    <div class="card-text">
                                        <div id="smg"></div>
                                    </div>
                                    <div class="form">
                                        <div class="form-body">
                                            <div id="oculta_">
                                                <button type="button" id="imprimir"
                                                    class="btn text-white round capa waves-effect waves-light">
                                                    <i class="fa fa-search "></i>&nbsp;PDF
                                                </button>
                                                <a href="<?php echo "gestionProyecto.php?id=".$_GET['id']; ?>"
                                                    class="btn text-white round capa waves-effect waves-light">
                                                    <i class="fa fa-reply "></i>&nbsp;Regresar 
                                                </a>
                                            </div>
                                           


                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">
                                                            <h5 class="card-title parrafo">
                                                                <li class="fa fa-calendar-alt fa-2x"></li>&nbsp;Fecha de
                                                                Inicio
                                                            </h5>
                                                        </label>

                                                        <input type="date" class="form-control parrafo" name="f1" id="f1">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">
                                                            <h5 class="card-title parrafo">
                                                                <li class="fa fa-calendar-alt fa-2x"></li>&nbsp;Fecha
                                                                Final
                                                            </h5>
                                                        </label>

                                                        <input type="date" class="form-control parrafo" name="f2" id="f2">
                                                    </div>
                                                </div>
                                                <div id="ocultar" class="col-md-6">
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <br>
                                                            <button type="button" id="busquedaActa2"
                                                                class="btn text-white round capa waves-effect waves-light">
                                                                <i class="fa fa-search fa-2x"></i>&nbsp;Generar Acta
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div id="consulta">
                                        </div>
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
    <div id="ocultar2">
        <?php
    //require_once (PLATFORM_PATH."global/inc/component/customizer.php");
    //require_once (PLATFORM_PATH."global/inc/component/buy.php");
    require_once (PLATFORM_PATH."global/inc/component/footer.php");
    require_once (PLATFORM_PATH."global/inc/platform/lib.php");
    
  ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="<?php echo CORE_JS_SERVER."directory.js"; ?>"></script>
    <script src="<?php echo CORE_JS_SERVER."app.js"; ?>"></script>
    <script src="<?php echo PLATFORM_SERVER."modules/trabajo/triggers/module.js"; ?>"></script>
    <script>
        $(document).on('click', '#imprimir', function (e) {
            $('#ocultar').hide();
            $('#oculta_').hide();
            $('#ocultar2').hide();
            $('#ocultar3').hide();
            $('#ocultar4').hide();
            window.print();
            $('#oculta_').show();
            $('#ocultar').show();
            $('#ocultar2').show();
            $('#ocultar3').show();
            $('#ocultar4').show();


        });
    </script>
</body>
<!-- END: Body-->

</html>