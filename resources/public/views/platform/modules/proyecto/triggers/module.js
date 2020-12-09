/*  Eventos para modulo de sesion. */
$(document).on('click','#registrarproyecto',function(e){

    var formData = new FormData();
    formData.append("id_proyecto", document.getElementsByName("id_proyecto")[0].value);
    formData.append("id_trabajo_proyecto", document.getElementsByName("id_trabajo_proyecto")[0].value);
    formData.append("id_plantilla_alcance_proyecto", document.getElementsByName("id_plantilla_alcance_proyecto")[0].value);
    formData.append("estado_proyecto", document.getElementsByName("estado_proyecto")[0].value);

    var ruta = routesAppPlatform() + 'proyecto/core/registrarproyecto.php';
    sendEventFormDataApp('POST', ruta, formData, '#smgproyecto');

       return false;
  
   });
   /*  Eventos para modulo de sesion. */
$(document).on('click','#registrarproyecto',function(e){

    var formData = new FormData();
    formData.append("id_proyecto", document.getElementsByName("id_proyecto")[0].value);
    formData.append("id_trabajo_proyecto", document.getElementsByName("id_trabajo_proyecto")[0].value);
    formData.append("id_plantilla_alcance_proyecto", document.getElementsByName("id_plantilla_alcance_proyecto")[0].value);
    formData.append("estado_proyecto", document.getElementsByName("estado_proyecto")[0].value);

    var ruta = routesAppPlatform() + 'proyecto/core/registrarproyecto.php';
    sendEventFormDataApp('POST', ruta, formData, '#smgproyecto');

       return false;
  
   });