/*  Eventos para modulo de sesion. */
$(document).on('click','#registrarentidad',function(e){

    var formData = new FormData();
    formData.append("id_entidad", document.getElementsByName("id_entidad")[0].value);
    formData.append("tipo_entidad", document.getElementsByName("tipo_entidad")[0].value);
    formData.append("estado_entidad", document.getElementsByName("estado_entidad")[0].value);

    var ruta = routesAppPlatform() + 'entidad/core/registrarentidad.php';
    sendEventFormDataApp('POST', ruta, formData, '#smgentidad');

       return false;
  
   });
   /*  Eventos para modulo de sesion. */
$(document).on('click','#registrarentidad',function(e){

    var formData = new FormData();
    formData.append("id_entidad", document.getElementsByName("id_entidad")[0].value);
    formData.append("tipo_entidad", document.getElementsByName("tipo_entidad")[0].value);
    formData.append("estado_entidad", document.getElementsByName("estado_entidad")[0].value);

    var ruta = routesAppPlatform() + 'entidad/core/registrarentidad.php';
    sendEventFormDataApp('POST', ruta, formData, '#smgentidad');

       return false;
  
   });