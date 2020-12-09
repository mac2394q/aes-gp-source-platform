<?php
  include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(MODEL_PATH."grupo_empresarial.php");
  require_once(PDO_PATH."Grupo_empresarialDao.php");
class usuarioController
{
  public static function registrargrupo_empresarial($modelGrupo_empresarial){
    return Grupo_empresarialDao::registrargrupo_empresarial($modelGrupo_empresarial);
  }
  public static function modificargrupo_empresarial($modelGrupo_empresarial){
    return Grupo_empresarialDao::modificarGrupo_empresarial($modelGrupo_empresarial);
  }
  public static function grupo_empresarialId($modelGrupo_empresarial){
    return Grupo_empresarialDao::Grupo_empresarialId($modelGrupo_empresarial);
  }
  public static function listadogrupo_empresarial(){
    return Grupo_empresarialDao::listadoGrupo_empresarial();
  }
  public static function ultimagrupo_empresarialRegistrado($modelGrupo_empresarial){
    return Grupo_empresarialDao::ultimaGrupo_empresarialRegistrado($modelGrupo_empresarial);
  }
}
?>
