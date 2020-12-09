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
require_once (HELPERS_PATH."rutas.php");
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
                                    <?php if($_SESSION['rol'] == "ADMINISTRADOR" || $_SESSION['rol'] == "LIDER OEA" || $_SESSION['rol'] == "ASISTENTE"){ ?>
                                    <li class="breadcrumb-item active parrafo text-black"><a class="text-black"
                                            href="index.php">Listado </a>
                                    </li>
                                    <?php }?>
                                    <li class="breadcrumb-item active parrafo text-black"><a class="text-black"
                                            href="<?php echo "verFicha.php?id=".$_GET['id']; ?>">Ver Ficha de
                                            Trabajo</a>
                                    </li>
                                    <li class="breadcrumb-item active parrafo text-black">Fase de Pre Auditoria
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
                        
                        <div class="card" style="">
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="card-text">
                                        <div id="smg"></div>
                                    </div>
                                    <div class="form">
                                        <h2 class="form-section"><i class="fa fa-id-card-alt"></i>
                                            Gestión Proyecto - Fase Pre Auditoría
                                        </h2>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="form-section"><i class="la la-clipboard"></i>Planeación
                                                    Pre Auditoría:</h4>
                                                <div id="smgDocumentos1"></div>
                                                <?php if($_SESSION['rol'] == "ADMINISTRADOR" || $_SESSION['rol'] == "LIDER OEA" || $_SESSION['rol'] == "ASISTENTE" || $_SESSION['rol'] == "ESPECIALISTA"){ ?>
                                                <div class="form-group row mx-auto">
                                                    <label class="col-md-3 label-control">Reemplazar documento
                                                        actual</label>
                                                    <div class="col-md-9">
                                                        <label id="projectinput8" class="file center-block">
                                                            <input type="file" id="s2" accept="application/pdf" >
                                                            <span class="file-custom"></span>
                                                        </label>&nbsp;&nbsp;&nbsp;
                                                       
                                                        <button
                                                            class="btn capa round text-white waves-effect waves-light "
                                                            id="subirPlaneacionPreauditoria">
                                                            <i class="fa fa-cloud-upload-alt fa-2x"></i>&nbsp;Subir
                                                        </button>
                                                        
                                                    </div>
                                                </div>
                                                <?php }?>
                                                <div class="form-group row mx-auto last">
                                                    <div class="col-md-9">
                                                    <?php
                                                    if(rutas::validarRutas( DOCUMENTS_SERVER."documentos/trabajo/".$_GET['id']."/planeacion_preauditoria.pdf") == "200"){
                                                        echo " <div class='badge badge-success round'>Archivo Cargado</div>";
                                                    }
                                                    
                                                    ?>
                                                        <a target="_blank"
                                                            href="<?php echo DOCUMENTS_SERVER."documentos/trabajo/".$_GET['id']."/planeacion_preauditoria.pdf"; ?>"
                                                            class="btn capa text-white round waves-effect waves-light">
                                                            <i class="fa fa-download fa-2x"></i>&nbsp;Descargar
                                                            Documento
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <h4 class="form-section"><i class="la la-clipboard"></i> Reporte:</h4>
                                                <div id="smgDocumentos1"></div>
                                                <?php if($_SESSION['rol'] == "ADMINISTRADOR" || $_SESSION['rol'] == "LIDER OEA" || $_SESSION['rol'] == "ASISTENTE" || $_SESSION['rol'] == "ESPECIALISTA"){ ?>
                                                <div class="form-group row mx-auto">
                                                    <label class="col-md-4 label-control">Reemplazar documento
                                                        actual</label>
                                                    <div class="col-md-8">
                                                        <label id="projectinput8" class="file center-block">
                                                            <input type="file" id="s1">
                                                            <span class="file-custom"></span>
                                                        </label>&nbsp;&nbsp;&nbsp;
                                                        
                                                        <button
                                                            class="btn capa round text-white waves-effect waves-light "
                                                            id="subirReportePreauditoria">
                                                            <i class="fa fa-cloud-upload-alt fa-2x"></i>&nbsp;Subir
                                                        </button>
                                                       
                                                    </div>
                                                </div>
                                                <?php }?>
                                                <div class="form-group row mx-auto last">
                                                    <div class="col-md-9">
                                                        <?php
                                                    if(rutas::validarRutas( DOCUMENTS_SERVER."documentos/trabajo/".$_GET['id']."/reporte_preauditoria.pdf") == "200"){
                                                        echo " <div class='badge badge-success round'>Archivo Cargado</div>";
                                                    }
                                                    ?>
                                                    
                                                        <a target="_blank"
                                                            href="<?php echo DOCUMENTS_SERVER."documentos/trabajo/".$_GET['id']."/reporte_preauditoria.pdf"; ?>"
                                                            class="btn capa text-white round waves-effect waves-light">
                                                            <i class="fa fa-download fa-2x"></i>&nbsp;Descargar
                                                            Documento
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br><br>
                                        <h2 class="form-section"><i class="fa fa-id-card-alt"></i>
                                            Asignación de Usuario
                                        </h2>
                                        <div class="row">
                                        <?php if($_SESSION['rol'] == "ADMINISTRADOR" || $_SESSION['rol'] == "LIDER OEA" || $_SESSION['rol'] == "ASISTENTE"  ){ ?>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title">
                                                            Especialistas:</h5>
                                                    </label>
                                                    <?php 
                                                        usuarioController::listadoUsuariosEspecialistasPre($objTrabajo->getId_usuario_preauditoria(),$_GET['id']);
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <br>
                                                    
                                                    <button type="button" id="asignarUsuarioPreauditoria"
                                                        class="btn text-white round capa waves-effect waves-light">
                                                        <i class="fa fa-check fa-2x"></i>&nbsp;Seleccionar Usuario
                                                    </button>
                                                    
                                                </div>
                                            </div>
                                            <?php }?>
                                            <br>
                                            <div class="col-md-12">
                                            <?php  if(!is_null($objTrabajo->getId_usuario_preauditoria())){
                                                $objEmpleado =usuarioController::usuarioId($objTrabajo->getId_usuario_preauditoria());
                                                ?>
                                                
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">
                                                                <h5 class="card-title"><span
                                                                        class="text-danger">*</span>
                                                                    Nombre del Empleado
                                                                </h5>
                                                            </label>
                                                            <input readonly="" type="text" class="form-control"
                                                                placeholder=". . ." name="nombre" id="nombre"
                                                                value="<?php echo  $objEmpleado->getNombre_usuario()  ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">
                                                                <h5 class="card-title"><span
                                                                        class="text-danger">*</span>
                                                                    Correo Electrónico </h5>
                                                            </label>
                                                            <input readonly type="text" class="form-control"
                                                                placeholder=". . . " name="correo" id="correo"
                                                                value="<?php echo $objEmpleado->getCorreo_usuario();  ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">
                                                                <h5 class="card-title"><span
                                                                        class="text-danger">*</span>
                                                                    Teléfono</h5>
                                                            </label>
                                                            <input readonly type="text" class="form-control"
                                                                placeholder=". . . " name="telefono" id="telefono"
                                                                value="<?php echo $objEmpleado->getTelefono_usuario();  ?>">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            <?php  }?>
                                            </div>
                                        </div>
                                        <br>
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
