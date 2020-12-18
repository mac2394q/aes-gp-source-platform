<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(PROVIDERS_PATH."pdo/usuarioDao.php");
  require_once(CONTROLLERS_PATH."empresaController.php");
  require_once(MODEL_PATH."usuario.php");
  
  $modelEmpresa = new usuario(
     $_POST['idempleado'],
     null,
     $_POST['documento'],
     strtoupper($_POST['nombre']),
     $_POST['rol'],
     null,
     null,
     $_POST['telefono'],
     $_POST['direccion'],
     $_POST['correo'],
     $_POST['ciudad'],
     null,
     null
  );
  
    $objEmpresa = usuarioDao::modificarUsuario($modelEmpresa);

    
    echo "<br>

        <div class='alert alert-success' role='alert'>

                <li class='fa fa-check-circle'></li> Modificación Realizada Con Éxito ! &nbsp 

            </div>";   
  
 
?>  