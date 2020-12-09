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
  require_once(MODEL_PATH."grupoPlantilla.php");
            $modelPlantillaGrupo = new grupo_plantilla_alcance(
              $_POST['idgrupo'],
              null,
              strtoupper($_POST['consecutivo']),
              strtoupper($_POST['titulo'])
            );
            plantillaController::editarPlantillaGrupo($modelPlantillaGrupo);
        echo "<div class='alert alert-success' role='alert'>
             <li class='fa fa-check-circle'></li>  capitulo editada  correctamente ! &nbsp 
           </div>  
             ";
             $url =PLATFORM_SERVER."modules/plantillas/verGrupo.php?id=".$_POST['idgrupo'];
             plantillaController::retornarVista($url);
  ?>  