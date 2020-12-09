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
$objTrabajo = trabajoController::trabajoId($_GET['id']);
$entidad = entidadController::obtenerEntidad($objTrabajo->getId_entrada_trabajo());
$idempresa = $_GET['id'];
$objContracto = contratoController::ContratoId($_GET['idcontrato']);
$objAcuerdo = contratoController::acuerdoContrato($_GET['idcontrato']);
//print_r($objAcuerdo);
// print_r($objTrabajo);
?>
    <style>
        .user-profile {
            background: url(https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/app-assets/images/gallery/dark-menu.jpg) center center no-repeat;
        }
        .user-profile .user-info {
            background-color: rgba(0, 0, 0, 0.35);
        }
    </style>
    <script>
    function val1() { document.getElementsByName("monto1")[0].value=0; }
    function val2() { document.getElementsByName("monto2")[0].value=0; }
    function val3() { document.getElementsByName("monto3")[0].value=0; }
    function val4() { document.getElementsByName("monto4")[0].value=0; }
    function val5() { document.getElementsByName("monto5")[0].value=0; }
    function val6() { document.getElementsByName("monto6")[0].value=0; }
    function val7() { document.getElementsByName("monto7")[0].value=0; }
    function val8() { document.getElementsByName("monto8")[0].value=0; }
    function val9() { document.getElementsByName("monto9")[0].value=0; }
    function val10() { document.getElementsByName("monto10")[0].value=0; }
    </script>
</head>
<!-- END: Head-->
<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern material-vertical-layout material-layout 2-columns   fixed-navbar"
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:75%;">
    <input type="hidden" name="idempresa" id="idempresa" value="<?php echo  $idempresa; ?>" />
    <input type="hidden" name="idcontrato" id="idcontrato" value="<?php echo $_GET['idcontrato'];?>" />
    <input type="hidden" name="empresa_proyecto" id="empresa_proyecto" value="<?php echo $_GET['id'];?>" />
    <input type="hidden" name="idtrabajo" id="idtrabajo" value="<?php echo $_GET['idtrabajo'];?>" />
    
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
                                            Trabajos</a>
                                    </li>
                                    <li class="breadcrumb-item active parrafo text-black"><a class="text-black"
                                            href="<?php echo "verFicha.php?id=".$_GET['id']; ?>">Ver Ficha de
                                            Trabajo</a>
                                    </li>
                                    <li class="breadcrumb-item active parrafo text-black"><a class="text-black"
                                            href="<?php echo "gestionContractos.php?id=".$_GET['id']; ?>">Gestión de
                                            Contratos</a>
                                    </li>
                                    <li class="breadcrumb-item active parrafo text-black">Acuerdo de Contrato
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
                    <?php if(contratoController::comprobarAcuerdo($_GET['idcontrato']) == false){ ?>
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
                                                            Numero de Cuotas</h5>
                                                    </label>
                                                    <input type="number" class="form-control" placeholder=". . . "
                                                        name="nocuota" id="nocuota" value="0">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            Valor de Contrato</h5>
                                                    </label>
                                                    <input type="number" readonly class="form-control" placeholder=". . . "
                                                        name="vcontrato" id="vcontrato"
                                                        value="<?php echo $objContracto->getValor_contrato()?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <br>
                                                <button id="generarCuotas" class="btn capa text-white round ">
                                                    <li class="fa fa-calculator fa-2x"></li>&nbsp;Generar Cuotas
                                                </button>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-md-12">
                                            <div id="smg"></div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row" id="tabCuotas">
                                        <?php //contratoController::listadoCuotaContracto($_GET['id'],$_GET['idtrabajo'],$_GET['idcontrato']); ?>
                                    </div>
                                    <div class="col-md-5" id="botonValidar">
                                        <div class="form-group">
                                            <br>
                                            <button id="validarCuotas" class="btn capa text-white round ">
                                                <li class="fa fa-calendar-check fa-2x"></li>&nbsp;Validar Cuotas
                                                Ingresadas
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }else{ 
                        $objtAcuerdo=contratoController::acuerdoId($_GET['idcontrato']);
                        //print_r($objtAcuerdo);
                        //getId_acuerdo_pago() 
                    ?>
                <input type="hidden"  name="idacuerdo" value="<?php echo $objAcuerdo->getId_acuerdo_pago(); ?>" />
                <div class="col-md-12">
                    <div class="card" style="">
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <h2 class="form-section"><i class="fa fa-id-card-alt"></i>
                                    Acuerdo del contrato 
                                </h2>
                                
                                <div class="card-text">
                                    <div id="smg"></div>
                                </div>
                                <?php 
                                    $objtCuotas = contratoController::listadoCuotas($objtAcuerdo->getId_acuerdo_pago() );
                                    //print_r($objtCuotas);
                                    $cuota = 0;
                                    $valor = 0;
                                    $contrato_aux= $objContracto->getValor_contrato();
                                    foreach ($objtCuotas as $key => $value) {
                                   
                                    if($objtCuotas[$key]->getEstado_cuota() == "NO PAGADO"){
                                        $cuota++;
                                        $contrato_aux = floatval($contrato_aux) -floatval($objtCuotas[$key]->getMonto_cuota());
                                    }
                                    
                                   
                                    echo "
                                    
                                <div class='row'>
                                    <div class='col-md-2'>
                                        <div class='form-group'>
                                            <label for=''>
                                                <h5 class='card-title'>Cuota Número
                                                    :
                                                </h5>
                                            </label>
                                            <input readonly type='text' class='form-control' placeholder='. . .'
                                                name='contracto' value='".$objtCuotas[$key]->getNumero_cuota()."'>
                                        </div>
                                    </div>
                                    <div class='col-md-3'>
                                        <div class='form-group' id='grupo'>
                                            <label for=''>
                                                <h5 class='card-title'>Monto:
                                                </h5>
                                            </label>
                                            <input readonly type='text' class='form-control' placeholder='. . .'
                                                name='contracto' value='".$objtCuotas[$key]->getMonto_cuota()."'>
                                        </div>
                                    </div>
                                    <div class='col-md-2'>
                                        <div class='form-group' id='grupo'>
                                            <label for=''>
                                                <h5 class='card-title'>Porcentaje Cuota
                                                </h5>
                                            </label>
                                            <input readonly type='text' class='form-control' placeholder='. . .'
                                                name='contracto' value='".$objtCuotas[$key]->getPorcentaje_cuota()."'>
                                        </div>
                                    </div>
                                    <div class='col-md-2'>
                                        <div class='form-group' id='grupo'>
                                            <label for=''>
                                                <h5 class='card-title'><span class='text-danger'>*</span>Estado:
                                                </h5>
                                            </label>
                                    ";
                                    echo " <select id='estado".$objtCuotas[$key]->getId_cuota()."' name='estado".$objtCuotas[$key]->getId_cuota()."' class='form-control'>";
                                    if($objtCuotas[$key]->getEstado_cuota() == "NO PAGADO"){
                                        echo "<option value='NO PAGADO'>NO PAGADO</option>
                                              <option value='PAGADO'>PAGADO</option>";
                                    }else{
                                        echo "<option value='PAGADO'>PAGADO</option>
                                              <option value='NO PAGADO'>NO PAGADO</option>";
                                    }
                                    echo   "</select>";
                                           
                                echo    "</div>
                                    </div>
                                    <div class='col-md-3'>
                                        <div class='form-group'>
                                            <br>
                                            <a href='#' title='".$objtCuotas[$key]->getId_cuota()."' id='modificarCuota'
                                                class='btn text-white round capa waves-effect waves-light'>
                                                <i class='fa fa-save fa-2x'></i>&nbsp;Modificar Cuota
                                            </a>
                                        </div>
                                    </div>
                                    <div class='col-md-8'>
                                        <div class='form-group' id='grupo'>
                                            <label for=''>
                                                <h5 class='card-title'>Observación
                                                </h5>
                                            </label>
                                            <input type='textarea' class='form-control' placeholder='. . .'
                                                name='observacion".$objtCuotas[$key]->getId_cuota()."' value='".$objtCuotas[$key]->getObservacion()."'>
                                        </div>
                                    </div>
                                </div>
                                <br><br><br><br>"
                                ;
                                }
                                echo "
                                ";
                                // echo "<h4 class='form-section'><i class='fa fa-money-check-alt'></i>
                                // valor por facturar total :  ".$contrato_aux." &nbsp;&nbsp;&nbsp; Cuotas faltantes por pagar : ".$cuota."
                                // </h4>";
                                ?>
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                       <br>
                                       <a href="core/eliminarAcuerdo.php?idcontrato=<?php echo $objAcuerdo->getId_acuerdo_pago(); ?>"
                                        class='btn btn-danger round  waves-effect waves-light'>
                                        <i class='fa fa-ban fa-2x'></i>&nbsp;Eliminar Acuerdo Pago
                                       </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <!--/ contendio -->
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
    <script src="<?php echo PLATFORM_SERVER."modules/trabajo/triggers/process.js"; ?>"></script>
    <script>
        $('#botonValidar').hide();
        
        // $('input[name=porcentaje2]').change(function() { document.getElementsByName("monto2")[0].value=0;});
        // $('input[name=porcentaje3]').change(function() { document.getElementsByName("monto3")[0].value=0;});
        // $('input[name=porcentaje4]').change(function() { document.getElementsByName("monto4")[0].value=0;});
        // $('input[name=porcentaje5]').change(function() { document.getElementsByName("monto5")[0].value=0;});
        // $('input[name=porcentaje6]').change(function() { document.getElementsByName("monto6")[0].value=0;});
        // $('input[name=porcentaje7]').change(function() { document.getElementsByName("monto7")[0].value=0;});
        // $('input[name=porcentaje8]').change(function() { document.getElementsByName("monto8")[0].value=0;});
    //     $("#porcentaje1").keyup(function () {
    //         document.getElementsByName("monto1")[0].value=0;
    //         alert("fs");
    //    });
    </script>
</body>
<!-- END: Body-->
</html>
