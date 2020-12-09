<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once (PLATFORM_PATH."global/inc/platform/head.php");

require_once (CONTROLLERS_PATH."trabajoController.php");
require_once (CONTROLLERS_PATH."empresaController.php");

trabajoController::asociarProyectoContrato($_POST['idcontrato'],$_POST['proyectoId']);


$url =PLATFORM_SERVER."modules/trabajo/verContrato.php?id=".$_POST['idtrabajo']."&idcontrato=".$_POST['idcontrato']; 
empresaController::retornarVista($url); 