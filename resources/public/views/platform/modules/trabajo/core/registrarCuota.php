<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."trabajoController.php");
  require_once(CONTROLLERS_PATH."entidadController.php");
  require_once(CONTROLLERS_PATH."contratoController.php");
  require_once(CONTROLLERS_PATH."proyectoController.php");
  require_once(CONTROLLERS_PATH."empresaController.php");
  require_once(MODEL_PATH."contrato.php");
  require_once(MODEL_PATH."cuota.php");
  require_once(MODEL_PATH."acuerdo_pago.php");
//   $entidad = entidadController::obtenerEntidad($_POST['opcionEntidad'],$_POST['entidadTipo']);
  
  // $modelCuota= new cuota(null,null,$_POST['cuota'],$_POST['ncuota'],$_POST['porcentaje'],$_POST['estado'],$_POST['textarea2']);
  // $modelAcuerdo = new acuerdo_pago(null,$_POST['idcontrato'],"ACTIVO");
  //print_r($modelTrabajo);
 


  ?>  