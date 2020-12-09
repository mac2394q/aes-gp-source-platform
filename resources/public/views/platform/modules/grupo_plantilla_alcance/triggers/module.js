/*  Eventos para modulo de sesion. */
$(document).on('click','#registrargrupo_plantilla',function(e){

    var formData = new FormData();
    formData.append("id_grupo_plantilla_alcance", document.getElementsByName("id_grupo_plantilla_alcance")[0].value);
    formData.append("id_plantilla_alcance", document.getElementsByName("id_plantilla_alcance")[0].value);
    formData.append("documento", document.getElementsByName("documento")[0].value);
    formData.append("etiqueta_grupo_plantilla", document.getElementsByName("etiqueta_grupo_plantilla")[0].value);
    formData.append("titulo_grupo_plantilla", document.getElementsByName("titulo_grupo_plantilla")[0].value);

    var ruta = routesAppPlatform() + 'grupo_plantilla_alcance/core/registrargrupo_plantilla.php';
    sendEventFormDataApp('POST', ruta, formData, '#smggrupo_plantilla');

       return false;
  
   });
   /*  Eventos para modulo de sesion. */
$(document).on('click','#registrargrupo_plantilla',function(e){

    var formData = new FormData();
    formData.append("id_grupo_plantilla_alcance", document.getElementsByName("id_grupo_plantilla_alcance")[0].value);
    formData.append("id_plantilla_alcance", document.getElementsByName("id_plantilla_alcance")[0].value);
    formData.append("documento", document.getElementsByName("documento")[0].value);
    formData.append("etiqueta_grupo_plantilla", document.getElementsByName("etiqueta_grupo_plantilla")[0].value);
    formData.append("titulo_grupo_plantilla", document.getElementsByName("titulo_grupo_plantilla")[0].value);

    var ruta = routesAppPlatform() + 'grupo_plantilla_alcance/core/registrargrupo_plantilla.php';
    sendEventFormDataApp('POST', ruta, formData, '#smggrupo_plantilla');

       return false;
  
   });