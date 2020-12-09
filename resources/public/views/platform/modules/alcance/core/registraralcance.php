<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."alcanceController.php");
  require_once(PROVIDERS_PATH."pdo/alcanceDao.php");
  require_once(MODEL_PATH."alcance.php");
   
 
  $modelalcance = new alcance(
     null,
     $_POST['id_alcance'],
     $_POST['nombre_alcance'],
     $_POST['estado_alcance']
     
  );
  AlcanceDao::registrarAlcance($modelalcance);
  
 
 
?>