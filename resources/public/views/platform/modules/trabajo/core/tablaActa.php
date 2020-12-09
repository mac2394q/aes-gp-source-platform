<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once (PLATFORM_PATH."global/inc/platform/head.php");
require_once (CONTROLLERS_PATH."trabajoController.php");
require_once (CONTROLLERS_PATH."empresaController.php");
//print_r($_POST);
echo trabajoController::ActaProyectov2($_POST['idproyecto'],$_POST['id'],$_POST['date']); 
?>