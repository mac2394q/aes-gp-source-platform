<?php
  include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(MODEL_PATH."contrato.php");
  require_once(PDO_PATH."contratoDao.php");
  require_once (CONTROLLERS_PATH."trabajoController.php");
require_once (CONTROLLERS_PATH."contratoController.php");
require_once (CONTROLLERS_PATH."proyectoController.php");
require_once (CONTROLLERS_PATH."plantillaController.php");

class contratoController
{
  public static function registraContrato($modelContrato){
    return contratoDao::registrarContrato($modelContrato);
  }
  public static function registraAcuerdoCuota($modelAcuerdo){
    return contratoDao::registraAcuerdoCuota($modelAcuerdo);
  }
  public static function registrarCuota($modelAcuerdo){
    return contratoDao::registrarCuota($modelAcuerdo);
  }
  public static function modificaContrato($modelContrato){
    return contratoDao::modificarContrato($modelContrato);
  }
  public static function modificarCuota($modelCuota){
    return contratoDao::modificarCuota($modelCuota);
  }

  public static function ContratoId($modelContrato){
    return contratoDao::ContratoId($modelContrato);
  }


  public static function cuotaId($idcuota){
    return contratoDao::cuotaId($idcuota);
  }
  public static function acuerdoId($idcuota){
    return contratoDao::acuerdoId($idcuota);
  }

  public static function comprobarAcuerdo($idcontrato){
    return contratoDao::comprobarAcuerdo($idcontrato);
  }

  public static function acuerdoContrato($idcontrato){
    return contratoDao::acuerdoContrato($idcontrato);
  }



  public static function listadoContrato(){
    return contratoDao::listadoContrato();
  }


  public static function listadoCuotas($idcontrato){
    return contratoDao::listadoCuotas($idcontrato);
  }

  public static function listadoContratoTrabajo($idtrabajo,$idcontrato){
    $objEmpresa = contratoDao::listadoContratoEmpresaTrabajo($idcontrato);
    //print_r($objEmpresa );
    if($objEmpresa!= false){
      echo   "<table id='project-task-list' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
                      role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
                  <thead>
                      <tr role='row'>
                          <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-barcode'></li>&nbsp;Entidad - Proyecto:</th>
                          <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-barcode'></li> &nbsp;Proyecto :</th>
                          
                          <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-cog'></li>&nbsp;  Agregar Acuerdo de Pago :
                          </th>
                          
                          <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-cog'></li>&nbsp;  Acción :
                          </th>
                      </tr>
                  </thead>
                  <tbody>
                      ";
                      foreach ($objEmpresa as $key => $value) {
                      echo"
                      <tr role='row' class='even'>
                          <td class='parrafo'>
                            ".empresaController::objEmpresa($objEmpresa[$key]->getId_entidad_empresa_proyecto())->getNombre_empresa()."
                          </td>
                          <td class='parrafo'>
                            ".plantillaController::plantillaId(proyectoController::ProyectoId($objEmpresa[$key]->getId_proyecto_empresa())->getId_plantilla_alcance_proyecto())->getEtiqueta_plantilla()."
                          </td>
                         
                          <td><a href='verFichaAcuerdo.php?id=".$idtrabajo."&idcontrato=".$objEmpresa[$key]->getId_contrato_empresa_proyecto() ."'  class='dropdown-item'><i class='fa fa-money-check-alt fa-2x'></i>&nbsp; Ver Folio Contrato </a></td>
                      
                          <td>No usar</td>
                          ";
                          echo "
                      </tr>";
                      }
                      echo"
                  </tbody>
              </table>";
      }else{
    echo "
          <div class='bs-callout-pink callout-square callout-transparent mt-1'>
              <div class='media align-items-stretch'>
                  <div class='media-left media-middle bg-pink callout-arrow-left position-relative p-2'>
                      <i class='fa fa-exclamation-triangle text-white'></i>
                  </div>
                  <div class='media-body p-1'>
                      <p class='titulo'>Actualmente no hay Proyectos asociados al contrato.</p>
                  </div>
              </div>
          </div>
          ";
      }
  }

  public static function listadoContratoTrabajoSinProyecto($idtrabajo){
    $objEmpresa = contratoDao::listadoContratoTrabajo($idtrabajo);
    if($objEmpresa!= false){
      echo   "<table id='project-task-list' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
                      role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
                  <thead>
                      <tr role='row'>
                          <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-barcode'></li>&nbsp;Entidad </th>
                          <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-barcode'></li> &nbsp;Valor del Contrato :</th>
                          <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-barcode'></li> &nbsp;Firma del Contrato:</th>
                          <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-folder-open'></li>&nbsp;  Ficha del Contrato :
                          </th>
                          
                          <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-money-check-alt'></li>&nbsp; Acuerdo de Pago :
                          </th>
                        
                      </tr>
                  </thead>
                  <tbody>
                      ";
                      foreach ($objEmpresa as $key => $value) {
                      echo"
                      <tr role='row' class='even'>
                          <td class='parrafo'>
                            ".$objEmpresa[$key]->getId_entidad_pago_contrato()."
                          </td>
                          <td class='parrafo'>
                            ".$objEmpresa[$key]->getValor_contrato()."
                          </td>
                          <td class='parrafo'>
                            ".$objEmpresa[$key]->getFecha_firma_contrato() ."
                          </td>
                          <td><a href='verContrato.php?id=".$idtrabajo."&idcontrato=".$objEmpresa[$key]->getId_contrato()."'  class='dropdown-item'><i class='fa fa-folder-open fa-2x'></i>&nbsp; Ver </a></td>
                          
                          <td><a href='verFichaAcuerdo.php?id=".$idtrabajo."&idcontrato=".$objEmpresa[$key]->getId_contrato()."'  class='dropdown-item'><i class='fa fa-money-check-alt fa-2x'></i>&nbsp; Ver  </a></td>
                         
                          ";
                          echo "
                      </tr>";
                      }
                      echo"
                  </tbody>
              </table>";
      }else{
    echo "
          <div class='bs-callout-pink callout-square callout-transparent mt-1'>
              <div class='media align-items-stretch'>
                  <div class='media-left media-middle bg-pink callout-arrow-left position-relative p-2'>
                      <i class='fa fa-exclamation-triangle text-white'></i>
                  </div>
                  <div class='media-body p-1'>
                      <p class='titulo'>Actualmente no hay Proyectos Registrados.</p>
                  </div>
              </div>
          </div>
          ";
      }
  }

  public static function listadoContratoTrabajoSeleccion($idtrabajo){
    $objplantilla  = contratoDao::listadoContratoEmpresaTrabajoSeleccion($idtrabajo);
    //print_r($objplantilla );
    
    if($objplantilla != false){
      echo "  <select id='proyectoId' name='proyectoId' class='form-control'>";                
      foreach ($objplantilla as $key => $value) {
        
        
          
          echo    "<option value='".$objplantilla[$key]->getId_empresa_proyecto()."'>".$objplantilla[$key]->getId_proyecto_empresa()." </option>";
      }
      echo     "</select>";
    }else{
      echo "  
              <select id='plantilla' name='plantilla' class='form-control'>
                  <option value='null'>No Proyecto creados</option>
              </select>";
     }
      
  }


  public static function ultimaContratoRegistrado(){
    return contratoDao::ultimaContratoRegistrado();
  }

  public static function ultimaAcuerdoRegistrado(){
    return contratoDao::ultimoAcuerdoContratoRegistrado();
  }

  public static function listadoCuotaContracto($empresa_proyecto,$idtrabajo,$idcontrato){

    $objEmpresa = contratoDao::listadoCuota($idcontrato);
    if($objEmpresa!= false){
      echo   "<table id='project-task-list' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
                      role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
                  <thead>
                      <tr role='row'>
                          <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-eye'></li>&nbsp;  Ver :
                          </th>
                          <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-barcode'></li>&nbsp;Numero:</th>
                          <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-barcode'></li> &nbsp;Monto :</th>
                          <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-barcode'></li> &nbsp;Porcentaje:</th>
                          <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-barcode'></li> &nbsp;Estado:</th>
                          <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-barcode'></li> &nbsp;Observacion:</th>
                          <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-cog'></li>&nbsp;  Accion :
                          </th>
                      </tr>
                  </thead>
                  <tbody>
                      ";
                      foreach ($objEmpresa as $key => $value) {
                      echo"
                      <tr role='row' class='even'>
                          <td><a href='verCuota.php?idcuota=".$objEmpresa[$key]->getId_cuota()."&empresa_proyecto=".$empresa_proyecto."&idtrabajo=".$idtrabajo."&idcontrato=".$idcontrato."'  class='dropdown-item'><i class='fa fa-money-check-alt fa-2x'></i>&nbsp; Ver cuota - Actualizar estado </a></td>
                          <td class='parrafo'>
                            ".$objEmpresa[$key]->getNumero_cuota()."
                          </td>
                          <td class='parrafo'>
                            ".$objEmpresa[$key]->getMonto_cuota()."
                          </td>
                          <td class='parrafo'>
                            ".$objEmpresa[$key]->getPorcentaje_cuota() ."
                          </td>
                          <td class='parrafo'>
                            ".$objEmpresa[$key]->getEstado_cuota()."
                          </td>
                          <td class='parrafo'>
                              <textarea readonly style='height: 184px; width: 100%; margin-top: 0px; margin-bottom: 0px;' rows='20' cols='66' class='text-justify'> ".$objEmpresa[$key]->getObservacion() ."</textarea>
                          </td>
                          <td><a href='core/eliminarCuota.php?idcuota=".$objEmpresa[$key]->getId_cuota()."&empresa_proyecto=".$empresa_proyecto."&idtrabajo=".$idtrabajo."&idcontrato=".$idcontrato."'  class='dropdown-item'><i class='fa fa-trash fa-2x'></i>&nbsp; Eliminar </a></td>
                          ";
                          echo "
                      </tr>";
                      }
                      echo"
                  </tbody>
              </table>";
      }else{
    echo "
          <div class='bs-callout-pink callout-square callout-transparent mt-1'>
              <div class='media align-items-stretch'>
                  <div class='media-left media-middle bg-pink callout-arrow-left position-relative p-2'>
                      <i class='fa fa-exclamation-triangle text-white'></i>
                  </div>
                  <div class='media-body p-1'>
                      <p class='titulo'>Actualmente no hay cuota Registradas para el contrato.</p>
                  </div>
              </div>
          </div>
          ";
      }

  }


}
?>
