<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <?php
    include_once($_SERsVER['DOCUMENT_ROOT'] . '/conf.php');
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
        display:block;
		page-break-before:always;
     
    }
    </style>
</head>
<body class="bg-white   " style="zoom:60%;">
    <input type="hidden" name="idempresa" id="idempresa" value="<?php echo  $idempresa; ?>" />
    <input type="hidden" name="idproyecto" id="idproyecto" value="<?php echo $_GET['idproyecto']; ?>" />
   
    <!-- BEGIN: Header-->
    <?php require_once(PLATFORM_PATH . "global/inc/component/fixed_top.php"); ?>
    <!-- END: Header-->
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 ">
                        <div class="card text-black">
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="card-header">
                                        <img src="<?php echo VENDOR_SERVER . "aes/aes2/1.jpg";  ?>" width="100%" height="155">
                                        <br><br>
                                        <br>
                                        <h2 class="form-section parrafo"><i class="fa fa-business-time"></i>
                                            VERIFICACIÓN DE CUMPLIMIENTO REQUISITOS </h2>
                                        
                                        <div class="row">
                                            <div class="col-md-12  col-xs-12 col-sm-12 col-lg-12">
                                                <div class="form-group">
                                                    <label >
                                                        <h5 class="card-title text-black parrafo">
                                                            RAZÓN SOCIAL DE LA EMPRESA
                                                        </h5>
                                                    </label>
                                                    <label >
                                                        <h5 class="card-title text-black parrafo">
                                                        <?php echo $entidad['entidad']; ?>
                                                        </h5>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12  col-xs-12 col-sm-12 col-lg-12">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title text-black parrafo">
                                                            NOMBRE DEL AUDITOR
                                                        </h5>
                                                    </label>
                                                    <label >
                                                        <h5 class="card-title text-black parrafo">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        &nbsp;&nbsp;&nbsp;
                                                        <?php echo usuarioController::usuarioId($objTrabajo->getId_usuario_diagnostico())->getNombre_usuario(); ?>
                                                        </h5>
                                                    </label>
                                              
                                                </div>
                                            </div>
                                            <div class="col-md-12  col-xs-12 col-sm-12 col-lg-12">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title text-black parrafo">
                                                            FECHA REPORTE
                                                        </h5>
                                                    </label>
                                                    <label >
                                                        <h5 class="card-title text-black parrafo">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <?php echo $idproyectoObjDinamic[0]['fechaFinDiagnostico']; ?>
                                                        </h5>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <?php
                                            echo trabajoController::plantillaDiagnosticoProyectoListadoInformepdf($_GET['idproyecto']); 
                                            ?>
                                        </div>
                                        <!-- <div class='saltodepagina ' style=' height: 600px;'></div> -->
                                        <div class='saltodepagina ' ></div>
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h2 class="form-section parrafo"><i class="fa fa-table fa-2x"></i>&nbsp;REFERENCIAS </h2>
                                                    </div>
                                            <?php 
                                            echo trabajoController::plantillaDiagnosticoProyectoListadoInforme2pdf($_GET['idproyecto']);
                                            $objEstatus = trabajoController::plantillaDiagnosticoProyectoListadoInforme3($_GET['idproyecto']);
                                            $objEstatus2 = trabajoController::plantillaDiagnosticoProyectoListadoInforme4($_GET['idproyecto']);
                                            
                                            ?>
                                                </div>
                                            </div>
                                        </div>
                                     
                                       <div class="row">
                                            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h2 class="form-section parrafo"><i class="fa fa-chart-pie fa-2x"></i>&nbsp;VERIFICACION DE REQUISITOS OEA</h2>
                                                    </div>
                                                    <div class="card-content collapse show">
                                                       
                                                        <div class="card-body" >
                                                            <div id="change-chart" >
                                                            </div>
                                                           
                                                            <div id="column-chart">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class='float-sm-left'>&nbsp;</div><br>
                                                    <div class='float-sm-left'>&nbsp;</div><br>
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
                                      
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='saltodepagina ' ></div>
                                   
                                        <h3 class="form-section card-title parrafo text-black">
                                            <strong>RESUMEN EJECUTIVO SOBRE CUMPLIMIENTO DE REQUISITOS OEA </strong>
                                        </h3>
                                        <br><br>
                                        <div class="row">
                                            <div class="form-group mb-1  col-md-12 col-xs-12 col-sm-12 col-lg-12">
                                                <label >
                                                    <h5 class="card-title parrafo text-black">
                                                        <span class="text-danger">*</span>
                                                        1) ACTIVIDADES DESARROLLADAS
                                                    </h5>
                                                </label>
                                                <br><br>
                                                <?php
                                                $actividad = "";
                                                if ($idinforme != false) {$actividad = $idinforme->getActividades();
                                                } else {$actividad = "";}
                                                ?>
                                                <textarea class="form-control card-title parrafo text-black " id="actividades"
                                                    style="border: 1px solid #cdcdcd;" name="actividades" rows="4"
                                                    cols="120"><?php echo $actividad; ?></textarea>
                                            </div>
                                            <div class="form-group mb-1  col-md-12 col-xs-12 col-sm-12 col-lg-12">
                                                <label >
                                                    <h5 class="card-title parrafo text-black">
                                                        <span class="text-danger">*</span>
                                                        2) ASPECTOS RELEVANTES
                                                    </h5>
                                                </label>
                                                <br><br>
                                                <?php
                                                $actividad = "";
                                                if ($idinforme != false) {$actividad = $idinforme->getAspectos();
                                                } else {$actividad = "";}
                                                ?>
                                                <textarea class="form-control card-title parrafo text-black " id="aspectos"
                                                    style="border: 1px solid #cdcdcd;" name="aspectos" rows="4"
                                                    cols="120"><?php echo $actividad; ?></textarea>
                                            </div>
                                            <br><br><br><br><br>
                                            <div class=" form-group mb-1 col-sm-12 col-md-12 col-xs-12  col-lg-12">
                                                <label >
                                                    <h5 class="card-title parrafo text-black">
                                                        <span class="text-danger">*</span>
                                                        3) HALLAZGOS
                                                    </h5>
                                                </label>
                                                <br><br>
                                                <?php
                                                $actividad = "";
                                                if ($idinforme != false) {$actividad = $idinforme->getHallazgos(); }
                                                else {$actividad = "";}
                                                ?>
                                                <textarea class="form-control card-title parrafo text-black" id="hallasgoz"
                                                    style="border: 1px solid #cdcdcd;" name="hallasgoz" rows="4"
                                                    cols="120"><?php echo $actividad; ?></textarea>
                                            </div>
                                            <br><br>
                                            <br>
                                            <div class="form-group mb-1  col-md-12 col-xs-12 col-sm-12 col-lg-12">
                                                <label >
                                                    <h5 class="card-title parrafo text-black">
                                                        <span class="text-danger">*</span>
                                                        4) CONCLUSIONES
                                                    </h5>
                                                </label>
                                                <br><br>
                                                <?php
                                                $actividad = "";
                                                if ($idinforme != false) {$actividad = $idinforme->getConclusion();
                                                } else {$actividad = "";}
                                                ?>
                                                <textarea class="form-control card-title parrafo text-black " id="conclusiones"
                                                    style="border: 1px solid #cdcdcd;" name="conclusiones" rows="4"
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
         
        </div>
    </div>
    <?php
    require_once(PLATFORM_PATH . "global/inc/component/footer.php");
    require_once(PLATFORM_PATH . "global/inc/platform/lib.php");
    ?>
    <!-- BEGIN: Page Vendor JS-->
    <script src="https://www.google.com/jsapi"></script>
    <!-- END: Page Vendor JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="<?php echo CORE_JS_SERVER . "directory.js"; ?>"></script>
    <script src="<?php echo CORE_JS_SERVER . "app.js"; ?>"></script>
    <script src="<?php echo PLATFORM_SERVER . "modules/trabajo/triggers/module.js"; ?>"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
    google.load('visualization', '1.0', {
        'packages': ['corechart']
    });
    google.setOnLoadCallback(drawColumn);
    //google.setOnLoadCallback(drawColumn2);
    function drawColumn() {
            <?php $r = intval($objEstatus[0]) + intval($objEstatus[1]) + intval($objEstatus[2]);
            $valorCU =round(intval($objEstatus[0]) / intval($r) * 100);
            $valorNC=round(intval($objEstatus[1]) / intval($r) * 100);
            $valorNA=round(intval($objEstatus[2]) / intval($r) * 100);
            ?>
              
                var data = google.visualization.arrayToDataTable([
               
                    ["Estado", "Porcentaje", { role: "style" }, { role: 'annotation' } ],
                    ['CU', <?php echo $valorCU; ?>,'#2ecc71', <?php echo $valorCU .'%'; ?>],
                    ['NC', <?php echo $valorNC; ?> , '#e74c3c',<?php echo $valorNC .'%'; ?> ],
                    ['N/A', <?php echo $valorNA; ?>, '#3498db', <?php echo $valorNA .'%';?>] ]
                );
      
       var options_column = {
                height: 450,
                width: 600,
                is3D: false,
                fontSize: 14,
                 chartArea: {
                    left: '5%',
                    width: '80%',
                    height: 350
                }, 
                vAxes: {
            
                   0: {title: 'Porcentajes %', fontSize: 14}
                  
                },
                hAxes: {
            
                    0: {title: 'Estados', fontSize: 14}
                    
                },
                vAxis: {
                    gridlines: {
                        color: '#e9e9e9',
                        count: 10
                    },
                    minValue: 0
                },
                legend: {
                    position: 'none'
                    
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
                    height: 200
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