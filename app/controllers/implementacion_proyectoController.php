<?php
  include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(MODEL_PATH."implementacion_proyecto.php");
  require_once(PDO_PATH."implementacion_proyectoDao.php");
class usuarioController
{
  public static function registrarimplementacion_proyecto($modelimplementacion_proyecto){
    return implementacion_proyectoDao::registrarimplementacion_proyecto($modelimplementacion_proyecto);
  }
  public static function modificarimplementacion_proyecto($modelimplementacion_proyecto){
    return implementacion_proyectoDao::modificarimplementacion_proyecto($modelimplementacion_proyecto);
  }
  public static function implementacion_proyectoId($modelimplementacion_proyecto){
    return implementacion_proyectoDao::implementacion_proyectoId($modelimplementacion_proyecto);
  }
  public static function listadoimplementacion_proyecto(){
    return implementacion_proyectoDao::listadoimplementacion_proyecto();
  }
  public static function ultimaimplementacion_proyectoRegistrado($modelimplementacion_proyecto){
    return implementacion_proyectoDao::ultimaimplementacion_proyectoRegistrado($modelimplementacion_proyecto);
  }
}
?>
