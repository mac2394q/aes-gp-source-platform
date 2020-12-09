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
<body class="text-black"
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:100%;">
    <input type="hidden" value="<?php echo $_GET['id']; ?>" name="idauditoria" />
    <!-- fixed-top-->
    <?php
   
  ?>
    <div class="text-black">
        <div class="content-wrapper">
            
            <br>
            <div class="content-body">
                <div class="content-body">
                    <section id="basic-form-layouts">
                        <div class="row match-height">
                            <div class="col-12">
                                <div class="card">
                                    
                                    <div class="card-content collapse show">
                                        <div class="card-body" >
                                            <div id="imprimir">
                                            <img src="<?php echo VENDOR_SERVER."aes/reporte.png"; ?>" width="1320" height="125">
                                            <br><br><br><br>
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
                                                        >
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
                                                    <h4>
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

                                                    </ul>
                                                    <h2 class="my-1">
                                                        Estatus de Vinculacion al Programa de Verificacion de
                                                        Proveedores
                                                    </h2>
                                                    <table id="" class="table-responsive mt-1">
                                                        <thead>
                                                            <tr role="row">
                                                                <th width="70%"> Estatus
                                                                </th>
                                                                <th width="30%"> No empresa
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
                                                                <td>NO SE AUDITARA</td>
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
    <script src="https://www.google.com/jsapi"></script>
    <!-- <script src="https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/app-assets/js/scripts/charts/google/pie/pie.min.js"></script> -->
    <script src="<?php echo CORE_JS_SERVER."directory.js"; ?>"></script>
    <script src="<?php echo CORE_JS_SERVER."app.js"; ?>"></script>
    <script src="<?php echo PLATFORM_SERVER."modules/auditorias/triggers/module.js"; ?>"></script>
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
        function drawPie() {
            var e = google.visualization.arrayToDataTable([
                ["Task", "Hours per Day"],
                ["NO SE AUDITARA", 12],
                ["AUDITADA", 50],
                ["PROGRAMADA", 12]
            ]);
            new google.visualization.PieChart(document.getElementById("pie-chart")).draw(e, {
                title: " Estatus de Vinculacion al Programa de Verificacion de Proveedores",
                height: 200,
                fontSize: 15,
                colors: ["#d50000", "#28D094", "#FF9149", "#E84A5F", "#474747"],
                chartArea: {
                    left: "5%",
                    width: "90%",
                    height: 350
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


        $(document).on('click', '#imprimirFactura', function (e) {
        //$('#areaImprimir').hide();
        $('#top_bar').hide();
        $('#top_bar2').hide();
        window.print();
        $('#areaImprimir').show();
        $('#top_bar').show();
        $('#top_bar2').show();
        });
        $('#top_bar').hide();
        $('#top_bar2').hide();
        window.print();
        $('#areaImprimir').show();
        $('#top_bar').show();
        $('#top_bar2').show();
        
    </script>
   
</body>
</html>