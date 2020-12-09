<?php session_start(); ?>
<!DOCTYPE html>
<html  >
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
$objTrabajoFechas = trabajoController::trabajoIdFechas($_GET['id']);
$entidad = entidadController::obtenerEntidad($objTrabajo->getId_entrada_trabajo());
// $objEmpresa = empresaController::objEmpresa($_GET['id']);
// $idempresa = $_GET['id'];
//print_r($objTrabajoFechas);
//print_r($objTrabajo);
$idproyecto = trabajoController::proyectoId($_GET['idproyecto']);
$idproyectoObjDinamic= trabajoController::proyectoIdFechas($_GET['idproyecto']);
$idinforme = trabajoController::informeDiagnostico($_GET['idproyecto']);
// $objEmpresa = trabajoController::proyectoId();
//print_r($idproyectoObjDinamic);
$bloquear=" readonly='' ";
if ($_SESSION['rol'] != "EMPRESA" && $_SESSION['rol'] != "GRUPO"){
    $bloquear=" ";
}
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
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:78%;">
    <input type="hidden" name="idempresa" id="idempresa" value="<?php echo  $idempresa; ?>" />
    <input type="hidden" name="idproyecto" id="idproyecto" value="<?php echo $_GET['idproyecto'];?>" />
    <input type="hidden" value="0" name="certificadosDinamicos" />
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
                                            href="<?php echo "diagnostico.php?id=".$_GET['id']; ?>">Fase de
                                            Diagnóstico</a>
                                    </li>
                                    <li class="breadcrumb-item active parrafo text-black"><a class="text-black"
                                            href="<?php echo "gestionProyecto.php?id=".$_GET['id']; ?>">Gestión de Proyectos </a>
                                    </li>
                                    <li class="breadcrumb-item active parrafo text-black">Reporte de Diagnóstico
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
                        <div class="card" style="">
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="card-header">
                                        <img src="<?php echo VENDOR_SERVER."aes/aes2/1.jpg";  ?>">
                                        <h2 class="form-section"><i class="fa fa-business-time"></i>
                                            VERIFICACIÓN DE CUMPLIMIENTO REQUISITOS </h2>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            RAZÓN SOCIAL DE LA EMPRESA
                                                        </h5>
                                                    </label>
                                                    <input readonly="" type="text" class="form-control"
                                                        placeholder=". . ." name="razonSocial" id="razonSocial"
                                                        value="<?php echo $entidad['entidad'];?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            Nombre Especialista
                                                        </h5>
                                                    </label>
                                                    <input readonly="" type="text" class="form-control"
                                                        placeholder=". . ." name="razonSocial" id="razonSocial"
                                                        value="<?php echo usuarioController::usuarioId($objTrabajo->getId_usuario_diagnostico())->getNombre_usuario() ; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                        Fecha Reporte
                                                        </h5>
                                                    </label>
                                                    <input readonly="" type="text" class="form-control"
                                                        placeholder=". . ." name="razonSocial" id="razonSocial"
                                                        value="<?php echo $idproyectoObjDinamic[0]['fechaFinDiagnostico']; ?>">
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div id="top_bar2">
                                            <a target="_blank"
                                                href="<?php echo 'reporteDiagnosticoPDF.php?idempresa='.$_GET['idempresa'].'&idproyecto='.$_GET['idproyecto'].'&id='.$_GET['id']; ?>"
                                                class="btn round capa text-white waves-effect waves-light">
                                                <i class="fa fa-file-pdf fa-2x"></i> &nbsp;Versión
                                                PDF
                                            </a><br><br>
                                        </div>
                                        
                                        <div class="row">
                                            <?php 
                                        echo trabajoController::plantillaDiagnosticoProyectoListadoInforme($_GET['idproyecto']); 
                                        echo trabajoController::plantillaDiagnosticoProyectoListadoInforme2($_GET['idproyecto']);
                                        
                                        $objEstatus =trabajoController::plantillaDiagnosticoProyectoListadoInforme3($_GET['idproyecto']);
                                        $objEstatus2 =trabajoController::plantillaDiagnosticoProyectoListadoInforme4($_GET['idproyecto']);
                                        //echo count( $objEstatus2 );
                                        
                                    ?>
                                        </div>
                                        <div class="row">
                                            <div class="col--md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h2 class="card-title titulo">Verificación Requisitos OEA</h2>
                                                    </div>
                                                    <div class="card-content collapse show">
                                                        <div class="card-body" style="width: 800px; height: 500px;">
                                                            <div id="change-chart">
                                                            </div>
                                                            <div id="column-chart">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-content collapse show">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <?php
                                                                
                                                                for ($i=0; $i < count( $objEstatus2 ) ; $i++) { 
                                                                    echo "
                                                                    <div class='col-md-4'>
                                                                        <div id='piechart_3d_".$i."'></div>
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
                                        <h3 class="form-section">
                                            <strong>RESUMEN EJECUTIVO </strong>
                                        </h3>
                                        <div class="row">
                                            <div class="form-group mb-1 col-sm-12 col-md-12">
                                                <label for="projectinput3">
                                                    <h5 class="card-title">
                                                        <span class="text-danger">*</span>
                                                        1) ACTIVIDADES DESARROLLADAS
                                                    </h5>
                                                </label>
                                                <br><br>
                                                <?php
                                                $actividad="";
                                                 if($idinforme != false){
                                                    $actividad=$idinforme->getActividades(); }
                                                else{ $actividad=""; }
                                                ?>
                                                <textarea class="form-control "   <?php echo $bloquear; ?>
                                                  id="actividades" style="border: 1px solid #888;" name="actividades" rows="6"cols="120"
                                                ><?php echo $actividad; ?></textarea> 
                                            </div>
                                            <div class="form-group mb-1 col-sm-12 col-md-12">
                                                <label for="projectinput3">
                                                    <h5 class="card-title">
                                                        <span class="text-danger">*</span>
                                                        2) ASPECTOS RELEVANTES
                                                    </h5>
                                                </label>
                                                <br><br>
                                                <?php
                                                $actividad="";
                                                 if($idinforme != false){
                                                    $actividad=$idinforme->getAspectos(); }
                                                else{ $actividad=""; }
                                                ?>
                                                <textarea class="form-control " <?php echo $bloquear; ?>
                                                 id="aspectos" style="border: 1px solid #888;" name="aspectos" rows="6" cols="120"><?php echo $actividad; ?></textarea>
                                            </div>
                                            <br><br><br><br><br>
                                            <div class=" form-group mb-1 col-sm-12 col-md-12">
                                                <label for="projectinput3">
                                                    <h5 class="card-title">
                                                        <span class="text-danger">*</span>
                                                        3) HALLAZGOS
                                                    </h5>
                                                </label>
                                                <br><br>
                                                <?php
                                                $actividad="";
                                                 if($idinforme != false){
                                                    $actividad=$idinforme->getHallazgos(); }
                                                else{ $actividad=""; }
                                                ?>
                                                <textarea class="form-control "   <?php echo $bloquear; ?>
                                                id="hallasgoz"style="border: 1px solid #888;" name="hallasgoz" rows="6" cols="120"><?php echo $actividad; ?></textarea>
                                            </div>
                                            <br><br>
                                            <br>
                                            <div class="form-group mb-1 col-sm-12 col-md-12">
                                                <label for="projectinput3">
                                                    <h5 class="card-title">
                                                        <span class="text-danger">*</span>
                                                        4) CONCLUSIONES
                                                    </h5>
                                                </label>
                                                <br><br>
                                                <?php
                                                $actividad="";
                                                 if($idinforme != false){
                                                    $actividad=$idinforme->getConclusion(); }
                                                else{ $actividad=""; }
                                                ?>
                                                <textarea class="form-control "   <?php echo $bloquear; ?>
                                                id="conclusiones" style="border: 1px solid #888;" name="conclusiones" rows="6"cols="120"><?php echo $actividad; ?></textarea>
                                            </div>
                                            <br>
                                            <div id="smgReporte" class="form-group mb-1 col-sm-12 col-md-12"></div>
                                            <?php if ($_SESSION['rol'] != "EMPRESA" && $_SESSION['rol'] != "GRUPO"){ ?>
                                            <div class="form-group mb-1 col-sm-12 col-md-12">
                                                <a target="_blank" href="#" id="guardarInformeDiagnostico"
                                                    class="btn round capa text-white waves-effect waves-light">
                                                    <i class="fa fa-save fa-2x"></i> &nbsp;Guardar Informe
                                                </a><br><br>
                                            </div>
                                            <?php } ?>
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
    require_once (PLATFORM_PATH."global/inc/component/footer.php");
    require_once (PLATFORM_PATH."global/inc/platform/lib.php");
    
  ?>
    <!-- BEGIN: Page Vendor JS-->
    <script src="https://www.google.com/jsapi"></script>
    <!-- END: Page Vendor JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <!-- <script src="https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/app-assets/js/scripts/charts/google/bar/bar.min.js"></script>
    <script src="https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/app-assets/js/scripts/charts/google/bar/column.js"></script> -->
    <script src="<?php echo CORE_JS_SERVER."directory.js"; ?>"></script>
    <script src="<?php echo CORE_JS_SERVER."app.js"; ?>"></script>
    <script src="<?php echo PLATFORM_SERVER."modules/trabajo/triggers/module.js"; ?>"></script>
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
                    ['CU', <?php echo $valorCU; ?>,'#2ecc71', <?php echo $valorCU; ?>],
                    ['NC', <?php echo $valorNC; ?> , '#e74c3c',<?php echo $valorNC; ?> ],
                    ['N/A', <?php echo $valorNA; ?>, '#3498db', <?php echo $valorNA; ?>] ]
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
   
    </script>
</body>
<!-- END: Body-->
</html>
