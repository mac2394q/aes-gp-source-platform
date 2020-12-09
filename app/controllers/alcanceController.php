<?php
  include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(MODEL_PATH."alcance.php");
  require_once(PDO_PATH."alcanceDao.php");
class alcanceController
{
  public static function registrarAlcance($modelAlcance){
    return alcanceDao::registrarAlcance($modelAlcance);
  }
  public static function modificarAlcance($modelAlcance){
    return alcanceDao::modificarAlcance($modelAlcance);
  }
  public static function AlcanceId($idAlcance){
    return alcanceDao::AlcanceId($idAlcance);
  }
  public static function listadoAlcanceSelect(){
    $objAlcance = alcanceDao::listadoAlcance();

    if($objAlcance != false){
      echo "  <label for=''><h5 class='card-title titulo'><li class='fa fa-clipboard-list'></li> <span class='text-danger'>*</span> Alcances:</h5></label>
              <select id='area' name='area' class='form-control parrafo'>
              <option value='null'>Elegir alcance </option>";
      foreach ($objAlcance as $key => $value) {
          echo    "<option class='parrafo' value='".$objAlcance[$key]->getId_alcance()."'>
          ".$objAlcance[$key]->getNombre_alcance()."/".$objAlcance[$key]->getEstado_alcance()." </option>";
      }
      echo     "</select>";
  }else{
      echo "  <label for=''>Alcances:</label>
              <select id='area' name='area' class='form-control'>
                  <option value='null'>SIN Alcances</option>
              </select>";
  }
  }


  public static function select_area_listado($alcance){
    $objAlcance = alcanceDao::listadoAlcance();
    $objAlcancePlantilla=alcanceDao::alcanceIdNombre($alcance);

    if($objAlcance != false){
      echo "  <label for=''><h5 class='card-title titulo'><li class='fa fa-clipboard-list'></li> Modificar Alcance</h5></label>
              <select id='area' name='area' class='form-control parrafo'>
              <option value='".$objAlcancePlantilla->getId_alcance()."'>".$objAlcancePlantilla->getNombre_alcance()."</option>";
      foreach ($objAlcance as $key => $value) {
          echo    "<option class='parrafo' value='".$objAlcance[$key]->getId_alcance()."'>
          ".$objAlcance[$key]->getNombre_alcance()." </option>";
      }
      echo     "</select>";
      
    }else{
      echo "  <label for=''>Area tecnica:</label>
              <select id='area' name='area' class='form-control'>
                  <option value='null'>SIN AREAS TECNICAS</option>
              </select>";
    }
  }


  public static function ultimaAlcanceRegistrado($modelAlcance){
    return alcanceDao::ultimaAlcancceRegistrado($modelAlcance);
  }
}
