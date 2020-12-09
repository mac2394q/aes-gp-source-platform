<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."empresa_proyectoController.php");
  require_once(PROVIDERS_PATH."pdo/Empresa_proyectoDao.php");
  require_once(MODEL_PATH."empresa_proyecto.php");
   
 
  $modelempresa_proyecto = new empresa_proyecto(
     $_POST['id_empresa_proyecto'],
     $_POST['id_entidad_empresa_proyecto'],
     $_POST['id_proyecto_empresa'],
     $_POST['id_contrato_empresa_proyecto'],
     $_POST['estado_empresa_proyecto']
     
  );
  Empresa_proyectoDao::modificarEmpresa_proyecto($modelempresa_proyecto);
  
 
 
?>