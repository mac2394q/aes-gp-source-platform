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
       require_once (CONTROLLERS_PATH."auditoriasController.php");
       session::verificarSesion($_SESSION['idsesion']);
       date_default_timezone_set('America/Bogota');
       setlocale(LC_ALL,"es_CO");
       $objAuditoria = auditoriaDao::auditoriaId($_GET['id']);
       $objEmpresa = empresaDao::empresaId($objAuditoria->getIdempresa_ancla());
       //$objPlantilla = plantillaController::grupoId($_GET['id']);
      //  echo "id".$_SESSION['idusuario'];
      //print_r($_SESSION);
    ?>
</head>

<body class="vertical-layout vertical-menu-modern material-vertical-layout material-layout 2-columns   fixed-navbar"
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:90%;">
    <input type="hidden" value="<?php echo $_GET['id']; ?>" name="idauditoria" />
    <!-- fixed-top-->
    <?php
    /* top bar  */
    require_once (PLATFORM_PATH."global/inc/component/fixed_top.php");
    /* Menu  */
    require_once (PLATFORM_PATH."global/inc/component/main_menu.php");
  ?>
    <div class="app-content content">
        <div class="content-wrapper">

            <br>
            <div class="content-body">
                <div class="content-body">
                    <section>
                        <div class="row match-height">
                            <div class="col-md-12">
                                <div class="card">
                                    <div id="top_bar2" class="card-header">
                                        <div>

                                            <a class="btn btn-secondary waves-effect waves-light"
                                                href="<?php echo "verFicha.php?id=".$_GET['id']; ?>">
                                                <i class="fa fa-clipboard fa-2x"></i> &nbsp;&nbsp;Ver ficha de auditoria
                                            </a>

                                            <a target="_blank" href="<?php echo "estatusPDF.php?id=".$_GET['id']; ?>"
                                                class="btn btn-secondary waves-effect waves-light">
                                                <i class="fa fa-file-pdf fa-2x"></i> &nbsp;PDF
                                            </a>
                                        </div>
                                        <h3 class="form-section">
                                            <strong>INFORMACIÓN GENERAL DE LA ORGANIZACIÓN</strong>
                                        </h3>
                                        <div class="row">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            FECHA DE ENTREGA DE INFORME
                                                        </h5>
                                                    </label>
                                                    <input type="date" class="form-control" placeholder=". . ."
                                                        name="razonSocial" id="razonSocial"
                                                        value="BRENNTAG COLOMBIA S.A.">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">
                                                        <h5 class="card-title"><span class="text-danger">*</span>
                                                            NOMBRE DE EMPRESA
                                                        </h5>
                                                    </label>
                                                    <input type="text" class="form-control" placeholder=". . ."
                                                        name="razonSocial" id="razonSocial"
                                                        value="<?php echo $objEmpresa->getNombre_empresa(); ?>">
                                                </div>
                                            </div>



                                        </div>
                                        <div class="card-content collapse show">
                                            <div class="card-body">


                                                <h2 class="form-section"><i class="fa fa-chart-bar"></i>
                                                    ESTATUS DE VINCULACIÓN AL PROGRAMA PVP </h2>
                                                <?php auditoriasController::listadoModeloEstatus($_GET['id']); ?>

                                                <div aria-expanded="true" aria-labelledby="description"
                                                    class="tab-pane active" id="desc" role="tabpanel">


                                                    <br>
                                                    <!-- <h4>
                                                        Variables :
                                                    </h4>
                                                    <ul>
                                                        <li>
                                                            Empresa no vinculada al programa PVP <span
                                                                class="badge badge-default badge-danger">NO
                                                                PROGRAMADA</span>
                                                        </li>
                                                        <li>
                                                            Empresa Vinculada con auditoria programada <span
                                                                class="badge badge-default badge-warning">PROGRAMADA</span>
                                                        </li>
                                                        <li>
                                                            Empresa vinculada con auditoria realizada <span
                                                                class="badge badge-default badge-success">AUDITADA</span>
                                                        </li>

                                                    </ul> -->
                                                    <h2 class="my-1">
                                                        Estatus de Vinculacion al Programa de Verificacion de
                                                        Proveedores
                                                    </h2>
                                                    <table id="" class="table-responsive mt-1">
                                                        <thead>
                                                            <tr role="row">
                                                                <th width="70%"> ESTATUS
                                                                </th>
                                                                <th width="30%"> NO EMPRESAS
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr role="row" class="even">
                                                                <td>AUDITADA</td>
                                                                <td>
                                                                    0
                                                                </td>

                                                            </tr>
                                                            <tr role="row" class="even">
                                                                <td>PROGRAMADA</td>
                                                                <td>
                                                                    0
                                                                </td>

                                                            </tr>
                                                            <tr role="row" class="even">
                                                                <td>NO  AUDITADA</td>
                                                                <td>
                                                                    0
                                                                </td>

                                                            </tr>
                                                            <tr role="row" class="even">
                                                                <td>TOTAL </td>
                                                                <td>
                                                                    0
                                                                </td>

                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="pie-chart"></div>
                                    </div>
                                    <br><br>
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
    <script src="https://www.google.com/jsapi"></script>
    <!-- <script src="https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/app-assets/js/scripts/charts/google/pie/pie.min.js"></script> -->
    <script src="<?php echo CORE_JS_SERVER."directory.js"; ?>"></script>
    <script src="<?php echo CORE_JS_SERVER."app.js"; ?>"></script>
    <script src="<?php echo PLATFORM_SERVER."modules/auditorias/triggers/module.js"; ?>"></script>
    <script>
        function drawPie() {
            var e = google.visualization.arrayToDataTable([
                ["Task", "Hours per Day"],
                ["NO  AUDITADA", 12],
                ["AUDITADA", 50],
                ["PROGRAMADA", 12]
            ]);
            new google.visualization.PieChart(document.getElementById("pie-chart")).draw(e, {
                title: " Estatus de Vinculacion al Programa de Verificacion de Proveedores",
                height: 300,
                fontSize: 15,
                colors: ["#e30707", "#196e0f", "#f2e30f", "#E84A5F", "#474747"],
                chartArea: {
                    left: "8%",
                    width: "90%",
                    height: 450
                }
            })
        }
        google.load("visualization", "1.0", {
            packages: ["corechart"]
        }), google.setOnLoadCallback(drawPie), $(function () {
            function e() {
                drawPie()
            }
            $(window).on("resize", e), $(".menu-toggle").on("click", e)
        });
    </script>
</body>

</html>