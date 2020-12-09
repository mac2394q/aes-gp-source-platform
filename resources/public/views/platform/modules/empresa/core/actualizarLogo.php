<?php
header("Access-Control-Allow-Origin: *");
/* Ruta del archivo de configuracion principal*/
require_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once (CONTROLLERS_PATH."empresaController.php");
$idempresa=$_POST['idempresa'];
$directorio=DOCUMENTS_PATH."fotosPerfil/".$idempresa;

  $temp_archivo = $_FILES["files"]["tmp_name"];
  $f1=move_uploaded_file($temp_archivo,$directorio . "/".$idempresa.".jpg");
  //echo $f1;

  $url =PLATFORM_SERVER."modules/empresa/verFicha.php?id=".$_POST['idempresa']; 
  empresaController::retornarVista($url);     

    

    

?>