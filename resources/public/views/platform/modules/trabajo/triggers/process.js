$(document).on('click', '#generarCuotas', function (e) {
    var formData = new FormData();

    formData.append("cuota", document.getElementsByName("nocuota")[0].value);
    formData.append("contrato", document.getElementsByName("vcontrato")[0].value);
    var numeroCuota = document.getElementsByName("nocuota")[0].value;
    var vcontracto =  document.getElementsByName("vcontrato")[0].value;

    if(parseInt(numeroCuota) > 0 && parseInt(vcontracto) > 0 ){
        var ruta = routesAppPlatform() + 'trabajo/core/generarCuotas.php';
        sendEventFormDataApp('POST', ruta, formData, '#tabCuotas');
        //cargarTablaListadoProyecto(document.getElementsByName("idtrabajo")[0].value);
        $('#botonValidar').show();
    }else{
        swal ( "Error" ,  "El número de cuotas o el valor del contrato, no debe ser menor o igual a cero." ,  "error" )
    }
    return false;
});

$(document).on('click', '#validarCuotas', function (e) {
    var formData = new FormData();

        var numeroCuota = document.getElementsByName("nocuota")[0].value;
        var  ncuotas=0;
        var c =0;
        var v =0;
        for (let index = 1; index <= parseInt(numeroCuota); index++) {
            //alert(document.getElementsByName("porcentaje"+index)[0].value);
            if(parseInt(document.getElementsByName("porcentaje"+index)[0].value) < 1){
                c++;
            }
            if(parseInt(document.getElementsByName("monto"+index)[0].value) < 1){
                v++;
            }
            ncuotas = parseInt(ncuotas) +  parseInt(document.getElementsByName("porcentaje"+index)[0].value);
        }
        //alert( ncuotas+" "+c);
       
        if(parseInt(c) > 0){
            swal ( "Error" ,  "Actualmente hay una cuota con valor menor o igual a cero.",  "error" );
        }else{
            
            if(parseInt(v) > 0){
                swal ( "Error" ,  "Actualmente hay una cuota con el monto  menor o igual a cero.",  "error" );
            }else{
                if(parseInt(ncuotas)  == 100){
                    swal({
                        title: "Registrar Cuotas",
                        text: "Luego de aceptar la validación de las cuotas ingresadas no podrá modificar o eliminar alguna cuota. Desea registrarlas?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                      })
                      .then((willDelete) => {
                        if (willDelete) {

                            formData.append("idtrabajo", document.getElementsByName("idempresa")[0].value);
                            formData.append("idcontrato", document.getElementsByName("idcontrato")[0].value);

                            formData.append("numeroCuota", document.getElementsByName("nocuota")[0].value);
                        for (let index = 1; index <= parseInt(numeroCuota); index++) {

                            
                            formData.append("numero"+index, document.getElementsByName("cuota"+index)[0].value);
                            formData.append("porcentaje"+index, document.getElementsByName("porcentaje"+index)[0].value);
                            formData.append("monto"+index, document.getElementsByName("monto"+index)[0].value);

                        }

                           var ruta = routesAppPlatform() + 'trabajo/core/validarCuotas.php';
                           sendEventFormDataApp('POST', ruta, formData, '#smg');
                        swal ( "Validación Cuotas" ,  "La validación de las cuotas del contrato a sido completada" ,  "success" )
                        } 
                      });
                    // var ruta = routesAppPlatform() + 'trabajo/core/generarCuotas.php';
                    // sendEventFormDataApp('POST', ruta, formData, '#smg');
                    // // //cargarTablaListadoProyecto(document.getElementsByName("idtrabajo")[0].value);
                    // // $('#botonValidar').show();
                    // swal ( "Exito" ,  "La validacion de la cuotas del contrato a sido completada" ,  "success" );
                }else{
                    swal ( "Error" ,  "El porcentaje total  debe ser igual a 100% / "+ncuotas+"%",  "error" );
                }
            }
        }
    return false;
});

$(document).on('click', '#generarValor', function (e) {
    var formData = new FormData();
    
    var id =  $(this).attr('name');
    var por = document.getElementsByName("porcentaje"+id)[0].value;
    var con = document.getElementsByName("vcontrato")[0].value;
    // formData.append("cuota", document.getElementsByName("nocuota")[0].value);
    // formData.append("contrato", document.getElementsByName("vcontrato")[0].value);
    document.getElementsByName("monto"+id)[0].value = ( parseFloat(por) * parseFloat(con) ) / 100;
  

});