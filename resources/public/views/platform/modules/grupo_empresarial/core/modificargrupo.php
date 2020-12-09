<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."grupo_empresariaController.php");
  require_once(PROVIDERS_PATH."pdo/Grupo_empresarialDao.php");
  require_once(MODEL_PATH."grupo_empresarial.php");
   
 
  $modelgrupo_empresarial = new grupo(
     $_POST['id_entidad'],
     $_POST['nomre_grupo_empresarial']
     
  );
  Grupo_empresarialDao::modificarGrupo_empresarial($modelgrupo_empresarial);