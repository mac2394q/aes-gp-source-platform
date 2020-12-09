/*  Eventos para modulo de sesion. */
$(document).on('click','#registraralcance',function(e){

    var formData = new FormData();
    formData.append("id_alcance", document.getElementsByName("id_alcance")[0].value);
    formData.append("nombre_alcance", document.getElementsByName("nombre_alcance")[0].value);
    formData.append("estado_alcance", document.getElementsByName("estado_alcance")[0].value);

    var ruta = routesAppPlatform() + 'alcance/core/registraralcance.php';
    sendEventFormDataApp('POST', ruta, formData, '#smgalcance');

       return false;
  
   });

   /*  Eventos para modulo de sesion. */
$(document).on('click','#registraralcance',function(e){

    var formData = new FormData();
    formData.append("id_alcance", document.getElementsByName("id_alcance")[0].value);
    formData.append("nombre_alcance", document.getElementsByName("nombre_alcance")[0].value);
    formData.append("estado_alcance", document.getElementsByName("estado_alcance")[0].value);

    var ruta = routesAppPlatform() + 'alcance/core/registraralcance.php';
    sendEventFormDataApp('POST', ruta, formData, '#smgalcance');

       return false;
  
   });