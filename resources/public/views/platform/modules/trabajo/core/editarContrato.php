<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once (PLATFORM_PATH."global/inc/platform/head.php");

require_once (CONTROLLERS_PATH."trabajoController.php");
require_once (CONTROLLERS_PATH."empresaController.php");

$acu=trabajoController::verAcuerdos($_POST['idcontrato']);
if($acu == 1){
echo "  <div class='alert alert-danger' role='alert'>
                <li class='fa fa-check-circle fa-2x'></li> No puede modificar el contrato  teniendo un acuerdo vigente &nbsp 
        </div>";

}else{
        trabajoDao::modificarContrato($_POST['idcontrato'],$_POST['vcontrato']);
        echo "  <div class='alert alert-success' role='alert'>
                <li class='fa fa-check-circle fa-2x'></li> valor del contrato modificado &nbsp 
        </div>";


}
