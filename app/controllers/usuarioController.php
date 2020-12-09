<?php
  include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(MODEL_PATH."usuario.php");
  require_once(PDO_PATH."usuarioDao.php");
  require_once (CONTROLLERS_PATH."usuarioController.php");
class usuarioController
{
  public static function desactivar($id){
    return usuarioDao::desactivar($id);
  }

  public static function activar($id){
    return usuarioDao::activar($id);
  }



  public static function numUsuariosTotal(){
    return usuarioDao::numUsuariosTotal();
  }
  public static function autenticacion($usuario,$clave,$idusuario){
    return usuarioDao::autenticacion($usuario,$clave,$idusuario);
  }
  public static function registrarUsuario($modelUsuario){
    return usuarioDao::registrarUsuario($modelUsuario);
  }
  public static function modificarUsuario($modelUsuario){
    return usuarioDao::modificarUsuario($modelUsuario);
  }
  public static function usuarioId($modelUsuario){
    return usuarioDao::usuarioId($modelUsuario);
  }
  public static function listadoUsuarios($consulta,$estado){
    $objUsuario = usuarioDao::listadoUsuarios($consulta,$estado);
    if($objUsuario!= false){
      echo   "<table id='project-task-list' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
                      role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
                  <thead>
                      <tr role='row'>
                          <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-cog'></li>  Ver
                          </th>
                          <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-barcode'></li> Rol</th>
                          <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-barcode'></li> Número de Cedula</th>
                          <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-money-check'></li>  Nombre Usuario
                          </th>
                          <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-globe'></li>  Ciudad
                          </th>
                          <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-warehouse'></li>  Dirección
                          </th>
                          <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-chart-line'></li>  Teléfono
                          </th>
                          <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-chart-line'></li>  Fecha Creación
                          </th>
                          
                      </tr>
                  </thead>
                  <tbody>
                      <tr class='group'>
                        <td colspan='8'>
                          <h6 class='mb-0'>Última Actualización
                                <span class='text-bold-600'>".date("d")."-".date("m")."-".date("Y")."</span> - 
                                <span class='text-bold-600'>".date("g")." : ".date("i")."</span>
                           </h6>
                        </td>
                      </tr>";
                      foreach ($objUsuario as $key => $value) {
                      echo"
                      <tr role='row' class='even'>
                          <td><a href='".MODULE_APP_SERVER."usuarios/verFicha.php?id=".$objUsuario[$key]->getId_usuario()."' class='dropdown-item'><i class='fa fa-eye fa-2x'></i> </a></td>
                          <td class='parrafo'>
                            ".$objUsuario[$key]->getRol_usuario()."
                          </td>
                          <td class='parrafo'>
                          <a href='".MODULE_APP_SERVER."usuarios/verFicha.php?id=".$objUsuario[$key]->getId_usuario()."' class='dropdown-item'>".$objUsuario[$key]->getDocumento_identificacion_usuario()."</a>
                           
                          </td>
                          <td class='parrafo'>
                            ".$objUsuario[$key]->getNombre_usuario()."
                          </td>
                          <td class='parrafo'>
                            ".$objUsuario[$key]->getCiudad_usuario()."
                          </td>
                          <td class='parrafo'>
                            ".$objUsuario[$key]->getDireccion_usuario()."
                          </td>
                          <td class='parrafo'>
                            ".$objUsuario[$key]->getTelefono_usuario()."
                            </td>
                          <td class='parrafo'>
                            ".$objUsuario[$key]->getFecha_creacion_usuario()."
                            </td>";
                          
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
                      <strong>UPS tenemos un problema!!</strong> <p>Actualmente no hay usuarios registrados con la consulta anterior</p>
                  </div>
              </div>
          </div>
          ";
      }
  }
  public static function ultimaUsuarioRegistrado($idUsuario){
    return usuarioDao::ultimaUsuarioRegistrado($idUsuario);
  }
  public static function ncolaboradoresItem($iditem,$idImpl){
    return usuarioDao::ncolaboradoresItem($iditem,$idImpl);
  }
  public static function listadoUsuariosEspecialistas($idusuario,$idtrabajo)
  {
   
    //print_r($user);
    $objUsuario = usuarioDao::listadoUsuariosEspecialistas2($id,$idtrabajo);
    if ($objUsuario != false) {
      echo "  <select id='usuario' name='usuario' class='form-control'>";
       $user = usuarioController::usuarioId($idusuario);
      if($user == false){ 
        echo "<option value='null'>Seleccionar Usuario</option>";    
      }else{
         echo   "<option value='" .  $user->getId_usuario() . "'>" . $user->getNombre_usuario() . " </option>";      
      }
      foreach ($objUsuario as $key => $value) {
        echo   "<option value='" . $objUsuario[$key]->getId_usuario() . "'>" . $objUsuario[$key]->getNombre_usuario() . " </option>";
      }
      echo     "</select>";
    } else {
      echo "  
                <select id='plantilla' name='plantilla' class='form-control'>
                  <option value='null'>No hay empresas creadas</option>
                </select>";
    }
  }
  public static function listadoUsuariosEspecialistasDiag($idusuario,$idtrabajo)
  {
  
    $objTrabajo = trabajoController::trabajoId($idtrabajo);
    //print_r($user);
    $objUsuario = usuarioDao::listadoUsuariosEspecialistas();
    if ($objUsuario != false) {
      echo "  <select id='usuario' name='usuario' class='form-control'>";
       $user = usuarioController::usuarioId($idusuario);
      if($user == false){ 
        echo "<option value='null'>Seleccionar Usuario</option>";    
      }else{
         echo   "<option value='" .  $user->getId_usuario() . "'>" . $user->getNombre_usuario() . " </option>";      
      }
      foreach ($objUsuario as $key => $value) {
        
        if( $objTrabajo->getId_usuario_preauditoria() != $objUsuario[$key]->getId_usuario()  ){
          echo   "<option value='" . $objUsuario[$key]->getId_usuario() . "'>" . $objUsuario[$key]->getNombre_usuario() . " </option>";
        }
      }
      echo     "</select>";
    } else {
      echo "  
                <select  class='form-control'>
                  <option value='null'>No hay usuarios disponibles</option>
                </select>";
    }
  }
  public static function listadoUsuariosEspecialistasImpl($idusuario,$idtrabajo)
  {
  
    $objTrabajo = trabajoController::trabajoId($idtrabajo);
    //print_r($user);
    $objUsuario = usuarioDao::listadoUsuariosEspecialistas();
    if ($objUsuario != false) {
      echo "  <select id='usuario' name='usuario' class='form-control'>";
       $user = usuarioController::usuarioId($idusuario);
      if($user == false){ 
        echo "<option value='null'>Seleccionar Usuario</option>";    
      }else{
         echo   "<option value='" .  $user->getId_usuario() . "'>" . $user->getNombre_usuario() . " </option>";      
      }
      foreach ($objUsuario as $key => $value) {
        
        if( $objTrabajo->getId_usuario_preauditoria() != $objUsuario[$key]->getId_usuario()  ){
          echo   "<option value='" . $objUsuario[$key]->getId_usuario() . "'>" . $objUsuario[$key]->getNombre_usuario() . " </option>";
        }
      }
      echo     "</select>";
    } else {
      echo "  
                <select  class='form-control'>
                  <option value='null'>No hay usuarios disponibles</option>
                </select>";
    }
  }
  public static function listadoUsuariosEspecialistasPre($idusuario,$idtrabajo)
  {
  
    $objTrabajo = trabajoController::trabajoId($idtrabajo);
    //print_r($user);
    $objUsuario = usuarioDao::listadoUsuariosEspecialistas();
    if ($objUsuario != false) {
      echo "  <select id='usuario' name='usuario' class='form-control'>";
       $user = usuarioController::usuarioId($idusuario);
      if($user == false){ 
        echo "<option value='null'>Seleccionar Usuario</option>";    
      }else{
         echo   "<option value='" .  $user->getId_usuario() . "'>" . $user->getNombre_usuario() . " </option>";      
      }
      foreach ($objUsuario as $key => $value) {
        
        if( $objTrabajo->getId_usuario_diagnostico()  != $objUsuario[$key]->getId_usuario() &&
          $objTrabajo->getId_usuario_implementacion()  != $objUsuario[$key]->getId_usuario() ){
          echo   "<option value='" . $objUsuario[$key]->getId_usuario() . "'>" . $objUsuario[$key]->getNombre_usuario() . " </option>";
        }
      }
      echo     "</select>";
    } else {
      echo "  
                <select  class='form-control'>
                  <option value='null'>No hay usuarios disponibles</option>
                </select>";
    }
  }
  public static function listadoUsuariosColaboradores($iditem)
  {
   
    ///print_r($user);
    $objUsuario = usuarioDao::listadoUsuariosColaboradoresProyecto($iditem);
    if ($objUsuario != false) {
      echo "  <select id='usuario".$iditem."' name='usuario".$iditem."' class='form-control'>";
      foreach ($objUsuario as $key => $value) {
        echo   "<option value='" . $objUsuario[$key]->getId_colaborador() . "'>" . $objUsuario[$key]->getNombre_colaborador(). " - ".$objUsuario[$key]->getCargo_colaborador()." </option>";
      }
      echo     "</select>";
    } else {
      echo "  
        <select id='plantilla' name='plantilla' class='form-control'>
          <option value='null'>No hay empresas creadas</option>
        </select>";
    }
  }
  
  public static function listadoUsuariosColaboradoresTabla($id)
  {
    $objUsuario = usuarioDao::listadoUsuariosColaboradoresProyecto($id);
    if($objUsuario!= false){
      echo   "<table id='project-task-list' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
                      role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
                  <thead>
                      <tr role='row'>
                          
                          <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-users'></li> Nombre Colaborador:</th>
                          <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-money-check'></li>  Cargo :
                          </th>
                          
                          <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-ban'></li> Eliminar
                          </th>
                          
                      </tr>
                  </thead>
                  <tbody>
                      <tr class='group'>
                        <td colspan='8'>
                          <h6 class='mb-0'>Última Actualización del Listado: 
                                <span class='text-bold-600'>".date("d")."-".date("m")."-".date("Y")."</span> - 
                                <span class='text-bold-600'>".date("g")." : ".date("i")."</span>
                           </h6>
                        </td>
                      </tr>";
                      foreach ($objUsuario as $key => $value) {
                      echo"
                      <tr role='row' class='even'>
                          <td class='parrafo'>
                            ".$objUsuario[$key]->getNombre_colaborador()."
                            </td>
                          <td class='parrafo'>
                            ".$objUsuario[$key]->getCargo_colaborador()."
                            </td>
                            <td><a href='#' title='' name='".$objUsuario[$key]->getId_colaborador()."' id='eliminarColaborador' class='dropdown-item'><i class='fa fa-trash fa-2x'></i>Eliminar Colaborador </a></td>";
                            
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
                       <p>Actualmente no hay colaboradores agregados</p>
                  </div>
              </div>
          </div>
          ";
      }
  }
  public static function listaColaboradoresItem($iditem)
  {
    $objUsuario = usuarioDao::listadoUsuariosColaboradoresId($iditem);
    if($objUsuario!= false){
      echo   "<table id='project-task-list' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
                      role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
                  <thead>
                      <tr role='row'>
                          
                          <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-users'></li> Nombre Colaborador:</th>
                          <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-money-check'></li>  Cargo :
                          </th>
                          
                          <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-ban'></li> Quitar Asigancion
                          </th>
                          
                      </tr>
                  </thead>
                  <tbody>
                      <tr class='group'>
                        <td colspan='8'>
                          <h6 class='mb-0'>Última Actualización del Listado: 
                                <span class='text-bold-600'>".date("d")."-".date("m")."-".date("Y")."</span> - 
                                <span class='text-bold-600'>".date("g")." : ".date("i")."</span>
                           </h6>
                        </td>
                      </tr>";
                      foreach ($objUsuario as $key => $value) {
                      echo"
                      <tr role='row' class='even'>
                          <td class='parrafo'>
                            ".$objUsuario[$key]->getNombre_colaborador()."
                            </td>
                          <td class='parrafo'>
                            ".$objUsuario[$key]->getCargo_colaborador()."
                            </td>
                            <td><a href='#' title='' name='".$objUsuario[$key]->getId_colaborador()."' id='eliminarColaborador' class='dropdown-item'><i class='fa fa-trash fa-2x'></i>Eliminar Colaborador </a></td>";
                            
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
                       <p>Actualmente no hay colaboradores agregados</p>
                  </div>
              </div>
          </div>
          ";
      }
  }
}
?>
