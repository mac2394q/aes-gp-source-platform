/*  Eventos para modulo de sesion. */
$(document).on('click','#registrarempresa_proyecto',function(e){

    var formData = new FormData();
    formData.append("id_empresa_proyecto", document.getElementsByName("id_empresa_proyecto")[0].value);
    formData.append("id_entidad_empresa_proyecto", document.getElementsByName("id_entidad_empresa_proyecto")[0].value);
    formData.append("id_proyecto_empresa", document.getElementsByName("id_proyecto_empresa")[0].value);
    formData.append("id_contrato_empresa_proyecto", document.getElementsByName("id_contrato_empresa_proyecto")[0].value);
    formData.append("estado_empresa_proyecto", document.getElementsByName("estado_empresa_proyecto")[0].value);

    var ruta = routesAppPlatform() + 'empresa_proyecto/core/registrarempresa_proyecto.php';
    sendEventFormDataApp('POST', ruta, formData, '#smgempresa_proyecto');

       return false;
  
   });
   /*  Eventos para modulo de sesion. */
$(document).on('click','#registrarempresa_proyecto',function(e){

    var formData = new FormData();
    formData.append("id_empresa_proyecto", document.getElementsByName("id_empresa_proyecto")[0].value);
    formData.append("id_entidad_empresa_proyecto", document.getElementsByName("id_entidad_empresa_proyecto")[0].value);
    formData.append("id_proyecto_empresa", document.getElementsByName("id_proyecto_empresa")[0].value);
    formData.append("id_contrato_empresa_proyecto", document.getElementsByName("id_contrato_empresa_proyecto")[0].value);
    formData.append("estado_empresa_proyecto", document.getElementsByName("estado_empresa_proyecto")[0].value);

    var ruta = routesAppPlatform() + 'empresa_proyecto/core/registrarempresa_proyecto.php';
    sendEventFormDataApp('POST', ruta, formData, '#smgempresa_proyecto');

       return false;
  
   });