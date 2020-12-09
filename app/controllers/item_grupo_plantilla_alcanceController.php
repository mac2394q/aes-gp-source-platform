<?php
  include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(MODEL_PATH."item_grupo_plantilla_alcance.php");
  require_once(PDO_PATH."Item_grupo_plantilla_alcanceDao.php");
class usuarioController
{
  public static function registraritem_grupo_plantilla_alcance($modelItem_grupo_plantilla_alcance){
    return Item_grupo_plantilla_alcanceDao::registraritem_grupo_plantilla_alcance($modelItem_grupo_plantilla_alcance);
  }
  public static function modificaritem_grupo_plantilla_alcance($modelItem_grupo_plantilla_alcance){
    return Item_grupo_plantilla_alcanceDao::modificaritem_grupo_plantilla_alcance($modelItem_grupo_plantilla_alcance);
  }
  public static function item_grupo_plantilla_alcanceId($modelItem_grupo_plantilla_alcance){
    return Item_grupo_plantilla_alcanceDao::item_grupo_plantilla_alcanceId($modelItem_grupo_plantilla_alcance);
  }
  public static function listadoitem_grupo_plantilla_alcance(){
    return Item_grupo_plantilla_alcanceDao::listadoitem_grupo_plantilla_alcance();
  }
  public static function ultimaitem_grupo_plantilla_alcanceRegistrado($modelItem_grupo_plantilla_alcance){
    return Item_grupo_plantilla_alcanceDao::ultimaitem_grupo_plantilla_alcanceRegistrado($modelItem_grupo_plantilla_alcance);
  }
}
?>
