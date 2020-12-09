/*  Eventos para modulo de sesion. */
$(document).on('click','#registraritem',function(e){

    var formData = new FormData();
    formData.append("item_grupo_plantilla_certificacion", document.getElementsByName("item_grupo_plantilla_certificacion")[0].value);
    formData.append("item_grupo_plantilla_cerrtificacion", document.getElementsByName("item_grupo_plantilla_cerrtificacion")[0].value);
    formData.append("etiqueta_item_grupo_plantilla", document.getElementsByName("etiqueta_item_grupo_plantilla")[0].value);
    formData.append("descripcion_item_grupo_plantilla", document.getElementsByName("descripcion_item_grupo_plantilla")[0].value);

    var ruta = routesAppPlatform() + 'item_grupo_plantilla_alcance/core/registraritem.php';
    sendEventFormDataApp('POST', ruta, formData, '#smgitem');

       return false;
  
   });

   /*  Eventos para modulo de sesion. */
$(document).on('click','#registraritem',function(e){

    var formData = new FormData();
    formData.append("item_grupo_plantilla_certificacion", document.getElementsByName("item_grupo_plantilla_certificacion")[0].value);
    formData.append("item_grupo_plantilla_cerrtificacion", document.getElementsByName("item_grupo_plantilla_cerrtificacion")[0].value);
    formData.append("etiqueta_item_grupo_plantilla", document.getElementsByName("etiqueta_item_grupo_plantilla")[0].value);
    formData.append("descripcion_item_grupo_plantilla", document.getElementsByName("descripcion_item_grupo_plantilla")[0].value);
    formData.append("telefono", document.getElementsByName("telefono")[0].value);
    formData.append("direccion", document.getElementsByName("direccion")[0].value);

    var ruta = routesAppPlatform() + 'item_grupo_plantilla_alcance/core/registraritem.php';
    sendEventFormDataApp('POST', ruta, formData, '#smgitem');

       return false;
  
   });