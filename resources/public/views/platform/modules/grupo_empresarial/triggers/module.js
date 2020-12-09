/*  Eventos para modulo de sesion. */
$(document).on('click','#registrargrupo',function(e){

    var formData = new FormData();
    formData.append("id_entidad", document.getElementsByName("id_entidad")[0].value);
    formData.append("nombre_grupo_empresarial", document.getElementsByName("nombre_grupo_empresarial")[0].value);

    var ruta = routesAppPlatform() + 'grupo_empresarial/core/registrargrupo.php';
    sendEventFormDataApp('POST', ruta, formData, '#smggrupo');

       return false;
  
   });
   /*  Eventos para modulo de sesion. */
$(document).on('click','#registrargrupo',function(e){

    var formData = new FormData();
    formData.append("id_entidad", document.getElementsByName("id_entidad")[0].value);
    formData.append("nombre_grupo_empresarial", document.getElementsByName("nombre_grupo_empresarial")[0].value);

    var ruta = routesAppPlatform() + 'grupo_empresarial/core/registrargrupo.php';
    sendEventFormDataApp('POST', ruta, formData, '#smggrupo');

       return false;
  
   });