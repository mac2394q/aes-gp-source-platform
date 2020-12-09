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
       require_once (CONTROLLERS_PATH."plantillaController.php");
       session::verificarSesion($_SESSION['idsesion']);
       date_default_timezone_set('America/Bogota');
       setlocale(LC_ALL,"es_CO");
       $objPlantilla = empresaController::grupoEmpresarial($_GET['id']);
      //  echo "id".$_SESSION['idusuario'];
      //print_r($_SESSION);
    ?>
</head>

<body class="vertical-layout vertical-menu-modern material-vertical-layout material-layout 2-columns   fixed-navbar"
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:75%;">
    <input type="hidden" value="0" name="certificadosDinamicos" />
    <input type="hidden" value="<?php echo $_GET['id']; ?>" name="idgrupo" />
    <!-- fixed-top-->
    <?php
    /* top bar  */
    require_once (PLATFORM_PATH."global/inc/component/fixed_top.php");
    /* Menu  */
    require_once (PLATFORM_PATH."global/inc/component/main_menu.php");
  ?>
    <div class="app-content content">
        <div class="content-header row">
            <div class="content-header-dark bg-img col-12">
                <div class="row">
                    <div class="content-header-left col-md-9 col-12 mb-2">
                        <h3 class="content-header-title titulo">Módulo Grupo Empresarial</h3>
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item parrafo "><a class="text-black" href="index.php">Listado
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active parrafo text-black">Ficha Grupo Empresarial</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-wrapper">
            <div class="content-body">
                <div class="content-body">

                    <div class="row match-height">
                        <div class="col-md-12">
                            <ul class="list-inline mb-0">
                                
                                <li><a href="<?php echo "historialTrabajoGrupo.php?id=".$_GET['id']; ?>"
                                        class="btn text-white capa round btn-min-width mr-1 mb-1 waves-effect waves-light">
                                        <i class="fa fa-book fa-2x"></i> Historial de trabajos </a>
                                </li>

                                <li><a href="<?php echo "autentificacionGrupo.php?id=".$_GET['id']; ?>"
                                        class="btn text-white capa round btn-min-width mr-1 mb-1 waves-effect waves-light">
                                        <i class="fa fa-shield-alt fa-2x"></i> Autenticación Grupo </a>
                                </li>

                               
                               
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="card" >
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <div class="form">
                                            <div class="form-body">
                                                <h2 class="form-section"><i class="fa fa-mail-bulk"></i>
                                                    Información General </h2>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="projectinput1">
                                                                <h5 class="card-title"><span
                                                                        class="text-danger">*</span> Grupo
                                                                    Empresarial:
                                                                </h5>
                                                            </label>
                                                            <input readonly type="text" id="projectinput1"
                                                                class="form-control" placeholder=". . ." name="etiqueta"
                                                                id="etiqueta"
                                                                value="<?php echo  $objPlantilla->getNombre_grupo_empresarial(); ?>">
                                                        </div>
                                                    </div>

                                                </div>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2 class="form-section"><i class="fa fa-business-time"></i>
                                        Empresas Asociadas al Grupo Empresarial</h2>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <div class="repeater-default">
                                            <div data-repeater-list="car">
                                                <div data-repeater-item="" style="">
                                                    <?php empresaController::listadoSimpleEmpresasGrupoEmpresarial($_GET['id']); ?>
                                                    <hr>
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                            <div class="form-actions">
                                                <hr>
                                                <div id="smgPlantilla"></div>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="<?php echo CORE_JS_SERVER."directory.js"; ?>"></script>
    <script src="<?php echo CORE_JS_SERVER."app.js"; ?>"></script>
    <script src="<?php echo PLATFORM_SERVER."modules/plantillas/triggers/module.js"; ?>"></script>
    <script>
        $(document).on('click', '#agregarCertificado', function (e) {
            var contador = document.getElementsByName("certificadosDinamicos")[0].value;
            //alert(contador);
            contador = parseInt(contador) + 1;
            //alert(contador);
            document.getElementsByName("certificadosDinamicos")[0].value = contador;
        });
        $(document).on('click', '#eliminarCertificado', function (e) {
            var contador = document.getElementsByName("certificadosDinamicos")[0].value;
            if (parseInt(contador) > 0) {
                //alert(contador);
                contador = parseInt(contador) - 1;
                //alert(contador);
                document.getElementsByName("certificadosDinamicos")[0].value = contador;
            }
        });
    </script>
</body>

</html>