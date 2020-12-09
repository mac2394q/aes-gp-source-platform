<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once (PLATFORM_PATH."global/inc/platform/head.php");

require_once (CONTROLLERS_PATH."proyectoController.php");
echo proyectoController::listadoProyectosTrabajo($_POST['idtrabajo']);

?>