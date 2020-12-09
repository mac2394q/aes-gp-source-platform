<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once (PLATFORM_PATH."global/inc/platform/head.php");

require_once (CONTROLLERS_PATH."proyectoController.php");
require_once (CONTROLLERS_PATH."empresaController.php");
echo proyectoController::eliminarProyectoEmpresa($_GET['idproyecto']);
$url =PLATFORM_SERVER."modules/trabajo/alcanceProyectos.php?id=".$_GET['idtrabajo']; 
empresaController::retornarVista($url); 

?>