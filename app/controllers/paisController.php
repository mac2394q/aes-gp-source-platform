<?php
  include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(MODEL_PATH."pais.php");
  require_once(PDO_PATH."paisDao.php");
class paisController
{
  public static function registrarPais($modelPais){
    return paisDao::registrarPais($modelPais);
  }
  public static function modificarPais($modelPais){
    return paisDao::modificarPais($modelPais);
  }
  public static function PaisId($modelPais){
    return paisDao::PaisId($modelPais);
  }
  public static function listadoPaisSelect($name){
    $objPais = paisDao::listadoPais();
      if($objPais != false){
        echo "  <label for=''><h5 class='card-title'><li class='fa fa-warehouse'></li> <span class='text-danger'>*</span>País</h5></label>
                <select id='".$name."' name='".$name."' class='form-control' title=''>
                <option value='null'>Elegir País</option>";                
        foreach ($objPais as $key => $value) {     
            echo    "<option value='".$objPais[$key]->getId_pais()."'>
            ".$objPais[$key]->getNombre_pais()." </option>";
        }
        echo     "</select>";
    }else{
        echo "  <label for=''>Pais:</label>
                <select id='plantilla' name='plantilla' class='form-control'>
                    <option value='null'>SIN PAISES</option>
                </select>";
    }
  }


  public static function listadoPaisSelectId($name,$idpais){
    $objPais = paisDao::listadoPais();
    $myPais = paisDao::paisId($idpais);
      if($objPais != false){
        echo "  <label for=''><h5 class='card-title'><li class='fa fa-warehouse'></li> <span class='text-danger'>*</span>País</h5></label>
                <select id='".$name."' name='".$name."' class='form-control' title=''>
                <option value='".$myPais->getId_pais()."'>".$myPais->getNombre_pais()."</option>";                
        foreach ($objPais as $key => $value) {     
            echo    "<option value='".$objPais[$key]->getId_pais()."'>
            ".$objPais[$key]->getNombre_pais()." </option>";
        }
        echo     "</select>";
    }else{
        echo "  <label for=''>Pais:</label>
                <select id='plantilla' name='plantilla' class='form-control'>
                    <option value='null'>SIN PAISES</option>
                </select>";
    }
  }



 
}
?>
