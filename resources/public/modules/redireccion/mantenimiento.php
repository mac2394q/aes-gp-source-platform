<?php
   include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
?>
<!DOCTYPE html>
<html class="loading" lang="es" data-textdirection="ltr">

<head>
    <?php require_once (PLATFORM_PATH."global/inc/maintenance/head.php"); ?>
</head>

<body class="vertical-layout vertical-menu-modern 1-column  bg-maintenance-image menu-expanded blank-page blank-page"
    data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-md-4 col-10 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 px-1 py-1 box-shadow-3 m-0">
                                <div class="card-body">
                                    <span class="card-title text-center">
                                        <img src="<?php echo VENDOR_SERVER."aes/logo-aes.png"; ?>"
                                            class="img-fluid mx-auto d-block pt-2" width="250" alt="logo">
                                    </span>
                                </div>
                                <div class="card-body text-center">
                                    <h3>La plataforma actualmente se encuentra en mantenimiento</h3>
                                  
                                    <p> Enlace provisional</p>
                                    <a  target="_blank" href="http://aesbeta2.ml/resources/public/views/platform/modules/sesion/login.php" class="btn btn-info btn-block"><i class="fa fa--home"></i> PLATAFORMA GP</a>
                                  
                                   
                                </div>
                                <span class="card-title text-center">
                                    <img src="<?php echo VENDOR_SERVER."aes/logopvp.png"; ?>"
                                        class="img-fluid mx-auto d-block pt-2" width="250" alt="logo">
                                </span> 
                               
                                <a href="https://aes.org.co/" class="btn btn-primary btn-block"><i class="fa fa--home"></i> SITIO WEB : AES</a>
                                <hr>
                                
                                
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <?php require_once (PLATFORM_PATH."global/inc/maintenance/lib.php"); ?>

</body>


</html>