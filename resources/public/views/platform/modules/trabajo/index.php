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
       session::verificarSesion($_SESSION['idsesion']);
       date_default_timezone_set('America/Bogota');
       setlocale(LC_ALL,"es_CO");
  ?>
</head>
<!-- END: Head-->
<!-- BEGIN: Body-->
<body
    class="vertical-layout vertical-menu-modern material-vertical-layout material-layout 2-columns fixed-navbar  menu-expanded pace-done"
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:75%;">
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
                        <h3 class="content-header-title  titulo">Módulo  de Trabajo</h3>
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active parrafo text-black">Listado 
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
               
                 
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <ul class="list-inline mb-0">
                                            <li><a href="registrarTrabajo.php"
                                                    class="btn capa round text-white  waves-effect waves-light"><i
                                                        class="fa fa-calendar-check fa-2x"></i> &nbsp;Registrar Trabajo</a></li>
                                        </ul>
                                    </div>
                                    <div class="card-header">
                                        <h2 class=" titulo">Consulta de Empresas:</h2>
                                        <div class="card-content collapse show">
                                            <div class="card-body card-dashboard ">
                                                <div class="table-responsive">
                                                    <div id="project-task-list_wrapper"
                                                        class="dataTables_wrapper dt-bootstrap4">
                                                        <div class="row">
                                                            
                                                            <div class="col-sm-12 col-md-2">
                                                                <div class="form-group">
                                                                    <label for="projectinput6">
                                                                        <h5 class="card-title titulo">Tipo :
                                                                        </h5>
                                                                    </label>
                                                                    <select id="estado" name="estado"
                                                                        class="form-control">
                                                                        <option value="todos">Todos</option>
                                                                        <option value="empresa">Empresa</option>
                                                                        <option value="grupo">Grupos</option>
                                                                        
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-3">
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Buscar . . ."
                                                                            aria-describedby="button-addon2"
                                                                            name="buscar" id="buscar">
                                                                        <div class="input-group-append">
                                                                            <button class="btn round capa text-white"
                                                                                type="button" id="buscarTrabajo">
                                                                                <li class="fa fa-search"></li>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-3">
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <button class="btn round capa text-white"
                                                                            type="button" id="buscarTrabajo"
                                                                            onclick="location.reload()">
                                                                            <li class="fa fa-redo"></li>&nbsp; Limpiar
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                           
                                                                <div class="col-sm-12">
                                                                    <div id="tablaDinamica_panel">
                                                                        <?php trabajoController::listadoTrabajo("todos",""); ?>
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
    <script src="<?php echo PLATFORM_SERVER."modules/trabajo/triggers/module.js"; ?>"></script>
</body>
<!-- END: Body-->
</html>