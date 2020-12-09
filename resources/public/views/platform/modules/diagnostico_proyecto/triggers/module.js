/*  Eventos para modulo de sesion. */
$(document).on('click','#registrardiagnostico',function(e){

    var formData = new FormData();
    formData.append("id_diagnostico_item_proyecto", document.getElementsByName("id_diagnostico_item_proyecto")[0].value);
    formData.append("id_proyecto", document.getElementsByName("id_proyecto")[0].value);
    formData.append("id_item_grupo_plantilla_alcance", document.getElementsByName("id_item_grupo_plantilla_alcance")[0].value);
    formData.append("comentario_dliagnostico", document.getElementsByName("comentario_dliagnostico")[0].value);
    formData.append("estado_diagnostico", document.getElementsByName("estado_diagnostico")[0].value);

    var ruta = routesAppPlatform() + 'diagnostico_proyecto/core/registrardiagnostico.php';
    sendEventFormDataApp('POST', ruta, formData, '#smgdiagnostico');

       return false;
  
   });
   /*  Eventos para modulo de sesion. */
$(document).on('click','#registrardiagnostico',function(e){

    var formData = new FormData();
    formData.append("id_diagnostico_item_proyecto", document.getElementsByName("id_diagnostico_item_proyecto")[0].value);
    formData.append("id_proyecto", document.getElementsByName("id_proyecto")[0].value);
    formData.append("id_item_grupo_plantilla_alcance", document.getElementsByName("id_item_grupo_plantilla_alcance")[0].value);
    formData.append("comentario_dliagnostico", document.getElementsByName("comentario_dliagnostico")[0].value);
    formData.append("estado_diagnostico", document.getElementsByName("estado_diagnostico")[0].value);

    var ruta = routesAppPlatform() + 'diagnostico_proyecto/core/registrardiagnostico.php';
    sendEventFormDataApp('POST', ruta, formData, '#smgdiagnostico');

       return false;
  
   });