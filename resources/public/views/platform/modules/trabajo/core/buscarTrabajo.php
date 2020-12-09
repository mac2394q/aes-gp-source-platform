<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/conf.php');
require_once(CONTROLLERS_PATH . "trabajoController.php");


$objProyecto=trabajoController::listadoTrabajo($_POST['estado'],$_POST['buscar']);