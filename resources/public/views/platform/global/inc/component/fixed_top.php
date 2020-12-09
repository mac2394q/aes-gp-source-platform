<?php session_start();



include_once($_SERVER['DOCUMENT_ROOT'] . '/conf.php');



$idioma = "";



$leyenda = "";





$idioma = "<i class='flag-icon flag-icon-co'></i>";



$leyenda = "<i class='flag-icon flag-icon-co'></i>   ESPAÑOL LATINO AMERICA.";







?>



<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-dark capa navbar-shadow">



  <div class="navbar-wrapper">



    <div class="navbar-header expanded">



      <ul class="nav navbar-nav flex-row">



        <li class="nav-item mobile-menu d-lg-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs is-active" href="#"><i class="ft-menu font-large-1"></i></a></li>



        <li class="nav-item mr-auto">



          <a class="navbar-brand" href="<?php echo INDEX_PLATFORM_PATH; ?>"><img class="brand-logo " alt="modern admin logo" src="http://gp.aes.org.co//vendor/aes/gp.jpg">



            <h4 class="brand-text">GP AES </h4>



          </a>



        </li>



        <li class="nav-item d-none d-lg-block nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="toggle-icon ft-toggle-right font-medium-3 white" data-ticon="ft-toggle-right"></i></a></li>



        <li class="nav-item d-lg-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a></li>



      </ul>



    </div>



    <div class="navbar-container content">



      <div class="collapse navbar-collapse" id="navbar-mobile">



        <ul class="nav navbar-nav mr-auto float-left">



          <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand" href="#">



              <i class="ficon ft-maximize"></i></a>



          </li>







        </ul>



        <ul class="nav navbar-nav float-right">



          <li class="dropdown dropdown-language  nav-item ">



            <a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">



              <?php echo $idioma; ?><span class="selected-language parrafo">IDIOMA: ESPAÑOL</span>



            </a>



          </li>



          <li class="dropdown dropdown-language  nav-item ">



            <a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">



              <span class="parrafo"><?php echo "Usuario: " . $_SESSION['nombre']; ?></span>



            </a>



          </li>







          <li class="dropdown dropdown-language  nav-item ">



            <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">



              <span class="selected-language parrafo">Sesión</span>



            </a>



            <div class="dropdown-menu" aria-labelledby="dropdown-flag">



              <a class="dropdown-item" href="<?php echo PLATFORM_SERVER . "modules/sesion/core/cerrarSesion.php"; ?>">Cerrar Sesion</a>



            </div>



          </li>











        </ul>



      </div>



    </div>



  </div>



</nav>