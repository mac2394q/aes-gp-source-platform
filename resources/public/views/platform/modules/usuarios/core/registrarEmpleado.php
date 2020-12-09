<?php 

  header("Access-Control-Allow-Origin: *");

  error_reporting(E_ALL);

  ini_set('display_errors', 1);

  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');

  require_once(CONTROLLERS_PATH."usuarioController.php");

  require_once(PROVIDERS_PATH."pdo/usuarioDao.php");

  require_once(PROVIDERS_PATH."pdo/sesionDao.php");

  require_once(MODEL_PATH."usuario.php");

  require_once(MODEL_PATH."sesion.php");

   

  

  $modelUsu = new usuario(

     null,

     $_POST['pais'],

     $_POST['documento'],

     strtoupper($_POST['nombre']),

     $_POST['rol'],

     $_POST['usuario'],

     $_POST['clave'],

     $_POST['telefono'],

     $_POST['direccion'],

     $_POST['correo'],

     $_POST['ciudad'],

     date('"Y-m-d'),
     NULL

     

  );

  $usuario = usuarioDao::registrarUsuario($modelUsu);

  

  if($usuario){

      echo "<br>

        <div class='alert alert-success' role='alert'>

                <li class='fa fa-check-circle'></li> Registro Realizado Con Exito ! &nbsp 

            </div>";

  }else{

    echo "<br>

    <div class='alert alert-danger' role='alert'>

            <li class='fa fa-check-circle'></li> Registro No Realizado ! &nbsp 

        </div>";

  }

      

      

  

 

 

?>  