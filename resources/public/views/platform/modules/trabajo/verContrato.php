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
require_once (HELPERS_PATH."rutas.php");
session::verificarSesion($_SESSION['idsesion']);
date_default_timezone_set('America/Bogota');
setlocale(LC_ALL,"es_CO");
$objContracto = contratoController::ContratoId($_GET['idcontrato']);
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
                                            href="index.php">Listado</a>
                                    </li>
                                    <li class="breadcrumb-item active parrafo text-black"><a class="text-black"
                                            href="<?php echo "verFicha.php?id=".$_GET['id']; ?>">Ver Ficha de
                                            Trabajo</a>
                                    </li>
                                    <li class="breadcrumb-item active parrafo text-black"><a class="text-black"
                                            href="<?php echo "gestionContractos.php?id=".$_GET['id']; ?>">Gestión de
                                            Contratos</a>
                                    </li>
                                    <li class="breadcrumb-item active parrafo text-black">Ficha de Contrato
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
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <h2 class="form-section"><i class="fa fa-id-card-alt"></i>
                                        Información General
                                    </h2>
                                    <div class="card-text">
                                        <div id="smg"></div>
                                    </div>
                                    <div class="form">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            Entidad:</h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control"
                                                        placeholder=". . . " name="nocuota" id="nocuota"
                                                        value="<?php echo empresaController::objEmpresa($objContracto->getId_entidad_pago_contrato())->getNombre_empresa() ;?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            Valor de Contrato</h5>
                                                    </label>
                                                    <input  type="text" class="form-control"
                                                        placeholder=". . . " name="vcontrato" 
                                                        value="<?php echo $objContracto->getValor_contrato()?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            Fecha del Contrato</h5>
                                                    </label>
                                                    <input readonly type="date" class="form-control"
                                                        placeholder=". . . " name="" id=""
                                                        value="<?php echo $objContracto->getFecha_firma_contrato()?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <br>
                                                    <button class="btn capa round text-white waves-effect waves-light" id="editarContrato">
                                                            <i class="fa fa-edit fa-2x"></i>&nbsp;Modificar Valor Contrato
                                                        </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="contrato"></div>
                                        <br>
                                        <h2 class="form-section"><i class="fa fa-id-card-alt"></i>
                                            Documentos del Contrato
                                        </h2>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="smgDocumentos"></div>
                                            </div>
                                            <div class="col-md-4 form-body">
                                                <h4 class="form-section"><i class="la la-clipboard"></i> Contrato:</h4>
                                                
                                                <div class="form-group row mx-auto">
                                                   
                                                    <div class="col-md-12">
                                                        <label id="projectinput8" class="file center-block">
                                                            <input type="file" id="docContrato">
                                                            <span class="file-custom"></span>
                                                        </label>&nbsp;&nbsp;&nbsp;
                                                        <button
                                                            class="btn capa round text-white waves-effect waves-light "
                                                            id="subirDocContra">
                                                            <i class="fa fa-cloud-upload-alt fa-2x"></i>&nbsp;Subir
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="form-group row mx-auto last">
                                                    <div class="col-md-12">
                                                    <label class="col-md-3 label-control" for="projectinput9">
                                                    <?php
                                                    if(rutas::validarRutas(DOCUMENTS_SERVER."documentos/trabajo/".$_GET['id']."/".$_GET['idcontrato']."/contracto.pdf") == "200"){
                                                        echo " <div class='badge badge-success round '>Archivo Cargado</div>";
                                                    }
                                                    
                                                    ?>
                                                    </label>&nbsp;&nbsp;
                                                        <a target="_blank"
                                                            href="<?php echo DOCUMENTS_SERVER."documentos/trabajo/".$_GET['id']."/".$_GET['idcontrato']."/contracto.pdf"; ?>"
                                                            class="btn capa text-white round waves-effect waves-light">
                                                            <i class="fa fa-download fa-2x"></i>&nbsp;Descargar
                                                            Documento
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4  form-body">
                                                <h4 class="form-section"><i class="la la-clipboard"></i>Póliza :
                                                </h4>
                                               
                                                <div class="form-group row mx-auto">
                                                    
                                                    <div class="col-md-12">
                                                        <label id="projectinput8" class="file center-block">
                                                            <input type="file" id="docPoliza">
                                                            <span class="file-custom"></span>
                                                        </label>&nbsp;&nbsp;&nbsp;
                                                        <button
                                                            class="btn capa round text-white waves-effect waves-light "
                                                            id="subirDocPoli">
                                                            <i class="fa fa-cloud-upload-alt fa-2x"></i>&nbsp;Subir
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="form-group row mx-auto last">
                                                    <div class="col-md-12">
                                                    <label class="col-md-3 label-control" for="projectinput9">
                                                    <?php
                                                    if(rutas::validarRutas(DOCUMENTS_SERVER."documentos/trabajo/".$_GET['id']."/".$_GET['idcontrato']."/poliza.pdf") == "200"){
                                                        echo " <div class='badge badge-success round '>Archivo Cargado</div>";
                                                    }
                                                    
                                                    ?>
                                                    </label>&nbsp;&nbsp;
                                                        <a target="_blank"
                                                            href="<?php echo DOCUMENTS_SERVER."documentos/trabajo/".$_GET['id']."/".$_GET['idcontrato']."/poliza.pdf"; ?>"
                                                            class="btn capa text-white round waves-effect waves-light">
                                                            <i class="fa fa-download fa-2x"></i>&nbsp;Descargar
                                                            Documento
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4  form-body">
                                                <h4 class="form-section"><i class="la la-clipboard"></i>Confidencialidad:</h4>
                                               
                                                <div class="form-group row mx-auto">
                                                    
                                                    <div class="col-md-12">
                                                        <label id="projectinput8" class="file center-block">
                                                            <input type="file" id="docConfi">
                                                            <span class="file-custom"></span>
                                                        </label>&nbsp;&nbsp;&nbsp;
                                                        <button
                                                            class="btn capa round text-white waves-effect waves-light "
                                                            id="subirDocConfi">
                                                            <i class="fa fa-cloud-upload-alt fa-2x"></i>&nbsp;Subir
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="form-group row mx-auto last">
                                                    <div class="col-md-12">
                                                    <label class="col-md-3 label-control" for="projectinput9">
                                                    <?php
                                                    if(rutas::validarRutas(DOCUMENTS_SERVER."documentos/trabajo/".$_GET['id']."/".$_GET['idcontrato']."/confidencialidad.pdf") == "200"){
                                                        echo " <div class='badge badge-success round '>Archivo Cargado</div>";
                                                    }
                                                    
                                                    ?>
                                                    </label>&nbsp;&nbsp;
 
                                                        <a target="_blank"
                                                            href="<?php echo DOCUMENTS_SERVER."documentos/trabajo/".$_GET['id']."/".$_GET['idcontrato']."/confidencialidad.pdf"; ?>"
                                                            class="btn capa text-white round waves-effect waves-light">
                                                            <i class="fa fa-download fa-2x"></i>&nbsp;Descargar
                                                            Documento
                                                        </a>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <h2 class="form-section"><i class="fa fa-id-card-alt"></i>
                                        Asociar Proyectos al Contrato
                                    </h2>
                                    <div class="card-text">
                                        <div id="smg"></div>
                                    </div>
                                    <div class="form">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <label for="">
                                                    <h5 class="card-title"><span class="text-danger">*</span>
                                                        Asociar Proyectos:
                                                    </h5>
                                                </label>
                                                <?php echo contratoController::listadoContratoTrabajoSeleccion($_GET['id']); ?>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <br>
                                                    <button type="button" id="asociarProyecto"
                                                        class="btn text-white round capa waves-effect waves-light">
                                                        <i class="fa fa-chevron-right fa-2x"></i>&nbsp;Asociar Proyecto
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <?php echo contratoController::listadoContratoTrabajo($_GET['id'],$_GET['idcontrato']); ?>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="<?php echo CORE_JS_SERVER."directory.js"; ?>"></script>
    <script src="<?php echo CORE_JS_SERVER."app.js"; ?>"></script>
    <script src="<?php echo PLATFORM_SERVER."modules/trabajo/triggers/module.js"; ?>"></script>
    <script src="<?php echo PLATFORM_SERVER."modules/trabajo/triggers/process.js"; ?>"></script>
    <script>
    $(document).on('click', '#editarContrato', function (e) {
  var formData = new FormData();
  var vcontrato =   document.getElementsByName("vcontrato")[0].value;
  var idcontrato =  document.getElementsByName("idcontrato")[0].value;
  formData.append("idcontrato", idcontrato);
  formData.append("vcontrato", vcontrato);


  if(  vcontrato.length > 0 ){
    swal({
      title: "Modificar Valor del contracto",
      text: "Esta seguro de modificar el contracto ?",
      icon: "success",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        var ruta = routesAppPlatform() + 'trabajo/core/editarContrato.php';
        sendEventFormDataApp('POST', ruta, formData, '#contrato');
        //location.reload();
      }
    });

  }else{
    swal({title: "Error de validación",
          text: "Actualmente hay campos obligatorios pendiente!",
          icon: "warning",
          button: false, 
          timer: 6000 });
        $("#contrato").html("Actualmente hay campos obligatorios pendiente");


  }
  


});
</script>
<!-- END: Body-->
</html>
