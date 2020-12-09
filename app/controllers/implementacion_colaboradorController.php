<?php
  include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(MODEL_PATH."implementacion_colaborador.php");
  require_once(PDO_PATH."Implementacion_colaboradorDao.php");
class usuarioController
{
  public static function registrarimplementacion_colaborador($modelImplementacion_colaborador){
    return Implementacion_colaboradorDao::registrarimplementacion_colaborador($modelImplementacion_colaborador);
  }
  public static function modificarimplementacion_colaborador($modelImplementacion_colaborador){
    return Implementacion_colaboradorDao::modificarimplementacion_colaborador($modelImplementacion_colaborador);
  }
  public static function implementacion_colaboradorId($modelImplementacion_colaborador){
    return Implementacion_colaboradorDao::implementacion_colaboradorId($modelImplementacion_colaborador);
  }
  public static function listadoimplementacion_colaborador(){
    return Implementacion_colaboradorDao::listadoimplementacion_colaborador();
  }
  public static function ultimaimplementacion_colaboradorRegistrado($modelImplementacion_colaborador){
    return Implementacion_colaboradorDao::ultimaimplementacion_colaboradorRegistrado($modelImplementacion_colaborador);
  }
}
?>
