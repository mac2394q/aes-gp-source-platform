$(document).on('click', '#generarClave', function (e) {
    var clave= generar(11);
    document.getElementsByName("clave")[0].value = clave;
    
});
