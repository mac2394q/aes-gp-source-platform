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

       require_once (CONTROLLERS_PATH."usuarioController.php");

       require_once (CONTROLLERS_PATH."paisController.php");

       session::verificarSesion($_SESSION['idsesion']);

       date_default_timezone_set('America/Bogota');

       setlocale(LC_ALL,"es_CO");

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

    <input type="hidden" value="0" name="certificadosDinamicos" />

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

                                    <li class="breadcrumb-item parrafo"><a class="text-black"

                                            href="index.php">Empresas</a>

                                    </li>

                                    <li class="breadcrumb-item active parrafo text-black">Registrar Empresa

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

                <div class="text-black">

                    <section id="basic-form-layouts">

                        <div class="row match-height">

                            <div class="col-md-12">

                                <div class="card">

                                    <div class="card-content collapse show">

                                        <div class="card-body">

                                            <div class="card-text">

                                                <p class="parrafo">Rellene el formulario teniendo en cuenta que los

                                                    campos con * son de

                                                    caracter obligatorios , los campos que no lo posean son opcionales

                                                </p>

                                            </div>

                                            <div class="form">

                                                <div class="form-body">

                                                    <h2 class="form-section"><i class="fa fa-id-card-alt"></i>

                                                        Información General

                                                    </h2>

                                                    <div class="row">

                                                        <div class="col-md-4">

                                                            <div class="form-group">

                                                                <?php echo grupoController::select_grupo();?>

                                                            </div>

                                                        </div>

                                                        <div class="col-md-5">

                                                            <div class="form-group">

                                                                <label for="">

                                                                    <h5 class="card-title"><span

                                                                            class="text-danger">*</span>Compañía

                                                                    </h5>

                                                                </label>

                                                                <input type="text" class="form-control"

                                                                    placeholder=". . ." name="razonSocial">

                                                            </div>

                                                        </div>

                                                        <div class="col-md-3">

                                                            <div class="form-group">

                                                                <label for="">

                                                                    <h5 class="card-title"><span

                                                                            class="text-danger">*</span> No.

                                                                        Identificación</h5>

                                                                </label>

                                                                <input type="text" class="form-control"

                                                                    placeholder=". . ." name="nit">

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-3">

                                                            <div class="form-group">

                                                                <?php echo paisController::listadoPaisSelect("pais");?>

                                                            </div>

                                                        </div>

                                                        <div class="col-md-3">

                                                            <div class="form-group">

                                                                <label for="">

                                                                    <h5 class="card-title"><span

                                                                            class="text-danger">*</span>

                                                                        Departamento/Estado</h5>

                                                                </label>

                                                                <input type="text" class="form-control"

                                                                    placeholder=". . . " name="departamento">

                                                            </div>

                                                        </div>

                                                        <div class="col-md-3">

                                                            <div class="form-group">

                                                                <label for="">

                                                                    <h5 class="card-title"><span

                                                                            class="text-danger">*</span>

                                                                        Ciudad/Provincia/Municipio</h5>

                                                                </label>

                                                                <input type="text" class="form-control"

                                                                    placeholder=". . . " name="ciudad">

                                                            </div>

                                                        </div>

                                                        <div class="col-md-3">

                                                            <div class="form-group">

                                                                <label for="">

                                                                    <h5 class="card-title"><span

                                                                            class="text-danger">*</span>

                                                                            Dirección</h5>

                                                                </label>

                                                                <input type="text" class="form-control"

                                                                    placeholder=". . . " name="direccion">

                                                            </div>

                                                        </div>

                                                        <div class="col-md-3">

                                                            <div class="form-group">

                                                                <label for=''>

                                                                    <h5 class='card-title'>

                                                                        <li class='fa fa-clipboard-list'></li> <span

                                                                            class='text-danger'>*</span> Naturaleza

                                                                        Empresa:

                                                                    </h5>

                                                                </label>

                                                                <select id='naturaleza' name='naturaleza' class='form-control'>

                                                                    <option value='PRIVADA'>PRIVADA</option>

                                                                    <option value='PUBLICA'>PUBLICA</option>

                                                                    <option value='MIXTA'>MIXTA</option>

                                                                </select>

                                                            </div>

                                                        </div>

                                                        <div class="col-md-3">

                                                            <div class="form-group">

                                                                <label for="">

                                                                    <h5 class="card-title"><span

                                                                            class="text-danger">*</span> Teléfono </h5>

                                                                </label>

                                                                <input type="text" class="form-control"

                                                                    placeholder=". . . " name="telefono">

                                                            </div>

                                                        </div>

                                                        <div class="col-md-5">

                                                            <div class="form-group">

                                                                <label for="">

                                                                    <h5 class="card-title"><span

                                                                            class="text-danger">*</span> Correo Empresarial </h5>

                                                                </label>

                                                                <input type="text" class="form-control"

                                                                    placeholder=". . . " name="emailEmpresarial">

                                                            </div>

                                                        </div>

                                                        

                                                    </div>

                                                    <br>

                                                    <br>

                                                    <h2 class="form-section"><i class="fa fa-business-time"></i>

                                                    Información Representante Legal</h2>

                                                    <div class="row">

                                                        <div class="col-md-4">

                                                            <div class="form-group">

                                                                <label for="">

                                                                    <h5 class="card-title"><span

                                                                            class="text-danger">*</span> Nombre</h5>

                                                                </label>

                                                                <input type="text" class="form-control"

                                                                    placeholder=". . ." name="representanteLegal">

                                                            </div>

                                                        </div>

                                                        <div class="col-md-3">

                                                            <div class="form-group">

                                                                <label for="">

                                                                    <h5 class="card-title"><span

                                                                            class="text-danger">*</span> Identificación</h5>

                                                                </label>

                                                                <input type="text" class="form-control"

                                                                    placeholder=". . ." name="cargoRepresentante">

                                                            </div>

                                                        </div>

                                                        <div class="col-md-2">

                                                            <div class="form-group">

                                                                <label for="">

                                                                    <h5 class="card-title"><span

                                                                            class="text-danger">*</span> Teléfono

                                                                        (móvil, fijo)

                                                                    </h5>

                                                                </label>

                                                                <input type="text" class="form-control"

                                                                    placeholder="# ext #" name="telefonoRepresentante">

                                                            </div>

                                                        </div>

                                                        <div class="col-md-3">

                                                            <div class="form-group">

                                                                <label for="">

                                                                    <h5 class="card-title"><span

                                                                            class='text-danger'>*</span>  Correo electrónico</h5>

                                                                </label>

                                                                <input type="text" class="form-control" placeholder="@"

                                                                    name="emailContacto">

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <h2 class="form-section"><i class="fa fa-business-time"></i>

                                                    Información Contacto</h2>

                                                    <div class="row">

                                                        <div class="col-md-4">

                                                            <div class="form-group">

                                                                <label for="">

                                                                    <h5 class="card-title"><span

                                                                            class="text-danger">*</span> Nombre</h5>

                                                                </label>

                                                                <input type="text" class="form-control"

                                                                    placeholder=". . ." name="representanteLegal2">

                                                            </div>

                                                        </div>

                                                        <div class="col-md-3">

                                                            <div class="form-group">

                                                                <label for="">

                                                                    <h5 class="card-title"><span

                                                                            class="text-danger">*</span> Cargo</h5>

                                                                </label>

                                                                <input type="text" class="form-control"

                                                                    placeholder=". . ." name="cargoRepresentante2">

                                                            </div>

                                                        </div>

                                                        <div class="col-md-2">

                                                            <div class="form-group">

                                                                <label for="">

                                                                    <h5 class="card-title"><span

                                                                            class="text-danger">*</span> Teléfono

                                                                        (móvil, fijo)

                                                                    </h5>

                                                                </label>

                                                                <input type="text" class="form-control"

                                                                    placeholder="# ext #" name="telefonoRepresentante2">

                                                            </div>

                                                        </div>

                                                        <div class="col-md-3">

                                                            <div class="form-group">

                                                                <label for="">

                                                                    <h5 class="card-title"><span

                                                                            class="text-danger">*</span>  Correo electrónico</h5>

                                                                </label>

                                                                <input type="text" class="form-control" placeholder="@"

                                                                    name="emailContacto2">

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <h2 class="form-section"><i class="fa fa-business-time"></i>

                                                        Información facturación</h2>

                                                    <div class="row">

                                                        <div class="col-md-10">

                                                            <div class="form-group">

                                                                <label for="">

                                                                    <h5 class="card-title"> link</h5>

                                                                </label>

                                                                <input type="text" class="form-control"

                                                                    placeholder=". . ." name="link">

                                                            </div>

                                                        </div>

                                                        <div class="col-md-4">

                                                            <div class="form-group">

                                                                <label for="">

                                                                    <h5 class="card-title">Usuario</h5>

                                                                </label>

                                                                <input type="text" class="form-control"

                                                                    placeholder=". . ." name="usuario">

                                                            </div>

                                                        </div>

                                                        <div class="col-md-4">

                                                            <div class="form-group">

                                                                <label for="">

                                                                    <h5 class="card-title"> Clave

                                                                    </h5>

                                                                </label>

                                                                <input type="text" class="form-control"

                                                                    placeholder="# ext #" name="clave">

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                                <h4 class="form-section"><i class="ft-clipboard"></i> Documentación</h4>

                                                <p class="parrafo">Peso máximo por documento  5MB</p>

                                                <div class="row">

                                                    <div class="col-md-8">

                                                        <div class="form-group">

                                                            

                                                            <input type="File" id="rut" class="btn btn-bitbucket round" accept="application/pdf">

                                                            <label for="">

                                                                <h5 class="card-title">Rut&nbsp;&nbsp;&nbsp;

                                                                </h5>

                                                            </label>

                                                        </div>

                                                    </div>

                                                    <div class="col-md-8">

                                                        <div class="form-group">

                                                            

                                                            <input type="File" id="camara" class="btn btn-bitbucket round" accept="application/pdf">

                                                            <label for="">

                                                                <h5 class="card-title">Cámara de Comercio

                                                                </h5>

                                                            </label>

                                                        </div>

                                                    </div>

                                                    <div class="col-md-8">

                                                        <div class="form-group">

                                                            

                                                            <input type="File" id="legal" class="btn btn-bitbucket round" accept="application/pdf">

                                                            <label for="">

                                                                <h5 class="card-title">Id Representante Legal

                                                                </h5>

                                                            </label>

                                                        </div>

                                                    </div>

                                                    <div class="col-md-8">

                                                        <div class="form-group">

                                                            

                                                            <input type="File" id="comercial" class="btn btn-bitbucket round" accept="application/pdf">

                                                            <label for="">

                                                                <h5 class="card-title">Referencia Comercial

                                                                </h5>

                                                            </label>

                                                        </div>

                                                    </div>

                                                    <div class="col-md-8">

                                                        <div class="form-group">

                                                           

                                                            <input type="File" id="antecedentes" class="btn btn-bitbucket round" accept="application/pdf">

                                                            <label for="">

                                                                <h5 class="card-title">Antecendentes

                                                                </h5>

                                                            </label>

                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="form-actions">

                                                    

                                                <button id="registrarEmpresa" class="btn  capa text-white round ">

                                                        <i class="fa fa-save fa-2x"></i> Guardar

                                                    </button>&nbsp;&nbsp;&nbsp;

                                                    <button type="button" class="btn btn-danger round " onclick="location.reload()">

                                                        <i class="fa fa-ban fa-2x"></i> Limpiar

                                                    </button>

                                                    <br><br><br>

                                                    <div id="smgtrabajo"></div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </section>

                    <!--/ contendio -->

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

    <script src="<?php echo CORE_JS_SERVER."directory.js"; ?>"></script>

    <script src="<?php echo CORE_JS_SERVER."app.js"; ?>"></script>

    <script src="<?php echo PLATFORM_SERVER."modules/empresa/triggers/module.js"; ?>"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    

</body>

<!-- END: Body-->

</html>

