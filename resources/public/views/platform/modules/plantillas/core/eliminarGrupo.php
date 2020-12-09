<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."empresaController.php");
  require_once(PROVIDERS_PATH."pdo/plantilla_alcanceDao.php");
  $idplantilla = plantilla_alcanceDao::grupoId($_POST['id']);
  $objEmpresa = plantilla_alcanceDao::borrarItem($_POST['id']);
  $objEmpresa = plantilla_alcanceDao::borrarGrupo($_POST['id']);
  
  $url="../plantillas/verFicha.php?id=".$idplantilla->getId_plantilla_alcance();
  //echo $url;
  empresaController::retornarVista($url);
?>  