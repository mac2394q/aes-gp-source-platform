<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."usuarioController.php");
  require_once(CONTROLLERS_PATH."empresaController.php");
  $objEmpresa = usuarioController::activar($_POST['idempleado']);
    
  $url =MODULE_APP_SERVER."usuarios/verFicha.php?id=".$_POST['idempleado']; 
  empresaController::retornarVista($url);   
 
?>  