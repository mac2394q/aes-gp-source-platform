<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(MODEL_PATH."diagnostico_proyecto.php");
  require_once(MODEL_PATH."implementacion_proyecto.php");
  require_once(CONTROLLERS_PATH."trabajoController.php");

  $modelTrabajo= new implementacion_proyecto(null,$_POST['idItem'],$_POST['idProyecto'],strtoupper($_POST['observacion']),$_POST['porcentaje'],null,null,$_POST['colaboracion']);

  // if( trabajoController::ncolaboradoresItem($_POST['idImple']) < 1){
  //   echo "    <div class='alert alert-danger' role='alert'>
  //                 <li class='fa fa-check-circle fa-2x'></li> Actualmente debe seleccionar por lo menos un colaborador para continuar.
  //             </div>";

  // }else{
   if( trabajoController::registrarObservacionImplementacionValidacionFecha($modelTrabajo)){
  echo "    <div class='alert alert-success' role='alert'>
                   <li class='fa fa-check-circle fa-2x'></li> 
                   Observación registrada con éxito &nbsp 
            </div>";
    
   }
   else{
    echo "    <div class='alert alert-danger' role='alert'>
    <li class='fa fa-check-circle fa-2x'></li> 
    Observación No se puede registrar  &nbsp 
  </div>";


   }
  
  ?>