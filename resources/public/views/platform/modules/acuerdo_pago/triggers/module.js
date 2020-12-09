/*  Eventos para modulo de sesion. */
$(document).on('click','#registrarEmpleado',function(e){

    var formData = new FormData();
    formData.append("no", document.getElementsByName("nombre")[0].value);
    formData.append("area", document.getElementsByName("area")[0].value);
    formData.append("documento", document.getElementsByName("documento")[0].value);
    formData.append("correo", document.getElementsByName("correo")[0].value);
    formData.append("telefono", document.getElementsByName("telefono")[0].value);
    formData.append("direccion", document.getElementsByName("direccion")[0].value);
    formData.append("pais", document.getElementsByName("pais")[0].value);
    formData.append("ciudad", document.getElementsByName("ciudad")[0].value);
    formData.append("usuario", document.getElementsByName("usuario")[0].value);
    formData.append("clave", document.getElementsByName("clave")[0].value);


    var ruta = routesAppPlatform() + 'usuarios/core/registrarEmpleado.php';
    sendEventFormDataApp('POST', ruta, formData, '#smgEmpleado');

       return false;
  
   });
   /*  Eventos para modulo de sesion. */
$(document).on('click','#registrarEmpleado',function(e){

    var formData = new FormData();
    formData.append("nombre", document.getElementsByName("nombre")[0].value);
    formData.append("area", document.getElementsByName("area")[0].value);
    formData.append("documento", document.getElementsByName("documento")[0].value);
    formData.append("correo", document.getElementsByName("correo")[0].value);
    formData.append("telefono", document.getElementsByName("telefono")[0].value);
    formData.append("direccion", document.getElementsByName("direccion")[0].value);
    formData.append("pais", document.getElementsByName("pais")[0].value);
    formData.append("ciudad", document.getElementsByName("ciudad")[0].value);
    formData.append("usuario", document.getElementsByName("usuario")[0].value);
    formData.append("clave", document.getElementsByName("clave")[0].value);


    var ruta = routesAppPlatform() + 'usuarios/core/registrarEmpleado.php';
    sendEventFormDataApp('POST', ruta, formData, '#smgEmpleado');

       return false;
  
   });