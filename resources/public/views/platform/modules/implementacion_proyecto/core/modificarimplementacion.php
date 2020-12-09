<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."implementacion_proyectoController.php");
  require_once(PROVIDERS_PATH."pdo/Implementacion_proyectoDao.php");
  require_once(MODEL_PATH."implementacion_proyecto.php");
   
 
  $modelimplementacion_proyecto = new implementacion_proyecto(
     $_POST['id_implementacion_item_proyecto'],
     $_POST['id_item_grupo_plantilla_certificacion'],
     $_POST['id_proyecto'],
     $_POST['comentarios_implementacion'],
     $_POST['porcentaje_avance'],
     $_POST['fecha_comentario_implementacion'],
     $_POST['estado_implementacion']
     
  );
  Implementacion_proyectoDao::modificarImplementacion_proyecto($modelimplementacion_proyecto);