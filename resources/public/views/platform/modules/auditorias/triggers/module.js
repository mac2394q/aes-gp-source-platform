
$(document).on('click','#empresaAncla',function(e){

  // var nombre  = document.getElementsByName("empresaAncla")[0].value;
  // var res=nombre.replace("car[0][", "");
  // res=nombre.replace("]", "");
  // console.log(res);
  // var href = $(this).attr('name');
  // console.log(href );
  // var res=href.replace("car[", "");
  // res=res.replace("]", "");
  // res=res.replace("empresaAncla", "");
  // res=res.replace("[]", "");
  //console.log(document.getElementById("empresaAncla")[0].value);
  sendEventApp('POST',routesAppPlatform()+'auditorias/core/empresaAnclaAsociada.php',
    params = {
       "idempresa" : document.getElementsByName("empresaAncla")[0].value
     },'#EmpresaDiv');
     
     return false;
   
});
$(document).on('click','#empresaAso',function(e){
  sendEventApp('POST',routesAppPlatform()+'auditorias/core/sedesEmpresa.php',
    params = {
       "empresaAso" : document.getElementsByName("empresaAso")[0].value
     },'#sedeDiv');

     sendEventApp('POST',routesAppPlatform()+'auditorias/core/plantillaEmpresa.php',
     params = {
        "empresaAso" : document.getElementsByName("empresaAso")[0].value
      },'#plantillaAso');

    
     //alert(document.getElementsByName("empresaAso")[0].value);
     return false;
   
});
$(document).on('click','#calendarioAuditor',function(e){
  sendEventApp('POST',routesAppPlatform()+'auditorias/core/modalCalendarioAuditoria.php',
    params = {
       "auditor" : document.getElementsByName("auditorTop")[0].value,
       "fecha" : document.getElementsByName("fechaTop")[0].value
     },'#calendarioDiv');
     return false;
   
});
$(document).on('click','#verificar_auditoria_disponibilidad',function(e){
    document.getElementsByName("fechaTop")[0].value = document.getElementsByName("fechax")[0].value;
    document.getElementsByName("fecha")[0].value = document.getElementsByName("fechax")[0].value;
  sendEventApp('POST',routesAppPlatform()+'auditorias/core/reConsultaVerificacion.php',
    params = {
       "auditor" : document.getElementsByName("auditorTop")[0].value,
       "fecha" : document.getElementsByName("fechax")[0].value
     },'#resultadoVerificacion');
     
     return false;
   
});
$(document).on('click','#auditor',function(e){
  if(document.getElementsByName("auditor")[0].value != "no"){
    sendEventApp('POST',routesAppPlatform()+'auditorias/core/informacionAuditor.php',
    params = {
       "auditor" : document.getElementsByName("auditor")[0].value
     },'#informacionAuditor');
  }
  
     return false;
   
});


$(document).on('click','#finalizarAuditoria',function(e){
 
    sendEventApp('POST',routesAppPlatform()+'auditorias/core/finalizarAuditoria.php',
    params = {
       "idauditoria" : document.getElementsByName("idauditoria")[0].value,
     },'#smgAuditoria');
  
  
     return false;
   
});

$(document).on('click','#validarElementoPlan',function(e){

  var formData = new FormData();
  
  var href = $(this).attr('href').replace("#","");

  formData.append("id", href);
  formData.append("accion", document.getElementsByName("accion"+href)[0].value);
  formData.append("responsable", document.getElementsByName("responsable"+href)[0].value);
  formData.append("fecha", document.getElementsByName("fecha"+href)[0].value);
  formData.append("porcentaje", document.getElementsByName("porcentaje"+href)[0].value);
  formData.append("file", $("#file"+href)[0].files[0]);
  
  // console.log(href);
  // console.log(document.getElementsByName("responsable1")[0].value);
  // console.log(document.getElementsByName("responsable4")[0].value);

  var ruta = routesAppPlatform() + 'auditorias/core/registrarItemPlan.php';

  sendEventFormDataApp('POST', ruta, formData, '#respuesta'+href);
    // sendEventApp('POST',routesAppPlatform()+'auditorias/core/observacionAuditor.php',
    // params = {
    //    "iditem" : href,
    //    "estado" : estado,
    //    "observacion" : observacion
    //  },'#respuesta'+href);
  
  
     return false;
   
});


$(document).on('click','#validarElemento',function(e){

 
  var href = $(this).attr('href').replace("#","");
  var estado = document.getElementsByName("estado"+href)[0].value;
  var observacion = document.getElementsByName("textarea"+href)[0].value;
  console.log(href);
  console.log(estado);
  console.log(observacion);

    sendEventApp('POST',routesAppPlatform()+'auditorias/core/observacionAuditor.php',
    params = {
       "iditem" : href,
       "estado" : estado,
       "observacion" : observacion
     },'#respuesta'+href);
  
  
     return false;
   
});

$(document).on('click','#validarElemento2',function(e){

 
  var href = $(this).attr('href').replace("#","");

  var observacion = document.getElementsByName("textarea"+href)[0].value;
  console.log(href);

  console.log(observacion);

    sendEventApp('POST',routesAppPlatform()+'auditorias/core/observacionEmpresa.php',
    params = {
      "iditem" : href,
    
      "observacion" : observacion
     },'#respuesta2'+href);
  
  
     return false;
   
});


$(document).on('click', '#registrarAuditoria', function (e) {
  //$("#smgLogin").html("");
  //alert(routesAppPlatform()+'sesion/core/validaSesion.php');
  var formData = new FormData();
  formData.append("idusuario", document.getElementsByName("usuario")[0].value);
  formData.append("idauditor", document.getElementsByName("auditor")[0].value);
  formData.append("fecha", document.getElementsByName("fechaTop")[0].value);
  formData.append("idplantilla", document.getElementsByName("plantilla")[0].value);
  formData.append("empresaAncla", document.getElementsByName("empresaAncla")[0].value);
  formData.append("empresaAso", document.getElementsByName("empresaAso")[0].value);
  formData.append("sede", document.getElementsByName("sede")[0].value);

  var ruta = routesAppPlatform() + 'auditorias/core/registrarAuditoria.php';

  sendEventFormDataApp('POST', ruta, formData, '#smgAuditoria');
  return false;
});


$(document).on('click', '#registrarAuditoriaPre', function (e) {
  //$("#smgLogin").html("");
  //alert(routesAppPlatform()+'sesion/core/validaSesion.php');
  var formData = new FormData();
  formData.append("idusuario", document.getElementsByName("usuario")[0].value);
  formData.append("idauditor", document.getElementsByName("auditor")[0].value);
  formData.append("fecha", document.getElementsByName("fechaTop")[0].value);
  formData.append("idplantilla", document.getElementsByName("plantilla")[0].value);
  formData.append("empresaAncla", document.getElementsByName("empresaAncla")[0].value);
  formData.append("empresaAso", document.getElementsByName("empresaAso")[0].value);
  formData.append("sede", document.getElementsByName("sede")[0].value);

  var ruta = routesAppPlatform() + 'auditorias/core/registrarAuditoria.php';

  sendEventFormDataApp('POST', ruta, formData, '#smgAuditoria');
  return false;
});


$(document).on('click', '#modificarAuditoriaReporte', function (e) {
  //$("#smgLogin").html("");
  //alert(routesAppPlatform()+'sesion/core/validaSesion.php');
  var formData = new FormData();
  formData.append("idauditoria", document.getElementsByName("idauditoria")[0].value);
  formData.append("objetivo_auditoria", document.getElementsByName("objetivo_auditoria")[0].value);
  formData.append("criterio_auditoria", document.getElementsByName("criterio_auditoria")[0].value);
  formData.append("direccion_auditor", document.getElementsByName("direccion_auditor")[0].value);
  formData.append("observacion_auditoria", document.getElementsByName("observacion_auditoria")[0].value);
  formData.append("descripcion_auditoria", document.getElementsByName("descripcion_auditoria")[0].value);
  formData.append("localidad_auditoria", document.getElementsByName("localidad_auditoria")[0].value);
  formData.append("mapa_localizacion", document.getElementsByName("mapa_localizacion")[0].value);
  formData.append("descripcion_condiciones_entorno_auditoria", document.getElementsByName("descripcion_condiciones_entorno_auditoria")[0].value);
  formData.append("descripcion_condiciones_seguridad", document.getElementsByName("descripcion_condiciones_seguridad")[0].value);
  formData.append("actividades", document.getElementsByName("actividades")[0].value);
  formData.append("comentarios_auditor", document.getElementsByName("comentarios_auditor")[0].value);
  formData.append("recomendacion_auditor", document.getElementsByName("recomendacion_auditor")[0].value);

  // console.log(document.getElementsByName("objetivo_auditoria")[0].value);
  // console.log(document.getElementsByName("criterio_auditoria")[0].value);
  var ruta = routesAppPlatform() + 'auditorias/core/modificarAuditoria.php';
//   for (var value of formData.values()) {
//     console.log(value); 
//  }
  sendEventFormDataApp('POST', ruta, formData, '#smgReporte');
  return false;
});

