<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."empresaController.php");
  require_once(PROVIDERS_PATH."pdo/plantilla_alcanceDao.php");
  $idplantilla = plantilla_alcanceDao::itemId($_POST['id']);
  $objEmpresa =  plantilla_alcanceDao::borrarItem2($_POST['id']);

  
  $url="../plantillas/verCapitulos.php?id=". $idplantilla->getId_grupo_plantilla_certificacion();
  //echo $url;
  empresaController::retornarVista($url);
?>  