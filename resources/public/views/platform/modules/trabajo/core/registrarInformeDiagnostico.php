<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."trabajoController.php");
  require_once(MODEL_PATH."reporteDiagnostico.php");
//   $entidad = entidadController::obtenerEntidad($_POST['opcionEntidad'],$_POST['entidadTipo']);
  
  $modelTrabajo= new reporteDiagnostico($_POST['idproyecto'],$_POST['actividades'],$_POST['aspectos'],$_POST['hallasgoz'],$_POST['conclusiones']);
  //print_r($modelTrabajo);
  $objTrabajo = trabajoController::registraInforme($modelTrabajo);
   

        echo "  <div class='alert alert-success' role='alert'>
                   <li class='fa fa-check-circle fa-2x'></li> 
                   El informe se ha registrado correctamente ! &nbsp 
                </div>
             ";
    
  ?>  