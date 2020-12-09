<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(MODEL_PATH."diagnostico_proyecto.php");
  require_once(MODEL_PATH."preauditoria_proyecto.php");
  require_once(CONTROLLERS_PATH."trabajoController.php");
  //print_r($_POST);
  $modelTrabajo= new preauditoria_proyecto(null,$_POST['idItem'],$_POST['idProyecto'],$_POST['observacion'],$_POST['estado']);
  //print_r($modelTrabajo);
  trabajoController::actualizarObservacionPre($modelTrabajo);
  echo "    <div class='alert alert-success' role='alert'>
                   <li class='fa fa-check-circle fa-2x'></li> 
                   Observación registrada con éxito &nbsp 
            </div>";


  ?>