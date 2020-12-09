<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/conf.php');

require_once(MODEL_PATH . "trabajo.php");

require_once(PDO_PATH . "trabajoDao.php");

require_once(PDO_PATH . "plantilla_alcanceDao.php");

require_once(PDO_PATH . "alcanceDao.php");

require_once(PDO_PATH . "empresaDao.php");

require_once(PDO_PATH . "proyectoDao.php");

require_once(PDO_PATH . "diagnostico_proyectoDao.php");

require_once(CONTROLLERS_PATH . "entidadController.php");

require_once(CONTROLLERS_PATH . "plantillaController.php");

require_once(CONTROLLERS_PATH . "grupoController.php");

    $obj=trabajoDao::listadoObservacionesImpl($_POST['id'],$_POST['id2']);

    //print_r($obj);

    if($obj != false){

    echo "

   <table class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable' role='grid' aria-describedby='project-task-list_info' style='position: relative;'>

    <thead>

      <tr role='row'>

        <th class='sorting_disabled' rowspan='1' colspan='1'><li class='fa fa-edit'></li>  Comentario

        </th>

        <th class='sorting_disabled' rowspan='1' colspan='1'><li class='fa fa-calendar-alt'></li> Fecha

        </th>

        

        <th class='sorting_disabled' rowspan='1' colspan='1'><li class='fa fa-percentage'></li> Porcentaje

        </th>

      </tr>

    </thead>

    <tbody>";

    foreach ($obj as $key => $value) {

     echo "

     <tr role='row' class='even'>

       <td class='reorder sorting_1'>

            <textarea readonly='' class='form-control ' rows='9' cols='125' style='height: 184px; width: 100%; margin-top: 0px; margin-bottom: 0px;'>".$obj[$key]->getComentario_implementacion()." </textarea>

        </td>

      

       <td class='reorder sorting_1'>".$obj[$key]->getFecha_comentario_implentacion()."</td>     

       <td class='reorder sorting_1'>".$obj[$key]->getPorcentaje_avance()."</td>                  

     </tr>";

    }

   echo "

    </tbody>

   </table>";

    }else{

      echo "<div class='alert bg-warning alert-icon-left mb-2' role='alert'>

               <span class='alert-icon'><i class='fa fa-ban'></i></span>

               <strong class='parrafo'>&nbsp; No hay comentarios para este requisito</strong>

             </div>";

    }

?>