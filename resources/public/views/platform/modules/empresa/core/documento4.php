<?php
header("Access-Control-Allow-Origin: *");
/* Ruta del archivo de configuracion principal*/
require_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once (CONTROLLERS_PATH."empresaController.php");
$idempresa=$_POST['idempresa'];
$directorio=DOCUMENTS_PATH."documentos/empresa/".$idempresa;
if(!is_dir($directorio)){ if(!mkdir($directorio, 0755,true)) {die('Fallo al crear las carpetas...'); }}
  $temp_archivo = $_FILES["s4"]["tmp_name"];
  $f1=move_uploaded_file($temp_archivo,$directorio . "/comercial.pdf");
  //echo "status ".$f1;
  echo "<div class='alert alert-success' role='alert'>
						 <li class='fa fa-check-circle'></li> Subida de archivo (Rerefencial comercial) exitoso &nbsp 
				</div>";
  // $url =PLATFORM_SERVER."modules/empresa/verFicha.php?id=".$_POST['idempresa']; 
  // empresaController::retornarVista($url);     
  sleep(2);
  empresaController::retornarVista($_SERVER['HTTP_REFERER']);   
    

    

?>