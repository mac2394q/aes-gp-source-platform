<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."acuerdo_pagoController.php");
  require_once(PROVIDERS_PATH."pdo/Acuerdo_pagoDao.php");
  require_once(MODEL_PATH."acuerdo_pago.php");
   
 
  $modelacuerdo_pago = new acuerdo_pago(
     null,
     $_POST['id_acuerdo_pago'],
     $_POST['id_contrato_acuerdo_pago'],
     $_POST['estado_acuerdo']
     
  );
  Acuerdo_pagoDao::registrarAcuerdo_pago($modelacuerdo_pago);
  
 
 
?>  