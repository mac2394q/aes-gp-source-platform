<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once (PLATFORM_PATH."global/inc/platform/head.php");

require_once (CONTROLLERS_PATH."trabajoController.php");
require_once (CONTROLLERS_PATH."empresaController.php");
$obj = trabajoController::trabajoCancelar($_GET['id']);
if(intval($obj) == 1){
    echo "  <div class='alert alert-warning' role='alert'>
                <li class='fa fa-check-circle fa-2x'></li> No se puede cerrar el trabajo actula ,pueden haber proyectos en curso &nbsp 
            </div>";
}else{
    echo "  <div class='alert alert-success' role='alert'>
                <li class='fa fa-check-circle fa-2x'></li> Trabajo finalizado Correctamente &nbsp 
            </div>";
}

$url =PLATFORM_SERVER."modules/trabajo/verFicha.php?id=".$_GET['id']; 
sleep(3);
empresaController::retornarVista($url); 