<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once (PLATFORM_PATH."global/inc/platform/head.php");

require_once (CONTROLLERS_PATH."trabajoController.php");
require_once (CONTROLLERS_PATH."empresaController.php");

$datos=trabajoController::finalizarPreActual($_POST['idproyecto']);
if(count($datos) > 0){
    echo "  <div class='alert alert-danger parrafo' role='alert'>
                 Actualmente hay  requisitos sin terminar. <br><br>";
       foreach ($datos as $key => $value) {
          echo "Requisito: " . $datos[$key]['etiqueta'] ;
          echo"<br>";
       }
           echo "</div>";
}else{
    //trabajoController::finalizarDiagnostico($_POST['idtrabajo']);
    echo "  <div class='alert alert-success' role='alert'>
                <li class='fa fa-check-circle fa-2x'></li> Fase de Pre Auditoria Finalizado &nbsp 
            </div>";
    trabajoController::finalizarPre($_POST['idproyecto']);
    //trabajoController::finalizarImplementacion($_POST['idproyecto']);
    

    

}


//print_r($obj);
//$url =PLATFORM_SERVER."modules/trabajo/verFicha.php?id=".$_POST['idtrabajo']; 
//empresaController::retornarVista($url); 