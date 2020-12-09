<?php session_start(); ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
    <?php
       include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
       require_once (PLATFORM_PATH."global/inc/platform/head.php");
       require_once (LIB_PATH."session.php");
       require_once (CONTROLLERS_PATH."empresaController.php");
       require_once (PROVIDERS_PATH."pdo/usuarioDao.php");
       require_once (PROVIDERS_PATH."pdo/sesionDao.php");
       require_once (CONTROLLERS_PATH."areaController.php");
       require_once (CONTROLLERS_PATH."grupoController.php");
       require_once (HELPERS_PATH."rutas.php");
       session::verificarSesion($_SESSION['idsesion']);
       date_default_timezone_set('America/Bogota');
       setlocale(LC_ALL,"es_CO");
       $idempleado = $_GET['id'];
       $objEmpleado =usuarioController::usuarioId($idempleado);
 
       //print_r($objEmpleado);
  ?>
    <style>
        .user-profile {
            background: url(https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/app-assets/images/gallery/dark-menu.jpg) center center no-repeat;
        }
        .user-profile .user-info {
            background-color: rgba(0, 0, 0, 0.35);
        }
    </style>
</head>
<!-- END: Head-->
<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern material-vertical-layout material-layout 2-columns   fixed-navbar"
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:75%;">
    <input type="hidden" name="idempleado" id="idempleado" value="<?php echo  $idempleado; ?>" />
    <input type="hidden" name="idsesion" id="idsesion" value="" />
    <input type="hidden" name="id" id="id" value="" />
    <!-- BEGIN: Header-->
    <?php require_once (PLATFORM_PATH."global/inc/component/fixed_top.php"); ?>
    <!-- END: Header-->
    <!-- BEGIN: Main Menu-->
    <?php require_once (PLATFORM_PATH."global/inc/component/main_menu.php"); ?>
    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-header row">
            <div class="content-header-dark bg-img col-12">
                <div class="row">
                    <div class="content-header-left col-md-9 col-12 mb-2">
                        <h3 class="content-header-title titulo">Módulo Empleado</h3>
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <?php if($_SESSION['rol'] == "ADMINISTRADOR" || $_SESSION['rol'] == "LIDER OEA" || $_SESSION['rol'] == "ASISTENTE"){ ?>
                                    <li class="breadcrumb-item parrafo"><a class="text-black" href="index.php">Listado </a>
                                    <?php }?>
                                    </li>
                                    <li class="breadcrumb-item active parrafo text-black">Ver Ficha Empleado
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-wrapper">
            <div class="content-body">
                <!-- contendio -->
                <div class="row">
                    <div class="col-md-12">
                        <ul class="list-inline mb-0">
                            <li>
                                <?php if($_SESSION['rol'] == "ADMINISTRADOR" || $_SESSION['rol'] == "LIDER OEA" || $_SESSION['rol'] == "ASISTENTE"){ ?>
                                <a href="<?php echo "autentificacionEmpleado.php?id=".$idempleado; ?>"
                                    class="btn capa text-white round btn-min-width mr-1 mb-1 waves-effect waves-light">
                                    <i class="fa fa-book"></i> Autenticación
                                </a>
                                <?php }?>
                            </li>
                            <li>
                                <?php 
                                if($_SESSION['rol'] == "ADMINISTRADOR" || $_SESSION['rol'] == "LIDER OEA" || $_SESSION['rol'] == "ASISTENTE"){
                                        if($objEmpleado->getEstado() == 'ACTIVO'){
                                            echo "<button id='inhabilitarUsuario' class='btn btn-warning round btn-min-width mr-1 mb-1 waves-effect waves-light'>
                                            <i class='fa fa-ban'></i> Desactivar Usuario</button>";
                                        
                                        }else{
                                            echo "<button id='habilitarUsuario' class='btn text-white capa round btn-min-width mr-1 mb-1 waves-effect waves-light'>
                                            <i class='fa fa-check'></i> Activar Usuario</button>";
                                        } 


                                }
                                    ?>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="card" >
                            
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="card-text">
                                        <div id="smg"></div>
                                    </div>
                                    <div class="form">
                                        <div class="form-body">
                                            <h2 class="form-section"><i class="fa fa-id-card-alt"></i>
                                            Información General
                                            </h2>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="">
                                                            <h5 class="card-title"><span class="text-danger">*</span>
                                                                Nombre del Empleado
                                                            </h5>
                                                        </label>
                                                        <input readonly type="text" class="form-control"
                                                            placeholder=". . ." name="nombre" id="nombre"
                                                            value="<?php echo $objEmpleado->getNombre_usuario();  ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">
                                                            <h5 class="card-title"><span class="text-danger">*</span>
                                                                Rol: </h5>
                                                        </label>
                                                        <select id='rol' name='rol' class='form-control'>
                                                            <?php echo "<option value='".$objEmpleado->getRol_usuario()."'>(".$objEmpleado->getRol_usuario().")</option>";  ?>
                                                            <option value="LIDER OEA">LIDER OEA</option>
                                                            <option value="ESPECIALISTA">ESPECIALISTA</option>
                                                            <option value="ASISTENTE">ASISTENTE</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">
                                                            <h5 class="card-title"><span class="text-danger">*</span>
                                                            Documento de Identidad</h5>
                                                        </label>
                                                        <input readonly type="text" class="form-control"
                                                            placeholder=". . ." name="documento" id="documento"
                                                            value="<?php echo $objEmpleado->getDocumento_identificacion_usuario();  ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            Correo Electrónico </h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control"
                                                        placeholder=". . . " name="correo" id="correo"
                                                        value="<?php echo $objEmpleado->getCorreo_usuario();  ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            Teléfono</h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control"
                                                        placeholder=". . . " name="telefono" id="telefono"
                                                        value="<?php echo $objEmpleado->getTelefono_usuario();  ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                        Dirección</h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control"
                                                        placeholder=". . . " name="direccion" id="direccion"
                                                        value="<?php echo $objEmpleado->getDireccion_usuario();  ?>">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            Ciudad  </h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control"
                                                        placeholder=". . . " name="ciudad" id="ciudad"
                                                        value="<?php echo $objEmpleado->getCiudad_usuario();  ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                        País </h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control"
                                                        placeholder=". . . " name="pais" id="pais"
                                                        value="<?php echo $objEmpleado->getId_pais_usuario();  ?>">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-actions">
                                        <?php if($_SESSION['rol'] == "ADMINISTRADOR" || $_SESSION['rol'] == "LIDER OEA" || $_SESSION['rol'] == "ASISTENTE"){ ?>
                                            <button type="button" id="editarEmpresa"
                                                class="btn capa round  text-white waves-effect waves-light">
                                                <i class="fa fa-pen-square fa-2x"></i>&nbsp; Actualizar Formulario
                                            </button>
                                            <button type="button" id="actualizarCambio"
                                                class="btn capa round text-white waves-effect waves-light">
                                                <i class="fa fa-save fa-2x"></i>&nbsp; Modificar
                                            </button>
                                            <div id="smgEmpleado"></div>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ contendio -->
        </div>
    </div>
    
    <!-- END: Content-->
    <!-- BEGIN: Customizer-->
    <!-- End: Customizer-->
    <!-- Buynow Button-->
    <?php
    //require_once (PLATFORM_PATH."global/inc/component/customizer.php");
    //require_once (PLATFORM_PATH."global/inc/component/buy.php");
    require_once (PLATFORM_PATH."global/inc/component/footer.php");
    require_once (PLATFORM_PATH."global/inc/platform/lib.php");
    
  ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="<?php echo CORE_JS_SERVER."directory.js"; ?>"></script>
    <script src="<?php echo CORE_JS_SERVER."app.js"; ?>"></script>
    <script src="<?php echo PLATFORM_SERVER."modules/usuarios/triggers/module.js"; ?>"></script>
    <script src="<?php echo PLATFORM_SERVER."modules/usuarios/triggers/ui.js"; ?>"></script>
    <script>
        $('#actualizarCambio').hide();
        
        
        
    </script>
</body>
<!-- END: Body-->
</html>
