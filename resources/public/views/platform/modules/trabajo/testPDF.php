<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <?php
    include_once($_SERVER['DOCUMENT_ROOT'] . '/conf.php');
    require_once(PLATFORM_PATH . "global/inc/platform/head.php");
    require_once(LIB_PATH . "session.php");
    require_once(CONTROLLERS_PATH . "empresaController.php");
    require_once(CONTROLLERS_PATH . "trabajoController.php");
    require_once(CONTROLLERS_PATH . "usuarioController.php");
    session::verificarSesion($_SESSION['idsesion']);
    date_default_timezone_set('America/Bogota');
    setlocale(LC_ALL, "es_CO");
    $objTrabajo = trabajoController::trabajoId($_GET['id']);
    $entidad = entidadController::obtenerEntidad($objTrabajo->getId_entrada_trabajo());
    $idproyecto = trabajoController::proyectoId($_GET['idproyecto']);
    $idinforme = trabajoController::informeDiagnostico($_GET['idproyecto']);
    $idproyectoObjDinamic = trabajoController::proyectoIdFechas($_GET['idproyecto']);

    ?>
    <style>
    .user-profile {
        background: url(https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/app-assets/images/gallery/dark-menu.jpg) center center no-repeat;
    }

    .user-profile .user-info {
        background-color: rgba(0, 0, 0, 0.35);
    }

    .saltodepagina {
        page-break-after: always;
    }
    </style>
</head>

<body class="bg-white   " style="zoom:55%;">
    <input type="hidden" name="idempresa" id="idempresa" value="<?php echo  $idempresa; ?>" />
    <input type="hidden" name="idproyecto" id="idproyecto" value="<?php echo $_GET['idproyecto']; ?>" />
    <input type="hidden" value="0" name="certificadosDinamicos" />
    <!-- BEGIN: Header-->
    <?php require_once(PLATFORM_PATH . "global/inc/component/fixed_top.php"); ?>
    <!-- END: Header-->

    <!-- BEGIN: Content-->
    <div class="app-content content">

        <div class="content-wrapper">
            <div class="content-body">
                <!-- contendio -->
                <div class="row">
                    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 ">
                        <div class="card text-black">
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="card-header">
                                        <img src="<?php echo VENDOR_SERVER . "aes/aes2/1.jpg";  ?>">
                                        <h2 class="form-section text-black"><i class="fa fa-business-time"></i>
                                            VERIFICACIÓN DE CUMPLIMIENTO REQUISITOS </h2>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-4  col-xs-4 col-sm-4 col-lg-4">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title text-black">
                                                            RAZON SOCIAL DE LA EMPRESA
                                                        </h5>
                                                    </label>
                                                    <input readonly="" type="text" class="form-control text-black"
                                                        placeholder=". . ." name="razonSocial" id="razonSocial"
                                                        value="<?php echo $entidad['entidad']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-xs-3 col-sm-3 col-lg-3">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title text-black">
                                                            Nombre Auditor
                                                        </h5>
                                                    </label>
                                                    <input readonly="" type="text" class="form-control text-black"
                                                        placeholder=". . ." name="razonSocial" id="razonSocial"
                                                        value="<?php echo usuarioController::usuarioId($objTrabajo->getId_usuario_diagnostico())->getNombre_usuario(); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-xs-2 col-sm-2 col-lg-2">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title text-black">
                                                            Programación
                                                        </h5>
                                                    </label>
                                                    <input readonly="" type="text"
                                                        class="form-control text-black dark text-black-50 text-bg-black"
                                                        placeholder=". . ." name="razonSocial" id="razonSocial"
                                                        value="<?php echo $idproyectoObjDinamic[0]['fechaFinDiagnostico']; ?>">
                                                </div>
                                            </div>

                                        </div>
                                        <br><br><br>

                                        <div class="row">
                                            <?php
                                            echo trabajoController::plantillaDiagnosticoProyectoListadoInforme($_GET['idproyecto']);
                                            echo trabajoController::plantillaDiagnosticoProyectoListadoInforme2($_GET['idproyecto']);

                                            $objEstatus = trabajoController::plantillaDiagnosticoProyectoListadoInforme3($_GET['idproyecto']);
                                            $objEstatus2 = trabajoController::plantillaDiagnosticoProyectoListadoInforme4($_GET['idproyecto']);


                                            ?>
                                        </div>
                                        <div class="saltodepagina">&nbsp;</div>
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h2 class="card-title titulo">Verificacion Requisitos OEA</h2>
                                                    </div>
                                                    <div class="card-content collapse show">
                                                        <div class="card-body" style="width: 800px; height: 500px;">
                                                            <div id="change-chart">
                                                            </div>
                                                            <div id="column-chart">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br><br><br><br>
                                                    <div class="card-content collapse show">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <?php

                                                                for ($i = 0; $i < count($objEstatus2); $i++) {
                                                                    echo "
                                                                    <div class='col-md-4'>
                                                                        <div id='piechart_3d_" . $i . "'></div>
                                                                    </div>";
                                                                }

                                                                ?>
                                                                <!-- <div class="col-md-6">
                                                                    <div id="piechart_3d"></div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div id="piechart_3d2"></div>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br><br><br>
                                        <h3 class="form-section">
                                            <strong>RESUMEN EJECUTIVO SOBRE CUMPLIMIENTO DE REQUISITOS OEA </strong>
                                        </h3>
                                        <div class="row">
                                            <div class="form-group mb-1  col-md-12 col-xs-12 col-sm-12 col-lg-12">
                                                <label for="projectinput3">
                                                    <h5 class="card-title">
                                                        <span class="text-danger">*</span>
                                                        1) ACTIVIDADES DESARROLLADAS
                                                    </h5>
                                                </label>
                                                <br><br>
                                                <?php
                                                $actividad = "";
                                                if ($idinforme != false) {
                                                    $actividad = $idinforme->getActividades();
                                                } else {
                                                    $actividad = "";
                                                }
                                                ?>
                                                <textarea class="form-control " id="actividades"
                                                    style="border: 1px solid #888;" name="actividades" rows="4"
                                                    cols="120"><?php echo $actividad; ?></textarea>
                                            </div>
                                            <div class="form-group mb-1 col-sm-12 col-md-12 col-xs-12  col-lg-12">
                                                <label for="projectinput3">
                                                    <h5 class="card-title">
                                                        <span class="text-danger">*</span>
                                                        2) ASPECTOS RELEVANTES
                                                    </h5>
                                                </label>
                                                <br><br>
                                                <?php
                                                $actividad = "";
                                                if ($idinforme != false) {
                                                    $actividad = $idinforme->getAspectos();
                                                } else {
                                                    $actividad = "";
                                                }
                                                ?>
                                                <textarea class="form-control " id="aspectos"
                                                    style="border: 1px solid #888;" name="aspectos" rows="4"
                                                    cols="120"><?php echo $actividad; ?></textarea>
                                            </div>
                                            <br><br><br><br><br>
                                            <div class=" form-group mb-1 col-md-12 col-xs-12 col-sm-12 col-lg-12">
                                                <label for="projectinput3">
                                                    <h5 class="card-title">
                                                        <span class="text-danger">*</span>
                                                        3) HALLAZGOS
                                                    </h5>
                                                </label>
                                                <br><br>
                                                <?php
                                                $actividad = "";
                                                if ($idinforme != false) {
                                                    $actividad = $idinforme->getHallazgos();
                                                } else {
                                                    $actividad = "";
                                                }
                                                ?>
                                                <textarea class="form-control " id="hallasgoz"
                                                    style="border: 1px solid #888;" name="hallasgoz" rows="4"
                                                    cols="120"><?php echo $actividad; ?></textarea>
                                            </div>
                                            <br><br>
                                            <br>
                                            <div class="form-group mb-1  col-md-12 col-xs-12 col-sm-12 col-lg-12">
                                                <label for="projectinput3">
                                                    <h5 class="card-title">
                                                        <span class="text-danger">*</span>
                                                        4) CONCLUSIONES
                                                    </h5>
                                                </label>
                                                <br><br>
                                                <?php
                                                $actividad = "";
                                                if ($idinforme != false) {
                                                    $actividad = $idinforme->getConclusion();
                                                } else {
                                                    $actividad = "";
                                                }
                                                ?>
                                                <textarea class="form-control " id="conclusiones"
                                                    style="border: 1px solid #888;" name="conclusiones" rows="4"
                                                    cols="120"><?php echo $actividad; ?></textarea>
                                            </div>
                                            <br>

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

    <!-- END: Content-->
    <!-- BEGIN: Customizer-->
    <!-- End: Customizer-->
    <!-- Buynow Button-->
    <!-- -->
    <?php



    //require_once (PLATFORM_PATH."global/inc/component/customizer.php");
    //require_once (PLATFORM_PATH."global/inc/component/buy.php");
    require_once(PLATFORM_PATH . "global/inc/component/footer.php");
    require_once(PLATFORM_PATH . "global/inc/platform/lib.php");

    ?>
    <!-- BEGIN: Page Vendor JS-->
    <script src="https://www.google.com/jsapi"></script>
    <!-- END: Page Vendor JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <!-- <script src="https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/app-assets/js/scripts/charts/google/bar/bar.min.js"></script>
    <script src="https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/app-assets/js/scripts/charts/google/bar/column.js"></script> -->
    <script src="<?php echo CORE_JS_SERVER . "directory.js"; ?>"></script>
    <script src="<?php echo CORE_JS_SERVER . "app.js"; ?>"></script>
    <script src="<?php echo PLATFORM_SERVER . "modules/trabajo/triggers/module.js"; ?>"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>



    <script>
    google.load('visualization', '1.0', {
        'packages': ['corechart']
    });
    google.setOnLoadCallback(drawColumn);
    google.setOnLoadCallback(drawColumn2);

    function drawColumn() {
        <?php
         $r = intval($objEstatus[0]) + intval($objEstatus[1]) + intval($objEstatus[2]) ?>

            var data = google.visualization.arrayToDataTable([

                ['Year', 'CU', 'NC', 'N/A'],
                ['CU', <?php echo round(intval($objEstatus[0]) / intval($r) * 100); ?> , 0, 0],
                ['NC', 0, <?php echo round(intval($objEstatus[1]) / intval($r) * 100); ?> , 0],
                ['N/A', 0, 0, <?php echo round(intval($objEstatus[2]) / intval($r) * 100); ?> ]
            ]);

        var options_column = {
            height: 450,
            is3D: false,
            fontSize: 12,
            colors: ['#2ecc71', '#e74c3c', '#3498db'],
            chartArea: {
                left: '5%',
                width: '50%',
                height: 350
            },
            vAxes: {

                0: {
                    title: 'Porcentajes %',
                    fontSize: 12,
                },
                1: {
                    title: 'apparent magnitude'
                }
            },
            hAxes: {

                0: {
                    title: 'Estados',
                    fontSize: 12,
                },
                1: {
                    title: 'apparent magnitude'
                }
            },
            vAxis: {
                gridlines: {
                    color: '#e9e9e9',
                    count: 10
                },
                minValue: 0
            },
            legend: {
                position: 'top',
                alignment: 'center',
                textStyle: {
                    fontSize: 12
                }
            }
        };
        // Instantiate and draw our chart, passing in some options.
        var bar = new google.visualization.ColumnChart(document.getElementById('column-chart'));
        bar.draw(data, options_column);
    }

    function drawColumn2() {

        <?php
        echo "
        var data = google.visualization.arrayToDataTable([
            ['Year', 'CU', 'NC', 'N/A'], ";
            foreach($objEstatus2 as $key => $value) {
                echo "['".$objEstatus2[$key][1].
                "',  ".$objEstatus2[$key][2].
                ",".$objEstatus2[$key][3].
                ",".$objEstatus2[$key][4].
                "    ],";
            }
            echo "    
        ]);
        "; ?>
        // Set chart options
        var options_column = {
            height: 400,
            width: 200,
            fontSize: 12,
            colors: ['#2ecc71', '#e74c3c', '#3498db'],
            chartArea: {
                left: '5%',
                width: '100%',
                height: 350,
                width: 200,
            },
            vAxis: {
                gridlines: {
                    color: '#e9e9e9',
                    count: 10
                },
                minValue: 0
            },
            legend: {
                position: 'top',
                alignment: 'center',
                textStyle: {
                    fontSize: 12
                }
            }
        };
        // Instantiate and draw our chart, passing in some options.
        var bar = new google.visualization.ColumnChart(document.getElementById('column-chart2'));
        bar.draw(data, options_column);
    }



    <?php

    for ($i = 0; $i < count($objEstatus2); $i++) {
        echo "google.charts.load('current', {packages: ['corechart']});";
        echo "google.charts.setOnLoadCallback(drawChart_".$i.
        "); ";
        echo "

        function drawChart_".$i."() {
            ";

            echo "
            var data = google.visualization.arrayToDataTable([
                ['yyyyyyyyyy', 'xxxxxxxxxxxxxxxxx'],
                ['N/A', ".$objEstatus2[$i][4]."],
                ['NC', ".$objEstatus2[$i][3]."],
                ['N/A', 0],
                ['CU', ".$objEstatus2[$i][2]."],
                ['N/An', 0],
            ]);
            ";

            echo "
            var options = {
                height: 250,
                width: 350,
                chartArea: {
                    left: '5%',
                    width: '90%',
                    height: 250
                },

                title: '".$objEstatus2[$i][0]." - ".$objEstatus2[$i][1]."',
                is3D: false,
            };
            ";

            echo "
            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d_".$i."'));
            chart.draw(data, options);
            ";
            echo "}";
        }

        ?>
        window.print();
    </script>
</body>
<!-- END: Body-->

</html>