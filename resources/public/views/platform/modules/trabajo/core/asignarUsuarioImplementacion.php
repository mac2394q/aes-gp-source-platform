<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');

require_once (PLATFORM_PATH."global/inc/platform/head.php");



require_once (CONTROLLERS_PATH."trabajoController.php");

require_once (CONTROLLERS_PATH."empresaController.php");



trabajoController::asignarUsuarioImplementacion($_POST['usuario'],$_POST['idempresa']);



echo "  <div class='alert alert-success' role='alert'>

						 <li class='fa fa-check-circle'></li> Usuario asignado correctamente &nbsp 

		</div>";



sleep(1);


$url =PLATFORM_SERVER."modules/trabajo/verFicha.php?id=".$_POST['idempresa']; 

empresaController::retornarVista($url); 