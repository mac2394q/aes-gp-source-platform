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

       require_once (CONTROLLERS_PATH."trabajoController.php");

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

                        <h3 class="content-header-title titulo">Módulo Grupo Empresarial</h3>

                        <div class="row breadcrumbs-top">

                            <div class="breadcrumb-wrapper col-12">

                                <ol class="breadcrumb">

                                    

                                    <li class="breadcrumb-item active parrafo text-black"><a class="text-black"

                                            href="<?php echo "verFichaGrupo.php?id=".$_GET['id']; ?>">Ver Ficha Grupo</a>

                                    </li>

                                    <li class="breadcrumb-item parrafo text-white parrafo">Historial Grupo Empresarial

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

                                <div class="card-content collapse show">

                                    <div class="card-body card-dashboard ">

                                        <div class="table-responsive">

                                            <div class="dataTables_wrapper dt-bootstrap4">

                                                <div class="row">

                                                    <div class="col-md-12">

                                                        <div id="tablaDinamica_panel">

                                                            <?php trabajoController::listadoTrabajoGrupo($_GET['id']); ?>

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