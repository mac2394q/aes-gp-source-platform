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
       require_once (CONTROLLERS_PATH."usuarioController.php");
       require_once (CONTROLLERS_PATH.'paisController.php');
       session::verificarSesion($_SESSION['idsesion']);
       date_default_timezone_set('America/Bogota');
       setlocale(LC_ALL,"es_CO");
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
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:75%">
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
                        <h3 class="content-header-title titulo">Módulo Usuarios</h3>
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item parrafo"><a class="text-black" href="index.php">Listado
                                            </a>
                                    </li>
                                    <li class="breadcrumb-item active parrafo text-black">Registro de Usuario
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
                <div class="text-black">
                    <section id="basic-form-layouts">
                        <div class="row match-height">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-content collapse show">
                                        <div class="card-body">
                                            <div class="form">
                                                <div class="form-body">
                                                    <h2 class="form-section"><i class="fa fa-id-card-alt"></i>
                                                        Información General
                                                    </h2>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="projectinput1">
                                                                    <h5 class="card-title"><span
                                                                            class="text-danger">*</span> Nombre </h5>
                                                                </label>
                                                                <input type="text" id="projectinput1"
                                                                    class="form-control" placeholder=". . ."
                                                                    name="nombre">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for=''>
                                                                    <h5 class="card-title"><span
                                                                            class="text-danger">*</span> Rol: </h5>
                                                                </label>
                                                                <select id="rol" name="rol" class="form-control"
                                                                    title="">
                                                                    <option value="LIDER OEA">Lider oea </option>
                                                                    <option value="ESPECIALISTA">Especialista </option>
                                                                    <option value="ASISTENTE">Asistente</option>
                                                                  
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="projectinput2">
                                                                    <h5 class="card-title"><span
                                                                            class="text-danger">*</span> Documento de Identidad </h5>
                                                                </label>
                                                                <input type="text" id="projectinput2"
                                                                    class="form-control" placeholder=". . ."
                                                                    name="documento">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="projectinput4">
                                                                    <h5 class="card-title"><span
                                                                            class="text-danger">*</span> Correo
                                                                        Electrónico </h5>
                                                                </label>
                                                                <input type="text" id="projectinput4"
                                                                    class="form-control" placeholder=". . . "
                                                                    name="correo">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="projectinput3">
                                                                    <h5 class="card-title"><span
                                                                            class="text-danger">*</span> Teléfono </h5>
                                                                </label>
                                                                <input type="text" id="projectinput3"
                                                                    class="form-control" placeholder=". . . "
                                                                    name="telefono">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="projectinput3">
                                                                    <h5 class="card-title"><span
                                                                            class="text-danger">*</span> Dirección </h5>
                                                                </label>
                                                                <input type="text" id="projectinput3"
                                                                    class="form-control" placeholder=". . . "
                                                                    name="direccion">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h2 class="form-section"><i class="fa fa-mail-bulk"></i>
                                                        Información Administrativa</h2>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <?php paisController::listadoPaisSelect('Pais');?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput4">
                                                                    <h5 class="card-title"><span
                                                                            class="text-danger">*</span> Ciudad /Estado / Municipio
                                                                    </h5>
                                                                </label>
                                                                <input type="text" id="projectinput4"
                                                                    class="form-control" placeholder=". . . "
                                                                    name="ciudad">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    
                                                    <br>
                                                    <div class="form-actions">
                                                        <button type="button" id="registrarEmpleado"
                                                            class="btn capa round text-white btn-sm btn-min-width mr-1 mb-1 waves-effect waves-light">
                                                            <i class="fa fa-save fa-2x"></i> Guardar
                                                        </button>
                                                        &nbsp;&nbsp;&nbsp;
                                                        <button type="button" onclick="location.reload()"
                                                            class="btn capa round btn-danger btn-sm btn-min-width mr-1 mb-1 waves-effect waves-light">
                                                            <i class="fa fa-ban fa-2x"></i> Cancelar
                                                        </button>
                                                        <div id="smgEmpleado"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                </section>
                <!--/ contendio -->
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
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="<?php echo CORE_JS_SERVER."directory.js"; ?>"></script>
    <script src="<?php echo CORE_JS_SERVER."app.js"; ?>"></script>
    <script src="<?php echo PLATFORM_SERVER."modules/usuarios/triggers/module.js"; ?>"></script>
</body>
<!-- END: Body-->
</html>
