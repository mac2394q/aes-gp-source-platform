<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."empresaController.php");
  require_once(MODEL_PATH."empresa.php");
  empresaController::listadoEmpresasSelect2("empresaAso","Empresa asociada:",$_POST['idempresa']);

  ?>