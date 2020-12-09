<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."trabajoController.php");
  require_once(CONTROLLERS_PATH."entidadController.php");
  require_once(CONTROLLERS_PATH."contratoController.php");
  require_once(CONTROLLERS_PATH."proyectoController.php");
  require_once(CONTROLLERS_PATH."empresaController.php");
  require_once(MODEL_PATH."contrato.php");
  require_once(MODEL_PATH."cuota.php");
  require_once(MODEL_PATH."acuerdo_pago.php");
  //print_r($_POST);
  

  $modelAcuerdo = new acuerdo_pago(null,$_POST['idcontrato'],"ACTIVO");
  $objTrabajo = contratoController::registraAcuerdoCuota($modelAcuerdo);
  $id = contratoController::ultimaAcuerdoRegistrado();

  for ($i=1; $i <= intval($_POST['numeroCuota']); $i++) { 

    $modelCuota= new cuota(null,$id,$_POST['numero'.$i],$_POST['monto'.$i],$_POST['porcentaje'.$i],null,null);
    contratoController::registrarCuota($modelCuota);
  }

  $url =PLATFORM_SERVER."modules/trabajo/verFichaAcuerdo.php?id=".$_POST['idtrabajo']."&idcontrato=".$_POST['idcontrato']; 
  empresaController::retornarVista($url); 


  
  ?>  