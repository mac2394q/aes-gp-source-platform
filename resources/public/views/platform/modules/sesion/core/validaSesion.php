<?php session_start();
  header("Access-Control-Allow-Origin: *");
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."sesionController.php");
  require_once(CONTROLLERS_PATH."empresaController.php");
  require_once(PDO_PATH."sesionDao.php");
  require_once(PDO_PATH."usuarioDao.php");
  $objUsuario = sesionController::validarSesion($_POST['usuario'],$_POST['clave']);

  if($objUsuario  == false){
      echo "<div class='alert round bg-danger alert-dismissible mb-2' role='alert'>
                <button   class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>×</span>
                </button>
               Los datos  de autentificación estan erroneos.
            </div>";
      session_destroy();      
      echo  "<script> errorSesion(); </script>" ;  
  }else{
    echo  "<script> iniciarSesion(); </script>" ;

    if($objUsuario->getRol_usuario() == "ESPECIALISTA"){
      $obj=empresaController::objEmpresaIdUsuario($objUsuario->getId_usuario());
      //print_r($obj);
      $_SESSION['idsesion'] = $objUsuario->getId_usuario();
      $_SESSION['rol'] = $objUsuario->getRol_usuario();
      $_SESSION['idioma'] = $_POST['idioma'];
      $_SESSION['nombre'] = $objUsuario->getNombre_usuario();
      $_SESSION['idempresa'] = $obj->getId_entidad();

    }if($objUsuario->getRol_usuario() == "EMPRESA"){
      $obj=empresaController::objEmpresaIdUsuario($objUsuario->getId_usuario());
      //print_r($obj);
      $_SESSION['idsesion'] = $objUsuario->getId_usuario();
      $_SESSION['rol'] = $objUsuario->getRol_usuario();
      $_SESSION['idioma'] = $_POST['idioma'];
      $_SESSION['nombre'] = $objUsuario->getNombre_usuario();
      $_SESSION['idempresa'] = $obj->getId_entidad();
      $_SESSION['id'] = $obj->getId_entidad();

    }elseif($objUsuario->getRol_usuario() == "GRUPO"){
      $obj=empresaController::grupoEmpresarialIdUsuario($objUsuario->getId_usuario());
      $_SESSION['idsesion'] = $objUsuario->getId_usuario();
      $_SESSION['rol'] = $objUsuario->getRol_usuario();
      $_SESSION['idioma'] = $_POST['idioma'];
      $_SESSION['nombre'] = $objUsuario->getNombre_usuario();
      $_SESSION['idgrupo'] = $obj->getId_entidad();
      $_SESSION['id'] = $obj->getId_entidad();

    }elseif($objUsuario->getRol_usuario() == "LIDER OEA" || $objUsuario->getRol_usuario() == "ASISTENTE"){
      $_SESSION['idsesion'] = $objUsuario->getId_usuario();
      $_SESSION['rol'] = $objUsuario->getRol_usuario();
      $_SESSION['idioma'] = $_POST['idioma'];
      $_SESSION['nombre'] = $objUsuario->getNombre_usuario();

      
    }elseif($objUsuario->getRol_usuario() == "ADMINISTRADOR"){
      $_SESSION['idsesion'] = $objUsuario->getId_usuario();
      $_SESSION['rol'] = $objUsuario->getRol_usuario();
      $_SESSION['idioma'] = $_POST['idioma'];
      $_SESSION['nombre'] = $objUsuario->getNombre_usuario();

    }

    
    sesionController::index();
  } 

?>  