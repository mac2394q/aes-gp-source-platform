<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."grupo_plantilla_alcanceController.php");
  require_once(PROVIDERS_PATH."pdo/Grupo_plantilla_alcanceDao.php");
  require_once(MODEL_PATH."grupo_plantilla_alcance.php");
   
 
  $modelgrupo_plantilla_alcance = new grupo_plantilla(
     $_POST['id_grupo_plantilla_alcance'],
     $_POST['id_plantilla_alcance'],
     $_POST['etiqueta_grupo_plantilla'],
     $_POST['titulo_grupo_plantilla']
     
  );
  Grupo_plantillaDao::registrarGrupo_plantilla($modelgrupo_plantilla);