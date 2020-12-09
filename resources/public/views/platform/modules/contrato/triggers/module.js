/*  Eventos para modulo de sesion. */
$(document).on('click','#registrarcontrato',function(e){

    var formData = new FormData();
    formData.append("id_contrato", document.getElementsByName("id_contrato")[0].value);
    formData.append("id_entidad_pago_contrato", document.getElementsByName("id_entidad_pago_contrato")[0].value);
    formData.append("valor_contrato", document.getElementsByName("valor_contrato")[0].value);
    formData.append("fecha_firma_contrato", document.getElementsByName("fecha_firma_contrato")[0].value);
    formData.append("estado_contrato", document.getElementsByName("estado_contrato")[0].value);

    var ruta = routesAppPlatform() + 'contrato/core/registrarcontrato.php';
    sendEventFormDataApp('POST', ruta, formData, '#smgcontrato');

       return false;
  
   });
   /*  Eventos para modulo de sesion. */
$(document).on('click','#registrarcontrato',function(e){

    var formData = new FormData();
    formData.append("id_contrato", document.getElementsByName("id_contrato")[0].value);
    formData.append("id_entidad_pago_contrato", document.getElementsByName("id_entidad_pago_contrato")[0].value);
    formData.append("valor_contrato", document.getElementsByName("valor_contrato")[0].value);
    formData.append("fecha_firma_contrato", document.getElementsByName("fecha_firma_contrato")[0].value);
    formData.append("estado_contrato", document.getElementsByName("estado_contrato")[0].value);

    var ruta = routesAppPlatform() + 'contrato/core/registrarcontrato.php';
    sendEventFormDataApp('POST', ruta, formData, '#smgcontrato');

       return false;
  
   });