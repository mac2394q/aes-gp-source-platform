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
       require_once (CONTROLLERS_PATH."areaController.php");
       require_once (CONTROLLERS_PATH."grupoController.php");
       require_once (HELPERS_PATH."rutas.php");
       session::verificarSesion($_SESSION['idsesion']);
       date_default_timezone_set('America/Bogota');
       setlocale(LC_ALL,"es_CO");
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
    <input type="hidden" value="<?php  echo $_GET['id']; ?>" name="idempresa" />
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
                        <h3 class="content-header-title titulo">Módulo Empresa</h3>
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                   <?php if($_SESSION['rol'] == "LIDER OEA" ||
                                                                 $_SESSION['rol'] == "ASISTENTE" ||
                                                                 $_SESSION['rol'] == "ADMINISTRADOR"
                                            ){ ?>
                                    <li class="breadcrumb-item parrafo"><a class="text-black"
                                            href="index.php">Listado</a>
                                    </li>
                                    <?php }?>
                                    <li class="breadcrumb-item active parrafo text-black"><a class="text-black"
                                            href="<?php echo "verFicha.php?id=".$_GET['id']; ?>">Ver Ficha Empresa</a>
                                    </li>
                                    <li class="breadcrumb-item active parrafo text-black">Documentos de Empresa
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
                                    <div class="form form-horizontal row-separator">
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="la la-clipboard"></i> Rut:</h4>
                                            <div id="smgDocumentos1"></div>
                                            <div class="form-group row mx-auto">
                                                <label class="col-md-3 label-control">Remplazar documento actual</label>
                                                <div class="col-md-9">
                                                    <?php if($_SESSION['rol'] == "LIDER OEA" ||
                                                                 $_SESSION['rol'] == "ASISTENTE" ||
                                                                 $_SESSION['rol'] == "ADMINISTRADOR"
                                                    ){ ?>
                                                    <label id="projectinput8" class="file center-block">
                                                        <input type="file" id="s1" accept="application/pdf">
                                                        <span class="file-custom"></span>
                                                    </label>&nbsp;&nbsp;&nbsp;
                                                    
                                                    <button class="btn capa round text-white waves-effect waves-light " id="d1">
                                                        <i class="fa fa-cloud-upload-alt fa-2x"></i>&nbsp;Subir
                                                    </button>
                                                    <?php }?>
                                                </div>
                                            </div>
                                            <div class="form-group row mx-auto last">
                                                <label class="col-md-3 label-control" for="projectinput9">
                                                    <?php
                                                    if(rutas::validarRutas(DOCUMENTS_SERVER."documentos/empresa/".$_GET['id']."/rut.pdf") == "200"){
                                                        echo " <div class='badge badge-success'>Archivo Cargado</div>";
                                                    }
                                                    
                                                    ?>
                                                </label>
                                                <label class="col-md-2 label-control" for="projectinput9">Documento
                                                </label>
                                                
                                                <div class="col-md-6">
                                                    <a target="_blank" href="<?php echo DOCUMENTS_SERVER."documentos/empresa/".$_GET['id']."/rut.pdf"; ?>"
                                                        class="btn capa text-white round waves-effect waves-light">
                                                        <i class="fa fa-download fa-2x"></i>&nbsp;Descargar Documento
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="la la-clipboard"></i> Cámara de Comercio:
                                            </h4>
                                            <div id="smgDocumentos2"></div>
                                            <div class="form-group row mx-auto">
                                                <label class="col-md-3 label-control">Remplazar documento actual</label>
                                                <div class="col-md-9">
                                                <?php if($_SESSION['rol'] == "LIDER OEA" ||
                                                                 $_SESSION['rol'] == "ASISTENTE" ||
                                                                 $_SESSION['rol'] == "ADMINISTRADOR"
                                                    ){ ?>
                                                    <label id="projectinput8" class="file center-block">
                                                        <input type="file" id="s2" accept="application/pdf">
                                                        <span class="file-custom"></span>
                                                    </label>&nbsp;&nbsp;&nbsp;
                                                    <button class="btn capa round text-white waves-effect waves-light" id="d2">
                                                        <i class="fa fa-cloud-upload-alt fa-2x"></i>&nbsp;Subir
                                                    </button>
                                                <?php }?>
                                                </div>
                                            </div>
                                            <div class="form-group row mx-auto last">
                                               <label class="col-md-3 label-control" for="projectinput9">
                                                    <?php
                                                    if(rutas::validarRutas(DOCUMENTS_SERVER."documentos/empresa/".$_GET['id']."/camara.pdf") == "200"){
                                                        echo " <div class='badge badge-success'>Archivo Cargado</div>";
                                                    }
                                                    
                                                    ?>
                                                </label>
                                                <label class="col-md-2 label-control" for="projectinput9">Documento
                                                </label>
                                                <div class="col-md-6">
                                                    <a  target="_blank" href="<?php echo DOCUMENTS_SERVER."documentos/empresa/".$_GET['id']."/camara.pdf"; ?>"
                                                        class="btn capa text-white round waves-effect waves-light">
                                                        <i class="fa fa-download fa-2x"></i>&nbsp; Descargar Documento
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="la la-clipboard"></i> Id Representante
                                                Legal:</h4>
                                                <div id="smgDocumentos3"></div>
                                            <div class="form-group row mx-auto">
                                                <label class="col-md-3 label-control">Remplazar documento actual</label>
                                                <div class="col-md-9">
                                                    <?php if($_SESSION['rol'] == "LIDER OEA" ||
                                                                 $_SESSION['rol'] == "ASISTENTE" ||
                                                                 $_SESSION['rol'] == "ADMINISTRADOR"
                                                    ){ ?>
                                                    <label id="projectinput8" class="file center-block">
                                                        <input type="file" id="s3" accept="application/pdf">
                                                        <span class="file-custom"></span>
                                                    </label>&nbsp;&nbsp;&nbsp;
                                                    <button class="btn capa round text-white waves-effect waves-light" id="d3">
                                                        <i class="fa fa-cloud-upload-alt fa-2x"></i>&nbsp; Subir
                                                    </button>
                                                    <?php }?>
                                                </div>
                                            </div>
                                            <div class="form-group row mx-auto last">
                                                <label class="col-md-3 label-control" for="projectinput9">
                                                    <?php
                                                    if(rutas::validarRutas(DOCUMENTS_SERVER."documentos/empresa/".$_GET['id']."/legal.pdf") == "200"){
                                                        echo " <div class='badge badge-success'>Archivo Cargado</div>";
                                                    }
                                                    
                                                    ?>
                                                </label>
 
                                                <label class="col-md-2 label-control" for="projectinput9">Documento
                                                </label>
                                                <div class="col-md-6">
                                                    <a target="_blank" href="<?php echo DOCUMENTS_SERVER."documentos/empresa/".$_GET['id']."/legal.pdf"; ?>"
                                                        class="btn capa text-white round waves-effect waves-light">
                                                        <i class="fa fa-download fa-2x"></i>&nbsp;Descargar Documento
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="la la-clipboard"></i> Ref. Comercial:</h4>
                                                <div id="smgDocumentos4"></div>
                                            <div class="form-group row mx-auto">
                                                <label class="col-md-3 label-control">Remplazar documento actual</label>
                                                <div class="col-md-9">
                                                   <?php if($_SESSION['rol'] == "LIDER OEA" ||
                                                                 $_SESSION['rol'] == "ASISTENTE" ||
                                                                 $_SESSION['rol'] == "ADMINISTRADOR"
                                                    ){ ?>
                                                    <label id="projectinput8" class="file center-block">
                                                        <input type="file" id="s4" accept="application/pdf">
                                                        <span class="file-custom"></span>
                                                    </label>&nbsp;&nbsp;&nbsp;
                                                    <button class="btn capa round text-white waves-effect waves-light" id="d4">
                                                        <i class="fa fa-cloud-upload-alt fa-2x"></i>&nbsp;Subir
                                                    </button>
                                                    <?php }?>
                                                </div>
                                            </div>
                                            <div class="form-group row mx-auto last">
                                               <label class="col-md-3 label-control" for="projectinput9">
                                                    <?php
                                                    if(rutas::validarRutas(DOCUMENTS_SERVER."documentos/empresa/".$_GET['id']."/comercial.pdf") == "200"){
                                                        echo " <div class='badge badge-success'>Archivo Cargado</div>";
                                                    }
                                                    
                                                    ?>
                                                </label>
                                                <label class="col-md-2 label-control" for="projectinput9">Documento
                                                </label>
                                                <div class="col-md-6">
                                                    <a target="_blank" href="<?php echo DOCUMENTS_SERVER."documentos/empresa/".$_GET['id']."/comercial.pdf"; ?>"
                                                        class="btn capa text-white round waves-effect waves-light">
                                                        <i class="fa fa-download fa-2x"></i>&nbsp;Descargar Documento
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="la la-clipboard"></i> Antecedentes:</h4>
                                            <div id="smgDocumentos5"></div>
                                            <div class="form-group row mx-auto">
                                                <label class="col-md-3 label-control">Remplazar documento actual</label>
                                                <div class="col-md-9">
                                                    <?php if($_SESSION['rol'] == "LIDER OEA" ||
                                                                 $_SESSION['rol'] == "ASISTENTE" ||
                                                                 $_SESSION['rol'] == "ADMINISTRADOR"
                                                    ){ ?>
                                                    <label id="projectinput8" class="file center-block">
                                                        <input type="file" id="s5" accept="application/pdf">
                                                        <span class="file-custom"></span>
                                                    </label>&nbsp;&nbsp;&nbsp;
                                                    <button class="btn capa round text-white waves-effect waves-light" id="d5">
                                                        <i class="fa fa-cloud-upload-alt fa-2x"></i>&nbsp; Subir
                                                    </button>
                                                    <?php }?>
                                                </div>
                                            </div>
                                            <div class="form-group row mx-auto last">
                                            <label class="col-md-3 label-control" for="projectinput9">
                                                    <?php
                                                    if(rutas::validarRutas(DOCUMENTS_SERVER."documentos/empresa/".$_GET['id']."/antecedentes.pdf") == "200"){
                                                        echo " <div class='badge badge-success'>Archivo Cargado</div>";
                                                    }
                                                    
                                                    ?>
                                                </label>
                                                <label class="col-md-2 label-control" for="projectinput9">Documento
                                                </label>
                                                <div class="col-md-6">
                                                    <a target="_blank" href="<?php echo DOCUMENTS_SERVER."documentos/empresa/".$_GET['id']."/antecedentes.pdf"; ?>"
                                                        class="btn capa text-white round waves-effect waves-light">
                                                        <i class="fa fa-download fa-2x"></i>&nbsp; Descargar Documento
                                                    </a>
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
        </div>
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
    <script src="<?php echo PLATFORM_SERVER."modules/empresa/triggers/module.js"; ?>"></script>
</body>
<!-- END: Body-->
</html>
