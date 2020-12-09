<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once (PLATFORM_PATH."global/inc/platform/head.php");
require_once (CONTROLLERS_PATH."trabajoController.php");
require_once (CONTROLLERS_PATH."empresaController.php");

$fechaSolicitud = strtotime(date($_POST['fechaSolicitud']));
$fechavisita = strtotime(date($_POST['fechavisita']));
//echo $_POST['fechaSolicitud']." fs ".$fechaSolicitud." --- ".$_POST['fechavisita']." fv ".$fechavisita;
    trabajoController::dian($_POST['fechaSolicitud'],$_POST['fechavisita'],$_POST['idtrabajo']);
    $url =PLATFORM_SERVER."modules/trabajo/verFicha.php?id=".$_POST['idtrabajo']; 
    echo "  <div class='alert alert-success' role='alert'>
                <li class='fa fa-check-circle fa-2x'></li> Inscripción de DIAN Realizada  Correctamente &nbsp 
            </div>";
// if( $fechaSolicitud != 0 && $fechaSolicitud != 6049601276400 && ($fechavisita == 0 || $fechavisita == 6049601276400  ) ){
//     trabajoController::dian($_POST['fechaSolicitud'],$_POST['fechavisita'],$_POST['idtrabajo']);
//     $url =PLATFORM_SERVER."modules/trabajo/verFicha.php?id=".$_POST['idtrabajo']; 
//     echo "  <div class='alert alert-success' role='alert'>
//                 <li class='fa fa-check-circle fa-2x'></li> Inscripcion de Dian Realizada  Correctamente &nbsp 
//             </div>";
// }elseif( $fechaSolicitud != 0 && $fechaSolicitud != 6049601276400 && ($fechavisita != 0 || $fechavisita != 6049601276400 ) ){
//     if($fechaSolicitud < $fechavisita){
//         trabajoController::dian($_POST['fechaSolicitud'],$_POST['fechavisita'],$_POST['idtrabajo']);
//         $url =PLATFORM_SERVER."modules/trabajo/verFicha.php?id=".$_POST['idtrabajo']; 
//         echo "  <div class='alert alert-success' role='alert'>
//                     <li class='fa fa-check-circle fa-2x'></li> Registro de Fecha Visita DIAN Realizada  Correctamente &nbsp 
//                 </div>";
//     }else{
//         echo "  <div class='alert alert-danger' role='alert'>
//                      <li class='fa fa-check-circle fa-2x'></li> La fecha de visita de la Dian debe ser menor a la fecha de inscripción
//                 </div>";
//     }
// }else{
//     echo "  <div class='alert alert-danger' role='alert'>
//                 <li class='fa fa-check-circle fa-2x'></li> Debe seleccionar correctamente las fecha.
//             </div>";
// }




// empresaController::retornarVista($url); 