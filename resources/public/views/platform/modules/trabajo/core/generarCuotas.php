<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."trabajoController.php");
  require_once(CONTROLLERS_PATH."entidadController.php");
  require_once(CONTROLLERS_PATH."contratoController.php");
  require_once(CONTROLLERS_PATH."proyectoController.php");
  require_once(CONTROLLERS_PATH."empresaController.php");
  require_once(MODEL_PATH."contrato.php");
  require_once(MODEL_PATH."cuota.php");
  require_once(MODEL_PATH."acuerdo_pago.php");
//   $entidad = entidadController::obtenerEntidad($_POST['opcionEntidad'],$_POST['entidadTipo']);
  
  // $modelCuota= new cuota(null,null,$_POST['cuota'],$_POST['ncuota'],$_POST['porcentaje'],$_POST['estado'],$_POST['textarea2']);
  // $modelAcuerdo = new acuerdo_pago(null,$_POST['idcontrato'],"ACTIVO");
  //print_r($modelTrabajo);
  echo   "<table id='project-task-list' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
                      role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
                  <thead>
                      <tr role='row'>
                          
                          <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-barcode'></li>&nbsp;Numero:</th>
                          
                          <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-barcode'></li> &nbsp;Porcentaje:</th>
                          <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-barcode'></li> &nbsp;Generar Valor Cuota:</th>
                          <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-barcode'></li> &nbsp;Monto :</th>
                          
                      </tr>
                  </thead>
                  <tbody>
                      ";
  for ($i=1; $i <= intval($_POST['cuota']); $i++) { 
    
                   
                      echo"
                      <tr role='row' class='even'>
                         
                          <td class='parrafo'>
                             <input  type='text' readonly class='form-control'   name='cuota".$i."' id='cuota".$i."' value='".$i."'>
                          </td>
                          <td class='parrafo'>
                              <input  type='text' class='form-control'  onchange='val".$i."()' name='porcentaje".$i."' id='porcentaje".$i."' value='0'>
                          </td>
                          <td class='parrafo'>
                              <button id='generarValor' name='".$i."' class='btn capa text-white round '><li class='fa fa-exchange-alt fa-2x'></li>&nbsp;Generar  </button>
                          </td> 
                          <td class='parrafo'>
                              <input  type='text' readonly  class='form-control'  name='monto".$i."' id='monto".$i."' value='0'>
                          </td>
                                                  
                          ";
                          echo "
                      </tr>";                
  }
  echo"
                  </tbody>
              </table>";
 
  ?>  