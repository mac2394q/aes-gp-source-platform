<?php 

  header("Access-Control-Allow-Origin: *");

  error_reporting(E_ALL);

  ini_set('display_errors', 1);

  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');

  require_once(CONTROLLERS_PATH."empresaController.php");



  



  $objEmpresa = empresaController::registrarGrupo(strtoupper($_POST['etiqueta']));

  $idempresa= empresaController::ultimaGrupoRegistrada();

    echo "<div class='alert alert-success' role='alert'>

              <li class='fa fa-check-circle'></li> Registro de Grupo Empresarial Exitoso ! &nbsp 

          </div>

          <a class='btn btn-info round btn-min-width mr-1 mb-1 waves-effect waves-light' href='".MODULE_APP_SERVER.'empresa/verFichaGrupo.php?id='.$idempresa."'  class='btn btn-gradient-primary text-white'><li class='fa fa-check-circle'></li>  Ficha de Grupo</a>";

  ?>