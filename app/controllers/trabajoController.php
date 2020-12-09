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
require_once(CONTROLLERS_PATH . "usuarioController.php");
class trabajoController
{
  public static function nempresas()
  {
    return empresaDao::numEmpresasTotal();
  }
  public static function informeDiagnostico($id)
  {
    return trabajoDao::reporteDiagId($id);
  }
  public static function informePre($id)
  {
    return trabajoDao::reportepreauditoria($id);
  }
  public static function verAcuerdos($id)
  {
    //echo $id;
    return trabajoDao::verAcuerdos($id);
  }
  public static function selectorFechas($id)
  {

    $arrayFechasProyectos = array();
    $fechas = trabajoDao::fechasReporte($id);
    //foreach ($fechas as $key => $value) {
    for ($key = 1; $key < count($fechas); $key++) {
      $arrayFechasProyectos[] = $fechas[$key];
    }
    if ($arrayFechasProyectos != null) {
      echo "  
              <select id='f1' name='f1' class='form-control'>";
      for ($i = 0; $i < count($arrayFechasProyectos); $i++) {
        echo    "<option value='" . $arrayFechasProyectos[$i] . "'>" . $arrayFechasProyectos[$i] . "</option>";
      }
      echo     "</select>";
    } else {
      echo "  
        <select id='plantilla'  class='form-control'>
          <option value='null'>No hay fechas creadas</option>
        </select>";
    }
  }
  public static function estado_proyecto($idproyecto)
  {
    return trabajoDao::estado_proyecto($idproyecto);
  }
  public static function ncolaboradoresItem($idimpl)
  {
    return trabajoDao::ncolaboradoresItem($idimpl);
  }
  public static function ngrupos()
  {
    return empresaDao::numGruposTotal();
  }

  public static function registrarObservacionPre($model)
  {
    return diagnostico_proyectoDao::registrarPre_proyecto($model);
  }
  //****************************************************** hernan */
  public static function actualizarObservacionPre($model)
  {
    return diagnostico_proyectoDao::actualizarPre_proyecto($model);
  }
  public static function asignarUsuarioDiagnostico($usuario, $idtrabajo)
  {
    return  trabajoDao::asignarUsuarioDiagnostico($usuario, $idtrabajo);
  }

  public static function registrarObservacionImplementacion($model, $idimple)
  {
    return diagnostico_proyectoDao::registrarImplementacion_proyecto($model, $idimple);
  }
  public static function registrarObservacionImplementacionValidacionFecha($model)
  {
    return diagnostico_proyectoDao::registrarImplementacion_proyectoValidacionFecha($model);
  }
  public static function registrarObservacionImplementacion2($model)
  {
    return diagnostico_proyectoDao::registrarImplementacion_proyecto2($model);
  }

  public static function registrarObservacionDiagnostico($model)
  {
    return diagnostico_proyectoDao::registrarObservacionDiagnostico($model);
  }
  public static function observacionRequisitoPre($idproyecto, $idItem)
  {
    return diagnostico_proyectoDao::preauditoria_proyectoId($idproyecto, $idItem);
  }
  public static function observacionRequisito($idproyecto, $idItem)
  {
    return diagnostico_proyectoDao::diagnostico_proyectoId($idproyecto, $idItem);
  }
  public static function observacionRequisitoImplementacion($idproyecto, $idItem)
  {
    return diagnostico_proyectoDao::implementacion_proyectoId($idproyecto, $idItem);
  }
  public static function observacionRequisitoImplementacion2($idproyecto, $idItem)
  {
    return diagnostico_proyectoDao::implementacion_proyectoId2($idproyecto, $idItem);
  }
  public static function observacionRequisitoImplementacion3($id)
  {
    return diagnostico_proyectoDao::implementacion_proyectoId3($id);
  }
  public static function NumobservacionRequisitoImplementacion($idproyecto, $idItem)
  {
    return diagnostico_proyectoDao::Numimplementacion_proyectoId($idproyecto, $idItem);
  }

  public static function asignarUsuarioPreauditoria($usuario, $idtrabajo)
  {
    return trabajoDao::asignarUsuarioPreauditoria($usuario, $idtrabajo);
  }
  public static function asignarUsuarioImplementacion($usuario, $idtrabajo)
  {
    return trabajoDao::asignarUsuarioImplementacion($usuario, $idtrabajo);
  }
  public static function asignarUsuarioColaborador($idusuario, $implementacion)
  {
    return trabajoDao::asignarUsuarioColaborador($idusuario, $implementacion);
  }
  public static function eliminarUsuarioColaborador($idusuario, $implementacion)
  {
    return trabajoDao::eliminarUsuarioColaborador($idusuario, $implementacion);
  }
  public static function registrarTrabajo($modelTrabajo)
  {
    return trabajoDao::registrarTrabajo($modelTrabajo);
  }

  public static function registraColaborador($modelColaborador)
  {
    return trabajoDao::registraColaborador($modelColaborador);
  }
  public static function registraInforme($modelColaborador)
  {
    return trabajoDao::registraInforme($modelColaborador);
  }
  public static function registraInforme2($idproyecto, $actividades, $aspectos, $informacion)
  {
    return trabajoDao::registraInforme2($idproyecto, $actividades, $aspectos, $informacion);
  }
  public static function modificarTrabajo($modelTrabajo)
  {
    return trabajoDao::modificarTrabajo($modelTrabajo);
  }
  public static function trabajoCancelar($idTrabajo)
  {
    return trabajoDao::trabajoCancelar($idTrabajo);
  }
  public static function trabajoFinalizado($idTrabajo)
  {
    if (ProyectoDao::listaProyectoPendientes($idTrabajo) == 0) {
      trabajoDao::trabajoFinalizado($idTrabajo);
      return true;
    } else {
      return false;
    }
  }
  public static function dian($fechadian, $fechaVisita, $idtrabajo)
  {
    return trabajoDao::dian($fechadian, $fechaVisita, $idtrabajo);
  }
  //
  public static function finalizarDiagnosticoVerificacion($idTrabajo)
  {
    return trabajoDao::finalizarDiagnosticoVerificacion($idTrabajo);
  }
  public static function finalizarDiagnosticoActual($idTrabajo)
  {
    return trabajoDao::finalizarDiagnosticoActual($idTrabajo);
  }
  public static function finalizarPreActual($idTrabajo)
  {
    return trabajoDao::finalizarPreActual($idTrabajo);
  }
  public static function validarObservacionPreUserbservacion($idproyecto, $iditem, $estado, $comentario)
  {
    return trabajoDao::validarObservacionPreUserbservacion($idproyecto, $iditem, $estado, $comentario);
  }
  public static function iniciarDiagnostico($idTrabajo)
  {
    return trabajoDao::iniciarDiagnostico($idTrabajo);
  }
  public static function finalizarDiagnosticoImplementacion($idTrabajo)
  {
    return trabajoDao::finalizarDiagnosticoImplementacion($idTrabajo);
  }
  public static function finalizarDiagnostico($idTrabajo)
  {
    return trabajoDao::finalizarDiagnostico($idTrabajo);
  }
  public static function finalizarPre($idTrabajo)
  {
    return trabajoDao::finalizarPre($idTrabajo);
  }
  public static function cancelarDiagnostico($idTrabajo)
  {
    return trabajoDao::cancelarDiagnostico($idTrabajo);
  }
  public static function eliminarAcuerdo($idTrabajo)
  {
    return trabajoDao::eliminarAcuerdo($idTrabajo);
  }
  public static function cancelarImplementacion($idTrabajo)
  {
    return trabajoDao::cancelarImplementacion($idTrabajo);
  }
  public static function finalizarPreAuditoria($idTrabajo)
  {
    return trabajoDao::finalizarImplementacion($idTrabajo);
  }
  public static function finalizarImplementacion($idTrabajo)
  {
    return trabajoDao::finalizarImplementacion($idTrabajo);
  }
  public static function trabajoId($modelTrabajo)
  {
    return trabajoDao::trabajoId($modelTrabajo);
  }
  public static function proyectoObj($idproyecto)
  {
    return trabajoDao::proyectoObj($idproyecto);
  }
  public static function trabajoIdFechas($modelTrabajo)
  {
    return trabajoDao::trabajoIdFechas($modelTrabajo);
  }
  public static function proyectoId($idProyecto)
  {
    return proyectoDao::proyectoId($idProyecto);
  }
  public static function proyectoIdFechas($idProyecto)
  {
    return proyectoDao::proyectoIdFechas($idProyecto);
  }
  public static function empresasPreauditoria($idProyecto)
  {
    return proyectoDao::empresasPreauditoria($idProyecto);
  }
  public static function proyectoIdEmpresa($idProyecto)
  {
    return proyectoDao::proyectoId($idProyecto);
  }
  public static function asociarProyectoContrato($idcontrato, $idproyecto)
  {
    return trabajoDao::asociarProyectoContrato($idcontrato, $idproyecto);
  }
  public static function ultimoTrabajo()
  {
    return trabajoDao::ultimoTrabajoRegistrado();
  }
  // public static function listadoTrabajo(){
  //   return trabajoDao::listadoTrabajo();
  // }
  public static function ultimaTrabajoRegistrado($modelTrabajo)
  {
    return trabajoDao::ultimaTrabajoRegistrado($modelTrabajo);
  }
  public static function estadoColorTag($tag)
  {
    switch ($tag) {
      case 'TERMINADO':
        echo "<div class='badge badge-success round'>TERMINADO</div>";
        break;
      case 'INICIADO':
        echo "<div class='badge badge-info round'>INICIADO</div>";
        break;
      case 'DIAGNOSTICO':
        # code...
        break;
      case 'IMPLEMENTACION':
        # code...
        break;
      case 'PREAUDITORIA':
        # code...
        break;

      default:
        # code...
        break;
    }
  }
  public static function entidadAlcanceProyecto($tipoEntidad, $idtrabajo, $identidad)
  {
    //echo $tipoEntidad." tipo  ".$idtrabajo." idtrabj   ".$identidad;
    if ($tipoEntidad == "GRUPO") {
      echo grupoController::listadoEmpresasGrupoEmpresarial($identidad);
    } else {
      $objEntidadEmpresa = empresaDao::empresaId($identidad);
      //print_r($objEntidadEmpresa);
      echo "<label for=''>
                <h5 class='card-title titulo'>Empresa :
                  </h5>
            </label>
            <input readonly type='text' class='form-control' placeholder='. . . '  value='" . $objEntidadEmpresa->getNombre_empresa() . "'>
            <input  type='hidden' class='form-control' placeholder='. . . ' name='grupo' id='grupo' value='" . $objEntidadEmpresa->getId_entidad() . "'>";
    }
  }
  public static function listadoAlcance()
  {
    $objplantilla = alcanceDao::listadoAlcance();
    if ($objplantilla != false) {
      echo "  <select id='entidadTipo' name='entidadTipo' class='form-control'>";
      foreach ($objplantilla as $key => $value) {
        echo    "<option value='" . $objplantilla[$key]->getId_alcance() . "'>" . $objplantilla[$key]->getNombre_alcance() . " </option>";
      }
      echo     "</select>";
    } else {
      echo "  
                <select id='plantilla' name='plantilla' class='form-control'>
                    <option value='null'>No hay Alcances creados</option>
                </select>";
    }
  }
  public static function listadoPlantilla()
  {
    $objplantilla = plantilla_alcanceDao::listadoPlantilla();
    //print_r($objplantilla);
    if ($objplantilla != false) {
      echo "  <select id='entidadTipo' name='entidadTipo' class='form-control'>";
      foreach ($objplantilla as $key => $value) {
        echo    "<option value='" . $objplantilla[$key]->getId_plantilla_alcance() . "'>" . $objplantilla[$key]->getEtiqueta_plantilla() . " Alcance : " . $objplantilla[$key]->getId_alcance_plantilla() . "</option>";
      }
      echo     "</select>";
    } else {
      echo "  
                <select id='plantilla' name='plantilla' class='form-control'>
                    <option value='null'>No hay Plantillas Creadas</option>
                </select>";
    }
  }
  public static function listadoGrupo()
  {
    $objplantilla = empresaDao::listadoGrupoEmpresarial(null);
    if ($objplantilla != false) {
      echo "  <select id='entidadTipo' name='entidadTipo' class='form-control'>";
      foreach ($objplantilla as $key => $value) {
        echo    "<option value='" . $objplantilla[$key]->getId_entidad() . "'>" . $objplantilla[$key]->getNombre_grupo_empresarial() . " </option>";
      }
      echo     "</select>";
    } else {
      echo "  
                <select id='plantilla' name='plantilla' class='form-control'>
                    <option value='null'>No hay grupos creados</option>
                </select>";
    }
  }
  public static function listadoEmpresa_()
  {
    $objplantilla = empresaDao::listadoEmpresas();
    if ($objplantilla != false) {
      echo "  <select id='entidadTipo2' name='entidadTipo2' class='form-control'>
                  <option value='null'>Seleccionar Empresa</option>";
      foreach ($objplantilla as $key => $value) {
        echo   "<option value='" . $objplantilla[$key]->getId_entidad() . "'>" . $objplantilla[$key]->getNombre_empresa() . " </option>";
      }
      echo     "</select>";
    } else {
      echo "  
                <select id='plantilla' name='plantilla' class='form-control'>
                  <option value='null'>No hay empresas creadas</option>
                </select>";
    }
  }
  public static function listadoEmpresa($idempresa)
  {
    $objplantilla = empresaDao::listadoSedeEmpresa($idempresa);
    //print_r($objplantilla);
    if ($objplantilla != false) {
      echo "  <label for=''><h5 class='card-title'><li class='fa fa-clipboard-list'></li> <span class='text-danger'>*</span>Sede de empresa  :</h5></label>
                <select id='sede' name='sede' class='form-control'>
                ";
      foreach ($objplantilla as $key => $value) {
        echo    "<option value='" . $objplantilla[$key]->getIdsede() . "'>
            " . $objplantilla[$key]->getCiudad_sede() . " - " . $objplantilla[$key]->getDireccion_sede() . " </option>";
      }
      echo     "</select>";
    } else {
      echo "  
                <select id='plantilla' name='plantilla' class='form-control'>
                  <option value='null'>No hay empresas creadas</option>
                </select>";
    }
  }
  public static function listadoTrabajoEmpresa($idempresa)
  {
    $objEmpresa = trabajoDao::listadoTrabajoEmpresa($idempresa);
    //print_r($objEmpresa);
    if ($objEmpresa != false) {
      echo   "<table id='project-task-list' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
                    role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
                <thead>
                    <tr role='row'>
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-cog'></li>  Ver
                        </th>
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-barcode'></li> Entidad:</th>
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-barcode'></li> Tipo:</th>
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-barcode'></li> Fecha Creación trabajo:</th>
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-globe'></li>  Fecha Cierre Trabajo:
                        </th>
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-globe'></li>  Estado:
                        </th>
                      
                        
                    </tr>
                </thead>
                <tbody>
                    <tr class='group'>
                      <td colspan='8'>
                        <h6 class='mb-0'>Última Actualización del Listado: 
                              <span class='text-bold-600'>" . date("d") . "-" . date("m") . "-" . date("Y") . "</span> - 
                              <span class='text-bold-600'>" . date("g") . " : " . date("i") . "</span>
                         </h6>
                      </td>
                    </tr>";
      foreach ($objEmpresa as $key => $value) {
        $entidad = entidadController::obtenerEntidad($objEmpresa[$key]->getId_entrada_trabajo());
        echo "
                    <tr role='row' class='even'>
                        <td><a href='" . MODULE_APP_SERVER . "trabajo/verFicha.php?id=" . $objEmpresa[$key]->getId_trabajo() . "' class='dropdown-item'><i class='fa fa-eye fa-2x'></i> </a></td>
                        <td class='parrafo'>
                          " . $entidad['entidad'] . "
                        </td>
                        <td class='parrafo'>
                          " . $entidad['tipo'] . "
                        </td>
                        <td class='parrafo'>
                          " . $objEmpresa[$key]->getFecha_creacio_trabajo() . "
                        </td>
                        
                        <td class='parrafo'>
                          " . $objEmpresa[$key]->getFecha_cierre_trabajo() . "
                        </td>
                      
                        <td class='parrafo'>
                          " . $objEmpresa[$key]->getEstado_trabajo() . "
                        </td>";
        echo "
                        
                    </tr>";
      }
      echo "
                </tbody>
            </table>";
    } else {
      echo "
        <div class='bs-callout-pink callout-square callout-transparent mt-1'>
            <div class='media align-items-stretch'>
                <div class='media-left media-middle bg-pink callout-arrow-left position-relative p-2'>
                    <i class='fa fa-exclamation-triangle text-white'></i>
                </div>
                <div class='media-body p-1'>
                    <p>Actualmente no hay Trabajos registrados con la consulta anterior</p>
                </div>
            </div>
        </div>
        ";
    }
  }
  public static function listadoTrabajoGrupo($idempresa)
  {
    $objEmpresa = trabajoDao::listadoTrabajoGrupo($idempresa);
    //print_r($objEmpresa);
    if ($objEmpresa != false) {
      echo   "<table id='project-task-list' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
                    role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
                <thead>
                    <tr role='row'>
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-cog'></li>  Ver
                        </th>
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-barcode'></li> Entidad:</th>
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-barcode'></li> Tipo:</th>
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-barcode'></li> Fecha Creación trabajo:</th>
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-globe'></li>  Fecha Cierre Trabajo:
                        </th>
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-globe'></li>  Estado:
                        </th>
                      
                        
                    </tr>
                </thead>
                <tbody>
                    <tr class='group'>
                      <td colspan='8'>
                        <h6 class='mb-0'>última Actualización del Listado: 
                              <span class='text-bold-600'>" . date("d") . "-" . date("m") . "-" . date("Y") . "</span> - 
                              <span class='text-bold-600'>" . date("g") . " : " . date("i") . "</span>
                         </h6>
                      </td>
                    </tr>";
      foreach ($objEmpresa as $key => $value) {
        $entidad = entidadController::obtenerEntidad($objEmpresa[$key]->getId_entrada_trabajo());
        echo "
                    <tr role='row' class='even'>
                        <td><a href='" . MODULE_APP_SERVER . "trabajo/verFicha.php?id=" . $objEmpresa[$key]->getId_trabajo() . "' class='dropdown-item'><i class='fa fa-eye fa-2x'></i> </a></td>
                        <td class='parrafo'>
                          " . $entidad['entidad'] . "
                        </td>
                        <td class='parrafo'>
                          " . $entidad['tipo'] . "
                        </td>
                        <td class='parrafo'>
                          " . $objEmpresa[$key]->getFecha_creacio_trabajo() . "
                        </td>
                        
                        <td class='parrafo'>
                          " . $objEmpresa[$key]->getFecha_cierre_trabajo() . "
                        </td>
                      
                        <td class='parrafo'>
                          " . $objEmpresa[$key]->getEstado_trabajo() . "
                        </td>";
        echo "
                        
                    </tr>";
      }
      echo "
                </tbody>
            </table>";
    } else {
      echo "
        <div class='bs-callout-pink callout-square callout-transparent mt-1'>
            <div class='media align-items-stretch'>
                <div class='media-left media-middle bg-pink callout-arrow-left position-relative p-2'>
                    <i class='fa fa-exclamation-triangle text-white'></i>
                </div>
                <div class='media-body p-1'>
                    <p>Actualmente no hay Trabajos registrados con la consulta anterior</p>
                </div>
            </div>
        </div>
        ";
    }
  }

  public static function listadoColaboradores($id)
  {
    $objColaboradores = trabajoDao::listadoColaboradoresItem($id);

    if ($objColaboradores != false) {
      echo   "
      <table id='project-task-list' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
                    role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
                <thead>
                    <tr role='row'>
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-barcode'></li> Nombre:</th>
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-barcode'></li> Cargo:</th>
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-barcode'></li> Acción:</th>
                    </tr>
                </thead>
                <tbody>";
      foreach ($objColaboradores as $key => $value) {
        echo "
          <tr role='row' class='even'>
                        
            <td class='parrafo'>
              " . $objColaboradores[$key]->getNombre_colaborador() . "
            </td>
                    
            <td class='parrafo'>" . $objColaboradores[$key]->getCargo_colaborador() . "</td>
            <td><a href='core/eliminarColaboradorItem.php" . $objColaboradores[$key]->getId_colaborador() . "' class='dropdown-item'><i class='fa fa-ban fa-2x'></i>&nbsp;Eliminar </a></td>
          </tr>";
      }
      echo "
                </tbody>
            </table>
          ";
    } else {
      echo "
        <div class='bs-callout-pink callout-square callout-transparent mt-1'>
            <div class='media align-items-stretch'>
                <div class='media-left media-middle bg-pink callout-arrow-left position-relative p-2'>
                    <i class='fa fa-exclamation-triangle text-white'></i>
                </div>
                <div class='media-body p-1'>
                    <p>Actualmente no hay colaboradores agregados al requisito</p>
                </div>
            </div>
        </div>
        ";
    }
  }
  public static function listadoTrabajo($entidad, $busqueda)
  {
    $objEmpresa = trabajoDao::listadoTrabajo($entidad, $busqueda);
    //print_r($objEmpresa);
    if ($objEmpresa != false) {
      echo   "<table id='project-task-list' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
                    role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
                <thead>
                    <tr role='row'>
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-eye'></li>  Ver
                        </th>
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-city'></li> Entidad:</th>
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-clone'></li> Tipo:</th>
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-calendar-check'></li> Fecha Creación trabajo:</th>
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-calendar-alt'></li>  Fecha Cierre Trabajo:
                        </th>
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-columns'></li>  Estado:
                        </th>
                      
                        
                    </tr>
                </thead>
                <tbody>
                    <tr class='group'>
                      <td colspan='8'>
                        <h6 class='mb-0'>Última Actualización del Listado: 
                              <span class='text-bold-600'>" . date("d") . "-" . date("m") . "-" . date("Y") . "</span> - 
                              <span class='text-bold-600'>" . date("g") . " : " . date("i") . "</span>
                         </h6>
                      </td>
                    </tr>";
      foreach ($objEmpresa as $key => $value) {
        //   $entidad = entidadController::obtenerEntidad($objEmpresa[$key]->getId_entrada_trabajo());
        //   echo "
        //               <tr role='row' class='even'>
        //                   <td><a href='" . MODULE_APP_SERVER . "trabajo/verFicha.php?id=" . $objEmpresa[$key]->getId_trabajo() . "' class='dropdown-item'><i class='fa fa-eye fa-2x'></i> </a></td>
        //                   <td class='parrafo'>
        //                     " . $entidad['entidad'] . "
        //                   </td>
        //                   <td class='parrafo'>
        //                     " . $entidad['tipo'] . "
        //                   </td>
        //                   <td class='parrafo'>
        //                     " . $objEmpresa[$key]->getFecha_creacio_trabajo() . "
        //                   </td>

        //                   <td class='parrafo'>
        //                     " . $objEmpresa[$key]->getFecha_cierre_trabajo() . "
        //                   </td>

        //                   <td class='parrafo'>
        //                     " . $objEmpresa[$key]->getEstado_trabajo() . "
        //                   </td>";
        //   echo "

        //               </tr>";
        // }
        // echo "
        //           </tbody>
        //       </table>";

        $entidad = entidadController::obtenerEntidad($objEmpresa[$key]->getId_entrada_trabajo());
        echo "
                    <tr role='row' class='even'>
                        <td><a href='" . MODULE_APP_SERVER . "trabajo/verFicha.php?id=" . $objEmpresa[$key]->getId_trabajo() . "' class='dropdown-item'><i class='fa fa-eye fa-2x'></i> </a></td>
                        <td class='parrafo'>
                          " . $entidad['entidad'] . "
                        </td>
                        <td class='parrafo'>
                          " . $entidad['tipo'] . "
                        </td>
                        <td class='parrafo'>
                          " . $objEmpresa[$key]->getFecha_creacio_trabajo() . "
                        </td>
                        
                        <td class='parrafo'>
                          " . $objEmpresa[$key]->getFecha_cierre_trabajo() . "
                        </td>
                      
                        <td class='parrafo'>
                          " . $objEmpresa[$key]->getEstado_trabajo() . "
                        </td>";
        echo "
                        
                    </tr>";
      }
      echo "
                </tbody>
            </table>";
    } else {
      echo "
        <div class='bs-callout-pink callout-square callout-transparent mt-1'>
            <div class='media align-items-stretch'>
                <div class='media-left media-middle bg-pink callout-arrow-left position-relative p-2'>
                    <i class='fa fa-exclamation-triangle text-white'></i>
                </div>
                <div class='media-body p-1'>
                    <p>Actualmente no hay Trabajos registrados con la consulta anterior</p>
                </div>
            </div>
        </div>
        ";
    }
  }
  public static function listadoTrabajoEsp($idusuario)
  {
    $objEmpresa = trabajoDao::listadoTrabajoEsp($idusuario);
    //print_r($objEmpresa);
    if ($objEmpresa != false) {
      echo   "<table id='project-task-list' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
                    role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
                <thead>
                    <tr role='row'>
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-eye'></li>  Ver
                        </th>
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-city'></li> Entidad:</th>
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-clone'></li> Tipo:</th>
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-calendar-check'></li> Fecha Creación trabajo:</th>
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-calendar-alt'></li>  Fecha Cierre Trabajo:
                        </th>
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-columns'></li>  Estado:
                        </th>
                      
                        
                    </tr>
                </thead>
                <tbody>
                    <tr class='group'>
                      <td colspan='8'>
                        <h6 class='mb-0'>Última Actualización del Listado: 
                              <span class='text-bold-600'>" . date("d") . "-" . date("m") . "-" . date("Y") . "</span> - 
                              <span class='text-bold-600'>" . date("g") . " : " . date("i") . "</span>
                         </h6>
                      </td>
                    </tr>";
      foreach ($objEmpresa as $key => $value) {
        $entidad = entidadController::obtenerEntidad($objEmpresa[$key]->getId_entrada_trabajo());
        echo "
                    <tr role='row' class='even'>
                        <td><a href='" . MODULE_APP_SERVER . "trabajo/verFicha.php?id=" . $objEmpresa[$key]->getId_trabajo() . "' class='dropdown-item'><i class='fa fa-eye fa-2x'></i> </a></td>
                        <td class='parrafo'>
                          " . $entidad['entidad'] . "
                        </td>
                        <td class='parrafo'>
                          " . $entidad['tipo'] . "
                        </td>
                        <td class='parrafo'>
                          " . $objEmpresa[$key]->getFecha_creacio_trabajo() . "
                        </td>
                        
                        <td class='parrafo'>
                          " . $objEmpresa[$key]->getFecha_cierre_trabajo() . "
                        </td>
                      
                        <td class='parrafo'>
                          " . $objEmpresa[$key]->getEstado_trabajo() . "
                        </td>";
        echo "
                        
                    </tr>";
      }
      echo "
                </tbody>
            </table>";
    } else {
      echo "
        <div class='bs-callout-pink callout-square callout-transparent mt-1'>
            <div class='media align-items-stretch'>
                <div class='media-left media-middle bg-pink callout-arrow-left position-relative p-2'>
                    <i class='fa fa-exclamation-triangle text-white'></i>
                </div>
                <div class='media-body p-1'>
                    <p>Actualmente no hay Trabajos registrados con la consulta anterior</p>
                </div>
            </div>
        </div>
        ";
    }
  }
  public static function listadoTrabajoEmp($idusuario)
  {
    $objEmpresa = trabajoDao::listadoTrabajoEmpresa($idusuario);
    //print_r($objEmpresa);
    if ($objEmpresa != false) {
      echo   "<table id='project-task-list' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
                    role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
                <thead>
                    <tr role='row'>
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-eye'></li>  Ver
                        </th>
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-city'></li> Entidad:</th>
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-clone'></li> Tipo:</th>
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-calendar-check'></li> Fecha Creación trabajo:</th>
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-calendar-alt'></li>  Fecha Cierre Trabajo:
                        </th>
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-columns'></li>  Estado:
                        </th>
                      
                        
                    </tr>
                </thead>
                <tbody>
                    <tr class='group'>
                      <td colspan='8'>
                        <h6 class='mb-0'>Última Actualización del Listado: 
                              <span class='text-bold-600'>" . date("d") . "-" . date("m") . "-" . date("Y") . "</span> - 
                              <span class='text-bold-600'>" . date("g") . " : " . date("i") . "</span>
                         </h6>
                      </td>
                    </tr>";
      foreach ($objEmpresa as $key => $value) {
        $entidad = entidadController::obtenerEntidad($objEmpresa[$key]->getId_entrada_trabajo());
        echo "
                    <tr role='row' class='even'>
                        <td><a href='" . MODULE_APP_SERVER . "trabajo/verFicha.php?id=" . $objEmpresa[$key]->getId_trabajo() . "' class='dropdown-item'><i class='fa fa-eye fa-2x'></i> </a></td>
                        <td class='parrafo'>
                          " . $entidad['entidad'] . "
                        </td>
                        <td class='parrafo'>
                          " . $entidad['tipo'] . "
                        </td>
                        <td class='parrafo'>
                          " . $objEmpresa[$key]->getFecha_creacio_trabajo() . "
                        </td>
                        
                        <td class='parrafo'>
                          " . $objEmpresa[$key]->getFecha_cierre_trabajo() . "
                        </td>
                      
                        <td class='parrafo'>
                          " . $objEmpresa[$key]->getEstado_trabajo() . "
                        </td>";
        echo "
                        
                    </tr>";
      }
      echo "
                </tbody>
            </table>";
    } else {
      echo "
        <div class='bs-callout-pink callout-square callout-transparent mt-1'>
            <div class='media align-items-stretch'>
                <div class='media-left media-middle bg-pink callout-arrow-left position-relative p-2'>
                    <i class='fa fa-exclamation-triangle text-white'></i>
                </div>
                <div class='media-body p-1'>
                    <p>Actualmente no hay Trabajos registrados con la consulta anterior</p>
                </div>
            </div>
        </div>
        ";
    }
  }

  public static function plantillaPreProyectoListado($idproyecto)
  {
    $objProyecto = trabajoController::proyectoId($idproyecto);
    ///print_r($objProyecto);
    $objPlantilla = plantillaController::plantillaId($objProyecto->getId_plantilla_alcance_proyecto());
    //print_r($objPlantilla);
    $objtGruposPlantilla = plantillaController::GrupoPlantillaListado($objPlantilla->getId_plantilla_alcance());
    //print_r($objtGruposPlantilla);
    foreach ($objtGruposPlantilla as $key => $value) {
      $objRequisito = plantillaController::grupoPlantillaItemListado($objtGruposPlantilla[$key]->getId_grupo_plantilla_alcance());
      //print_r($objRequisito);
      foreach ($objRequisito as $key => $value) {

        $objObservacion = trabajoController::observacionRequisitoPre($idproyecto, $objRequisito[$key]->getId_item_grupo_plantilla_certificacion());

        echo "<div class='card row'>
       <div class='alert bg-success alert-icon-left mb-2' role='alert'>
         <span class='alert-icon'><i class='fa fa-list'></i></span>
         <strong>" . $objRequisito[$key]->getEtiqueta_item_plantilla() . "</strong>
       </div>
       <table id=''
         class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
         role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
         <thead>
           <tr role='row'>
             <th class=' titulo'>
               <li class='fa fa-folder-open'></li> Título
             </th>
             <th class=' titulo'>
               <li class='fa fa-file-alt'></li> Descripción
             </th>
             <th class=' titulo'>
               <li class='fa fa-file-alt'></li> Estado
             </th>
           </tr>
         </thead>
         <tbody>
           <tr role='row' class='even'>
             <td class='reorder sorting_1'>
               " . $objRequisito[$key]->getEtiqueta_item_plantilla() . "
             </td>
             <td class='reorder sorting_1'>
               <textarea rows='9' readonly cols='125' style='height: 184px; width: 100%; margin-top: 0px; margin-bottom: 0px;' class='text-justify'>" . $objRequisito[$key]->getDescripcion_item_plantilla() . "</textarea>
             </td>
             <td class='reorder sorting_1'>
               <div class='form-group'>
                 <label for=''>
                   <h5 class='card-title'>
                     <li class='fa fa-swatchbook'></li>&nbsp;Estado:
                   </h5>
                 </label>
                 ";
        if ($objObservacion != false) {
          echo "
                    <select id='' name='estado" . $objRequisito[$key]->getId_item_grupo_plantilla_certificacion() . "' class='form-control'>";
          if ($objObservacion->getEstado_preauditoria() == "CUMPLE") {
            echo "
                     
                      <option value='CUMPLE'>CUMPLE</option>
                      <option value='NO CUMPLE'>NO CUMPLE</option>
                      <option value='NO APLICA'>NO APLICA</option>";
          } else {
            echo "
                      
                      <option value='NO CUMPLE'>NO CUMPLE</option>
                      <option value='CUMPLE'>CUMPLE</option>
                      <option value='NO APLICA'>NO APLICA</option>";
          }
          echo "</select>";
        } else {
          echo "
                    <select id='' name='estado" . $objRequisito[$key]->getId_item_grupo_plantilla_certificacion() . "' class='form-control'>
                      <option value='0'>Sin Estado</option>
                      <option value='CUMPLE'>CUMPLE</option>
                      <option value='NO CUMPLE'>NO CUMPLE</option>
                      <option value='NO APLICA'>NO APLICA</option>
                    </select>";
        }
        echo "</div>
             </td>
           </tr>
         </tbody>
       </table>
       <table id=''
         class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
         role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
         <tbody>
           <tr role='row' class='even'>
             <td class='reorder sorting_1'>
               <div class='form-group mb-1 col-sm-12 col-md-12'>
                 <label for='projectinput3'>
                   <h5 class='card-title'>
                     <span class='text-danger'>*</span>
                     <li class='fa fa-edit fa-2x'></li>
                     Observación :
                   </h5>
                 </label>";

        if ($objObservacion != false) {
          echo "
                  <textarea class='form-control ' id='textarea' name='textarea" . $objRequisito[$key]->getId_item_grupo_plantilla_certificacion() . "' rows='9' cols='125' style='height: 184px; width: 100%; margin-top: 0px; margin-bottom: 0px;' class='text-justify'>" . $objObservacion->getComentario_preauditoria() . "</textarea>";
        } else {
          echo "
                  <textarea class='form-control ' id='textarea' name='textarea" . $objRequisito[$key]->getId_item_grupo_plantilla_certificacion() . "' rows='9' cols='125' style='height: 184px; width: 100%; margin-top: 0px; margin-bottom: 0px;' class='text-justify'></textarea>";
        }

        echo "</div>
             </td>
             <td class='reorder sorting_1'>
               <div class='form-group col-sm-12 col-md-2 text-center mt-2'>
                 <a href='#" . $objRequisito[$key]->getId_item_grupo_plantilla_certificacion() . "' title='" . $objRequisito[$key]->getId_item_grupo_plantilla_certificacion() . "' id='validarElemento3'
                   class='btn capa round text-white waves-effect waves-light'>
                   <i class='fa fa-check fa-2x'></i>&nbsp; Validar</a>
               </div>
             </td>
           </tr>
         </tbody>
       </table>
       <div class='form-group col-sm-12 col-md-6 text-center mt-2'>
         <strong>
           <div id='respuesta" . $objRequisito[$key]->getId_item_grupo_plantilla_certificacion() . "'></div>
         </strong>
       </div>
     </div>";
      }
    }
  }
  public static function plantillaDiagnosticoProyectoListado($idproyecto)
  {
    $objProyecto = trabajoController::proyectoId($idproyecto);
    ///print_r($objProyecto);
    $objPlantilla = plantillaController::plantillaId($objProyecto->getId_plantilla_alcance_proyecto());
    //print_r($objPlantilla);
    $objtGruposPlantilla = plantillaController::GrupoPlantillaListado($objPlantilla->getId_plantilla_alcance());
    //print_r($objtGruposPlantilla);
    foreach ($objtGruposPlantilla as $key => $value) {
      $objRequisito = plantillaController::grupoPlantillaItemListado($objtGruposPlantilla[$key]->getId_grupo_plantilla_alcance());
      //print_r($objRequisito);
      foreach ($objRequisito as $key => $value) {

        $objObservacion = trabajoController::observacionRequisito($idproyecto, $objRequisito[$key]->getId_item_grupo_plantilla_certificacion());

        echo "<div class='card row'>
       <div class='alert bg-success alert-icon-left mb-2' role='alert'>
         <span class='alert-icon'><i class='fa fa-list'></i></span>
         <strong>" . $objRequisito[$key]->getEtiqueta_item_plantilla() . "</strong>
       </div>
       <table id=''
         class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
         role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
         <thead>
           <tr role='row'>
             <th class=' titulo'>
               <li class='fa fa-folder-open'></li> Título
             </th>
             <th class=' titulo'>
               <li class='fa fa-file-alt'></li> Descripción
             </th>
             <th class=' titulo'>
               <li class='fa fa-file-alt'></li> Estado
             </th>
           </tr>
         </thead>
         <tbody>
           <tr role='row' class='even'>
             <td class='reorder sorting_1'>
               " . $objRequisito[$key]->getEtiqueta_item_plantilla() . "
             </td>
             <td class='reorder sorting_1'>
               <textarea rows='9' readonly cols='125' style='height: 184px; width: 100%; margin-top: 0px; margin-bottom: 0px;' class='text-justify'>" . $objRequisito[$key]->getDescripcion_item_plantilla() . "</textarea>
             </td>
             <td class='reorder sorting_1'>
               <div class='form-group'>
                 <label for=''>
                   <h5 class='card-title'>
                     <li class='fa fa-swatchbook'></li>&nbsp;Estado:
                   </h5>
                 </label>
                 ";
        if ($objObservacion != false) {
          echo "
                    <select id='' name='estado" . $objRequisito[$key]->getId_item_grupo_plantilla_certificacion() . "' class='form-control'>";
          if ($objObservacion->getEstado_diagnostico() == "CUMPLE") {
            echo "
                     
                      <option value='CUMPLE'>CUMPLE</option>
                      <option value='NO CUMPLE'>NO CUMPLE</option>
                      <option value='NO APLICA'>NO APLICA</option>";
          } elseif ($objObservacion->getEstado_diagnostico() == "NO CUMPLE") {
            echo "
                      
                      <option value='NO CUMPLE'>NO CUMPLE</option>
                      <option value='CUMPLE'>CUMPLE</option>
                      <option value='NO APLICA'>NO APLICA</option>";
          } elseif ($objObservacion->getEstado_diagnostico() == "0") {
            echo "
                    
                      <option value='0'>Seleccionar:</option>
                      <option value='CUMPLE'>CUMPLE</option>
                      <option value='NO CUMPLE'>NO CUMPLE</option>
                      <option value='NO APLICA'>NO APLICA</option>
                    ";
          } else {
            echo "
                    <option value='NO APLICA'>NO APLICA</option>
                      <option value='NO CUMPLE'>NO CUMPLE</option>
                      <option value='CUMPLE'>CUMPLE</option>
                      ";
          }
          echo "</select>";
        }
        echo "</div>
             </td>
           </tr>
         </tbody>
       </table>
       <table id=''
         class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
         role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
         <tbody>
           <tr role='row' class='even'>
             <td class='reorder sorting_1'>
               <div class='form-group mb-1 col-sm-12 col-md-12'>
                 <label for='projectinput3'>
                   <h5 class='card-title'>
                     <span class='text-danger'>*</span>
                     <li class='fa fa-edit fa-2x'></li>
                     Observación :
                   </h5>
                 </label>";

        if ($objObservacion != false) {
          echo "
                  <textarea class='form-control ' id='textarea' name='textarea" . $objRequisito[$key]->getId_item_grupo_plantilla_certificacion() . "' rows='9' cols='125' style='height: 184px; width: 100%; margin-top: 0px; margin-bottom: 0px;' class='text-justify'>" . $objObservacion->getComentario_diagnostico() . "</textarea>";
        } else {
          echo "
                  <textarea class='form-control ' id='textarea' name='textarea" . $objRequisito[$key]->getId_item_grupo_plantilla_certificacion() . "' rows='9' cols='125' style='height: 184px; width: 100%; margin-top: 0px; margin-bottom: 0px;' class='text-justify'></textarea>";
        }

        echo "</div>
             </td>
             <td class='reorder sorting_1'>
               <div class='form-group col-sm-12 col-md-2 text-center mt-2'>
                 <a href='#" . $objRequisito[$key]->getId_item_grupo_plantilla_certificacion() . "' title='" . $objRequisito[$key]->getId_item_grupo_plantilla_certificacion() . "' id='validarElemento'
                   class='btn capa round text-white waves-effect waves-light'>
                   <i class='fa fa-check fa-2x'></i>&nbsp; Validar</a>
               </div>
             </td>
           </tr>
         </tbody>
       </table><br><br>
       <div class='form-group col-sm-12 col-md-6 text-center mt-2'>
         <strong>
           <div id='respuesta" . $objRequisito[$key]->getId_item_grupo_plantilla_certificacion() . "'></div>
         </strong>
       </div>
     </div><br><br>";
      }
    }
  }
  public static function plantillaDiagnosticoProyectoListadoInforme($idproyecto)
  {
    $objProyecto = trabajoController::proyectoId($idproyecto);
    ///print_r($objProyecto);
    $objPlantilla = plantillaController::plantillaId($objProyecto->getId_plantilla_alcance_proyecto());
    //print_r($objPlantilla);
    $objtGruposPlantilla = plantillaController::GrupoPlantillaListado($objPlantilla->getId_plantilla_alcance());
    //print_r($objtGruposPlantilla);
    foreach ($objtGruposPlantilla as $key => $value) {
      $objRequisito = plantillaController::grupoPlantillaItemListado($objtGruposPlantilla[$key]->getId_grupo_plantilla_alcance());
      //print_r($objRequisito);
      echo "
      <table id='' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable' role='grid' aria-describedby='project-task-list_info' style=' position: relative;'>
      <thead class='capa '>
          <tr role='row' class='capa white'>
              <th class='' rowspan='1' colspan='1'>Numeral " . $objtGruposPlantilla[$key]->getEtiqueta_grupo_plantilla() . "
              </th>
              <th class='' rowspan='1' colspan='1'>  " . $objtGruposPlantilla[$key]->getTitulo_grupo_plantilla() . "
              </th>
              
             
          </tr>
      </thead>
      </table>";
      foreach ($objRequisito as $key => $value) {
        $objObservacion = trabajoController::observacionRequisito($idproyecto, $objRequisito[$key]->getId_item_grupo_plantilla_certificacion());
        echo "<table id='' class='black table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable' role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
              <thead >
                  <tr role='row'>
                      <th class='' rowspan='1' colspan='1'><li class='fa fa-folder-open'></li>Sub  Numeral
                      </th>
                      <th class='' rowspan='1' colspan='1'><li class='fa fa-file-alt'></li>  Descripción del Requisito
                      </th>
                      
                      <th class='' rowspan='1' colspan='1'><li class='fa fa-file-alt'></li>  C
                      </th>
                      <th class='' rowspan='1' colspan='1'><li class='fa fa-file-alt'></li>  NC
                      </th>
                      <th class='' rowspan='1' colspan='1'><li class='fa fa-file-alt'></li> NA
                      </th>
                  </tr>
              </thead>
              <tbody>
                <tr role='row' class='even'>
                  <td class='reorder sorting_1'>
                    " . $objRequisito[$key]->getEtiqueta_item_plantilla() . "
                  </td>
                  <td>
                    <textarea readonly='' rows='9' cols='125' style='height: 200px; width: 100%; margin-top: 0px; margin-bottom: 0px; border:solid 1px black;'  class='text-justify'>" . $objRequisito[$key]->getDescripcion_item_plantilla() . "</textarea>
                    <br><br>                        
                    <span class='parrafo'>Comentario del auditor.</span>                           
                    <br><br>
                    <textarea readonly='' rows='12' cols='125' style='height: 200px; width: 100%; margin-top: 0px; margin-bottom: 0px; border:solid 1px black;' class='text-justify'>" . $objObservacion->getComentario_diagnostico() . "</textarea>
                  </td>";


        // <td class='reorder sorting_1'></td>
        // <td class='reorder sorting_1'></td>
        // <td class='reorder sorting_1'><span class='badge badge-success badge-info'><li class='fa fa-times fa-3x'></li></span>
        // </td>
        switch ($objObservacion->getEstado_diagnostico()) {
          case 'CUMPLE':
            echo "
                          <td class='reorder sorting_1'><span class='badge badge-success '><li class='fa fa-times fa-3x'></li></span></td>
                          <td class='reorder sorting_1'></td>
                          <td class='reorder sorting_1'></td>";
            break;
          case 'NO CUMPLE':
            echo "
                          <td class='reorder sorting_1'></td>
                          <td class='reorder sorting_1'><span class='badge badge-danger '><li class='fa fa-times fa-3x'></li></span></td>
                          <td class='reorder sorting_1'></td>";
            break;
          case 'NO APLICA':
            echo "
                          <td class='reorder sorting_1'></td>
                          <td class='reorder sorting_1'>
                          <td class='reorder sorting_1'><span class='badge badge-warning '><li class='fa fa-times fa-3x'></li></span></td></td>";
            break;
        }
        echo "
                </tr>
              </tbody>
           </table>";
      }
    }
  }
  public static function plantillaDiagnosticoProyectoListadoInformepdf($idproyecto)
  {
    $objProyecto = trabajoController::proyectoId($idproyecto);
    ///print_r($objProyecto);
    $objPlantilla = plantillaController::plantillaId($objProyecto->getId_plantilla_alcance_proyecto());
    //print_r($objPlantilla);
    $objtGruposPlantilla = plantillaController::GrupoPlantillaListado($objPlantilla->getId_plantilla_alcance());
    //print_r($objtGruposPlantilla);
    foreach ($objtGruposPlantilla as $key => $value) {
      $objRequisito = plantillaController::grupoPlantillaItemListado($objtGruposPlantilla[$key]->getId_grupo_plantilla_alcance());
      //print_r($objRequisito);
      echo "
      <table id='test' class='table table-responsive-md  row-grouping display no-wrap icheck table-middle ' style=' position: relative;'>
      <thead >
          <tr role='row'>
              <th class='parrafo card-title text-black' rowspan='1' colspan='1'><li class='fa fa-caret-right fa-2x'></li>&nbsp;Numeral " . $objtGruposPlantilla[$key]->getEtiqueta_grupo_plantilla() . "
              </th>
              <th class='parrafo card-title text-black' rowspan='1' colspan='1'>  " . $objtGruposPlantilla[$key]->getTitulo_grupo_plantilla() . "
              </th>
              
             
          </tr>
      </thead>
      </table>
      <div class='float-sm-left'>&nbsp;</div><br>
      <div class='float-sm-left'>&nbsp;</div><br>";
      foreach ($objRequisito as $key => $value) {
        $objObservacion = trabajoController::observacionRequisito($idproyecto, $objRequisito[$key]->getId_item_grupo_plantilla_certificacion());
        echo "<table id='xcxc' class='black table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'  style='position: relative;'>
              <thead >
                  <tr role='row'>
                      <th class='parrafo card-title text-black' ><li class='fa fa-chevron-right fa-2x'></li>&nbsp;Sub
                      </th>
                      <th class='parrafo card-title text-black' ><li class='fa fa-tag fa-2x'></li>&nbsp; Descripción del Requisito
                      </th>
                      
                      <th class='parrafo card-title text-black' ><li class='fa fa-check-circle fa-2x'></li>&nbsp;C
                      </th>
                      <th class='parrafo card-title text-black' ><li class='fa fa-check-circle fa-2x'></li>&nbsp;NC
                      </th>
                      <th class='parrafo card-title text-black ' ><li class='fa fa-check-circle fa-2x'></li>&nbsp;NA
                      </th>
                  </tr>
              </thead>
              <tbody>
                <tr role='row' class='even'>
                  <td class='reorder sorting_1'>
                    " . $objRequisito[$key]->getEtiqueta_item_plantilla() . "
                  </td>
                  <td>
                    <textarea readonly='' rows='9' cols='125' style='height: 120px; width: 100%; margin-top: 0px; margin-bottom: 0px;'  class='text-justify parrafo card-title text-black'>" . $objRequisito[$key]->getDescripcion_item_plantilla() . "</textarea>
                    <br><br>                        
                    <span class='parrafo card-title text-black'>Comentario del auditor.</span>                           
                    <br><br>
                    <textarea readonly='' rows='12' cols='125' style='height: 120px; width: 100%; margin-top: 0px; margin-bottom: 0px; ' class='text-justify parrafo card-title text-black'>" . $objObservacion->getComentario_diagnostico() . "</textarea>
                  </td>";
        switch ($objObservacion->getEstado_diagnostico()) {
          case 'CUMPLE':
            echo "
                          <td class='parrafo card-title text-black'><li class='fa fa-times fa-3x'></span></td>
                          <td class=''></td>
                          <td class=''></td>";
            break;
          case 'NO CUMPLE':
            echo "
                          <td class='reorder sorting_1'></td>
                          <td class='parrafo card-title text-black'><li class='fa fa-times fa-3x'></li></td>
                          <td class='reorder sorting_1'></td>";
            break;
          case 'NO APLICA':
            echo "
                          <td class='reorder sorting_1'></td>
                          <td class='reorder sorting_1'>
                          <td class='parrafo card-title text-black'><li class='fa fa-times fa-3x'></li></td></td>";
            break;
        }
        echo "
                </tr>
              </tbody>
           </table>
           <div class='float-sm-left'>&nbsp;</div><br>
           <div class='float-sm-left'>&nbsp;</div><br>
           <div class='float-sm-left'>&nbsp;</div><br>
           <div class='float-sm-left'>&nbsp;</div><br>
           <div class='float-sm-left'>&nbsp;</div><br>
           
           ";
      }
    }
  }
  public static function plantillaPreauditoriaProyectoListadoInforme($idproyecto)
  {
    $objProyecto = trabajoController::proyectoId($idproyecto);
    ///print_r($objProyecto);
    $objPlantilla = plantillaController::plantillaId($objProyecto->getId_plantilla_alcance_proyecto());
    //print_r($objPlantilla);
    $objtGruposPlantilla = plantillaController::GrupoPlantillaListado($objPlantilla->getId_plantilla_alcance());
    //print_r($objtGruposPlantilla);
    foreach ($objtGruposPlantilla as $key => $value) {
      $objRequisito = plantillaController::grupoPlantillaItemListado($objtGruposPlantilla[$key]->getId_grupo_plantilla_alcance());
      //print_r($objRequisito);
      echo "
      <table id='' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable' role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
      <thead class='capa white'>
          <tr role='row'>
              <th class='parrafo' rowspan='1' colspan='1'>Numeral " . $objtGruposPlantilla[$key]->getEtiqueta_grupo_plantilla() . "
              </th>
              <th class='parrafo' rowspan='1' colspan='1'>Descripcion del Requisito  " . $objtGruposPlantilla[$key]->getTitulo_grupo_plantilla() . "
              </th>
              
             
          </tr>
      </thead>
      </table>";
      foreach ($objRequisito as $key => $value) {
        $objObservacion = trabajoController::observacionRequisitoPre($idproyecto, $objRequisito[$key]->getId_item_grupo_plantilla_certificacion());
        echo "<table id='' class='black table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable' role='grid' aria-describedby='project-task-list_info' style='position: relative;' style='border:solid 1px black;'>
              <thead class='capa white' >
                  <tr role='row'>
                      <th class='parrafo' rowspan='1' colspan='1'><li class='fa fa-folder-open'></li>Sub  Numeral
                      </th>
                      <th class='parrafo' rowspan='1' colspan='1'><li class='fa fa-file-alt'></li>  Descripción del Requisito
                      </th>
                   
                  </tr>
              </thead>
              <tbody>
                <tr role='row' class='even'>
                  <td class='reorder sorting_1'>
                    " . $objRequisito[$key]->getEtiqueta_item_plantilla() . "
                  </td>
                  <td>
                    <textarea readonly='' rows='9' cols='125' style='height: 120px; width: 100%; margin-top: 0px; margin-bottom: 0px; border:solid 1px black;'  class='text-justify parrafo'>" . $objRequisito[$key]->getDescripcion_item_plantilla() . "</textarea>
                    <br><br>                        
                    <span class='parrafo'>Comentario del auditor.</span>                           
                    <br><br>
                    <textarea readonly='' rows='12' cols='125' style='height: 120px; width: 100%; margin-top: 0px; margin-bottom: 0px; border:solid 1px black;' class='text-justify parrafo'>" . $objObservacion->getComentario_preauditoria() . "</textarea>
                  </td>";


        // <td class='reorder sorting_1'></td>
        // <td class='reorder sorting_1'></td>
        // <td class='reorder sorting_1'><span class='badge badge-success badge-info'><li class='fa fa-times fa-3x'></li></span>
        // </td>
        // switch ($objObservacion->getEstado_preauditoria() ) {
        //   case 'CUMPLE':
        //     echo "
        //         <td class='reorder sorting_1'><span class='badge badge-success '><li class='fa fa-times fa-3x'></li></span></td>
        //         <td class='reorder sorting_1'></td>
        //         <td class='reorder sorting_1'></td>";
        //   break;
        //   case 'NO CUMPLE':
        //     echo "
        //         <td class='reorder sorting_1'></td>
        //         <td class='reorder sorting_1'><span class='badge badge-danger '><li class='fa fa-times fa-3x'></li></span></td>
        //         <td class='reorder sorting_1'></td>";
        //   break;
        //   case 'NO APLICA':
        //     echo "
        //         <td class='reorder sorting_1'></td>
        //         <td class='reorder sorting_1'>
        //         <td class='reorder sorting_1'><span class='badge badge-warning '><li class='fa fa-times fa-3x'></li></span></td></td>";
        //   break;


        // }
        echo "
                </tr>
              </tbody>
           </table><br><hr><br>";
      }
    }
  }
  public static function plantillaPreauditoriaProyectoListadoInformePDF($idproyecto)
  {
    $objProyecto = trabajoController::proyectoId($idproyecto);
    ///print_r($objProyecto);
    $objPlantilla = plantillaController::plantillaId($objProyecto->getId_plantilla_alcance_proyecto());
    //print_r($objPlantilla);
    $objtGruposPlantilla = plantillaController::GrupoPlantillaListado($objPlantilla->getId_plantilla_alcance());
    //print_r($objtGruposPlantilla);
    foreach ($objtGruposPlantilla as $key => $value) {
      $objRequisito = plantillaController::grupoPlantillaItemListado($objtGruposPlantilla[$key]->getId_grupo_plantilla_alcance());
      //print_r($objRequisito);
      echo "
      <table id='' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable' role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
      <thead class=''>
          <tr role='row'>
              <th class='parrafo' rowspan='1' colspan='1'>Numeral " . $objtGruposPlantilla[$key]->getEtiqueta_grupo_plantilla() . "
              </th>
              <th class='parrafo' rowspan='1' colspan='1'>Descripción del Requisito  " . $objtGruposPlantilla[$key]->getTitulo_grupo_plantilla() . "
              </th>
              
             
          </tr>
      </thead>
     ";
      foreach ($objRequisito as $key => $value) {
        $objObservacion = trabajoController::observacionRequisitoPre($idproyecto, $objRequisito[$key]->getId_item_grupo_plantilla_certificacion());
        echo "
              <thead class='' >
                  <tr role='row'>
                      <th class='parrafo' rowspan='1' colspan='1'><li class='fa fa-folder-open'></li>Sub  Numeral
                      </th>
                      <th class='parrafo' rowspan='1' colspan='1'><li class='fa fa-file-alt'></li>  Descripción del Requisito
                      </th>
                   
                  </tr>
              </thead>
              <tbody>
                <tr role='row' class='even'>
                  <td class='reorder sorting_1'>
                    " . $objRequisito[$key]->getEtiqueta_item_plantilla() . "
                  </td>
                  <td>
                    <textarea readonly='' rows='9' cols='125' style='height: 120px; width: 100%; margin-top: 0px; margin-bottom: 0px; border:solid 1px black;'  class='text-justify parrafo'>" . $objRequisito[$key]->getDescripcion_item_plantilla() . "</textarea>
                    <br><br>                        
                    <span class='parrafo'>Comentario del auditor.</span>                           
                    <br><br>
                    <textarea readonly='' rows='12' cols='125' style='height: 120px; width: 100%; margin-top: 0px; margin-bottom: 0px; border:solid 1px black;' class='text-justify parrafo'>" . $objObservacion->getComentario_preauditoria() . "</textarea>
                  </td>";
        echo "
                </tr>
              </tbody>
           ";
      }
      echo "</table>";
    }
  }
  public static function plantillaDiagnosticoProyectoListadoInforme3($idproyecto)
  {
    $objProyecto = trabajoController::proyectoId($idproyecto);
    ///print_r($objProyecto);
    $objPlantilla = plantillaController::plantillaId($objProyecto->getId_plantilla_alcance_proyecto());
    //print_r($objPlantilla);
    $objtGruposPlantilla = plantillaController::GrupoPlantillaListado($objPlantilla->getId_plantilla_alcance());
    //print_r($objtGruposPlantilla);
    $arrayTabla = array();

    $cu = 0;
    $no = 0;
    $na = 0;

    foreach ($objtGruposPlantilla as $key => $value) {
      $objRequisito = plantillaController::grupoPlantillaItemListado($objtGruposPlantilla[$key]->getId_grupo_plantilla_alcance());
      foreach ($objRequisito as $key => $value) {

        $objObservacion = trabajoController::observacionRequisito($idproyecto, $objRequisito[$key]->getId_item_grupo_plantilla_certificacion());
        switch ($objObservacion->getEstado_diagnostico()) {
          case 'CUMPLE':
            $cu++;
            break;
          case 'NO CUMPLE':
            $no++;
            break;
          case 'NO APLICA':
            $na++;
            break;
        }
      }
    }
    return array($cu,  $no, $na);
  }
  public static function plantillaDiagnosticoProyectoListadoInforme4($idproyecto)
  {
    $objProyecto = trabajoController::proyectoId($idproyecto);
    ///print_r($objProyecto);
    $objPlantilla = plantillaController::plantillaId($objProyecto->getId_plantilla_alcance_proyecto());
    //print_r($objPlantilla);
    $objtGruposPlantilla = plantillaController::GrupoPlantillaListado($objPlantilla->getId_plantilla_alcance());
    //print_r($objtGruposPlantilla);
    $arrayTabla = array();
    $numeral = "";
    $cu = 0;
    $no = 0;
    $na = 0;
    $capitulo = "";

    foreach ($objtGruposPlantilla as $key => $value) {
      $numeral = $objtGruposPlantilla[$key]->getEtiqueta_grupo_plantilla();
      $capitulo = $objtGruposPlantilla[$key]->getTitulo_grupo_plantilla();
      $objRequisito = plantillaController::grupoPlantillaItemListado($objtGruposPlantilla[$key]->getId_grupo_plantilla_alcance());
      foreach ($objRequisito as $key => $value) {

        $objObservacion = trabajoController::observacionRequisito($idproyecto, $objRequisito[$key]->getId_item_grupo_plantilla_certificacion());
        switch ($objObservacion->getEstado_diagnostico()) {
          case 'CUMPLE':
            $cu++;
            break;
          case 'NO CUMPLE':
            $no++;
            break;
          case 'NO APLICA':
            $na++;
            break;
        }
      }
      $arrayObj = array($numeral, $capitulo, $cu, $no, $na);
      array_push($arrayTabla, $arrayObj);
      $cu = 0;
      $no = 0;
      $na = 0;
    }
    return $arrayTabla;
  }
  public static function plantillaDiagnosticoProyectoListadoInforme2($idproyecto)
  {
    $objProyecto = trabajoController::proyectoId($idproyecto);
    ///print_r($objProyecto);
    $objPlantilla = plantillaController::plantillaId($objProyecto->getId_plantilla_alcance_proyecto());
    //print_r($objPlantilla);
    $objtGruposPlantilla = plantillaController::GrupoPlantillaListado($objPlantilla->getId_plantilla_alcance());
    //print_r($objtGruposPlantilla);
    $arrayTabla = array();
    $numeral = "";
    $capitulo = "";
    $cu = 0;
    $no = 0;
    $na = 0;
    $totalP = 0;
    $pregunVal = 0;
    $puntaje = 0;
    $porcentaje = 0;
    foreach ($objtGruposPlantilla as $key => $value) {
      $numeral = $objtGruposPlantilla[$key]->getEtiqueta_grupo_plantilla();
      $capitulo = $objtGruposPlantilla[$key]->getTitulo_grupo_plantilla();
      $objRequisito = plantillaController::grupoPlantillaItemListado($objtGruposPlantilla[$key]->getId_grupo_plantilla_alcance());
      foreach ($objRequisito as $key => $value) {
        $totalP++;
        $objObservacion = trabajoController::observacionRequisito($idproyecto, $objRequisito[$key]->getId_item_grupo_plantilla_certificacion());
        switch ($objObservacion->getEstado_diagnostico()) {
          case 'CUMPLE':
            $cu++;
            $puntaje++;
            $pregunVal++;
            break;
          case 'NO CUMPLE':
            $pregunVal++;
            $no++;
            break;
          case 'NO APLICA':
            $na++;
            break;
        }
        if (floatval($pregunVal) == 0) {
          $porcentaje = 0;
        } else {
          $porcentaje = (floatval($puntaje) /  floatval($pregunVal)) * 100;
        }
      }
      $arrayObj = array($numeral, $capitulo, $cu, $no, $na, $totalP, $pregunVal, $puntaje, $porcentaje);
      array_push($arrayTabla, $arrayObj);
      $cu = 0;
      $no = 0;
      $na = 0;
      $totalP = 0;
      $pregunVal = 0;
      $puntaje = 0;
      $porcentaje = 0;
    }
    echo "<table id='project-task-list' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable' role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
      <thead>
        <tr role='row'>
          <th class='' rowspan='1' colspan='1'><li class='fa fa-list-ol'></li>  Num
          </th>
          <th class='' rowspan='1' colspan='1'><li class='fa fa-tasks'></li> Capítulo
          </th>
          <th class='' rowspan='1' colspan='1'><li class='fa fa-check'></li> CU
          </th>
          <th class='' rowspan='1' colspan='1'><li class='fa fa-minus'></li> NC
          </th>
          
          <th class='' rowspan='1' colspan='1'><li class='fa fa-tasks'></li> N/A
          </th>
          <th class='' rowspan='1' colspan='1'><li class='fa fa-tasks'></li> Total Preg
          </th>
          <th class='' rowspan='1' colspan='1'><li class='fa fa-tasks'></li> Preg Val
          </th>
          <th class='' rowspan='1' colspan='1'><li class='fa fa-tasks'></li> Puntaje
          </th>
          <th class='' rowspan='1' colspan='1'><li class='fa fa-tasks'></li> %
          </th>
          
        </tr>
      </thead>
      <tbody>";

    foreach ($arrayTabla  as $key => $value) {

      $sumaCU += $arrayTabla[$key][2];
      $sumaNC += $arrayTabla[$key][3];
      $sumaNA += $arrayTabla[$key][4];
      $sumaPreg += $arrayTabla[$key][5];
      $sumaTotalPregValidas += $arrayTabla[$key][6];
      $sumaPuntaje += $arrayTabla[$key][7];
      $porcentajeTotal = round(100 * ($sumaPuntaje / $sumaTotalPregValidas), 2);
      echo "
        <tr role='row' class='even'>
          <td class='reorder sorting_1'>" . $arrayTabla[$key][0] . "</td>
          <td class='reorder sorting_1'>" . $arrayTabla[$key][1] . "</td>
          <td class='reorder sorting_1'>" . $arrayTabla[$key][2] . "</td>
          <td class='reorder sorting_1'>" . $arrayTabla[$key][3] . "</td>
          <td class='reorder sorting_1'>" . $arrayTabla[$key][4] . "</td>
          <td class='reorder sorting_1'>" . $arrayTabla[$key][5] . "</td>
          <td class='reorder sorting_1'>" . $arrayTabla[$key][6] . "</td>
          <td class='reorder sorting_1'>" . $arrayTabla[$key][7] . "</td>
          <td class='reorder sorting_1'>" . round($arrayTabla[$key][8], 2) . "</td>
          
  
        </tr>";
    }

    //hernan agregar consolidados.
    echo "
        <tr role='row' class='even'>
          
          <td class='reorder sorting_1' colspan='2'>Totales</td>
          <td class='reorder sorting_1'>" . $sumaCU . "</td>
          <td class='reorder sorting_1'>" . $sumaNC . "</td>
          <td class='reorder sorting_1'>" . $sumaNA . "</td>
          <td class='reorder sorting_1'>" . $sumaPreg . "</td>
          <td class='reorder sorting_1'>" . $sumaTotalPregValidas . "</td>
          <td class='reorder sorting_1'>" . $sumaPuntaje . "</td>
          <td class='reorder sorting_1'>" . $porcentajeTotal . "</td>
          
                   
  
        </tr>";

    echo " 
    </tbody>
  </table>";
  }
  public static function plantillaDiagnosticoProyectoListadoInforme2pdf($idproyecto)
  {
    $objProyecto = trabajoController::proyectoId($idproyecto);
    ///print_r($objProyecto);
    $objPlantilla = plantillaController::plantillaId($objProyecto->getId_plantilla_alcance_proyecto());
    //print_r($objPlantilla);
    $objtGruposPlantilla = plantillaController::GrupoPlantillaListado($objPlantilla->getId_plantilla_alcance());
    //print_r($objtGruposPlantilla);
    $arrayTabla = array();
    $numeral = "";
    $capitulo = "";
    $cu = 0;
    $no = 0;
    $na = 0;
    $totalP = 0;
    $pregunVal = 0;
    $puntaje = 0;
    $porcentaje = 0;
    foreach ($objtGruposPlantilla as $key => $value) {
      $numeral = $objtGruposPlantilla[$key]->getEtiqueta_grupo_plantilla();
      $capitulo = $objtGruposPlantilla[$key]->getTitulo_grupo_plantilla();
      $objRequisito = plantillaController::grupoPlantillaItemListado($objtGruposPlantilla[$key]->getId_grupo_plantilla_alcance());
      foreach ($objRequisito as $key => $value) {
        $totalP++;
        $objObservacion = trabajoController::observacionRequisito($idproyecto, $objRequisito[$key]->getId_item_grupo_plantilla_certificacion());
        switch ($objObservacion->getEstado_diagnostico()) {
          case 'CUMPLE':
            $cu++;
            $puntaje++;
            $pregunVal++;
            break;
          case 'NO CUMPLE':
            $pregunVal++;
            $no++;
            break;
          case 'NO APLICA':
            $na++;
            break;
        }
        if (floatval($pregunVal) == 0) {
          $porcentaje = 0;
        } else {
          $porcentaje = (floatval($puntaje) /  floatval($pregunVal)) * 100;
        }
      }
      $arrayObj = array($numeral, $capitulo, $cu, $no, $na, $totalP, $pregunVal, $puntaje, $porcentaje);
      array_push($arrayTabla, $arrayObj);
      $cu = 0;
      $no = 0;
      $na = 0;
      $totalP = 0;
      $pregunVal = 0;
      $puntaje = 0;
      $porcentaje = 0;
    }
    echo "<table style='zoom:110%' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'  style='position: relative;'>
      <thead>
        <tr role='row'>
          <th class='parrafo card-title text-black ' ><li class='fa fa-list-ol'></li>  Num
          </th>
          <th class='parrafo card-title text-black ' ><li class='fa fa-tasks'></li> Capítulo
          </th>
          <th class='parrafo card-title text-black ' '><li class='fa fa-check'></li> CU
          </th>
          <th class='parrafo card-title text-black '><li class='fa fa-minus'></li> NC
          </th>
          
          <th class='parrafo card-title text-black ' ><li class='fa fa-tasks'></li> N/A
          </th>
          <th class='parrafo card-title text-black ' ><li class='fa fa-tasks'></li> Total Preg
          </th>
          <th class='parrafo card-title text-black ' ><li class='fa fa-tasks'></li> Preg Val
          </th>
          <th class='parrafo card-title text-black ' ><li class='fa fa-tasks'></li> Puntaje
          </th>
          <th class='parrafo card-title text-black ' '><li class='fa fa-tasks'></li> %
          </th>
          
        </tr>
      </thead>
      <tbody>";

    foreach ($arrayTabla  as $key => $value) {

      $sumaCU += $arrayTabla[$key][2];
      $sumaNC += $arrayTabla[$key][3];
      $sumaNA += $arrayTabla[$key][4];
      $sumaPreg += $arrayTabla[$key][5];
      $sumaTotalPregValidas += $arrayTabla[$key][6];
      $sumaPuntaje += $arrayTabla[$key][7];
      $porcentajeTotal = round(100 * ($sumaPuntaje / $sumaTotalPregValidas), 2);
      echo "
        <tr role='row' class='even'>
          <td class='parrafo card-title text-black '>" . $arrayTabla[$key][0] . "</td>
          <td class='parrafo card-title text-black '>" . $arrayTabla[$key][1] . "</td>
          <td class='parrafo card-title text-black '>" . $arrayTabla[$key][2] . "</td>
          <td class='parrafo card-title text-black '>" . $arrayTabla[$key][3] . "</td>
          <td class='parrafo card-title text-black '>" . $arrayTabla[$key][4] . "</td>
          <td class='parrafo card-title text-black '>" . $arrayTabla[$key][5] . "</td>
          <td class='parrafo card-title text-black '>" . $arrayTabla[$key][6] . "</td>
          <td class='parrafo card-title text-black '>" . $arrayTabla[$key][7] . "</td>
          <td class='parrafo card-title text-black '>" . round($arrayTabla[$key][8], 2) . "</td>
          
  
        </tr>";
    }
    //hernan agregar consolidados.
    echo "
    <tr role='row' class='even'>
      
      <td class='reorder sorting_1' colspan='2'>Totales</td>
      <td class='reorder sorting_1'>" . $sumaCU . "</td>
      <td class='reorder sorting_1'>" . $sumaNC . "</td>
      <td class='reorder sorting_1'>" . $sumaNA . "</td>
      <td class='reorder sorting_1'>" . $sumaPreg . "</td>
      <td class='reorder sorting_1'>" . $sumaTotalPregValidas . "</td>
      <td class='reorder sorting_1'>" . $sumaPuntaje . "</td>
      <td class='reorder sorting_1'>" . $porcentajeTotal . "</td>
      
               
    </tr>";
    echo " 
    </tbody>
  </table>";
  }
  /* modificacion*/
  public static function plantillaImplementacionProyectoListadoInforme($idproyecto)
  {
    $objProyecto = trabajoController::proyectoId($idproyecto);
    $objPlantilla = plantillaController::plantillaId($objProyecto->getId_plantilla_alcance_proyecto());
    $objtGruposPlantilla = plantillaController::GrupoPlantillaListado($objPlantilla->getId_plantilla_alcance());
    $fechas =  trabajoDao::fechasReporte($objProyecto->getId_proyecto());
    /*modifificado hernan*/
    $VISIBLES = 6;
    $nFechas = count($fechas);
    $comienzoFechas = $nFechas - $VISIBLES;
    //------------------------------------------- 
    echo "
      <table id='' class='table  table-column' role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
        <thead class='bg-success white'>
          <tr role='row'>
              <th class='' rowspan='1' colspan='1'>Avances : 
              </th>";

    echo "<th class='parrafo' >Fechas de Trabajo&nbsp;";
    for ($i = 1; $i < count($fechas); $i++) {
      if ($i >= $comienzoFechas) {
        echo "" . $fechas[$i] . " &nbsp;|&nbsp;";
      }
    }

    echo "</th>";
    echo "  </tr>
        </thead>
      </table>";
    $cun = 0;
    $fechaProcesadas = array();
    $arrayCapitulo = array();
    $arrayConsolidadosFechas = array();
    $porAnterior_ = 0;

    foreach ($objtGruposPlantilla as $key_2f => $value) {
      $objRequisito = plantillaController::grupoPlantillaItemListado($objtGruposPlantilla[$key_2f]->getId_grupo_plantilla_alcance());
      $arrayCapitulo[$objtGruposPlantilla[$key_2f]->getId_grupo_plantilla_alcance()] = "";
      $arrayFechas = array();
      foreach ($fechas as $key_fechas_l => $value) {
        $arrayFechas[$fechas[$key_fechas_l]] = 0;
      }
      $arrayCapitulo[$objtGruposPlantilla[$key_2f]->getId_grupo_plantilla_alcance()] = $arrayFechas;
    }
    
   
    foreach ($objtGruposPlantilla as $key_2f => $value) {
      $objRequisito = plantillaController::grupoPlantillaItemListado($objtGruposPlantilla[$key_2f]->getId_grupo_plantilla_alcance());
      foreach ($objRequisito as $key_req => $value) {
        foreach ($fechas as $key_fechas_ => $value) {  //array (1[2019/12/04[0]   2019/12/05[0]],2,3,4,5,)
          $objt = trabajoDao::verificarFecha($objRequisito[$key_req]->getId_item_grupo_plantilla_certificacion(), $fechas[$key_fechas_], $idproyecto) ;
          $acu = 0;
          if ($objt != false) {
            $val = $arrayCapitulo[$objRequisito[$key_req]->getId_grupo_plantilla_certificacion()][$fechas[$key_fechas_]];
            $acu = floatval($val) + floatval($objt[0]->getPorcentaje_avance());
            $arrayCapitulo[$objRequisito[$key_req]->getId_grupo_plantilla_certificacion()][$fechas[$key_fechas_]] = $acu;
            $porAnterior_ = $objt[0]->getPorcentaje_avance();
          } else {
            $val = $arrayCapitulo[$objRequisito[$key_req]->getId_grupo_plantilla_certificacion()][$fechas[$key_fechas_]];
            $acu = floatval($val) + floatval($porAnterior_);
            $arrayCapitulo[$objRequisito[$key_req]->getId_grupo_plantilla_certificacion()][$fechas[$key_fechas_]] = $acu;
          }
        }
      }
    }
    

    foreach ($objtGruposPlantilla as $key2 => $value) {
      $objRequisito = plantillaController::grupoPlantillaItemListado($objtGruposPlantilla[$key2]->getId_grupo_plantilla_alcance());
      foreach ($objRequisito as $key => $value) {
        $objObservacion = trabajoController::observacionRequisitoImplementacion($idproyecto, $objRequisito[$key]->getId_item_grupo_plantilla_certificacion());

        echo "<table id='' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable' role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
             ";
        if (intval($cun) == 0) {
          echo "
                <tr role='row' class='capa white'>
                  <th> Numeral &nbsp;" . $objtGruposPlantilla[$key2]->getEtiqueta_grupo_plantilla() . "</th>
                  <th>  " . $objtGruposPlantilla[$key2]->getTitulo_grupo_plantilla() . "</th>";
          $fechas_2 =  trabajoDao::fechasReporte($idproyecto);
          $por = 0;
          for ($key_0 = 1; $key_0 < count($fechas_2); $key_0++) {
            $porcentajeR = $arrayCapitulo[$objtGruposPlantilla[$key2]->getId_grupo_plantilla_alcance()][$fechas_2[$key_0]];
            $ncap = trabajoDao::ncapGrupo($objtGruposPlantilla[$key2]->getId_grupo_plantilla_alcance());
            $porcentajeR = floatval($porcentajeR) / $ncap;
            $arrayConsolidadosFechas[$objtGruposPlantilla[$key2]->getEtiqueta_grupo_plantilla()][$fechas_2[$key_0]] = $porcentajeR;
            if ($key_0 >= $comienzoFechas) {
              echo "<th> Avance " . round($porcentajeR, 0) . "%";
              echo "</th> ";
            }
          }
          echo "</tr>";
          $cun++;
        }
        echo "
                  <tr role='row'>
                      <th class='' ><li class='fa fa-folder-open'></li>Numeral</th>
                      <th class='' ><li class='fa fa-file-alt'></li>  Descripción del Requisito
                      </th>";
        $fechas_3 =  trabajoDao::fechasReporte($idproyecto);
        for ($key3 = 1; $key3 < count($fechas_3); $key3++) {
          if ($key3 >= $comienzoFechas) {
            echo "<th> " . $fechas_3[$key3] . "</th> ";
          }
        }
        echo "
                  </tr>
              
                <tr role='row' class='even'>
                  <td class='reorder sorting_1'>
                    " . $objRequisito[$key]->getEtiqueta_item_plantilla() . "
                  </td>
                  <td>
                    <textarea readonly='' rows='9' cols='125' style='height: 150px; width: 100%; margin-top: 0px; margin-bottom: 0px;' class='text-justify'>" . $objRequisito[$key]->getDescripcion_item_plantilla() . "</textarea>
                    <br><br>
                    <span class='daniela'>Comentario del Auditor</span>
                    <br><br>
                    <textarea readonly='' rows='9' cols='125' style='height: 150px; width: 100%; margin-top: 0px; margin-bottom: 0px;' class='text-justify'>" . $objObservacion->getComentario_implementacion() . "</textarea>
                  </td>";
        $fechas_4 =  trabajoDao::fechasReporte($idproyecto);
        for ($key4 = 0; $key4 < count($fechas_4); $key4++) {
          $objt = trabajoDao::verificarFecha($objRequisito[$key]->getId_item_grupo_plantilla_certificacion(), $fechas_4[$key4], $idproyecto);
          if ($objt != false) {
            if ($key4 > 0) {
              if ($key4 >= $comienzoFechas) {
                echo "<td>" . $objt[0]->getPorcentaje_avance() . "</td> ";
              }
            }
            $porAnterior = $objt[0]->getPorcentaje_avance();
          } else {
            if ($key4 >= $comienzoFechas) {
              echo "<td>" . $porAnterior . "</td> ";
            }
          }
        }
        echo "
                </tr>
             
           </table>";
      }
      $porAnterior = 0;

      $cun = 0;
    }
    // calculo consolidado hernan
    $fechasConsolidadas = array();
    $nCapitulos = count($arrayConsolidadosFechas);
    $contadorFechas=0;
    foreach ($fechas as $key => $value) {
      $fechasConsolidadas[$value] = 0;
    }
    foreach ($arrayConsolidadosFechas as $key => $fechas_capitulo) {

      foreach ($fechas_capitulo as $key_fecha => $valor) {
        $fechasConsolidadas[$key_fecha] += $fechas_capitulo[$key_fecha];
      }
    }
    foreach ($fechasConsolidadas as $key => $value) {
      $fechasConsolidadas[$key] = round($fechasConsolidadas[$key] / $nCapitulos, 0);
    }

    echo "<br>";

    if(count($fechas)>0){
          echo "<div class=''row>
            <table  class='table  table-column'  style='position: relative;'>
              <thead class='bg-success white'> 
                <tr role='row'>
                    <th class=' capa white white' rowspan='1' colspan='1'>AVANCE TOTAL &nbsp;&nbsp;&nbsp;&nbsp;</th>";
          foreach ($fechasConsolidadas as $key => $value) {
            //echo $fechasConsolidadas[$key]."<br>";
            if($contadorFechas>0 && $contadorFechas>=$comienzoFechas){
            $colors='';
            if(intval($fechasConsolidadas[$key]) >= 0 && intval($fechasConsolidadas[$key]) <= 49){
              $colors='<div class="badge badge-danger">'.$fechasConsolidadas[$key].'%</div>';
            }elseif(intval($fechasConsolidadas[$key]) >= 50 && intval($fechasConsolidadas[$key]) <= 74){
              $colors='<div class="badge badge-warning">'.$fechasConsolidadas[$key].'%</div>';
            }
            elseif(intval($fechasConsolidadas[$key]) >= 75 && intval($fechasConsolidadas[$key]) <=99){
              $colors='<div class="badge badge-warning">'.$fechasConsolidadas[$key].'%</div>';
            }else{
              $colors='<div class="badge badge-success">'.$fechasConsolidadas[$key].'%</div>';
            }

            echo "
                  <th class='parrafo  capa white'>".$key." &nbsp;&nbsp;&nbsp;".$colors."</th>  
              
              ";
          }
          $contadorFechas ++;
        }
          
    echo "  
           </tr>
        </thead>
      </table>
    </div>";
  }

    //print_r($fechasConsolidadas);
  }
  
  
   public static function plantillaImplementacionProyectoListadoInformePDF($idproyecto)
   {
    $objProyecto = trabajoController::proyectoId($idproyecto);
    $objPlantilla = plantillaController::plantillaId($objProyecto->getId_plantilla_alcance_proyecto());
    $objtGruposPlantilla = plantillaController::GrupoPlantillaListado($objPlantilla->getId_plantilla_alcance());
    $fechas =  trabajoDao::fechasReporte($objProyecto->getId_proyecto());
    /*modifificado hernan*/
    $VISIBLES = 6;
    $nFechas = count($fechas);
    $comienzoFechas = $nFechas - $VISIBLES;
    //------------------------------------------- 
    echo "
      <table id='' class='table  table-column' role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
        <thead class='bg-success white'>
          <tr role='row'>
              <th class='text-black' rowspan='1' colspan='1' >Avances : 
              </th>";

    echo "<th class='parrafo text-black' >Fechas de Trabajo&nbsp;";
    for ($i = 1; $i < count($fechas); $i++) {
      if ($i >= $comienzoFechas) {
        echo "" . $fechas[$i] . " &nbsp;|&nbsp;";
      }
    }

    echo "</th>";
    echo "  </tr>
        </thead>
      </table>";
    $cun = 0;
    $fechaProcesadas = array();
    $arrayCapitulo = array();
    $arrayConsolidadosFechas = array();
    $porAnterior_ = 0;

    foreach ($objtGruposPlantilla as $key_2f => $value) {
      $objRequisito = plantillaController::grupoPlantillaItemListado($objtGruposPlantilla[$key_2f]->getId_grupo_plantilla_alcance());
      $arrayCapitulo[$objtGruposPlantilla[$key_2f]->getId_grupo_plantilla_alcance()] = "";
      $arrayFechas = array();
      foreach ($fechas as $key_fechas_l => $value) {
        $arrayFechas[$fechas[$key_fechas_l]] = 0;
      }
      $arrayCapitulo[$objtGruposPlantilla[$key_2f]->getId_grupo_plantilla_alcance()] = $arrayFechas;
    }
    
   
    foreach ($objtGruposPlantilla as $key_2f => $value) {
      $objRequisito = plantillaController::grupoPlantillaItemListado($objtGruposPlantilla[$key_2f]->getId_grupo_plantilla_alcance());
      foreach ($objRequisito as $key_req => $value) {
        foreach ($fechas as $key_fechas_ => $value) {  //array (1[2019/12/04[0]   2019/12/05[0]],2,3,4,5,)
          $objt = trabajoDao::verificarFecha($objRequisito[$key_req]->getId_item_grupo_plantilla_certificacion(), $fechas[$key_fechas_], $idproyecto) ;
          $acu = 0;
          if ($objt != false) {
            $val = $arrayCapitulo[$objRequisito[$key_req]->getId_grupo_plantilla_certificacion()][$fechas[$key_fechas_]];
            $acu = floatval($val) + floatval($objt[0]->getPorcentaje_avance());
            $arrayCapitulo[$objRequisito[$key_req]->getId_grupo_plantilla_certificacion()][$fechas[$key_fechas_]] = $acu;
            $porAnterior_ = $objt[0]->getPorcentaje_avance();
          } else {
            $val = $arrayCapitulo[$objRequisito[$key_req]->getId_grupo_plantilla_certificacion()][$fechas[$key_fechas_]];
            $acu = floatval($val) + floatval($porAnterior_);
            $arrayCapitulo[$objRequisito[$key_req]->getId_grupo_plantilla_certificacion()][$fechas[$key_fechas_]] = $acu;
          }
        }
      }
    }
    

    foreach ($objtGruposPlantilla as $key2 => $value) {
      $objRequisito = plantillaController::grupoPlantillaItemListado($objtGruposPlantilla[$key2]->getId_grupo_plantilla_alcance());
      foreach ($objRequisito as $key => $value) {
        $objObservacion = trabajoController::observacionRequisitoImplementacion($idproyecto, $objRequisito[$key]->getId_item_grupo_plantilla_certificacion());

        echo "<table id='' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable' role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
             ";
        if (intval($cun) == 0) {
          echo "
                <tr role='row' class='capa white'>
                  <th class='text-black'> Numeral &nbsp;" . $objtGruposPlantilla[$key2]->getEtiqueta_grupo_plantilla() . "</th>
                  <th class='text-black'>  " . $objtGruposPlantilla[$key2]->getTitulo_grupo_plantilla() . "</th>";
          $fechas_2 =  trabajoDao::fechasReporte($idproyecto);
          $por = 0;
          for ($key_0 = 1; $key_0 < count($fechas_2); $key_0++) {
            $porcentajeR = $arrayCapitulo[$objtGruposPlantilla[$key2]->getId_grupo_plantilla_alcance()][$fechas_2[$key_0]];
            $ncap = trabajoDao::ncapGrupo($objtGruposPlantilla[$key2]->getId_grupo_plantilla_alcance());
            $porcentajeR = floatval($porcentajeR) / $ncap;
            $arrayConsolidadosFechas[$objtGruposPlantilla[$key2]->getEtiqueta_grupo_plantilla()][$fechas_2[$key_0]] = $porcentajeR;
            if ($key_0 >= $comienzoFechas) {
              echo "<th class='text-black'> Avance " . round($porcentajeR, 0) . "%";
              echo "</th> ";
            }
          }
          echo "</tr>";
          $cun++;
        }
        echo "
                  <tr role='row'>
                      <th class='text-black' ><li class='fa fa-folder-open'></li>Numeral</th>
                      <th class='text-black' ><li class='fa fa-file-alt'></li>  Descripción del Requisito
                      </th>";
        $fechas_3 =  trabajoDao::fechasReporte($idproyecto);
        for ($key3 = 1; $key3 < count($fechas_3); $key3++) {
          if ($key3 >= $comienzoFechas) {
            echo "<th class='text-black'> " . $fechas_3[$key3] . "</th> ";
          }
        }
        echo "
                  </tr>
              
                <tr role='row' class='even'>
                  <td class='reorder sorting_1'>
                    " . $objRequisito[$key]->getEtiqueta_item_plantilla() . "
                  </td>
                  <td>
                    <textarea readonly='' rows='9' cols='125' style='height: 150px; width: 100%; margin-top: 0px; margin-bottom: 0px;' class='text-justify text-black'>" . $objRequisito[$key]->getDescripcion_item_plantilla() . "</textarea>
                    <br><br>
                    <span class='daniela text-black'>Comentario del Auditor</span>
                    <br><br>
                    <textarea readonly='' rows='9' cols='125' style='height: 150px; width: 100%; margin-top: 0px; margin-bottom: 0px;' class='text-justify text-black'>" . $objObservacion->getComentario_implementacion() . "</textarea>
                  </td>";
        $fechas_4 =  trabajoDao::fechasReporte($idproyecto);
        for ($key4 = 0; $key4 < count($fechas_4); $key4++) {
          $objt = trabajoDao::verificarFecha($objRequisito[$key]->getId_item_grupo_plantilla_certificacion(), $fechas_4[$key4], $idproyecto);
          if ($objt != false) {
            if ($key4 > 0) {
              if ($key4 >= $comienzoFechas) {
                echo "<td class='text-black'>" . $objt[0]->getPorcentaje_avance() . "</td> ";
              }
            }
            $porAnterior = $objt[0]->getPorcentaje_avance();
          } else {
            if ($key4 >= $comienzoFechas) {
              echo "<td class='text-black'>" . $porAnterior . "</td> ";
            }
          }
        }
        echo "
                </tr>
             
           </table>";
      }
      $porAnterior = 0;

      $cun = 0;
    }
    // calculo consolidado hernan
    $fechasConsolidadas = array();
    $nCapitulos = count($arrayConsolidadosFechas);
    $contadorFechas=0;
    foreach ($fechas as $key => $value) {
      $fechasConsolidadas[$value] = 0;
    }
    foreach ($arrayConsolidadosFechas as $key => $fechas_capitulo) {

      foreach ($fechas_capitulo as $key_fecha => $valor) {
        $fechasConsolidadas[$key_fecha] += $fechas_capitulo[$key_fecha];
      }
    }
    foreach ($fechasConsolidadas as $key => $value) {
      $fechasConsolidadas[$key] = round($fechasConsolidadas[$key] / $nCapitulos, 0);
    }

    echo "<br>";

    if(count($fechas)>0){
          echo "<div class=''row>
            <table  class='table  table-column'  style='position: relative;'>
              <thead class='bg-success white'> 
                <tr role='row'>
                    <th class=' capa text-black' rowspan='1' colspan='1'>AVANCE TOTAL &nbsp;&nbsp;&nbsp;&nbsp;</th>";
          foreach ($fechasConsolidadas as $key => $value) {
            //echo $fechasConsolidadas[$key]."<br>";
            if($contadorFechas>0 && $contadorFechas>=$comienzoFechas){
            $colors='';
            if(intval($fechasConsolidadas[$key]) >= 0 && intval($fechasConsolidadas[$key]) <= 49){
              $colors='<div class="badge badge-danger text-black">'.$fechasConsolidadas[$key].'%</div>';
            }elseif(intval($fechasConsolidadas[$key]) >= 50 && intval($fechasConsolidadas[$key]) <= 74){
              $colors='<div class="badge badge-warning text-black">'.$fechasConsolidadas[$key].'%</div>';
            }
            elseif(intval($fechasConsolidadas[$key]) >= 75 && intval($fechasConsolidadas[$key]) <=99){
              $colors='<div class="badge badge-warning text-black">'.$fechasConsolidadas[$key].'%</div>';
            }else{
              $colors='<div class="badge badge-success text-black">'.$fechasConsolidadas[$key].'%</div>';
            }

            echo "
                  <th class='parrafo  capa text-black'>".$key." &nbsp;&nbsp;&nbsp;".$colors."</th>  
              
              ";
          }
          $contadorFechas ++;
        }
          
    echo "  
           </tr>
        </thead>
      </table>
    </div>";
  }

    //print_r($fechasConsolidadas);
  }

  public static function plantillaImplementacionProyectoListado($idproyecto, $idtrabajo)
  {
    $objProyecto = trabajoController::proyectoId($idproyecto);
    $objPlantilla = plantillaController::plantillaId($objProyecto->getId_plantilla_alcance_proyecto());
    $objtGruposPlantilla = plantillaController::GrupoPlantillaListado($objPlantilla->getId_plantilla_alcance());
    foreach ($objtGruposPlantilla as $key => $value) {
      $objRequisito = plantillaController::grupoPlantillaItemListado($objtGruposPlantilla[$key]->getId_grupo_plantilla_alcance());
      echo "
      <div class='row'>
        <div class='alert bg-success alert-icon-left mb-2' role='alert'>
          <span class='alert-icon'><i class='fa fa-asterisk '></i></span>
          <strong>CAPÍTULO &nbsp;&nbsp;&nbsp;&nbsp;" . $objtGruposPlantilla[$key]->getEtiqueta_grupo_plantilla() . "</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
      </div>";
      foreach ($objRequisito as $key => $value) {
        $objObservacion = trabajoController::observacionRequisitoImplementacion($idproyecto, $objRequisito[$key]->getId_item_grupo_plantilla_certificacion());
        $objObservacionDiagnostico = trabajoController::observacionRequisito($idproyecto, $objRequisito[$key]->getId_item_grupo_plantilla_certificacion());
        $dir = DOCUMENTS_SERVER . "documentos/trabajo/" . $idtrabajo . "/implementacion/" . $idproyecto . "/" . $objRequisito[$key]->getId_item_grupo_plantilla_certificacion() . "_implementacion.pdf";
        //print_r($objObservacion);
        echo "
      <div class='card row'>
       <div class='alert bg-success alert-icon-left mb-2' role='alert'>
         <span class='alert-icon'><i class='fa fa-list'></i></span>
         <strong>" . $objRequisito[$key]->getEtiqueta_item_plantilla() . "</strong>
       </div>
       <table id=''
         class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
         role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
         <thead>
           <tr role='row'>
             <th class=' titulo'>
               <li class='fa fa-font'></li> Título
             </th>
             <th class=' titulo'>
               <li class='fa fa-list-alt fa-2x'></li> Requisito
             </th>
             <th class=' titulo'>
               <li class='fa fa-upload'></li> Adjunto
             </th>
             <th class=' titulo'>
               <li class='fa fa-user'></li> Colaboradores:
             </th>
           </tr>
         </thead>
         <tbody>
           <tr role='row' class='even'>
             <td class='reorder sorting_1'>
               " . $objRequisito[$key]->getEtiqueta_item_plantilla() . "
             </td>
             <td class='reorder sorting_1'>
               <div class='form-group mb-1 col-sm-12 col-md-12'>
                 <label for='projectinput3'>
                   <h5 class='card-title'>
                     <span class='text-danger'>*</span>
                     <li class='fa fa-edit fa-2x'></li>
                     Requisito :
                   </h5>
                 </label>";
        if ($objObservacion != false) {
          echo "
                  <textarea readonly class='form-control '  rows='9' cols='125' style='height: 184px; width: 100%; margin-top: 0px; margin-bottom: 0px;' class='text-justify'>" . $objRequisito[$key]->getDescripcion_item_plantilla() . "</textarea>";
        } else {
          echo "
                  <textarea readonly class='form-control '  rows='9' cols='125' style='height: 184px; width: 100%; margin-top: 0px; margin-bottom: 0px;' class='text-justify'>" . $objRequisito[$key]->getDescripcion_item_plantilla() . "</textarea>";
        }
        echo "</div>
             </td>";
        //adjuntos modal
        echo " 
             <td class='reorder sorting_1'>
               <div class='col-md-10'>
                 <button type='button' class='btn capa text-white round' data-toggle='modal' data-target='#exampleModal" . $objRequisito[$key]->getId_item_grupo_plantilla_certificacion() . "'><li class='fa fa-cloud-upload-alt fa-2x'></li>&nbsp;Adjunto</button>
                 <div class='modal fade' id='exampleModal" . $objRequisito[$key]->getId_item_grupo_plantilla_certificacion() . "' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'
                   aria-hidden='true'>
                   <div class='modal-dialog modal-lg' role='document'>
                     <div class='modal-content'>
                       <div class='modal-header'>
                         <h5 class='modal-title' id='exampleModalLabel'>Listado Documentos</h5>
                         <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                           <span aria-hidden='true'>&times;</span>
                         </button>
                       </div>
                       <div class='modal-body'>
                         <div class='row'>
                            
                         <div class='form-body'>
                         <div id='smgDocumentos" . $objRequisito[$key]->getId_item_grupo_plantilla_certificacion() . "'></div>
                         <div class='form-group row mx-auto'>
                           <label class='col-md-3 label-control'>Remplazar documento
                               actual</label>
                           <div class='col-md-9'>
                               <label id='projectinput8' class='file center-block'>
                                   <input type='file' id='implementacion" . $objRequisito[$key]->getId_item_grupo_plantilla_certificacion() . "'>
                                   <span class='file-custom'></span>
                               </label>&nbsp;&nbsp;&nbsp;
                               <a href='#' title='" . $objRequisito[$key]->getId_item_grupo_plantilla_certificacion() . "'
                                   class='btn capa round text-white waves-effect waves-light '
                                   id='subirAdjuntoImplementacion'>
                                   <i class='fa fa-cloud-upload-alt fa-2x'></i>&nbsp;Subir
                               </a>
                           </div>
                         </div>
                         <div class='form-group row mx-auto last'>
                           <div class='col-md-9'>
                               <a target='_blank'
                                   href='" . $dir . "'
                                   class='btn capa text-white round waves-effect waves-light'>
                                   <i class='fa fa-download fa-2x'></i>&nbsp;Descargar
                                   Documento
                               </a>
                           </div>
                         </div>
                       </div>
                         </div>
                       </div>
                       <div class='form-actions '>
                        <div class='col-md-6'><button type='button' class='btn btn-secondary round' data-dismiss='modal'>Cerrar</button></div>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </td>
             ";
        echo " <td class='reorder sorting_1'>
             <textarea class='form-control ' id='ctextarea' name='ctextarea" . $objRequisito[$key]->getId_item_grupo_plantilla_certificacion() . "' rows='9' cols='125' style='height: 184px; width: 100%; margin-top: 0px; margin-bottom: 0px;' class='text-justify'>" . $objObservacion->getColaboradores() . "</textarea>
             </td>";
        //Colaboradores modal
        //  echo "
        //  <td class='reorder sorting_1'>
        //  <input type='hidden' value='0' name='contadorColaboradores_".$objRequisito[$key]->getId_item_grupo_plantilla_certificacion()."' />
        //  <input type='hidden' value='0' name='colaboradores1_".$objRequisito[$key]->getId_item_grupo_plantilla_certificacion()."' />
        //  <input type='hidden' value='0' name='colaboradores2_".$objRequisito[$key]->getId_item_grupo_plantilla_certificacion()."' />
        //  <input type='hidden' value='0' name='colaboradores3_".$objRequisito[$key]->getId_item_grupo_plantilla_certificacion()."' />
        //  <input type='hidden' value='0' name='colaboradores4_".$objRequisito[$key]->getId_item_grupo_plantilla_certificacion()."' />
        //  <input type='hidden' value='0' name='colaboradores5_".$objRequisito[$key]->getId_item_grupo_plantilla_certificacion()."' />
        //   <div class='form-group'>
        //      <button type='button' id='cargarColaboradores' title='".$objRequisito[$key]->getId_item_grupo_plantilla_certificacion()."' class='btn capa text-white round' data-toggle='modal' name='".$objObservacion->getId_implentacion_item_proyecto()."' data-target='#exampleModal_".$objRequisito[$key]->getId_item_grupo_plantilla_certificacion()."'><li class='fa fa-users fa-2x'></li>&nbsp;Colaboradores</button>
        //      <div class='modal fade' style='overflow-y: scroll; max-height:85%;  margin-top: 60px; margin-bottom:60px;' id='exampleModal_".$objRequisito[$key]->getId_item_grupo_plantilla_certificacion()."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'
        //        aria-hidden='true'>
        //        <div class='modal-dialog modal-lg' role='document'>
        //         <div class='modal-content'>
        //            <div class='modal-header'>
        //              <h5 class='modal-title parrafo' id='exampleModalLabel'>Colaboradores Asignados</h5>
        //              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
        //                <span aria-hidden='true'>&times;</span>
        //              </button>
        //            </div>
        //           <div class='modal-body'>
        //             <div class='row'>
        //                 <div class='col-md-12' id='smg_".$objObservacion ->getId_implentacion_item_proyecto()."'></div>
        //                 <div class='col-md-6' id='modal_col_".$objObservacion ->getId_implentacion_item_proyecto()."'>";

        //           echo "</div>
        //                 <div class='col-md-6'>
        //                     <a href='#' name='".$objObservacion->getId_implentacion_item_proyecto()."' 
        //                        title='".$idproyecto."' 
        //                        id='asignarColaborador' class='btn capa text-white round '>
        //                          <li class='fa fa-exchange-alt fa-2x'></li>&nbsp;Asignar 
        //                     </a>
        //                 </div>
        //                 <br>
        //                 <div class='col-md-12' id='modal_".$objObservacion ->getId_implentacion_item_proyecto()."'>";
        //         echo "  </div>
        //             </div>
        //           </div>
        //         </div>
        //        </div>
        //      </div>
        //   </div>
        //  </td>
        //  ";
        echo "
           </tr>
         </tbody>
       </table>";
        echo "
       <table id=''
         class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
         role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
         <tbody>
           <tr role='row' class='even'>
             
             <td class='reorder sorting_1'>
               <div class='form-group mb-1 col-sm-12 col-md-12'>
                 <label for='projectinput3'>
                   <h5 class='card-title'>
                     <span class='text-danger'>*</span>
                     <li class='fa fa-edit fa-2x'></li>
                     Observación :  ";
        if ($objObservacion != false) {
          echo "<li class='fa fa-calendar-alt fa-2x'></li>&nbsp;Fecha de Observación : " . $objObservacion->getFecha_comentario_implentacion();
        }
        echo "
                   </h5>
                 </label>";
        echo "<textarea class='form-control ' id='textarea' name='textarea" . $objRequisito[$key]->getId_item_grupo_plantilla_certificacion() . "' rows='9' cols='125' style='height: 184px; width: 100%; margin-top: 0px; margin-bottom: 0px;' class='text-justify'></textarea>";
        // if ($objObservacion != false && $objObservacion->getEstado_implementacion() != "init") {
        //   echo "
        //           <textarea class='form-control ' id='textarea' name='textarea" . $objRequisito[$key]->getId_item_grupo_plantilla_certificacion() . "' rows='9' cols='125' style='height: 184px; width: 100%; margin-top: 0px; margin-bottom: 0px;' class='text-justify'>" . $objObservacion->getComentario_implementacion() . "</textarea>";
        // } else {

        //   echo "
        //                <textarea class='form-control ' id='textarea' name='textarea" . $objRequisito[$key]->getId_item_grupo_plantilla_certificacion() . "' rows='9' cols='125' style='height: 184px; width: 100%; margin-top: 0px; margin-bottom: 0px;' class='text-justify'>" . $objObservacion->getComentario_implementacion() . "</textarea>";
        // }
        echo "</div>
             </td>";
        if ($objObservacion != false && $objObservacion->getEstado_implementacion() != "init") {
          echo " <td class='reorder sorting_1'>
                       <label for=''><h5 class='card-title'><li class='fa fa-percentage'></li>&nbsp; Porcentaje:</h5></label>
                       <input  min='0' max='100' step='25' type='number' class='form-control' placeholder='. . .' name='porcentaje" . $objRequisito[$key]->getId_item_grupo_plantilla_certificacion() . "' value='" . $objObservacion->getPorcentaje_avance() . "'> 
                     </td>";
        } else {
          if ($objObservacionDiagnostico->getEstado_diagnostico() == "CUMPLE" || $objObservacionDiagnostico->getEstado_diagnostico() == "NO APLICA") {

            echo " <td class='reorder sorting_1'>
                       <label for=''><h5 class='card-title'><li class='fa fa-percentage'></li>&nbsp; Porcentaje:</h5></label>
                       <input  min='0' max='100'  step='25' type='number' class='form-control' placeholder='. . .' name='porcentaje" . $objRequisito[$key]->getId_item_grupo_plantilla_certificacion() . "' value='100'> 
                     </td>";
          } else {

            echo " <td class='reorder sorting_1'>
                       <label for=''><h5 class='card-title'><li class='fa fa-percentage'></li>&nbsp; Porcentaje:</h5></label>
                       <input min='0' max='100'  step='25' type='number' class='form-control' placeholder='. . .' name='porcentaje" . $objRequisito[$key]->getId_item_grupo_plantilla_certificacion() . "' value='0'> 
                     </td>";
          }
        }

        setlocale(LC_ALL, "es_ES");

        echo "
             <td class='reorder sorting_1'>
              <div class='form-group'>
                 <button type='button' class='btn capa text-white round' name='" . $objRequisito[$key]->getId_item_grupo_plantilla_certificacion() . "' id='cargarListaComentarios' data-toggle='modal' data-target='#exampleModal_2" . $objRequisito[$key]->getId_item_grupo_plantilla_certificacion() . "'><li class='fa fa-calendar-alt fa-2x'></li>&nbsp;Historial</button>
                 
                 <div class='modal fade' id='exampleModal_2" . $objRequisito[$key]->getId_item_grupo_plantilla_certificacion() . "' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'
                   aria-hidden='true'>
                   <div class='modal-dialog modal-lg' role='document'>
                     <div class='modal-content'>
                       <div class='modal-header'>
                         <h5 class='modal-title' id='exampleModalLabel'>Historial de observaciones
                         </h5>
                         <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                           <span aria-hidden='true'>&times;</span>
                         </button>
                       </div>
                       <div class='modal-body'>
                         <div class='row col-md-12' >
                            <div id='modal_" . $objRequisito[$key]->getId_item_grupo_plantilla_certificacion() . "'></div>
                         </div>
                       </div>
                       <div class='form-actions '>
                          <div class='col-md-6'><button type='button' class='btn capa text-white  round' data-dismiss='modal'><li class='fa fa-times'></li>&nbsp;Cerrar</button></div>
                       </div>
                     </div>
                   </div>
                 </div>
              </div>
             </td>";
        echo "
             <td class='reorder sorting_1'>
              <div class='form-group col-sm-12 col-md-2 text-center mt-2'>
                 <a href='#" . $objRequisito[$key]->getId_item_grupo_plantilla_certificacion() . "' title='" . $objRequisito[$key]->getId_item_grupo_plantilla_certificacion() . "' name='" . $objObservacion->getId_implentacion_item_proyecto() . "' id='validarElemento2'
                   class='btn capa round text-white waves-effect waves-light'>
                   <i class='fa fa-check fa-2x'></i>&nbsp; Validar</a>
               </div>
             </td>";

        echo "
           </tr>
         </tbody>
       </table>";
        echo "
       <div class='form-group col-sm-12 col-md-6 text-center mt-2'>
         <strong>
           <div id='respuesta" . $objRequisito[$key]->getId_item_grupo_plantilla_certificacion() . "'></div>
         </strong>
       </div>
     </div>";
      }
    }
  }
  public static function ActaProyecto($idproyecto, $idtrabajo, $f1)
  {
    $objObservacion = trabajoDao::renderActa($idproyecto, $f1);
    echo "
       <table id=''
         class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
         role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
         <thead>
           <tr role='row'>
             <th class=' titulo'>
               <li class='fa fa-font'></li> Requisito:
             </th>
             <th class=' titulo'>
               <li class='fa fa-list-alt '></li> Comentario:
             </th>
             <th class=' titulo'>
               <li class='fa fa-users'></li> Responsables:
             </th>
             <th class=' titulo'>
               <li class='fa fa-calendar-alt'></li> Fecha de Realizacion:
             </th>
           </tr>
         </thead>
         <tbody>";
    for ($i = 0; $i < count($objObservacion); $i++) {
      // $CompT1 = strlen($objObservacion[$i]['descripcion_item_plantilla']);
      // $CompT2 = strlen($objObservacion[$i]['comentario_implementacion']);
      // $maxCan = 0;
      // $carLine = 64;
      // $factor = 38.75;
      // if($CompT1 > $CompT2 ){ $maxCan = $CompT1;
      // }else{ $maxCan = $CompT2;}
      // $filas = ceil($maxCan / $carLine);
      // $pixel = ceil($filas *$factor );
      echo "<tr>
                    <td> <textarea  class='form-control text-black text-justify'  cols='100' style='height: 350px; width: 100%; margin-top: 0px; margin-bottom: 0px;' >" . $objObservacion[$i]['etiqueta_item_plantilla'] . " - " . $objObservacion[$i]['descripcion_item_plantilla'] . " </textarea></td>
                    <td><textarea  class='form-control text-black text-justify'  cols='70' style='height: 350px; width: 100%; margin-top: 0px; margin-bottom: 0px;'>" . $objObservacion[$i]['comentario_implementacion'] . "</textarea></td>
                    ";
      $objColaboradores = trabajoDao::listadoColaboradoresItem($objObservacion[$i]['id_implementacion_item_proyecto']);
      if ($objColaboradores  != false) {
        echo "
                        <td>
                          <textarea readonly class='form-control text-black '  cols='30' style='height: 310px; width: 100%; margin-top: 0px; margin-bottom: 0px;'>";
        foreach ($objColaboradores as $key => $value) {
          echo " + " . $objColaboradores[$key]->getNombre_colaborador() . " \n ";
        }
        echo "
                          </textarea>
                        </td>";
      } else {
        echo "<td><textarea readonly class='form-control text-black ' ' cols='30' style='height: 310px; width: 100%; margin-top: 0px; margin-bottom: 0px;'>Sin Colaboradores</textarea></td>";
      }
      echo "
                    <td>" . $objObservacion[$i]['fecha_comentario_implementacion'] . "</td>
                </tr>";
    }
    echo " 
         </tbody>
       </table>";
  }
  public static function ActaProyectov2($idproyecto, $idtrabajo, $f1)
  {
    $objObservacion = trabajoDao::renderActa($idproyecto, $f1);

    for ($i = 0; $i < count($objObservacion); $i++) {
      echo "
          <table id=''
          class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
           style='position: relative;'>
          <thead>
            <tr role='row'>
              <th class=' parrafo'>
                <li class='fa fa-font'></li> Requisito:
              </th>
             
              <th class=' parrafo'>
                <li class='fa fa-users'></li> Responsables:
              </th>
              <th class=' parrafo'>
                <li class='fa fa-calendar-alt'></li> Fecha de Realización:
              </th>
            </tr>
          </thead>
          <tbody>
          <tr>
                    <td> 
                    <textarea  class='form-control text-black text-justify parrafo'  cols='230' style='height: 200px; width: 100%; margin-top: 0px; margin-bottom: 0px;' >" . $objObservacion[$i]['etiqueta_item_plantilla'] . " - " . $objObservacion[$i]['descripcion_item_plantilla'] . " </textarea>
                    <br><h2 class='parrafo'>Comentario </h2>
                    <textarea  class='form-control text-black text-justify parrafo' readonly cols='230' style='height: 285px; width: 100%; margin-top: 0px; margin-bottom: 0px;'>" . $objObservacion[$i]['comentario_implementacion'] . "</textarea>
                    </td>
                    ";

      echo "
                        <td>
                          <textarea readonly class='form-control text-black text-justify parrafo'  cols='20' style='height: 460px; width: 100%; margin-top: 0px; margin-bottom: 0px;'>
                          " . $objObservacion[$i]['colaboradores'] . " 
                          </textarea>
                        </td>";

      echo "
                    <td class='parrafo'>" . $objObservacion[$i]['fecha_comentario_implementacion'] . "</td>
                </tr>";
    }
    echo " 
         </tbody>
       </table>";
  }
  public static function ActaProyecto2($idproyecto, $idtrabajo, $f1, $f2)
  {
    $objObservacion = trabajoDao::renderActa2($idproyecto, $f1, $f2);
    if ($objObservacion != false) {
      echo "
       <table id=''
         class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
         role='grid' aria-describedby='project-task-list_info' style='position: relative; '>
         <thead>
           <tr role='row'>
             <th class=' parrafo'>
               <li class='fa fa-font'></li> Requisito:
             </th>
             <th class=' parrafo'>
               <li class='fa fa-list-alt '></li> Comentario:
             </th>
             <th class=' parrafo'>
               <li class='fa fa-users'></li> Responsables:
             </th>
             <th class=' parrafo'>
               <li class='fa fa-calendar-alt'></li> Fecha de Realización:
             </th>
           </tr>
         </thead>
         <tbody>";
      for ($i = 0; $i < count($objObservacion); $i++) {
        echo "<tr>
                    <td> <textarea  class='form-control text-black text-justify ' readonly cols='90' style='height: 480px; width: 100%; margin-top: 0px; margin-bottom: 0px;' >" . $objObservacion[$i]['etiqueta_item_plantilla'] . " - " . $objObservacion[$i]['descripcion_item_plantilla'] . " </textarea></td>
                    <td><textarea  class='form-control text-black text-justify '    readonly cols='160' style='height: 480px; width: 100%; margin-top: 0px; margin-bottom: 0px;'>" . $objObservacion[$i]['comentario_implementacion'] . "</textarea></td>
                    ";

        echo "
                        <td>
                          <textarea readonly class='form-control text-black '  cols='35' style='height: 500px; width: 100%; margin-top: 0px; margin-bottom: 0px;'>
                          " . $objObservacion[$i]['colaboradores'] . " 
                          </textarea>
                        </td>";

        echo "
                    <td class='parrafo'>" . $objObservacion[$i]['fecha_comentario_implementacion'] . "</td>
                </tr>";
      }
      echo " 
         </tbody>
       </table>";
    }
  }
}
