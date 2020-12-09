<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."contratoController.php");
  require_once(PROVIDERS_PATH."pdo/ContratoDao.php");
  require_once(MODEL_PATH."contrato.php");
   
 
  $modelcontrato = new contrato(
     null,
     $_POST['id_contrato'],
     $_POST['id_entidad_pago_contrato'],
     $_POST['valor_contrato'],
     $_POST['fecha_firma_contrato'],
     $_POST['estado_contrato']
     
  );
  ContratoDao::modificarContrato($modelcontrato);
  
 
 
?>