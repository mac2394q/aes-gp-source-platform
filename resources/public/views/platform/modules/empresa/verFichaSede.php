<?php session_start(); ?>
<!DOCTYPE html>
<html class="loading" lang="es-ES" data-textdirection="ltr">

<head>
    <?php
       include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
       require_once (PLATFORM_PATH."global/inc/platform/head.php");
       require_once (LIB_PATH."session.php");
       require_once (CONTROLLERS_PATH."empresaController.php");
       require_once (CONTROLLERS_PATH."areaController.php");
       require_once (CONTROLLERS_PATH."sedeController.php");
       session::verificarSesion($_SESSION['idsesion']);

       $objSede = sedeController::objSede($_GET['id']);
       $objEmpre =empresaController::objEmpresa($objSede->getIdempresa_sede());
       date_default_timezone_set('America/Bogota');
       setlocale(LC_ALL,"es_CO");
      //  echo "id".$_SESSION['idusuario'];
      //print_r($_SESSION);
    ?>
</head>

<body class="vertical-layout vertical-menu-modern material-vertical-layout material-layout 2-columns   fixed-navbar"
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:75%">

    <input type="hidden" name="idsede_" id="idsede_" value="<?php echo  $_GET['id']; ?>" />
    <input type="hidden" value="0" name="certificadosDinamicos" />

    <!-- fixed-top-->
    <?php
    /* top bar  */
    require_once (PLATFORM_PATH."global/inc/component/fixed_top.php");
    /* Menu  */
    require_once (PLATFORM_PATH."global/inc/component/main_menu.php");
  ?>
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-dark bg-img col-12">
                    <div class="row">
                        <div class="content-header-left col-md-9 col-12 mb-2">
                            <h3 class="content-header-title titulo">Modulo Empresa</h3>
                            <div class="row breadcrumbs-top">
                                <div class="breadcrumb-wrapper col-12">
                                    <ol class="breadcrumb">
                                        
                                        <li class="breadcrumb-item parrafo"><a href="<?php echo "verFicha.php?id=".$objSede->getIdempresa_sede(); ?>">Folio empresa</a>
                                        </li>
                                        <li class="breadcrumb-item active parrafo text-black"><a href="#">Registrar sede</a>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="content-body">
                <div class="content-body">
                    <section id="basic-form-layouts">
                        <div class="row match-height">
                            <div class="col-md-12">
                                <div class="card" style="height: 984.5px;">
                                    <div class="card-header">
                                        <h4 class="card-title" id="basic-layout-form">A tener en cuenta</h4>
                                        <a class="heading-elements-toggle"><i
                                                class="la la-ellipsis-v font-medium-3"></i></a>
                                        <div class="heading-elements">
                                            <ul class="list-inline mb-0">
                                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-content collapse show">
                                        <div class="card-body">
                                            <div class="card-text">
                                                <p>Rellene el formulario teniendo en cuenta que los campos con * son de
                                                    caracter obligatorios , los campos que no lo posean son opcionales
                                                </p>
                                            </div>
                                            <div class="form">
                                                <div class="form-body">
                                                    <h2 class="form-section"><i class="fa fa-id-card-alt"></i>
                                                        Informacion de la empresa a asociar :
                                                    </h2>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="projectinput1">
                                                                    <h5 class="card-title">Razon social </h5>
                                                                </label>
                                                                <input readonly type="text"
                                                                    class="form-control card-title" placeholder=". . ."
                                                                    value="<?php  echo $objEmpre->getNombre_empresa(); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="projectinput1">
                                                                <h5 class="card-title">Area tecnica </h5>
                                                            </label>
                                                            <input readonly type="text" class="form-control card-title"
                                                                placeholder=". . ."
                                                                value="<?php  echo $objEmpre->getIdarea_tecnica_empresa(); ?>">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="projectinput3">
                                                                    <h5 class="card-title"> Ciudad</h5>
                                                                </label>
                                                                <input readonly type="text"
                                                                    class="form-control card-title" placeholder=". . . "
                                                                    value="<?php  echo $objEmpre->getCiudad_principal_empresa(); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="projectinput4">
                                                                    <h5 class="card-title"> Pais </h5>
                                                                </label>
                                                                <input readonly type="text" class="form-control"
                                                                    placeholder=". . . "
                                                                    value="<?php  echo $objEmpre->getPais_empresa(); ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br><br>
                                                    <h2 class="form-section"><i class="fa fa-mail-bulk"></i>
                                                        Informacion general de la sede</h2>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="projectinput1">
                                                                    <h5 class="card-title"><span
                                                                            class="text-danger">*</span> Ciudad sede
                                                                    </h5>
                                                                </label>
                                                                <input readonly type="text" class="form-control"
                                                                    placeholder=". . ." name="ciudad" id="ciudad"
                                                                    value="<?php  echo $objSede->getCiudad_sede(); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="projectinput3">
                                                                    <h5 class="card-title"> Direccion </h5>
                                                                </label>
                                                                <input readonly type="text" class="form-control"
                                                                    placeholder=". . . " name="direccion" id="direccion"
                                                                    value="<?php  echo $objSede->getDireccion_sede(); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="projectinput4">
                                                                    <h5 class="card-title"> Número de empleados </h5>
                                                                </label>
                                                                <input readonly type="text" class="form-control"
                                                                    placeholder=". . . " name="nempleado" id="nempleado"
                                                                    value="<?php  echo $objSede->getN_empleados(); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="projectinput3">
                                                                    <h5 class="card-title"> Cantidad procesos </h5>
                                                                </label>
                                                                <input readonly type="text" id="procesos"
                                                                    class="form-control" placeholder=". . . "
                                                                    name="procesos"
                                                                    value="<?php  echo $objSede->getCantidad_procesos_sede(); ?>">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <br>

                                                </div>
                                                <div class="form-actions">

                                                    <button type="button" id="editarEmpresa"
                                                        class="btn text-white capa waves-effect waves-light">
                                                        <i class="fa fa-pen-square fa-2x"></i>&nbsp; Actualizar
                                                        formulario
                                                    </button>
                                                    <button type="button" id="actualizarCambios"
                                                        class="btn text-white capa waves-effect waves-light">
                                                        <i class="fa fa-save fa-2x"></i>&nbsp; Modificar
                                                    </button>
                                                    <div id="smgEmpresa"></div>
                                                </div>
                                                <br>
                                                <br>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Contactos Sede </h4>
                                        <a class="heading-elements-toggle"><i
                                                class="la la-ellipsis-h font-medium-3"></i></a>
                                        <div class="heading-elements">
                                            <ul class="list-inline mb-0">
                                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-content collapse show">
                                        <div class="card-body">
                                            <div class="repeater-default">
                                                <?php  empresaController::contactosSede($objSede->getIdsede() ); ?>
                                                <br>
                                                <br>
                                                <h4 class="card-title">Agregar nuevos contactos</h4>
                                                <div data-repeater-list="car">
                                                    <div data-repeater-item="" style="">
                                                        <form class="form row">
                                                            <div class="form-group mb-1 col-sm-12 col-md-4">
                                                                <label for="projectinput3"><span
                                                                        class="text-danger">*</span>
                                                                    </span> Contacto
                                                                    sede</label>
                                                                <input type="text" id="projectinput3"
                                                                    class="form-control" placeholder=". . . "
                                                                    name="contacto">
                                                            </div>
                                                            <div class="form-group mb-1 col-sm-12 col-md-3">
                                                                <label for="projectinput3"><span
                                                                        class="text-danger">*</span>
                                                                    </span> Cargo </label>
                                                                <input type="text" id="projectinput3"
                                                                    class="form-control" placeholder=". . . "
                                                                    name="cargo">
                                                            </div>
                                                            <div class="form-group mb-1 col-sm-12 col-md-3">
                                                                <label for="projectinput3"><span
                                                                        class="text-danger">*</span>
                                                                    </span> Telefono
                                                                    Movil - Fijo -
                                                                    Ext </label>
                                                                <input type="text" id="projectinput3"
                                                                    class="form-control" placeholder=". . . "
                                                                    name="telefonos">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-2 text-center mt-2">
                                                                <button type="button"
                                                                    class="btn btn-danger waves-effect waves-light"
                                                                    data-repeater-delete="" id="eliminarCertificado"> <i
                                                                        class="ft-x"></i>
                                                                    Eliminar</button>
                                                            </div>
                                                        </form>
                                                        <hr>
                                                    </div>
                                                </div>
                                                <div class="form row ">
                                                    <div class="form-group col-md-3">
                                                        <button data-repeater-create="" id="agregarCertificado"
                                                            class="btn text-white capa waves-effect waves-light">
                                                            <i class="fa fa-plus fa-2x"></i>&nbsp; Agregar
                                                        </button>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <button id="registrarContacto"
                                                            class="btn text-white capa waves-effect waves-light">
                                                            <i class="fa fa-th-list fa-2x"></i>&nbsp; Validar
                                                            certificados
                                                            agregados
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <?php
    //require_once (PLATFORM_PATH."global/inc/component/customizer.php");
    //require_once (PLATFORM_PATH."global/inc/component/buy.php");
    require_once (PLATFORM_PATH."global/inc/component/footer.php");
    require_once (PLATFORM_PATH."global/inc/platform/lib.php");
    
  ?>
    <script src="<?php echo CORE_JS_SERVER."directory.js"; ?>"></script>
    <script src="<?php echo CORE_JS_SERVER."app.js"; ?>"></script>
    <script src="<?php echo PLATFORM_SERVER."modules/empresa/triggers/module.js"; ?>"></script>
    <script>
        $('#actualizarCambios').hide();


        $(document).on('click', '#editarEmpresa', function (e) {
            $('#editarEmpresa').hide();

            $('#ciudad').removeAttr("readonly");
            $('#direccion').removeAttr("readonly");
            $('#procesos').removeAttr("readonly");
            $('#nempleado').removeAttr("readonly");


            $('#actualizarCambios').show();
        });

        $(document).on('click', '#actualizarCambios', function (e) {

            $('#editarEmpresa').show();

            $('#ciudad').removeAttr("readonly");
            $('#direccion').removeAttr("readonly");
            $('#procesos').removeAttr("readonly");
            $('#nempleado').removeAttr("readonly");

            $('#actualizarCambios').hide();

            sendEventApp('POST', routesAppPlatform() + 'empresa/core/modificarSede.php',
                params = {
                    "ciudad": document.getElementsByName("ciudad")[0].value,
                    "direccion": document.getElementsByName("direccion")[0].value,
                    "procesos": document.getElementsByName("procesos")[0].value,
                    "nempleado": document.getElementsByName("nempleado")[0].value,
                    "idsede": document.getElementsByName("idsede_")[0].value,
                }, '#smgEmpresa');

        });

        $(document).on('click','#agregarCertificado',function(e){
            
            

            var contador = document.getElementsByName("certificadosDinamicos")[0].value;
            //alert(contador);
            contador = parseInt(contador) + 1;
            //alert(contador);
            document.getElementsByName("certificadosDinamicos")[0].value=contador;
        });
        
        $(document).on('click','#eliminarCertificado',function(e){
            var contador = document.getElementsByName("certificadosDinamicos")[0].value;
            if(parseInt(contador) > 0){
                //alert(contador);
                contador = parseInt(contador) - 1;
                //alert(contador);
                document.getElementsByName("certificadosDinamicos")[0].value=contador;
            }  
    }); 
    </script>
</body>

</html>