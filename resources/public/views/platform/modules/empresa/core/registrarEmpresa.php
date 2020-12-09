<?php 
	header("Access-Control-Allow-Origin: *");
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
	
	require_once(LIB_PATH."util.php");
	require_once(CONTROLLERS_PATH."empresaController.php");
	require_once(MODEL_PATH."empresa.php");
	$grupo = "NULL";
	if($_POST['grupo'] != "NULL"){$grupo =$_POST['grupo'];}
	//echo $_POST['grupo'];
	$modelEmpresa = new empresa(
		 null,
		 $_POST['pais'],
		 $grupo,
		 strtoupper($_POST['razonSocial']),
		 $_POST['nit'],
		 strtoupper($_POST['departamento']),
		 strtoupper($_POST['ciudad']),
		 strtoupper($_POST['direccion']),
		 $_POST['naturaleza'],
		 $_POST['telefono'],
		 $_POST['emailEmpresarial'],
		 strtoupper($_POST['representanteLegal']),
		 strtoupper($_POST['cargoRepresentante']),
		 $_POST['telefonoRepresentante'],
		 $_POST['emailContacto'],
		 strtoupper($_POST['representanteLegal2']),
		 strtoupper($_POST['cargoRepresentante2']),
		 $_POST['telefonoRepresentante2'],
		 $_POST['emailContacto2'],
		 $_POST['link'],
		 $_POST['usuario']."-".$_POST['clave'],
		 null,
		 null
	);
	//print_r($modelEmpresa);
	if(empresaController::verificarNit($_POST['nit']) < 1){
	$objEmpresa = empresaController::registrarEmpresa($modelEmpresa);
	if($objEmpresa == false){
			echo "<div class='alert round bg-danger alert-dismissible mb-2' role='alert'>
								<button   class='close' data-dismiss='alert' aria-label='Close'>
										<span aria-hidden='true'>×</span>
								</button>
								<strong>Oh tenemos un problema !</strong>El registro de la empresa no puedo ser realizada consulte con su administrador del sistema!.
						</div>";
			echo  "<script> errorRegistroEmpresa(); </script>" ;  
	}else{
			// echo "<div class='alert round bg-success alert-dismissible mb-2' role='alert'>
			//           <button   class='close' data-dismiss='alert' aria-label='Close'>
			//               <span aria-hidden='true'>×</span>
			//           </button>
			//           <strong>Registro de la empresa completado !</strong> <br>
			//       </div>";
			echo  "<script>  registroEmpresa();  </script>" ;
			$idempresa= empresaController::ultimaEmpresaRegistrada();
			
			
			$directorio=DOCUMENTS_PATH."documentos/empresa/".$idempresa;
		
			// //echo $directorio;
			if(!is_dir($directorio)){ if(!mkdir($directorio, 0755,true)) {die('Fallo al crear las carpetas...'); }}
			
			// //print_r($_POST);
			if(!empty($_FILES["rut"]) ){
				
				$temp_archivo = $_FILES["rut"]["tmp_name"];
				$f1=move_uploaded_file($temp_archivo,$directorio . "/rut.pdf");
			}
			if(!empty($_FILES["camara"]) ){
				
				$temp_archivo = $_FILES["camara"]["tmp_name"];
				$f2=move_uploaded_file($temp_archivo,$directorio . "/camara.pdf");
			}
			if(!empty($_FILES["legal"]) ){
				
				$temp_archivo = $_FILES["legal"]["tmp_name"];
				$f3=move_uploaded_file($temp_archivo,$directorio . "/legal.pdf");
			}
			if(!empty($_FILES["comercial"]) ){
				
				$temp_archivo = $_FILES["comercial"]["tmp_name"];
				$f4=move_uploaded_file($temp_archivo,$directorio . "/comercial.pdf");
			}
			if(!empty($_FILES["antecedentes"]) ){
				
				$temp_archivo = $_FILES["antecedentes"]["tmp_name"];
				$f5=move_uploaded_file($temp_archivo,$directorio . "/antecedentes.pdf");
			
			}
			//echo "<div class='alert alert-success' role='alert'>
			//			 <li class='fa fa-check-circle'></li> Registro de empresa exitoso ! &nbsp 
			//		 </div>
			//		 <a class='btn btn-info round btn-min-width mr-1 mb-1 waves-effect waves-light' href='".MODULE_APP_SERVER.'empresa/verFicha.php?id='.$idempresa."'  class='btn btn-gradient-primary text-white'><li class='fa fa-check-circle'></li>  Ficha de empresa</a>";
			$url =MODULE_APP_SERVER."empresa/verFicha.php?id=".$idempresa; 
            empresaController::retornarVista($url);   
	    }
}else{
	echo "<div class='alert round bg-danger alert-dismissible mb-2' role='alert'>
								<button   class='close' data-dismiss='alert' aria-label='Close'>
										<span aria-hidden='true'>×</span>
								</button>
								<strong>Oh tenemos un problema !</strong>El nit de empresa ingresado ya corresponde a un nit registrado en nuestro sistema!.
						</div>";
}
 
?>  