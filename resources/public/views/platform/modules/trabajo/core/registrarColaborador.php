<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."trabajoController.php");
  require_once(MODEL_PATH."colaborador.php");
//   $entidad = entidadController::obtenerEntidad($_POST['opcionEntidad'],$_POST['entidadTipo']);
  
  $modelTrabajo= new colaborador(null,$_POST['colaborador'],$_POST['cargo'],$_POST['idproyecto']);
  //print_r($modelTrabajo);
   $objTrabajo = trabajoController::registraColaborador($modelTrabajo);
   
  if($objTrabajo == false){
    echo "<div class='alert round bg-danger alert-dismissible mb-2' role='alert'>
              <button   class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>×</span>
              </button>
              El registro del contracto  no pudo ser realizado consulte con su administrador del sistema!
          </div>";
    
  }else{
        echo "  <div class='alert alert-success' role='alert'>
                   <li class='fa fa-check-circle fa-2x'></li> 
                   El contracto  se ha registrado correctamente ! &nbsp 
                </div>
             ";
             $id = $_POST['idproyecto'];
             $url= "listadoColaboradorTabla.php";
             require_once($url);
    }
  ?>  