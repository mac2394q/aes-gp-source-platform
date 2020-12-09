<?php session_start(); ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <?php
    include_once($_SERVER['DOCUMENT_ROOT'] . '/conf.php');
    require_once(PLATFORM_PATH . "global/inc/platform/head.php");
    require_once(LIB_PATH . "session.php");
    require_once(CONTROLLERS_PATH . "empresaController.php");
    require_once(CONTROLLERS_PATH . "trabajoController.php");
    require_once(CONTROLLERS_PATH . "usuarioController.php");
    require_once(HELPERS_PATH . "rutas.php");
    session::verificarSesion($_SESSION['idsesion']);
    date_default_timezone_set('America/Bogota');
    setlocale(LC_ALL, "es_CO");
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

<body class="vertical-layout vertical-menu-modern material-vertical-layout material-layout 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:75%;">
    <input type="hidden" name="idtrabajo" id="idtrabajo" value="<?php echo  $idempresa; ?>" />
    <input type="hidden" name="idsesion" id="idsesion" value="" />
    <input type="hidden" name="fechavisita" value="<?php echo $objTrabajo->getFecha_visita_dian_trabajo(); ?>" />
    <input type="hidden" name="fechaSolicitud" value="<?php echo $objTrabajo->getFecha_inscripcion_dian_trabajo();  ?>" />
    <!-- BEGIN: Header-->
    <?php require_once(PLATFORM_PATH . "global/inc/component/fixed_top.php"); ?>
    <!-- END: Header-->
    <!-- BEGIN: Main Menu-->
    <?php require_once(PLATFORM_PATH . "global/inc/component/main_menu.php"); ?>
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
                                    <?php if ($_SESSION['rol'] == "ADMINISTRADOR" || $_SESSION['rol'] == "LIDER OEA" || $_SESSION['rol'] == "ASISTENTE") { ?>
                                        <li class="breadcrumb-item active parrafo text-black"><a class="text-black" href="index.php">Listado </a>
                                        </li>
                                    <?php } ?>
                                    <li class="breadcrumb-item active parrafo text-black"><a class="text-black" href="<?php echo "verFicha.php?id=" . $_GET['id']; ?>">Ver Ficha de
                                            Trabajo</a>
                                    </li>
                                    <li class="breadcrumb-item active parrafo text-black">Inscripción DIAN
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
                            <div class="row">
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="form form-horizontal row-separator">
                                        <div class="form-body">
                                            <h2 class="form-section"><i class="fa fa-id-card-alt"></i>
                                                Inscripción Empresa
                                            </h2>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">
                                                            <h5 class="card-title">
                                                                Fecha Inscripción DIAN
                                                            </h5>
                                                        </label>
                                                        <input type="date" class="form-control" placeholder=". . ." name="inscripcionDian" id="inscripcionDian" value="<?php echo $objTrabajo->getFecha_inscripcion_dian_trabajo();  ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">
                                                            <h5 class="card-title">
                                                                Fecha Visita DIAN </h5>
                                                        </label>
                                                        <input type="date" class="form-control" placeholder=". . ." name="visita" id="visita" value="<?php echo $objTrabajo->getFecha_visita_dian_trabajo(); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>

                                            <br><br>
                                            <h2 class="form-section"><i class="la la-clipboard"></i> Acta de Soporte:
                                            </h2>
                                            <div class="form-group row mx-auto">
                                                <label class="col-md-3 label-control">Remplazar documento actual</label>
                                                <div class="col-md-9">
                                                    <label id="projectinput8" class="file center-block">
                                                        <input type="file" id="s1" accept="application/pdf">
                                                        <span class="file-custom"></span>
                                                    </label>&nbsp;&nbsp;&nbsp;
                                                    <?php if ($_SESSION['rol'] == "ESPECIALISTA" || $_SESSION['rol'] == "ADMINISTRADOR" || $_SESSION['rol'] == "LIDER OEA" || $_SESSION['rol'] == "ASISTENTE") { ?>
                                                        <button class="btn capa round text-white waves-effect waves-light " id="d1">
                                                            <i class="fa fa-cloud-upload-alt fa-2x"></i>&nbsp;Subir
                                                        </button>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="form-group row mx-auto last">
                                                <label class="col-md-3 label-control" for="projectinput9">Documento
                                                </label>
                                                <label class="col-md-3 label-control" for="projectinput9">
                                                    <?php
                                                    if (rutas::validarRutas(DOCUMENTS_SERVER . "documentos/trabajo/" . $_GET['id'] . "/dianSoporte.pdf") == "200") {
                                                        echo " <div class='badge badge-success round'>Archivo Cargado</div>";
                                                    }
                                                    ?>
                                                </label>
                                                <div class="col-md-6">
                                                    <a target="_blank" href="<?php echo DOCUMENTS_SERVER . "documentos/trabajo/" . $_GET['id'] . "/dianSoporte.pdf"; ?>" class="btn capa text-white round waves-effect waves-light">
                                                        <i class="fa fa-download fa-2x"></i>&nbsp;Descargar Documento
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <?php if ($_SESSION['rol'] == "ESPECIALISTA" || $_SESSION['rol'] == "ADMINISTRADOR" || $_SESSION['rol'] == "LIDER OEA" || $_SESSION['rol'] == "ASISTENTE") { ?>
                                                            <a id="dian" href="#" class="btn capa text-white round waves-effect waves-light">
                                                                <i class="fa fa-file-signature fa-2x"></i>&nbsp;Inscribir Empresa
                                                            </a>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="smg"></div>
                            <div id="smgDocumentos"></div>
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
    require_once(PLATFORM_PATH . "global/inc/component/footer.php");
    require_once(PLATFORM_PATH . "global/inc/platform/lib.php");
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="<?php echo CORE_JS_SERVER . "directory.js"; ?>"></script>
    <script src="<?php echo CORE_JS_SERVER . "app.js"; ?>"></script>
    <script src="<?php echo PLATFORM_SERVER . "modules/trabajo/triggers/module.js"; ?>"></script>
    <script>
        $('#visita').change(function() {
            var date = $('#visita').val();
            document.getElementsByName("fechavisita")[0].value = date;
            console.log("visita " + date);
        });
        $('#inscripcionDian').change(function() {
            var date = $('#inscripcionDian').val();
            document.getElementsByName("fechaSolicitud")[0].value = date;
            console.log("solicitud " + date);
        });

        $(document).on('click', '#dian', function(e) {

            var fechaInscripcion = document.getElementsByName("fechaSolicitud")[0].value;
            var fechaVisita = document.getElementsByName("fechavisita")[0].value;


            var formData = new FormData();
            formData.append("idtrabajo", document.getElementsByName("idtrabajo")[0].value);

            formData.append("fechaSolicitud", fechaInscripcion);
            formData.append("fechavisita", fechaVisita);

            console.log("fecha Solicitud -> " + fechaInscripcion + " count " + fechaInscripcion.length);
            console.log("fecha visita -> " + fechaVisita + " count " + fechaVisita.length);

            if ( fechaInscripcion.length > 0 && fechaVisita.length > 0 && fechaVisita != '0000-00-00' ) {
                if ((new Date(document.getElementsByName("fechavisita")[0].value).getTime() > new Date(document.getElementsByName("fechaSolicitud")[0].value).getTime())) {
                    swal({
                            //title: " Visita DIAN",
                            title: " Actualización Fechas DIAN",
                            text: "¿Está seguro que desea realizar la inscripción? ",
                            icon: "success",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                var ruta = routesAppPlatform() + 'trabajo/core/dian.php';
                                sendEventFormDataApp('POST', ruta, formData, '#smg');
                            }
                        });
                    
                } else {
                
                    swal({
                        title: "Error de fechas",
                        text: "La fecha de visita debe ser superior a la fecha de inscripción.",
                        icon: "warning",
                        button: false,
                        timer: 6000
                    });
                }
            
            }else if (fechaInscripcion.length > 0 && (fechaVisita.length == 0 || fechaVisita != '0000-00-00' || fechaVisita != '') ) {

                swal({
                            //title: " Inscripción DIAN",
                            title: " Actualización Fechas DIAN",
                            text: "¿Está seguro que desea realizar la inscripción? ",
                            icon: "success",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                var ruta = routesAppPlatform() + 'trabajo/core/dian.php';
                                sendEventFormDataApp('POST', ruta, formData, '#smg');
                            }
                        });

            }else {
                
                swal({
                    title: "Error de fechas",
                    text: "La fecha no esta seleccionada correctamente.",
                    icon: "warning",
                    button: false,
                    timer: 6000

                });
            }

            return false;
        });
    </script>
</body>
<!-- END: Body-->

</html>