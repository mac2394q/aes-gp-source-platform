<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."proyectoController.php");
  require_once(PROVIDERS_PATH."pdo/ProyectoDao.php");
  require_once(MODEL_PATH."proyecto.php");
   
 
  $modelproyecto = new proyecto(
     $_POST['id_proyecto'],
     $_POST['id_trabajo_proyecto'],
     $_POST['id_plantilla_alcance_proyecto'],
     $_POST['estado_proyecto']
  );
  ProyectoDao::modificarProyecto($modelproyecto);