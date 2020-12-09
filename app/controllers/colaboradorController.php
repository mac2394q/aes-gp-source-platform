<?php
  include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(MODEL_PATH."colaborador.php");
  require_once(PDO_PATH."colaboradorDao.php");
class usuarioController
{
  public static function registraColaborador($modelColaborador){
    return colaboradorDao::registrarColaborador($modelColaborador);
  }
  public static function modificaColaborador($modelColaborador){
    return colaboradorDao::modificarColaborador($modelColaborador);
  }
  public static function ColaboradorId($modelColaborador){
    return colaboradorDao::ColaboradorId($modelColaborador);
  }
  public static function listadoColaborador(){
    return colaboradorDao::listadoColaborador();
  }
  public static function ultimaColaboradorRegistrado($modelColaborador){
    return colaboradorDao::ultimaColaboradorRegistrado($modelColaborador);
  }
}
?>
