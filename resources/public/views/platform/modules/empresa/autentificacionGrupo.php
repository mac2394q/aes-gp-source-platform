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
       require_once (CONTROLLERS_PATH."usuarioController.php");
       require_once (CONTROLLERS_PATH."grupoController.php");
       require_once (HELPERS_PATH."rutas.php");
       session::verificarSesion($_SESSION['idsesion']);
       date_default_timezone_set('America/Bogota');
       setlocale(LC_ALL,"es_CO");
       $idempresa = $_GET['id'];

       $objEmpresa =empresaController::grupoEmpresarial($_GET['id']);
       $objUsuario=usuarioController::usuarioId($objEmpresa->getId_usuariod());
       //print_r( $objEmpresa);
     
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
    <input type="hidden" name="idusuario" id="idusuario" value="<?php echo $objUsuario->getId_usuario(); ?>" />

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
                                    <li class="breadcrumb-item parrafo"><a class="text-black"
                                            href="index.php">Listado</a>
                                    </li>
                                    <li class="breadcrumb-item parrafo"><a class="text-black"
                                            href="<?php echo "verFichaGrupo.php?id=".$_GET['id']; ?>">Ver Ficha </a>
                                    </li>
                                    <li class="breadcrumb-item active parrafo text-black">Autenticación Empresa
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

                            <div class="card-content collpase show">
                                <div class="card-body">

                                    <div class="form form-horizontal form-bordered">
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-user"></i> Datos de Acceso</h4>
                                            <div class="form-group row ">
                                                <label class="col-md-3 label-control parrafo">Usuario
                                                </label>
                                                <div class="col-md-5">

                                                    <input type="text" name="usuario" class="form-control"
                                                        placeholder="...."
                                                        value="<?php echo $objUsuario->getLogin_usuario();  ?>">

                                                </div>
                                            </div>
                                            <div class="form-group row ">

                                                <label class="col-md-3 label-control parrafo">Clave </label>
                                                <div class="col-md-5">

                                                    <input type="text" name="clave" class="form-control"
                                                        placeholder="..."
                                                        value="<?php echo $objUsuario->getClave_usuario();  ?>">

                                                </div>
                                                <div class="col-md-3">
                                                    <button class="btn capa text-white round waves-effect waves-light"
                                                        id="generarClave">
                                                        <i class="fa fa-key fa-2x"></i> Generar Clave única
                                                    </button>

                                                </div>
                                            </div>


                                        </div>
                                        <div class="form-actions">

                                            <button class="btn capa text-white round waves-effect waves-light"
                                                id="autentificacion2">
                                                <i class="fa fa-edit fa-2x"></i> Actualizar 
                                                Autentificación
                                            </button>
                                            <br>
                                            <br>
                                            <br>
                                            <div id="smgSesion"></div>
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
    <script src="<?php echo CORE_JS_SERVER."directory.js"; ?>"></script>
    <script src="<?php echo CORE_JS_SERVER."app.js"; ?>"></script>
    <script src="<?php echo PLATFORM_SERVER."modules/empresa/triggers/module.js"; ?>"></script>
    <script src="<?php echo PLATFORM_SERVER."modules/empresa/triggers/process.js"; ?>"></script>
    <script src="<?php echo PLATFORM_SERVER."modules/empresa/triggers/sweet-alerts.min.js"; ?>"></script>
    <script>

    </script>
</body>
<!-- END: Body-->

</html>
