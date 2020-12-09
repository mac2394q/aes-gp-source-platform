<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once (PLATFORM_PATH."global/inc/platform/head.php");

require_once (CONTROLLERS_PATH."trabajoController.php");
require_once (CONTROLLERS_PATH."empresaController.php");


    trabajoController::cancelarDiagnostico($_POST['idproyecto']);
    echo "  <div class='alert alert-success' role='alert'>
                <li class='fa fa-check-circle fa-2x'></li> Fase de Diagnostico Cancelada &nbsp 
            </div>";



//print_r($obj);
$url =$HTTP_REFERER;
empresaController::retornarVista($url); 