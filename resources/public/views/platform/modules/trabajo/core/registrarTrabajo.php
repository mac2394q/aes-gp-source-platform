<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."trabajoController.php");
  require_once(CONTROLLERS_PATH."entidadController.php");
//   $entidad = entidadController::obtenerEntidad($_POST['opcionEntidad'],$_POST['entidadTipo']);
  
  $modelTrabajo= new trabajo(null,$_POST['entidadTipo'],null,null,null,null,null,null,null,null,null,null,null,null);

  $objTrabajo = trabajoController::registrarTrabajo($modelTrabajo);
  if($objTrabajo == false){
    echo "<div class='alert round bg-danger alert-dismissible mb-2' role='alert'>
              <button   class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>×</span>
              </button>
              El registro del trabajo  no pudoser realizado consulte con su administrador del sistema!
          </div>";
  }else{
        $id = trabajoController::ultimoTrabajo();
        $directorio = DOCUMENTS_PATH."documentos/trabajo/".$id;
        

        if (!is_dir($directorio )) {
          mkdir($directorio , 0777, true);
        }


        echo "  <div class='alert alert-success' role='alert'>
                   <li class='fa fa-check-circle'></li> 
                   El trabajo se ha registrado correctamente ! &nbsp 
                </div>
                <a class='btn btn-info round btn-min-width mr-1 mb-1 waves-effect waves-light' href='".MODULE_APP_SERVER.'trabajo/verFicha.php?id='.$id."'  class='btn btn-gradient-primary text-white'><li class='fa fa-clipboard-list fa-2x'></li> &nbsp; Gestión de proyectos</a>
             ";
    }

  ?>  