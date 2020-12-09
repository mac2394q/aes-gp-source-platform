<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."empresaController.php");
  require_once(LIB_PATH."util.php");
  require_once(MODEL_PATH."sede.php");
  require_once(MODEL_PATH."contacto.php");
  
  $_POST['contadorCertificados'];
  
  // echo "contador ".$_POST['contadorCertificados']."<br>";
  // echo "grupo ".$_POST['grupo']."<br>";
  // echo "razonSocial ".$_POST['razonSocial']."<br>";
  // echo "nit ".$_POST['nit']."<br>";
  // echo "ciudad ".$_POST['ciudad']."<br>";
  // echo "departamento ".$_POST['departamento']."<br>";
  // echo "direccion ".$_POST['direccion']."<br>";
  // echo "pais ".$_POST['pais']."<br>";
  // echo "emailEmpresarial ".$_POST['emailEmpresarial']."<br>";
  // echo "area ".$_POST['area']."<br>";
  // echo "cargoRepresentante ".$_POST['cargoRepresentante']."<br>";
  // echo "telefonoRepresentante ".$_POST['telefonoRepresentante']."<br>";
  // echo "sitioWeb ".$_POST['sitioWeb']."<br>";
  // echo "fechaCorteFacturacion ".$_POST['fechaCorteFacturacion']."<br>";
  // echo "emailFacturacion ".$_POST['emailFacturacion']."<br>";
  // echo "representanteSistemaGestion ".$_POST['representanteSistemaGestion']."<br>";
  // echo "cargoRepresentanteSistema ".$_POST['cargoRepresentanteSistema']."<br>";
  // echo "telefonoSistema ".$_POST['telefonoSistema']."<br>";
  // echo "emailContacto ".$_POST['emailContacto']."<br>";
  //print_r($_POST);
  //echo $_POST['car[0][certificado]'];
  // for ($i=0; $i <intval($_POST['contadorCertificados']); $i++) { 
  //   echo $_POST['certificado'.$i]." ".$_POST['entidad'.$i]." ".$_POST['codigo'.$i]." ".$_POST['date'.$i];
  // }
  // echo "<br>";
  
  $modelSede = new sede(
     null,
     $_POST['idempresa'],
     $_POST['ciudad'],
     $_POST['nempleados'],
     $_POST['direccion'],
     $_POST['procesos'],
     null,
     null,
     null,
     null
  );
  
  $arrayName = array( $_POST['ciudad'],$_POST['direccion']);
  
  if(util::validacionCampos($arrayName ) > 0){
    echo "<div class='alert round bg-danger alert-dismissible mb-2' role='alert'>
                <button   class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>×</span>
                </button>
                <strong>Oh tenemos un problema !</strong>Debe llenar todos los campos obligatorios!.
            </div>";


  }else{  
   $objEmpresa = empresaController::registrarSede($modelSede);
  // if($objEmpresa == false){
  //     echo "<div class='alert round bg-danger alert-dismissible mb-2' role='alert'>
  //               <button   class='close' data-dismiss='alert' aria-label='Close'>
  //                   <span aria-hidden='true'>×</span>
  //               </button>
  //               <strong>Oh tenemos un problema !</strong>El registro de la empresa no puedo ser realizada consulte con su administrador del sistema!.
  //           </div>";
  // }else{
  //     // echo "<div class='alert round bg-success alert-dismissible mb-2' role='alert'>
  //     //           <button   class='close' data-dismiss='alert' aria-label='Close'>
  //     //               <span aria-hidden='true'>×</span>
  //     //           </button>
  //     //           <strong>Registro de la empresa completado !</strong> <br>
  //     //       </div>";
      
  $idsede= empresaController::ultimaSedeRegistrada();
      
  //     for ($i=0; $i <intval($_POST['contadorCertificados']); $i++) { 
       
  //       $modelSede= new contacto_sede(
  //         null,
  //         $idsede,
  //         strtoupper($_POST['contacto'.$i]),
  //         strtoupper($_POST['cargo'.$i]),
  //         $_POST['telefonos'.$i]
  //       );
        
  //       empresaController::registrarContacto($modelSede);
      
  //     }
      echo "<div class='alert alert-success' role='alert'>
                <li class='fa fa-check-circle'></li> Registro de sede exitoso ! &nbsp 
            </div>
        <a class='btn btn-info round btn-min-width mr-1 mb-1 waves-effect waves-light' href='".MODULE_APP_SERVER.'empresa/verFichaSede.php?id='.$idsede."'  class='btn btn-gradient-primary text-white'><li class='fa fa-check-circle'></li>  Ficha de sede</a>";
  //   }   
  
  }
 
?>  