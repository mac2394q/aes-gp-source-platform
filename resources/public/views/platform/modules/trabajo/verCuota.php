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
require_once (CONTROLLERS_PATH."contratoController.php");
session::verificarSesion($_SESSION['idsesion']);
date_default_timezone_set('America/Bogota');
setlocale(LC_ALL,"es_CO");
$objCuota = contratoController::cuotaId($_GET['idcuota']);
// $objTrabajo = trabajoController::trabajoId($_GET['id']);
// $entidad = entidadController::obtenerEntidad($objTrabajo->getId_entrada_trabajo());
$idempresa = $_GET['id'];
//print_r($objCuota);
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
    <input type="hidden" name="idcontrato" id="idcontrato" value="<?php echo $_GET['idcontrato'];?>" />
    <input type="hidden" name="empresa_proyecto" id="empresa_proyecto" value="<?php echo $_GET['id'];?>" />
    <input type="hidden" name="idtrabajo" id="idtrabajo" value="<?php echo $_GET['idtrabajo'];?>" />
    <input type="hidden" value="<?php echo $_GET['idcuota'];?>" name="idcuota" />
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
                        <h3 class="content-header-title titulo">Modulo Trabajo</h3>
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                <li class="breadcrumb-item active parrafo text-black"><a class="text-black"
                                            href="index.php">Listado de
                                            trabajos</a>
                                    </li>
                                    <li class="breadcrumb-item active parrafo text-black"><a class="text-black"
                                            href="<?php echo "verFicha.php?id=".$_GET['idtrabajo']; ?>">Ver Ficha de
                                            trabajo</a>
                                    </li>
                                    <li class="breadcrumb-item active parrafo text-black"><a class="text-black"
                                            href="<?php echo "gestionContractos.php?id=".$_GET['idtrabajo']; ?>">Gestion de contratos</a>
                                    </li>
                                    <li class="breadcrumb-item active parrafo text-black">Acuerdo de contrato
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
                                       
                                        <div class="row">
                                            
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            Numero de cuota</h5>
                                                    </label>
                                                    <input type="number" class="form-control" placeholder=". . . "
                                                        name="cuota" id="cuota" value="<?php echo $objCuota->getNumero_cuota(); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            Valor</h5>
                                                    </label>
                                                    <input type="number" class="form-control" placeholder=". . . "
                                                        name="ncuota" id="ncuota" value="<?php echo $objCuota->getMonto_cuota(); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            Porcentaje</h5>
                                                    </label>
                                                    <input type="number" class="form-control" placeholder=". . . "
                                                        name="porcentaje" id="porcentaje"  value="<?php echo $objCuota->getPorcentaje_cuota() ; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            Estado :
                                                        </h5>
                                                    </label>
                                                    <select id="estado" name="estado" class="form-control">
                                                        <option value="<?php echo $objCuota->getEstado_cuota(); ?>"><?php echo $objCuota->getEstado_cuota(); ?> </option>
                                                        <option value="NO PAGADO">NO PAGADO </option>
                                                        <option value="PAGADO">PAGADO </option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            Observacion :
                                                        </h5>
                                                    </label>
                                                    <textarea class="form-control" id="textarea2"
                                                                    name="textarea2" rows="3" cols="50"><?php echo $objCuota->getObservacion(); ?></textarea>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <br>
                                                    <button id="ModificarCuota" class="btn capa text-white round "><li class="fa fa-edit fa-2x"></li>&nbsp;Actualizar Cuota</button>
                                                    
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col-md-12">
                                            <div id="smg"></div>
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
    <<script src="<?php echo PLATFORM_SERVER."modules/trabajo/triggers/module.js"; ?>"></script>
    <script>
    </script>
</body>
<!-- END: Body-->
</html>
