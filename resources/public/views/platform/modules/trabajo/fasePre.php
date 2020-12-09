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

    <input type="hidden" name="idproyecto" id="idproyecto" value="<?php echo  $_GET['idproyecto']; ?>" />

    <input type="hidden" name="idtrabajo" id="idtrabajo" value="<?php echo $_GET['id'];?>" />

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

<li class="breadcrumb-item active parrafo text-black">Fase Pre Auditoría

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

                        <div class="card">

                            <div class="card-header">

                                <h2 class="form-section"><i class="fa fa-business-time"></i>

                                    Fase de Pre Auditoría</h2>

                                <br>

                                <h4 class="card-title parrafo">Nota : Una vez termine el proceso de pre auditoría, por favor hacer clic en <code>

                                        | Fase de Pre Auditoría| </code>
                                    </h4>

                                <br>

                                <div class="form-group ">

                                    <a id="finalizarPreProyecto"

                                        class="btn capa round text-white waves-effect waves-light text-white"> <i

                                            class="fa fa-clipboard-check fa-2x"></i>&nbsp; Finalizar Pre Auditoría </a>

                                </div>

                                <br>

                                <div class="form-group ">

                                    <div id="smg"></div>

                                </div>

                            </div>

                        </div>

                        <div class="card-content collapse show">

                            <div class="card-body">

                                <?php echo trabajoController::plantillaPreProyectoListado($_GET['idproyecto']); ?>

                                <br>

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

    require_once (PLATFORM_PATH."global/inc/component/footer.php");

    require_once (PLATFORM_PATH."global/inc/platform/lib.php");

    

  ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script src="<?php echo CORE_JS_SERVER."directory.js"; ?>"></script>

    <script src="<?php echo CORE_JS_SERVER."app.js"; ?>"></script>

    <script src="<?php echo PLATFORM_SERVER."modules/trabajo/triggers/module.js"; ?>"></script>

</body>

<!-- END: Body-->

</html>

