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
       require_once (CONTROLLERS_PATH."auditoriasController.php");
       require_once (CONTROLLERS_PATH."plantillaController.php");
       require_once (CONTROLLERS_PATH."usuarioController.php");
       require_once (CONTROLLERS_PATH."sedeController.php");
       require_once (HELPERS_PATH."rutas.php");
       session::verificarSesion($_SESSION['idsesion']);
       date_default_timezone_set('America/Bogota');
       setlocale(LC_ALL,"es_CO");
       $idauditoria= $_GET['id'];
       $objAuditoria =auditoriasController::auditoriaID($idauditoria);
       $objplantilla = plantillaController::plantillaId($objAuditoria->getIdplantilla_madre_aditoria());
       //print_r($objplantilla);
       $objEmpresaAncla =empresaController::objEmpresa( $objAuditoria->getIdempresa_ancla());
       $objEmpresaAsociada=empresaController::objEmpresa( $objAuditoria->getIdempresa_asociada());
       $objSede = sedeController::objSede($objAuditoria->getIdsede_auditoria());
       $objUsuario = usuarioController::usuarioId($objAuditoria->getIdusuario_auditor());
       $idempresaA = $objEmpresaAncla->getIdempresarial();
       $idempresaB = $objEmpresaAsociada->getIdempresarial();
       
      
       
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
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:75%">
    <input type="hidden" name="idempresa" id="idempresa" value="<?php echo $idauditoria; ?>" />
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
                        <h3 class="content-header-title">Modulo Auditoria</h3>
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Auditorias</a>
                                    </li>
                                    <li class="breadcrumb-item active">Ver Ficha de auditoria
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
                            <?php if($objAuditoria->getEstado_auditoria() == "PRO01") { ?>
                            <li><a href="<?php echo "core/ejecutarAuditoria.php?id=".$idauditoria; ?>"
                                    class="btn capa text-white round btn-min-width mr-1 mb-1 waves-effect waves-light" >
                                    <i class="fa fa-store-alt"></i> Ejecutar auditoria </a>
                            </li>
                            <?php }elseif($objAuditoria->getEstado_auditoria() == "PRO13" ){ ?>
                            <li><a href="<?php echo "asociarSedes.php?id=".$idauditoria; ?>"
                                    class="btn capa text-white round btn-min-width mr-1 mb-1 waves-effect waves-light" >
                                    <i class="fa fa-store-alt"></i> Certificar auditoria </a>
                            </li>
                            <?php } ?>


                            <li><a href="<?php echo "plantillaSeleccionada.php?id=".$idauditoria; ?>"
                                    class="btn capa text-white round btn-min-width mr-1 mb-1 waves-effect waves-light" target="_blank">
                                    <i class="fa fa-shield-alt"></i> Plantilla seleccionada</a>
                            </li>
                            <?php if($objAuditoria->getEstado_auditoria() == "PRO02") { ?>
                            <li><a href="<?php echo "autoDiagnostico.php?id=".$idauditoria; ?>"
                                    class="btn capa text-white round btn-min-width mr-1 mb-1 waves-effect waves-light">
                                    <i class="fa fa-city"></i> Autodiagnostico de la empresa </a>
                            </li>
                            <li><a href="<?php echo "auditoriaProceso.php?id=".$idauditoria; ?>"
                                    class="btn capa text-white round btn-min-width mr-1 mb-1 waves-effect waves-light">
                                    <i class="fa fa-city"></i> Auditoria </a>
                            </li>
                            <?php } ?>
                            <?php if($objAuditoria->getEstado_auditoria() == "PRO12") { ?>
                            <li><a href="<?php echo "planAccionAuditoria.php?id=".$idauditoria; ?>"
                                    class="btn capa text-white round btn-min-width mr-1 mb-1 waves-effect waves-light">
                                    <i class="fa fa-book"></i> Plan de accion </a>
                            </li>
                            <?php } ?>
                            <?php if($objAuditoria->getEstado_auditoria() == "PRO12" || $objAuditoria->getEstado_auditoria() == "PRO13" | $objAuditoria->getEstado_auditoria() == "PRO14" ) { ?>
                            <li><a href="<?php echo "resumenAuditoria.php?id=".$idauditoria; ?>"
                                    class="btn capa text-white round btn-min-width mr-1 mb-1 waves-effect waves-light">
                                    <i class="fa fa-book"></i> Reporte resumen de auditoria </a>
                            </li>
                            <?php } ?>
                            <?php if($objAuditoria->getEstado_auditoria() == "PRO12" || $objAuditoria->getEstado_auditoria() == "PRO13" | $objAuditoria->getEstado_auditoria() == "PRO14" ) { ?>
                            <!-- <li><a href="<?php //echo "reporteAuditoria.php?id=".$idauditoria; ?>"
                                    class="btn capa text-white round btn-min-width mr-1 mb-1 waves-effect waves-light">
                                    <i class="fa fa-book"></i> Informe auditoria </a>
                            </li> -->
                            <?php } ?>
                            <?php if($objAuditoria->getEstado_auditoria() == "PRO12" || $objAuditoria->getEstado_auditoria() == "PRO13" | $objAuditoria->getEstado_auditoria() == "PRO14" ) { ?>
                            <li><a href="<?php echo "oea.php?id=".$idauditoria; ?>"
                                    class="btn capa text-white round btn-min-width mr-1 mb-1 waves-effect waves-light">
                                    <i class="fa fa-book"></i> Lista de chequeo </a>
                            </li>
                            <?php } ?>
                            <?php if($objAuditoria->getEstado_auditoria() == "PRO12" || $objAuditoria->getEstado_auditoria() == "PRO13" | $objAuditoria->getEstado_auditoria() == "PRO14" ) { ?>
                            <!-- <li><a href="<?php //echo "reporteAuditoria.php?id=".$idauditoria; ?>"
                                    class="btn capa text-white round btn-min-width mr-1 mb-1 waves-effect waves-light">
                                    <i class="fa fa-book"></i> Resumen </a>
                            </li> -->
                            <?php } ?>
                            <?php if($objAuditoria->getEstado_auditoria() == "PRO12" || $objAuditoria->getEstado_auditoria() == "PRO13" | $objAuditoria->getEstado_auditoria() == "PRO14" ) { ?>
                            <!-- <li><a href="<?php //echo "resumenEjecutivo.php?id=".$idauditoria; ?>"
                                    class="btn capa text-white round btn-min-width mr-1 mb-1 waves-effect waves-light">
                                    <i class="fa fa-book"></i> Resumen ejecutivo </a>
                            </li> -->
                            <?php } ?>
                            <?php if($objAuditoria->getEstado_auditoria() == "PRO12" || $objAuditoria->getEstado_auditoria() == "PRO13" | $objAuditoria->getEstado_auditoria() == "PRO14" ) { ?>
                            <li><a href="<?php echo "verificacionProveedores.php?id=".$idauditoria; ?>"
                                    class="btn capa text-white round btn-min-width mr-1 mb-1 waves-effect waves-light">
                                    <i class="fa fa-book"></i> Informe Verificacion de proveedores </a>
                            </li>
                            <?php } ?>
                            <?php if($objAuditoria->getEstado_auditoria() == "PRO12" || $objAuditoria->getEstado_auditoria() == "PRO13" | $objAuditoria->getEstado_auditoria() == "PRO14" ) { ?>
                            <li><a href="<?php echo "modeloEstatus.php?id=".$idauditoria; ?>"
                                    class="btn capa text-white round btn-min-width mr-1 mb-1 waves-effect waves-light">
                                    <i class="fa fa-book"></i> Modelo estatus</a>
                            </li>
                            <?php } ?>
                            <li>
                                <?php 
                                        // if(intval($idauditoria->getEstado_auditoria()) == 1){
                                        //     echo "<button id='inhabilitarEmpresa' class='btn btn-warning round btn-min-width mr-1 mb-1 waves-effect waves-light'>
                                        //     <i class='fa fa-ban'></i> Inhabilitar empresa</button>";
                                        
                                        // }else{
                                        //     echo "<button id='habilitarEmpresa' class='btn btn-success round btn-min-width mr-1 mb-1 waves-effect waves-light'>
                                        //     <i class='fa fa-ban'></i> habilitar empresa</button>";
                                        
                                        // } 
                                    
                                    ?>
                            </li>
                        </ul>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                    </div>



                    <div class="col-md-12">
                        <div class="card" >
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form">
                                    <li class="fa fa-exclamation"></li> Estado de la auditoria
                                    <?php  auditoriasController::badgeComponentAuditoria( $objAuditoria->getEstado_auditoria()) ?>
                                </h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="card-text">
                                        <div id="smg"></div>
                                    </div>
                                    <div class="form">
                                        <div class="form-body">
                                            
                                            <br>
                                            

                                            <h2 class="form-section"><i class="fa fa-id-card-alt"></i>
                                                Ficha general empresa ancla
                                            </h2>
                                            <br>

                                           

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">
                                                            <h5 class="card-title"><span class="text-danger">*</span>
                                                                Empresa Ancla
                                                            </h5>
                                                        </label>
                                                        <input readonly type="text" class="form-control"
                                                            placeholder=". . ." name="razonSocial" id="razonSocial"
                                                            value="<?php echo $objEmpresaAncla->getNombre_empresa();  ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">
                                                            <h5 class="card-title"><span class="text-danger">*</span>
                                                                Pais - Departamento ciudad
                                                            </h5>
                                                        </label>
                                                        <input readonly type="text" class="form-control"
                                                            placeholder=". . ." name="razonSocial" id="razonSocial"
                                                            value="<?php echo $objEmpresaAncla->getPais_empresa()." - ".$objEmpresaAncla->getDepartamento()." - ".$objEmpresaAncla->getCiudad_principal_empresa();  ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">
                                                            <h5 class="card-title"><span class="text-danger">*</span>
                                                                Direccion
                                                            </h5>
                                                        </label>
                                                        <input readonly type="text" class="form-control"
                                                            placeholder=". . ." name="razonSocial" id="razonSocial"
                                                            value="<?php echo $objEmpresaAncla->getDireccion_empresa();  ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">
                                                            <h5 class="card-title"><span class="text-danger">*</span>
                                                                Area tecnica
                                                            </h5>
                                                        </label>
                                                        <input readonly type="text" class="form-control"
                                                            placeholder=". . ." name="razonSocial" id="razonSocial"
                                                            value="<?php echo $objEmpresaAncla->getIdarea_tecnica_empresa();  ?>">
                                                    </div>
                                                </div>
                                                <div class=" col-md-2">
                                                    <div class="form-group"><br>
                                                        <a href="<?php echo "../empresa/verFicha.php?id=".$objEmpresaAncla->getIdempresarial();  ?>" class="btn capa text-white">
                                                            <li class="fa fa-calendar-check fa-2x"></li>&nbsp; Ver ficha
                                                            empresa
                                                        </a>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                            <br>                                          
                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                            <br>
                                            <h2 class="form-section"><i class="fa fa-id-card-alt"></i>
                                               Ficha general empresa asociada de negocio 
                                            </h2>
                                            <br>




                                            

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">
                                                            <h5 class="card-title"><span class="text-danger">*</span>
                                                                Empresa Ancla
                                                            </h5>
                                                        </label>
                                                        <input readonly type="text" class="form-control"
                                                            placeholder=". . ." name="razonSocial" id="razonSocial"
                                                            value="<?php echo $objEmpresaAsociada->getNombre_empresa();  ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">
                                                            <h5 class="card-title"><span class="text-danger">*</span>
                                                                Pais - Departamento Ciudad
                                                            </h5>
                                                        </label>
                                                        <input readonly type="text" class="form-control"
                                                            placeholder=". . ." name="razonSocial" id="razonSocial"
                                                            value="<?php echo $objEmpresaAsociada->getPais_empresa()." - ".$objEmpresaAsociada->getDepartamento()." - ".$objEmpresaAsociada->getCiudad_principal_empresa();  ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">
                                                            <h5 class="card-title"><span class="text-danger">*</span>
                                                                Direccion
                                                            </h5>
                                                        </label>
                                                        <input readonly type="text" class="form-control"
                                                            placeholder=". . ." name="razonSocial" id="razonSocial"
                                                            value="<?php echo $objEmpresaAsociada->getDireccion_empresa();  ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">
                                                            <h5 class="card-title"><span class="text-danger">*</span>
                                                                Area tecnica
                                                            </h5>
                                                        </label>
                                                        <input readonly type="text" class="form-control"
                                                            placeholder=". . ." name="razonSocial" id="razonSocial"
                                                            value="<?php echo $objEmpresaAsociada->getIdarea_tecnica_empresa();  ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">
                                                            <h5 class="card-title"><span class="text-danger">*</span>
                                                                Sede Seleccionada</h5>
                                                        </label>
                                                        <input readonly type="text" class="form-control"
                                                            placeholder=". . ." name="nit" id="nit"
                                                            value="<?php echo $objSede->getCiudad_sede();  ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="">
                                                            <h5 class="card-title"><span class="text-danger">*</span>
                                                                Direccion Sede</h5>
                                                        </label>
                                                        <input readonly type="text" class="form-control"
                                                            placeholder=". . ." name="area" id="area"
                                                            value="<?php echo $objSede->getDireccion_sede();  ?>">
                                                    </div>
                                                </div>
                                                <div class=" col-md-4">
                                                    <div class="form-group"><br>
                                                        <a href="<?php echo "../empresa/verFicha.php?id=".$objEmpresaAsociada->getIdempresarial();  ?>" class="btn capa text-white">
                                                            <li class="fa fa-calendar-check fa-2x"></li>&nbsp; Ver ficha  empresa asociada
                                                            
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class=" col-md-4">
                                                    <div class="form-group"><br>
                                                        <a href="<?php echo "../empresa/verFichaSede.php.php?id=".$objSede->getIdsede();  ?>" class="btn capa text-white">
                                                            <li class="fa fa-calendar-check fa-2x"></li>&nbsp; Ver ficha  sede de empresa asociada
                                                            
                                                        </a>
                                                    </div>
                                                </div>
                                                <hr>


                                                
                                                
                                            </div>
                                            <br>
                                            <h2 class="form-section"><i class="fa fa-id-card-alt"></i>
                                                Informacion de la auditoria
                                            </h2>
                                            <br>

                                            <div class="row">
                                                
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">
                                                            <h5 class="card-title"><span class="text-danger">*</span>
                                                                Fecha de programacion 
                                                            </h5>
                                                        </label>
                                                        <input readonly type="text" class="form-control"
                                                            placeholder=". . ." name="razonSocial" id="razonSocial"
                                                            value="<?php echo $objAuditoria->getFecha_programada_auditoria();  ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">
                                                            <h5 class="card-title"><span class="text-danger">*</span>
                                                               Plantilla PVP UTILIZADA
                                                            </h5>
                                                        </label>
                                                        <input readonly type="text" class="form-control"
                                                            placeholder=". . ." name="razonSocial" id="razonSocial"
                                                            value="<?php echo $objplantilla->getEtiqueta_plantilla();  ?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">
                                                            <h5 class="card-title"><span class="text-danger">*</span>
                                                               Nombre auditor
                                                            </h5>
                                                        </label>
                                                        <input readonly type="text" class="form-control"
                                                            placeholder=". . ." name="razonSocial" id="razonSocial"
                                                            value="<?php echo $objUsuario->getNombre_usuario();  ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">
                                                            <h5 class="card-title"><span class="text-danger">*</span>
                                                               Pais 
                                                            </h5>
                                                        </label>
                                                        <input readonly type="text" class="form-control"
                                                            placeholder=". . ." name="razonSocial" id="razonSocial"
                                                            value="<?php echo $objUsuario->getPais_usuario();  ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">
                                                            <h5 class="card-title"><span class="text-danger">*</span>
                                                               Departamento/estado - Ciudad
                                                            </h5>
                                                        </label>
                                                        <input readonly type="text" class="form-control"
                                                            placeholder=". . ." name="razonSocial" id="razonSocial"
                                                            value="<?php echo $objUsuario->getCiudad_usuario();  ?>">
                                                    </div>
                                                </div>
                                                
                                              


                                                
                                               
                                            </div>
                                        </div>


                                        <br>

                                    </div>
                                    <!-- <div class="form-actions">
                                                    <button type="button" class="btn btn-warning mr-1">
                                                        <i class="ft-x"></i> Limpiar
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="la la-check-square-o"></i> Guardar
                                                    </button>
                                                </div> -->
                                </div>
                            </div>
                        </div>
                    </div>              


                </div>

            </div>
            <!--/ contendio -->
        </div>

        
    </div>
    </div>
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
    <script src="<?php echo PLATFORM_SERVER."modules/auditoria/triggers/module.js"; ?>"></script>

</body>
<!-- END: Body-->

</html>
