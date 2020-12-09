<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once (PLATFORM_PATH."global/inc/platform/head.php");
require_once (CONTROLLERS_PATH."trabajoController.php");
require_once (CONTROLLERS_PATH."empresaController.php");
$objTrabajo = trabajoController::trabajoId($_GET['idtrabajo']);
$objProyecto = trabajoController::proyectoObj($_POST['idproyecto']);

if(  is_null($objProyecto['fechaFinDiagnostico']) == true  ){

$datos=trabajoController::finalizarDiagnosticoActual($_POST['idproyecto']);
if(count($datos) > 0){
    echo "  <div class='alert alert-danger parrafo' role='alert'>
                 Actualmente hay  requisitos sin terminar. <br><br>";
       foreach ($datos as $key => $value) {
          echo "Requisito: " . $datos[$key]['etiqueta'] ;
          echo"<br>";
       }
           echo "</div>";
}else{
    //trabajoController::finalizarDiagnostico($_POST['idtrabajo']);
    echo "  <div class='alert alert-success' role='alert'>
                <li class='fa fa-check-circle fa-2x'></li> Fase de Diagnóstico Finalizado &nbsp 
            </div>";
    trabajoController::finalizarDiagnostico($_POST['idproyecto']);
    
    $objProyecto=trabajoController::proyectoId($_POST['idproyecto']);
    ///print_r($objProyecto);
    $objPlantilla=plantillaController::plantillaId($objProyecto->getId_plantilla_alcance_proyecto());
    //print_r($objPlantilla);
    $objtGruposPlantilla = plantillaController::GrupoPlantillaListado($objPlantilla->getId_plantilla_alcance());
    //print_r($objtGruposPlantilla);
    foreach ($objtGruposPlantilla as $key => $value) {
      $objRequisito = plantillaController::grupoPlantillaItemListado($objtGruposPlantilla[$key]->getId_grupo_plantilla_alcance());
      
      foreach ($objRequisito as $key => $value) {
         // echo "cumple y no aplica<br>";
         $objObservacion = trabajoController::observacionRequisito($_POST['idproyecto'],$objRequisito[$key]->getId_item_grupo_plantilla_certificacion());
         // echo"tiene una observacion <br>";
         // print_r($objObservacion);
         // echo "<br><br>";
         if($objObservacion->getEstado_diagnostico() == "CUMPLE" || $objObservacion->getEstado_diagnostico() == "NO APLICA" ){
            $modelTrabajo = new implementacion_proyecto(null,$objRequisito[$key]->getId_item_grupo_plantilla_certificacion(),$_POST['idproyecto'],$objObservacion->getComentario_diagnostico(),100,null,$objObservacion->getEstado_diagnostico(),'');
            trabajoController::registrarObservacionImplementacion2($modelTrabajo);
         }else{
            // echo "no cumple<br>";
            // echo"no tiene una observacion <br>";
            $modelTrabajo = new implementacion_proyecto(null,$objRequisito[$key]->getId_item_grupo_plantilla_certificacion(),$_POST['idproyecto'],$objObservacion->getComentario_diagnostico(),0,null,$objObservacion->getEstado_diagnostico(),'');
            trabajoController::registrarObservacionImplementacion2($modelTrabajo);
         }
      }
    }
}
//sleep(2);
//print_r($obj);
$url =PLATFORM_SERVER."modules/trabajo/gestionProyecto.php?id=".$_POST['idtrabajo']; 
//empresaController::retornarVista($url); 
}else{
   echo "  <div class='alert alert-danger parrafo' role='alert'>
               Actualmente ya se finalizo este proceso
            </div>";
}