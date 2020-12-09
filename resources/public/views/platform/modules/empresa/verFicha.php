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
       require_once (CONTROLLERS_PATH."areaController.php");
       require_once (CONTROLLERS_PATH."grupoController.php");
       require_once (CONTROLLERS_PATH."paisController.php");
       require_once (HELPERS_PATH."rutas.php");
       session::verificarSesion($_SESSION['idsesion']);
       date_default_timezone_set('America/Bogota');
       setlocale(LC_ALL,"es_CO");
       $idempresa = $_GET['id'];
       $objEmpresa =empresaController::objEmpresa($idempresa);
       //print_r($objEmpresa);
     
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
    <input type="hidden" name="idempresa" id="idempresa" value="<?php echo  $idempresa; ?>" />
    <input type="hidden" name="idsesion" id="idsesion" value="" />
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
                        <h3 class="content-header-title titulo">Módulo Empresa</h3>
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                   <?php if($_SESSION['rol'] == "LIDER OEA" ||
                                            $_SESSION['rol'] == "ASISTENTE" ||
                                            $_SESSION['rol'] == "ADMINISTRADOR"
                                            ){ ?>
                                    <li class="breadcrumb-item parrafo"><a class="text-black"
                                            href="index.php">Listado</a>
                                    </li>
                                    <?php }?>
                                    <li class="breadcrumb-item active parrafo text-black">Ver Ficha Empresa
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
                             <?php  if($_SESSION['rol'] == "LIDER OEA" ||
                                            $_SESSION['rol'] == "ASISTENTE" ||
                                            $_SESSION['rol'] == "ADMINISTRADOR"
                                            ){ ?>
                            <li><a href="<?php echo "autentificacionEmpresa.php?id=".$idempresa; ?>"
                                    class="btn text-white capa round btn-min-width mr-1 mb-1 waves-effect waves-light">
                                    <i class="fa fa-shield-alt fa-2x"></i> Autenticación Empresa</a>
                            </li> 
                             <?php }else{ ?> 
                            <li><a href="<?php echo "historialTrabajoGrupo.php?id=".$idempresa; ?>"
                                    class="btn text-white capa round btn-min-width mr-1 mb-1 waves-effect waves-light">
                                    <i class="fa fa-book fa-2x"></i> Historial de trabajos </a>
                            </li>
                             <?php }?> 
                             <?php if($_SESSION['rol'] != "GRUPO") { ?>
                            <li><a href="<?php echo "documentosEmpresa.php?id=".$idempresa; ?>"
                                    class="btn text-white capa round btn-min-width mr-1 mb-1 waves-effect waves-light">
                                    <i class="fa fa-folder-open fa-2x"></i> Documentos de la Empresa </a>
                            </li>
                            <?php }?> 
                            &nbsp;&nbsp;&nbsp;
                            <?php if($_SESSION['rol'] == "LIDER OEA" ||
                                            $_SESSION['rol'] == "ASISTENTE" ||
                                            $_SESSION['rol'] == "ADMINISTRADOR"
                                            ){ ?>
                            <li><a href="#" id="eliminarEmpresa"
                                    class="btn btn-danger round btn-min-width mr-1 mb-1 waves-effect waves-light">
                                    <i class="fa fa-ban fa-2x"></i> Eliminar Empresa </a>
                            </li>
                            <?php }?>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="card-text">
                                        <div id="smg"></div>
                                    </div>
                                    <div class="form">
                                        <div class="form-body">
                                            <h2 class="form-section"><i class="fa fa-id-card-alt"></i>
                                                Información general
                                            </h2>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="">
                                                            <h5 class="card-title"><span class="text-danger">*</span>
                                                                Compañía
                                                            </h5>
                                                        </label>
                                                        <input readonly type="text" class="form-control"
                                                            placeholder=". . ." name="razonSocial" id="razonSocial"
                                                            value="<?php echo $objEmpresa->getNombre_empresa();  ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">
                                                            <h5 class="card-title"><span class="text-danger">*</span>
                                                                No Identificación </h5>
                                                        </label>
                                                        <input readonly type="text" class="form-control"
                                                            placeholder=". . ." name="nit" id="nit"
                                                            value="<?php echo $objEmpresa->getIdentificacion_empresa();  ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <?php echo paisController::listadoPaisSelectId("pais",$objEmpresa->getId_pais_empresa());?>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            Ciudad/Provincia/Municipio</h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control"
                                                        placeholder=". . . " name="ciudad" id="ciudad"
                                                        value="<?php echo $objEmpresa->getCiudad_empresa();  ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            Departamento/Estado</h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control"
                                                        placeholder=". . . " name="departamento" id="departamento"
                                                        value="<?php echo $objEmpresa->getDepartamento_empresa();  ?>">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                        Dirección </h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control"
                                                        placeholder=". . . " name="direccion" id="direccion"
                                                        value="<?php echo $objEmpresa->getDireccion_empresa();  ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            Teléfono </h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control"
                                                        placeholder=". . . " name="telefono" id="telefono"
                                                        value="<?php echo $objEmpresa->getTelefono_empresa();  ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            E-mail
                                                            Empresarial</h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control" placeholder="@"
                                                        name="emailEmpresarial" id="emailEmpresarial"
                                                        value="<?php echo $objEmpresa->getEmail_empresa();  ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span
                                                                class="text-danger">*</span>Naturaleza:</h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control"
                                                        placeholder="http://www. " name="naturaleza" id="naturaleza"
                                                        value="<?php echo $objEmpresa->getNaturaleza_empresa();  ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title">Link Plataforma  Facturación
                                                            </h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control" placeholder="@"
                                                        name="link" id="link"
                                                        value="<?php echo $objEmpresa->getLink_plataforma_factura_empresa();  ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title">Usuario y Clave</h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control" placeholder="@"
                                                        name="usuario" id="usuario"
                                                        value="<?php echo $objEmpresa->getUsuario_plataforma_facturacion_empresa();  ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <h2 class="form-section"><i class="fa fa-business-time"></i>
                                            Comercial</h2>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            Representante
                                                            legal Compañia</h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control" placeholder=". . ."
                                                        name="representanteLegal" id="representanteLegal"
                                                        value="<?php echo $objEmpresa->getNombre_representate_empresa();  ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>Identificación</h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control" placeholder=". . ."
                                                        name="cargoRepresentante" id="cargoRepresentante"
                                                        value="<?php echo $objEmpresa->getIdentificacion_representante_empresa();  ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            Teléfono (Movil
                                                            - Fijo )</h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control"
                                                        placeholder="# ext #" name="telefonoRepresentante"
                                                        id="telefonoRepresentante"
                                                        value="<?php echo $objEmpresa->getTelefono_representante_empresa();  ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            Email Representante</h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control"
                                                        placeholder="# ext #" name="emailContacto"
                                                        id="emailContacto"
                                                        value="<?php echo $objEmpresa->getEmail_representante_empresa();  ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            Representante del Sistema de Gestión</h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control"
                                                        placeholder=". . . " name="representanteLegal2"
                                                        id="representanteLegal2"
                                                        value="<?php echo $objEmpresa->getNombre_contacto_empresa2();  ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>Cargo</h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control"
                                                        placeholder=". . . " name="cargoRepresentante2"
                                                        id="cargoRepresentante2"
                                                        value="<?php echo $objEmpresa->getCargo_contacto_empresa2();  ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            Teléfono (Movil
                                                            - Fijo)</h5>
                                                    </label>
                                                    <input readonly type="text"  class="form-control"
                                                        placeholder="# ext #" name="telefonoRepresentante2"
                                                        id="telefonoRepresentante2"
                                                        value="<?php echo $objEmpresa->getTelefono_contato_empresa2();  ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            Email de Contacto</h5>
                                                    </label>
                                                    <input readonly type="text" class="form-control"
                                                        placeholder="# ext #" name="emailContacto2"
                                                        id="emailContacto2"
                                                        value="<?php echo $objEmpresa->getEmail_contacto_empresa2();  ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <h2 class="form-section"><i class="fa fa-business-time"></i>
                                            Otros Aspectos</h2>
                                        <div class="row">
                                            <div class="card-body">
                                                <form class="form ">
                                                    <div class="form-body">
                                                        <div class="form-group col-md-5">
                                                            <?php grupoController::select_grupEmpresa($objEmpresa->getGru_id_entidad()); ?>
                                                        </div>
                                                        <?php if($_SESSION['rol'] == "LIDER OEA" ||
                                                                 $_SESSION['rol'] == "ASISTENTE" ||
                                                                 $_SESSION['rol'] == "ADMINISTRADOR"
                                                                ){ ?>
                                                        <section id="image-gallery" class="card">
                                                            <div class="form-actions">
                                                                <button type="button" id="editarEmpresa"
                                                                    class="btn text-white round  capa waves-effect waves-light">
                                                                    <i class="fa fa-pen-square fa-2x"></i>&nbsp;
                                                                    Actualizar Información 
                                                                </button>
                                                                <button type="button" id="actualizarCambiosUi"
                                                                    class="btn text-white round capa waves-effect waves-light">
                                                                    <i class="fa fa-save fa-2x"></i>&nbsp; Modificar Formulario
                                                                </button>
                                                                <div id="smgEmpresa"></div>
                                                            </div>
                                                        </section>
                                                        <?php }?>
                                                </form>
                                            </div>
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
    <script src="<?php echo PLATFORM_SERVER."modules/empresa/triggers/module.js"; ?>"></script>
    <script src="<?php echo PLATFORM_SERVER."modules/empresa/triggers/ui.js"; ?>"></script>
    <script>
        $('#actualizarCambiosUi').hide();
    </script>
</body>
<!-- END: Body-->
</html>
