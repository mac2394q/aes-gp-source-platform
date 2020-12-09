<?php
  include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(MODEL_PATH."empresa_proyecto.php");
  require_once(PDO_PATH."empresa_proyectoDao.php");
class usuarioController
{
  public static function registrarEmpresa_proyecto($modelEmpresa_proyecto){
    return Empresa_proyectoDao::registrarEmpresa_proyecto($modelEmpresa_proyecto);
  }
  public static function modificarEmpresa_proyecto($modelEmpresa_proyecto){
    return Empresa_proyectoDao::modificarEmpresa_proyecto($modelEmpresa_proyecto);
  }
  public static function Empresa_proyectoId($modelEmpresa_proyecto){
    return Empresa_proyectoDao::Empresa_proyectoId($modelEmpresa_proyecto);
  }
  public static function listadoEmpresa_proyecto(){
    return Empresa_proyectoDao::listadoEmpresa_proyecto();
  }
  public static function ultimaEmpresa_proyectoRegistrado($modelEmpresa_proyecto){
    return Empresa_proyectoDao::ultimaEmpresa_proyectoRegistrado($modelEmpresa_proyecto);
  }
}
?>
