<?php
  include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(MODEL_PATH."proyecto.php");
  require_once(PDO_PATH."proyectoDao.php");
class proyectoController
{
  public static function registrarProyecto($modelProyecto){
    return proyectoDao::registrarProyecto($modelProyecto);
  }
  public static function registrarEmpresa_proyecto($modelProyecto){
    return proyectoDao::registrarEmpresa_proyecto($modelProyecto);
  }
  public static function modificarProyecto($modelProyecto){
    return ProyectoDao::modificarProyecto($modelProyecto);
  }
  public static function asignarContractoProyecto($id,$idProyecto){
    return ProyectoDao::asignarContractoProyecto($id,$idProyecto);
  }
  public static function ProyectoId($modelProyecto){
    return ProyectoDao::ProyectoId($modelProyecto);
  }
  public static function eliminarProyecto($idProyecto){
    return ProyectoDao::eliminarProyecto($idProyecto);
  }
  public static function eliminarProyectoEmpresa($idProyecto){
    return ProyectoDao::eliminarProyectoEmpresa($idProyecto);
  }
  
  public static function verificarProyectoPlantilla($idtrabajo,$idplantilla){
    return ProyectoDao::verificarProyectoPlantilla($idtrabajo,$idplantilla);
  }
  public static function verificarProyectoEmpresa($tipoEntidad,$idProyecto){
    return ProyectoDao:: verificarProyectoEmpresa($tipoEntidad,$idProyecto);
  }
  public static function listadoProyecto(){
    return ProyectoDao::listadoProyecto();
  }
  public static function ultimaProyectoRegistrado($modelProyecto){
    return ProyectoDao::ultimaProyectoRegistrado($modelProyecto);
  }
  public static function listadoProyectosTrabajo($idtrabajo,$rol,$sesion){
    $objEmpresa=proyectoDao::listadoProyectoTrabajoResumen($idtrabajo);
    $objTrabajo = trabajoController::trabajoId($idtrabajo);
    
    if($objEmpresa!= false){
    echo   "<table ' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
                    role='grid'  >
                <thead>
                    <tr role='row'>
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-list-ul'></li> Plantilla - Alcance Proyecto:</th>
                ";
                
                
                echo "
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-chart-line'></li> Estado:</th>
                ";
                
                if($rol == "LIDER OEA"  || $rol == "ASISTENTE" || $rol == "ADMINISTRADOR" || $rol == "EMPRESA" || $rol == "GRUPO"
                || ($rol == "ESPECIALISTA" && ( $sesion == $objTrabajo->getId_usuario_diagnostico() || $sesion == $objTrabajo->getId_usuario_implementacion()) )){
                echo "
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-tasks'></li>  Diagnóstico :
                        </th>
                ";
                }
                if($rol == "LIDER OEA"  || $rol == "ASISTENTE" || $rol == "ADMINISTRADOR" || $rol == "EMPRESA" || $rol == "GRUPO"
                || ($rol == "ESPECIALISTA" && $sesion == $objTrabajo->getId_usuario_implementacion())){
                echo "
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-swatchbook'></li>  Implementación : 
                        </th>";
                }
                
                if($rol == "LIDER OEA"  || $rol == "ASISTENTE" || $rol == "ADMINISTRADOR" || $rol == "EMPRESA" || $rol == "GRUPO"
                || ($rol == "ESPECIALISTA" && ($sesion == $objTrabajo->getId_usuario_preauditoria() || $sesion == $objTrabajo->getId_usuario_implementacion()))  ){
                echo "
                        <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-drafting-compass'></li>  Pre Auditoría :
                        </th>";
                }

              echo "
                    </tr>
                </thead>
                <tbody>";
                    foreach ($objEmpresa as $key => $value) {
                    echo"
                    <tr role='row' class='even'>
                        <td class='parrafo'>
                          ".$objEmpresa[$key]->getId_plantilla_alcance_proyecto()."
                          <br><br><hr>
                          <div class='badge badge-pill badge-info'><li class='fa fa-file-signature '></li>&nbsp;&nbsp;Estado: ".$objEmpresa[$key]->getEstado_proyecto()."</div><br><br>";
                          if($objEmpresa[$key]->getEstado_proyecto() =="Fase Impl"  || $objEmpresa[$key]->getEstado_proyecto() =="Fase PreA" || $objEmpresa[$key]->getEstado_proyecto() =="Fin Proceso"){
                          $estado_proyecto = trabajoController::estado_proyecto($objEmpresa[$key]->getId_proyecto());
                          if($estado_proyecto >= 0 && $estado_proyecto < 50 ){
                            echo "<div class='badge badge-pill badge-danger'>&nbsp;&nbsp;<li class='fa fa-battery-half'></li>&nbsp; Avance &nbsp;&nbsp;".round($estado_proyecto,2)."%</div>";
                          }elseif($estado_proyecto >= 50 && $estado_proyecto < 100){
                            echo "<div class='badge badge-pill badge-warning'>&nbsp;&nbsp;<li class='fa fa-battery-half'></li> &nbsp;Avance &nbsp;&nbsp;".round($estado_proyecto,2)."%</div>";
                          }else{
                            echo "<div class='badge badge-pill badge-success'> &nbsp;&nbsp;<li class='fa fa-battery-half'></li>&nbsp;Avance&nbsp;&nbsp;".round($estado_proyecto,2)."%</div>";
                          }
                         }
                          echo "
                        </td>
                        <td class='parrafo'>";
                          if($objEmpresa[$key]->getEstado_proyecto() =="Fase Impl" || 
                             $objEmpresa[$key]->getEstado_proyecto() =="Fase PreA" ||
                             $objEmpresa[$key]->getEstado_proyecto() =="Fin Proceso"){
                                if($rol == "LIDER OEA" || ($rol == "ESPECIALISTA" && $sesion == $objTrabajo->getId_usuario_implementacion())
                                || $rol == "ADMINISTRADOR" || $rol == "ASISTENTE" || $rol == "EMPRESA" || $rol == "GRUPO"){
                                  echo "<a href='actas.php?idproyecto=".$objEmpresa[$key]->getId_proyecto()."&id=".$idtrabajo."'  title='' id='' class='dropdown-item'><i class='fa fa-clipboard-list fa-2x'></i>&nbsp; Actas </a>";
                                  echo "<a href='actasIntervalo.php?idproyecto=".$objEmpresa[$key]->getId_proyecto()."&id=".$idtrabajo."'  title='' id='' class='dropdown-item'><i class='fa fa-calendar-alt fa-2x'></i>&nbsp; Actas - Intervalo </a>";
                                  }
                                
                              }
                          echo "<br>";
                          if($objEmpresa[$key]->getEstado_proyecto() =="Fase Diag Iniciado" ){
                            if($rol == "LIDER OEA" || $rol == "ADMINISTRADOR" ){
                            echo "
                            <a href='core/eliminarProyecto.php?idproyecto=".$objEmpresa[$key]->getId_proyecto()."'  title='' id='' class='dropdown-item'><i class='fa fa-ban fa-2x'></i>&nbsp;Eliminar Proyecto  </td>
                            ";
                            }
                          }
                        echo "</td>";
                        
                        //FASE DIAGNOSTICO
                        if($rol == "ADMINISTRADOR" || $rol == "LIDER OEA" || $rol == "ASISTENTE" 
                        || $rol == "ESPECIALISTA" || $rol == "EMPRESA" || $rol == "GRUPO" ) {

                        if($objTrabajo->getId_usuario_diagnostico() != null){
                        if($objEmpresa[$key]->getEstado_proyecto() =="Fase Diag Iniciado"){
                          if($rol == "LIDER OEA" || $rol == "ADMINISTRADOR" || $rol == "ASISTENTE" 
                          || ($rol == "ESPECIALISTA"  && $sesion == $objTrabajo->getId_usuario_diagnostico())){
                          echo "
                            <td>
                               <a href='core/iniciarDiagnostico.php?idproyecto=".$objEmpresa[$key]->getId_proyecto()."&id=".$idtrabajo."'  title='' id='' class='dropdown-item'><i class='fa fa-project-diagram fa-2x'></i>&nbsp; Iniciar Proceso </a>
                            </td>
                            ";
                          }
                        }else{
                          if($objEmpresa[$key]->getEstado_proyecto() =="Fase Diag"){
                            if($sesion !=$objTrabajo->getId_usuario_preauditoria()){
                                echo "<td>";
                             }
                            if($rol == "LIDER OEA" || $rol == "ADMINISTRADOR" || $rol == "ASISTENTE" 
                            || ($rol == "ESPECIALISTA"  && $sesion == $objTrabajo->getId_usuario_diagnostico())){
                            echo "
                               <a href='faseDiagnostico.php?idproyecto=".$objEmpresa[$key]->getId_proyecto()."&id=".$idtrabajo."'  title='' id='' class='dropdown-item'><i class='fa fa-eye fa-2x'></i>&nbsp; Proceso </a>
                               ";
                            }
                            if($rol == "LIDER OEA" || $rol == "ADMINISTRADOR" || $rol == "ASISTENTE"  || $rol == "EMPRESA"  || $rol == "GRUPO"
                            || ($rol == "ESPECIALISTA"  && ($sesion == $objTrabajo->getId_usuario_diagnostico() 
                            || ($sesion == $objTrabajo->getId_usuario_implementacion() )))){   
                            echo "
                               <a href='reporteDiagnostico.php?idempresa=".$objEmpresa[$key]->getId_proyecto()."&idproyecto=".$objEmpresa[$key]->getId_proyecto()."&id=".$idtrabajo."'  title='' id='' class='dropdown-item'><i class='fa fa-chart-bar fa-2x'></i>&nbsp; Ver Reporte</a>
                               <br>";
                            }
                               if($rol == "LIDER OEA" || $rol == "ADMINISTRADOR" || $rol == "ASISTENTE"){
                               echo "
                                     <a href='#' name='d' title='".$objEmpresa[$key]->getId_proyecto()."' id='cancelarDiagnostico' class='dropdown-item'><i class='fa fa-ban fa-2x'></i>&nbsp; Cancelar</a>";
                               }
                              
                               if($sesion !=$objTrabajo->getId_usuario_preauditoria()){
                                echo "</td>";
                             }
                            
                            }elseif($objEmpresa[$key]->getEstado_proyecto() =="Fase Impl" || $objEmpresa[$key]->getEstado_proyecto() =="Fase PreA" 
                            || $objEmpresa[$key]->getEstado_proyecto() =="Fin Proceso"){
                              if($rol == "LIDER OEA" || $rol == "ADMINISTRADOR" || $rol == "ASISTENTE"  || $rol == "EMPRESA" || $rol == "GRUPO"
                            || ($rol == "ESPECIALISTA"  && ($sesion == $objTrabajo->getId_usuario_diagnostico() 
                            || ($sesion == $objTrabajo->getId_usuario_implementacion() )))){
                              echo "
                            <td>
                               <a href='#'  title='' id='' class='dropdown-item'><i class='fa fa-eye fa-2x'></i>&nbsp; Proceso <code>Bloqueado</code></a>
                               <a href='reporteDiagnostico.php?idempresa=".$objEmpresa[$key]->getId_proyecto()."&idproyecto=".$objEmpresa[$key]->getId_proyecto()."&id=".$idtrabajo."'  title='' id='' class='dropdown-item'><i class='fa fa-chart-bar fa-2x'></i>&nbsp; Ver Reporte</a>
                               <br>
                            </td>";
                            }
                            //<a href='#'  class='dropdown-item'><i class='fa fa-ban fa-2x'></i>&nbsp; Cancelar <code>Bloqueado</code></a>
                            }else{
                              echo "
                            <td>
                               <a href='#'  title='' id='' class='dropdown-item'><i class='fa fa-eye fa-2x'></i>&nbsp; <code>Bloqueado</code></a>
                               <a href='#' class='dropdown-item'><i class='fa fa-chart-bar fa-2x'></i>&nbsp;  <code>Bloqueado</code></a>
                               <br>
                            </td>
                            ";
                            // <a href='#'  class='dropdown-item'><i class='fa fa-ban fa-2x'></i>&nbsp; Cancelar <code>Bloqueado</code></a>
                            }
                        }
                        }else{
                          echo "<td>Debe Seleccionar un <br> usuario  para la fase!</td>";
                        }
                      }

                        if($rol == "ADMINISTRADOR" || $rol == "LIDER OEA" || $rol == "ASISTENTE" ||  $rol == "EMPRESA" || $rol == "GRUPO"
                        || ($rol == "ESPECIALISTA" && $sesion == $objTrabajo->getId_usuario_implementacion())){
                        if($objTrabajo->getId_usuario_implementacion() != null){
                       // FASE IMPLEMENTACION
                        if($objEmpresa[$key]->getEstado_proyecto() =="Fase Impl" || $objEmpresa[$key]->getEstado_proyecto() =="Fase PreA" ){
                          echo "
                          <td>";
                          if($rol == "LIDER OEA" || $rol == "ADMINISTRADOR" || $rol == "ASISTENTE" || $rol == "ESPECIALISTA"){
                          echo "
                             <a href='faseImplementacion.php?idproyecto=".$objEmpresa[$key]->getId_proyecto()."&id=".$idtrabajo."'  title='' id='' class='dropdown-item'><i class='fa fa-eye fa-2x'></i>&nbsp; Proceso </a>
                             ";
                          }
                             echo "
                             <a href='reporteImplementacion.php?idempresa=".$objEmpresa[$key]->getId_proyecto()."&idproyecto=".$objEmpresa[$key]->getId_proyecto()."&id=".$idtrabajo."'  title='' id='' class='dropdown-item'><i class='fa fa-chart-bar fa-2x'></i>&nbsp; Ver Reporte</a>
                             ";
                          
                            if($rol == "LIDER OEA" || $rol == "ADMINISTRADOR" || $rol == "ASISTENTE"){
                             echo "<br>
                                   <a href='#' name='d' title='".$objEmpresa[$key]->getId_proyecto()."' id='cancelarImplementacion' class='dropdown-item'><i class='fa fa-ban fa-2x'></i>&nbsp; Cancelar</a>
                             ";
                            }
                             echo "
                             </td>
                          ";
                          }elseif($objEmpresa[$key]->getEstado_proyecto() =="Fase PreA" || $objEmpresa[$key]->getEstado_proyecto() =="Fin Proceso"){
                            echo "
                          <td>";
                          
                          if($rol == "LIDER OEA" || $rol == "ADMINISTRADOR" || $rol == "ASISTENTE" || $rol == "ESPECIALISTA"){
                          echo "
                             <a href='faseImplementacion.php?idproyecto=".$objEmpresa[$key]->getId_proyecto()."&id=".$idtrabajo."'  title='' id='' class='dropdown-item'><i class='fa fa-eye fa-2x'></i>&nbsp; Proceso </a>";
                          }
                             echo "
                             <a href='reporteImplementacion.php?idempresa=".$objEmpresa[$key]->getId_proyecto()."&idproyecto=".$objEmpresa[$key]->getId_proyecto()."&id=".$idtrabajo."'  title='' id='' class='dropdown-item'><i class='fa fa-chart-bar fa-2x'></i>&nbsp; Ver Reporte</a>
                             <br>
                            
                          </td>
                          ";
                          // <a href='#'  class='dropdown-item'><i class='fa fa-ban fa-2x'></i>&nbsp; Cancelar <code>Bloqueado</code></a>
                          }else{
                            echo "
                          <td>
                             <a href='#'  title='' id='' class='dropdown-item'><i class='fa fa-eye fa-2x'></i>&nbsp; <code>Bloqueado</code></a>
                             <a href='#' class='dropdown-item'><i class='fa fa-chart-bar fa-2x'></i>&nbsp;  <code>Bloqueado</code></a>
                             
                             <br>
                            
                          </td>
                          ";
                          //<a href='#'  class='dropdown-item'><i class='fa fa-ban fa-2x'></i>&nbsp; Cancelar <code>Bloqueado</code></a>
                          }
                          }else{
                            echo "<td>Debe Seleccionar un <br> usuario  para la fase!</td>";
                          }
                        }

                          //FASE pre
                          if($rol == "ADMINISTRADOR" || $rol == "LIDER OEA"  || $rol == "ASISTENTE" || $rol == "EMPRESA" || $rol == "GRUPO"
                          || ($rol == "ESPECIALISTA" && ( $sesion == $objTrabajo->getId_usuario_preauditoria() || $sesion == $objTrabajo->getId_usuario_implementacion()))  ){
                          if($objTrabajo->getId_usuario_preauditoria() != null){
                          if($objEmpresa[$key]->getEstado_proyecto() =="Fase PreA" ){
                          echo "
                          <td>";
                          if($rol == "LIDER OEA" || $rol == "ADMINISTRADOR" || $rol == "ASISTENTE" || 
                          ($rol == "ESPECIALISTA" &&  $sesion == $objTrabajo->getId_usuario_preauditoria())){
                          echo "
                             <a href='fasePre.php?idproyecto=".$objEmpresa[$key]->getId_proyecto()."&id=".$idtrabajo."'  title='' id='' class='dropdown-item'><i class='fa fa-eye fa-2x'></i>&nbsp; Proceso </a>
                          ";
                          }
                          
                          echo "
                             <a href='reportePre.php?idempresa=".$objEmpresa[$key]->getId_proyecto()."&idproyecto=".$objEmpresa[$key]->getId_proyecto()."&id=".$idtrabajo."'  title='' id='' class='dropdown-item'><i class='fa fa-chart-bar fa-2x'></i>&nbsp; Ver Reporte</a>
                             <br>
                            
                          </td>
                          ";
                          }elseif($objEmpresa[$key]->getEstado_proyecto() =="Fin Proceso"){
                            echo "
                          <td>
                             <a href='#'  title='' id='' class='dropdown-item'><i class='fa fa-eye fa-2x'></i>&nbsp; Proceso <code>Bloqueado</code></a>
                             <a href='reportePre.php?idempresa=".$objEmpresa[$key]->getId_proyecto()."&idproyecto=".$objEmpresa[$key]->getId_proyecto()."&id=".$idtrabajo."'  title='' id='' class='dropdown-item'><i class='fa fa-chart-bar fa-2x'></i>&nbsp; Ver Reporte</a>
                             <br>
                           
                          </td>
                          ";
                          }else{
                            echo "
                          <td>
                             <a href='#'  title='' id='' class='dropdown-item'><i class='fa fa-eye fa-2x'></i>&nbsp; <code>Bloqueado</code></a>
                             <a href='#' class='dropdown-item'><i class='fa fa-chart-bar fa-2x'></i>&nbsp;  <code>Bloqueado</code></a>
                             <br>
                            
                          </td>
                          ";
                          }
                        }else{
                          echo "<td>Debe Seleccionar un <br> usuario  para la fase!</td>";
                        }
                      }
                       
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
public static function listadoProyectosTrabajoEmpresa($idtrabajo){
  $objEmpresa=proyectoDao::listadoProyectosTrabajoEmpresa($idtrabajo);
  //print_r($objEmpresa);
  if($objEmpresa!= false){
  echo   "<table id='project-task-list' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
                  role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
              <thead>
                  <tr role='row'>
                      <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-barcode'></li> Empresa:</th>
                      <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-barcode'></li> Plantilla - Alcance Proyecto:</th>
                      <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-cog'></li>  Accion :
                      </th>
                  </tr>
              </thead>
              <tbody>
                  ";
                  foreach ($objEmpresa as $key => $value) {
                  echo"
                  <tr role='row' class='even'>
                      <td class='parrafo'>
                        ".$objEmpresa[$key]->getId_entidad_empresa_proyecto()."
                      </td>
                      <td class='parrafo'>
                        ".$objEmpresa[$key]->getId_proyecto_empresa()."
                      </td>
                      <td><a href='core/eliminarProyectoEmpresa.php?idproyecto=".$objEmpresa[$key]->getId_empresa_proyecto()."&idtrabajo=".$_GET['id']."'   class='dropdown-item'><i class='fa fa-trash fa-2x'></i>&nbsp; Eliminar </a></td>
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
                  <p class='titulo'>Actualmente no hay Proyectos asignados a empresas .</p>
              </div>
          </div>
      </div>
      ";
  }
}  
public static function listadoProyectosTrabajoSelector($idtrabajo){
  $objplantilla=proyectoDao::listadoProyectoTrabajoResumen($idtrabajo);
  //print_r($objEmpresa);
  if($objplantilla != false){
    echo "  <select id='proyectoId' name='proyectoId' class='form-control'>";                
    foreach ($objplantilla as $key => $value) {
        echo    "<option value='".$objplantilla[$key]->getId_proyecto()."'>".$objplantilla[$key]->getId_plantilla_alcance_proyecto()." </option>";
    }
    echo     "</select>";
}else{
    echo "  
            <select id='plantilla' name='plantilla' class='form-control'>
                <option value='null'>No Proyecto creados</option>
            </select>";
}
}
}
?>
