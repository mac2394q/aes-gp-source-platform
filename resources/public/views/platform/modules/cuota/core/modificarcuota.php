<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."cuotaController.php");
  require_once(PROVIDERS_PATH."pdo/CuotaDao.php");
  require_once(MODEL_PATH."cuota.php");
   
 
  $modelcuota = new cuota(
     $_POST['id_cuota'],
     $_POST['id_acuerdo_pago_cuota'],
     $_POST['numero_cuotas'],
     $_POST['monto_cuotas'],
     $_POST['porcentaje_cuotas'],
     $_POST['estado_cuota']
     
  );
  CuotaDao::modificarCuota($modelcuota);
  
 
 
?>