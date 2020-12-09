<?php session_start(); ?>
<!DOCTYPE html>
<html class="loading" lang="es-ES" data-textdirection="ltr">
<head>
  <?php
       include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
       require_once (PLATFORM_PATH."global/inc/platform/head.php");
       require_once (LIB_PATH."session.php");
       require_once (CONTROLLERS_PATH."usuarioController.php");
       require_once (CONTROLLERS_PATH."areaController.php");
       session::verificarSesion($_SESSION['idsesion']);
       date_default_timezone_set('America/Bogota');
       setlocale(LC_ALL,"es_CO");
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
            <h3 class="content-header-title titulo">Módulo Usuarios</h3>
            <div class="row breadcrumbs-top">
              <div class="breadcrumb-wrapper col-12">
                <li class="breadcrumb-item active parrafo text-black">Listado</li>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="content-wrapper">
      <div class="content-body">
        <div class="content-body">
          
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <ul class="list-inline mb-0">
                    <li><a href="registrarUsuario.php" class="btn capa round text-white  waves-effect waves-light"><i
                          class="fa fa-plus fa-2x"></i> &nbsp;Registrar Usuario</a></li>
                  </ul>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body card-dashboard ">
                    <div class="table-responsive">
                      <div id="project-task-list_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">

                          <div class="col-sm-12 col-md-2">
                            <div class="form-group">
                            <br>
                              <label for="projectinput6">
                                <h5 class="card-title titulo">
                                Roles:
                                </h5>
                              </label>
                              
                              <select id="projectinput6" name="estado" class="form-control">
                                <option value="TODOS">TODOS</option>
                                <option value="ESPECIALISTA">ESPECIALISTAS</option>
                                <option value="LIDER OEA">LIDER OEA</option>
                                <option value="ASISTENTE">ASISTENTE</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                            <br>
                              <div class="input-group">
                              <br>
                                <input type="text" name="buscar" class="form-control" placeholder="Nombre , Documento . . ."
                                  aria-describedby="button-addon2">
                                <div class="input-group-append">
                                  <button id="buscarUsuario"
                                    class="btn capa round white btn-sm btn-min-width mr-1 mb-1 waves-effect waves-light"
                                    type="button">
                                    <li class="fa fa-search fa-2x"></li>
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div id="tablaDinamica_panel">
                                <?php usuarioController::listadoUsuarios(null,"TODOS"); ?>
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
  <script src="<?php echo PLATFORM_SERVER."modules/usuarios/triggers/module.js"; ?>"></script>
</body>
</html>