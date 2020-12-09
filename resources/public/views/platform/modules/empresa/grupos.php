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
      //  echo "id".$_SESSION['idusuario'];
      //print_r($_SESSION);
    ?>
</head>
<body class="vertical-layout vertical-menu-modern material-vertical-layout material-layout 2-columns   fixed-navbar"
  data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:75%">
  <!-- fixed-top-->
  <?php
    /* top bar  */
    require_once (PLATFORM_PATH."global/inc/component/fixed_top.php");
    /* Menu  */
    require_once (PLATFORM_PATH."global/inc/component/main_menu.php");
  ?>
  <div class="app-content content">
    <div class="content-header row">
      <div class="content-header-dark bg-img col-12">
        <div class="row">
          <div class="content-header-left col-md-9 col-12 mb-2">
            <h3 class="content-header-title titulo">Módulo Grupo Empresarial</h3>
            <div class="row breadcrumbs-top">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active parrafo text-black">Listado</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="content-wrapper">
      <div class="content-body">
        <div class="content-body">
          
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <ul class="list-inline mb-0">
                      <li><a href="registrarGrupo.php" class="btn capa text-white round "><i
                            class="fa fa-city fa-2x"></i> Crear Grupo Empresarial</a></li>
                    </ul>
                    
                  </div>
                  <div class="card-content collapse show">
                    <div class="card-body card-dashboard ">
                     
                      <div class="table-responsive">
                        <div id="project-task-list_wrapper" class="dataTables_wrapper dt-bootstrap4">
                          <div class="row">
                            <div class="col-sm-12 col-md-5">
                              <div class="form-group">
                                <div class="input-group">
                                  <input type="text" class="form-control" placeholder="Buscar . . ."
                                    aria-describedby="button-addon2" name="buscar">
                                  <div class="input-group-append">
                                    <button id="buscarGrupo" class="btn capa text-white round" type="button">
                                      <li class="fa fa-search"></li>
                                    </button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div id="tablaDinamica_panel">
                                <?php empresaController::listadoSimpleGrupos(null); ?>
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