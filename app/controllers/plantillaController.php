<?php 
  include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(MODEL_PATH."plantilla.php");
  require_once(MODEL_PATH."usuario.php");
  require_once(PDO_PATH."plantilla_alcanceDao.php");
  require_once(PDO_PATH."auditoriaDao.php");
  require_once(PDO_PATH."empresaDao.php");
  require_once(PDO_PATH."paisDao.php");
  require_once(PDO_PATH."alcanceDao.php");
  require_once(CONTROLLERS_PATH.'paisController.php');
  
class plantillaController
{
	public static function editarPlantilla($idplantilla,$nombre,$area){
		return plantilla_alcanceDao::editarPlantillaPrincipal($idplantilla,$nombre,$area);
	}
	public static function ultimaPlantilla(){
		return plantilla_alcanceDao::ultimaPlantilla();
	}
	public static function plantillaId($id){
		return plantilla_alcanceDao::plantillaId($id);
	}
	public static function grupoId($id){
		return plantilla_alcanceDao::grupoId($id);
	}
	public static function itemId($id){
		return plantilla_alcanceDao::itemId($id);
	}
	public static function ultimoItemRegistrado(){
		return plantilla_alcanceDao::ultimoItemRegistrado();
	}
	public static function retornarVista($url){
		
		echo  "<script>window.location.replace('".$url."');</script> ";
		 
	}
  public static function registrarPlantilla($modelPlantilla){
	  return plantilla_alcanceDao::registrarPlantilla($modelPlantilla);
  }
  public static function registrarPlantillaGrupo($modelPlantillaGrupo){
	return plantilla_alcanceDao::registrarPlantillaGrupo($modelPlantillaGrupo);
  }
  public static function registrarPlantillaItem($modelPlantilla){
	return plantilla_alcanceDao::registrarPlantillaItem($modelPlantilla);
  }
  public static function editarPlantillaItem($modelPlantilla){
	return plantilla_alcanceDao::editarPlantillaItem($modelPlantilla);
  }
  public static function editarPlantillaGrupo($modelPlantilla){
	return plantilla_alcanceDao::editarPlantillaGrupo($modelPlantilla);
  }
  public static function nItem($id){
	return plantilla_alcanceDao::nItem($id);
  }
  
  public static function listadoPlantillaAso($idempresa){
	$objtEmpresa = empresaDao::empresaIdCom($idempresa);
	//echo $objtEmpresa->getIdarea_tecnica_empresa();
	//print_r($objtEmpresa );
	$objPlantillaNew = plantilla_alcanceDao::plantillaIdCom($objtEmpresa->getIdarea_tecnica_empresa() );
    //print_r($objPlantillaNew);
	$objplantilla = plantilla_alcanceDao::listadoPlantilla();
	if($objplantilla != false){
	  
		echo "  <label for=''><h5 class='card-title'><li class='fa fa-list-ul'></li> <span class='text-danger'>*</span> Plantilla:</h5></label>
				<select id='plantilla' name='plantilla' class='form-control'>
				<option value='".$objPlantillaNew->getIdplantilla_maestra()."'>
			PLANTILLA AES ->    ".$objPlantillaNew->getEtiqueta_plantilla()."     PAIS DE IMPLEMENTACION ->   ".$objPlantillaNew->getPais_plantilla()."     AREA TECNICA  ->  ".$objPlantillaNew->getIdarea_tecnica_plantilla()." </option>";                
		foreach ($objplantilla as $key => $value) {     
			echo    "<option value='".$objplantilla[$key]->getIdplantilla_maestra()."'>
			PLANTILLA AES ->    ".$objplantilla[$key]->getEtiqueta_plantilla()."     PAIS DE IMPLEMENTACION ->   ".$objplantilla[$key]->getPais_plantilla()."     AREA TECNICA  ->  ".$objplantilla[$key]->getIdarea_tecnica_plantilla()." </option>";
			
		}
		
		echo     "</select>";
	}else{
		echo "  <label for=''>Plantillas PVP:</label>
				<select id='plantilla' name='plantilla' class='form-control'>
					<option value='null'>SIN PLANTILLA</option>
				</select>";
	}
}    
  public static function listadoPlantilla(){
	$objplantilla = plantilla_alcanceDao::listadoPlantilla();
	if($objplantilla != false){
	  
		echo "  <label for=''><h5 class='card-title'><li class='fa fa-list-ul'></li> <span class='text-danger'>*</span> Plantilla:</h5></label>
				<select id='plantilla' name='plantilla' class='form-control'>
				";                
		foreach ($objplantilla as $key => $value) {     
			echo    "<option value='".$objplantilla[$key]->getIdplantilla_maestra()."'>
			->  ".$objplantilla[$key]->getEtiqueta_plantilla()."     PAIS DE IMPLEMENTACION ->   ".$objplantilla[$key]->getPais_plantilla()."     AREA TECNICA  ->  ".$objplantilla[$key]->getIdarea_tecnica_plantilla()." </option>";
			
		}
		
		echo     "</select>";
	}else{
		echo "  <label for=''>Plantillas PVP:</label>
				<select id='plantilla' name='plantilla' class='form-control'>
					<option value='null'>SIN PLANTILLA</option>
				</select>";
	}
}    
	public static function listadoGrupoPlantilla($id){
		$objplantilla = plantilla_alcanceDao::listadoGrupoPlantilla($id);
		//print_r($objplantilla);
		if($objplantilla != false){
		  
			echo "  <label for=''><h5 class='card-title'><li class='fa fa-clipboard-list'></li> Capitulo:</h5></label>
					<select id='plantilla' name='plantilla' class='form-control'>
					";                
			foreach ($objplantilla as $key => $value) {     
				echo    "<option value='".$objplantilla[$key]->getId_grupo_plantilla_alcance()."'>
				".$objplantilla[$key]->getEtiqueta_grupo_plantilla()." - ".$objplantilla[$key]->getTitulo_grupo_plantilla()." </option>";
				
			}
			
			echo     "</select>";
		}else{
			echo "  <label for=''>Plantillas PVP:</label>
					<select id='plantilla' name='plantilla' class='form-control'>
						<option value='null'>SIN PLANTILLA</option>
					</select>";
		}
	}
	public static function GrupoPlantillaListado($id){
		return plantilla_alcanceDao::listadoGrupoPlantilla($id);
		
	}
	public static function cargarPlantillaUI($idplantilla){
		$GrupoPlantilla = plantilla_alcanceDao::listadoGrupoPlantilla($idplantilla);
		//print_r($GrupoPlantilla);
		$c=0;
		foreach ($GrupoPlantilla  as $key => $value) {
	
			// echo "<form class='form row'>
			//     <div class='form-group mb-1 col-sm-12 col-md-4'>
			//         <label for='projectinput3'><span </span> Consecutivo</label>
			//         <input type='text' id='projectinput3'
			//                 class='form-control' placeholder='. . . '
			//                 name='consecutivo' value='".$GrupoPlantilla[$key]->getEtiqueta_grupo_plantilla()."'>
			//     </div>
			//     <div class='form-group mb-1 col-sm-12 col-md-8'>
			//         <label for='projectinput3'><span
			//                     class='text-danger'>*</span>
			//                 </span> Etiqueta de grupo</label>
			//         <input type='text' id='projectinput3'
			//                 class='form-control' placeholder='. . . '
			//                 name='etiquetaPlantilla' value='".$GrupoPlantilla[$key]->getTitulo_conjunto()."'>
			//     </div>
			//     <br>
				
				
				
			// </form>";
			//$objsItem = plantilla_alcanceDao::listadoGrupoPlantillaItem($GrupoPlantilla[$key]->getId_grupo_plantilla_alcance());
			
			echo "<div class='card collapse-icon accordion-icon-rotate'>
			<div id='headingCollapse11' class='card-header'>
				<a data-toggle='collapse' href='#collapse11".$c."' aria-expanded='false' aria-controls='collapse11' class='card-title lead collapsed'><li class='fa fa-caret-square-down'></li>&nbsp;".$GrupoPlantilla[$key]->getEtiqueta_grupo_plantilla()." - ".$GrupoPlantilla[$key]->getTitulo_conjunto()."</a>
			</div>
			<div id='collapse11".$c."' role='tabpanel' aria-labelledby='headingCollapse11' class='collapse' style=''>
				<div class='card-content'>
					<div class='card-body'>
						
						<ul class='nav nav-pills'>
							<li class='nav-item'>
								<a class='nav-link active waves-effect waves-dark' id='base-pill00' data-toggle='pill' href='#pill00' aria-expanded='true'>Grupo</a>
							</li>";
							$objsItem = plantilla_alcanceDao::listadoGrupoPlantillaItem($GrupoPlantilla[$key]->getId_grupo_plantilla_alcance());
							 $c1=0;
							 $cod =$GrupoPlantilla[$key]->getId_grupo_plantilla_alcance();
							 //print_r($objsItem);
							foreach ($objsItem as $keys => $values) {
							 
							   
							  echo "<li class='nav-item '>
										<a class='nav-link  waves-effect waves-dark' id='base-pill".$c1.$cod."' data-toggle='pill' href='#pill".$c1.$cod."' aria-expanded='true'>".$objsItem[$keys]->getEtiqueta_item_grupo_plantilla()."</a>
									</li>";
								$c1=intval($c1)+1;      
							}
							
							
				  echo "</ul>
						<div class='tab-content px-1 pt-1'>
							<div role='tabpanel' class='tab-pane active' id='pill00' aria-expanded='true' aria-labelledby='base-pill00'>
								<form class='form row'>
									<div class='form-group mb-1 col-sm-12 col-md-4'>
										<label for='projectinput3'>Consecutivo</label>
										<input type='text' id='projectinput3'
												class='form-control' placeholder='. . . '
												name='consecutivo' value='".$GrupoPlantilla[$key]->getEtiqueta_grupo_plantilla()."'>
									</div>
									<div class='form-group mb-1 col-sm-12 col-md-8'>
										<label for='projectinput3'>
												</span> Etiqueta de grupo</label>
										<input type='text' id='projectinput3'
												class='form-control' placeholder='. . . '
												name='etiquetaPlantilla' value='".$GrupoPlantilla[$key]->getTitulo_conjunto()."'>
									</div>
									<br>
								</form>
							</div>";
							$c2=0;
							$objsItem2 = plantilla_alcanceDao::listadoGrupoPlantillaItem($GrupoPlantilla[$key]->getId_grupo_plantilla_alcance());
							foreach ($objsItem2 as $keys2 => $values2) {
								echo "<div role='tabpanel' class='tab-pane ' id='pill".$c2.$cod."' aria-expanded='true' aria-labelledby='base-pill".$c2.$cod."'>
										<textarea id='projectinput9' rows='5' class='form-control' >".$objsItem2[$keys2]->getDescripcion_item_grupo_plantilla()."</textarea>
									   </div>";
								$c2=intval($c2)+1;       
							  }
  
						echo "	
						</div>
					
					</div>
				</div>
			</div>
			
		</div>";
		$c=intval($c)+1;
		}  
	}
  public static function listadoPlantillas(){
	$objEmpresa=plantilla_alcanceDao::listadoPlantilla();
	//print_r($objEmpresa);
	if($objEmpresa!= false){
	echo   "<table id='project-task-list' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
					role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
				<thead>
					<tr role='row'>
					    <th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-cog'></li>  Ver
						</th>
						<th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-copy'></li>  Clonar
						</th>
						
						<th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-tags'></li>  Resolución
						</th>
						<th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-globe'></li> País
						</th>
						<th class='titulo' rowspan='1' colspan='1' ><li class='fa fa-toggle-on'></li> Estado
						</th>
						
					</tr>
				</thead>
				<tbody>
					<tr class='group'>
					  <td colspan='8'>
						<h6 class='mb-0'>Última actualización del listado: 
							  <span class='text-bold-600'>".date("d")."-".date("m")."-".date("Y")."</span> - 
							  <span class='text-bold-600'>".date("g")." : ".date("i")."</span>
						 </h6>
					  </td>
					</tr>";
					foreach ($objEmpresa as $key => $value) {    
						$pais = paisDao::PaisId($objEmpresa[$key]->getId_pais_plantilla());
						$alcance = alcanceDao::alcanceId($objEmpresa[$key]->getId_alcance_plantilla());      
					echo"
					<tr role='row' class='even'>
					<td class='reorder sorting_1'><a href='verFicha.php?id=".$objEmpresa[$key]->getId_plantilla_alcance() ."' class='dropdown-item'><i class='fa fa-eye fa-2x'></i> </a></td>
					";
					
						echo "<td class='reorder sorting_1'><a href='#' id='clonar' title='".$objEmpresa[$key]->getId_plantilla_alcance() ."' class='dropdown-item'><i class='fa fa-copy fa-2x'></i> </a></td>";
					
						
					echo "	
						<td class='reorder sorting_1'>
						".$objEmpresa[$key]->getEtiqueta_plantilla()."
						</td>
						<td class='reorder sorting_1'>
						".$pais->getNombre_pais()."
						</td>
						<td class='reorder sorting_1'>
							<span class='badge badge-default badge-success round'>ACTIVO</span>
						</td>
					
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
					<strong>UPS tenemos un problema!!</strong> <p>Actualmente no hay plantillas registradas con la consulta anterior</p>
				</div>
			</div>
		</div>
		";
	}
}
public static function listadoPlantillasInforme($idplantillaMaestra,$idauditoria){
	$GrupoPlantilla = plantilla_alcanceDao::listadoGrupoPlantilla($idplantillaMaestra);
	//print_r( $GrupoPlantilla);
	if($GrupoPlantilla!= false){
	echo   "<table id='project-task-list' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
					role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
				<thead>
					<tr role='row'>
						<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-list-ol'></li>  #
						</th>
						<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-tasks'></li> Capitulo
						</th>
						<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-check'></li> Cumplen
						</th>
						<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-minus'></li> N cumplen
						</th>
						
						<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-tasks'></li> Total
						</th>
						
					</tr>
				</thead>
				<tbody>
				";
					foreach ($GrupoPlantilla as $key => $value) {           
					echo"
					<tr role='row' class='even'>
						<td class='reorder sorting_1'>
						".$GrupoPlantilla[$key]->getEtiqueta_grupo_plantilla()."
						</td>
						<td class='reorder sorting_1'>
						".$GrupoPlantilla[$key]->getTitulo_conjunto()."
						</td>
						<td class='reorder sorting_1'>".auditoriaDao::capitulosElegidosEstado($GrupoPlantilla[$key]->getId_grupo_plantilla_alcance(),$idauditoria,2)."</td>
						<td class='reorder sorting_1'>".auditoriaDao::capitulosElegidosEstado($GrupoPlantilla[$key]->getId_grupo_plantilla_alcance(),$idauditoria,3)."</td>
						
						<td class='reorder sorting_1'>
						".auditoriaDao::numeroCapitulosElegidos($GrupoPlantilla[$key]->getId_grupo_plantilla_alcance(),$idauditoria)."
						</td>
						
						
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
							  <strong>UPS tenemos un problema!!</strong> <p>Actualmente no hay capitulos agregados a la plantilla</p>
						  </div>
					  </div>
				  </div>
				  ";
			  }
	
}
public static function listadoPlantillasGrupo($idplantillaMaestra){
	$GrupoPlantilla = plantilla_alcanceDao::listadogrupo_plantilla_alcance($idplantillaMaestra);
	//print_r( $GrupoPlantilla);
	if($GrupoPlantilla!= false){
	echo   "<table id='project-task-list' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
					role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
				<thead>
					<tr role='row'>";
				
					echo "
					<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-edit'></li> Editar Capítulo
					</th>";
					
					echo "
						<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-list-ul'></li>  Numeral Capítulo
						</th>
						<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-tasks'></li> Capítulo
						</th>
						<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-tasks'></li> Requisito
						</th>
						
						<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-list-ul'></li> Ver Requisito
						</th>
						";
						
						echo "
						<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-ban'></li> Eliminar Capítulo
						</th>";
						
						echo "
					</tr>
				</thead>
				<tbody>
					<tr class='group'>
					  <td colspan='8'>
						<h6 class='mb-0'>Última actualización del listado: 
							  <span class='text-bold-600'>".date("d")."-".date("m")."-".date("Y")."</span> - 
							  <span class='text-bold-600'>".date("g")." : ".date("i")."</span>
						 </h6>
					  </td>
					</tr>";
					foreach ($GrupoPlantilla as $key => $value) {           
					echo"
					<tr role='row' class='even'>";
				
					echo "
					<td class='reorder sorting_1'><a href='verGrupo.php?id=".$GrupoPlantilla[$key]->getId_grupo_plantilla_alcance()."' class='dropdown-item'><i class='fa fa-edit fa-2x'></i> </a></td>
					";
					
					echo "
						<td class='reorder sorting_1'>
						".$GrupoPlantilla[$key]->getEtiqueta_grupo_plantilla()."
						</td>
						<td class='reorder sorting_1'>
						".$GrupoPlantilla[$key]->getTitulo_grupo_plantilla()."
						</td>";
						
						 $num = plantillaController::nItem($GrupoPlantilla[$key]->getId_grupo_plantilla_alcance());
					
						if(intval($num)>0){
							echo "<td class='reorder sorting_1'>".$num."</td>";
							echo "<td class='reorder sorting_1'><a href='verCapitulos.php?id=".$GrupoPlantilla[$key]->getId_grupo_plantilla_alcance()."' class='dropdown-item'><i class='fa fa-eye fa-2x'></i> </a></td>";
						}else{
							echo "<td class='reorder sorting_1'>0</td>";
							echo "<td class='reorder sorting_1'><li class='fa fa-ban'></li>&nbsp;Sin Requisitos</td>";
						}
					
						echo "
						<td class='reorder sorting_1'><a href='#' id='eliminarCapitulo' title='".$GrupoPlantilla[$key]->getId_grupo_plantilla_alcance()."' class='dropdown-item'><i class='fa fa-trash-alt fa-2x'></i> </a></td>
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
							  <strong>UPS tenemos un problema!!</strong> <p>Actualmente no hay capitulos agregados a la plantilla</p>
						  </div>
					  </div>
				  </div>
				  ";
			  }
	
}
public static function listadoPlantillasGrupo2($idplantillaMaestra){
	$GrupoPlantilla = plantilla_alcanceDao::listadoGrupoPlantilla($idplantillaMaestra);
	//print_r( $GrupoPlantilla);
	if($GrupoPlantilla!= false){
	echo   "<table id='project-task-list' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
					role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
				<thead>
					<tr role='row'>
					
						<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-list-ol'></li> CAPITULO / ASPECTO EVAUADO
						</th>
						<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-edit'></li> CONCLUSIONES / COMENTARIOS DE LA AUDITORIA
						</th>
						
					</tr>
				</thead>
				<tbody>
					";
					foreach ($GrupoPlantilla as $key => $value) {           
					echo"
					<tr role='row' class='even'>
						<td class='reorder sorting_1'>
						".$GrupoPlantilla[$key]->getEtiqueta_grupo_plantilla().". ".$GrupoPlantilla[$key]->getTitulo_conjunto()."
						</td>
						<td class='reorder sorting_1'>
						<textarea class='form-control' rows='8' cols='110'></textarea>
						
						
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
							  <strong>UPS tenemos un problema!!</strong> <p>Actualmente no hay capitulos agregados a la plantilla</p>
						  </div>
					  </div>
				  </div>
				  ";
			  }
	
}
public static function grupoPlantillaItemListado($idplantillaMaestra){
	return plantilla_alcanceDao::listadoGrupoPlantillaItem2($idplantillaMaestra);
}
public static function listadoGrupoPlantillaItem($idplantillaMaestra){
	$GrupoPlantilla = plantilla_alcanceDao::listadoGrupoPlantillaItem2($idplantillaMaestra);
	//print_r( $GrupoPlantilla);
	
	echo   "<table id='project-task-list' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
					role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
				<thead>
					<tr role='row'>
					";
					
					echo "
					<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-edit'></li> Editar
						</th>";
					


                    echo "

						<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-list-ol'></li>  Título
						</th>
						<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-list-ol'></li>  Descripción
						</th>
						";
					
						echo "
						<th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-ban'></li> Eliminar
						</th>";
					
					echo "
					</tr>
				</thead>
				<tbody>
					";
					foreach ($GrupoPlantilla as $key => $value) {           
					echo"
					<tr role='row' class='even'>";
                  
					echo "
					<td class='reorder sorting_1'><a href='verRubrica.php?id=".$GrupoPlantilla[$key]->getId_item_grupo_plantilla_certificacion()."' class='dropdown-item'><i class='fa fa-edit fa-2x'></i> </a></td>
					";
					
					
					echo "
					<td class='reorder sorting_1'>
						".$GrupoPlantilla[$key]->getEtiqueta_item_plantilla()."
						</td>
						<td class='reorder sorting_1'>
						<textarea  rows='20' cols='110'>".$GrupoPlantilla[$key]->getDescripcion_item_plantilla()."</textarea>
						</td>";
                      
						echo "
						<td class='reorder sorting_1'><a id='eliminarRequisito' href='#' title='".$GrupoPlantilla[$key]->getId_item_grupo_plantilla_certificacion()."' class='dropdown-item'><i class='fa fa-trash-alt fa-2x'></i> </a></td>
						";
						
						echo "
						</tr>";
				  }
					echo"
				</tbody>
			</table>";
	
}
	
	
}
?>
