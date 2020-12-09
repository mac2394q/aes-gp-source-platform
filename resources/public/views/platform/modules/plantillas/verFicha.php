<?php session_start(); ?>
<!DOCTYPE html>
<html class="loading" lang="es-ES" data-textdirection="ltr">
<head>
    <?php
       include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
       require_once (PLATFORM_PATH."global/inc/platform/head.php");
       require_once (LIB_PATH."session.php");
       require_once (CONTROLLERS_PATH."empresaController.php");
       require_once (CONTROLLERS_PATH."alcanceController.php");
       require_once (CONTROLLERS_PATH."plantillaController.php");
       session::verificarSesion($_SESSION['idsesion']);
       date_default_timezone_set('America/Bogota');
       setlocale(LC_ALL,"es_CO");
       $objPlantilla = plantillaController::plantillaId($_GET['id']);
      //  echo "id".$_SESSION['idusuario'];
       //print_r($objPlantilla);
    ?>
</head>
<body class="vertical-layout vertical-menu-modern material-vertical-layout material-layout 2-columns   fixed-navbar"
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:75%;">
    <input type="hidden" value="<?php echo $_GET['id']; ?>" name="idplantilla" />
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
                        <h3 class="content-header-title titulo">Módulo Plantilla</h3>
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item parrafo"><a class="text-black" href="index.php">Listado
                                             </a>
                                    </li>
                                    <li class="breadcrumb-item active parrafo text-black">Ficha de Plantilla
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
                <div class="content-body">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <div class="form">
                                            <div class="form-body">
                                                <h2 class="form-section"><i class="fa fa-mail-bulk"></i>
                                                   Información General </h2>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="projectinput1">
                                                                <h5 class="card-title"><span
                                                                        class="text-danger">*</span> Alcance:
                                                                </h5>
                                                            </label>
                                                            <input readonly type="text" id="projectinput1"
                                                                class="form-control" placeholder=". . ." name="etiqueta"
                                                                id="etiqueta"
                                                                value="<?php echo $objPlantilla->getId_alcance_plantilla();?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput4">
                                                                <h5 class="card-title">Resolución: </h5>
                                                            </label>
                                                            <input type="text" id="projectinput4" class="form-control"
                                                                placeholder=". . . " name="nombre" id="nombre"
                                                                value="<?php echo $objPlantilla->getEtiqueta_plantilla();?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="projectinput4">
                                                                <h5 class="card-title">País </h5>
                                                            </label>
                                                            <input type="text" readonly id="projectinput4"
                                                                class="form-control" placeholder=". . . " name="pais"
                                                                id="pais"
                                                                value="<?php echo $objPlantilla->getId_pais_plantilla();?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <?php alcanceController::select_area_listado($objPlantilla->getId_alcance_plantilla()); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <?php if($_SESSION['rol'] != "ESPECIALISTA"){ ?>
                                                <a href="<?php echo "agregarElementos.php?id=".$_GET['id'];?>"
                                                    class="btn text-white round capa btn-sm"><i
                                                        class="fa fa-list-alt fa-3x"></i>&nbsp; Agregar Requisito</a>
                                                &nbsp;&nbsp;&nbsp;
                                                <a href="<?php echo "agregarCapitulo.php?id=".$_GET['id'];?>"
                                                    class="btn text-white round capa btn-sm"><i
                                                        class="fa fa-sort-numeric-up fa-3x"></i>&nbsp; Agregar  Capitulo </a>
                                                &nbsp;&nbsp;&nbsp;
                                                
                                                <a id="editarPlantilla" href="#" class="btn text-white round capa btn-sm"><i
                                                        class="fa fa-edit fa-3x"></i>&nbsp; Modificar Datos de la
                                                    Plantilla</a>
                                                <?php } ?>    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2 class="form-section parrafo"><i class="fa fa-business-time"></i>
                                        Elementos de Plantilla</h2>
                                  
                                    
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <div class="repeater-default">
                                            <div data-repeater-list="car">
                                                <div data-repeater-item="" style="">
                                                    <?php plantillaController::listadoPlantillasGrupo($_GET['id']); ?>
                                                    <hr>
                                                </div>
                                            </div>
                                            
                                            <div class="form-actions">
                                             
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
  
</body>
</html>