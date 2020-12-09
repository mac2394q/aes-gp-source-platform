<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."preauditoria_proyectoController.php");
  require_once(PROVIDERS_PATH."pdo/Preauditoria_proyectoDao.php");
  require_once(MODEL_PATH."preauditoria_proyecto.php");
   
 
  $modelpreauditoria_proyecto = new preauditoria(
     $_POST['id_preauditoria_item_proyecto'],
     $_POST['id_item_grupo_plantilla_certificado'],
     $_POST['id_proyecto'],
     $_POST['comentario_preauditoria'],
     $_POST['estado_preauditoria']
  );
  Preauditoria_proyectoDao::registrarPreauditoria_proyecto($modelpreauditoria_proyecto);