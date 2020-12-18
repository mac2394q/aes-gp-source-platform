/*  Eventos para modulo de sesion. */
$(document).on('click', '#registrarPlantilla', function(e) {

    var formData = new FormData();
    formData.append("etiqueta", document.getElementsByName("etiqueta")[0].value);
    var etiqueta = document.getElementsByName("etiqueta")[0].value;
    formData.append("pais", document.getElementsByName("pais")[0].value);
    var pais = document.getElementsByName("pais")[0].value;
    formData.append("area", document.getElementsByName("area")[0].value);
    var area = document.getElementsByName("area")[0].value;
    var contador = document.getElementsByName("certificadosDinamicos")[0].value;
    formData.append("contadorCertificados", contador);
    var con = 0;
    for (let index = 0; index < parseInt(contador); index++) {
        var consecutivo = document.getElementsByName("car[" + index + "][consecutivo]")[0].value;
        var etiquetaPlantilla = document.getElementsByName("car[" + index + "][etiquetaPlantilla]")[0].value;
        if (consecutivo < 1 || etiquetaPlantilla < 1) {
            con++;
        }
        formData.append("consecutivo" + index, document.getElementsByName("car[" + index + "][consecutivo]")[0].value);
        formData.append("etiquetaPlantilla" + index, document.getElementsByName("car[" + index + "][etiquetaPlantilla]")[0].value);
    }

    if (etiqueta.length > 0 && pais != "null" && area != "null" && con == 0) {
        swal({
            title: "Registro de Plantilla",
            text: "Luego de aceptar la plantilla sera guardaba en la plataforma, Esta seguro ?",
            icon: "success",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                var ruta = routesAppPlatform() + 'plantillas/core/registroPlantilla.php';
                sendEventFormDataApp('POST', ruta, formData, '#smgPlantilla');
            }
        });
    } else {
        swal({
            title: "Error de validación en el formulario",
            text: "Actualmente hay obligatorios sin ingresar !",
            icon: "warning",
            dangerMode: true,
        });
    }
    return false;
});
$(document).on('click', '#registrarCapitulo', function(e) {
    var formData = new FormData();
    formData.append("consecutivo", document.getElementsByName("consecutivo")[0].value);
    var consecutivo = document.getElementsByName("consecutivo")[0].value;
    formData.append("etiquetaPlantilla", document.getElementsByName("etiquetaPlantilla")[0].value);
    var etiqueta = document.getElementsByName("etiquetaPlantilla")[0].value;
    formData.append("idplantilla", document.getElementsByName("idplantilla")[0].value);
    if (consecutivo.length > 0 && etiqueta.length > 0) {
        swal({
                title: "Agregar Capítulo",
                text: "Esta seguro de agregar un nuevo capítulo ?",
                icon: "success",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    var ruta = routesAppPlatform() + 'plantillas/core/registrarGrupo.php';
                    sendEventFormDataApp('POST', ruta, formData, '#smgPlantilla');
                }
            });
    } else {
        swal({
            title: "Error de validación en el formulario",
            text: "Actualmente hay obligatorios sin ingresar !",
            icon: "warning",
            dangerMode: true,
        });
    }
    return false;
});
/*  Eventos para modulo de sesion. */
$(document).on('click', '#registrarPlantillaGrupo', function(e) {
    var formData = new FormData();
    formData.append("idplantilla", document.getElementsByName("idplantilla")[0].value);
    formData.append("etiquetaPlantilla", document.getElementsByName("etiquetaPlantilla")[0].value);
    var etiquetaPlantilla = document.getElementsByName("etiquetaPlantilla")[0].value;
    formData.append("textarea2", document.getElementsByName("textarea2")[0].value);
    var areaPlantilla = document.getElementsByName("textarea2")[0].value;
    formData.append("plantilla", document.getElementsByName("plantilla")[0].value);
    if (etiquetaPlantilla.length > 0 && areaPlantilla.length > 0) {

        swal({
                title: "Agregar Requisito",
                text: "Esta seguro de agregar un nuevo requisito ?",
                icon: "success",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    var ruta = routesAppPlatform() + 'plantillas/core/registroPlantillaGrupo.php';
                    sendEventFormDataApp('POST', ruta, formData, '#smgPlantilla');
                }
            });
    } else {
        swal({
            title: "Error de validación en el formulario",
            text: "Actualmente hay obligatorios sin ingresar !",
            icon: "warning",
            dangerMode: true,
        });
    }
    return false;
});
$(document).on('click', '#editarGrupo', function(e) {
    var formData = new FormData();
    formData.append("idgrupo", document.getElementsByName("idgrupo")[0].value);
    formData.append("consecutivo", document.getElementsByName("consecutivo")[0].value);
    formData.append("titulo", document.getElementsByName("titulo")[0].value);
    var nom = document.getElementsByName("consecutivo")[0].value;
    var text = document.getElementsByName("titulo")[0].value;
    if (nom.length > 0 && text.length > 0) {
        swal({
                title: "Modificar Capítulo",
                text: "Esta seguro de modificar el capítulo ?",
                icon: "success",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    var ruta = routesAppPlatform() + 'plantillas/core/editarGrupo.php';
                    sendEventFormDataApp('POST', ruta, formData, '#smgPlantilla');
                }
            });
    } else {
        swal({
            title: "Error de validación en el formulario",
            text: "Esta seguro de editar el capítulo ? ",
            icon: "warning",
            dangerMode: true,
        });
    }
    return false;
});
$(document).on('click', '#editarItem', function(e) {
    var formData = new FormData();
    formData.append("idplantilla", document.getElementsByName("idplantilla")[0].value);
    formData.append("etiquetaPlantilla", document.getElementsByName("etiquetaPlantilla")[0].value);
    formData.append("textarea2", document.getElementsByName("textarea2")[0].value);
    var nom = document.getElementsByName("etiquetaPlantilla")[0].value;
    var text = document.getElementsByName("textarea2")[0].value;
    if (nom.length > 0 && text.length > 0) {
        swal({
                title: "Editar Requisito",
                text: "Esta seguro de editar requisito ?",
                icon: "success",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    var ruta = routesAppPlatform() + 'plantillas/core/editarRubrica.php';
                    sendEventFormDataApp('POST', ruta, formData, '#smgPlantilla');
                }
            });
    } else {
        swal({
            title: "Error de validación en el formulario",
            text: "Esta seguro de editar el requisito?",
            icon: "warning",
            dangerMode: true,
        });
    }
    return false;
});
$(document).on('click', '#editarPlantilla', function(e) {
    var formData = new FormData();
    formData.append("idplantilla", document.getElementsByName("idplantilla")[0].value);
    formData.append("nombre", document.getElementsByName("nombre")[0].value);
    var nom = document.getElementsByName("nombre")[0].value;
    if (nom.length > 0) {
        formData.append("area", document.getElementsByName("area")[0].value);
        swal({
                title: "Editar  Plantilla",
                text: "Esta seguro de editar los datos de la plantilla ?",
                icon: "success",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    var ruta = routesAppPlatform() + 'plantillas/core/editarPlantilla.php';

                    sendEventFormDataApp('POST', ruta, formData, '#smgPlantilla');
                }
            });
    } else {
        swal({
            title: "Error de validación en el formulario",
            text: "Actualmente hay obligatorios sin ingresar !",
            icon: "warning",
            dangerMode: true,
        });
    }
    return false;
});
$(document).on('click', '#eliminarCapitulo', function(e) {
    var formData = new FormData();
    formData.append("id", $(this).attr('title'));
    swal({
            title: "Eliminar Capítulo",
            text: "Esta seguro de eliminar el capítulo ?",
            icon: "success",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                var ruta = routesAppPlatform() + 'plantillas/core/eliminarGrupo.php';
                sendEventFormDataApp('POST', ruta, formData, '#smgPlantilla');
            }
        });
});
$(document).on('click', '#eliminarRequisito', function(e) {
    var formData = new FormData();
    formData.append("id", $(this).attr('title'));
    console.log($(this).attr('title'));
    swal({
            title: "Eliminar Requisito",
            text: "Esta seguro de eliminar el requisito ?",
            icon: "success",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                var ruta = routesAppPlatform() + 'plantillas/core/eliminarRubrica.php';
                sendEventFormDataApp('POST', ruta, formData, '#smgPlantilla');
            }
        });
});


$(document).on('click', '#clonar', function(e) {
    var formData = new FormData();
    formData.append("id", $(this).attr('title'));
    console.log( $(this).attr('title'));
    swal({
            title: "Clonación de Plantilla",
            text: "Esta seguro de clonar la plantilla ?",
            icon: "success",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                var ruta = routesAppPlatform() + 'plantillas/clonar.php';

                sendEventFormDataApp('POST', ruta, formData, '#smgPlantilla');
            }
        });
});