<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once (PLATFORM_PATH."global/inc/platform/head.php");

require_once (CONTROLLERS_PATH."proyectoController.php");
require_once (CONTROLLERS_PATH."empresaController.php");
$objProyecto=proyectoController::ProyectoId($_GET['idproyecto']);
echo proyectoController::eliminarProyecto($_GET['idproyecto']);
// echo "  <div class='alert round bg-success alert-dismissible mb-2' role='alert'>
//                         <button   class='close' data-dismiss='alert' aria-label='Close'>
//                             <span aria-hidden='true'>×</span>
//                         </button>
//                         Proyecto eliminado con exito
//         </div>";
        // sleep(2);
        $url =PLATFORM_SERVER."modules/trabajo/gestionProyecto.php?id=".$objProyecto->getId_trabajo_proyecto(); 
       // echo $url;
        empresaController::retornarVista($url); 
?>