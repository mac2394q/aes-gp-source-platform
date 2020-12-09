<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."empresaController.php");
  require_once(MODEL_PATH."empresa.php");
  require_once(MODEL_PATH."certificado.php");
  $grupo = "NULL";
  if($_POST['grupo'] != "NULL"){$grupo =$_POST['grupo'];}
  
  $modelEmpresa = new empresa(
    $_POST['idempresa'],
    $_POST['pais'],
    $grupo,
    strtoupper($_POST['razonSocial']),
    $_POST['nit'],
    strtoupper($_POST['departamento']),
    strtoupper($_POST['ciudad']),
    strtoupper($_POST['direccion']),
    null,
    $_POST['telefono'],
    $_POST['emailEmpresarial'],
    strtoupper($_POST['representanteLegal']),
    strtoupper($_POST['cargoRepresentante']),
    $_POST['telefonoRepresentante'],
    $_POST['emailContacto'],
    strtoupper($_POST['representanteLegal2']),
    strtoupper($_POST['cargoRepresentante2']),
    $_POST['telefonoRepresentante2'],
    $_POST['emailContacto2'],
    $_POST['link'],
    $_POST['usuario'],
    null,
    null
  );
  //print_r($modelEmpresa);
  
  $objEmpresa = empresaController::modificarEmpresa($modelEmpresa);
  
    echo "<br><div class='alert alert-success' role='alert'>
             <li class='fa fa-check-circle'></li> Modificacion de registro  de empresa exitoso ! &nbsp 
           </div>";
    
    $url =PLATFORM_SERVER."modules/empresa/verFicha.php?id=".$_POST['idempresa']; 
    //empresaController::retornarVista($url);     
  
 
?>  