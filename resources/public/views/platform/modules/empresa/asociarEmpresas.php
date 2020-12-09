<?php session_start(); ?>
<!DOCTYPE html>
<html class="loading" lang="es-ES" data-textdirection="ltr">
<head>
    <?php
       include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
       require_once (PLATFORM_PATH."global/inc/platform/head.php");
       require_once (LIB_PATH."session.php");
       require_once (CONTROLLERS_PATH."empresaController.php");
       require_once (CONTROLLERS_PATH."areaController.php");
       session::verificarSesion($_SESSION['idsesion']);
       date_default_timezone_set('America/Bogota');
       setlocale(LC_ALL,"es_CO");
       $idempresa = $_GET['id'];
      //  echo "id".$_SESSION['idusuario'];
      //print_r($_SESSION);
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
<body class="vertical-layout vertical-menu-modern material-vertical-layout material-layout 2-columns   fixed-navbar"
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:75%;">
    <input type="hidden" value="<?php echo $idempresa;?>" name="idempresa" />
    <!-- fixed-top-->
    <?php
    /* top bar  */
    require_once (PLATFORM_PATH."global/inc/component/fixed_top.php");
    /* Menu  */
    require_once (PLATFORM_PATH."global/inc/component/main_menu.php");
  ?>
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-dark bg-img col-12">
                    <div class="row">
                        <div class="content-header-left col-md-9 col-12 mb-2">
                            <h3 class="content-header-title titulo">Modulo Empresa</h3>
                            <div class="row breadcrumbs-top">
                                <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item parrafo"><a href="index.php">Empresas</a>
                                    </li>
                                    <li class="breadcrumb-item parrafo "><a href="<?php echo "verFicha.php?id=".$idempresa; ?>">Ver Ficha Empresa</a>
                                    </li>
                                    <li class="breadcrumb-item active parrafo text-black">Asociar empresas
                                    </li>
                                </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">
                        <li class="fa fa-city"></li> Listado de empresas activas para asociar.
                    </h3>
                </div>
                <!-- <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right">
                        <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Herramientas</button>
                        <div class="dropdown-menu arrow">
                            <a class="dropdown-item" href="#"><i class="fa fa-calendar-check mr-1"></i>Calendario</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-language mr-1"></i>Mi idioma</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i class="fa fa-cog mr-1"></i>Configuracion</a>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="content-body">
                <div class="content-body">
                    <section id="validation-scenario">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <a class="heading-elements-toggle"><i
                                                class="la la-ellipsis-v font-medium-3"></i></a>
                                        <div class="heading-elements">
                                            <ul class="list-inline mb-0">
                                                <li><a data-action="printer"><i class="ft-printer"></i></a></li>
                                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-content collapse show">
                                        <div class="card-body card-dashboard ">
                                            <div class="table-responsive">
                                                <div id="project-task-list_wrapper"
                                                    class="dataTables_wrapper dt-bootstrap4">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <?php empresaController::listadoEmpresas($idempresa); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <br>
                                                                <button id="asociarEmpresa" class="btn capa text-white waves-effect waves-light">
									                                <i class="la la-check-square-o"></i> Asociar empresa
								                                </button>
                                                               
                                                                
                                                                <br>
                                                            </div>
                                                           
                                                        </div>
                                                        <div class="col-md-4">
                                                        <div id="tablaDinamica_panelAsociacion">
                                                                
                                                        </div>
                                                        </div>
                                                        
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div >
                                                                    <?php empresaController::listadoSimpleEmpresasAsociar($idempresa,"az",$idArea,"te",null); ?>
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
                    </section>
                </div>
            </div>
        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
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
</html>