/*  Eventos para modulo de sesion. */
$(document).on('click','#registrarcolaborador',function(e){

    var formData = new FormData();
    formData.append("id_colaborador", document.getElementsByName("id_colaborador")[0].value);
    formData.append("nombre_colaborador", document.getElementsByName("nombre_colaborador")[0].value);
    formData.append("cargo_colaborador", document.getElementsByName("cargo_colaborador")[0].value);

    var ruta = routesAppPlatform() + 'colaborador/core/registrarcolaborador.php';
    sendEventFormDataApp('POST', ruta, formData, '#smgcolaborador');

       return false;
  
   });
   /*  Eventos para modulo de sesion. */
$(document).on('click','#registrarcolaborador',function(e){

    var formData = new FormData();
    formData.append("id_colaborador", document.getElementsByName("id_colaborador")[0].value);
    formData.append("nombre_colaborador", document.getElementsByName("nombre_colaborador")[0].value);
    formData.append("cargo_colaborador", document.getElementsByName("cargo_colaborador")[0].value);
 
    var ruta = routesAppPlatform() + 'colaborador/core/registrarcolaborador.php';
    sendEventFormDataApp('POST', ruta, formData, '#smgcolaborador');

       return false;
  
   });