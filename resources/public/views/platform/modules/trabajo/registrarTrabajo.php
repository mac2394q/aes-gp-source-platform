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
       require_once (CONTROLLERS_PATH."usuarioController.php");
       require_once (CONTROLLERS_PATH."trabajoController.php");
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
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:75%;">
    <input type="hidden" value="0" name="certificadosDinamicos" />
    <input type="hidden" value="grupo" name="tipo" />
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
                        <h3 class="content-header-title titulo floating-label-form-group-with-value titulo">Módulo Trabajo</h3>
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item parrafo"><a class="text-black" href="index.php">Listado </a>
                                    </li>
                                    <li class="breadcrumb-item active parrafo text-black">Registrar  Trabajo
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
                    <section>
                        <div class="row ">
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
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">
                                                                    <h5 class="card-title"><span
                                                                            class="text-danger">*</span>Tipo de Entidad
                                                                        :
                                                                    </h5>
                                                                </label>
                                                                <select class="form-control" name="opcionEntidad"
                                                                    id="opcionEntidad">
                                                                    <option value="grupo">Grupo</option>
                                                                    <option value="empresa">Empresa </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group" id="grupo">
                                                                <label for="">
                                                                    <h5 class="card-title"><span
                                                                            class="text-danger">*</span>Entidad Grupo:
                                                                    </h5>
                                                                </label>
                                                                <?php echo trabajoController::listadoGrupo(null); ?>
                                                            </div>
                                                            <div class="form-group" id="empresa">
                                                                <label for="">
                                                                    <h5 class="card-title"><span
                                                                            class="text-danger">*</span>Entidad Empresa:
                                                                    </h5>
                                                                </label>
                                                                <?php echo trabajoController::listadoEmpresa_(); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <br>
                                                                <button type="button" id="registrarTrabajo"
                                                                    class="btn text-white round capa waves-effect waves-light">
                                                                    <i class="fa fa-save fa-2x"></i>&nbsp;Registrar Trabajo
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                </div>
                                                <div class="form-actions">
                                                    <div id="smgtrabajo"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12" id="continuacion">
                                
                            </div>
                        </div>
                    </section>
                    <!--/ contendio -->
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="<?php echo CORE_JS_SERVER."directory.js"; ?>"></script>
    <script src="<?php echo CORE_JS_SERVER."app.js"; ?>"></script>
    <script src="<?php echo PLATFORM_SERVER."modules/trabajo/triggers/module.js"; ?>"></script>
    
    <script>
        $('#continuacion').hide();
        $('#empresa').hide();

        $(document).on('click', '#agregarCertificado', function (e) {
            var contador = document.getElementsByName("certificadosDinamicos")[0].value;
            //alert(contador);
            contador = parseInt(contador) + 1;
            //alert(contador);
            document.getElementsByName("certificadosDinamicos")[0].value = contador;
        });
        $(document).on('click', '#eliminarCertificado', function (e) {
            var contador = document.getElementsByName("certificadosDinamicos")[0].value;
            if (parseInt(contador) > 0) {
                //alert(contador);
                contador = parseInt(contador) - 1;
                //alert(contador);
                document.getElementsByName("certificadosDinamicos")[0].value = contador;
            }
        });
        $(document).on('click', '#opcionEntidad', function (e) {
            var contador = document.getElementsByName("opcionEntidad")[0].value;
            if (contador == "grupo") {
                $('#grupo').show();
                $('#empresa').hide();
                document.getElementsByName("tipo")[0].value="grupo";
            } else {
                $('#grupo').hide();
                $('#empresa').show();
                document.getElementsByName("tipo")[0].value="empresa";
            }
        });
    </script>
</body>
<!-- END: Body-->
</html>
