<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."empresaController.php");
  require_once(MODEL_PATH."empresa.php");



  
  $objEmpresa = empresaController::autenticacionEmpresa($_POST['usuario'],$_POST['clave'],$_POST['idusuario']);
  
    echo "<br><div class='alert alert-success' role='alert'>
             <li class='fa fa-check-circle'></li> Modificacion de registro de autenticacion de empresa exitoso ! &nbsp 
           </div>";
    
    $url =PLATFORM_SERVER."modules/empresa/autentificacionEmpresa.php?id=".$_POST['idempresa']; 
    empresaController::retornarVista($url);     
  

 
?>  