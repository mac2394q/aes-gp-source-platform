<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."trabajoController.php");
  require_once(CONTROLLERS_PATH."entidadController.php");
  require_once(CONTROLLERS_PATH."contratoController.php");
  require_once(CONTROLLERS_PATH."proyectoController.php");
  require_once(MODEL_PATH."contrato.php");
//   $entidad = entidadController::obtenerEntidad($_POST['opcionEntidad'],$_POST['entidadTipo']);
  
  $modelTrabajo= new contrato(null,$_POST['entidadTipo2'],$_POST['contracto'],$_POST['fecha'],null, $_POST['idtrabajo']);
  //print_r($modelTrabajo);
   $objTrabajo = contratoController::registraContrato($modelTrabajo);
   
  if($objTrabajo == false){
    echo "<div class='alert round bg-danger alert-dismissible mb-2' role='alert'>
              <button   class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>×</span>
              </button>
              El registro del contrato  no pudo ser realizado consulte con su administrador del sistema!
          </div>";
  }else{
        $idcontrato = contratoController::ultimaContratoRegistrado();
        $id = $_POST['idtrabajo'];
        //proyectoController::asignarContractoProyecto($id, $_POST['proyectoId']);
        
        $directorio = DOCUMENTS_PATH."documentos/trabajo/".$id."/".$idcontrato;

        if (!is_dir($directorio )) {
          mkdir($directorio , 0777, true);
        }
        
        if(!empty($_FILES["f1"]) ){
        $temp_archivo = $_FILES["f1"]["tmp_name"];
        $f1=move_uploaded_file($temp_archivo,$directorio."/contracto.pdf");
        }
        if(!empty($_FILES["f2"]) ){
        $temp_archivo = $_FILES["f2"]["tmp_name"];
        $f2=move_uploaded_file($temp_archivo,$directorio."/poliza.pdf");
        }
        if(!empty( $_FILES["f3"]) ){
        $temp_archivo = $_FILES["f3"]["tmp_name"];
        $f3=move_uploaded_file($temp_archivo,$directorio."/confidencialidad.pdf");
      }
        // if (!is_dir($directorio )) {
        //   mkdir($directorio , 0777, true);
        // }
        echo "  <div class='alert alert-success' role='alert'>
                   <li class='fa fa-check-circle fa-2x'></li> 
                   El contrato  se ha registrado correctamente ! &nbsp 
                </div>
             ";
    }
  ?>  