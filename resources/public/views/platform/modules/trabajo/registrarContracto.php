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

       require_once (CONTROLLERS_PATH."contratoController.php");

       require_once (CONTROLLERS_PATH."grupoController.php");

       require_once (CONTROLLERS_PATH."usuarioController.php");

       require_once (CONTROLLERS_PATH."trabajoController.php");

       session::verificarSesion($_SESSION['idsesion']);

       date_default_timezone_set('America/Bogota');

       setlocale(LC_ALL,"es_CO");

       $idempresa = $_GET['id'];





       $objtrabajo = trabajoController::trabajoId($_GET['id']);

       $objEntidad = entidadController::entidadId($objtrabajo->getId_entrada_trabajo());

       //print_r($objEntidad);

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

    <input type="hidden" value="0" name="certificadosDinamicos" />

    <input type="hidden" name="fechaTop" value="null" />

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

                        <h3 class="content-header-title titulo floating-label-form-group-with-value">Módulo

                            Trabajo</h3>

                        <div class="row breadcrumbs-top">

                            <div class="breadcrumb-wrapper col-12">

                                <ol class="breadcrumb">

                                    <li class="breadcrumb-item active parrafo text-black"><a class="text-black"

                                            href="index.php">Listado </a>

                                    </li>

                                    <li class="breadcrumb-item active parrafo text-black"><a class="text-black"

                                            href="<?php echo "verFicha.php?id=".$_GET['id']; ?>">Ver Ficha de

                                            Trabajo</a>

                                    </li>

                                    <li class="breadcrumb-item active parrafo text-black"><a class="text-black"

                                            href="<?php echo "gestionContractos.php?id=".$_GET['id']; ?>">Gestión de Contratos</a>

                                    </li>

                                    <li class="breadcrumb-item active parrafo text-black">Registrar Contrato

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



                <section>

                    <div class="row ">

                        <div class="col-md-12">

                            <div class="card">

                                <div class="card-content collapse show">

                                    <div class="card-body">

                                        <div class="form">

                                            <div class="form-body">

                                                <h2 class="form-section"><i class="fa fa-warehouse"></i>

                                                    Información General

                                                </h2>

                                                <div class="row">

                                                    <div class="col-md-4">

                                                        <div class="form-group" id="empresa">

                                                            <label for="">

                                                                <h5 class="card-title"><span

                                                                        class="text-danger">*</span> Empresa

                                                                    Responsable:

                                                                </h5>

                                                            </label>

                                                            <?php 

                                                            //echo trabajoController::listadoEmpresa_();

                                                            if($objEntidad->getTipo_entidad() == "EMPRESA"){

                                                            $objEmpresa = empresaController::objEmpresa($objEntidad->getId_entidad());

                                                            echo "  <div class='col-md-12'>

                                                                        <div class='form-group'>

                                                                            <select id='entidadTipo2' name='entidadTipo2' class='form-control'>

                                                                                <option value='null'>Seleccione Empresa</option>

                                                                                <option value='".$objEmpresa->getId_entidad()."'>".$objEmpresa->getNombre_empresa()."</option>

                                                                            </select>

                                                                        </div>

                                                                    </div>";



                                                            }else{

                                                                $objEmpresa=empresaDao::listadoEmpresasGrupoEmpresarial($objEntidad->getId_entidad());

                                                            echo "  <div class='col-md-12'>

                                                                        <div class='form-group'>

                                                                            <select id='entidadTipo2' name='entidadTipo2' class='form-control'>

                                                                                <option value='null'>Seleccione Empresa</option>";

                                                                                foreach ($objEmpresa as $key => $value) {

                                                                                    echo "<option value='".$objEmpresa[$key]->getId_entidad()."'>".$objEmpresa[$key]->getNombre_empresa()."</option>";

                                                                                }

                                                                    echo "  </select>

                                                                        </div>

                                                                    </div>";



                                                            }

                                                             ?>

                                                        </div>

                                                    </div>

                                                    <div class="col-md-3">

                                                        <div class="form-group">

                                                            <label for="">

                                                                <h5 class="card-title"><span

                                                                        class="text-danger">*</span>Valor Contrato

                                                                </h5>

                                                            </label>

                                                            <input type="text" class="form-control" placeholder=". . ."

                                                                name="contracto">

                                                        </div>

                                                    </div>

                                                    <div class="col-md-3">

                                                        <div class="form-group">

                                                            <label for="projectinput3">

                                                                <h5 class="card-title">

                                                                    <li class="fa fa-calendar-alt"></li> Fecha de

                                                                    Suscripción

                                                                </h5>

                                                            </label>

                                                            <input type="date" class="form-control card-title"

                                                                placeholder=". . . " name="fecha" id="fecha" value="">

                                                        </div>

                                                    </div>

                                                </div>

                                                <h2 class="form-section"><i class="fa fa-id-card-alt"></i>

                                                    Documentación

                                                </h2>

                                                <p class="parrafo">Peso Max por documento   Max <> 10MB PDF</p>

                                                <div class="row">

                                                    <div class="col-md-5">

                                                        <div class="form-group">

                                                            <label for="">

                                                                <h5 class="card-title"><span

                                                                        class="text-danger">*</span> Contrato:

                                                                </h5>

                                                            </label>

                                                            <br><br>

                                                            <input type="file" name="f1" id="f1" accept="application/pdf" 

                                                                class="form-control round btn btn-bitbucket card-title" />

                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="row">



                                                    <div class="col-md-5">

                                                        <div class="form-group">

                                                            <label for="">

                                                                <h5 class="card-title"> Póliza:

                                                                </h5>

                                                            </label>

                                                            <br><br>

                                                            <input type="file" name="f2" id="f2" accept="application/pdf" 

                                                                class="form-control btn btn-bitbucket round card-title" />

                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-md-5">

                                                        <div class="form-group">

                                                            <label for="">

                                                                <h5 class="card-title">

                                                                    Confidencialidad:

                                                                </h5>

                                                            </label>

                                                            <br><br>

                                                            <input type="file" name="f3" id="f3" accept="application/pdf" 

                                                                class="form-control round btn btn-bitbucket card-title" />

                                                        </div>

                                                    </div>

                                                </div>

                                                <!-- <div class="row">

                                                    <div class="col-md-6">

                                                        <label for="">

                                                                <h5 class="card-title"><span

                                                                        class="text-danger">*</span>

                                                                    Asociar Proyectos:

                                                                </h5>

                                                        </label>

                                                        <?php //echo contratoController::listadoContratoTrabajoSeleccion($_GET['id']); ?>

                                                    </div>

                                                </div> -->

                                                



                                                <div class=" form-actions">

                                                    <div class="col-md-3">

                                                        <div class="form-group">

                                                            <br>

                                                            <button type="button" id="registrarContracto"

                                                                class="btn text-white round capa waves-effect waves-light">

                                                                <i class="fa fa-save fa-2x"></i>&nbsp;Registrar

                                                                Contrato

                                                            </button>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <br>

                                        </div>

                                        <div class="form-actions">

                                            <div id="smgtrabajo"></div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-12" id="continuacion">

                    </div>



                </section>

                <!--/ contendio -->

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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script src="<?php echo CORE_JS_SERVER."directory.js"; ?>"></script>

    <script src="<?php echo CORE_JS_SERVER."app.js"; ?>"></script>

    <script src="<?php echo PLATFORM_SERVER."modules/trabajo/triggers/module.js"; ?>"></script>

    

    <script>

        $('#fecha').change(function () {

            //document.getElementsByName("fechaTop")[0].value = document.getElementById("fecha").value ;

            var date = $('#fecha').val();

            document.getElementsByName("fechaTop")[0].value = date;

            //alert("date "+date);  

            //ar date = null;

        });

    </script>

</body>

<!-- END: Body-->



</html>

