<?php

  include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');

  require_once(MODEL_PATH."entidad.php");

  require_once(PDO_PATH."entidadDao.php");

class entidadController

{

  public static function registrarEntidad($modelEntidad){

    return entidadDao::registrarEntidad($modelEntidad);

  }

  public static function modificarEntidad($modelEntidad){

    return EntidadDao::modificarEntidad($modelEntidad);

  }

  public static function entidadId($modelEntidad){

    return entidadDao::entidadId($modelEntidad);

  }

  public static function listadoEntidad(){

    return entidadDao::listadoEntidad();

  }

  public static function ultimaEntidadRegistrado($modelEntidad){

    return entidadDao::ultimaEntidadRegistrado($modelEntidad);

  }

  public static function obtenerEntidad($entidad){

    return entidadDao::obtenerEntidad($entidad);

  }


  

}

?>

