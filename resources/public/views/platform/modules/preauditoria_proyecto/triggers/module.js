/*  Eventos para modulo de sesion. */
$(document).on('click','#registrarpreauditoria',function(e){

    var formData = new FormData();
    formData.append("id_preauditoria_item_proyecto", document.getElementsByName("id_preauditoria_item_proyecto")[0].value);
    formData.append("id_item_grupo_plantilla_certificacion", document.getElementsByName("id_item_grupo_plantilla_certificacion")[0].value);
    formData.append("id_proyecto", document.getElementsByName("id_proyecto")[0].value);
    formData.append("comentario_preauditoria", document.getElementsByName("comentario_preauditoria")[0].value);
    formData.append("estado_preauditoria", document.getElementsByName("estado_preauditoria")[0].value);

    var ruta = routesAppPlatform() + 'preauditoria_proyecto/core/registrarpreauditoria.php';
    sendEventFormDataApp('POST', ruta, formData, '#smgpreauditoria');

       return false;
  
   });

   /*  Eventos para modulo de sesion. */
$(document).on('click','#registrarpreauditoria',function(e){

    var formData = new FormData();
    formData.append("id_preauditoria_item_proyecto", document.getElementsByName("id_preauditoria_item_proyecto")[0].value);
    formData.append("id_item_grupo_plantilla_certificacion", document.getElementsByName("id_item_grupo_plantilla_certificacion")[0].value);
    formData.append("id_proyecto", document.getElementsByName("id_proyecto")[0].value);
    formData.append("comentario_preauditoria", document.getElementsByName("comentario_preauditoria")[0].value);
    formData.append("estado_preauditoria", document.getElementsByName("estado_preauditoria")[0].value);

    var ruta = routesAppPlatform() + 'preauditoria_proyecto/core/registrarpreauditoria.php';
    sendEventFormDataApp('POST', ruta, formData, '#smgpreauditoria');

       return false;
  
   });