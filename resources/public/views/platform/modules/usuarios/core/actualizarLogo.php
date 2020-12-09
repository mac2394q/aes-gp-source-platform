<?php
header("Access-Control-Allow-Origin: *");
/* Ruta del archivo de configuracion principal*/
require_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once (CONTROLLERS_PATH."empresaController.php");
$idempresa=$_POST['idempleado'];
$directorio=DOCUMENTS_PATH."fotosPerfilEmpleados/".$idempresa;

  if(!is_dir($directorio)){
    if(!mkdir($directorio,0777,true)){die("Fallo al crear la carpeta . . .");}
  }
  $temp_archivo = $_FILES["files"]["tmp_name"];
  $f1=move_uploaded_file($temp_archivo,$directorio . "/".$idempresa.".jpg");
  //echo $f1;

  $url =PLATFORM_SERVER."modules/usuarios/verFicha.php?id=".$_POST['idempleado']; 
  empresaController::retornarVista($url);     

    

    

?>