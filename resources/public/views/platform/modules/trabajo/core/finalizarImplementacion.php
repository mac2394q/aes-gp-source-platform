<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');

require_once (PLATFORM_PATH."global/inc/platform/head.php");



require_once (CONTROLLERS_PATH."trabajoController.php");

require_once (CONTROLLERS_PATH."empresaController.php");


$objTrabajo = trabajoController::trabajoId($_GET['idtrabajo']);
$objProyecto = trabajoController::proyectoObj($_POST['idproyecto']);


if(  is_null($objProyecto['fechaFinImplementacion']) == true  ){

$datos=trabajoController::finalizarDiagnosticoImplementacion($_POST['idproyecto']);

if(count($datos) > 0){
    echo "  <div class='alert alert-danger parrafo' role='alert'>
                 Actualmente hay  requisitos sin terminar. <br><br>";
       foreach ($datos as $key => $value) {
          echo "Requisito: " . $datos[$key]['etiqueta'] ;
          echo"<br>";
       }
           echo "</div>";

}//elseif (intval($obj) == 1) {
elseif (trabajoController::estado_proyecto($_POST['idproyecto']) >= 80) {
echo "  <div class='alert alert-success parrafo' role='alert'>

            <h3 class='parrafo text-white'>Validado con el 80% o mas de los requisitos </h3>

        </div>";

        $objProyecto=trabajoController::proyectoId($_POST['idproyecto']);

        $objPlantilla=plantillaController::plantillaId($objProyecto->getId_plantilla_alcance_proyecto());

        $objtGruposPlantilla = plantillaController::GrupoPlantillaListado($objPlantilla->getId_plantilla_alcance());

        foreach ($objtGruposPlantilla as $key => $value) {

            $objRequisito = plantillaController::grupoPlantillaItemListado($objtGruposPlantilla[$key]->getId_grupo_plantilla_alcance());

            foreach ($objRequisito as $key => $value) {

                $modelTrabajo = new preauditoria_proyecto(null,$objRequisito[$key]->getId_item_grupo_plantilla_certificacion(),$_POST['idproyecto'],"","init");

                trabajoController::registrarObservacionPre($modelTrabajo);

            }

        }

        trabajoController::finalizarImplementacion($_POST['idproyecto']);

}else{

echo "  <div class='alert alert-danger' role='alert'>

            <li class='fa fa-check-circle fa-2x'></li> No se cumple con el porcentaje minimo.  &nbsp 

        </div>";

}

}else{

    echo "  <div class='alert alert-danger' role='alert'>

            <li class='fa fa-check-circle fa-2x'></li> Se  finalizo el proceso de implementación.

        </div>";

}

