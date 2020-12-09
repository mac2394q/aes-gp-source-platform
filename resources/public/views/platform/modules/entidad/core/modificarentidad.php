<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."entidadController.php");
  require_once(PROVIDERS_PATH."pdo/EntidadDao.php");
  require_once(MODEL_PATH."entidad.php");
   
 
  $modelentidad = new entidad(
     null,
     $_POST['id_entidad'],
     $_POST['tipo,entidad'],
     $_POST['estado_entidad']
     
  );
  EntidadDao::modificarEntidad($modelentidad);