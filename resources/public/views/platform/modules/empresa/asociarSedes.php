<?php session_start(); ?>
<!DOCTYPE html>
<html class="loading" lang="es-ES" data-textdirection="ltr">

<head>
  <?php
       include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
       require_once (PLATFORM_PATH."global/inc/platform/head.php");
       require_once (LIB_PATH."session.php");
       require_once (CONTROLLERS_PATH."sedeController.php");
       require_once (CONTROLLERS_PATH."areaController.php");

       session::verificarSesion($_SESSION['idsesion']);
       date_default_timezone_set('America/Bogota');
       setlocale(LC_ALL,"es_CO");

      //  echo "id".$_SESSION['idusuario'];
      //print_r($_SESSION);
    ?>
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
                    <li class="breadcrumb-item parrafo"><a href="<?php echo "verFicha.php?id=".$_GET['id']; ?>">Folio empresa</a>
                    </li>
                    <li class="breadcrumb-item active parrafo text-black"><a href="<?php echo "asociarSedes.php".$_GET['id']; ?>">Empresas asociadas</a>
                    </li>
                  </ol>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
      <br>
      <div class="content-body">
        <div class="content-body">
          <section id="validation-scenario">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <ul class="list-inline mb-0">
                      <li><a href="<?php echo "registrarSede.php?id=".$_GET['id']; ?>" class="btn text-white capa btn-sm"><i class="ft-plus white"></i>
                          Registrar nueva sede</a></li>
                    </ul>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
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
                      <p>Consulta parametrizada del estado actual de las sedes asociadas a la empresa .</p>
                      <div class="table-responsive">
                        <div id="project-task-list_wrapper" class="dataTables_wrapper dt-bootstrap4">
                          <div class="row">
  
                            <div class="col-sm-12 col-md-5">
                              <div class="form-group">
                                <label for="projectinput6">Consulta:</label>
                                <div class="input-group">
                                  <input type="text" class="form-control" placeholder="Buscar . . ."
                                    aria-describedby="button-addon2">
                                  <div class="input-group-append">
                                    <button class="btn text-white capa" type="button">
                                      <li class="fa fa-search"></li>
                                    </button>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-sm-12">
                                <div id="tablaDinamica_panel">
                                  <?php sedeController::listadoSimpleEmpresas("az",$idArea,"te",null,$_GET['id']);
                                   ?>

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

</body>

</html>