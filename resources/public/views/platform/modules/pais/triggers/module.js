/*  Eventos para modulo de sesion. */
$(document).on('click','#registrarpais',function(e){

    var formData = new FormData();
    formData.append("id_pais", document.getElementsByName("id_pais")[0].value);
    formData.append("acronimo_pais", document.getElementsByName("acronimo_pais")[0].value);
    formData.append("nombre_pais", document.getElementsByName("nombre_pais")[0].value);

    var ruta = routesAppPlatform() + 'pais/core/registrarpais.php';
    sendEventFormDataApp('POST', ruta, formData, '#smgpais');

       return false;
  
   });
   /*  Eventos para modulo de sesion. */
$(document).on('click','#registrarpais',function(e){

    var formData = new FormData();
    formData.append("id_pais", document.getElementsByName("id_pais")[0].value);
    formData.append("acronimo_pais", document.getElementsByName("acronimo_pais")[0].value);
    formData.append("nombre_pais", document.getElementsByName("nombre_pais")[0].value);

    var ruta = routesAppPlatform() + 'pais/core/registrarpais.php';
    sendEventFormDataApp('POST', ruta, formData, '#smgpais');

       return false;
  
   });