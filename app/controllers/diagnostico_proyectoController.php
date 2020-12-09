<?php
  include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(MODEL_PATH."diagnostico_proyecto.php");
  require_once(PDO_PATH."diagnostico_proyectoDao.php");
class usuarioController
{
  public static function registrarDiagnostico_proyecto($modelDiagnostico_proyecto){
    return diagnostico_proyectoDao::registrarDiganostico_proyecto($modelDiagnostico_proyecto);
  }
  public static function modificarDiagnostico_proyecto($modelDiagnostico_proyecto){
    return diagnostico_proyectoDao::modificarDiagnostico_proyecto($modelDiagnostico_proyecto);
  }
  public static function Diagnostico_proyectoId($modelDiagnostico_proyecto){
    return diagnostico_proyectoDao::Diagnostico_proyectoId($modelDiagnostico_proyecto);
  }
  public static function listadoDiagnostico_proyecto(){
    return diagnostico_proyectoDao::listadoDiagnostico_proyecto();
  }
  public static function ultimaDiagnostico_proyectoRegistrado($modelDiagnostico_proyecto){
    return diagnostico_proyectoDao::ultimaDiagnostico_proyectoRegistrado($modelDiagnostico_proyecto);
  }
}
?>
