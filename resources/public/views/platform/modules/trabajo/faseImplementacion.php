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
<body class="vertical-layout vertical-menu-modern material-vertical-layout material-layout 2-columns   fixed-navbar"
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:75%;">
    <input type="hidden" name="idempresa" id="idempresa" value="<?php echo  $idempresa; ?>" />
    <input type="hidden" name="idproyecto" id="idproyecto" value="<?php echo  $_GET['idproyecto']; ?>" />
    <input type="hidden" name="idtrabajo" id="idtrabajo" value="<?php echo $_GET['id'];?>" />
    <input type="hidden" value="0" name="contadorColaboradores" />
    <input type="hidden" value="0" name="colaboradores1" />
    <input type="hidden" value="0" name="colaboradores2" />
    <input type="hidden" value="0" name="colaboradores3" />
    <input type="hidden" value="0" name="colaboradores4" />
    <input type="hidden" value="0" name="colaboradores5" />
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
                                            href="index.php">Listado </a>
                                    </li>
                                    <li class="breadcrumb-item active parrafo text-black"><a class="text-black"
                                            href="<?php echo "verFicha.php?id=".$_GET['id']; ?>">Ver Ficha de
                                            Trabajo</a>
                                    </li>
                                    <li class="breadcrumb-item active parrafo text-black"><a class="text-black"
                                            href="<?php echo "gestionProyecto.php?id=".$_GET['id']; ?>">Gestión de
                                            Proyectos</a>
                                    </li>
                                    <li class="breadcrumb-item active parrafo text-black">Fase de Implementación
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
                            <div class="card-header">
                                <h2 class="form-section"><i class="fa fa-business-time"></i>
                                    FASE DE IMPLEMENTACIÓN</h2>
                                <br>
                                <h4 class="card-title parrafo">Nota : Una vez termine el proceso de implementación, por favor hacer clic en <code>
                                        |FINALIZAR
                                        IMPLEMENTACIÓN| </code> 
                                     </h4>
                                <br>
                                <div class="form-group ">
                                    <div id="smg"></div>
                                </div>
                                <div class='form-group'>
                                <a id="finalizarImplementacion"
                                        class="btn capa round text-white waves-effect waves-light text-white"> <i
                                            class="fa fa-clipboard-check fa-2x"></i>&nbsp; FINALIZAR IMPLEMENTACIÓN </a>
                                    <!-- <button type='button' class='btn capa text-white round' data-toggle='modal'
                                        data-target='#exampleModal'>
                                        <li class='fa fa-users fa-2x'></li>&nbsp;Colaboradores
                                    </button> -->
                                    <!-- <div class='modal fade'
                                        style='overflow-y: scroll; max-height:85%;  margin-top: 60px; margin-bottom:60px;'
                                        id='exampleModal' tabindex='-1' role='dialog'
                                        aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                        <div class='modal-dialog modal-lg' role='document'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <h5 class='modal-title parrafo' id='exampleModalLabel'>Gestion de
                                                        Colaboradores</h5>
                                                    <button type='button' class='close' data-dismiss='modal'
                                                        aria-label='Close'>
                                                        <span aria-hidden='true'>&times;</span>
                                                    </button>
                                                </div>
                                                <div class='modal-body'>
                                                    <div class='row'>
                                                        <div class='col-md-12'>
                                                            <div class='row'>
                                                                <div class='col-md-3'>
                                                                    <div class='form-group'>
                                                                        <label for=''>
                                                                            <h5 class='card-title'>
                                                                                Nombre:
                                                                            </h5>
                                                                        </label>
                                                                        <input type='text' class='form-control'
                                                                            placeholder='. . .' name='colaborador'
                                                                            id='colaborador'>
                                                                    </div>
                                                                </div>
                                                                <div class='col-md-3'>
                                                                    <div class='form-group'>
                                                                        <label for=''>
                                                                            <h5 class='card-title'>
                                                                                Cargo: </h5>
                                                                        </label>
                                                                        <input type='text' class='form-control'
                                                                            placeholder='. . .' name='cargo' id='cargo'>
                                                                    </div>
                                                                </div>
                                                                <div class='col-md-3'>
                                                                    <div class='form-group'>
                                                                        <br>
                                                                        <button type='button' id='agregarColaborador'
                                                                            class='btn text-white round capa waves-effect waves-light'>
                                                                            <i class='fa fa-plus fa-2x'></i>&nbsp;Registrar
                                                                            
                                                                        </button>
                                                                      
                                                                    </div>
                                                                </div>
                                                                <div class='col-md-2'>
                                                                    <div class='form-group'>
                                                                        <br>
                                                                        
                                                                        <button type='button'
                                                                                class='btn text-white round capa waves-effect waves-light'
                                                                                data-dismiss='modal'>
                                                                                <li class='fa fa-ban fa-2x'></li>&nbsp;Cerrar
                                                                            </button>
                                                                    </div>
                                                                </div>
                                                               
                                                            </div>
                                                            <div class='col-md-12'>
                                                                <div class='row' id='smgColaborador'>
                                                                <?php usuarioController::listadoUsuariosColaboradoresTabla( $_GET['idproyecto']); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class='form-actions '>
                                                        <div class='col-md-6'><button type='button'
                                                                class='btn btn-secondary round' data-dismiss='modal'>
                                                                <li class='fa fa-ban '></li>&nbsp;Cerrar
                                                            </button></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <?php echo trabajoController::plantillaImplementacionProyectoListado($_GET['idproyecto'],$_GET['id']); ?>
                                    <br>
                                </div>
                            </div>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
        <script
            src="https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/app-assets/js/scripts/modal/components-modal.min.js">
        </script>
        <script src="<?php echo PLATFORM_SERVER."modules/trabajo/triggers/module.js"; ?>"></script>
        <script src="<?php echo CORE_JS_SERVER."directory.js"; ?>"></script>
        <script src="<?php echo CORE_JS_SERVER."app.js"; ?>"></script>
        <script src="<?php echo PLATFORM_SERVER."modules/trabajo/triggers/module.js"; ?>"></script>
        <script>
            $('#large').modal('hide');
            $(document).on('click', '#cargarColaboradores', function (e) {
                var id = $(this).attr('name');
                var responseTextSelector = '#modal_col_' + id;
                var responseTextTable = '#modal_' + id;
                sendEventApp('POST', routesAppPlatform() + 'trabajo/core/listaColaboradoresItem.php',
                    params = {
                        "id": $(this).attr('name')
                    }, responseTextTable);
                    
                sendEventApp('POST', routesAppPlatform() + 'trabajo/core/selectorColaboradores.php',
                    params = {
                        "id": $(this).attr('name')
                    }, responseTextSelector);
                return false;
            });
            $(document).on('click', '#asignarColaborador', function (e) {
                var href = $(this).attr('title');
                var usuario = document.getElementsByName("usuario" + href)[0].value;
                var idimplementacion = $(this).attr('name');
                swal({
                        title: "Asignar colaborador",
                        text: "Esta seguro de asignar colaborador al  requerimiento seleccionado!",
                        icon: "success",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            sendEventApp('POST', routesAppPlatform() +
                                'trabajo/core/listaColaboradoresItem.php',
                                params = {
                                    "id": idimplementacion
                                }, '#modal_' + idimplementacion);
                            sendEventApp('POST', routesAppPlatform() +
                                'trabajo/core/asignarColaborador.php',
                                params = {
                                    "idusuario": usuario,
                                    "implementacion": idimplementacion
                                }, '#smg_' + href);
                        }
                    });
                return false;
            });
        </script>
</body>
<!-- END: Body-->
</html>
