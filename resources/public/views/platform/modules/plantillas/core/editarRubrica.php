<?php 

  header("Access-Control-Allow-Origin: *");

  error_reporting(E_ALL);

  ini_set('display_errors', 1);

  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');

  require_once(CONTROLLERS_PATH."plantillaController.php");

  require_once(MODEL_PATH."plantilla.php");

  require_once(MODEL_PATH."certificado.php");

  require_once(MODEL_PATH."grupoPlantilla.php");

  require_once(MODEL_PATH."item_grupo_plantilla.php");

  $modelPlantillaGrupo = new item_grupo_plantilla_alcance(

    $_POST['idplantilla'],

    null,

    strtoupper($_POST['etiquetaPlantilla']),

    $_POST['textarea2']

  );

  //print_r($modelPlantillaGrupo );

  plantillaController::editarPlantillaItem($modelPlantillaGrupo);

  echo "<div class='alert alert-success' role='alert'>

             <li class='fa fa-check-circle fa-2x'></li>  Plantilla Editada  Correctamente  &nbsp 

           </div>  ";

  $url =PLATFORM_SERVER."modules/plantillas/verRubrica.php?id=".$_POST['idplantilla'];

  plantillaController::retornarVista($url);

  ?>  