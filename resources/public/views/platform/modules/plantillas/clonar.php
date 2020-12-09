<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."empresaController.php");
  require_once(CONTROLLERS_PATH."auditoriasController.php");
  require_once(CONTROLLERS_PATH."plantillaController.php");
  
  require_once(PDO_PATH."plantilla_alcanceDao.php");
  $id=$_POST['id'];
  
  $objPlantillaBase = plantilla_alcanceDao::plantillaId2($id);
  $objPlantillaBase->setEtiqueta_plantilla($objPlantillaBase->getEtiqueta_plantilla()." - Copia Plantilla-");
  plantilla_alcanceDao::registrarPlantilla($objPlantillaBase);
  $arrayCapitulos = null;
  $idplantillaNueva = plantilla_alcanceDao::ultimaPlantilla();
  //echo $idplantillaNueva;
  $ArraygrupoPlantilla = plantilla_alcanceDao::listadoGrupoPlantilla($id);
  //print_r( $ArraygrupoPlantilla);
  foreach ($ArraygrupoPlantilla as $key => $value) {
     
      $ArraygrupoPlantilla[$key]->setId_plantilla_alcance($idplantillaNueva);
      plantilla_alcanceDao::registrarPlantillaGrupo2($ArraygrupoPlantilla[$key]);
      $idgrupoPlantillaNuevo=plantilla_alcanceDao::ultimaPlantillaGrupo();
      $arrayCapitulos =  plantilla_alcanceDao::listadoGrupoPlantillaItem($ArraygrupoPlantilla[$key]->getId_grupo_plantilla_alcance());
      foreach ($arrayCapitulos as $key => $value) {
        $objCapitulos =  plantilla_alcanceDao::itemId($arrayCapitulos[$key]->getId_item_grupo_plantilla_certificacion());
        $arrayCapitulos[$key]->setId_grupo_plantilla_certificacion($idgrupoPlantillaNuevo);
        plantilla_alcanceDao::registrarPlantillaItem2($arrayCapitulos[$key]);
      }
  }
  $url="verFicha.php?id=".$idplantillaNueva;
  empresaController::retornarVista($url);
?>