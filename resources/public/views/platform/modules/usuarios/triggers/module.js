/*  Eventos para modulo de sesion. */
$(document).on('click', '#registrarEmpleado', function (e) {
  var formData = new FormData();
  formData.append("nombre", document.getElementsByName("nombre")[0].value);
  var nombre = document.getElementsByName("nombre")[0].value;
  formData.append("rol", document.getElementsByName("rol")[0].value);
  formData.append("documento", document.getElementsByName("documento")[0].value);
  var documento = document.getElementsByName("documento")[0].value;
  formData.append("correo", document.getElementsByName("correo")[0].value);
  var correo = document.getElementsByName("correo")[0].value;
  formData.append("telefono", document.getElementsByName("telefono")[0].value);
  var telefono = document.getElementsByName("telefono")[0].value;
  formData.append("direccion", document.getElementsByName("direccion")[0].value);
  var direccion = document.getElementsByName("direccion")[0].value;
  formData.append("pais", document.getElementsByName("Pais")[0].value);
  var pais = document.getElementsByName("Pais")[0].value;
  formData.append("ciudad", document.getElementsByName("ciudad")[0].value);
  var ciudad = document.getElementsByName("ciudad")[0].value;
  formData.append("usuario", document.getElementsByName("documento")[0].value);
  formData.append("clave", document.getElementsByName("documento")[0].value);
  if (nombre.length > 0 && documento.length > 0 && correo.length > 0 && telefono.length > 0 && direccion.length > 0 && pais.length < 4 && ciudad.length > 0) {
    swal({
        title: "Registro de Usuario",
        text: "Estas seguro de registrar un nuevo usuario!",
        icon: "success",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          var ruta = routesAppPlatform() + 'usuarios/core/registrarEmpleado.php';
          sendEventFormDataApp('POST', ruta, formData, '#smgEmpleado');
        }
      });
  } else {
    swal({
      title: "Error de validación",
      text: "Actualmente hay campos obligatorios pendientes!",
      icon: "warning",
      button: false,
      timer: 6000
    });
    $("#smgEmpleado").html("Actualmente hay campos obligatorios pendientes");
  }
  return false;
});
function modificarUsuario() {
  var nombre = document.getElementsByName("nombre")[0].value;
  var documento = document.getElementsByName("documento")[0].value;
  var ciudad = document.getElementsByName("ciudad")[0].value;
  var correo = document.getElementsByName("correo")[0].value;
  var telefono = document.getElementsByName("telefono")[0].value;
  var direccion = document.getElementsByName("direccion")[0].value;
  var ciudad = document.getElementsByName("ciudad")[0].value;
    if ( nombre.length > 0  && documento.length > 0  && ciudad.length > 0  && correo.length > 0 && 
      telefono.length > 0 &&  direccion.length > 0  ) {
        swal({
          title: "Modificación Usuario",
          text: "Esta Seguro de Modificar  la Ficha de Usuario?",
          icon: "success",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            sendEventApp('POST', routesAppPlatform() + 'usuarios/core/modificarEmpleado.php',
            params = {
              "nombre": document.getElementsByName("nombre")[0].value,
              "rol": document.getElementsByName("rol")[0].value,
              "documento": document.getElementsByName("documento")[0].value,
              "ciudad": document.getElementsByName("ciudad")[0].value,
              "correo": document.getElementsByName("correo")[0].value,
              "telefono": document.getElementsByName("telefono")[0].value,
              "direccion": document.getElementsByName("direccion")[0].value,
              "idempleado": document.getElementsByName("idempleado")[0].value
            }, '#smgEmpleado');
          } 
        });
      } else {
        swal({title: "Tenemos un problema!",
        text: "Actualmente hay campos obligatorios en el formulario sin diligenciar!",
        icon: "warning",
        button: false, 
        timer: 6000 });
        $("#smgEmpleado").html("Actualmente hay campos obligatorios en el formulario sin diligenciar ");
      }
      return false;
}
$(document).on('click', '#buscarUsuario', function (e) {
  sendEventApp('POST', routesAppPlatform() + 'usuarios/core/consultaUsuario.php',
    params = {
      "buscar": document.getElementsByName("buscar")[0].value,
      "estado": document.getElementsByName("estado")[0].value
    }, '#tablaDinamica_panel');
  return false;
});
$(document).on('click', '#autentificacion', function (e) {
  swal({
      title: "Autenticación Usuario",
      text: "Esta seguro de modificar la autenticación del usuario? ",
      icon: "success",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        sendEventApp('POST', routesAppPlatform() + 'usuarios/core/autentificacion.php',
          params = {
            "usuario": document.getElementsByName("usuario")[0].value,
            "clave": document.getElementsByName("clave")[0].value,
            "idempleado": document.getElementsByName("idempleado")[0].value
          }, '#smgSesion');
      }
    });
  return false;
});

$(document).on('click', '#inhabilitarUsuario', function (e) {
  swal({
      title: "Autenticación Usuario",
      text: "Esta seguro de desactivar el usuario ",
      icon: "success",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        sendEventApp('POST', routesAppPlatform() + 'usuarios/core/desactivar.php',
          params = {
            "idempleado": document.getElementsByName("idempleado")[0].value,
          }, '#smgEmpleado');
      }
    });
  return false;
});

$(document).on('click', '#habilitarUsuario', function (e) {
  swal({
      title: "Autenticación Usuario",
      text: "Esta seguro de activar el usuario ",
      icon: "success",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        sendEventApp('POST', routesAppPlatform() + 'usuarios/core/activar.php',
          params = {
            "idempleado": document.getElementsByName("idempleado")[0].value,
          }, '#smgEmpleado');
      }
    });
  return false;
});
