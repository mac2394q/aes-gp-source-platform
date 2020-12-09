<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."item_grupo_plantilla_alcanceController.php");
  require_once(PROVIDERS_PATH."pdo/Item_grupo_plantilla_alcanceDao.php");
  require_once(MODEL_PATH."item_grupo_plantilla_alcance.php");
   
 
  $modelitem_grupo_plantilla_alcance = new item(
     $_POST['id_item_grupo_plantilla_certificacion'],
     $_POST['id_grupo_plantilla_certificacion'],
     $_POST['etiqueta_item_plantilla'],
     $_POST['descripcion_item_olantilla']
     
  );
  Item_grupo_plantilla_alcanceDao::modificarItem_grupo_plantilla_alcance($modelitem_grupo_plantilla_alcance);