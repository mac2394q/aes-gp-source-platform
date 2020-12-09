<?php session_start(); ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">   
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
// $entidad = entidadController::obtenerEntidad($objTrabajo->getId_entrada_trabajo());
// $objEmpresa = empresaController::objEmpresa($_GET['id']);
// $idempresa = $_GET['id'];
//print_r($entidad);
//print_r($objTrabajo);
$idproyecto = trabajoController::proyectoId($_GET['idproyecto']);
$idinforme = trabajoController::informeDiagnostico($_GET['idproyecto']);
// $objEmpresa = trabajoController::proyectoId();
//print_r($idproyecto);
?>
    <style>
        .user-profile {
            background: url(https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/app-assets/images/gallery/dark-menu.jpg) center center no-repeat;
        }
        .user-profile .user-info {
            background-color: rgba(0, 0, 0, 0.35);
        }
        .right{
    float: right;
    
}
    </style>
</head>
<!-- END: Head-->
<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern material-vertical-layout material-layout 2-columns   fixed-navbar"
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:70%;">
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
                                    <li class="breadcrumb-item active parrafo text-black"><a class="text-black"
                                            href="index.php">Listado </a>
                                    </li>
                                    <li class="breadcrumb-item active parrafo text-black"><a class="text-black"
                                            href="<?php echo "verFicha.php?id=".$_GET['id']; ?>">Ver Ficha de
                                            Trabajo</a>
                                    </li>
                                    <li class="breadcrumb-item active parrafo text-black"><a class="text-black"
                                            href="<?php echo "implementacion.php?id=".$_GET['id']; ?>">Fase de
                                            Implementación</a>
                                    </li>
                                    <li class="breadcrumb-item active parrafo text-black"><a class="text-black"
                                            href="<?php echo "gestionProyecto.php?id=".$_GET['id']; ?>">Gestión de Proyectos </a>
                                    </li>
                                    <li class="breadcrumb-item active parrafo text-black">Reporte de Implementación
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
                        <div class="col-md-12">
                            <ul class="list-inline mb-0">
                                <!-- <li><a href="#"
                                        class="btn text-white capa round btn-min-width mr-1 mb-1 waves-effect waves-light">
                                        <i class="fa fa-business-time fa-2x"></i>&nbsp; Finalizar Fase Diagnóstico(sin Funcionalidad)</a>
                                </li>
                                <li><a href="#"
                                        class="btn text-white capa round btn-min-width mr-1 mb-1 waves-effect waves-light">
                                        <i class="fa fa-business-time fa-2x"></i>&nbsp; Reporte</a>
                                </li> -->
                            </ul>
                        </div>
                        <div class="card" style="">
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="card-header">
                                        <img src="<?php echo VENDOR_SERVER."aes/aes2/2.jpg";  ?>">
                                        <h2 class="form-section"><i class="fa fa-business-time"></i>
                                            VERIFICACIÓN DE CUMPLIMIENTO REQUISITOS </h2>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            RAZÓN SOCIAL DE LA EMPRESA
                                                        </h5>
                                                    </label>
                                                    <input readonly="" type="text" class="form-control"
                                                        placeholder=". . ." name="razonSocial" id="razonSocial"
                                                        value="<?php echo $entidad['entidad'];?>">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            Nombre Especialista
                                                        </h5>
                                                    </label>
                                                    <input readonly="" type="text" class="form-control"
                                                        placeholder=". . ." name="razonSocial" id="razonSocial"
                                                        value="<?php echo usuarioController::usuarioId($objTrabajo->getId_usuario_diagnostico())->getNombre_usuario() ; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            Fecha
                                                        </h5>
                                                    </label>
                                                    <input readonly="" type="text" class="form-control"
                                                        placeholder=". . ." name="razonSocial" id="razonSocial"
                                                        value="<?php echo date('Y-m-d'); ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div id="top_bar2">
                                            <a target="_blank"
                                                href="<?php echo 'reporteImplementacionPDF.php?idempresa='.$_GET['idempresa'].'&idproyecto='.$_GET['idproyecto'].'&id='.$_GET['id']; ?>"
                                                class="btn round capa text-white waves-effect waves-light">
                                                <i class="fa fa-file-pdf fa-2x"></i> &nbsp;Versión
                                                PDF
                                            </a><br><br>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="right">
                                                <table class='table table-column table-bordered table-xs table-white-space'>
                                                    <thead >
                                                        <tr >
                                                            <th class=' capa white'>Avance
                                                            </th>
                                                            <td class=' capa white'>Calificación</td>
                                                        
                                                        </tr>
                                                        <tr>
                                                            <th class=' capa white'>No definido
                                                            </th>
                                                            <td>
                                                                <div class="badge badge-danger">0%</div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class=' capa white'>En proceso
                                                            </th>
                                                            <td>
                                                                <div class="badge badge-warning">50%</div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class=' capa white'>En revisión y aprobación
                                                            </th>
                                                            <td>
                                                                <div class="badge badge-warning">75%</div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class=' capa white'>Aprobación
                                                            </th>
                                                            <td>
                                                                <div class="badge badge-success">100%</div>
                                                            </td>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                        <br><br><br>
                                        <div class="row">
                                            <?php 
                                        echo trabajoController::plantillaImplementacionProyectoListadoInforme($_GET['idproyecto']); 
                                       
                                    ?>
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
</html>