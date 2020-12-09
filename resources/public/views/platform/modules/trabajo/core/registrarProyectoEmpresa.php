<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."trabajoController.php");
  require_once(CONTROLLERS_PATH."proyectoController.php");
  require_once(CONTROLLERS_PATH."entidadController.php");
  require_once(CONTROLLERS_PATH."empresaController.php");

  require_once(MODEL_PATH."empresa_proyecto.php");
//   $entidad = entidadController::obtenerEntidad($_POST['opcionEntidad'],$_POST['entidadTipo']);
  
  $modelTrabajo= new empresa_proyecto(null,$_POST['grupo'],$_POST['proyectoId'],null,null);
  //echo proyectoController::verificarProyectoPlantilla($_POST['idtrabajo'],$_POST['entidadTipo']);
  if(proyectoController::verificarProyectoEmpresa($_POST['grupo'],$_POST['proyectoId'])  > 0){
    echo "  <div class='alert alert-success' role='alert'>
    <li class='fa fa-ban fa-2x'></li> 
    Este proyecto ya ha sido asignado a la empresa ! &nbsp 
 </div>
";

  
  }else{
   

    if(proyectoController::registrarEmpresa_proyecto($modelTrabajo) == false){
      echo "<div class='alert round bg-danger alert-dismissible mb-2' role='alert'>
                        <button   class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>×</span>
                        </button>
                        El registro del proyecto - Empresa  no pudo ser realizado consulte con su administrador del sistema!
                    </div>";
    }else{
      $url =PLATFORM_SERVER."modules/trabajo/alcanceProyectos.php?id=".$_POST['idtrabajo']; 
      empresaController::retornarVista($url); 
      // echo "  <div class='alert alert-success' role='alert'>
      //                        <li class='fa fa-check-circle'></li> 
      //                        El proyecto se ha registrado correctamente ! &nbsp 
      //                     </div>
      //                  ";
    }


  }
