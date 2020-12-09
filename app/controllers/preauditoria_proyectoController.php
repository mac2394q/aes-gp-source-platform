<?php
  include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(MODEL_PATH."proyecto.php");
  require_once(PDO_PATH."preauditoria_Preauditoria_proyectoDao.php");
class usuarioController
{
  public static function registrarPreauditoria_proyecto($modelPreauditoria_proyecto){
    return preauditoria_proyectoDao::registrarPrreauditoria_proyecto($modelPreauditoria_proyecto);
  }
  public static function modificarPreauditorio_proyecto($modelPreauditoria_proyecto){
    return preauditoria_proyectoDao::modificarPreauditorio_proyecto($modelPreauditoria_proyecto);
  }
  public static function Preauditorio_proyectoId($modelPreauditoria_proyecto){
    return preauditoria_proyectoDao::Preuaditorio_proyectoId($modelPreauditoria_proyecto);
  }
  public static function listadoPreauditorio_proyecto(){
    return preauditoria_proyectoDao::listadoPreauditorio_proyecto();
  }
  public static function ultimaPrpreaudtorio_proyectoRegistrado($modelPreauditoria_proyecto){
    return preauditoria_proyectoDao::ultimaPreauditorio_proyectoRegistrado($modelPreauditoria_proyecto);
  }
}
?>
