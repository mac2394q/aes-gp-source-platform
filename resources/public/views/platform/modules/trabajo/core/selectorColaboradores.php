<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(PDO_PATH . "usuarioDao.php");
require_once (CONTROLLERS_PATH."usuarioController.php");
require_once (CONTROLLERS_PATH."trabajoController.php");
//echo $_POST['id'];
 $ob = trabajoController::observacionRequisitoImplementacion3($_POST['id'])->getId_proyecto();
//print_r($ob);
echo usuarioController::listadoUsuariosColaboradores( $ob );


?>