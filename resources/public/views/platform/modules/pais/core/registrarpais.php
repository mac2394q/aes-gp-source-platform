<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."paisController.php");
  require_once(PROVIDERS_PATH."pdo/PaisDao.php");
  require_once(MODEL_PATH."pais.php");
   
 
  $modelpais = new pais(
     $_POST['id_pais'],
     $_POST['acronimo_pais'],
     $_POST['nombre_pais']
  );
  PaisDao::registrarPais($modelpais);