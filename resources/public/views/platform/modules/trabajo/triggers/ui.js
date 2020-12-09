function cargarTablaListadoProyecto(idtrabajo) {
    var formData = new FormData();
    formData.append("idtrabajo", idtrabajo);
    var ruta = routesAppPlatform() + 'trabajo/core/cargarTablaListadoProyecto.php';
    document.getElementsByName("idtrabajo").innerHTML="";
    sendEventFormDataApp('POST', ruta, formData, '#refrescarTabla');
    return false;
}


function cargarTablaListadoProyectoEmpresa(idtrabajo) {
    var formData = new FormData();
    formData.append("idtrabajo", idtrabajo);
    var ruta = routesAppPlatform() + 'trabajo/core/cargarTablaListadoProyectoEmpresa.php';
    document.getElementsByName("idtrabajo").innerHTML="";
    sendEventFormDataApp('POST', ruta, formData, '#refrescarTabla');
    return false;
}