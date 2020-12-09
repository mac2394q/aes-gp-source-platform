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
require_once (CONTROLLERS_PATH."usuarioController.php");
session::verificarSesion($_SESSION['idsesion']);
date_default_timezone_set('America/Bogota');
setlocale(LC_ALL,"es_CO");
$objTrabajo = trabajoController::trabajoId($_GET['id']);
// $entidad = entidadController::obtenerEntidad($objTrabajo->getId_entrada_trabajo());
// $objEmpresa = empresaController::objEmpresa($_GET['id']);
// $idempresa = $_GET['id'];
//print_r($entidad);
//print_r($objTrabajo);
$idproyecto = trabajoController::proyectoId($_GET['idproyecto']);
// $objEmpresa = trabajoController::proyectoId();
//print_r($idproyecto);
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
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:75%;">
    <input type="hidden" name="idempresa" id="idempresa" value="<?php echo  $idempresa; ?>" />
    <input type="hidden" name="idsesion" id="idsesion" value="" />
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
                                            Diagnostico</a>
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
                        <div class="col-md-12">
                            <ul class="list-inline mb-0">

                                <!-- <li><a href="#"
                                        class="btn text-white capa round btn-min-width mr-1 mb-1 waves-effect waves-light">
                                        <i class="fa fa-business-time fa-2x"></i>&nbsp; Finalizar Fase Diagnóstico(sin Funcionalidad)</a>
                                </li>

                                <li><a href="#"
                                        class="btn text-white capa round btn-min-width mr-1 mb-1 waves-effect waves-light">
                                        <i class="fa fa-business-time fa-2x"></i>&nbsp; Reporte</a>
                                </li> -->
                            </ul>
                        </div>
                        <div class="card" style="">


                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="card-header">
                                        <img src="https://aes.org.co/wp-content/uploads/2019/04/088.png">
                                        <h2 class="form-section"><i class="fa fa-business-time"></i>
                                            VERIFICACIÓN DE CUMPLIMIENTO REQUISITOS </h2>
                                        <br>

                                        <div class="row">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            RAZON SOCIAL DE LA EMPRESA
                                                        </h5>
                                                    </label>
                                                    <input readonly="" type="text" class="form-control"
                                                        placeholder=". . ." name="razonSocial" id="razonSocial"
                                                        value="<?php echo "";?>">
                                                </div>
                                            </div>


                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            Nombre Auditor
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
                                                            Programación
                                                        </h5>
                                                    </label>
                                                    <input readonly="" type="text" class="form-control"
                                                        placeholder=". . ." name="razonSocial" id="razonSocial"
                                                        value="<?php echo $objTrabajo->getFecha_fin_diagnostico_trabajo(); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            Contacto
                                                        </h5>
                                                    </label>
                                                    <input readonly="" type="text" class="form-control"
                                                        placeholder=". . ." name="razonSocial" id="razonSocial"
                                                        value="<?php  ?>">
                                                </div>
                                            </div>

                                        </div>
                                        <div id="top_bar2">

                                            <a target="_blank" href="oeaPDF.php?id=11"
                                                class="btn round capa text-white waves-effect waves-light">
                                                <i class="fa fa-file-pdf fa-2x"></i> &nbsp;PDF
                                            </a><br><br>
                                        </div>

                                        <a class="heading-elements-toggle"><i
                                                class="la la-ellipsis-h font-medium-3"></i></a>
                                        <div class="heading-elements">
                                            <ul class="list-inline mb-0">

                                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>

                                            </ul>
                                        </div>
                                        <div class="row">

                                            <?php 
                                        echo trabajoController::plantillaDiagnosticoProyectoListadoInforme($_GET['idproyecto']); 
                                        echo trabajoController::plantillaDiagnosticoProyectoListadoInforme2($_GET['idproyecto']);
                                        $objEstatus =trabajoController::plantillaDiagnosticoProyectoListadoInforme3($_GET['idproyecto']);
                                        $objEstatus2 =trabajoController::plantillaDiagnosticoProyectoListadoInforme4($_GET['idproyecto']);

                                        //print_r( $objEstatus2 );
                                        
                                    ?>

                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h2 class="card-title titulo">Verificacion Requisitos OEA</h2>
                                                       
                                                    </div>
                                                    <div class="card-content collapse show">
                                                        <div class="card-body">
                                                            
                                                            <div id="column-chart">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-content collapse show">
                                                        <div class="card-body">
                                                            
                                                            <div id="column-chart2">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h3 class="form-section">
                                            <strong>RESUMEN EJECUTIVO SOBRE CUMPLIMIENTO DE REQUISITOS OEA </strong>
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
                                                <textarea class="form-control " id="descripcion_auditoria" style="border: 1px solid #888;" name="descripcion_auditoria" rows="4" cols="120">                                                                                                    </textarea>
                                            </div>
                                            <div class="form-group mb-1 col-sm-12 col-md-12">
                                                
                                                <label for="projectinput3">
                                                    <h5 class="card-title">
                                                       
                                                    2) ASPECTOS RELEVANTES
                                                    </h5>
                                                </label>
                                                <br><br>
                                                <textarea class="form-control " id="descripcion_condiciones_entorno_auditoria" style="border: 1px solid #888;" name="descripcion_condiciones_entorno_auditoria" rows="4" cols="120">.
                                                </textarea>
                                            </div>
                                            <br><br><br><br><br>
                                            <div class=" col-sm-12 col-md-12">
                                                

                                                <label for="projectinput3">
                                                    <h5 class="card-title">
                                                       
                                                    3) HALLAZGOS 
                                                    </h5>
                                                </label>
                                                <br><br>
                                                <textarea class="form-control " id="descripcion_condiciones_entorno_auditoria" style="border: 1px solid #888;" name="descripcion_condiciones_entorno_auditoria" rows="4" cols="120">.
                                                </textarea>
                                            </div>
                                            <br><br>
                                            <div class="form-group mb-1 col-sm-12 col-md-12">
                                                <label for="projectinput3">
                                                    <h5 class="card-title">
                                                       
                                                        4) CONCLUSIONES
                                                    </h5>
                                                </label>
                                                <br><br>
                                                <textarea class="form-control " id="descripcion_condiciones_entorno_auditoria" style="border: 1px solid #888;" name="descripcion_condiciones_entorno_auditoria" rows="4" cols="120">.
                                                                                                    </textarea>
                                            </div>
                                           
                                        </div>
                                        <div class="col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">3D Pie Chart</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <p class="card-text">If you set the is3D option to true, your pie chart will be drawn as though it has three dimensions:</p>
                        <div id="pie-3d"><div style="position: relative;"><div dir="ltr" style="position: relative; width: 432px; height: 400px;"><div aria-label="Un gráfico" style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="432" height="400" aria-label="Un gráfico" style="overflow: hidden;"><defs id="defs"></defs><rect x="0" y="0" width="432" height="400" stroke="none" stroke-width="0" fill="#ffffff"></rect><g><text text-anchor="start" x="22" y="16.7" font-family="Arial" font-size="12" font-weight="bold" stroke="none" stroke-width="0" fill="#000000">My Daily Activities</text><rect x="22" y="6.5" width="389" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect></g><g><rect x="281" y="25" width="130" height="88" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><rect x="281" y="25" width="130" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><text text-anchor="start" x="298" y="35.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#222222">Work</text></g><circle cx="287" cy="31" r="6" stroke="none" stroke-width="0" fill="#99b898"></circle></g><g><rect x="281" y="44" width="130" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><text text-anchor="start" x="298" y="54.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#222222">Eat</text></g><circle cx="287" cy="50" r="6" stroke="none" stroke-width="0" fill="#fecea8"></circle></g><g><rect x="281" y="63" width="130" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><text text-anchor="start" x="298" y="73.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#222222">Commute</text></g><circle cx="287" cy="69" r="6" stroke="none" stroke-width="0" fill="#ff847c"></circle></g><g><rect x="281" y="82" width="130" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><text text-anchor="start" x="298" y="92.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#222222">Watch TV</text></g><circle cx="287" cy="88" r="6" stroke="none" stroke-width="0" fill="#e84a5f"></circle></g><g><rect x="281" y="101" width="130" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><text text-anchor="start" x="298" y="111.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#222222">Sleep</text></g><circle cx="287" cy="107" r="6" stroke="none" stroke-width="0" fill="#474747"></circle></g></g><g><path d="M262,188L262,212A120,96,0,0,1,173.0582854123025,304.72887932375056L173.0582854123025,280.72887932375056A120,96,0,0,0,262,188" stroke="#738a72" stroke-width="1" fill="#738a72"></path><path d="M142,188L142,212L173.0582854123025,304.72887932375056L173.0582854123025,280.72887932375056" stroke="#738a72" stroke-width="1" fill="#738a72"></path><path d="M142,188L142,92A120,96,0,0,1,173.0582854123025,280.72887932375056L142,188A0,0,0,0,0,142,188" stroke="#99b898" stroke-width="1" fill="#99b898"></path><text text-anchor="start" x="214.23198423957302" y="183.0629672079186" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#ffffff">45.8%</text></g><g><path d="M26.088900845311812,212.84662832984202L26.088900845311812,236.84662832984202A120,96,0,0,1,22,212L22,188A120,96,0,0,0,26.088900845311812,212.84662832984202" stroke="#353535" stroke-width="1" fill="#353535"></path><path d="M142,188L142,212L26.088900845311812,236.84662832984202L26.088900845311812,212.84662832984202" stroke="#353535" stroke-width="1" fill="#353535"></path><path d="M142,188L26.088900845311812,212.84662832984202A120,96,0,0,1,142,92L142,188A0,0,0,0,0,142,188" stroke="#474747" stroke-width="1" fill="#474747"></path><text text-anchor="start" x="53.80922204058811" y="149.71264038174206" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#ffffff">29.2%</text></g><g><path d="M57.14718625761431,255.88225099390857L57.14718625761431,279.88225099390854A120,96,0,0,1,26.088900845311812,236.84662832984202L26.088900845311812,212.84662832984202A120,96,0,0,0,57.14718625761431,255.88225099390857" stroke="#ae3847" stroke-width="1" fill="#ae3847"></path><path d="M142,188L142,212L57.14718625761431,279.88225099390854L57.14718625761431,255.88225099390857" stroke="#ae3847" stroke-width="1" fill="#ae3847"></path><path d="M142,188L57.14718625761431,255.88225099390857A120,96,0,0,1,26.088900845311812,212.84662832984202L142,188A0,0,0,0,0,142,188" stroke="#e84a5f" stroke-width="1" fill="#e84a5f"></path><text text-anchor="start" x="48.434659309150064" y="228.15335800048328" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#ffffff">8.3%</text></g><g><path d="M110.9417145876975,280.72887932375056L110.9417145876975,304.72887932375056A120,96,0,0,1,57.14718625761431,279.88225099390854L57.14718625761431,255.88225099390857A120,96,0,0,0,110.9417145876975,280.72887932375056" stroke="#bf635d" stroke-width="1" fill="#bf635d"></path><path d="M142,188L142,212L110.9417145876975,304.72887932375056L110.9417145876975,280.72887932375056" stroke="#bf635d" stroke-width="1" fill="#bf635d"></path><path d="M142,188L110.9417145876975,280.72887932375056A120,96,0,0,1,57.14718625761431,255.88225099390857L142,188A0,0,0,0,0,142,188" stroke="#ff847c" stroke-width="1" fill="#ff847c"></path><text text-anchor="start" x="81.3576421284445" y="255.7078570172112" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#ffffff">8.3%</text></g><g><path d="M173.0582854123025,280.72887932375056L173.0582854123025,304.72887932375056A120,96,0,0,1,110.9417145876975,304.72887932375056L110.9417145876975,280.72887932375056A120,96,0,0,0,173.0582854123025,280.72887932375056" stroke="#bf9b7e" stroke-width="1" fill="#bf9b7e"></path><path d="M142,188L173.0582854123025,280.72887932375056A120,96,0,0,1,110.9417145876975,280.72887932375056L142,188A0,0,0,0,0,142,188" stroke="#fecea8" stroke-width="1" fill="#fecea8"></path><text text-anchor="start" x="128.50000000000003" y="269.5411662985346" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#ffffff">8.3%</text></g><g></g></svg><div aria-label="Una representación en forma de tabla de los datos del gráfico" style="position: absolute; left: -10000px; top: auto; width: 1px; height: 1px; overflow: hidden;"><table><thead><tr><th>Task</th><th>Hours per Day</th></tr></thead><tbody><tr><td>Work</td><td>11</td></tr><tr><td>Eat</td><td>2</td></tr><tr><td>Commute</td><td>2</td></tr><tr><td>Watch TV</td><td>2</td></tr><tr><td>Sleep</td><td>7</td></tr></tbody></table></div></div></div><div aria-hidden="true" style="display: none; position: absolute; top: 410px; left: 442px; white-space: nowrap; font-family: Arial; font-size: 12px;">Sleep</div><div></div></div></div>
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
            <!--/ contendio -->
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
    <!-- BEGIN: Page Vendor JS-->
    <script src="https://www.google.com/jsapi"></script>
    
    <!-- END: Page Vendor JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <!-- <script src="https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/app-assets/js/scripts/charts/google/bar/bar.min.js"></script>
    <script src="https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/app-assets/js/scripts/charts/google/bar/column.js"></script> -->
    <script src="<?php echo CORE_JS_SERVER."directory.js"; ?>"></script>
    <script src="<?php echo CORE_JS_SERVER."app.js"; ?>"></script>
    <script src="<?php echo PLATFORM_SERVER."modules/trabajo/triggers/module.js"; ?>"></script>
    <script>
    /*=========================================================================================
    File Name: column.js
    Description: google column bar chart
    ----------------------------------------------------------------------------------------
    Item Name: Modern Admin - Clean Bootstrap 4 Dashboard HTML Template
   Version: 3.0
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

// Column chart
// ------------------------------

// Load the Visualization API and the corechart package.
google.load('visualization', '1.0', {'packages':['corechart']});

// Set a callback to run when the Google Visualization API is loaded.
google.setOnLoadCallback(drawColumn);
google.setOnLoadCallback(drawColumn2);

// Callback that creates and populates a data table, instantiates the pie chart, passes in the data and draws it.
function drawColumn() {
    <?php $r= intval($objEstatus[0]) + intval($objEstatus[1]) + intval($objEstatus[2]) ?>
    // Create the data table.
    var data = google.visualization.arrayToDataTable([
        ['Year', 'CU','NC','N/A'],
        ['CU',  <?php echo round( intval($objEstatus[0])/intval($r)*100 ); ?>,0,0     ],
        ['NC',  0, <?php echo round(intval($objEstatus[1])/intval($r)*100);?>,0     ],
        ['N/A',  0, 0,<?php echo round(intval($objEstatus[2])/intval($r)*100);?>     ]
    ]);


    // Set chart options
    var options_column = {
        height: 400,
        fontSize: 12,
        colors:['#2ecc71','#e74c3c','#3498db'],
        chartArea: {
            left: '5%',
            width: '90%',
            height: 350
        },
        vAxis: {
            gridlines:{
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

// Create the data table.
<?php 
   
echo "
var data = google.visualization.arrayToDataTable([
    ['Year', 'CU','NC','N/A'],";
foreach ($objEstatus2 as $key => $value) {
    echo "['".$objEstatus2[$key][1]."',  ".$objEstatus2[$key][2].",".$objEstatus2[$key][3].",".$objEstatus2[$key][4]."    ],";

    // ['CU',  0,0,0     ],
    // ['NC',  0, 0,0     ],
    // ['N/A',  0, 0,0     ]
}

echo "    
]); ";

 
?>


// Set chart options
var options_column = {
    height: 550,
    fontSize: 12,
    colors:['#2ecc71','#e74c3c','#3498db'],
    chartArea: {
        left: '5%',
        width: '90%',
        height: 350
    },
    vAxis: {
        gridlines:{
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


// Resize chart
// ------------------------------

$(function () {

    // Resize chart on menu width change and window resize
    $(window).on('resize', resize);
    $(".menu-toggle").on('click', resize);

    // Resize function
    function resize() {
        drawColumn();
        drawColumn2();
    }
});


function drawPie3d(){var e=google.visualization.arrayToDataTable([["Task","Hours per Day"],["Work",11],["Eat",2],["Commute",2],["Watch TV",2],["Sleep",7]]);new google.visualization.PieChart(document.getElementById("pie-3d")).draw(e,{title:"My Daily Activities",is3D:!0,height:400,fontSize:12,colors:["#99B898","#FECEA8","#FF847C","#E84A5F","#474747"],chartArea:{left:"5%",width:"90%",height:350}})}google.load("visualization","1.0",{packages:["corechart"]}),google.setOnLoadCallback(drawPie3d),$(function(){function e(){drawPie3d()}$(window).on("resize",e),$(".menu-toggle").on("click",e)});
</script>

   
</body>
<!-- END: Body-->

</html>
