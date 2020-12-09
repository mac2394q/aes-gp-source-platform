<?php
  include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(MODEL_PATH."acuerdo_pago.php");
  require_once(PDO_PATH."acuerdo_pagoDao.php");
class usuarioController
{
  public static function registraAcuerdo_pago($modelAcuerdo_pago){
    return acuerdo_pagoDao::registrarAcuerdo_pago($modelAcuerdo_pago);
  }
  public static function modificaAlcaance($modelAcuerdo_pago){
    return acuerdo_pagoDao::modificarAcuerdo_pago($modelAcuerdo_pago);
  }
  public static function Acuerdo_pagoId($modelAcuerdo_pago){
    return acuerdo_pagoDao::Acuerdo_pagoId($modelAcuerdo_pago);
  }
  public static function listadoAcuerdo_pago(){
    return acuerdo_pagoDao::listadoAcuerdo_pago();
  }
  public static function ultimaAcuerdo_pagoRegistrado($idAcuerdo){
    return acuerdo_pagoDao::ultimaAlcancceRegistrado($idAcuerdo);
  }
}
?>
