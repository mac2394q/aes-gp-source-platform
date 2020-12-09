<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/conf.php');
require_once(MODEL_PATH . "trabajo.php");
require_once(PDO_PATH . "trabajoDao.php");
require_once(PDO_PATH . "plantilla_alcanceDao.php");
require_once(PDO_PATH . "alcanceDao.php");
require_once(PDO_PATH . "empresaDao.php");
require_once(PDO_PATH . "proyectoDao.php");
require_once(PDO_PATH . "diagnostico_proyectoDao.php");
require_once(CONTROLLERS_PATH . "entidadController.php");
require_once(CONTROLLERS_PATH . "plantillaController.php");
require_once(CONTROLLERS_PATH . "grupoController.php");
require_once(CONTROLLERS_PATH . "trabajoController.php");
require_once(CONTROLLERS_PATH . "empresaController.php");
require_once(MODEL_PATH."diagnostico_proyecto.php");


$objProyecto=trabajoController::proyectoId($_GET['idproyecto']);
    ///print_r($objProyecto);
    $objPlantilla=plantillaController::plantillaId($objProyecto->getId_plantilla_alcance_proyecto());
    //print_r($objPlantilla);
    $objtGruposPlantilla = plantillaController::GrupoPlantillaListado($objPlantilla->getId_plantilla_alcance());
    //print_r($objtGruposPlantilla);

    foreach ($objtGruposPlantilla as $key => $value) {
      $objRequisito = plantillaController::grupoPlantillaItemListado($objtGruposPlantilla[$key]->getId_grupo_plantilla_alcance());
      //print_r($objRequisito);

     foreach ($objRequisito as $key => $value) {
         //$objRequisito[$key]->getId_item_grupo_plantilla_certificacion()
         $modelTrabajo= new diagnostico_proyecto(null,$_GET['idproyecto'],$objRequisito[$key]->getId_item_grupo_plantilla_certificacion(),"","0");
         //print_r($modelTrabajo);
         trabajoController::registrarObservacionDiagnostico($modelTrabajo);
     }
    }
    
    trabajoController::iniciarDiagnostico($_GET['idproyecto']);
    //faseDiagnostico.php?idproyecto=".$objEmpresa[$key]->getId_proyecto()."&id=".$idtrabajo."
    $url =PLATFORM_SERVER."modules/trabajo/faseDiagnostico.php?idproyecto=".$_GET['idproyecto']."&id=".$_GET['id']; 
    //echo $url;
    empresaController::retornarVista($url); 

?>