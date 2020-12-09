<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."implementacion_colaboracionController.php");
  require_once(PROVIDERS_PATH."pdo/Implementacion_colaboracionDao.php");
  require_once(MODEL_PATH."implementacion_colaboracion.php");
   
 
  $modelimplementacion_colaboracion = new implementacion_colaboracion(
     $_POST['id_implementacion_item_proyecto'],
     $_POST['id_colaborador_implementacion']
     
  );
  Implementacion_colaboracionDao::registrarmodificarImplementacion_colaboracion($modelimplementacion_colaboracion);