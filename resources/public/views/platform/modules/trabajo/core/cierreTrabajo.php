<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once (PLATFORM_PATH."global/inc/platform/head.php");

require_once (CONTROLLERS_PATH."trabajoController.php");
require_once (CONTROLLERS_PATH."empresaController.php");

$resultadoCierre=trabajoController::trabajoFinalizado($_POST['idtrabajo']);
sleep(3);
$url =PLATFORM_SERVER."modules/trabajo/verFicha.php?id=".$_POST['idtrabajo']; 
if ($resultadoCierre){
 echo "  <div class='alert alert-success' role='alert'>
                <li class='fa fa-check-circle fa-2x'></li> Trabajo finalizado Correctamente &nbsp 
            </div>";
}
else{
    echo "  <div class='alert alert-danger' role='alert'>
    <li class='fa fa-check-circle fa-2x'></li>Hay proyectos pendientes por finalizar !&nbsp 
</div>";

}


//empresaController::retornarVista($url); 