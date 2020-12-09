<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."usuarioController.php");
  $objEmpresa = usuarioController::autenticacion($_POST['usuario'],$_POST['clave'],$_POST['idempleado']);
  
  if($objEmpresa){
    echo "<div class='alert round bg-success alert-dismissible mb-2' role='alert'>
            <button   class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>×</span>
            </button>
            <strong>Actualizacion exitosa!</strong> 
        </div>";
  }else{
    echo "<div class='alert round bg-danger alert-dismissible mb-2' role='alert'>
                <button   class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>×</span>
                </button>
                <strong>Actualizacion Fallo!</strong> 
            </div>";
  }
    
     sleep(2);
     
      
  
 
?>  