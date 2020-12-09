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
       require_once (CONTROLLERS_PATH."trabajoController.php");
       require_once (CONTROLLERS_PATH."usuarioController.php");
    
       session::verificarSesion($_SESSION['idsesion']);
       date_default_timezone_set('America/Bogota');
       setlocale(LC_ALL,"es_CO");
  ?>
</head>
<!-- END: Head-->
<!-- BEGIN: Body-->
<body
  class="vertical-layout vertical-menu-modern material-vertical-layout material-layout 2-columns fixed-navbar  menu-expanded pace-done"
  data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:75%;">
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
            <h3 class="content-header-title white titulo">
              <li class="fa fa-desktop "></li>&nbsp;Panel de Trabajo Principal
            </h3>
            <div class="row breadcrumbs-top">
              <ol class="breadcrumb parrafo">
                <li class="breadcrumb-item titulo active text-white ">
                  <span class="fa fa-address-card"></span>&nbsp; <?php echo $_SESSION['rol'] ?></li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="content-wrapper">
      <div class="content-body">
        <!-- contendio -->
        <div class="row">
          <?php if($_SESSION['rol'] == "ADMINISTRADOR" || $_SESSION['rol'] == "LIDER OEA" || $_SESSION['rol'] == "ASISTENTE"){ ?>
          <div class="col-9">
            <div class="card">
              <div class="card-header">
                <h2 class=" titulo">
                  <li class="fa fa-city fa-2x"></li>&nbsp;Consulta Parametrizada:
                </h2>
                <div class="card-content collapse show">
                  <div class="card-body card-dashboard ">
                    <div class="table-responsive">
                      <div id="project-task-list_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                          
                          <div class="col-sm-12 col-md-3">
                            <div class="form-group">
                              <label for="">
                                <h5 class="card-title titulo">
                                  <li class="fa fa-clipboard-list"></li>  Orden
                                </h5>
                              </label>
                              <select id="orden" name="ordenEmpresa" class="form-control titulo">
                                <option class="titulo" value="ASC">Az</option>
                                <option class="titulo" value="DESC">Za</option>
                              </select> 
                            </div>
                          </div>
                          <div class=" col-md-7">
                            <div class="form-group">
                              <div class="input-group">
                                <input type="text" class="form-control" placeholder="Buscar : Nombre Empresa,  NIT,  Ciudad,  Representante . . ."
                                  aria-describedby="button-addon2" name="buscar">
                                <div class="input-group-append">
                                  <button class="btn round capa text-white" type="button" id="buscarEmpresa">
                                    <li class="fa fa-search"></li>
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12 col-md-2">
                            <div class="form-group">
                              <div class="input-group">
                                <button class="btn round capa text-white" type="button" id="buscarEmpresa"
                                  onclick="location.reload()">
                                  <li class="fa fa-redo"></li>&nbsp; Limpiar
                                </button>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-12">
                              <div id="tablaDinamica_panel">
                                <?php empresaController::listadoSimpleEmpresas(null,"ASC"); ?>
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
          </div>
          <div class="col-3">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title parrafo">Estadísticas del Sistema</h4>
              </div>
              <div class="card-content collapse show">
                <div class="table-responsive">
                  <table class="table">
                    <thead class="thead">
                      <tr>
                        <th>Empresas</th>
                        <th><?php echo trabajoController:: nempresas(); ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Grupos Empresariales</td>
                        <th><?php echo trabajoController:: ngrupos(); ?></th>
                      </tr>
                      <tr>
                        <td>Especialistas</td>
                        <th><?php echo usuarioController:: numUsuariosTotal(); ?></th>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
        <?php if($_SESSION['rol'] == "EMPRESA"){ 
            $objEmpresa =empresaController::objEmpresa($_SESSION['idempresa']);
        ?>
        <div class="col-md-12 row">
          <!-- <div class="col-xl-4 col-lg-8 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="info"><a
                          href="<?php echo "modules/empresa/autentificacionEmpresa.php?id=".$_SESSION['idempresa']; ?>"
                          class="text-black">Autenticación Empresa</h3></a>
                    </div>
                    <div>
                      <a href="<?php echo "modules/empresa/autentificacionEmpresa.php?id=".$_SESSION['idempresa']; ?>"><i
                          class="fa fa-user-shield info font-large-2 float-right"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>-->
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="info"><a
                          href="<?php echo "modules/empresa/historialTrabajoEmpresa.php?id=".$_SESSION['idempresa']; ?>"
                          class="text-black">Historial de Trabajo</h3></a>
                    </div>
                    <div>
                      <a href="<?php echo "modules/empresa/historialTrabajoEmpresa.php?id=".$_SESSION['idempresa']; ?>"><i
                          class="fa fa-book info font-large-2 float-right"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> 
        <div class="col-md-12">
          <div class="card">
            <div class="card-content collapse show">
              <div class="card-body">
                <div class="form">
                  <div class="form-body">
                    <h2 class="form-section"><i class="fa fa-id-card-alt"></i>
                      Información General
                    </h2>
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label for="">
                            <h5 class="card-title">
                              Compañía
                            </h5>
                          </label>
                          <input readonly type="text" class="form-control" placeholder=". . ." name="razonSocial"
                            id="razonSocial" value="<?php echo $objEmpresa->getNombre_empresa();  ?>">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="">
                            <h5 class="card-title">
                              No Identificación</h5>
                          </label>
                          <input readonly type="text" class="form-control" placeholder=". . ." name="nit" id="nit"
                            value="<?php echo $objEmpresa->getIdentificacion_empresa();  ?>">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">
                          <h5 class="card-title">
                            Ciudad/Provincia/Municipio</h5>
                        </label>
                        <input readonly type="text" class="form-control" placeholder=". . . " name="ciudad" id="ciudad"
                          value="<?php echo $objEmpresa->getCiudad_empresa();  ?>">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">
                          <h5 class="card-title">
                            Departamento/Estado</h5>
                        </label>
                        <input readonly type="text" class="form-control" placeholder=". . . " name="departamento"
                          id="departamento" value="<?php echo $objEmpresa->getDepartamento_empresa();  ?>">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">
                          <h5 class="card-title">
                            País</h5>
                        </label>
                        <input readonly type="text" class="form-control" placeholder=". . . " name="pais" id="pais"
                          value="<?php echo $objEmpresa->getId_pais_empresa();  ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">
                          <h5 class="card-title">
                            Dirección</h5>
                        </label>
                        <input readonly type="text" class="form-control" placeholder=". . . " name="direccion"
                          id="direccion" value="<?php echo $objEmpresa->getDireccion_empresa() ;  ?>">
                      </div>
                    </div>
                  </div>
                  <br>
                  <h2 class="form-section"><i class="fa fa-mail-bulk"></i>
                    Información Administrativa</h2>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">
                          <h5 class="card-title">
                            E-mail
                            Empresarial</h5>
                        </label>
                        <input readonly type="text" class="form-control" placeholder="@" name="emailEmpresarial"
                          id="emailEmpresarial" value="<?php echo $objEmpresa->getEmail_empresa();  ?>">
                      </div>
                    </div>
                  </div>
                  <br>
                  <h2 class="form-section"><i class="fa fa-business-time"></i>
                    Comercial</h2>
                  <div class="row">
                    <div class="col-md-5">
                      <div class="form-group">
                        <label for="">
                          <h5 class="card-title">
                            Representante
                            Legal Compañía </h5>
                        </label>
                        <input readonly type="text" class="form-control" placeholder=". . ." name="representanteLegal"
                          id="representanteLegal" value="<?php echo $objEmpresa->getNombre_representate_empresa();  ?>">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="">
                          <h5 class="card-title">
                            Teléfono (Movil
                            - Fijo )</h5>
                        </label>
                        <input readonly type="text" class="form-control" placeholder="# ext #"
                          name="telefonoRepresentante" id="telefonoRepresentante"
                          value="<?php echo $objEmpresa->getTelefono_representante_empresa();  ?>">
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="">
                          <h5 class="card-title">
                            Representante del Sistema de Gestión</h5>
                        </label>
                        <input readonly type="text" class="form-control" placeholder=". . . "
                          name="representanteSistemaGestion" id="representanteSistemaGestion"
                          value="<?php echo $objEmpresa->getNombre_contacto_empresa2();  ?>">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="">
                          <h5 class="card-title">
                            Teléfono (Movil
                            - Fijo)</h5>
                        </label>
                        <input readonly type="text" id="" class="form-control" placeholder="# ext #"
                          name="telefonoSistema" id="telefonoSistema"
                          value="<?php echo $objEmpresa->getTelefono_contato_empresa2() ;  ?>">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">
                          <h5 class="card-title"> Correo Electrónico</h5>
                        </label>
                        <input readonly type="text" class="form-control" placeholder="@" name="emailContacto"
                          id="emailContacto" value="<?php echo $objEmpresa->getEmail_contacto_empresa2();  ?>">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
        <?php if($_SESSION['rol'] == "GRUPO"){ 
            $objEmpresa =empresaController::grupoEmpresarialIdUsuario($_SESSION['idsesion']);
        ?>
        <div class="col-md-12 row">
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="info"><a
                          href="<?php echo "modules/empresa/historialTrabajoEmpresa.php?id=".$_SESSION['idgrupo']; ?>"
                          class="text-black">Historial de Trabajo</h3></a>
                    </div>
                    <div>
                      <a href="<?php echo "modules/empresa/historialTrabajoEmpresa.php?id=".$_SESSION['idgrupo']; ?>"><i
                          class="fa fa-book info font-large-2 float-right"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
        
                  
                  <div class="col-md-12">
                    <div class="card">
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
                                      <h5 class="card-title"> Grupo
                                        Empresarial:
                                      </h5>
                                    </label>
                                    <input readonly type="text" id="projectinput1" class="form-control"
                                      placeholder=". . ." name="etiqueta" id="etiqueta"
                                      value="<?php echo  $objEmpresa->getNombre_grupo_empresarial(); ?>">
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
                  <!-- <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h2 class="form-section"><i class="fa fa-business-time"></i>
                          Empresas Asociadas al Grupo Empresarial</h2>
                      </div>
                      <div class="card-content collapse show">
                        <div class="card-body">
                          <?php empresaController::listadoSimpleEmpresasGrupoEmpresarial($_SESSION['idgrupo']); ?>
                        </div>
                      </div>
                    </div>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
      <?php if($_SESSION['rol'] == "ESPECIALISTA"){ 
            $idempleado = $_SESSION['idsesion'];
            $objEmpleado =usuarioController::usuarioId($idempleado);
      ?>
        <div class="col-md-12">
          <div class="card">
            <div class="card-content collapse show">
              <div class="card-body">
                
                <div class="form">
                  <div class="form-body">
                    <h2 class="form-section"><i class="fa fa-id-card-alt"></i>
                      Información General
                    </h2>
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label for="">
                            <h5 class="card-title">
                              Nombre del Empleado
                            </h5>
                          </label>
                          <input readonly type="text" class="form-control" placeholder=". . ." name="nombre" id="nombre"
                            value="<?php echo $objEmpleado->getNombre_usuario();  ?>">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="">
                            <h5 class="card-title">
                              Rol: </h5>
                          </label>
                          <input readonly type="text" class="form-control" value="<?php echo $objEmpleado->getRol_usuario();  ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="">
                            <h5 class="card-title">
                              Documento de Identidad</h5>
                          </label>
                          <input readonly type="text" class="form-control" placeholder=". . ." name="documento"
                            id="documento" value="<?php echo $objEmpleado->getDocumento_identificacion_usuario();  ?>">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">
                          <h5 class="card-title">
                            Correo Electrónico </h5>
                        </label>
                        <input readonly type="text" class="form-control" placeholder=". . . " name="correo" id="correo"
                          value="<?php echo $objEmpleado->getCorreo_usuario();  ?>">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">
                          <h5 class="card-title">
                            Teléfono</h5>
                        </label>
                        <input readonly type="text" class="form-control" placeholder=". . . " name="telefono"
                          id="telefono" value="<?php echo $objEmpleado->getTelefono_usuario();  ?>">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">
                          <h5 class="card-title">
                            Dirección</h5>
                        </label>
                        <input readonly type="text" class="form-control" placeholder=". . . " name="direccion"
                          id="direccion" value="<?php echo $objEmpleado->getDireccion_usuario();  ?>">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="">
                          <h5 class="card-title">
                            Ciudad </h5>
                        </label>
                        <input readonly type="text" class="form-control" placeholder=". . . " name="ciudad" id="ciudad"
                          value="<?php echo $objEmpleado->getCiudad_usuario();  ?>">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="">
                          <h5 class="card-title">
                            País </h5>
                        </label>
                        <input readonly type="text" class="form-control" placeholder=". . . " name="pais" id="pais"
                          value="<?php echo $objEmpleado->getId_pais_usuario();  ?>">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-header"><img src="https://aes.org.co/wp-content/uploads/2019/04/088.png"></div>
          </div>
        
        </div>
        <?php } ?>
    </div>
    <!--/ contendio -->
  </div>
  </div>
  </div>
  <!-- END: Content-->
  <?php
    //require_once (PLATFORM_PATH."global/inc/component/customizer.php");
    //require_once (PLATFORM_PATH."global/inc/component/buy.php");
    require_once (PLATFORM_PATH."global/inc/component/footer.php");
    require_once (PLATFORM_PATH."global/inc/platform/lib.php");
    
  ?>
  <script src="<?php echo CORE_JS_SERVER."directory.js"; ?>"></script>
  <script src="<?php echo CORE_JS_SERVER."app.js"; ?>"></script>
  <script src="<?php echo PLATFORM_SERVER."modules/empresa/triggers/module.js"; ?>"></script>
</body>
<!-- END: Body-->
</html>