<?php

  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(PDO_PATH . "usuarioDao.php");
$objUsuario = usuarioDao::listadoUsuariosColaboradoresProyecto($id);
if($objUsuario!= false){
  echo   "<table id='project-task-list' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
                  role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
              <thead>
                  <tr role='row'>
                      
                      <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-barcode'></li> Nombre Colaborador:</th>
                      <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-money-check'></li>  Cargo :
                      </th>
                      <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-cog'></li>  Ver
                      </th>
                      
                  </tr>
              </thead>
              <tbody>
                  <tr class='group'>
                    <td colspan='8'>
                      <h6 class='mb-0'>Ultima Actualizacion del Listado: 
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
                        <td><a href='' class='dropdown-item'><i class='fa fa-trash fa-2x'></i> </a></td>";
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
?>