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

  <!-- fixed-top-->

  <?php

    /* top bar  */

    require_once (PLATFORM_PATH."global/inc/component/fixed_top.php");

    /* Menu  */

    require_once (PLATFORM_PATH."global/inc/component/main_menu.php");

  ?>

  <div class="app-content content">

    <div class="content-header row">

      <div class="content-header-dark bg-img col-12 limpiarCapa">

        <div class="row">

          <div class="content-header-left col-md-9 col-12 mb-2">

            <h3 class="content-header-title titulo">Módulo Empresa</h3>

            <div class="row breadcrumbs-top">

              <div class="breadcrumb-wrapper col-12">

                <div class="breadcrumb-wrapper col-12">

                  <ol class="breadcrumb">

                    <li class="breadcrumb-item active parrafo text-black"><a class="text-black" href="index.php">Listado</a>

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

          <div class="content-body">

            <div class="row">

              <div class="col-12">

                <div class="card">

                  <div class="card-header">

                    <ul class="list-inline mb-0">

                      <li><a href="registrarEmpresa.php"

                          class="btn text-white capa  round btn-min-width mr-1 mb-1 waves-effect waves-light"><i

                            class="fa fa-folder-plus fa-2x"></i> Registrar Empresa</a></li>

                    </ul>

                  </div>

                  <div class="card-header">

                   

                    <div class="card-content collapse show">

                      <div class="card-body card-dashboard ">

                        <div class="table-responsive">

                          <div id="project-task-list_wrapper" class="dataTables_wrapper dt-bootstrap4">

                            <div class="row">



                              <div class="col-sm-12 col-md-3">

                                <div class="form-group">

                                  <label for="">

                                    <h5 class="card-title titulo">

                                      <li class="fa fa-clipboard-list"></li> <span class="text-danger">*</span> Orden

                                    </h5>

                                  </label>

                                  <select id="orden" name="ordenEmpresa" class="form-control titulo">

                                    <option class="titulo" value="ASC">Az</option>

                                    <option class="titulo" value="DESC">Za</option>

                                  </select>

                                </div>

                              </div>

                              <div class=" col-md-7">

                                <div class="form-group">

                                  <div class="input-group">

                                    <input type="text" class="form-control"

                                      placeholder="Buscar : Nombre Empresa,  NIT,  Ciudad  ,Representante . . ."

                                      aria-describedby="button-addon2" name="buscar">

                                    <div class="input-group-append">

                                      <button class="btn round capa text-white" type="button" id="buscarEmpresa">

                                        <li class="fa fa-search"></li>

                                      </button>

                                    </div>

                                  </div>

                                </div>

                              </div>

                              <div class="col-sm-12 col-md-2">

                                <div class="form-group">

                                  <div class="input-group">

                                    <button class="btn round capa text-white" type="button" id="buscarEmpresa"

                                      onclick="location.reload()">

                                      <li class="fa fa-redo"></li>&nbsp; Limpiar

                                    </button>

                                  </div>

                                </div>

                              </div>

                              <div class="row">

                                <div class="col-sm-12">

                                  <div id="tablaDinamica_panel">

                                    <?php empresaController::listadoSimpleEmpresas(null,"ASC"); ?>

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