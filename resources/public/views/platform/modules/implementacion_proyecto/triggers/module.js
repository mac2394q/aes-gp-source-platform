/*  Eventos para modulo de sesion. */
$(document).on('click','#registrarimplementacion',function(e){

    var formData = new FormData();
    formData.append("id_implementacion_item_proyecto", document.getElementsByName("id_implementacion_item_proyecto")[0].value);
    formData.append("id_item_grupo_plantilla_certificacion", document.getElementsByName("id_item_grupo_plantilla_certificacion")[0].value);
    formData.append("id_proyecto", document.getElementsByName("id_proyecto")[0].value);
    formData.append("comentario_implementacion", document.getElementsByName("comentario_implementacion")[0].value);
    formData.append("porcentaje_avance", document.getElementsByName("porcentaje_avance")[0].value);
    formData.append("fecha_comentario_implementacion", document.getElementsByName("fecha_comentario_implementacion")[0].value);
    formData.append("estado_implementacion", document.getElementsByName("estado_implementacion")[0].value);

    var ruta = routesAppPlatform() + 'implementacion_proyecto/core/registrarimplementacion.php';
    sendEventFormDataApp('POST', ruta, formData, '#smgimplementacion');

       return false;
  
   });
   /*  Eventos para modulo de sesion. */
$(document).on('click','#registrarimplementacion',function(e){

    var formData = new FormData();
    formData.append("id_implementacion_item_proyecto", document.getElementsByName("id_implementacion_item_proyecto")[0].value);
    formData.append("id_item_grupo_plantilla_certificacion", document.getElementsByName("id_item_grupo_plantilla_certificacion")[0].value);
    formData.append("id_proyecto", document.getElementsByName("id_proyecto")[0].value);
    formData.append("comentario_implementacion", document.getElementsByName("comentario_implementacion")[0].value);
    formData.append("porcentaje_avance", document.getElementsByName("porcentaje_avance")[0].value);
    formData.append("fecha_comentario_implementacion", document.getElementsByName("fecha_comentario_implementacion")[0].value);
    formData.append("estado_implementacion", document.getElementsByName("estado_implementacion")[0].value);

    var ruta = routesAppPlatform() + 'implementacion_proyecto/core/registrarimplementacion.php';
    sendEventFormDataApp('POST', ruta, formData, '#smgimplementacion');

       return false;
  
   });