
$(document).on('click', '#registrarEmpresa', function (e) {
  var formData = new FormData();
  var words = [
    document.getElementsByName("pais")[0].value,
    document.getElementsByName("grupo")[0].value,
    document.getElementsByName("razonSocial")[0].value,
    document.getElementsByName("nit")[0].value,
    document.getElementsByName("departamento")[0].value,
    document.getElementsByName("ciudad")[0].value,
    document.getElementsByName("direccion")[0].value,
    document.getElementsByName("naturaleza")[0].value,
    document.getElementsByName("telefono")[0].value,
    document.getElementsByName("emailEmpresarial")[0].value,
    document.getElementsByName("representanteLegal")[0].value,
    document.getElementsByName("cargoRepresentante")[0].value,
    document.getElementsByName("telefonoRepresentante")[0].value,
    document.getElementsByName("emailContacto")[0].value,
    document.getElementsByName("representanteLegal2")[0].value,
    document.getElementsByName("cargoRepresentante2")[0].value,
    document.getElementsByName("telefonoRepresentante2")[0].value,
    document.getElementsByName("emailContacto2")[0].value
  ];
  if (validarionResumen(words) > 1) {
    swal({title: "Tenemos un problema!",
	  text: "Actualmente hay campos obligatorios en el formulario sin diligenciar!",
	  icon: "warning",
	  button: false, 
	  timer: 6000 });
    $("#smgtrabajo").html("Actualmente hay campos obligatorios en el formulario sin diligenciar ");
  } else {
  formData.append("pais", document.getElementsByName("pais")[0].value);
  formData.append("grupo", document.getElementsByName("grupo")[0].value);
  formData.append("razonSocial", document.getElementsByName("razonSocial")[0].value);
  formData.append("nit", document.getElementsByName("nit")[0].value);
  formData.append("departamento", document.getElementsByName("departamento")[0].value);
  formData.append("ciudad", document.getElementsByName("ciudad")[0].value);
  formData.append("direccion", document.getElementsByName("direccion")[0].value);
  formData.append("naturaleza", document.getElementsByName("naturaleza")[0].value);
  formData.append("telefono", document.getElementsByName("telefono")[0].value);
  formData.append("emailEmpresarial", document.getElementsByName("emailEmpresarial")[0].value);
  formData.append("representanteLegal", document.getElementsByName("representanteLegal")[0].value);
  formData.append("cargoRepresentante", document.getElementsByName("cargoRepresentante")[0].value);
  formData.append("telefonoRepresentante", document.getElementsByName("telefonoRepresentante")[0].value);
  formData.append("emailContacto", document.getElementsByName("emailContacto")[0].value);
  formData.append("representanteLegal2", document.getElementsByName("representanteLegal2")[0].value);
  formData.append("cargoRepresentante2", document.getElementsByName("cargoRepresentante2")[0].value);
  formData.append("telefonoRepresentante2", document.getElementsByName("telefonoRepresentante2")[0].value);
  formData.append("emailContacto2", document.getElementsByName("emailContacto2")[0].value);
  formData.append("link", document.getElementsByName("link")[0].value);
  formData.append("usuario", document.getElementsByName("usuario")[0].value);
  formData.append("clave", document.getElementsByName("clave")[0].value);
  formData.append("rut", $('#rut')[0].files[0]);
  formData.append("camara", $('#camara')[0].files[0]);
  formData.append("legal", $('#legal')[0].files[0]);
  formData.append("comercial", $('#comercial')[0].files[0]);
  formData.append("antecedentes", $('#antecedentes')[0].files[0]);
  swal({
    title: "Registro de empresa",
    text: "Esta seguro de registrar la empresa?",
    icon: "success",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      var ruta = routesAppPlatform() + 'empresa/core/registrarEmpresa.php';
  sendEventFormDataApp('POST', ruta, formData, '#smgtrabajo');
  
    } 
  });
  
  return false;
  }
});
// function modificarEmpresa() {
    
//     sendEventApp('POST', routesAppPlatform() + 'empresa/core/modificarEmpresa.php',
//       params = {
//           "grupo": document.getElementsByName("grupo")[0].value,
//           "razonSocial": document.getElementsByName("razonSocial")[0].value,
//           "nit": document.getElementsByName("nit")[0].value,
//           "ciudad": document.getElementsByName("ciudad")[0].value,
//           "departamento": document.getElementsByName("departamento")[0].value,
//           "direccion": document.getElementsByName("direccion")[0].value,
//           "telefono": document.getElementsByName("telefono")[0].value,
//           "emailEmpresarial": document.getElementsByName("emailEmpresarial")[0].value,
//           "representanteLegal": document.getElementsByName("representanteLegal")[0].value,
//           "cargoRepresentante": document.getElementsByName("cargoRepresentante")[0].value,
//           "telefonoRepresentante": document.getElementsByName("telefonoRepresentante")[0].value,
//           "emailContacto": document.getElementsByName("emailContacto")[0].value,
//           "representanteLegal2": document.getElementsByName("representanteLegal2")[0].value,
//           "cargoRepresentante2": document.getElementsByName("cargoRepresentante2")[0].value,
//           "telefonoRepresentante2": document.getElementsByName("telefonoRepresentante2")[0].value,
//           "emailContacto2": document.getElementsByName("emailContacto2")[0].value,
//           "link": document.getElementsByName("link")[0].value,
//           "usuario": document.getElementsByName("usuario")[0].value,
//           "idempresa": document.getElementsByName("idempresa")[0].value
//       }, '#smgEmpresa');
// }


function modificarEmpresa() {

  var grupo = document.getElementsByName("grupo")[0].value;
  var razonSocial = document.getElementsByName("razonSocial")[0].value;
  var nit = document.getElementsByName("nit")[0].value;
  var departamento = document.getElementsByName("departamento")[0].value;
  var ciudad = document.getElementsByName("ciudad")[0].value;
  var direccion = document.getElementsByName("direccion")[0].value;
  var naturaleza = document.getElementsByName("naturaleza")[0].value;
  var telefono = document.getElementsByName("telefono")[0].value;
  var emailEmpresarial = document.getElementsByName("emailEmpresarial")[0].value;
  var representanteLegal = document.getElementsByName("representanteLegal")[0].value;
  var cargoRepresentante = document.getElementsByName("cargoRepresentante")[0].value;
  var telefonoRepresentante = document.getElementsByName("telefonoRepresentante")[0].value;
  var emailContacto = document.getElementsByName("emailContacto")[0].value;
  var representanteLegal2 = document.getElementsByName("representanteLegal2")[0].value;
  var cargoRepresentante2 = document.getElementsByName("cargoRepresentante2")[0].value;
  var telefonoRepresentante2 = document.getElementsByName("telefonoRepresentante2")[0].value;
  var emailContacto2 = document.getElementsByName("emailContacto2")[0].value;

 

  if ( grupo.length > 0  && razonSocial.length > 0  && nit.length > 0  && departamento.length > 0 && 
    ciudad.length > 0 &&  direccion.length > 0 &&  naturaleza.length > 0 && telefono.length > 0 && 
    emailEmpresarial.length > 0 && representanteLegal.length > 0 &&  cargoRepresentante.length > 0 && telefonoRepresentante.length > 0 &&
    emailContacto.length > 0 && representanteLegal2.length > 0 &&  cargoRepresentante2.length > 0 && telefonoRepresentante2.length > 0 &&
    emailContacto2.length ) {
      swal({
        title: "Modificar de empresa",
        text: "Esta seguro de Modificar  la Ficha de Empresa!",
        icon: "success",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          sendEventApp('POST', routesAppPlatform() + 'empresa/core/modificarEmpresa.php',
          params = {
            "grupo": document.getElementsByName("grupo")[0].value,
            "razonSocial": document.getElementsByName("razonSocial")[0].value,
            "nit": document.getElementsByName("nit")[0].value,
            "ciudad": document.getElementsByName("ciudad")[0].value,
            "departamento": document.getElementsByName("departamento")[0].value,
            "direccion": document.getElementsByName("direccion")[0].value,
            "telefono": document.getElementsByName("telefono")[0].value,
            "emailEmpresarial": document.getElementsByName("emailEmpresarial")[0].value,
            "representanteLegal": document.getElementsByName("representanteLegal")[0].value,
            "cargoRepresentante": document.getElementsByName("cargoRepresentante")[0].value,
            "telefonoRepresentante": document.getElementsByName("telefonoRepresentante")[0].value,
            "emailContacto": document.getElementsByName("emailContacto")[0].value,
            "representanteLegal2": document.getElementsByName("representanteLegal2")[0].value,
            "cargoRepresentante2": document.getElementsByName("cargoRepresentante2")[0].value,
            "telefonoRepresentante2": document.getElementsByName("telefonoRepresentante2")[0].value,
            "emailContacto2": document.getElementsByName("emailContacto2")[0].value,
            "link": document.getElementsByName("link")[0].value,
            "usuario": document.getElementsByName("usuario")[0].value,
            "idempresa": document.getElementsByName("idempresa")[0].value,
            "pais": document.getElementsByName("pais")[0].value
            
           }, '#smgtrabajo');
        } 
      });
      return false;
    
    } else {
    swal({title: "Tenemos un problema!",
	  text: "Actualmente hay campos obligatorios en el formulario sin diligenciar!",
	  icon: "warning",
	  button: false, 
	  timer: 6000 });
    $("#smgtrabajo").html("Actualmente hay campos obligatorios en el formulario sin diligenciar ");
      
    }
}


$(document).on('click', '#modificarGrupoEmpresa', function (e) {
  sendEventApp('POST', routesAppPlatform() + 'empresa/core/modificarEmpresa.php',
    params = {
      "idempresa": document.getElementsByName("idempresa")[0].value,
      "idgrupo": document.getElementsByName("idgrupo")[0].value
    }, '#smg');
  return false;
});
$(document).on('click', '#modificarSesionEmpresa', function (e) {
  sendEventApp('POST', routesAppPlatform() + 'empresa/core/modificarEmpresa.php',
    params = {
      "idsesion": document.getElementsByName("idempresa")[0].value,
      "usuario": document.getElementsByName("usuario")[0].value,
      "clave": document.getElementsByName("clave")[0].value
    }, '#smg');
  return false;
});
$(document).on('click', '#modificarAreaEmpresa', function (e) {
  sendEventApp('POST', routesAppPlatform() + 'empresa/core/modificarEmpresa.php',
    params = {
      "idempresa": document.getElementsByName("idempresa")[0].value,
      "idarea": document.getElementsByName("idarea")[0].value
    }, '#smg');
  return false;
});
$(document).on('click', '#autentificacion', function (e) {
  sendEventApp('POST', routesAppPlatform() + 'empresa/core/autentificacionEmpresa.php',
    params = {
      "usuario": document.getElementsByName("usuario")[0].value,
      "clave": document.getElementsByName("clave")[0].value,
      "idusuario": document.getElementsByName("idusuario")[0].value,
      "idempresa": document.getElementsByName("idempresa")[0].value
    }, '#smgSesion');
  return false;
});
$(document).on('click', '#autentificacion2', function (e) {
  sendEventApp('POST', routesAppPlatform() + 'empresa/core/autentificacionGrupo.php',
    params = {
      "usuario": document.getElementsByName("usuario")[0].value,
      "clave": document.getElementsByName("clave")[0].value,
      "idusuario": document.getElementsByName("idusuario")[0].value,
      "idempresa": document.getElementsByName("idempresa")[0].value
    }, '#smgSesion');
  return false;
});
$(document).on('click', '#registrarGrupo', function (e) {
  swal({
    title: "Registro de grupo empresarial",
    text: "Esta seguro de registrar el grupo empresarial!",
    icon: "success",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      sendEventApp('POST', routesAppPlatform() + 'empresa/core/registrarGrupo.php',
      params = {
        "etiqueta": document.getElementsByName("fname")[0].value
      }, '#smgGrupo');
  
    } 
  });
 
  return false;
});
$(document).on('click', '#eliminarEmpresa', function (e) {
  swal({
    title: "Eliminar Empresa",
    text: "Esta seguro de eliminar la ficha de empresa ",
    icon: "success",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      sendEventApp('POST', routesAppPlatform() + 'empresa/core/eliminarEmpresa.php',
      params = {
        "id": document.getElementsByName("idempresa")[0].value
      }, '#smgEmpresa');
    } 
  });
  return false;
});
$(document).on('click', '#eliminarGrupo', function (e) {
  swal({
    title: "Eliminar Grupo",
    text: "Esta seguro de eliminar la ficha del grupo ",
    icon: "success",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      sendEventApp('POST', routesAppPlatform() + 'empresa/core/eliminarGrupo.php',
      params = {
        "id": document.getElementsByName("idgrupo")[0].value
      }, '#smgPlantilla');
    } 
  });
  return false;
});
$(document).on('click', '#buscarGrupo', function (e) {
  sendEventApp('POST', routesAppPlatform() + 'empresa/core/consultaGrupo.php',
    params = {
      "buscar": document.getElementsByName("buscar")[0].value
    }, '#tablaDinamica_panel');
  return false;
});
$(document).on('click', '#buscarEmpresa', function (e) {
  sendEventApp('POST', routesAppPlatform() + 'empresa/core/consultaEmpresa.php',
    params = {
      "buscar": document.getElementsByName("buscar")[0].value,
      "ordenEmpresa": document.getElementsByName("ordenEmpresa")[0].value
    }, '#tablaDinamica_panel');
  return false;
});
$(document).on('click', '#d1', function (e) {
  var formData = new FormData();
  //console.log(document.getElementsByName("idcredito")[0].value+" -- "+$('#documento1')[0].files[0]);
  formData.append("s1", $('#s1')[0].files[0]);
  formData.append("idempresa", document.getElementsByName("idempresa")[0].value);
  sendEventFormDataApp('POST', routesAppPlatform() + 'empresa/core/documento1.php', formData, '#smgDocumentos1');
  return false;
});
$(document).on('click', '#d2', function (e) {
  var formData = new FormData();
  //console.log(document.getElementsByName("idcredito")[0].value+" -- "+$('#documento1')[0].files[0]);
  formData.append("s2", $('#s2')[0].files[0]);
  formData.append("idempresa", document.getElementsByName("idempresa")[0].value);
  sendEventFormDataApp('POST', routesAppPlatform() + 'empresa/core/documento2.php', formData, '#smgDocumentos2');
  return false;
});
$(document).on('click', '#d3', function (e) {
  var formData = new FormData();
  //console.log(document.getElementsByName("idcredito")[0].value+" -- "+$('#documento1')[0].files[0]);
  formData.append("s3", $('#s3')[0].files[0]);
  formData.append("idempresa", document.getElementsByName("idempresa")[0].value);
  sendEventFormDataApp('POST', routesAppPlatform() + 'empresa/core/documento3.php', formData, '#smgDocumentos3');
  return false;
});
$(document).on('click', '#d4', function (e) {
  var formData = new FormData();
  //console.log(document.getElementsByName("idcredito")[0].value+" -- "+$('#documento1')[0].files[0]);
  formData.append("s4", $('#s4')[0].files[0]);
  formData.append("idempresa", document.getElementsByName("idempresa")[0].value);
  sendEventFormDataApp('POST', routesAppPlatform() + 'empresa/core/documento4.php', formData, '#smgDocumentos4');
  return false;
});
$(document).on('click', '#d5', function (e) {
  var formData = new FormData();
  //console.log(document.getElementsByName("idcredito")[0].value+" -- "+$('#documento1')[0].files[0]);
  formData.append("s5", $('#s5')[0].files[0]);
  formData.append("idempresa", document.getElementsByName("idempresa")[0].value);
  sendEventFormDataApp('POST', routesAppPlatform() + 'empresa/core/documento5.php', formData, '#smgDocumentos5');
  return false;
});
