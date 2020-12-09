/*  Eventos para modulo de sesion. */
$(document).on('click','#registrarimplementacion_colaboracion',function(e){

    var formData = new FormData();
    formData.append("id_implementacion_item_proyecto", document.getElementsByName("id_implementacion_item_proyecto")[0].value);
    formData.append("id_colaborador_implementacion", document.getElementsByName("id_colaborador_implementacion")[0].value);

    var ruta = routesAppPlatform() + 'implementacion_colaboracion/core/registrarimplementacion_colaboracion.php';
    sendEventFormDataApp('POST', ruta, formData, '#smgimplementacion_colaboracion');

       return false;
  
   });
   /*  Eventos para modulo de sesion. */
$(document).on('click','#registrarimplementacion_colaboracion',function(e){

    var formData = new FormData();
    formData.append("id_implementacion_item_proyecto", document.getElementsByName("id_implementacion_item_proyecto")[0].value);
    formData.append("id_colaborador_implementacion", document.getElementsByName("id_colaborador_implementacion")[0].value);

    var ruta = routesAppPlatform() + 'implementacion_colaboracion/core/registrarimplementacion_colaboracion.php';
    sendEventFormDataApp('POST', ruta, formData, '#smgimplementacion_colaboracion');

       return false;
  
   });