/*  Eventos para modulo de sesion. */
$(document).on('click','#registrarcuota',function(e){

    var formData = new FormData();
    formData.append("id_cuota", document.getElementsByName("id_cuota")[0].value);
    formData.append("id_acuerdo_pago_cuota", document.getElementsByName("id_acuerdo_pago_cuota")[0].value);
    formData.append("numero_cuota", document.getElementsByName("numero_cuota")[0].value);
    formData.append("monto_cuota", document.getElementsByName("monto_cuota")[0].value);
    formData.append("porcentaje_cuota", document.getElementsByName("porcentaje_cuota")[0].value);
    formData.append("estado_cuota", document.getElementsByName("estado_cuota")[0].value);

    var ruta = routesAppPlatform() + 'cuota/core/registrarcuota.php';
    sendEventFormDataApp('POST', ruta, formData, '#smgcuota');

       return false;
  
   });
   /*  Eventos para modulo de sesion. */
$(document).on('click','#registrarcuota',function(e){

    var formData = new FormData();
    formData.append("id_cuota", document.getElementsByName("id_cuota")[0].value);
    formData.append("id_acuerdo_pago_cuota", document.getElementsByName("id_acuerdo_pago_cuota")[0].value);
    formData.append("numero_cuota", document.getElementsByName("numero_cuota")[0].value);
    formData.append("monto_cuota", document.getElementsByName("monto_cuota")[0].value);
    formData.append("porcentaje_cuota", document.getElementsByName("porcentaje_cuota")[0].value);
    formData.append("estado_cuota", document.getElementsByName("estado_cuota")[0].value);

    var ruta = routesAppPlatform() + 'cuota/core/registrarcuota.php';
    sendEventFormDataApp('POST', ruta, formData, '#smgcuota');

       return false;
  
   });