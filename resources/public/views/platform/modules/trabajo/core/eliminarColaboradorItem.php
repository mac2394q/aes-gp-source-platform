<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once (PLATFORM_PATH."global/inc/platform/head.php");

require_once (CONTROLLERS_PATH."trabajoController.php");
require_once (CONTROLLERS_PATH."empresaController.php");
// print_r($_POST);
trabajoController::eliminarUsuarioColaborador($_GET['idcola'],$_GET['idimple']);


echo "<script>
window.location = '".$_SERVER['HTTP_REFERER']."';
</script>";

// sleep(1);
// $url =PLATFORM_SERVER."modules/trabajo/implementacion.php?id=".$_POST['idempresa']; 
// empresaController::retornarVista($url); 