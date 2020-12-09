// /*  Eventos para modulo de sesion. */
$(document).on('click', '#registrarTrabajo', function(e) {
    var formData = new FormData();
    formData.append("opcionEntidad", document.getElementsByName("opcionEntidad")[0].value);
    if (document.getElementsByName("tipo")[0].value == "grupo") {
        formData.append("entidadTipo", document.getElementsByName("entidadTipo")[0].value);
    } else {
        formData.append("entidadTipo", document.getElementsByName("entidadTipo2")[0].value);
    }
    swal({
            title: "Registrar Trabajo",
            text: "Esta seguro de registrar un nuevo trabajo ?",
            icon: "success",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                var ruta = routesAppPlatform() + 'trabajo/core/registrarTrabajo.php';
                sendEventFormDataApp('POST', ruta, formData, '#smgtrabajo');
            }
        });
    return false;
});
// /*  Eventos para modulo de sesion. */
$(document).on('click', '#eliminarColaborador', function(e) {
    var formData = new FormData();
    var idco = $(this).attr('name');
    var iditem = $(this).attr('title');
    formData.append("idco", idco);
    formData.append("iditem", iditem);
    swal({
            title: "Eliminar Colaborador",
            text: "Esta seguro de eliminar un colaborador , recuerde que si un colaborador esta asignado no puede ser eliminado ?",
            icon: "success",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                var ruta = routesAppPlatform() + 'trabajo/core/eliminarColaborador.php';
                sendEventFormDataApp('POST', ruta, formData, '#mc' + iditem);
                //location.reload();
            }
        });
});
$(document).on('click', '#buscarTrabajo', function(e) {
    var formData = new FormData();
    var buscar = document.getElementsByName("buscar")[0].value;
    var estado = document.getElementsByName("estado")[0].value;
    formData.append("buscar", buscar);
    formData.append("estado", estado);


    swal({
            title: "Consulta de Empresas / Grupos",
            text: "Esta seguro de realizar la busqueda con los parametros elegidos ?",
            icon: "success",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                var ruta = routesAppPlatform() + 'trabajo/core/buscarTrabajo.php';
                sendEventFormDataApp('POST', ruta, formData, '#tablaDinamica_panel');
                //location.reload();
            }
        });

    return false;
});
$(document).on('click', '#guardarInformeDiagnostico', function(e) {
    var formData = new FormData();
    var id = document.getElementsByName("idproyecto")[0].value;
    var act = trim(document.getElementsByName("actividades")[0].value);
    var asp = trim(document.getElementsByName("aspectos")[0].value);
    var hall = trim(document.getElementsByName("hallasgoz")[0].value);
    var concl = trim(document.getElementsByName("conclusiones")[0].value);
    formData.append("idproyecto", id);
    formData.append("actividades", act);
    formData.append("aspectos", asp);
    formData.append("hallasgoz", hall);
    formData.append("conclusiones", concl);
    if (act.length > 0 && asp.length > 0 && hall.length > 0 && concl.length > 0) {
        swal({
                title: "Registrar informe de diagnóstico",
                text: "Esta seguro de registrar el informe de diagnóstico ?",
                icon: "success",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    var ruta = routesAppPlatform() + 'trabajo/core/registrarInformeDiagnostico.php';
                    sendEventFormDataApp('POST', ruta, formData, '#smgReporte');
                    //location.reload();
                }
            });
    } else {
        swal({
            title: "Error de validación",
            text: "Actualmente hay campos obligatorios pendientes !",
            icon: "warning",
            button: false,
            timer: 6000

        });
        $("#smg").html("Actualmente hay campos obligatorios pendiente");
    }
    //listadoColaboradorTabla() ;
    return false;
});
$(document).on('click', '#guardarInformePre', function(e) {
    var formData = new FormData();
    var id = document.getElementsByName("idproyecto")[0].value;
    var act = document.getElementsByName("actividades")[0].value;
    var asp = document.getElementsByName("aspectos")[0].value;
    var infor = document.getElementsByName("informacion")[0].value;
    formData.append("idproyecto", id);
    formData.append("actividades", act);
    formData.append("aspectos", asp);
    formData.append("informacion", infor);
    if (act.length > 0 && asp.length > 0 && infor.length > 0) {
        swal({
                title: "Registrar informe de Pre Auditoría",
                text: "Esta seguro de registrar el informe de  Pre Auditoría ?",
                icon: "success",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    var ruta = routesAppPlatform() + 'trabajo/core/registrarInformePre.php';
                    sendEventFormDataApp('POST', ruta, formData, '#smgReporte');
                    //location.reload();
                }
            });
    } else {
        swal({
            title: "Error de validación",
            text: "Actualmente hay campos obligatorios pendientes!",
            icon: "warning",
            button: false,
            timer: 6000

        });
        $("#smg").html("Actualmente hay campos obligatorios pendientes");
    }
    //listadoColaboradorTabla() ;
    return false;
});
$(document).on('click', '#agregarColaborador', function(e) {
    var formData = new FormData();
    var colaborador = document.getElementsByName("colaborador")[0].value;
    var cargo = document.getElementsByName("cargo")[0].value;
    var idproyecto = document.getElementsByName("idproyecto")[0].value;
    formData.append("colaborador", colaborador);
    formData.append("cargo", cargo);
    formData.append("idproyecto", idproyecto);
    if (colaborador.length > 0 && cargo.length > 0) {
        swal({
                title: "Registrar Colaborador",
                text: "Esta seguro de registrar un nuevo colaborador ?",
                icon: "success",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    var ruta = routesAppPlatform() + 'trabajo/core/registrarColaborador.php';
                    sendEventFormDataApp('POST', ruta, formData, '#smgColaborador');
                    //location.reload();
                }
            });
    } else {
        swal({
            title: "Error de validación",
            text: "Actualmente hay campos obligatorios pendientes!",
            icon: "warning",
            button: false,
            timer: 6000

        });
        $("#smg").html("Actualmente hay campos obligatorios pendientes");
    }
    //listadoColaboradorTabla() ;
    return false;
});

function listadoColaboradorTabla() {
    var formData = new FormData();
    var ruta = routesAppPlatform() + 'trabajo/core/listadoColaboradorTabla.php';
    sendEventFormDataApp('POST', ruta, formData, '#listadoColaborador');
}
$(document).on('click', '#registrarContracto', function(e) {
    var formData = new FormData();
    var n = document.getElementsByName("f1")[0].value;
    var contracto = document.getElementsByName("contracto")[0].value;
    var entidadTipo2 = document.getElementsByName("entidadTipo2")[0].value;
    var fecha = document.getElementsByName("fecha")[0].value;
    console.log(entidadTipo2 + " ---");
    if (n.length > 0 &&
        entidadTipo2 != "null" &&
        fecha.length > 0 &&
        contracto.length > 0) {
        var words = [
            document.getElementsByName("entidadTipo2")[0].value,
            document.getElementsByName("contracto")[0].value,
            document.getElementsByName("fechaTop")[0].value

        ];
        formData.append("entidadTipo2", document.getElementsByName("entidadTipo2")[0].value);
        formData.append("fecha", document.getElementsByName("fechaTop")[0].value);
        formData.append("contracto", document.getElementsByName("contracto")[0].value);
        formData.append("idtrabajo", document.getElementsByName("idempresa")[0].value);
        formData.append("f1", $('#f1')[0].files[0]);
        formData.append("f2", $('#f2')[0].files[0]);
        formData.append("f3", $('#f3')[0].files[0]);
        swal({
                title: "Registro de Contrato",
                text: "Esta seguro de registrar el nuevo contrato ",
                icon: "success",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    var ruta = routesAppPlatform() + 'trabajo/core/registrarContracto.php';
                    sendEventFormDataApp('POST', ruta, formData, '#smgtrabajo');
                }
            });
        return false;
    } else {
        swal({
            title: "Tenemos un problema!",
            text: "Actualmente se esta omitiendo adjuntar la copia digital del contrato o existen campos vacios!",
            icon: "warning",
            button: false,
            timer: 6000

        });
        $("#smgtrabajo").html("Actualmente se esta omitiendo adjuntar la copia digital del contrato");
    }
});
$(document).on('click', '#subirReporteDiagnostico', function(e) {
    var formData = new FormData();
    var fileName = $('#s1')[0].files[0].name;
    var ext = fileName.split('.').pop();
    ext = ext.toLowerCase();
    if (ext != 'pdf') {
        swal({
            title: "Tenemos un problema!",
            text: "Actualmente se esta tratando de subir un archivo con formato diferente a PDF!",
            icon: "warning",
            button: false,
            timer: 6000

        });
    } else {
        //********************* */ 
        var n = $('#s1')[0].files[0];
        var sizeByte = $('#s1')[0].files[0].size;
        var siezekiloByte = parseInt(sizeByte / 1024);
        formData.append("idempresa", document.getElementsByName("idempresa")[0].value);
        if (parseInt(siezekiloByte) > 0) {
            formData.append("s1", $('#s1')[0].files[0]);
            swal({
                    title: "Cargar documento de reporte",
                    text: "Esta seguro de subir el documento seleccionado ? ",
                    icon: "success",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        var ruta = routesAppPlatform() + 'trabajo/core/subirReporteDiagnostico.php';
                        sendEventFormDataApp('POST', ruta, formData, '#smg');
                    }
                });
            return false;
        } else {
            swal({
                title: "Tenemos un problema!",
                text: "Actualmente se esta omitiendo adjuntar el reporte!",
                icon: "warning",
                button: false,
                timer: 6000

            });
            $("#smg").html("Actualmente se esta omitiendo adjuntar el reporte");
        }
    }
});
$(document).on('click', '#subirReportePreauditoria', function(e) {

    var formData = new FormData();
    var fileName = $('#s1')[0].files[0].name;
    var ext = fileName.split('.').pop();
    ext = ext.toLowerCase();
    if (ext != 'pdf') {
        swal({
            title: "Tenemos un problema!",
            text: "Actualmente se esta tratando de subir un archivo con formato diferente a PDF!",
            icon: "warning",
            button: false,
            timer: 6000

        });
    } else {
        var n = $('#s1')[0].files[0];
        var sizeByte = $('#s1')[0].files[0].size;
        var siezekiloByte = parseInt(sizeByte / 1024);
        formData.append("idempresa", document.getElementsByName("idempresa")[0].value);
        if (parseInt(siezekiloByte) > 0) {
            formData.append("s1", $('#s1')[0].files[0]);
            swal({
                    title: "Cargar documento de reporte",
                    text: "Esta seguro de subir el documento seleccionado ? ",
                    icon: "success",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        var ruta = routesAppPlatform() + 'trabajo/core/subirReportePreauditoria.php';
                        sendEventFormDataApp('POST', ruta, formData, '#smg');
                    }
                });
            return false;
        } else {
            swal({
                title: "Tenemos un problema!",
                text: "Actualmente se esta omitiendo adjuntar el reporte!",
                icon: "warning",
                button: false,
                timer: 6000

            });
            $("#smg").html("Actualmente se esta omitiendo adjuntar el reporte");
        }
    }
});
$(document).on('click', '#subirPlaneacionDiagnostico', function(e) {
    var formData = new FormData();
    var fileName = $('#s2')[0].files[0].name;
    var ext = fileName.split('.').pop();
    ext = ext.toLowerCase();
    if (ext != 'pdf') {
        swal({
            title: "Tenemos un problema!",
            text: "Actualmente se esta tratando de subir un archivo con formato diferente a PDF!",
            icon: "warning",
            button: false,
            timer: 6000

        });
    } else {

        var n = $('#s2')[0].files[0];
        var sizeByte = $('#s2')[0].files[0].size;
        var siezekiloByte = parseInt(sizeByte / 1024);
        formData.append("idempresa", document.getElementsByName("idempresa")[0].value);
        if (parseInt(siezekiloByte) > 0) {
            formData.append("s2", $('#s2')[0].files[0]);
            swal({
                    title: "Cargar documento de diagnóstico",
                    text: "Esta seguro de subir el documento seleccionado ? ",
                    icon: "success",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        var ruta = routesAppPlatform() + 'trabajo/core/subirPlaneacionDiagnostico.php';
                        sendEventFormDataApp('POST', ruta, formData, '#smg');
                    }
                });
            return false;
        } else {
            swal({
                title: "Tenemos un problema!",
                text: "Actualmente se esta omitiendo adjuntar el reporte!",
                icon: "warning",
                button: false,
                timer: 6000

            });
            $("#smg").html("Actualmente se esta omitiendo adjuntar el reporte");
        }
    }
});
$(document).on('click', '#subirPlaneacionPreauditoria', function(e) {
    var formData = new FormData();
    var fileName = $('#s2')[0].files[0].name;
    var ext = fileName.split('.').pop();
    ext = ext.toLowerCase();
    if (ext != 'pdf') {
        swal({
            title: "Tenemos un problema!",
            text: "Actualmente se esta tratando de subir un archivo con formato diferente a PDF!",
            icon: "warning",
            button: false,
            timer: 6000

        });
    } else {
        var n = $('#s2')[0].files[0];
        var sizeByte = $('#s2')[0].files[0].size;
        var siezekiloByte = parseInt(sizeByte / 1024);
        formData.append("idempresa", document.getElementsByName("idempresa")[0].value);
        if (parseInt(siezekiloByte) > 0) {
            formData.append("s2", $('#s2')[0].files[0]);
            swal({
                    title: "Cargar documento de pre auditoría",
                    text: "Esta seguro de subir el documento seleccionado ? ",
                    icon: "success",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        var ruta = routesAppPlatform() + 'trabajo/core/subirPlaneacionPreauditoria.php';
                        sendEventFormDataApp('POST', ruta, formData, '#smg');
                    }
                });
            return false;
        } else {
            swal({
                title: "Tenemos un problema!",
                text: "Actualmente se esta omitiendo adjuntar el documento de pre auditoría!",
                icon: "warning",
                button: false,
                timer: 6000

            });
            $("#smg").html("Actualmente se esta omitiendo adjuntar el documento de preauditoria");
        }
    }
});
$(document).on('click', '#subirPlaneacionImplementacion', function(e) {

    var formData = new FormData();
    var fileName = $('#s1')[0].files[0].name;
    var ext = fileName.split('.').pop();
    ext = ext.toLowerCase();
    if (ext != 'pdf') {
        swal({
            title: "Tenemos un problema!",
            text: "Actualmente se esta tratando de subir un archivo con formato diferente a PDF!",
            icon: "warning",
            button: false,
            timer: 6000

        });
    } else {
        var n = $('#s1')[0].files[0];
        var sizeByte = $('#s1')[0].files[0].size;
        var siezekiloByte = parseInt(sizeByte / 1024);
        formData.append("idempresa", document.getElementsByName("idempresa")[0].value);
        if (parseInt(siezekiloByte) > 0) {
            formData.append("s1", $('#s1')[0].files[0]);
            swal({
                    title: "Cargar documento de implementación",
                    text: "Esta seguro de subir el documento seleccionado ? ",
                    icon: "success",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        var ruta = routesAppPlatform() + 'trabajo/core/subirPlaneacionImplementacion.php';
                        sendEventFormDataApp('POST', ruta, formData, '#smg');
                    }
                });
            return false;
        } else {
            swal({
                title: "Tenemos un problema!",
                text: "Actualmente se esta omitiendo adjuntar el reporte!",
                icon: "warning",
                button: false,
                timer: 6000

            });
            $("#smg").html("Actualmente se esta omitiendo adjuntar el reporte");
        }
    }
});
$(document).on('click', '#asignarUsuarioDiagnostico', function(e) {
    var formData = new FormData();
    formData.append("usuario", document.getElementsByName("usuario")[0].value);
    formData.append("idempresa", document.getElementsByName("idempresa")[0].value);
    swal({
            title: "Asignar usuario a la fase de diagnóstico",
            text: "Esta seguro de asignar el usuario seleccionado a la fase de diagnóstico ? ",
            icon: "success",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                var ruta = routesAppPlatform() + 'trabajo/core/asignarUsuarioDiagnostico.php';
                sendEventFormDataApp('POST', ruta, formData, '#smg');
            }
        });
    return false;
});
$(document).on('click', '#asignarUsuarioPreauditoria', function(e) {
    var formData = new FormData();
    formData.append("usuario", document.getElementsByName("usuario")[0].value);
    formData.append("idempresa", document.getElementsByName("idempresa")[0].value);
    swal({
            title: "Asignar usuario a la fase  de Pre Auditoría",
            text: "Esta seguro de asignar el usuario seleccionado a la fase de pre Auditoría ? ",
            icon: "success",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                var ruta = routesAppPlatform() + 'trabajo/core/asignarUsuarioPreauditoria.php';
                sendEventFormDataApp('POST', ruta, formData, '#smg');
            }
        });
    return false;
});
$(document).on('click', '#asignarUsuarioImplementacion', function(e) {
    var formData = new FormData();
    formData.append("usuario", document.getElementsByName("usuario")[0].value);
    formData.append("idempresa", document.getElementsByName("idempresa")[0].value);
    swal({
            title: "Asignar usuario a la  fase implementación",
            text: "Esta seguro de asignar el usuario seleccionado a la fase de implementación ? ",
            icon: "success",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                var ruta = routesAppPlatform() + 'trabajo/core/asignarUsuarioImplementacion.php';
                sendEventFormDataApp('POST', ruta, formData, '#smg');
            }
        });
    return false;
});

$(document).on('click', '#finalizarDiagnosticoProyecto', function(e) {
    var formData = new FormData();
    formData.append("idtrabajo", document.getElementsByName("idtrabajo")[0].value);
    formData.append("idproyecto", document.getElementsByName("idproyecto")[0].value);
    swal({
            title: "Finalizar fase  de diagnóstico",
            text: "Si está seguro que desea cerrar la fase de diagnóstico por favor presionar <OK> ",
            icon: "success",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                var ruta = routesAppPlatform() + 'trabajo/core/finalizarDiagnostico.php';
                sendEventFormDataApp('POST', ruta, formData, '#smg');
            }
        });
    return false;
});
$(document).on('click', '#finalizarPreProyecto', function(e) {
    var formData = new FormData();
    formData.append("idtrabajo", document.getElementsByName("idtrabajo")[0].value);
    formData.append("idproyecto", document.getElementsByName("idproyecto")[0].value);
    swal({
            title: "Finalizar fase  de Pre Auditoría",
            text: "Esta seguro de terminar la fase de Pre Auditoría? ",
            icon: "success",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                var ruta = routesAppPlatform() + 'trabajo/core/finalizarPre.php';
                sendEventFormDataApp('POST', ruta, formData, '#smg');
            }
        });
    return false;
});
$(document).on('click', '#cancelarDiagnostico', function(e) {
    var formData = new FormData();
    formData.append("idproyecto", $(this).attr('title'));
    swal({
            title: "Cancelar fase  de diagnóstico",
            text: "Esta seguro de cancelar la fase de diagnóstico, Recuerde que luego de cancelarlo no podrá reabrir la fase o modificar su estado ? ",
            icon: "success",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                var ruta = routesAppPlatform() + 'trabajo/core/cancelarDiagnostico.php';
                sendEventFormDataApp('POST', ruta, formData, '#smg');
            }
        });
    return false;
});
$(document).on('click', '#cancelarImplementacion', function(e) {
    var formData = new FormData();
    formData.append("idproyecto", $(this).attr('title'));
    //alert($(this).attr('title'));
    swal({
            title: "Cancelar fase  de Implementación",
            text: "Esta seguro de cancelar la fase de Implementación, Recuerde que luego de cancelarlo no podrá reabrilo la fase o modificar su estado ? ",
            icon: "success",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                var ruta = routesAppPlatform() + 'trabajo/core/cancelarImplementacion.php';
                sendEventFormDataApp('POST', ruta, formData, '#smg');
            }
        });
    return false;
});
$(document).on('click', '#finalizarImplementacion', function(e) {
    var formData = new FormData();
    formData.append("idproyecto", document.getElementsByName("idproyecto")[0].value);
    formData.append("idtrabajo", document.getElementsByName("idtrabajo")[0].value);
    swal({
            title: "Finalizar fase  de Implementación",
            text: "Esta seguro de terminar la fase de Implementación ? ",
            icon: "success",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                var ruta = routesAppPlatform() + 'trabajo/core/finalizarImplementacion.php';
                sendEventFormDataApp('POST', ruta, formData, '#smg');
            }
        });
    return false;
});
$(document).on('click', '#registrarProyecto', function(e) {
    var formData = new FormData();
    formData.append("entidadTipo", document.getElementsByName("entidadTipo")[0].value);
    formData.append("idtrabajo", document.getElementsByName("idtrabajo")[0].value);
    var ruta = routesAppPlatform() + 'trabajo/core/registrarProyecto.php';
    sendEventFormDataApp('POST', ruta, formData, '#smg');
    //cargarTablaListadoProyecto(document.getElementsByName("idtrabajo")[0].value);
    return false;
});
$(document).on('click', '#asociarProyecto', function(e) {
    var formData = new FormData();
    formData.append("idtrabajo", document.getElementsByName("idtrabajo")[0].value);
    formData.append("proyectoId", document.getElementsByName("proyectoId")[0].value);
    formData.append("idcontrato", document.getElementsByName("idcontrato")[0].value);
    swal({
            title: "Asociar Proyecto ",
            text: "Esta seguro de asociar el proyecto al  contrato ",
            icon: "success",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                var ruta = routesAppPlatform() + 'trabajo/core/asociarProyectoContrato.php';
                sendEventFormDataApp('POST', ruta, formData, '#smg');
            }
        });
    //cargarTablaListadoProyectoEmpresa(document.getElementsByName("idtrabajo")[0].value);
    return false;
});
$(document).on('click', '#registrarProyectoEmpresa', function(e) {
    var formData = new FormData();
    formData.append("grupo", document.getElementsByName("grupo")[0].value);
    formData.append("proyectoId", document.getElementsByName("proyectoId")[0].value);
    formData.append("idtrabajo", document.getElementsByName("idtrabajo")[0].value);
    var ruta = routesAppPlatform() + 'trabajo/core/registrarProyectoEmpresa.php';
    sendEventFormDataApp('POST', ruta, formData, '#smg');
    //cargarTablaListadoProyectoEmpresa(document.getElementsByName("idtrabajo")[0].value);
    return false;
});
$(document).on('click', '#registrarCuota', function(e) {
    var formData = new FormData();
    formData.append("cuota", document.getElementsByName("cuota")[0].value);
    formData.append("ncuota", document.getElementsByName("ncuota")[0].value);
    formData.append("porcentaje", document.getElementsByName("porcentaje")[0].value);
    formData.append("estado", document.getElementsByName("estado")[0].value);
    formData.append("textarea2", document.getElementsByName("textarea2")[0].value);
    formData.append("idcontrato", document.getElementsByName("idcontrato")[0].value);
    formData.append("empresa_proyecto", document.getElementsByName("empresa_proyecto")[0].value)
    formData.append("idtrabajo", document.getElementsByName("idtrabajo")[0].value)
    var ruta = routesAppPlatform() + 'trabajo/core/registrarCuota.php';
    sendEventFormDataApp('POST', ruta, formData, '#smg');
    return false;
});
$(document).on('click', '#modificarCuota', function(e) {
    var formData = new FormData();
    var id = $(this).attr('title');
    formData.append("idcuota", id);
    formData.append("idtrabajo", document.getElementsByName("idempresa")[0].value);
    formData.append("idcontrato", document.getElementsByName("idcontrato")[0].value);
    formData.append("estado", document.getElementsByName("estado" + id)[0].value);
    formData.append("observacion", document.getElementsByName("observacion" + id)[0].value);
    swal({
            title: "Modificar Cuota",
            text: "Esta seguro que desea modificar la cuota elegida",
            icon: "success",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                var ruta = routesAppPlatform() + 'trabajo/core/modificarCuota.php';
                sendEventFormDataApp('POST', ruta, formData, '#smg');
            }
        });
    return false;
});
$(document).on('click', '#cancelarTrabajo', function(e) {
    var id = document.getElementsByName("idempresa")[0].value;
    swal({
            title: "Cancelar Trabajo",
            text: "Luego de aceptar la  cancelación del trabajo  no podrá modificar el estado nuevamente!",
            icon: "success",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                //   swal("Poof! Your imaginary file has been deleted!", {
                //     icon: "success",
                //   });ss

                //swal ( "Exito" ,  "La validacion de la cuotas del contrato a sido completada" ,  "success" )
                window.location = routesAppPlatform() + "trabajo/core/cancelarTrabajo.php?id=" + id;
            }
        });
});
$(document).on('click', '#validarElemento', function(e) {
    var href = $(this).attr('title');
    var estado = document.getElementsByName("estado" + href)[0].value;
    var observacion = document.getElementsByName("textarea" + href)[0].value;
    console.log(observacion.length);
    if (observacion.length < 850) {
        if (observacion.length > 0 && estado != 0) {
            swal({
                    title: "Registro de observación",
                    text: "Esta seguro de registrar la observación  del requerimiento seleccionado!",
                    icon: "success",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        sendEventApp('POST', routesAppPlatform() + 'trabajo/core/observacionDiagnostico.php',
                            params = {
                                "idItem": href,
                                "idProyecto": document.getElementsByName("idproyecto")[0].value,
                                "estado": estado,
                                "observacion": observacion

                            }, '#respuesta' + href);
                    }
                });
        } else {
            swal({
                title: "Error de validación",
                text: "Actualmente hay campos obligatorios pendientes!",
                icon: "warning",
                button: false,
                timer: 6000

            });
            $("#respuesta" + href).html("Actualmente hay campos obligatorios pendientes");
        }
    } else {
        swal({
            title: "Error de tamaño",
            text: "Actualmente  la observacion es mayor a 850 caracteres",
            icon: "warning",
            button: false,
            timer: 6000

        });
    }
    return false;
});
$(document).on('click', '#validarElemento2', function(e) {
    var href = $(this).attr('title');
    var porcentaje = document.getElementsByName("porcentaje" + href)[0].value;
    var observacion = document.getElementsByName("textarea" + href)[0].value;
    var colaboracion = document.getElementsByName("ctextarea" + href)[0].value;

    if (observacion.length < 850) {
        if (observacion.length > 0 && parseInt(porcentaje) > 0 && colaboracion.length > 0) {
            swal({
                    title: "Registro de observación",
                    text: "Esta seguro de registrar la observación del requerimiento seleccionado!",
                    icon: "success",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        sendEventApp('POST', routesAppPlatform() + 'trabajo/core/observacionImplementacion.php',
                            params = {
                                "idItem": href,
                                "idProyecto": document.getElementsByName("idproyecto")[0].value,
                                "porcentaje": porcentaje,
                                "colaboracion": colaboracion,
                                "idImple": $(this).attr('name'),
                                "observacion": observacion

                            }, '#respuesta' + href);
                    }
                });
            cx

        } else {
            swal({
                title: "Error de validación",
                text: "Actualmente hay campos obligatorios pendientes!",
                icon: "warning",
                button: false,
                timer: 6000

            });
            $("#respuesta" + href).html("Actualmente hay campos obligatorios pendiente");
        }
    } else {
        swal({
            title: "Error de tamaño",
            text: "Actualmente  la observacion es mayor a 850 caracteres",
            icon: "warning",
            button: false,
            timer: 6000

        });
    }
    return false;
});
$(document).on('click', '#validarElemento3', function(e) {
    var href = $(this).attr('title');
    var estado = document.getElementsByName("estado" + href)[0].value;
    var observacion = document.getElementsByName("textarea" + href)[0].value;
    if (observacion.length < 850) {
        if (observacion.length > 0 && estado != 0) {
            swal({
                    title: "Registro de observación",
                    text: "Esta seguro de registrar la observación en el  requerimiento seleccionado!",
                    icon: "success",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        sendEventApp('POST', routesAppPlatform() + 'trabajo/core/observacionPre.php',
                            params = {
                                "idItem": href,
                                "idProyecto": document.getElementsByName("idproyecto")[0].value,
                                "estado": estado,
                                "observacion": observacion

                            }, '#respuesta' + href);
                    }
                });
        } else {
            swal({
                title: "Error de validación",
                text: "Actualmente hay campos obligatorios pendientes!",
                icon: "warning",
                button: false,
                timer: 6000

            });
            $("#respuesta" + href).html("Actualmente hay campos obligatorios pendientes");
        }
    } else {
        swal({
            title: "Error de tamaño",
            text: "Actualmente  la observacion es mayor a 850 caracteres",
            icon: "warning",
            button: false,
            timer: 6000

        });
    }
    return false;
});
$(document).on('click', '#busquedaActa', function(e) {
    var idproyecto = document.getElementsByName("idproyecto")[0].value;
    var id = document.getElementsByName("id")[0].value;
    var date = $('#f1').val();
    if (date.length > 0) {
        swal({
                title: "Generación de Actas",
                text: "Estas seguro de generar el acta con las fechas ingresadas!",
                icon: "success",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    sendEventApp('POST', routesAppPlatform() + 'trabajo/core/tablaActa.php',
                        params = {
                            "date": date,
                            "idproyecto": idproyecto,
                            "id": id

                        }, '#consulta');
                }
            });
    } else {
        swal({
            title: "Error de validación",
            text: "Actualmente hay campos obligatorios pendientes!",
            icon: "warning",
            button: false,
            timer: 6000

        });
        $("#smg").html("Actualmente hay campos obligatorios pendientes");
    }
    return false;
});
$(document).on('click', '#busquedaActa2', function(e) {
    var idproyecto = document.getElementsByName("idproyecto")[0].value;
    var id = document.getElementsByName("id")[0].value;
    var date = $('#f1').val();
    var date2 = $('#f2').val();
    if (date.length > 0 && date2.length > 0) {
        swal({
                title: "Generación de Actas",
                text: "Estas seguro de generar el acta con las fechas ingresadas!",
                icon: "success",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    sendEventApp('POST', routesAppPlatform() + 'trabajo/core/tablaActa2.php',
                        params = {
                            "date": date,
                            "date2": date2,
                            "idproyecto": idproyecto,
                            "id": id

                        }, '#consulta');
                }
            });
    } else {
        swal({
            title: "Error de validación",
            text: "Actualmente hay campos obligatorios pendientes!",
            icon: "warning",
            button: false,
            timer: 6000

        });
        $("#smg").html("Actualmente hay campos obligatorios pendientes");
    }
    return false;
});
$(document).on('click', '#cerrarTrabajo', function(e) {
    var idtrabajo = document.getElementsByName("idtrabajo")[0].value;
    swal({
            title: "Cierre del trabajo",
            text: "Esta seguro de cerrar el trabajo actual!",
            icon: "success",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                sendEventApp('POST', routesAppPlatform() + 'trabajo/core/cierreTrabajo.php',
                    params = {
                        "idtrabajo": idtrabajo

                    }, '#smg');
            }
        });
    return false;
});
$(document).on('click', '#cargarListaComentarios', function(e) {
    var id = $(this).attr('name');
    var id2 = document.getElementsByName("idproyecto")[0].value;
    //alert(idimplementacion);
    sendEventApp('POST', routesAppPlatform() + 'trabajo/core/listaDinamicaComentarios.php',
        params = {
            "id": id,
            "id2": id2

        }, '#modal_' + id);
    return false;
});

function cargarTablaColaboradores(idimplementacion, iditem) {
    var formData = new FormData();
    formData.append("idimplementacion", idimplementacion);
    var ruta = routesAppPlatform() + 'trabajo/core/tablaDinamicaColaboradores.php';
    sendEventFormDataApp('POST', ruta, formData, '#tablaColaboradores' + iditem);
}
$(document).on('click', '#subirDocContra', function(e) {
    var formData = new FormData();
    var n = $('#docContrato')[0].files[0];
    var sizeByte = $('#docContrato')[0].files[0].size;
    var siezekiloByte = parseInt(sizeByte / 1024);
    formData.append("idtrabajo", document.getElementsByName("idtrabajo")[0].value);
    if (parseInt(siezekiloByte) > 0) {
        formData.append("docContrato", $('#docContrato')[0].files[0]);
        swal({
                title: "Cargar documento de contrato",
                text: "Esta seguro de subir el documento seleccionado ? ",
                icon: "success",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    var ruta = routesAppPlatform() + 'trabajo/core/subirContrato.php';
                    sendEventFormDataApp('POST', ruta, formData, '#smgDocumentos');
                }
            });
        return false;
    } else {
        swal({
            title: "Tenemos un problema!",
            text: "Actualmente se esta omitiendo adjuntar el contrato!",
            icon: "warning",
            button: false,
            timer: 6000

        });
        $("#smgDocumentos").html("Actualmente se esta omitiendo adjuntar el contrato");
    }
});
$(document).on('click', '#d1', function(e) {
    var formData = new FormData();
    var n = $('#s1')[0].files[0];
    var sizeByte = $('#s1')[0].files[0].size;
    var siezekiloByte = parseInt(sizeByte / 1024);
    formData.append("idtrabajo", document.getElementsByName("idtrabajo")[0].value);
    if (parseInt(siezekiloByte) > 0) {
        formData.append("s1", $('#s1')[0].files[0]);
        swal({
                title: "Cargar documento ",
                text: "Esta seguro de subir el documento seleccionado ? ",
                icon: "success",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    var ruta = routesAppPlatform() + 'trabajo/core/subirDian.php';
                    sendEventFormDataApp('POST', ruta, formData, '#smgDocumentos');
                }
            });
        return false;
    } else {
        swal({
            title: "Tenemos un problema!",
            text: "Actualmente se esta omitiendo adjuntar el documento!",
            icon: "warning",
            button: false,
            timer: 6000

        });
        $("#smgDocumentos").html("Actualmente se esta omitiendo adjuntar el documento");
    }
});
$(document).on('click', '#subirDocPoli', function(e) {
    var formData = new FormData();
    var n = $('#docPoliza')[0].files[0];
    var sizeByte = $('#docPoliza')[0].files[0].size;
    var siezekiloByte = parseInt(sizeByte / 1024);
    formData.append("idtrabajo", document.getElementsByName("idtrabajo")[0].value);
    if (parseInt(siezekiloByte) > 0) {
        formData.append("docPoliza", $('#docPoliza')[0].files[0]);
        swal({
                title: "Cargar documento de poliza",
                text: "Esta seguro de subir el documento seleccionado ? ",
                icon: "success",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    var ruta = routesAppPlatform() + 'trabajo/core/subirPoliza.php';
                    sendEventFormDataApp('POST', ruta, formData, '#smgDocumentos');
                }
            });
        return false;
    } else {
        swal({
            title: "Tenemos un problema!",
            text: "Actualmente se esta omitiendo adjuntar la poliza!",
            icon: "warning",
            button: false,
            timer: 6000

        });
        $("#smgDocumentos").html("Actualmente se esta omitiendo adjuntar la poliza");
    }
});
$(document).on('click', '#subirDocConfi', function(e) {
    var formData = new FormData();
    var n = $('#docConfi')[0].files[0];
    var sizeByte = $('#docConfi')[0].files[0].size;
    var siezekiloByte = parseInt(sizeByte / 1024);
    formData.append("idtrabajo", document.getElementsByName("idtrabajo")[0].value);
    if (parseInt(siezekiloByte) > 0) {
        formData.append("docConfi", $('#docConfi')[0].files[0]);
        formData.append("idcontrato", document.getElementsByName("idcontrato")[0].value);
        swal({
                title: "Cargar documento de confidencialidad",
                text: "Esta seguro de subir el documento seleccionado ? ",
                icon: "success",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    var ruta = routesAppPlatform() + 'trabajo/core/subirConfi.php';
                    sendEventFormDataApp('POST', ruta, formData, '#smgDocumentos');
                }
            });
        return false;
    } else {
        swal({
            title: "Tenemos un problema!",
            text: "Actualmente se esta omitiendo adjuntar el documento de confidencialidad!",
            icon: "warning",
            button: false,
            timer: 6000

        });
        $("#smgDocumentos").html("Actualmente se esta omitiendo adjuntar el documento de confidencialidad");
    }
});
$(document).on('click', '#subirAdjuntoImplementacion', function(e) {
    var formData = new FormData();
    var href = $(this).attr('title');
    var n = $('#implementacion' + href)[0].files[0];
    var sizeByte = $('#implementacion' + href)[0].files[0].size;
    var siezekiloByte = parseInt(sizeByte / 1024);
    formData.append("idtrabajo", document.getElementsByName("idtrabajo")[0].value);
    formData.append("idproyecto", document.getElementsByName("idproyecto")[0].value);
    formData.append("item", href);
    if (parseInt(siezekiloByte) > 0) {
        formData.append("docImple", $('#implementacion' + href)[0].files[0]);
        swal({
                title: "Cargar adjunto de requisito",
                text: "Esta seguro de subir el documento seleccionado ? ",
                icon: "success",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    var ruta = routesAppPlatform() + 'trabajo/core/subirAdjuntoImple.php';
                    sendEventFormDataApp('POST', ruta, formData, '#smgDocumentos' + href);
                }
            });
        return false;
    } else {
        swal({
            title: "Tenemos un problema!",
            text: "Actualmente se esta omitiendo adjuntar el documento al requisito!",
            icon: "warning",
            button: false,
            timer: 6000

        });
        $("#smgDocumentos" + href).html("Actualmente se esta omitiendo adjuntar el documento al requisito");
    }
});