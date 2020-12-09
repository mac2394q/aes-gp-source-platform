<?php
  include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(MODEL_PATH."cuota.php");
  require_once(PDO_PATH."cuotaDao.php");
class usuarioController
{
  public static function registraCuota($modelCuota){
    return cuotaDao::registrarCuota($modelCuota);
  }
  public static function modificaCuota($modelCuota){
    return cuotaDao::modificarCuota($modelCuota);
  }
  public static function CuotaId($modelCuota){
    return cuotaDao::CuotaId($modelCuota);
  }
  public static function listadoCuota(){
    return cuotaDao::listadoCuota();
  }
  public static function ultimaCuotaRegistrado($modelCuota){
    return cuotaDao::ultimaCuotaRegistrado($modelCuota);
  }
}
?>
