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

  
  $modelCuota= new cuota($_POST['idcuota'],null,null,null,null,$_POST['estado'],$_POST['observacion']);
  
  //print_r($modelTrabajo);
  $objTrabajo = contratoController::modificarCuota($modelCuota);
  // if($objTrabajo == false){
  //   echo "<div class='alert round bg-danger alert-dismissible mb-2' role='alert'>
  //             <button   class='close' data-dismiss='alert' aria-label='Close'>
  //                 <span aria-hidden='true'>×</span>
  //             </button>
  //             El registro del contracto  no pudo ser realizado consulte con su administrador del sistema!
  //         </div>";
  // }else{
  //       echo "  <div class='alert alert-success' role='alert'>
  //                  <li class='fa fa-check-circle'></li> 
  //                  El contracto  se ha registrado correctamente ! &nbsp 
  //               </div>
  //            ";
  //   }

    $url =PLATFORM_SERVER."modules/trabajo/verFichaAcuerdo.php?id=".$_POST['idtrabajo']."&idcontrato=".$_POST['idcontrato']; 
    empresaController::retornarVista($url); 

  ?>  