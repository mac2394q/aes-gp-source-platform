<?php session_start(); ?>
<!DOCTYPE html>
<html >
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
$idproyectoObjDinamic = trabajoController::proyectoIdFechas($_GET['idproyecto']);
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
<body class="bg-white"
     style="zoom:65%;">
    <input type="hidden" name="idempresa" id="idempresa" value="<?php echo  $idempresa; ?>" />
    <input type="hidden" name="idsesion" id="idsesion" value="" />
   
    <div class="app-content content">
        
        <div class="content-wrapper">
            <div class="content-body">
                <!-- contendio -->
                <div class="row">
                    <div class="col-md-12">
                        
                        <div class="card text-black" >
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="card-header">
                                        <img src="<?php echo VENDOR_SERVER."aes/aes2/2.jpg";  ?>" width="100%" height="155">
                                        <br><br>
                                        <br>
                                        <h2 class="form-section text-black parrafo"><i class="fa fa-business-time"></i>&nbsp;VERIFICACIÓN DE CUMPLIMIENTO REQUISITOS </h2>
                                    
                                        <div class="col-md-12  col-xs-12 col-sm-12 col-lg-12">
                                            <div class="form-group">
                                                <label>
                                                    <h5 class="card-title text-black parrafo">
                                                        RAZÓN SOCIAL DE LA EMPRESA
                                                    </h5>
                                                </label>
                                                <label>
                                                    <h5 class="card-title text-black parrafo">
                                                        <?php echo $entidad['entidad']; ?>
                                                    </h5>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12  col-xs-12 col-sm-12 col-lg-12">
                                            <div class="form-group">
                                                <label for="">
                                                    <h5 class="card-title text-black parrafo">
                                                        NOMBRE DEL ESPECIALISTA
                                                    </h5>
                                                </label>
                                                <label>
                                                    <h5 class="card-title text-black parrafo">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        &nbsp;&nbsp;&nbsp;
                                                        <?php echo usuarioController::usuarioId($objTrabajo->getId_usuario_implementacion())->getNombre_usuario(); ?>
                                                    </h5>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12  col-xs-12 col-sm-12 col-lg-12">
                                            <div class="form-group">
                                                <label for="">
                                                    <h5 class="card-title text-black parrafo">
                                                        FECHA
                                                    </h5>
                                                </label>
                                                <label>
                                                    <h5 class="card-title text-black parrafo">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <?php echo $idproyectoObjDinamic[0]['fechaFinImplementacion']; ?>
                                                    </h5>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="right">
                                                <table class='  table table-column table-bordered  table-white-space'>
                                                    <thead >
                                                        <tr >
                                                            <th class='card-title text-black parrafo '>Avance
                                                            </th>
                                                            <td class='card-title text-black parrafo '>Calificación</td>
                                                        
                                                        </tr>
                                                        <tr>
                                                            <th class='card-title text-black parrafo '>No definido
                                                            </th>
                                                            <td>
                                                                <div class="badge badge-danger parrafo text-black">0%</div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class=' card-title text-black parrafo '>En proceso
                                                            </th>
                                                            <td>
                                                                <div class="badge badge-warning parrafo text-black">50%</div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class=' card-title text-black parrafo '>En revisión y aprobación
                                                            </th>
                                                            <td>
                                                                <div class="badge badge-warning parrafo text-black">75%</div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class=' card-title text-black parrafo '>Aprobación
                                                            </th>
                                                            <td>
                                                                <div class="badge badge-success parrafo text-black">100%</div>
                                                            </td>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <?php 
                                        echo trabajoController::plantillaImplementacionProyectoListadoInformePDF($_GET['idproyecto']); 
                                        
                                    ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    require_once (PLATFORM_PATH."global/inc/component/footer.php");
    require_once (PLATFORM_PATH."global/inc/platform/lib.php");
  ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="<?php echo CORE_JS_SERVER."directory.js"; ?>"></script>
    <script src="<?php echo CORE_JS_SERVER."app.js"; ?>"></script>
    <script src="<?php echo PLATFORM_SERVER."modules/trabajo/triggers/module.js"; ?>"></script>
    <script>
    window.print();
    </script>
</body>
</html>