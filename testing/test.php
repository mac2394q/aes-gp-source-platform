<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');

  require_once(CONTROLLERS_PATH."trabajoController.php");
  
  


  $id = trabajoController::ultimoTrabajo();
  $directorio = DOCUMENTS_PATH."documentos/trabajo/".$id;
  if(!is_dir($directorio)){ if(!mkdir($directorio, 0755,true)) {die('Fallo al crear las carpetas...'); }}

?>