<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
$id=$_POST['idtrabajo'];
$directorio=DOCUMENTS_PATH."documentos/trabajo/".$id."/"."implementacion/".$_POST['idproyecto']."/";
if (!is_dir($directorio )) {
  mkdir($directorio , 0777, true);
}
$directorio=$directorio.$_POST['item']."_implementacion.pdf";
//echo $directorio;
$temp_archivo = $_FILES["docImple"]["tmp_name"];
$f1=move_uploaded_file($temp_archivo,$directorio);

echo "  <div class='alert alert-success' role='alert'>
						 <li class='fa fa-check-circle'></li> Subida de archivo exitoso &nbsp 
		</div>";