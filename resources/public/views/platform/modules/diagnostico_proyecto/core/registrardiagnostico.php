<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."diagnostico_proyectoController.php");
  require_once(PROVIDERS_PATH."pdo/DiagnosticoDao.php");
  require_once(MODEL_PATH."diagnostico_proyecto.php");
   
 
  $modeldiagnostico_proyecto = new diagnostico(
     $_POST['id_diganostico_item_proyecto'],
     $_POST['id_proyecto'],
     $_POST['id_item_grupo_plantilla_alcance'],
     $_POST['comentario_dliagnostico'],
     $_POST['estado_diagnostio']
     
  );
  Diagnostico_proyectoDao::registrarDiagnostico_proyecto($modeldiagnostico_proyecto);
  
 
 
?>