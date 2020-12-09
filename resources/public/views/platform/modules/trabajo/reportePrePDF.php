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
$idproyectoObjDinamic= trabajoController::proyectoIdFechas($_GET['idproyecto']);
$idproyecto = trabajoController::proyectoId($_GET['idproyecto']);
$idinforme = trabajoController::informePre($_GET['idproyecto']);

?>
    <style>
        .user-profile {
            background: url(https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/app-assets/images/gallery/dark-menu.jpg) center center no-repeat;
        }
        .user-profile .user-info {
            background-color: rgba(0, 0, 0, 0.35);
        }
        @media print {

            body{
                background-color: white;
                /* margin-top: 8%; */
                margin-bottom: 15%; 
                /* height: 10%;
                width: 20%;  */


            }
            


            

        }
    </style>
</head>
<!-- END: Head-->
<!-- BEGIN: Body-->
<body class="bg-white" style="zoom:75%;">
    <input type="hidden" name="idempresa" id="idempresa" value="<?php echo  $idempresa; ?>" />
    <input type="hidden" name="idproyecto" id="idproyecto" value="<?php echo $_GET['idproyecto'];?>" />

   
    <div class="app-content content">
       
        <div class="content-wrapper">
            <div class="content-body">
                <!-- contendio -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style="">
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="card-header">
                                        <img src="<?php echo VENDOR_SERVER."aes/aes2/5.jpg";  ?>">
                                        <br><br>
                                        <h2 class="form-section parrafo"><i class="fa fa-business-time"></i>
                                            INFORME DE PRE AUDITORÍA </h2>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class=" parrafo">
                                                        <h5 class="card-title parrafo">
                                                            Razon social
                                                        </h5>
                                                    </label>
                                                    <input readonly="" type="text" class="form-control parrafo"
                                                        placeholder=". . ." name="razonSocial" id="razonSocial"
                                                        value="<?php echo $entidad['entidad'];?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title parrafo">
                                                            Nombre Especialista
                                                        </h5>
                                                    </label>
                                                    <input readonly="" type="text" class="form-control parrafo"
                                                        placeholder=". . ." name="razonSocial" id="razonSocial"
                                                        value="<?php echo usuarioController::usuarioId($objTrabajo->getId_usuario_preauditoria())->getNombre_usuario() ; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title parrafo">
                                                            Fecha de Reporte
                                                        </h5>
                                                    </label>
                                                    <input readonly="" type="text" class="form-control parrafo"
                                                        placeholder=". . ." name="razonSocial" id="razonSocial"
                                                        value="<?php echo $idproyectoObjDinamic[0]['fechaFinPre']; ?>">
                                                </div>
                                            </div>
                                            <?php if($entidad['tipo'] != "GRUPO"){
                                                $obEmpresasGrupo = trabajoController::empresasPreauditoria($_GET['idproyecto']); ?>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title parrafo"><span class="text-danger">*</span>
                                                           Nit
                                                        </h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control parrafo"

                                                        value="<?php echo $obEmpresasGrupo[0]['identificacion_empresa']; ?>">
                                                </div>
                                            </div>
                                            <?php }else{
                                                $obEmpresasGrupo = trabajoController::empresasPreauditoria($_GET['idproyecto']);
                                                for ($i=0; $i <count($obEmpresasGrupo) ; $i++) { 
                                            ?>
                                                
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="">
                                                            <h5 class="card-title parrafo"><span
                                                                    class="text-danger">*</span>
                                                                 Nombre Empresa
                                                            </h5>
                                                        </label>
                                                        <input readonly type="text" class="form-control parrafo"
                                                             value="<?php echo $obEmpresasGrupo[$i]['nombre_empresa']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="">
                                                            <h5 class="card-title parrafo"><span
                                                                    class="text-danger">*</span>
                                                                Nit
                                                            </h5>
                                                        </label>
                                                        <input readonly type="text" class="form-control parrafo"
                                                             value="<?php echo $obEmpresasGrupo[$i]['identificacion_empresa']; ?>">
                                                    </div>
                                                </div>
                                                

                                            <?php }
                                            
                                              }
                                            
                                            ?>
                                        </div>
                                      
                                        <h3 class="form-section">
                                            <strong>RESUMEN EJECUTIVO </strong>
                                        </h3>
                                        <div class="form-group mb-1 col-sm-12 col-md-12">
                                                <label for="projectinput3">
                                                    <h5 class="card-title parrafo">
                                                      
                                                        1) INFORMACIÓN GENERAL
                                                    </h5>
                                                </label>
                                                <br><br>
                                                <?php
                                                $actividad="";
                                                 if($idinforme != false){
                                                    $actividad=$idinforme[0]['informacion']; }
                                                else{ $actividad=""; }
                                                ?>
                                                <textarea class="form-control parrafo" id="informacion" style="border: 1px solid #888;" name="informacion" rows="4"cols="120"><?php echo $actividad; ?></textarea> 
                                            </div>
                                            <div class="form-group mb-1 col-sm-12 col-md-12">
                                                <label for="projectinput3">
                                                    <h5 class="card-title parrafo">
                                                      
                                                        2) ACTIVIDADES DESARROLLADAS
                                                    </h5>
                                                </label>
                                                <br><br>
                                                <?php
                                                $actividad="";
                                                 if($idinforme != false){
                                                    $actividad=$idinforme[0]['actividad']; }
                                                else{ $actividad=""; }
                                                ?>
                                                <textarea class="form-control parrafo" id="actividades" style="border: 1px solid #888;" name="actividades" rows="4" cols="120"><?php echo $actividad; ?></textarea>
                                            </div>
                                          
                                            <div class=" form-group mb-1 col-sm-12 col-md-12">
                                                <label for="projectinput3">
                                                    <h5 class="card-title parrafo">
                                                      
                                                        3) ASPECTOS RELEVANTES
                                                    </h5>
                                                </label>
                                                <br><br>
                                                <?php
                                                $actividad="";
                                                 if($idinforme != false){
                                                    $actividad=$idinforme[0]['aspectos']; }
                                                else{ $actividad=""; }
                                                ?>
                                                <textarea class="form-control parrafo" id="aspectos"style="border: 1px solid #888;" name="aspectos" rows="4" cols="120"><?php echo $actividad; ?></textarea>
                                            </div>
                                            <br><br><br>
                                            
                                        <div class="row">
                                            <?php 
                                        echo trabajoController::plantillaPreauditoriaProyectoListadoInformePDF($_GET['idproyecto']); ?>
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
    <!-- -->
    <?php
    


    //require_once (PLATFORM_PATH."global/inc/component/customizer.php");
    //require_once (PLATFORM_PATH."global/inc/component/buy.php");
    require_once (PLATFORM_PATH."global/inc/component/footer.php");
    require_once (PLATFORM_PATH."global/inc/platform/lib.php");
    
  ?>
    <!-- BEGIN: Page Vendor JS-->
    <script src="https://www.google.com/jsapi"></script>
    <!-- END: Page Vendor JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <!-- <script src="https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/app-assets/js/scripts/charts/google/bar/bar.min.js"></script>
    <script src="https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/app-assets/js/scripts/charts/google/bar/column.js"></script> -->
    <script src="<?php echo CORE_JS_SERVER."directory.js"; ?>"></script>
    <script src="<?php echo CORE_JS_SERVER."app.js"; ?>"></script>
    <script src="<?php echo PLATFORM_SERVER."modules/trabajo/triggers/module.js"; ?>"></script>
    <script>

        window.print();
    </script>
   
</body>
<!-- END: Body-->
</html>
